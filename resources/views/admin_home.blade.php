@extends('layouts.app')

@section('content')
<div class="container">
    <h1> Dashboard Administrador </h1>

    <div class="row justify-content-center mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">Estadisticas Generales</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-6 text-center">

                            <h2>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                    viewBox="0 0 32 32">
                                    <g fill="none">
                                        <g filter="url(#f2365id2)">
                                            <path fill="url(#f2365id0)"
                                                d="M27.857 8.675h-5.11c-.25 0-.46.17-.53.41c-.19.65-.8 1.13-1.51 1.13s-1.32-.47-1.51-1.13a.555.555 0 0 0-.53-.41H4.237c-1.21 0-2.19.98-2.19 2.19v10.27c0 1.21.98 2.19 2.19 2.19h14.43c.25 0 .46-.17.53-.41c.19-.65.8-1.13 1.51-1.13s1.32.47 1.51 1.13c.07.24.28.41.53.41h5.11c1.21 0 2.19-.98 2.19-2.19v-10.27c0-1.21-.98-2.19-2.19-2.19m-7.15 11.37c-.87 0-1.58-.71-1.58-1.58c0-.87.71-1.58 1.58-1.58c.87 0 1.58.71 1.58 1.58c0 .87-.71 1.58-1.58 1.58m0-4.92c-.87 0-1.58-.71-1.58-1.58c0-.87.71-1.58 1.58-1.58c.87 0 1.58.71 1.58 1.58c0 .87-.71 1.58-1.58 1.58" />
                                        </g>
                                        <path fill="url(#f2365id1)"
                                            d="M27.857 8.675h-5.11c-.25 0-.46.17-.53.41c-.19.65-.8 1.13-1.51 1.13s-1.32-.47-1.51-1.13a.555.555 0 0 0-.53-.41H4.237c-1.21 0-2.19.98-2.19 2.19v10.27c0 1.21.98 2.19 2.19 2.19h14.43c.25 0 .46-.17.53-.41c.19-.65.8-1.13 1.51-1.13s1.32.47 1.51 1.13c.07.24.28.41.53.41h5.11c1.21 0 2.19-.98 2.19-2.19v-10.27c0-1.21-.98-2.19-2.19-2.19m-7.15 11.37c-.87 0-1.58-.71-1.58-1.58c0-.87.71-1.58 1.58-1.58c.87 0 1.58.71 1.58 1.58c0 .87-.71 1.58-1.58 1.58m0-4.92c-.87 0-1.58-.71-1.58-1.58c0-.87.71-1.58 1.58-1.58c.87 0 1.58.71 1.58 1.58c0 .87-.71 1.58-1.58 1.58" />
                                        <path fill="#d88b4c"
                                            d="M15.697 18.115h-9.44a.56.56 0 1 1 0-1.12h9.43c.31 0 .56.25.56.56a.55.55 0 0 1-.55.56m0 2.21h-9.44a.56.56 0 1 1 0-1.12h9.43c.31 0 .56.25.56.56c.01.3-.25.56-.55.56" />
                                        <path fill="#d6894c"
                                            d="M10.617 13.445h-4.07a.85.85 0 1 1 0-1.7h4.07c.47 0 .85.38.85.85c0 .48-.38.85-.85.85m16.87 3.22h-2.22c-.36 0-.65.29-.65.65v2.22c0 .36.29.65.65.65h2.22c.36 0 .65-.29.65-.65v-2.22c0-.36-.29-.65-.65-.65" />
                                        <defs>
                                            <linearGradient id="f2365id0" x1="28.871" x2="5.059" y1="19.14" y2="19.14"
                                                gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#ffe74d" />
                                                <stop offset="1" stop-color="#f3c240" />
                                            </linearGradient>
                                            <linearGradient id="f2365id1" x1="30.307" x2="27.574" y1="16.546"
                                                y2="16.546" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#fff250" />
                                                <stop offset="1" stop-color="#fff250" stop-opacity="0" />
                                            </linearGradient>
                                            <filter id="f2365id2" width="28" height="15.25" x="2.047" y="8.375"
                                                color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                <feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                                <feColorMatrix in="SourceAlpha" result="hardAlpha"
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                                <feOffset dy=".3" />
                                                <feGaussianBlur stdDeviation=".5" />
                                                <feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic" />
                                                <feColorMatrix
                                                    values="0 0 0 0 0.866667 0 0 0 0 0.745098 0 0 0 0 0.270588 0 0 0 1 0" />
                                                <feBlend in2="shape" result="effect1_innerShadow_18_1354" />
                                                <feColorMatrix in="SourceAlpha" result="hardAlpha"
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                                <feOffset dy="-.3" />
                                                <feGaussianBlur stdDeviation=".5" />
                                                <feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic" />
                                                <feColorMatrix
                                                    values="0 0 0 0 0.815686 0 0 0 0 0.588235 0 0 0 0 0.286275 0 0 0 1 0" />
                                                <feBlend in2="effect1_innerShadow_18_1354"
                                                    result="effect2_innerShadow_18_1354" />
                                            </filter>
                                        </defs>
                                    </g>
                                </svg>
                                Tickets
                            </h2>

                            <ul class="list-group">
                                <li class="list-group-item">
                                    Total de tickets: {{ $statistics['totalTickets'] }}
                                </li>
                                <li class="list-group-item">
                                    Tickets resueltos: {{ $statistics['resolvedTickets'] }}
                                </li>
                                <li class="list-group-item">
                                    Tickets no resueltos: {{ $statistics['unresolvedTickets'] }}
                                </li>
                                <li class="list-group-item">
                                    Tickets asignados: {{ $statistics['assignedTickets'] }}
                                </li>
                                <li class="list-group-item">
                                    Tickets no asignados: {{ $statistics['unassignedTickets'] }}
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <div class="row text-center">
                                <h2>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M2 22V4q0-.825.588-1.412T4 2h16q.825 0 1.413.588T22 4v12q0 .825-.587 1.413T20 18H6zm10-7q.425 0 .713-.288T13 14t-.288-.712T12 13t-.712.288T11 14t.288.713T12 15m-1-4h2V5h-2z" />
                                    </svg>
                                    Reseñas
                                </h2>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        Total de reseñas: {{ $statistics['totalFeedbacks'] }}
                                    </li>
                                    <li class="list-group-item">
                                        Calificación promedio: {{ $statistics['averageRating'] }} / 10
                                    </li>
                                </ul>
                            </div>
                            <div class="row text-center mt-2">
                                <h2>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M18.72 14.76c.35-.85.54-1.76.54-2.76c0-.72-.11-1.41-.3-2.05c-.65.15-1.33.23-2.04.23A9.07 9.07 0 0 1 9.5 6.34a9.2 9.2 0 0 1-4.73 4.88c-.04.25-.04.52-.04.78A7.27 7.27 0 0 0 12 19.27c1.05 0 2.06-.23 2.97-.64c.57 1.09.83 1.63.81 1.63c-1.64.55-2.91.82-3.78.82c-2.42 0-4.73-.95-6.43-2.66a9 9 0 0 1-2.24-3.69H2v-4.55h1.09a9.09 9.09 0 0 1 15.33-4.6a9 9 0 0 1 2.47 4.6H22v4.55h-.06L18.38 18l-5.3-.6v-1.67h4.83zm-9.45-2.99c.3 0 .59.12.8.34a1.136 1.136 0 0 1 0 1.6c-.21.21-.5.33-.8.33c-.63 0-1.14-.5-1.14-1.13s.51-1.14 1.14-1.14m5.45 0c.63 0 1.13.51 1.13 1.14s-.5 1.13-1.13 1.13s-1.14-.5-1.14-1.13a1.14 1.14 0 0 1 1.14-1.14" />
                                    </svg>
                                    Agentes de soporte
                                </h2>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        Total de agentes: {{ $statistics['totalAgents'] }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">Agentes de soporte</div>
                <div class="card-body">

                    <div class="row mb-2">
                        <div class="col">
                            <div class="d-flex">
                                <h2>Buscar agente</h2>
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
                                        Busca un agente por su nombre. Los resultados se mostrarán a continuación en conjunto a sus estadisticas.
                                    </div>
                                </div>
                            </div>
                            

                            <form id="agent-search-form">
                                <div class="form-group">
                                    <input type="text" class="form-control mb-2" id="name" name="name"
                                        placeholder="Nombre del agente">
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                            </form>
                        </div>
                    </div>

                    <div class="row mb-2" id="search-results">

                    </div>

                    <div class="row mb-2">
                        <h2>Listado de agentes</h2>
                        @foreach ($agents as $agent)
                                                @php
                                                    //Conteo de tickets del agente
                                                    $ticketCount = \App\Models\Ticket::where('support_id', $agent->id)->count();
                                                    //Conteo de tickets que tengan retroalimentacion y que si haya sido resuelto en is_resolved
                                                    $feedbackCount = \App\Models\Feedback::where('support_id', $agent->id)->where('is_resolved', 1)->count();
                                                    //Promedio de calificacion de los tickets resueltos
                                                    $averageRating = \App\Models\Feedback::where('support_id', $agent->id)->avg('rating');
                                                    $averageRating = number_format($averageRating, 1);
                                                @endphp
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                                                                viewBox="0 0 24 24">
                                                                <path fill="currentColor" fill-opacity="0.25"
                                                                    d="M3 11c0-3.771 0-5.657 1.172-6.828C5.343 3 7.229 3 11 3h2c3.771 0 5.657 0 6.828 1.172C21 5.343 21 7.229 21 11v2c0 3.771 0 5.657-1.172 6.828C18.657 21 16.771 21 13 21h-2c-3.771 0-5.657 0-6.828-1.172C3 18.657 3 16.771 3 13z" />
                                                                <circle cx="12" cy="10" r="4" fill="currentColor" />
                                                                <path fill="currentColor" fill-rule="evenodd"
                                                                    d="M18.946 20.253a.232.232 0 0 1-.14.25C17.605 21 15.836 21 13 21h-2c-2.835 0-4.605 0-5.806-.498a.232.232 0 0 1-.14-.249C5.483 17.292 8.429 15 12 15c3.571 0 6.517 2.292 6.946 5.253"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            {{ $agent->name }}
                                                        </div>
                                                        <div class="card-body">
                                                            <p>Tickets asignados: {{ $ticketCount }} </p>
                                                            <p>Tickets resueltos: {{ $feedbackCount }}</p>
                                                            <p>Calificacion: {{ $averageRating }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Tickets activos
                    <!-- Tooltip -->
                    <div class="tooltip-container d-inline-flex">
                        <div class="tooltip-trigger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M11 17h2v-6h-2zm1-8q.425 0 .713-.288T13 8t-.288-.712T12 7t-.712.288T11 8t.288.713T12 9m0 13q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8" />
                            </svg>
                        </div>
                        <div class="tooltip-content-bottom">
                            Lista de tickets sin cerrar por los clientes. Puedes eliminarlos o reasignarlos a un agente
                            diferente de ser necesario.
                        </div>
                    </div>
                </div>
                <div class="card-body row">
                    @foreach ($tickets as $ticket)
                                        @php
                                            $feedback = \App\Models\Feedback::where('ticket_id', $ticket->id)->first();
                                        @endphp
                                        @if($feedback == null)
                                                    <div class="col-md-6">
                                                        <div class="card text-center">
                                                            <div class="card-header">
                                                                <p class="fw-bold">Titulo: {{ $ticket->title }}</p>
                                                                <p>Creado en: {{ $ticket->created_at }}</p>
                                                                @if($ticket->support_id == null)
                                                                    <span class="badge bg-warning text-dark"> Asignación de agente pendiente </span>
                                                                @else
                                                                                        @php
                                                                                            $support = \App\Models\User::find($ticket->support_id);
                                                                                        @endphp
                                                                                        <span class="badge bg-success text-white"> Asignado a {{ $support->name}} (id:
                                                                                            {{ $ticket->support_id }})</span>
                                                                @endif
                                                                <form method="POST" action="{{ route('ticket.delete') }}" class="text-end">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                                                    <button type="submit" class="btn btn-danger mb-4">
                                                                        Borrar ticket
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            <div class="card-body row">
                                                                <div class="col">
                                                                    <form method="POST" action="{{ route('ticket.assign') }}" class="text-start">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                                                            <label for="support_id">Agente:</label>
                                                                            <select id="support_id" name="support_id" required class="form-control">
                                                                                @foreach ($agents as $agent)
                                                                                    <option value="{{ $agent->id }}"> {{ $agent->name }} (id:{{$agent->id}})
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            <button type="submit" class="btn btn-primary mt-2">
                                                                                Reasignar ticket
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('agent-search-form');
        const resultsDiv = document.getElementById('search-results');

        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Evita el envío tradicional del formulario

            const formData = new FormData(form);
            const name = formData.get('name');

            fetch('{{ route('agent.search') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Incluye el token CSRF si es necesario
                },
                body: JSON.stringify({ name: name })
            })
                .then(response => response.json())
                .then(data => {
                    // Procesar los datos y mostrarlos en la página
                    if (data.status === 'OK') {
                        //Verificar que haya encontrado agentes
                        if (data.agents.length === 0) {
                            resultsDiv.innerHTML = `
                            <h2>Resultado de busqueda</h2>
                            <p>No se encontraron agentes</p>
                            `;
                            return;
                        }

                        let resultsHtml = '';
                        data.agents.forEach(agent => {

                            let resolvedCount = agent.feedbacks.filter(feedback => feedback.is_resolved).length;
                            let avgRating = agent.feedbacks.reduce((acc, feedback) => acc + feedback.rating, 0) / agent.feedbacks.length;

                            resultsHtml += `
                            <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor" fill-opacity="0.25"
                                            d="M3 11c0-3.771 0-5.657 1.172-6.828C5.343 3 7.229 3 11 3h2c3.771 0 5.657 0 6.828 1.172C21 5.343 21 7.229 21 11v2c0 3.771 0 5.657-1.172 6.828C18.657 21 16.771 21 13 21h-2c-3.771 0-5.657 0-6.828-1.172C3 18.657 3 16.771 3 13z" />
                                        <circle cx="12" cy="10" r="4" fill="currentColor" />
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M18.946 20.253a.232.232 0 0 1-.14.25C17.605 21 15.836 21 13 21h-2c-2.835 0-4.605 0-5.806-.498a.232.232 0 0 1-.14-.249C5.483 17.292 8.429 15 12 15c3.571 0 6.517 2.292 6.946 5.253"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>${agent.name}</span>
                                </div>
                                <div class="card-body">
                                    <p>Tickets asignados: ${agent.tickets_support.length} </p>
                                    <p>Tickets resueltos: ${resolvedCount}</p>
                                    <p>Calificacion: ${avgRating} </p>
                                </div>
                            </div>
                        </div>
                        `;
                        });
                        resultsDiv.innerHTML =
                            `
                            <h2>Resultado de busqueda</h2>
                            `
                            + resultsHtml;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    resultsDiv.innerHTML = '<p>Ocurrió un error al buscar agentes</p>';
                });
        });
    });

</script>

@vite(['resources/js/tooltip.js'])
@endsection