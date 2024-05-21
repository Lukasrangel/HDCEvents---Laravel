@extends('layout.main')

@section('title', 'Editando {{ $event->nome }}')

@section('content')

<div class="banner-form center">

    @if(session('msgerror'))
        <p class='msgerror'> <br> {{ session('msgerror') }}</p>
    @endif

    <h1> Editando {{ $event->nome }}</h1>

    <form method='post' action='/events/edit/{{ $event->id }}' enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome do Evento: </label>
            <input type="text" class="form-control" name='nome' value='{{ $event->nome }}'>   
        </div>

        <div class="form-group">
            <label for="nome">Data do Evento: </label>
            <input type="date" class="form-control" name='date' value='{{ $event->date }}'>   
        </div>

        <div class="form-group">
            <label for="nome">Imagem do Evento: </label>
            <input type="file" class="form-control-file" name='foto'>   
            <img src='../../imgs/events/{{ $event->foto }}'>
            <input type='hidden' name='oldfoto' value='{{ $event->foto }}'>
        </div>

        <div class="form-group">
            <label for="nome">Cidade: </label>
            <input type="text" class="form-control" name='cidade' value='{{ $event->cidade }}'>  
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea class='form-control' name='descricao'>
            {{ $event->descricao }}
            </textarea>
        </div>

        <div class="form-group">
            <label for="nome">Itens necessários: </label> <br>
            <input type="checkbox" name='items[]' value='Cadeiras'> Cadeiras   
        </div>

        <div class="form-group">
            <input type="checkbox" name='items[]' value='Mesas'> Mesas   
        </div>

        <div class="form-group">
            <input type="checkbox" name='items[]' value='Cerveja Grátis'> Cerveja Grátis   
        </div>

        <div class="form-group">
            <input type="checkbox" name='items[]' value='Open Food'> Open Food   
        </div>

        <div class="form-group">
        <label for="privado"> Evento Privado:</label>
            
            <select name='privado'>
                <option value='0'>Não</option>
                <option value='1' {{ $event->privado == 1 ? "selected" : "" }}>Sim</option>

            </select>
        </div>
        <button type="submit" class="btn btn-primary"> Cadastrar! </button>


    </form>



</div><!--banner-form-->

@endsection