<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    function createMessage(Request $request){
        // Crear Message
        $message = new Message();
        $message->ticket_id = $request->ticket_id;
        $message->user_id = $request->user_id;
        $message->content = $request->content;
    
        // Guardar en la base de datos
        if($message->save()){
            return redirect()->back();
        }else{
            return response()->json(["status"=> "error", "message"=> "Fallo al crear el mensaje"]);
        }
    }
    
    function updateMessage(Request $request){
        $message = Message::find($request->message_id);
    
        // Verificar si el mensaje existe
        if (!$message) {
            return response()->json(["status" => "error", "message" => "Mensaje no encontrado"]);
        }
    
        // Actualizar
        $message->ticket_id = $request->ticket_id;
        $message->user_id = $request->user_id;
        $message->content = $request->content;
    
        // Guardar en la base de datos
        if($message->save()){
            return response()->json(["status"=> "OK"]);
        }else{
            return response()->json(["status"=> "error", "message" => "Fallo al actualizar el mensaje"]);
        }
    }
    

    function deleteMessage(Request $request){
        $message = Message::find($request->message_id);

        // Verificar si el mensaje existe
        if (!$message) {
            return response()->json(["status"=> "error", "message"=> "Mensaje no encontrado"]);
        }

        // Verificar si de borro correctamente
        if($message->delete()){
            return response()->json(["status"=> "OK"]);
        }
        else{
            return response()->json(["status"=> "error", "message"=> "Failed to delete message"]);
        }
    }

    function getMessage(Request $request){
        $message = Message::find($request->ticket_id);

        // Verificar si el mensaje existe
        if (!$message) {
            $response = ["status" => "error", "message" => "Mensaje no encontrado"];
            return redirect()->back()->with($response);
        }
        return response()->json(["status"=> "OK"]);
    }

    function showMessagesByTicketId($ticketId)
    {
        // Obtener todos los mensajes asociados al ticket
        $messages = Message::where('ticket_id', $ticketId)
                        ->orderBy('created_at', 'asc') // Ordenar por marca de tiempo en orden ascendente
                        ->get();

        // Pasar los mensajes a la vista para su visualización
        return view('ticket.show', ['messages' => $messages]);
    }

    function countMessages($ticket_id){
        $messages = Message::where('ticket_id', $ticket_id)->count();
        return response()->json(["count"=> $messages]);
    }
}
