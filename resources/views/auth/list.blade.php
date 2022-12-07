
@extends('./layouts/navbar')

@section('navbar')
<body class="home">

    <nav class="nav bg-white border-b border-gray-100">
        <div class="container">
            <h4>Soccy</h4>

            <form class="search-bar d-flex" role="search" action="/home" method="GET"> 
                <i class="uil uil-search"></i>
                <input type="search" id="search" name="search-post" placeholder="Pesquisar tópico">
                <button type="submit" class="search-btn">Pesquisar</button>
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
                    <button type="button" class="botao" data-bs-toggle="modal" data-bs-target="#listModal">
                        Criar lista
                    </button> 
            </div>


            <!-- ========= HUMOR ============ -->

            <div class="modal fade" id="modalHumor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Como você está se sentindo hoje?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                            
                    <div class="modal-body">
                        <div class="container px-sm-0 my-sm-0">
                        @if (isset ($humor))
                        <form id="contactForm" action="/humor/{{$humor->id}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @else
                        <form action="/humor" method="POST">
                        @endif
                        @csrf
                                        
                        <div class="form-floating mb-3">
                            <input class="form-control" name="humor" id="nomeDoTopico" type="text" placeholder="Hoje estou..." data-sb-validations="required" />
                            <label for="nomeDoTopico">Hoje estou me sentindo...</label>
                            <div class="invalid-feedback" data-sb-feedback="nomeDoTopico:required">Humor é obrigatório.</div>
                            </div>
                        <div class="d-grid">
                            <button class="btn btn-primary" id="submitButton" type="submit"><P>Postar</P></button>
                        </div>
                                            
                        </form>
                        </div>
                        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
                    </div>
                </div>
                </div>
            </div>
                            
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


            <!-- Modal Criar Lista -->
            <div class="modal fade" id="listModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal lista</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="container px-sm-0 my-sm-0">
                            <form id="contactForm" action="/lista" method="POST" enctype="multipart/form-data">
                            @csrf

                                <!-- Nome da Lista -->
                                <div class="input-field">
                                    <input type="text"  name="nome" id="nome" placeholder="Digite um nome" required>
                                    <i class="uil uil-edit-alt"></i>
                                    <div class="invalid-feedback" data-sb-feedback="nome:required">Nome é obrigatório.</div>
                                </div>
                                <!-- Tópico da Lista -->
                                <div class="input-field">
                                    <input type="text" name="topico" id="nomeDoTopico" placeholder="Digite o tópico" required>
                                    <i class="uil uil-edit-alt"></i>
                                    <div class="invalid-feedback" data-sb-feedback="nomeDoTopico:required">Nome do Tópico é obrigatório.</div>
                                </div>

                                <!-- Descrição da Lista -->
                                <div class="input-field">
                                    <input type="text"  name="descricao" id="descricao" placeholder="Digite uma descrição" required>
                                    <i class="uil uil-edit-alt"></i>
                                    <div class="invalid-feedback" data-sb-feedback="descricao:required">Descrição é obrigatória.</div>
                                </div>

                                <!-- Item 01 -->
                                <div class="input-field">
                                    <input type="text"  name="item1" id="item1" placeholder="Item 01" required>
                                    <i class="uil uil-edit-alt"></i>
                                    <div class="invalid-feedback" data-sb-feedback="item1:required">Item 01 é obrigatório.</div>
                                </div>

                                <!-- Item 02 -->
                                <div class="input-field">
                                    <input type="text"  name="item2" id="item2" placeholder="Item 02" required>
                                    <i class="uil uil-edit-alt"></i>
                                    <div class="invalid-feedback" data-sb-feedback="item2:required">Item 02 é obrigatório.</div>
                                </div>

                                <!-- Item 03 -->
                                <div class="input-field">
                                    <input type="text"  name="item3" id="item3" placeholder="Item 03" required>
                                    <i class="uil uil-edit-alt"></i>
                                    <div class="invalid-feedback" data-sb-feedback="item3:required">Item 03 é obrigatório.</div>
                                </div>

                                <!-- Item 04 -->
                                <div class="input-field">
                                    <input type="text"  name="item4" id="item4" placeholder="Item 04" required>
                                    <i class="uil uil-edit-alt"></i>
                                    <div class="invalid-feedback" data-sb-feedback="item4:required">Item 04 é obrigatório.</div>
                                </div>

                                <!-- Item 05 -->
                                <div class="input-field">
                                    <input type="text"  name="item5" id="item5" placeholder="Item 05" required>
                                    <i class="uil uil-edit-alt"></i>
                                    <div class="invalid-feedback" data-sb-feedback="item5:required">Item 05 é obrigatório.</div>
                                </div>

                                <!-- Item 06 -->
                                <div class="input-field">
                                    <input type="text"  name="item6" id="item6" placeholder="Item 06" required>
                                    <i class="uil uil-edit-alt"></i>
                                    <div class="invalid-feedback" data-sb-feedback="item6:required">Item 06 é obrigatório.</div>
                                </div>

                                <!-- Item 07 -->
                                <div class="input-field">
                                    <input type="text"  name="item7" id="item7" placeholder="Item 07" required>
                                    <i class="uil uil-edit-alt"></i>
                                    <div class="invalid-feedback" data-sb-feedback="item7:required">Item 07 é obrigatório.</div>
                                </div>

                                <!-- Item 08 -->
                                <div class="input-field">
                                    <input type="text"  name="item8" id="item8" placeholder="Item 08" required>
                                    <i class="uil uil-edit-alt"></i>
                                    <div class="invalid-feedback" data-sb-feedback="item8:required">Item 08 é obrigatório.</div>
                                </div>

                                <!-- Item 09 -->
                                <div class="input-field">
                                    <input type="text"  name="item9" id="item9" placeholder="Item 09" required>
                                    <i class="uil uil-edit-alt"></i>
                                    <div class="invalid-feedback" data-sb-feedback="item9:required">Item 09 é obrigatório.</div>
                                </div>

                                <!-- Item 10 -->
                                <div class="input-field">
                                    <input type="text"  name="item10" id="item10" placeholder="Item 10" required>
                                    <i class="uil uil-edit-alt"></i>
                                    <div class="invalid-feedback" data-sb-feedback="item10:required">Item 10 é obrigatório.</div>
                                </div>
                                
                                <!-- Imagem -->
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">
                                    <i class="uil uil-upload"></i>
                                    Adicionar imagem</label>
                                </div>
                        </div>
                        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="close-btn btn" data-bs-dismiss="modal">Close</button>
                        <button class="submit-btn btn" id="submitButton" type="submit">Criar</button>
                    </div>
                            </form>

                    </div>
                </div>
            </div>

            <div class="middle">
                <!---------- FEEDS ---------->
                @if ($lista->isEmpty())
                    <div class="feeds">
                        <div class="feed">
                            <h5>Nenhuma lista disponível</h5> 
                        </div>
                    </div> 
                @else
                @foreach($lista as $lista)                                
                    <div class="feeds">
                        <!---------- FEED ---------->
                        <div class="feed">
                            <div class="head">
                                <div class="user">
                                    <div class="profile-photo">
                                        <img src="/img/{{$lista->avatar}}">
                                    </div>
                                    <div class="info">
                                        <h5>{{$lista->name}}</</h5><br>
                                        <p class="text-muted">{{$lista->topico}}</p>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <button class="dropdown botao-editar" type="button" id="dropdownMenuButton"  data-toggle="dropdown" aria-expanded="false">
                                        <i class="uil uil-ellipsis-v"></i>
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="/lista/edit/{{$lista->id}}">Editar</a>
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#excluir-postModal">Excluir</a>
                                    </div>
                                </div>
                            </div>

                            <div class="photo">
                                <img src="/img/{{$lista->image}}">
                            </div>

                                <div class="caption">
                                    <p><b>{{$lista->username}}</b> 
                                    {{$lista->nome}}</p>
                                </div>
                                <div class="caption">
                                    <p>{{$lista->descricao}}</p>
                                </div>
                                <div class="caption">
                                    <p><b>{{$lista->item1}}</b></p> 
                                </div>
                                <div class="caption">
                                    <p><b>{{$lista->item2}}</b></p> 
                                </div>
                                <div class="caption">
                                    <p><b>{{$lista->item3}}</b></p> 
                                </div>
                                <div class="caption">
                                    <p><b>{{$lista->item4}}</b></p> 
                                </div>
                                <div class="caption">
                                    <p><b>{{$lista->item5}}</b></p> 
                                </div>
                                <div class="caption">
                                    <p><b>{{$lista->item6}}</b></p> 
                                </div>
                                <div class="caption">
                                    <p><b>{{$lista->item7}}</b></p> 
                                </div>
                                <div class="caption">
                                    <p><b>{{$lista->item8}}</b></p> 
                                </div>
                                <div class="caption">
                                    <p><b>{{$lista->item9}}</b></p> 
                                </div>
                                <div class="caption">
                                    <p><b>{{$lista->item10}}</b></p> 
                                </div>

                        </div>                            
                        <!---------- FIM DO FEED ---------->
                    </div>
                @endforeach
                @endif
            </div>

            <!-- Modal Excluir Postagem-->
            <div class="modal fade" id="excluir-postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Atenção!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Deseja realmente excluir essa postagem? Essa ação não pode ser desfeita.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <form action="" method="POST">
                            @csrf 
                            @method('DELETE')
                            <button class="dropdown-item" type="submit">
                            Excluir</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>



            <div class="right">
                <!-- ====== SUGESTÕES DE AMIZADE ====== -->
                <div class="friend-requests">
                            <h4>Sugestões de Amizade</h4>

                            <form class="search-bar d-flex" role="search" action="/home" method="GET"> 
                                <i class="uil uil-search"></i>
                                <input type="search" id="search" name="search-requests" placeholder="Pesquisar usuários">
                                <button type="submit" class="search-btn">Pesquisar</button>
                            </form>
                            <!-- ====== SOLICITAÇÃO 1 ====== -->
                                @if ($users->isEmpty())
                                    <div class="request">
                                        <div class="info">
                                            Adicione outro usuário
                                        </div>
                                    </div> 
                                @else
                                @foreach($users as $user)
                                <div class="request">
                                    <div class="info">
                                        <div class="profile-photo">
                                            <img src="/img/{{ $user->avatar }}" alt="">
                                        </div>
                                    <div>
                                        <h5>{{ $user->name }}</h5>
                                        <p class="text-muted">{{ $user->username }}</p>
                                        </div>
                                    </div>

                                    <div class="action-btn">
                                    <x-app-layout>@livewire('user-follow', ['userId' => $user->id])
                                    </x-app-layout>
                                    </div>

                                </div>
                                @endforeach
                                @endif
                </div>
               
            </div> <!-- FIM DA DIREITA-->

            
        </div>
    </main>

</body>

    <!-- Scripts -->
    <script>

        let shoppingCart = document.querySelector('.shopping-cart');

        document.querySelector('#cart-btn').onclick = () =>{
            shoppingCart.classList.toggle('active');
            loginForm.classList.remove('active');
            navbar.classList.remove('active');
        }

        let loginForm = document.querySelector('.login-form');

        document.querySelector('#login-btn').onclick = () =>{
            loginForm.classList.toggle('active');
            shoppingCart.classList.remove('active');
            navbar.classList.remove('active');
        }

        //Mostrar e esconder Barra de Pesquisa
        const searchBar = document.querySelector(".search input"),
        searchBtn = document.querySelector(".search button");

        searchBtn.onclick = ()=>{
        searchBar.classList.toggle("active");
        searchBar.focus();
        searchBtn.classList.toggle("active");
        }

       //laravel que recebe o elemento html (Modal)
        const commentModal = document.getElementById('commentModal');

        //adiciona um evento, toda vez que o modal for aberto
        commentModal.addEventListener('show.bs.modal', function (event){

        //variavel que recebe o botao que acionou o modal
        const button = event.relatedTarget

        //variável que recebe o formulário do modal
        const h6 = document.getElementById('postId');
        });
    </script>
@endsection