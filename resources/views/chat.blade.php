@extends('layouts.app')

@section('content')
<div class="container">

    @if (Auth::user()->role == 'client')
        <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Finalizar ticket</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Seguro quieres finalizar el ticket?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary" id="confirmButton">Sí</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <h1 class="text-center"> Chat </h1>

    <form method="GET" action=" {{ route('home') }}" class="text-end">
        <button type="submit" class="btn btn-danger mb-4">
            Regresar a inicio
        </button>
    </form>

    <div class="row justify-content-center mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <p class="fw-bold">Titulo: {{$ticket->title}}</p>
                    <p>Descripción: {{$ticket->description}}</p>
                </div>

                <div class="card-body">

                    <div class="row mb-2">
                        <div class="col" id="messages">
                            @foreach ($messages as $message)
                                <div class="row">
                                    @if ($message->user_id == Auth::user()->id)
                                        <div class="col d-flex justify-content-end text-end">
                                            <div class="alert alert-primary" role="alert">
                                                <p><strong>Tú:</strong></p>
                                                {{ $message->content }}
                                            </div>
                                        </div>
                                    @else
                                        <div class="col d-flex justify-content-start text-start">
                                            <div class="alert alert-secondary" role="alert">
                                                @if (Auth::user()->role == 'client')
                                                    <p><strong>Agente:</strong></p>
                                                @else
                                                    <p><strong>Cliente:</strong></p>
                                                @endif
                                                {{ $message->content }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('message.create') }}" class="row g-3 needs-validation"
                                novalidate>

                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                                <div class="row mb-2">
                                    <div class="col">
                                        <label for="content" class="form-label">Mensaje:</label>
                                        <textarea class="form-control" id="content" name="content" required></textarea>
                                        <div class="valid-feedback">
                                            Contenido valido
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-primary" type="submit">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    @if (Auth::user()->role == 'client')
                        <div class="row">
                            <div class="col text-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#confirmationModal">
                                    Finalizar Ticket
                                </button>
                            </div>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>

<script>
    @if (Auth::user()->role == 'client')
        document.addEventListener('DOMContentLoaded', function () {
            const confirmButton = document.getElementById('confirmButton');
            confirmButton.addEventListener('click', function () {
                const modalBody = document.querySelector('#confirmationModal .modal-body');
                const modalFooter = document.querySelector('#confirmationModal .modal-footer');

                // Replace modal content with form
                modalBody.innerHTML = `
                            <p>Por favor, llena los siguientes campos para finalizar el ticket</p>
                            <form class="needs-validation" id="finalizeTicketForm" method="POST" action=" {{ route('feedback.create') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <p>*¿El agente pudo resolver su problema?</p>
                                    <input required type="radio" id="si" name="is_resolved" value="1">
                                    <label for="html">Si</label><br>
                                    <input required type="radio" id="no" name="is_resolved" value="0">
                                    <label for="css">No</label><br>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="content">Agrega un comentario (Opcional)</label>
                                    <input type="text" class="form-control" id="content" name="content">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="rating">*Califica al agente de soporte (1 al 10)</label>
                                    <input required class="form-control" type="number" id="rating" name="rating" min="1" max="10">
                                </div>
                                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                <input type="hidden" name="support_id" value="{{ $agent->id }}">
                            </form>
                        `;

                modalFooter.innerHTML = `
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" form="finalizeTicketForm">Enviar</button>
                        `;
            });
        });
    @endif

    document.addEventListener('DOMContentLoaded', function () {
        const messagesDiv = document.getElementById('messages');
        let initialMessageCount = messagesDiv.children.length;
        const ticketId = '{{ $ticket->id }}'; // Asumiendo que $ticket está disponible en la vista

        async function checkForNewMessages() {
            try {
                const response = await fetch(`/message/${ticketId}`);

                const data = await response.json();

                //Verificar conteo de mensajes
                //console.log(data);
                //console.log(initialMessageCount);

                if (data.count !== initialMessageCount) {
                    window.location.reload();
                }
            } catch (error) {
                console.error('Error al verificar nuevos mensajes:', error);
            }
        }

        setInterval(checkForNewMessages, 2000); // Verificar cada 2 segundos
    });
</script>

@endsection