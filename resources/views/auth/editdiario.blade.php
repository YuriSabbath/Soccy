@extends('./layouts/navbar')

@section('navbar')

@auth 
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

                <!--------------- SIDEBAR --------------->
                <div class="sidebar">
                                <a class="menu-item" href="/home">
                                    <span><i class="uil uil-home"></i></span> <h3>Início</h3>
                                </a>
                                <a class="menu-item" data-toggle="modal" data-target="#modalHumor">
                                    <span><i class="uil uil-grin-tongue-wink-alt"></i></span> <h3>Humor</h3>
                                </a>
                                <a class="menu-item" href="/agenda">
                                    <span><i class="uil uil-calendar-alt"></i></span> <h3>Agenda</h3>
                                </a>
                                <a class="menu-item active" href="/lista">
                                    <span><i class="uil uil-clipboard-notes"></i></span> <h3>Listas</h3>
                                </a>

                        </div>
                  <!---------- END OF SIDEBAR ---------->
        </div>
 <!-- ========== MIDDLE ========== -->
 <div class="middle">
            <form id="contactForm"action="/diario/update/{{$diario->id}}" method="POST" enctype="multipart/form-data">
            @csrf
                            @method('PUT')
                            <div class="form-floating mb-3">
                                <input class="form-control" name="nome" id="nomeDoTopico" type="text" placeholder="Nome do Tópico" data-sb-validations="required" value="{{$diario->nome}}" />
                                <label for="nome">Nome</label>
                                <div class="invalid-feedback" data-sb-feedback="nome:required">Nome.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="date" class="form-control" id="dataMed" type="date" placeholder="Data da medição" data-sb-validations="required" value="{{$diario->date}}"/>
                                <label for="data">Data</label>
                                <div class="invalid-feedback" data-sb-feedback="Data:required">Data é obrigatorio.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="texto" id="descricao" type="text" placeholder="Descrição" style="height: 10rem;" data-sb-validations="required" value="{{$diario->texto}}"></textarea>
                                <label for="descricao">Texto</label>
                                <div class="invalid-feedback" data-sb-feedback="descricao:required">Descrição é obrigatória.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="humor" id="nomeDoTopico" type="text" placeholder="Nome do Tópico" data-sb-validations="required" value="{{$diario->humor}}"/>
                                <label for="lembrete">Humor</label>
                                <div class="invalid-feedback" data-sb-feedback="lembrete:required">lembrete.</div>
                            </div>
                            <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Escolher foto</label>
                                        </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg " id="submitButton" type="submit">Editar</button>
                    </div>
                    
                </form>
            </div>

           @endauth

    @endsection