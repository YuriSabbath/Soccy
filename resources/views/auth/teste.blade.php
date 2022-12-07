@extends('./layouts/navbar')

@section('navbar')

@auth 
<body class="home">
    
    <nav class="nav bg-white border-b border-gray-100">
        <div class="container">
            <h4>Soccy</h4>

            <form class="search-bar d-flex" role="search" action="/agenda" method="GET"> 
                <i class="uil uil-search"></i>
                <input type="search" id="search" name="search" placeholder="Pesquisar nome de eventos">
                <button type="submit">Pesquisar</button>
            </form>

            <div class="btn-group">
                <div class="icones">
                    <i class="icon uil uil-bell" id="cart-btn"></i>
                    <i class="icon uil uil-envelope" id="login-btn"></i>   
                </div>
            </div>


            <div class="dropdown">
                    <img class="profile-photo dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                    src="/img/{{auth()->user()->image}}"
                    >

                    <ul class="dropdown-menu">
                        @auth
                        <h3>{{ Auth::user()->name }}<br>
                        <span>{{ Auth::user()->username }}</span></h3>
                        @endauth

                        <li><a class="dropdown-item" href="#">
                            <i class="uil uil-home"></i>
                            <p>Início</p></a>
                        </li>
                        <li><a class="dropdown-item" href="/users">
                        <i class="icon uil uil-bell"></i>
                            <p>Notificação</p></a>
                        </li>
                        <li><a class="dropdown-item" href="/list">
                        <i class="icon uil uil-envelope"></i>
                            <p>Chat</p></a>
                        </li>
                        <li><a class="dropdown-item" href="/profile">
                            <i class="uil uil-user"></i>
                            <p>Meu perfil</p></a>
                        </li>
                        <li><a class="dropdown-item" href="#">
                            <i class="uil uil-palette"></i>
                            <p>Tema</p></a>
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
    
            <div class="shopping-cart">
                <div class="wrapper">
                <section class="users">

                    <header>
                        <div class="notification-header">
                            <h4>Notificações</h4>
                        </div>
                    </header>

                    <div class="users-list">
                        <a href="#">
                            <div class="content">
                                <img src="/images/emilly_perfil.jpg" alt="">
                                <div class="details">
                                    <span>@lukinhas</span>
                                    <p>comentou na sua postagem</p>
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="content">
                                <img src="/images/gaspari_perfil.jpg" alt="">
                                <div class="details">
                                    <span>@lukinhas</span>
                                    <p>curtiu sua postagem</p>
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="content">
                                <img src="/images/yuri_perfil.jpg" alt="">
                                <div class="details">
                                    <span>@lukinhas</span>
                                    <p>está seguindo você</p>
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="content">
                                <img src="/images/gaspari_perfil.jpg" alt="">
                                <div class="details">
                                    <span>@lukinhas</span>
                                    <p>está seguindo você</p>
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="content">
                                <img src="/images/yuri_perfil.jpg" alt="">
                                <div class="details">
                                    <span>@lukinhas</span>
                                    <p>respondeu seu comentário</p>
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="content">
                                <img src="/images/emilly_perfil.jpg" alt="">
                                <div class="details">
                                    <span>@lukinhas</span>
                                    <p>fez um comentário na sua postagem</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </section>
                </div>
            </div>
        
            <div class="login-form">
                <div class="box">

                </div>
            </div>
        </div>
        
    </nav>

    <main class="main-home">
        <div class="container">
            <!-- ========== LEFT ========== -->
            <div class="left">
                <a class="profile">
                    <div class="profile-photo">
                        <img src="/img/{{Auth()->user()->avatar}}">
                    </div>
                    <div class="handle">
                        <h6>{{Auth()->user()->name}}</h6>
                        <p class="text-muted">{{Auth()->user()->username}}</p>
                    </div>
                </a>

                <ul class="dropdown-menu">
                        <h3>{{auth()->user()->name}}<br><span>{{auth()->user()->username}}</span></h3>
                        <li><a href="/soccy/home">
                        <i class="uil uil-home"></i>Inicio</a>
                        </li>
                        <li><a href="/soccy/perfil">
                            <i class="fa-solid fa-user"></i>Meu Perfil</a>
                        </li>
                        <li><a href="">
                            <i class="fa-solid fa-palette"></i>Tema</a>
                        </li>
                        <li><a href="">
                            <i class="fa-solid fa-gear"></i>Configurações</a>
                        </li>
                        <li><a href="">
                            <i class="fa-solid fa-right-from-bracket"></i>Sair</a>
                        </li>
                    </ul>
                </div>

                </div>
        </div>

            
    </div>
</nav> 

<main class="main-home">
<div class="container">

    <!-- ========== LEFT ========== -->
    <div class="left">
            <a class="profile">
                <div class="profile-photo">
                    <img src="/images/yuri_perfil.jpg">
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
                    <a class="menu-item active" href="/home">
                        <span><i class="uil uil-home"></i></span> <h3>Início</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-grin-tongue-wink-alt"></i></span> <h3>Humor</h3>
                    </a>
                    <a class="menu-item" href="/agenda">
                        <span><i class="uil uil-calendar-alt"></i></span> <h3>Agenda</h3>
                    </a>

                    <a class="menu-item">
                        <span><i class="uil uil-diary"></i></span> <h3>Diário</h3>
                    </a>

                    <a class="menu-item" href="/lista">
                        <span><i class="uil uil-clipboard-notes"></i></span> <h3>Listas</h3>
                    </a>

                    <a class="menu-item">
                        <span><i class="uil uil-books"></i></span> <h3>Bookmarks</h3>
                    </a>
            </div>
            <!---------- END OF SIDEBAR ---------->


        </div>

        

        <div class="middle">
            <!---------- FEEDS ---------->
            <div class="feeds">

            <div class="card" style="width: 30rem; ">
                <div class="card-body">
                @foreach ($humor as $humor)
                <h5 class="card-title" style="padding-bottom: 1rem;">Humor</h5>
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div>{{$humor->humor}}</div>
                    </div>
                    <button type="button" class="btn botao-roxo">Excluir</button>
                    </li>
                </ol>
                @endforeach
                </div>
                        </div>
                </div>
      </div>
               <!--
             
                
                
               
                     -->
                
                <!---------- FIM DOS FEEDS ---------->
    
            </div>
        </div>
    
    </div>
    </main>

    </body>

    @endauth

@endsection