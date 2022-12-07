@extends('./layouts/navbar')

@section('navbar')
<body class="home">
    
    <nav class="nav bg-white border-b border-gray-100">
        <div class="container">
            <h4>Soccy</h4>

            <form class="search-bar d-flex" role="search" action="/home" method="GET"> 
                <i class="uil uil-search"></i>
                <input type="search" id="search" name="search" placeholder="Pesquisar tópico">
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

                <!--------------- SIDEBAR --------------->
                <div class="sidebar">
                    <a class="menu-item active" href="/home">
                        <span><i class="uil uil-home"></i></span> <h3>Início</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-grin-tongue-wink-alt"></i></span> <h3>Humor</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-calendar-alt"></i></span> <h3>Agenda</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-diary"></i></span> <h3>Diário</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-clipboard-notes"></i></span> <h3>Listas</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-books"></i></span> <h3>Bookmarks</h3>
                    </a>
                    
                </div>
                <!---------- END OF SIDEBAR ---------->
                    <button type="button" class="botao" data-bs-toggle="modal" data-bs-target="#postModal">
                        Criar post
                    </button> 
            </div>

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
            </div>

            <div class="perfil">
                    <div class="row row-cols-1 row-cols-md-3 g-4 gb-9">
                    @if($post->isEmpty())
                    <div class="col">
                            <div class="mb-3">
                                <h5>Publique seus momentos aqui</h5>
                            </div>
                    </div> 
                    @else
                    @foreach($post as $post)
                        <div class="col">
                            <div class=" h-100 photo-gallery">
                            <a href="/home/{{$post->id}}">
                            <img src="/images/{{$post->image}}" class="gallery-item card-img-top">
                            </a>
                            </div>
                        </div>
                    @endforeach
                    @endif
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
                        
                        <div class="container px-sm-0 my-sm-0">
                            <form id="contactForm" action="/comentario" method="POST" enctype="multipart/form-data">
                            @csrf

                                <div class="input-field">
                                    <input type="text" name="comment" id="comentario" placeholder="Escreva um comentário" required>
                                    <i class="uil uil-edit-alt"></i>
                                    <div class="invalid-feedback" data-sb-feedback="comentario:required">Comentário é obrigatório.</div>
                            </div>
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


