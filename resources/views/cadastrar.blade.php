<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HDC Events - Cadastrar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="http://127.0.0.1/aprendendo-lav/resources/css/app.css" rel="stylesheet">
</head>
<body style='background-color: rgb(182, 188, 194)'>


<div class="session-main">
@if(session('errormsg'))
        <p class='msgerror'> <br> {{ session('errormsg') }}</p>
    @elseif(count($errors) > 0)
    <div class='msgerror'> 
        <ul>    
        @foreach($errors->all() as $error)
                
           <li>  {{ $error }} </li>
            @endforeach
        </ul>
    </div>
    @endif
        
    <div class="form-login">

        <div class="logo center">
          <a href='/'>  <img src='http://127.0.0.1/aprendendo-lav/resources/imgs/logomark.min.svg'> </a>
        </div>

        <form method='post' action='cadastrar'>
            @csrf
        <div class="form-group">
            <input type="email" class="form-control" name='email' placeholder='Email' required>  
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name='user' placeholder='Nome de usuario' required>  
        </div>

        <div class="form-group">
            <input type="password" class="form-control" name='passwd' placeholder='Senha' required>  
        </div>

        <div class="form-group">
            <input type="password" class="form-control" name='passwd_ok' placeholder='Confirme sua senha' required>  
        </div>

        <button type="submit" class="btn btn-primary"> Cadastrar! </button>
        </form>

    </div><!--form-login-->

</div><!--session-main-->

</body>