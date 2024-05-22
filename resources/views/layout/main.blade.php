<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HDC Events</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ config('constants.INITIAL_PATH') }}/resources/css/app.css" rel="stylesheet">
</head>
<body>
    
<header>
    <div class="center">
            <div class="left">
                <img src='{{ config("constants.INITIAL_PATH") }}/resources/imgs/logomark.min.svg'>
            </div><!--left-->
            <div class="clear"></div>

        
            <div class="left">
                <ul>
                    <li>
                       <a href='/'> Eventos </a>
                    </li>

                    <li>
                        <a href='/criar-evento'> Criar&nbspEventos </a>
                    </li>

            @if(Auth::check())
                    <li>
                        <a href='/dashboard'> Dashboard </a>
                    </li>

                    <li>
                        <a href='/logout'> Sair </a>
                    </li>
            @else
                    <li>
                        <a href='/login'> Entrar </a>
                    </li>

                    <li>
                        <a href='/cadastrar'> Cadastrar </a>
                    </li>
            @endif
            </ul>
            </div><!--left-->
           

    </div><!--center-->
    
</header>

<main>
    <div class="container-fluid">
        @if(session('msg'))
            <p class='msg'> <br>{{ session('msg') }}</p>
        @endif
        @yield('content')

    </div><!--container-fluid-->
</main>




<footer>

    <div>
        HDC Events &copy
    </div>
        

</footer>



</body>
</html>