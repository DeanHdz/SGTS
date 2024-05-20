@extends('layouts.app')

@section('content')
<div class="container">
    <h1> Dashboard Agente de soporte </h1>

    <div class="text-center" id="clima">

    </div>

    <div class="row justify-content-center mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">Estadisticas personales</div>
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
                            <h3>Usuario: {{ Auth::user()->name }}</h3>
                        </div>
                        @php
                            //Conteo de tickets asignados al agente
                            $ticketsCount = \App\Models\Ticket::where('support_id', Auth::user()->id)->count();
                            //Conteo de tickets que tengan retroalimentacion y que si haya sido resuelto en is_resolved
                            $feedbackResolvedCount = \App\Models\Feedback::where('support_id', Auth::user()->id)->where('is_resolved', 1)->count();
                            //Conteo de tickets que tengan retroalimentacion y que no haya sido resuelto en is_resolved
                            $feedbackUnresolvedCount = \App\Models\Feedback::where('support_id', Auth::user()->id)->where('is_resolved', 0)->count();
                            //Conteo de feedbacks
                            $feedbackCount = \App\Models\Feedback::where('support_id', Auth::user()->id)->count();
                            //Promedio de calificacion de los tickets resueltos
                            $averageRating = \App\Models\Feedback::where('support_id', Auth::user()->id)->avg('rating');
                            $averageRating = number_format($averageRating, 1);
                            //Cantidad de feedbacks donde la calificacion sea de 6 o mas
                            $feedbackPositiveCount = \App\Models\Feedback::where('support_id', Auth::user()->id)->where('rating', '>=', 6)->count();
                            //Cantidad de feedbacks donde la calificacion sea de 5 o menos
                            $feedbackNegativeCount = \App\Models\Feedback::where('support_id', Auth::user()->id)->where('rating', '<=', 5)->count();
                        @endphp
                        <div class="col">
                            <h2>Tickets</h2>
                            <p>Total asignados: {{ $ticketsCount }}</p>
                            <p>Total resueltos: {{ $feedbackResolvedCount }}</p>
                            <p>Total no resueltos: {{ $feedbackUnresolvedCount }}</p>
                        </div>
                        <div class="col">
                            <h2>Reseñas</h2>
                            <p>Total de reseñas: {{ $feedbackCount }}</p>
                            <p>Reseñas positivas (6 o mas): {{ $feedbackPositiveCount }}</p>
                            <p>Reseñas negativas (5 o menos): {{ $feedbackNegativeCount }}</p>
                        </div>
                        <div class="col">
                            <h2>Calificación promedio:</h2>
                            <div class="d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 128 128">
                                    <path fill="#fdd835"
                                        d="m68.05 7.23l13.46 30.7a7.047 7.047 0 0 0 5.82 4.19l32.79 2.94c3.71.54 5.19 5.09 2.5 7.71l-24.7 20.75c-2 1.68-2.91 4.32-2.36 6.87l7.18 33.61c.63 3.69-3.24 6.51-6.56 4.76L67.56 102a7.033 7.033 0 0 0-7.12 0l-28.62 16.75c-3.31 1.74-7.19-1.07-6.56-4.76l7.18-33.61c.54-2.55-.36-5.19-2.36-6.87L5.37 52.78c-2.68-2.61-1.2-7.17 2.5-7.71l32.79-2.94a7.047 7.047 0 0 0 5.82-4.19l13.46-30.7c1.67-3.36 6.45-3.36 8.11-.01" />
                                    <path fill="#ffff8d"
                                        d="m67.07 39.77l-2.28-22.62c-.09-1.26-.35-3.42 1.67-3.42c1.6 0 2.47 3.33 2.47 3.33l6.84 18.16c2.58 6.91 1.52 9.28-.97 10.68c-2.86 1.6-7.08.35-7.73-6.13" />
                                    <path fill="#f4b400"
                                        d="M95.28 71.51L114.9 56.2c.97-.81 2.72-2.1 1.32-3.57c-1.11-1.16-4.11.51-4.11.51l-17.17 6.71c-5.12 1.77-8.52 4.39-8.82 7.69c-.39 4.4 3.56 7.79 9.16 3.97" />
                                </svg>
                                <span class="h4 align-self-center">{{ $averageRating }} / 10</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Tickets pendientes
                        <!-- Tooltip -->
                        <div class="tooltip-container d-inline-flex">
                            <div class="tooltip-trigger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M11 17h2v-6h-2zm1-8q.425 0 .713-.288T13 8t-.288-.712T12 7t-.712.288T11 8t.288.713T12 9m0 13q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8" />
                                </svg>
                            </div>
                            <div class="tooltip-content-bottom">
                                Aqui se muestran los tickets que has tomado. Procura dar un buen servicio y resuelve los
                                tickets en el menor tiempo posible.
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if($tickets_assigned->count() == 0)
                                <div class="col-md-12">
                                    <p class="text-center">No hay tickets pendientes, atiende un ticket sin asignar.</p>
                                </div>
                            @else
                                @foreach ($tickets_assigned as $ticket)
                                    <div class="col-md-6">
                                        <div class="card mb-4 text-center">
                                            <div class="card-header">
                                                <h5 class="card-title">{{ $ticket->title }}</h5>
                                                <p class="card-text">Creado el: {{ $ticket->created_at }}</p>
                                            </div>
                                            <div class="card-body">
                                                <form method="GET" action="{{ route('chat') }}">
                                                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                                    <button type="submit" class="btn btn-primary mt-2">
                                                        Abrir chat
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Tickets sin asignar
                        <!-- Tooltip -->
                        <div class="tooltip-container d-inline-flex">
                            <div class="tooltip-trigger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M11 17h2v-6h-2zm1-8q.425 0 .713-.288T13 8t-.288-.712T12 7t-.712.288T11 8t.288.713T12 9m0 13q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8" />
                                </svg>
                            </div>
                            <div class="tooltip-content-bottom">
                                Aqui se muestran los tickets que no han sido asignados a ningun agente. Puedes tomar un
                                ticket y darle seguimiento.
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if($tickets_unassigned->count() == 0)
                                <div class="col-md-12">
                                    <p class="text-center">No hay tickets sin asignar</p>
                                </div>
                            @else
                                @foreach ($tickets_unassigned as $ticket)
                                    <div class="col-md-6">
                                        <div class="card mb-4 text-center">
                                            <div class="card-header">
                                                <h5 class="card-title">{{ $ticket->title }}</h5>
                                                <p class="card-text">Creado el: {{ $ticket->created_at }}</p>
                                            </div>
                                            <div class="card-body">
                                                <form method="POST" action="{{ route('ticket.assign') }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                                    <input type="hidden" name="support_id" value="{{ Auth::user()->id }}">
                                                    <button type="submit" class="btn btn-primary mt-2">
                                                        Tomar ticket
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    //Obtener el clima actual

    document.addEventListener('DOMContentLoaded', async () => {
        const clima = document.getElementById('clima');
        const url = 'https://visual-crossing-weather.p.rapidapi.com/forecast?aggregateHours=24&location=SanLuisPotosi&contentType=json&unitGroup=metric&shortColumnNames=0';
        const options = {
            method: 'GET',
            headers: {
                'X-RapidAPI-Key': '98eae236bfmsh6398f728bae1e8fp1bc42ejsn3b6d0a1c3737',
                'X-RapidAPI-Host': 'visual-crossing-weather.p.rapidapi.com'
            }
        };

        try {
            const response = await fetch(url, options);
            const result = await response.json();
            clima.innerHTML = `
            <h4 class="text-center">Clima en San Luis Potosi</h4>
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="red" d="M15 13V5a3 3 0 0 0-6 0v8a5 5 0 1 0 6 0m-3-9a1 1 0 0 1 1 1v3h-2V5a1 1 0 0 1 1-1"/></svg>
                Temperatura: ${result.locations.SanLuisPotosi.currentConditions.temp}°C
            </p>
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="blue" d="M12 21.5q-3.325 0-5.663-2.3T4 13.6q0-1.575.613-3.012T6.35 8.05l4.25-4.175q.3-.275.663-.425T12 3.3t.738.15t.662.425l4.25 4.175q1.125 1.1 1.738 2.538T20 13.6q0 3.3-2.337 5.6T12 21.5"/></svg>
                Humedad: ${result.locations.SanLuisPotosi.currentConditions.humidity}%
            </p>
            `;
            console.log(result);
        } catch (error) {
            console.error(error);
        }
    });
</script>

@vite(['resources/js/tooltip.js'])
@endsection