<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Feedback;
use App\Models\Message;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Usar switch para redirigir a la página de inicio correspondiente
        switch (auth()->user()->role) {
            case 'admin':
                /* Estadisticas */
                    // Obtener el total de tickets
                    $totalTickets = Ticket::count();
                    // Obtener el total de tickets donde el problema fue resuelto
                    $resolvedTickets = Ticket::where('feedback.is_resolved', true)
                                            ->join('feedback', 'tickets.id', '=', 'feedback.ticket_id')
                                            ->count();
                    // Obtener el total de tickets donde el problema no fue resuelto
                    $unresolvedTickets = Ticket::where('feedback.is_resolved', false)
                                            ->join('feedback', 'tickets.id', '=', 'feedback.ticket_id')
                                            ->count();
                    // Obtener el total de tickets asignados
                    $assignedTickets = Ticket::whereNotNull('support_id')->count();
                    // Obtener el total de tickets no asignados
                    $unassignedTickets = Ticket::whereNull('support_id')->count();

                    //Obtener la cantidad total de feedbacks
                    $totalFeedbacks = Feedback::count();
                    //Obtener el promedio de calificaciones
                    $averageRating = Feedback::avg('rating');
                    $averageRating = round($averageRating, 2);
                    
                    //Obtener el total de agentes de soporte
                    $totalAgents = User::where('role', 'support')->count();

                    //Agrupar todos los datos en un arreglo de estadisticas
                    $statistics = [
                        'totalTickets' => $totalTickets,
                        'resolvedTickets' => $resolvedTickets,
                        'unresolvedTickets' => $unresolvedTickets,
                        'assignedTickets' => $assignedTickets,
                        'unassignedTickets' => $unassignedTickets,
                        'totalFeedbacks' => $totalFeedbacks,
                        'averageRating' => $averageRating,
                        'totalAgents' => $totalAgents
                    ];
                /* Fin estadisticas */

                $tickets = Ticket::all(); //Retornar los tickets que aun no han sido retroalimentados
                $tickets = $tickets->filter(function ($ticket) {
                    return $ticket->feedback == null;
                });
                $agents = User::where('role', 'support')->get(); //Retornar los agentes de soporte
                return view('admin_home', compact('tickets', 'agents', 'statistics'));

            case 'support':
                //Obtener los tickets asignados al agente de soporte
                $tickets_assigned = Ticket::where('support_id', auth()->user()->id)->get();
                //Filtrar el arreglo de tickets_assigned si ya tienen feedback vinculado
                $tickets_assigned = $tickets_assigned->filter(function ($ticket) {
                    return $ticket->feedback == null;
                });
                //Obtener los tickets no asignados globalmente
                $tickets_unassigned = Ticket::where('support_id', null)->get();
                //Obtener los feedbacks asignados al agente de soporte
                $feedbacks = Feedback::where('support_id', auth()->user()->id)->get();
                return view('support_home', compact('tickets_assigned', 'tickets_unassigned', 'feedbacks'));

            case 'client':
                $tickets = Ticket::where('client_id', auth()->user()->id)->get();
                //Filtrar los tickets que ya tengan feedback vinculado
                $tickets = $tickets->filter(function ($ticket) {
                    return $ticket->feedback == null;
                });
                return view('client_home', compact('tickets'));
                
            default:
                return view('welcome');
        }
    }

    public function chat(Request $request)
    {
        $ticket = Ticket::find($request->ticket_id);

        if (!$ticket) {
            $response = ["status" => "error", "message" => "Ticket no encontrado"];
            return redirect()->back()->with($response);
        }

        $messages = Message::where('ticket_id', $ticket->id)->get();
        $agent = User::find($ticket->support_id);
        return view('chat', compact('ticket', 'messages', 'agent'));
    }

    public function getAgentsByName(Request $request)
    {
        $agents = User::where('role', 'support')
                      ->where('name', 'like', '%' . $request->name . '%')
                      ->with('feedbacks', 'tickets_support')
                      ->get();
        return response()->json(['status' => 'OK', 'agents' => $agents]);
    }
}
