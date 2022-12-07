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
                    <a class="menu-item" href="/humor">
                        <span><i class="uil uil-grin-tongue-wink-alt"></i></span> <h3>Humor</h3>
                    </a>
                    <a class="menu-item" href="/agenda">
                        <span><i class="uil uil-calendar-alt"></i></span> <h3>Agenda</h3>
                    </a>
                    <a class="menu-item active" href="/lista">
                        <span><i class="uil uil-clipboard-notes"></i></span> <h3>Listas</h3>
                    </a>
                    <a class="menu-item" href="/profile">
                        <span><i class="uil uil-user"></i></span> <h3>Perfil</h3>
                    </a>
                    <a class="menu-item" href="/edit-profile">
                        <span><i class="uil uil-setting"></i></span> <h3>Configurações</h3>
                    </a>
                </div>
                  <!---------- END OF SIDEBAR ---------->
        </div>
   <!-- ========== MIDDLE ========== -->
   <div class="middle">
        <div class="feeds">
            <div class="feed">
            <form id="contactForm"action="/lista/update/{{$lista->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="photo">
                    <img src="/img/{{$lista->image}}">
                </div>
                
                <!-- Imagem -->
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">
                    <i class="uil uil-upload"></i>
                    Trocar imagem</label>
                </div> 
                    
                <!-- Nome da Lista -->
                <div class="input-field">
                    <input type="text"  name="nome" id="nome" placeholder="Digite um nome" value="{{$lista->nome}}">
                    <i class="uil uil-edit-alt"></i>
                    <div class="invalid-feedback" data-sb-feedback="nome:required">Nome é obrigatório.</div>
                </div>

                <!-- Tópico da Lista -->
                <div class="input-field">
                    <input type="text" name="topico" id="nomeDoTopico" placeholder="Digite o tópico" value="{{$lista->topico}}">
                    <i class="uil uil-edit-alt"></i>
                    <div class="invalid-feedback" data-sb-feedback="nomeDoTopico:required">Nome do Tópico é obrigatório.</div>
                </div>

                <!-- Descrição da Lista -->
                <div class="input-field">
                    <input type="text"  name="descricao" id="descricao" placeholder="Digite uma descrição" value="{{$lista->descricao}}">
                    <i class="uil uil-edit-alt"></i>
                    <div class="invalid-feedback" data-sb-feedback="descricao:required">Descrição é obrigatória.</div>
                </div>

                <!-- Item 01 -->
                <div class="input-field">
                    <input type="text"  name="item1" id="item1" placeholder="Item 01" value="{{$lista->item1}}">
                    <i class="uil uil-edit-alt"></i>
                    <div class="invalid-feedback" data-sb-feedback="item1:required">Item 01 é obrigatório.</div>
                </div>

                <!-- Item 02 -->
                <div class="input-field">
                    <input type="text"  name="item2" id="item2" placeholder="Item 02" value="{{$lista->item2}}">
                    <i class="uil uil-edit-alt"></i>
                    <div class="invalid-feedback" data-sb-feedback="item2:required">Item 02 é obrigatório.</div>
                </div>

                <!-- Item 03 -->
                <div class="input-field">
                    <input type="text"  name="item3" id="item3" placeholder="Item 03" value="{{$lista->item3}}">
                    <i class="uil uil-edit-alt"></i>
                    <div class="invalid-feedback" data-sb-feedback="item3:required">Item 03 é obrigatório.</div>
                </div>

                <!-- Item 04 -->
                <div class="input-field">
                    <input type="text"  name="item4" id="item4" placeholder="Item 04" value="{{$lista->item4}}">
                    <i class="uil uil-edit-alt"></i>
                    <div class="invalid-feedback" data-sb-feedback="item4:required">Item 04 é obrigatório.</div>
                </div>

                <!-- Item 05 -->
                <div class="input-field">
                    <input type="text"  name="item5" id="item5" placeholder="Item 05" value="{{$lista->item5}}">
                    <i class="uil uil-edit-alt"></i>
                    <div class="invalid-feedback" data-sb-feedback="item5:required">Item 05 é obrigatório.</div>
                </div>

                <!-- Item 06 -->
                <div class="input-field">
                    <input type="text"  name="item6" id="item6" placeholder="Item 06" value="{{$lista->item6}}">
                    <i class="uil uil-edit-alt"></i>
                    <div class="invalid-feedback" data-sb-feedback="item6:required">Item 06 é obrigatório.</div>
                </div>

                <!-- Item 07 -->
                <div class="input-field">
                    <input type="text"  name="item7" id="item7" placeholder="Item 07" value="{{$lista->item7}}">
                    <i class="uil uil-edit-alt"></i>
                    <div class="invalid-feedback" data-sb-feedback="item7:required">Item 07 é obrigatório.</div>
                </div>

                <!-- Item 08 -->
                <div class="input-field">
                    <input type="text"  name="item8" id="item8" placeholder="Item 08" value="{{$lista->item8}}">
                    <i class="uil uil-edit-alt"></i>
                    <div class="invalid-feedback" data-sb-feedback="item8:required">Item 08 é obrigatório.</div>
                </div>

                <!-- Item 09 -->
                <div class="input-field">
                    <input type="text"  name="item9" id="item9" placeholder="Item 09" value="{{$lista->item9}}">
                    <i class="uil uil-edit-alt"></i>
                    <div class="invalid-feedback" data-sb-feedback="item9:required">Item 09 é obrigatório.</div>
                </div>

                <!-- Item 10 -->
                <div class="input-field">
                    <input type="text"  name="item10" id="item10" placeholder="Item 10" value="{{$lista->item10}}">
                    <i class="uil uil-edit-alt"></i>
                    <div class="invalid-feedback" data-sb-feedback="item10:required">Item 10 é obrigatório.</div>
                </div><br>
                                
                <div class="d-grid">
                <button class="submit-btn btn" id="submitButton" type="submit">Editar</button>
                </div>
                    
        </form>
            </div>
        </div>
            
        </div>

        </div>
    </main>

           
@endauth
    @endsection