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
                    <a class="menu-item" href="/profile">
                        <span><i class="uil uil-user"></i></span> <h3>Perfil</h3>
                    </a>
                    <a class="menu-item active" href="/profile">
                        <span><i class="uil uil-setting"></i></span> <h3>Configurações</h3>
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
                                <h5><a href="/edit-profile/foto">Mudar foto de perfil</h5></a>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="label-input col-sm-2 col-form-label"><h6>Nome</h6></label>
                        <div class="input col-sm-9">
                            <input name="name" type="text" class="form-control" id="nome_usuario" value="{{auth()->user()->name}}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="label-input col-sm-2 col-form-label"><h6>Email</h6></label>
                        <div class="input col-sm-9">
                            <input name="email" type="email" class="form-control" id="email" value="{{auth()->user()->email}}" disabled>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="username" class="label-input col-sm-2 col-form-label"><h6>Usuário</h6></label>
                        <div class="input col-sm-9">
                            <input name="username" type="text" class="form-control" id="username" value="{{auth()->user()->username}}" disabled>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="pronoun" class="label-input col-sm-2 col-form-label"><h6>Pronome</h6></label>
                        <div class="input col-sm-9">
                            <input name="pronoun" type="text" class="form-control" id="pronoun" value="{{auth()->user()->pronoun}}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="bio" class="label-input col-sm-2 col-form-label"><h6>Bio</h6></label>
                        <div class="input col-sm-9">
                            <input name="bio" type="text" class="form-control" id="bio" value="{{auth()->user()->bio}}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="date" class="label-input col-sm-2 col-form-label"><h6>Aniversário</h6></label>
                        <div class="input col-sm-9">
                            <input name="date" type="date" class="form-control" id="date" value="{{auth()->user()->date}}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="date" class="label-input col-sm-2 col-form-label"><h6>Senha</h6></label>
                        <div class="input col-sm-9">
                            <input name="password" type="password" class="form-control" id="password">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="date" class="label-input col-sm-2 col-form-label"><h6>Confirmar</h6></label>
                        <div id="icon" onclick="showHide()" class="edit"></div>
                        <div class="input col-sm-9">
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

    <script>
        // ======== MOSTRAR E ESCONDER SENHA ========
        const password = document.getElementById('password');
            const cpassword = document.getElementById('cpassword');
            const icon = document.getElementById('icon');

            function showHide(){
                if(password.type === 'password'){
                    password.setAttribute('type','text');
                    icon.classList.add('hide')
                }
                else{
                    password.setAttribute('type', 'password');
                    icon.classList.remove('hide')
                }
            }
    </script>
@endsection
