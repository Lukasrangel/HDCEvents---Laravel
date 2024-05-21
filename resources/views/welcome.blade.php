@extends('layout.main')

@section('title', 'HDC Events')

@section('content')

<div class="banner-inicial">

    <form method='GET'>
        <input type='text' name='search' placeholder='Buscar Evento'>
    </form>
    

</div><!--banner-inicial-->


<div class="center">

    @if($search)
        <h1> Buscando por: {{ $search }}</h1>
    @else
        <h1> Próximos Eventos </h1>
    @endif

    <div class="banner-events col-md-12">


    @foreach ($events as $event)

            <div class="banner-event-single">
             
                <img src='imgs/events/{{ $event->foto }}' alt='{{ $event->nome }} HDC Events'>

                <div class="event-info">

                    <p class='card-date'> {{ date('d/m/Y', strtotime($event->date)) }}</p>

                    <h3 class='title'> {{ $event->nome }} </h3>
                    

                    <button class="btn btn-primary"> <a href='events/{{ $event->id }}' style='color: white'> Ver </a> </button>
                </div><!--event-info-->
            </div><!--banner-event-single-->

            
    @endforeach
    </div><!--banner-events-->

    @if(count($events) == 0  && $search)
        <p style='color:gray'> Não foram encontrados eventos com sua busca <a href='/'> Voltar para home </a </p> 
    @elseif(count($events) == 0) 
        <p style='color: gray'> No momento não há eventos agendados </p>
    @endif
        
        
    </div><!--banner-events-->
    


</div><!--center-->



@endsection