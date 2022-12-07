
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
                    <a class="menu-item" href="/lista">
                        <span><i class="uil uil-clipboard-notes"></i></span> <h3>Listas</h3>
                    </a>
                    <a class="menu-item active" href="/profile">
                        <span><i class="uil uil-user"></i></span> <h3>Perfil</h3>
                    </a>
                    <a class="menu-item" href="/edit-profile">
                        <span><i class="uil uil-setting"></i></span> <h3>Configurações</h3>
                    </a>
                </div>
                <!---------- END OF SIDEBAR ---------->
                    <button type="button" class="botao" data-bs-toggle="modal" data-bs-target="#postModal">
                        Criar post
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


            <!-- Modal Post -->
            <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal postagem</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="container px-sm-0 my-sm-0">
                            <form id="contactForm" action="/post" method="POST" enctype="multipart/form-data">
                            @csrf

                                <div class="input-field">
                                    <input type="text" name="topico" id="nomeDoTopico" placeholder="Digite o tópico" required>
                                    <i class="uil uil-edit-alt"></i>
                                    <div class="invalid-feedback" data-sb-feedback="nomeDoTopico:required">Nome do Tópico é obrigatório.</div>
                                </div>

                                <div class="input-field">
                                    <input type="text"  name="legenda" id="descricao" placeholder="Digite uma descrição" required>
                                    <i class="uil uil-edit-alt"></i>
                                    <div class="invalid-feedback" data-sb-feedback="descricao:required">Descrição é obrigatória.</div>
                                </div><br>
                                            
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
                @if ($post->isEmpty())
                    <div class="feeds">
                        <div class="feed">
                            <h5>Nenhuma postagem disponível</h5> 
                        </div>
                    </div> 
                @else
                @foreach($post as $post)                                
                    <div class="feeds">
                        <!---------- FEED ---------->
                        <div class="feed">
                            <div class="head">
                                <div class="user">
                                    <div class="profile-photo">
                                        <img src="/img/{{$post->avatar}}">
                                    </div>
                                    <div class="info">
                                        <h5>{{$post->name}}</</h5><br>
                                        <p class="text-muted">{{$post->topico}}</p>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <button class="dropdown botao-editar" type="button" id="dropdownMenuButton"  data-toggle="dropdown" aria-expanded="false">
                                        <i class="uil uil-ellipsis-v"></i>
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="">Editar</a>
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#excluir-postModal">Excluir</a>
                                    </div>
                                </div>
                            </div>

                            <div class="photo">
                                <a href="/home/{{$post->id}}">
                                <img src="/images/{{$post->image}}">
                                </a>
                            </div>

                            <div class="action-buttons">
                                <div class="interaction-button">
                                    <span><i class="uil uil-heart"></i></span>
                                    <a data-bs-toggle="modal" data-bs-target="#commentModal" role="button">
                                    <span><i class="uil uil-comment"></i></span>
                                    </a>
                                    
                                    <span><i class="uil uil-share"></i></span>
                                </div>

                                <div class="bookmark">
                                    <span><i class="uil uil-bookmark"></i></span>
                                </div>
                            </div>

                                <div class="caption">
                                    <p><b>martinelli.mp3</b> 
                                    {{$post->legenda}}</p>
                                    <!-- Button trigger modal -->

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

            
            <!-- Modal Comment -->
            <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal comentário</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                    
                        <div class="row">
                            <div class="col">
                            </div>
                            <div class="col">
                            <form id="contactForm" action="{{route ('comentario', $post->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="post_id" value="{{$post->id}}">

                                <h5>{{$post->id}}</h5>

                                <div class="input-field">
                                    <input type="text" name="coment" id="comentario" placeholder="Escreva um comentário" required>
                                    <i class="uil uil-edit-alt"></i>
                                    <div class="invalid-feedback" data-sb-feedback="comentario:required">Comentário é obrigatório.</div>
                                </div>
                            </div>
                        </div>
                    
                        
                        <div class="container px-sm-0 my-sm-0">
                            
                        </div>
                        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="close-btn btn" data-bs-dismiss="modal">Close</button>
                        <button class="submit-btn btn" id="submitButton" type="submit">Comentar</button>
                    </div>
                            </form>

                    </div>
                </div>
            </div>


            <div class="right">
                <!-- ====== SUGESTÕES DE AMIZADE ====== -->
                <div class="friend-requests">
                            <h4>Sugestões de Amizade</h4>

                            <form class="search-bar d-flex" role="search" action="/home" method="GET"> 
                                <i class="uil uil-search"></i>
                                <input type="search" id="search" name="search-requests" placeholder="Pesquisar usuário">
                                <button type="submit" class="search-btn">Pesquisar</button>
                            </form>
                            <!-- ====== SOLICITAÇÃO 1 ====== -->
                                @if ($users->isEmpty())
                                    <div class="request">
                                        <div class="info">
                                            Usuários não encontrados. 
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
                                        <button class="view-btn">Ver perfil</button>
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


