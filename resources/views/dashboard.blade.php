@extends('layout.main')

@section('title', 'HDC Events')

@section('content')


<main>

    <div class="banner-eventos center">
        <h1> Olá {{ auth()->user()->name }}</h1>

        <h2> Seus eventos </h2>

        
        @if(count($events) == 0)
                <p> Você não possui nenhum evento, <a href='/criar-evento'> criar evento </a> </p>
        @else
        <table>
            <tr>
                <th>
                    #
                </th>

                <th>
                    Nome do evento
                </th>

                <th>
                    Participantes
                </th>

                <th>
                    Ações
                </th>
            </tr>

           @foreach($events as $event)
           <tr>
                <td>
                    {{ $loop->index + 1}}
                </td>

                <td>
                    <a href='/events/{{ $event->id }}'> {{ $event->nome }} </a>
                </td>

                <td>
                    {{ count($event->users) }}
                </td>

                <td id='actions'>
                    <a href='/events/edit/{{ $event->id }}' ><button type="button" class="btn btn-info"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg> Editar </button> </a>

                    <form method='post' action='/events/delete/{{$event->id }}'>
                        @csrf 
                        @method('DELETE')
                    <button type="submit" class="btn btn-danger"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>Excluir </button>
                    </form>
                </td>
            </tr>
           @endforeach
        </table>
        @endif

        <h2> Eventos com sua presença marcada: </h2>
      
        @if(count($eventsAsParticipants) == 0)
                <p> Você não tem presença confirmada em nenhum evento, <a href='/'> veja eventos </a> </p>
        @else
        <table>
            <tr>
                <th>
                    #
                </th>

                <th>
                    Nome do evento
                </th>

                <th>
                    Participantes
                </th>

                <th>
                    Ações
                </th>
            </tr>

           @foreach($eventsAsParticipants as $event)
           <tr>
                <td>
                    {{ $loop->index + 1}}
                </td>

                <td>
                    <a href='/events/{{ $event->id }}'> {{ $event->nome }} </a>
                </td>

                <td>
                    {{ count($event->users) }}
                </td>

                <td id='actions'>

                    <form method='post' action='/events/left/{{$event->id }}'>
                        @csrf 
                        @method('DELETE')
                    <button type="submit" class="btn btn-danger"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg> Sair </button>
                    </form>
                </td>
            </tr>
           @endforeach
        </table>
        @endif
        
    </div><!--banner-eventos-->

</main>


@endsection