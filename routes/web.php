<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MessageController;

//Por default el sitio te lleva a la pagina de bienvenida
Route::get('/', function () {
    return view('welcome');
});

//LLamado a las rutas de autenticacion de laravel/ui
Auth::routes();

// Automaticamente redirige al usuario dependiendo del rol que tiene
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/chat', [HomeController::class, 'chat'])->name('chat');
Route::post('/agent', [HomeController::class, 'getAgentsByName'])->name('agent.search');

//CRUDs Ticket
Route::post('/ticket', [TicketController::class, 'createTicket'])->name('ticket.create');
Route::get('/ticket', [TicketController::class,'getTicket'])->name('ticket.read');
//Route::put('/ticket', [TicketController::class, 'updateTicket'])->name('ticket.update'); //No se necesita
Route::delete('/ticket', [TicketController::class,'deleteTicket'])->name('ticket.delete');
Route::put('/ticket', [TicketController::class, 'assignTicket'])->name('ticket.assign');

//CRUDs Feedback
Route::post('/feedback', [FeedbackController::class, 'createFeedback'])->name('feedback.create');
Route::get('/feedback', [FeedbackController::class,'getFeedback'])->name('feedback.read');
Route::put('/feedback', [FeedbackController::class, 'updateFeedback'])->name('feedback.update');
Route::delete('/feedback', [FeedbackController::class,'deleteFeedback'])->name('feedback.delete');

//CRUDs Message
Route::post('/message', [MessageController::class, 'createMessage'])->name('message.create');
Route::get('/message', [MessageController::class,'getMessage'])->name('message.read');
Route::put('/message', [MessageController::class, 'updateMessage'])->name('message.update');
Route::delete('/message', [MessageController::class,'deleteMessage'])->name('message.delete');

Route::get('/message/{ticket_id}', [MessageController::class, 'countMessages']);