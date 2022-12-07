@extends('./layouts/navbar')

@section('navbar')

<body class="home">

    <nav class="nav bg-white border-b border-gray-100">
        <div class="container">
            <h4>Soccy</h4>

            <form class="search-bar d-flex" role="search" action="/home" method="GET"> 
                <i class="uil uil-search"></i>
                <input type="search" id="search" name="search-post" placeholder="Pesquisar tópico">
                <button type="submit">Pesquisar</button>
            </form>

            <div class="dropdown">
                    <img class="profile-photo dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                    src="/img/{{Auth()->user()->avatar}}"
                    >

                    <ul class="dropdown-menu">
                        @auth
                        <h3>{{ Auth::user()->name }}<br>
                        <span>{{ Auth::user()->username }}</span></h3>
                        @endauth

                        <li><a class="dropdown-item" href="/home">
                            <i class="uil uil-home"></i>
                            <p>Início</p></a>
                        </li>
                        <li><a class="dropdown-item" href="/profile">
                            <i class="uil uil-user"></i>
                            <p>Perfil</p></a>
                        </li>
                        <li><a class="dropdown-item" href="/edit-profile">
                            <i class="uil uil-setting"></i>
                            <p>Configurações</p> </a>
                        </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li><a href="route('logout')" 
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            <i class="uil uil-signout"></i><p>Sair</p>
                            </a>
                        </li>  
                        </form>
                    </ul>
            </div>
        </div>
        
    </nav>

    <!---------------------- MAIN ---------------------->
    <main class="main-home">
        <div class="container">
            <!-- ========== LEFT ========== -->
            <div class="left">
                <a class="profile">
                    <div class="profile-photo">
                        <img src="/img/{{Auth()->user()->avatar}}">
                    </div>
                    <div class="handle">
                        <h6>{{auth()->user()->name}}</h6>
                        <p class="text-muted">
                            {{auth()->user()->username}}
                        </p>
                    </div>
                </a>

                <!--------------- SIDEBAR --------------->
                <div class="sidebar">
                    <a class="menu-item" href="/home">
                        <span><i class="uil uil-home"></i></span> <h3>Início</h3>
                    </a>
                    <a class="menu-item" href="/humor">
                        <span><i class="uil uil-grin-tongue-wink-alt"></i></span> <h3>Humor</h3>
                    </a>
                    <a class="menu-item" href="/agenda">
                        <span><i class="uil uil-calendar-alt"></i></span> <h3>Agenda</h3>
                    </a>
                    <a class="menu-item" href="/lista">
                        <span><i class="uil uil-clipboard-notes"></i></span> <h3>Listas</h3>
                    </a>
                    <a class="menu-item" href="/edit-profile">
                        <span><i class="uil uil-user"></i></span> <h3>Editar perfil</h3>
                    </a>
                    <a class="menu-item active" href="/alter-password">
                        <span><i class="uil uil-asterisk"></i></span> <h3>Alterar senha</h3>
                    </a>
                </div>
                <!---------- END OF SIDEBAR ---------->
                <a href="/home" class="botao">
                        Criar post
                </a> 
            </div>

            <!-- ========== MIDDLE ========== -->
            <div class="middle">
                        
                <form action="{{ route('profile.update') }}" class="edit-profile" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="lado">
                        <img src="/img/{{Auth()->user()->avatar}}">
                        <div class="baixo">
                            <h4 id="nome_usuario">{{auth()->user()->name}}</h4>
                            <div class="mb-3">
                                <h4><a href="/edit-profile/foto">Mudar foto de perfil</h4></a>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="password" class="label-input col-sm-5 col-form-label"><h6>Nova senha</h6></label>
                        <div class="input col-sm-5">
                            <input name="password" type="password" class="form-control" id="password">
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <label for="password_confirmation" class="label-input col-sm-5 col-form-label"><h6>Confirmar nova senha</h6></label>
                        <div class="input col-sm-5">
                            <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                        </div>
                    </div>

                    <x-button class="mt-4" class="botao">
                        Enviar
                    </x-button>
                </form>

            </div>

        </div>
    </main>   
</body>
@endsection
