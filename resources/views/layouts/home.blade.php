<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/styles.css">
    <title>ToDoList</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info border-bottom border-light">
        <a class="navbar-brand" href="{{ route('home') }}">ToDoList</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#textoNavbar" aria-controls="textoNavbar" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="textoNavbar">
            <ul class="navbar-nav ml-auto">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tasks.index') }}">Minhas Tarefas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tasks.create') }}">Criar Tarefas</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">Sair</button>
                    </form>
                </li>
                @else
                <li class="nav-item active">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal">Cadastrar</a>
                </li>
                @endauth
            </ul>
        </div>
    </nav>

    @if (session('login'))
    <div class="alert alert-success mt-3">
        {{ session('login') }}
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Modal de Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulário de Login -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="loginEmail">Email</label>
                            <input type="email" class="form-control" name="email" id="loginEmail" placeholder="Digite seu email">
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Senha</label>
                            <input type="password" class="form-control" name="password" id="loginPassword" placeholder="Digite sua senha">
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Cadastro -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Cadastrar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulário de Cadastro -->
                    <form method="POST" action="{{route('register')}}">
                        @csrf
                        <div class="form-group">
                            <label for="registerName">Nome</label>
                            <input type="text" class="form-control" id="registerName" name="name" placeholder="Digite seu nome">
                        </div>
                        <div class="form-group">
                            <label for="registerEmail">Email</label>
                            <input type="email" class="form-control" id="registerEmail" name="email" placeholder="Digite seu email">
                        </div>
                        <div class="form-group">
                            <label for="registerPassword">Senha</label>
                            <input type="password" class="form-control" name="password" id="registerPassword" placeholder="Digite sua senha">
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(Request::is('/'))
    <div class="welcome-container">
        <div class="welcome-animation">
            <h1>Bem-vindo hoje é um belo dia para organizar suas tarefas!!!</h1>
            <p class="welcome-animation">Enquanto pensa quais tarefas criar que tal um joguinho?? Go Go Go</p>
        </div>

        <div class="tic-tac-toe">
            <div id="successMessage" class="success-message"></div>
            <h2>Jogo da Velha</h2>
            <div class="board">
                <div class="row">
                    <div class="cell" onclick="makeMove(0)"></div>
                    <div class="cell" onclick="makeMove(1)"></div>
                    <div class="cell" onclick="makeMove(2)"></div>
                </div>
                <div class="row">
                    <div class="cell" onclick="makeMove(3)"></div>
                    <div class="cell" onclick="makeMove(4)"></div>
                    <div class="cell" onclick="makeMove(5)"></div>
                </div>
                <div class="row">
                    <div class="cell" onclick="makeMove(6)"></div>
                    <div class="cell" onclick="makeMove(7)"></div>
                    <div class="cell" onclick="makeMove(8)"></div>
                </div>
            </div>
            <button onclick="resetGame()">Reiniciar</button>
        </div>
    </div>


    @endif

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="../../js/script.js"></script>
</body>

</html>