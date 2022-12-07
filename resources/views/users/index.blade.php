

<link rel="stylesheet" href="/css/chat.css">
<link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/images') }}">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

<body class="home">
    


    <nav class="nav bg-white border-b border-gray-100">
        <div class="container">
            <h4>Soccy</h4>

            <form class="search-bar d-flex" role="search">
                <i class="uil uil-search"></i>
                <input type="search" placeholder="Pesquisar" aria-label="Search">
            </form>


            <div class="dropdown">
                <img class="profile-photo dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                src="/images/emilly_perfil.jpg"
                >

                <ul class="dropdown-menu">
                    @auth
                    <h3>{{ Auth::user()->name }}<br>
                    <span>{{ Auth::user()->email }}</span></h3>
                    @endauth

                    <li><a class="dropdown-item" href="#">
                        <i class="uil uil-home"></i>
                        <p>Início</p></a>
                    </li>
                    <li><a class="dropdown-item" href="#">
                        <i class="uil uil-user"></i>
                        <p>Meu perfil</p></a>
                    </li>
                    <li><a class="dropdown-item" href="#">
                        <i class="uil uil-palette"></i>
                        <p>Tema</p></a>
                    </li>
                    <li><a class="dropdown-item" href="#">
                        <i class="uil uil-setting"></i>
                        <p>Configurações</p> </a>
                    </li>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="uil uil-signout"></i>
                        <p>Sair</p></a>
                    </li>
                </ul>
            </div>
        
    </nav>
    
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <br><br><br><br><h4>Sugestões de Amizade</h4><hr>
                <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nome</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Ação</span>
                                </th>
                                @auth
                                <th class="px-6 py-3 bg-gray-50"></th>
                                @endauth
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                        @if ($users->isEmpty())
                            <tr>
                                <td colspan="2"><br>Nenhuma usuário cadastrado<br></td>
                            </tr>
                                
                            @else

                                @foreach($users as $user)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $user->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $user->email }}
                                        </td>
                                        @auth
                                            <td>
                                                @livewire('user-follow', ['userId' => $user->id])
                                            </td>
                                        @endauth
                                    </tr>
                                @endforeach

                                @endif

                        </tbody>
                </table>
            </div>
            {{ $users->links() }}
        </div>
    </div>

</body>

    <!-- Scripts -->
    <script src="{{ asset('/js/popper.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>

    <x-app-layout>
    </x-app-layout>