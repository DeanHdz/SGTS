<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;

class TicketController extends Controller
{
    function createTicket(Request $request){
        // Crear ticket
        $ticket = new Ticket();
        $ticket->client_id = $request->client_id;
        $ticket->support_id = null;
        $ticket->title = $request->title;
        $ticket->description = $request->description;

        // Verificar si se guardo correctamente
        if($ticket->save()){
            $response = ["status" => "success", "message" => "Ticket creado exitosamente"];
        }else{
            $response = ["status" => "error", "message" => "Fallo al crear ticket"];
        }
        return redirect()->back()->with($response);
    }

    function updateTicket(Request $request){
        $ticket = Ticket::find($request->ticket_id);

        // Verificar si el ticket existe
        if (!$ticket) {
            $response = ["status" => "error", "message" => "Ticket no encontrado"];
            return redirect()->back()->with($response);
        }

        // Actualizar
        $ticket->client_id = $request->client_id;
        $ticket->support_id = $request->support_id;
        $ticket->title = $request->title;
        $ticket->description = $request->description;

        // Verificar si se guardo en la base de datos
        if($ticket->save()){
            $response = ["status"=> "success", "message"=> "Ticket actualizado exitosamente"];
        }else{
            $response = ["status"=> "error", "message"=> "Fallo al actualizar ticket"];
        }
        return redirect()->back()->with($response);
    }

    function assignTicket(Request $request){
        $ticket = Ticket::find($request->ticket_id);
        $support = User::find($request->support_id);

        // Verificar si el ticket existe
        if (!$ticket) {
            $response = ["status" => "error", "message" => "Ticket no encontrado"];
            return redirect()->back()->with($response);
        }
        //Verificar si el agente existe
        if (!$support) {
            $response = ["status" => "error", "message" => "Agente no encontrado"];
            return redirect()->back()->with($response);
        }

        // Asignar ticket a agente y actualizar
        $ticket->support_id = $request->support_id;

        // Verificar si se guardo en la base de datos
        if($ticket->save()){
            $response = ["status"=> "success", "message"=> "Ticket asignado exitosamente"];
        }else{
            $response = ["status"=> "error", "message"=> "Fallo al asignar ticket"];
        }
        return redirect()->back()->with($response);
    }

    function deleteTicket(Request $request){
        $ticket = Ticket::find($request->ticket_id);

        // Verificar si el ticket existe
        if (!$ticket) {
            $response = ["status" => "error", "message" => "Ticket no encontrado"];
            return redirect()->back()->with($response);
        }

        // Verificar si de borro correctamente
        if($ticket->delete()){
            $response = ["status"=> "success", "message"=> "Ticket eliminado exitosamente"];
        }else{
            $response = ["status"=> "error", "message"=> "Fallo al eliminar ticket"];
        }
        return redirect()->back()->with($response);
    }

    function getTicket(Request $request) {
        $ticket = Ticket::find($request->ticket_id);

        // Verificar si el ticket existe
        if (!$ticket) {
            $response = ["status"=> "error", "message"=> "Ticket no encontrado"];
        } 
        
        $response = ["ticket"=> $ticket];
        return redirect()->back()->with($response);
    }
}
