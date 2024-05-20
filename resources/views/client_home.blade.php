@extends('layouts.app')

@section('content')
<div class="container">
    <h1> Dashboard Cliente </h1>

    <div class="row justify-content-center mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">Perfil de cliente</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10em" height="10em" viewBox="0 0 24 24">
                                <g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd">
                                    <path d="M16 9a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-2 0a2 2 0 1 1-4 0a2 2 0 0 1 4 0" />
                                    <path
                                        d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11s11-4.925 11-11S18.075 1 12 1M3 12c0 2.09.713 4.014 1.908 5.542A8.986 8.986 0 0 1 12.065 14a8.984 8.984 0 0 1 7.092 3.458A9 9 0 1 0 3 12m9 9a8.963 8.963 0 0 1-5.672-2.012A6.992 6.992 0 0 1 12.065 16a6.991 6.991 0 0 1 5.689 2.92A8.964 8.964 0 0 1 12 21" />
                                </g>
                            </svg>
                        </div>
                        <div class="col">
                            <h3 class="text-center">Información de usuario</h3>
                            @php
                                //Conteo de tickets del agente
                                $ticketCount = \App\Models\Ticket::where('client_id', Auth::user()->id)->count();
                            @endphp
                            <p>Nombre: {{ Auth::user()->name }}</p>
                            <p>Correo: {{ Auth::user()->email }}</p>
                            <p>Tickets realizados: {{ $ticketCount }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Crear ticket
                    <!-- Tooltip -->
                    <div class="tooltip-container d-inline-flex">
                        <div class="tooltip-trigger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M11 17h2v-6h-2zm1-8q.425 0 .713-.288T13 8t-.288-.712T12 7t-.712.288T11 8t.288.713T12 9m0 13q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8" />
                            </svg>
                        </div>
                        <div class="tooltip-content-bottom">
                            Para enviar un ticket, por favor complete el formulario.
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col">
                            <form method="POST" action="{{ route('ticket.create') }}" class="row g-3 needs-validation"
                                novalidate>

                                @csrf

                                <input type="hidden" name="client_id" value="{{ Auth::user()->id }}">

                                <div class="row">
                                    <div class="col">
                                        <label for="title" class="form-label">Titulo</label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                        <div class="valid-feedback">
                                            Validado correctamente
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="description" class="form-label">Descripción del problema</label>
                                        <textarea class="form-control" id="description" name="description" rows="6"
                                            required></textarea>
                                        <div class="valid-feedback">
                                            Validado correctamente
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Enviar ticket</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center text-center mb-4">
        <h3>Horario de atencion:</h3>
        <p>De lunes a viernes de 8:00 a 17:00 (UTC/GMT -6 horas)</p>
        <p id="hora-actual"></p>
    </div>

    @if ($tickets->count() > 0)
        <div class="row justify-content-center mb-4">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Tickets pendientes
                        <!-- Tooltip -->
                        <div class="tooltip-container d-inline-flex">
                            <div class="tooltip-trigger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M11 17h2v-6h-2zm1-8q.425 0 .713-.288T13 8t-.288-.712T12 7t-.712.288T11 8t.288.713T12 9m0 13q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8" />
                                </svg>
                            </div>
                            <div class="tooltip-content-bottom">
                                Aqui se muestran los tickets que has creado, espera a que se te asigne un agente para dar
                                seguimiento a tu problema.
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($tickets as $ticket)
                                <div class="col-md-6">
                                    <div class="card mb-4 text-center">
                                        <div class="card-header">
                                            <h5 class="card-title">{{ $ticket->title }}</h5>
                                            <p class="card-text">Creado el: {{ $ticket->created_at }}</p>
                                        </div>
                                        <div class="card-body">
                                            <span class="card-text">Estado: </span>
                                            @if ($ticket->support_id == null)
                                                <span class="badge bg-warning text-dark"> Asignación de agente pendiente </span>
                                            @else
                                                <span class="badge bg-success text-white"> Ticket asignado a agente </span>
                                                <form method="GET" action="{{ route('chat') }}">
                                                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                                    <button type="submit" class="btn btn-primary mt-2">
                                                        Abrir chat
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>

@vite(['resources/js/form-validation.js', 'resources/js/tooltip.js'])

<script>
    //Obtener la hora actual

    document.addEventListener('DOMContentLoaded', async () => {
        const horaActual = document.getElementById('hora-actual');
        const url = 'https://time-api4.p.rapidapi.com/api/Time/current/coordinate?longitude=-100.59&latitude=22.09';
        const options = {
            method: 'GET',
            headers: {
                'X-RapidAPI-Key': '98eae236bfmsh6398f728bae1e8fp1bc42ejsn3b6d0a1c3737',
                'X-RapidAPI-Host': 'time-api4.p.rapidapi.com'
            }
        };

        let tiempo;

        async function fetchTime() {
            try {
                const response = await fetch(url, options);
                const result = await response.json();
                console.log(result);
                tiempo = new Date(result.dateTime);
                horaActual.innerHTML = `<p>${tiempo}</p>`;
            } catch (error) {
                console.error(error);
            }
        }

        await fetchTime();

        setInterval(() => {
            if (tiempo) {
                tiempo.setSeconds(tiempo.getSeconds() + 1);
                horaActual.innerHTML = `<p>${tiempo}</p>`;
            }
        }, 1000);
    });
</script>

@endsection