<link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/images') }}">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

<!-- Link cdn do font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<script src="https://kit.fontawesome.com/7504d1f47e.js" crossorigin="anonymous"></script>
    @auth

        <body class="upload">

            <div class="header">
                    <h2>Foto de Perfil</h2>
                    <a href="/edit-profile"><i class="fas fa-times"></i></a>
            </div>

            <div class="center">
                <div class="container-upload">
                    <form action="/edit-profile/update/foto/{{auth()->user()->id}}" class="edit-profile" method="POST" enctype="multipart/form-data">
                        @csrf 
                        @method('PUT')
                
                        <div class="wrapper">
                            <div class="image">
                                <img src="" alt="">
                            </div>

                            <div class="content">
                                <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                <div class="text">Nenhum arquivo escolhido.</div>
                            </div>

                            <div id="cancel-btn"><i class="fa-solid fa-xmark"></i></div>
                            <div class="file-name"><p>Nome do arquivo aqui<p></div>
                        </div>

                                <input name="image" type="file" class="form-control-file" id="default-btn" id="custom-btn" hidden>
                                <button onclick="defaultBtnActive()" type="button" id="custom-btn">Escolher um arquivo</button>  

                                <button class="btn btn-primary btn-lg flex-fill me-1" id="custom-btn" type="submit">Enviar</button>
                    </div>
                    </form>
                </div>
            </div>

            <script>
                const wrapper = document.querySelector(".wrapper");
                const fileName = document.querySelector(".file-name");
                const cancelBtn = document.querySelector("#cancel-btn");
                const defaultBtn = document.querySelector("#default-btn");
                const customBtn = document.querySelector("#custom-btn");
                const img =  document.querySelector("img");
                let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

                function defaultBtnActive(){
                    defaultBtn.click();
                }

                // Faz aparecer a imagem que vai ser postada

                defaultBtn.addEventListener("change", function(){
                const file = this.files[0];
                if(file){
                    const reader = new FileReader();
                    reader.onload = function(){
                        const result = reader.result;
                        img.src = result;
                        wrapper.classList.add("active");
                    }
                    //remover foto
                    cancelBtn.addEventListener("click", function(){
                        img.src = "";
                        wrapper.classList.remove("active");
                    });

                    reader.readAsDataURL(file);
                }

                // Faz aparecer o nome do arquivo da imagem

                    if(this.value){
                        let valueStore = this.value.match(regExp);
                        fileName.textContent = valueStore;
                    }
                });
            </script>

        </body>

    @endauth

