@extends('layout.main')

@section('title', 'HDC Events')

@section('content')

<div class="banner-form center">

    @if(session('msgerror'))
        <p class='msgerror'> <br> {{ session('msgerror') }}</p>
    @endif


    <form method='post' action='/events' enctype="multipart/form-data">
        @csrf
    
        <div class="form-group">
            <label for="nome">Nome do Evento: </label>
            <input type="text" class="form-control" name='nome'>   
        </div>

        <div class="form-group">
            <label for="nome">Data do Evento: </label>
            <input type="date" class="form-control" name='date'>   
        </div>

        <div class="form-group">
            <label for="nome">Imagem do Evento: </label>
            <input type="file" class="form-control-file" name='foto'>   
        </div>

        <div class="form-group">
            <label for="nome">Cidade: </label>
            <input type="text" class="form-control" name='cidade'>  
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea class='form-control' name='descricao'>
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
                <option value='1'>Sim</option>

            </select>
        </div>
        <button type="submit" class="btn btn-primary"> Cadastrar! </button>


    </form>



</div><!--banner-form-->

@endsection