<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    function createFeedback(Request $request){
        // Crear feedback
        $feedback = new Feedback();
        $feedback->ticket_id = $request->ticket_id;
        $feedback->support_id = $request->support_id;
        $feedback->rating = $request->rating;
        $feedback->is_resolved = $request->is_resolved;
        $feedback->content = $request->content;

        // Verificar si se guardo en la base de datos
        if($feedback->save()){
            $response = ["status"=> "success", "message"=> "Ticket calificado y finalizado exitosamente"];
            return redirect()->route('home')->with($response);
        }else{
            $response = ["status"=> "error", "message"=> "Fallo al crear la reseña"];
            return redirect()->back()->with($response);
        }
        
    }

    function updateFeedback(Request $request){
        $feedback = Feedback::find($request->ticket_id);

        // Verificar si existe en la base de datos
        if(!$feedback){
            $response = ["status"=> "error","message"=> "Reseña no encontrada"];
            return redirect()->back()->with($response);
        }

        // Actualizar
        $feedback->ticket_id = $request->ticket_id;
        $feedback->support_id = $request->support_id;
        $feedback->rating = $request->rating;
        $feedback->is_resolved = $request->is_resolved;
        $feedback->content = $request->content;

        // Verificar si se guardo correctamente
        if($feedback->save()){
            $response = ["status"=> "success", "message"=> "Reseña actualizada exitosamente"];
        }else{
            $response = ["status"=> "error", "message"=> "Fallo al actualizar reseña"];
        }
        return redirect()->back()->with($response);
    }

    function deleteFeedback(Request $request){
        $feedback = Feedback::find($request->ticket_id);

        // Verificar si existe en la base de datos
        if(!$feedback){
            $response = ["status"=> "error","message"=> "Reseña no encontrada"];
            return redirect()->back()->with($response);
        }

        // Verificar si se borro correctamente
        if( $feedback->delete() ){
            $response = ["status"=> "success", "message"=> "Reseña eliminada exitosamente"];
        }else{
            $response = ["status"=> "error","message"=> "Fallo al eliminar reseña"];
        }
        return redirect()->back()->with($response);
    }

    function getFeedback(Request $request){
        $feedback = Feedback::find($request->ticket_id);

        // Verificar si el feedback existe
        if(!$feedback){
            $response = ["status"=> "error","message"=> "Reseña no encontrada"];
        }
        $response = ["feedback"=> $feedback];
        return redirect()->back()->with($response);
    }
}
