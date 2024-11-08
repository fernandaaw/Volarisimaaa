<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Volarisima</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="icon" href="img/logobien.png" type="image/x-icon">
  <link rel="stylesheet" href="Style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&family=Shadows+Into+Light&display=swap"
    rel="stylesheet">
  <script>
    function registerUser(event) {
      event.preventDefault();

      const form = document.getElementById('registerForm');
      const formData = new FormData(form);

      fetch('register.php', {
        method: 'POST',
        body: formData
      })
        .then(response => response.json())
        .then(data => {
          const messageContainer = document.getElementById('message');
          if (data.success) {
            messageContainer.innerHTML = `<p style="color: green;">${data.message}</p>`;
            form.reset();

            // Mostrar la alerta de éxito
            alert("Registro exitoso. Ahora puedes iniciar sesión.");
          } else {
            messageContainer.innerHTML = `<p style="color: red;">${data.message}</p>`;
          }
        })
        .catch(error => {
          console.error('Error:', error);
          document.getElementById('message').innerHTML = `<p style="color: red;">Error en la solicitud.</p>`;
        });
    }
  </script>
  <script>
    // Función para mostrar el formulario de registro
    function showRegisterForm() {
      document.getElementById('registerFormContainer').style.display = 'block';
      document.getElementById('loginFormContainer').style.display = 'none';
    }

    // Función para mostrar el formulario de log in
    function showLoginForm() {
      document.getElementById('registerFormContainer').style.display = 'none';
      document.getElementById('loginFormContainer').style.display = 'block';
    }

    // Ejemplo de función para registro con fetch
    function registerUser(event) {
      event.preventDefault();

      const form = document.getElementById('registerForm');
      const formData = new FormData(form);

      fetch('register.php', {
        method: 'POST',
        body: formData
      })
        .then(response => response.json())
        .then(data => {
          const messageContainer = document.getElementById('message');
          if (data.success) {
            messageContainer.innerHTML = `<p style="color: green;">${data.message}</p>`;
            form.reset();
            alert("Registro exitoso. Ahora puedes iniciar sesión.");
          } else {
            messageContainer.innerHTML = `<p style="color: red;">${data.message}</p>`;
          }
        })
        .catch(error => {
          console.error('Error:', error);
          document.getElementById('message').innerHTML = `<p style="color: red;">Error en la solicitud.</p>`;
        });
    }
  </script>
  <script>
        // Mostrar el alert si hay un mensaje
        window.onload = function() {
            <?php if ($message): ?>
                alert("<?php echo addslashes($message); ?>");
            <?php endif; ?>
        };
    </script>
</head>
<header>
  <div class="row">
    <div class="col-md-4" id="ko">
      <img src="img/logobien.png" alt="logo" style="height: 10vh;">
      Volarisima
    </div>
    <div class="col-md-4">
    <h1>Hola, <?php echo $_SESSION['username']; ?></h1>
    </div>
    <div class="col-md-4">
      <div id="momo">
        <nav id="navbar-example2" class="navbar navbar-expand-lg">
          <button style="margin-top: -5vh;" class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="#abou">Sobre nosotros</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#destinos">Destinos</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#cont">Registro</a>
              </li>
            </ul>
          </div>
          <div id="icono">
          <div class="contenedor-imagen" data-bs-toggle="modal" data-bs-target="#ico">
              <svg id="iconico" style="cursor: pointer;"  xmlns="http://www.w3.org/2000/svg" width="3vh" height="3vh" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
</svg>
            </div>
          </div>
      </div>
      </nav>
    </div>
  </div>
  </div>
</header>

<body>
  <div class="container-fluid">
    <!--Inicio primera parte "START BOOTSTRAP"-->
    <div class="row" style="height: 55vh;background-image: url(img/avion.png);
    background-size: cover;
    background-repeat: no-repeat;" id="abou">
      <div class="row" id="sobrenosotros" id="unidi" id="abou">
        <!-- Columna Izquierda Vacía -->
        <div class="col-md-6"></div>

        <!-- Columna Derecha con el Contenido -->
        <div class="col-md-6" style="text-align: right;">
          <div>
            <br>
            <p id="est" style="color: white; margin-bottom: -2vh; margin-right: 1.5vw;">Vuelos</p>
          </div>
          <div id="simbooo">
            <div class="line"></div>
            <svg id="svg-1" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
              class="bi bi-airplane-engines" viewBox="0 0 16 16">
              <path
                d="M8 0c-.787 0-1.292.592-1.572 1.151A4.35 4.35 0 0 0 6 3v3.691l-2 1V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.191l-1.17.585A1.5 1.5 0 0 0 0 10.618V12a.5.5 0 0 0 .582.493l1.631-.272.313.937a.5.5 0 0 0 .948 0l.405-1.214 2.21-.369.375 2.253-1.318 1.318A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .354-.854l-1.318-1.318.375-2.253 2.21.369.405 1.214a.5.5 0 0 0 .948 0l.313-.937 1.63.272A.5.5 0 0 0 16 12v-1.382a1.5 1.5 0 0 0-.83-1.342L14 8.691V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v.191l-2-1V3c0-.568-.14-1.271-.428-1.849C9.292.591 8.787 0 8 0M7 3c0-.432.11-.979.322-1.401C7.542 1.159 7.787 1 8 1s.458.158.678.599C8.889 2.02 9 2.569 9 3v4a.5.5 0 0 0 .276.447l5.448 2.724a.5.5 0 0 1 .276.447v.792l-5.418-.903a.5.5 0 0 0-.575.41l-.5 3a.5.5 0 0 0 .14.437l.646.646H6.707l.647-.646a.5.5 0 0 0 .14-.436l-.5-3a.5.5 0 0 0-.576-.411L1 11.41v-.792a.5.5 0 0 1 .276-.447l5.448-2.724A.5.5 0 0 0 7 7z" />
            </svg>
            <div class="line"></div>
          </div>
          <p id="ji">Bienvenidos a Volarisima, tu puerta al mundo de los cielos abiertos. Nos especializamos
            en ofrecerte las mejores opciones de vuelos para llevarte a los destinos de tus sueños en España, ya sea
            para
            explorar, relajarte o conectar con quienes más importan. Con un equipo de expertos en viajes y una
            plataforma
            ágil y segura, hacemos que cada viaje sea fácil, accesible y adaptado a tus necesidades. ¡Descubre el placer
            de
            volar con nosotros y comienza tu próxima aventura hoy!</p>
        </div>
      </div>



    </div>
    <!--Fin primera parte "START BOOTSTRAP", inicio segunda parte "PORTFOLIO"-->
    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example"
      tabindex="0">
      <div class="row" id="destinos" style="height: 80vh;background-color:white; text-align: center;">
        <div class="col-md-12">

          <p id="est1">Destinos</p>
          <div id="simbo-1">
            <div class="line-1"></div> <svg id="svg-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
              fill="currentColor" class="bi bi-airplane-engines" viewBox="0 0 16 16">
              <path
                d="M8 0c-.787 0-1.292.592-1.572 1.151A4.35 4.35 0 0 0 6 3v3.691l-2 1V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.191l-1.17.585A1.5 1.5 0 0 0 0 10.618V12a.5.5 0 0 0 .582.493l1.631-.272.313.937a.5.5 0 0 0 .948 0l.405-1.214 2.21-.369.375 2.253-1.318 1.318A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .354-.854l-1.318-1.318.375-2.253 2.21.369.405 1.214a.5.5 0 0 0 .948 0l.313-.937 1.63.272A.5.5 0 0 0 16 12v-1.382a1.5 1.5 0 0 0-.83-1.342L14 8.691V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v.191l-2-1V3c0-.568-.14-1.271-.428-1.849C9.292.591 8.787 0 8 0M7 3c0-.432.11-.979.322-1.401C7.542 1.159 7.787 1 8 1s.458.158.678.599C8.889 2.02 9 2.569 9 3v4a.5.5 0 0 0 .276.447l5.448 2.724a.5.5 0 0 1 .276.447v.792l-5.418-.903a.5.5 0 0 0-.575.41l-.5 3a.5.5 0 0 0 .14.437l.646.646H6.707l.647-.646a.5.5 0 0 0 .14-.436l-.5-3a.5.5 0 0 0-.576-.411L1 11.41v-.792a.5.5 0 0 1 .276-.447l5.448-2.724A.5.5 0 0 0 7 7z" />
            </svg>
            <div class="line-1"></div>
            <br>
          </div>

          <div id="carru1" class="col-md-12">

            <div class="contenedor-imagen" data-bs-toggle="modal" data-bs-target="#ima1"><img class="ima"
                src="img/madrid1.jpeg">
              <div class="overlay">  <svg class="svg2-2" xmlns="http://www.w3.org/2000/svg" width="10vh" height="10vh" fill="currentColor"
                  class="bi bi-eye" viewBox="0 0 16 16">
                  <path
                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                </svg></div>
            </div>
            <div class="contenedor-imagen" data-bs-toggle="modal" data-bs-target="#ima2"><img class="ima"
                src="img/bilbao1.jpg">
              <div class="overlay">  <svg class="svg2-2" xmlns="http://www.w3.org/2000/svg" width="10vh" height="10vh" fill="currentColor"
                  class="bi bi-eye" viewBox="0 0 16 16">
                  <path
                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                </svg></div>
            </div>
            <div class="contenedor-imagen" data-bs-toggle="modal" data-bs-target="#ima3"><img class="ima"
                src="img/barcelona1.webp">
              <div class="overlay">  <svg class="svg2-2" xmlns="http://www.w3.org/2000/svg" width="10vh" height="10vh" fill="currentColor"
                  class="bi bi-eye" viewBox="0 0 16 16">
                  <path
                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                </svg></div>
            </div>


          </div>
          <div class="row">
            <div class="col-md-12" id="contenedormodal">
              <div class="modal fade" id="ima1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div id="contmodal" class="col-md-12">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="col-md-12" id="cerrar">
                        <div class="modal-header">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                      </div>
                      <div class="modal-body">
                        <p id="est1-1">Madrid</p>
                        <div id="simbo-1-1">
                          <div class="line-1"></div> <svg id="svg-2" xmlns="http://www.w3.org/2000/svg" width="30"
                            height="30" fill="currentColor" class="bi bi-airplane-engines" viewBox="0 0 16 16">
                            <path
                              d="M8 0c-.787 0-1.292.592-1.572 1.151A4.35 4.35 0 0 0 6 3v3.691l-2 1V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.191l-1.17.585A1.5 1.5 0 0 0 0 10.618V12a.5.5 0 0 0 .582.493l1.631-.272.313.937a.5.5 0 0 0 .948 0l.405-1.214 2.21-.369.375 2.253-1.318 1.318A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .354-.854l-1.318-1.318.375-2.253 2.21.369.405 1.214a.5.5 0 0 0 .948 0l.313-.937 1.63.272A.5.5 0 0 0 16 12v-1.382a1.5 1.5 0 0 0-.83-1.342L14 8.691V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v.191l-2-1V3c0-.568-.14-1.271-.428-1.849C9.292.591 8.787 0 8 0M7 3c0-.432.11-.979.322-1.401C7.542 1.159 7.787 1 8 1s.458.158.678.599C8.889 2.02 9 2.569 9 3v4a.5.5 0 0 0 .276.447l5.448 2.724a.5.5 0 0 1 .276.447v.792l-5.418-.903a.5.5 0 0 0-.575.41l-.5 3a.5.5 0 0 0 .14.437l.646.646H6.707l.647-.646a.5.5 0 0 0 .14-.436l-.5-3a.5.5 0 0 0-.576-.411L1 11.41v-.792a.5.5 0 0 1 .276-.447l5.448-2.724A.5.5 0 0 0 7 7z" />
                          </svg>
                          <div class="line-1"></div>
                        </div>
                        <img class="imamodal" src="img/madrid.webp">
                        <div class="col-md-12" id="textomodal">
                          <div class="col-md-8">
                            <br>
                            <p>Descubre el corazón de España en Madrid, una ciudad vibrante y llena de historia donde la modernidad y la tradición se unen. Desde el Museo del Prado hasta la Gran Vía y sus restaurantes de tapas, Madrid te invita a vivir una experiencia única. Explora sus parques, su vida nocturna y su cultura en cada rincón de la ciudad.</p>
                            <br>
                            <p> Precio aproximado: $3,800,000 COP ida y vuelta.</p>
                          </div>
                        </div>
                      </div>
                      <button type="button" class="btn" data-bs-dismiss="modal"
                        style="width: 20vh; background-color: rgb(26, 50, 188); color: white; "><svg
                          xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x"
                          viewBox="0 0 16 16">
                          <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                        </svg>Close Window</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12" class="contenedormodal">
              <div class="modal fade" id="ima2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div id="contmodal" class="col-md-12">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="col-md-12" id="cerrar">
                        <div class="modal-header">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                      </div>
                      <div class="modal-body">
                        <p id="est1-1">Bilbao</p>
                        <div id="simbo-1-1">
                          <div class="line-1"></div> <svg id="svg-2" xmlns="http://www.w3.org/2000/svg" width="30"
                            height="30" fill="currentColor" class="bi bi-airplane-engines" viewBox="0 0 16 16">
                            <path
                              d="M8 0c-.787 0-1.292.592-1.572 1.151A4.35 4.35 0 0 0 6 3v3.691l-2 1V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.191l-1.17.585A1.5 1.5 0 0 0 0 10.618V12a.5.5 0 0 0 .582.493l1.631-.272.313.937a.5.5 0 0 0 .948 0l.405-1.214 2.21-.369.375 2.253-1.318 1.318A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .354-.854l-1.318-1.318.375-2.253 2.21.369.405 1.214a.5.5 0 0 0 .948 0l.313-.937 1.63.272A.5.5 0 0 0 16 12v-1.382a1.5 1.5 0 0 0-.83-1.342L14 8.691V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v.191l-2-1V3c0-.568-.14-1.271-.428-1.849C9.292.591 8.787 0 8 0M7 3c0-.432.11-.979.322-1.401C7.542 1.159 7.787 1 8 1s.458.158.678.599C8.889 2.02 9 2.569 9 3v4a.5.5 0 0 0 .276.447l5.448 2.724a.5.5 0 0 1 .276.447v.792l-5.418-.903a.5.5 0 0 0-.575.41l-.5 3a.5.5 0 0 0 .14.437l.646.646H6.707l.647-.646a.5.5 0 0 0 .14-.436l-.5-3a.5.5 0 0 0-.576-.411L1 11.41v-.792a.5.5 0 0 1 .276-.447l5.448-2.724A.5.5 0 0 0 7 7z" />
                          </svg>
                          <div class="line-1"></div>
                        </div>
                        <img class="imamodal" src="img/Bilbao.jpg">
                        <div class="col-md-12" id="textomodal">
                          <div class="col-md-8">
                            <br>
                            <p>Bilbao, una joya del País Vasco, te ofrece una mezcla perfecta entre arte, gastronomía y naturaleza. Visita el icónico Museo Guggenheim, pasea por su encantador casco antiguo y disfruta de los famosos pintxos en bares locales. Con una vibrante vida cultural y paisajes naturales cercanos, Bilbao es el destino ideal para los amantes de la autenticidad.</p>
                            <br>
                            <p>Precio aproximado: $3,500,000 COP ida y vuelta.</p>
                          </div>
                        </div>
                      </div>
                      <button type="button" class="btn" data-bs-dismiss="modal"
                        style="width: 20vh; background-color: rgb(26, 50, 188); color: white; "><svg
                          xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x"
                          viewBox="0 0 16 16">
                          <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                        </svg>Close Window</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12" class="contenedormodal">
              <div class="modal fade" id="ima3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div id="contmodal" class="col-md-12">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="col-md-12" id="cerrar">
                        <div class="modal-header">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                      </div>
                      <div class="modal-body">
                        <p id="est1-1">Barcelona</p>
                        <div id="simbo-1-1">
                          <div class="line-1"></div> <svg id="svg-2" xmlns="http://www.w3.org/2000/svg" width="30"
                            height="30" fill="currentColor" class="bi bi-airplane-engines" viewBox="0 0 16 16">
                            <path
                              d="M8 0c-.787 0-1.292.592-1.572 1.151A4.35 4.35 0 0 0 6 3v3.691l-2 1V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.191l-1.17.585A1.5 1.5 0 0 0 0 10.618V12a.5.5 0 0 0 .582.493l1.631-.272.313.937a.5.5 0 0 0 .948 0l.405-1.214 2.21-.369.375 2.253-1.318 1.318A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .354-.854l-1.318-1.318.375-2.253 2.21.369.405 1.214a.5.5 0 0 0 .948 0l.313-.937 1.63.272A.5.5 0 0 0 16 12v-1.382a1.5 1.5 0 0 0-.83-1.342L14 8.691V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v.191l-2-1V3c0-.568-.14-1.271-.428-1.849C9.292.591 8.787 0 8 0M7 3c0-.432.11-.979.322-1.401C7.542 1.159 7.787 1 8 1s.458.158.678.599C8.889 2.02 9 2.569 9 3v4a.5.5 0 0 0 .276.447l5.448 2.724a.5.5 0 0 1 .276.447v.792l-5.418-.903a.5.5 0 0 0-.575.41l-.5 3a.5.5 0 0 0 .14.437l.646.646H6.707l.647-.646a.5.5 0 0 0 .14-.436l-.5-3a.5.5 0 0 0-.576-.411L1 11.41v-.792a.5.5 0 0 1 .276-.447l5.448-2.724A.5.5 0 0 0 7 7z" />
                          </svg>
                          <div class="line-1"></div>
                        </div>
                        <img class="imamodal" src="img/barcelona.jpg">
                        <div class="col-md-12" id="textomodal">
                          <div class="col-md-8">
                            <br>
                            <p>Barcelona, donde el arte y el mar se encuentran, te invita a explorar la arquitectura única de Gaudí, disfrutar de la vibrante Rambla y relajarte en sus hermosas playas. Con una fusión de tradición catalana y modernidad, esta ciudad es perfecta para quienes buscan historia, cultura y una vibrante vida nocturna.</p>
                          <br>
                          <p>Precio aproximado: $4,000,000 COP ida y vuelta.</p>
                          </div>
                        </div>
                      </div>
                      <button type="button" class="btn" data-bs-dismiss="modal"
                        style="width: 20vh; background-color: rgb(42, 26, 188); color: white; "><svg
                          xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x"
                          viewBox="0 0 16 16">
                          <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                        </svg>Close Window</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="ico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div id="contmodal" class="col-md-12">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="col-md-12" id="cerrar">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                  </div>
                  <div class="modal-body">
                    <p id="est1-1" style="margin-bottom: -2vh;">Mi cuenta</p>
                    <div id="simbo-1-1">
                      <div class="line-1"></div>
                      <svg id="svg-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-airplane-engines" viewBox="0 0 16 16">
                        <path
                          d="M8 0c-.787 0-1.292.592-1.572 1.151A4.35 4.35 0 0 0 6 3v3.691l-2 1V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.191l-1.17.585A1.5 1.5 0 0 0 0 10.618V12a.5.5 0 0 0 .582.493l1.631-.272.313.937a.5.5 0 0 0 .948 0l.405-1.214 2.21-.369.375 2.253-1.318 1.318A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .354-.854l-1.318-1.318.375-2.253 2.21.369.405 1.214a.5.5 0 0 0 .948 0l.313-.937 1.63.272A.5.5 0 0 0 16 12v-1.382a1.5 1.5 0 0 0-.83-1.342L14 8.691V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v.191l-2-1V3c0-.568-.14-1.271-.428-1.849C9.292.591 8.787 0 8 0M7 3c0-.432.11-.979.322-1.401C7.542 1.159 7.787 1 8 1s.458.158.678.599C8.889 2.02 9 2.569 9 3v4a.5.5 0 0 0 .276.447l5.448 2.724a.5.5 0 0 1 .276.447v.792l-5.418-.903a.5.5 0 0 0-.575.41l-.5 3a.5.5 0 0 0 .14.437l.646.646H6.707l.647-.646a.5.5 0 0 0 .14-.436l-.5-3a.5.5 0 0 0-.576-.411L1 11.41v-.792a.5.5 0 0 1 .276-.447l5.448-2.724A.5.5 0 0 0 7 7z" />
                      </svg>
                      <div class="line-1"></div>
                    </div>
                    <div class="col-md-12" id="textomodal">
                      <div class="col-md-12">
                        <!-- Botones de navegación para alternar entre registro e inicio de sesión -->
                        <div id="botones">
                          <button onclick="showRegisterForm()" class="btn btn-primary"
                            style="width: 10vw; margin-right: 1vw;">Cerrar sesión</button>
                          <button onclick="showLoginForm()" class="btn btn-secondary"
                            style="width: 10vw; margin-left: 1vw;">Consultar mis registros</button>
                        </div>
                        <!-- cerrar sesion -->
                        <div id="registerFormContainer" class="form-container" style="display: flex; flex-direction:column; justify-content: center; align-items: center; text-align: center;">
                        <p>Si usted esta seguro, para cerrar su sesión oprima el siguiente link:</p>  
                        <p><a href="logout.php">Log out</a></p>
                        </div>

                        <!-- consultas -->
                        <div id="loginFormContainer" class="form-container" style="display: none;">
                         <p>Seleccione la opción de consulta que desee:</p>
                         <ul>
        <li><a href="todos_registros.php" target="_blank">Todos los registros</a></li>
        <li><a href="registros_antes.php" target="_blank">Registros antes de la fecha actual</a></li>
        <li><a href="registros_futuros.php" target="_blank">Registros en fechas futuras</a></li>
        <li><a href="registros_madrid.php" target="_blank">Registros a Madrid</a></li>
        <li><a href="registros_bilbao.php" target="_blank">Registros a Bilbao</a></li>
        <li><a href="registros_barcelona.php" target="_blank">Registros a Barcelona</a></li>
        <li><a href="registros_vip.php" target="_blank">Registros con VIP</a></li>
        <li><a href="registros_no_vip.php" target="_blank">Registros sin VIP</a></li>
    </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn" data-bs-dismiss="modal"
                    style="width: 20vh; background-color: rgb(30, 25, 172); color: white;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x"
                      viewBox="0 0 16 16">
                      <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                    </svg> Close Window
                  </button>
                </div>
              </div>
            </div>
          </div>



        </div>
      </div>
      <!--Fin segunda parte "PORTFOLIO", inicio tercera parte "ABOUT"-->

      <div class="row" id="cont">
        <div id="titcon" class="col-md-12">
          <p id="est1">Registra tu vuelo</p>
          <div id="simbo-1">
            <div class="line-1"></div> <svg id="svg-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
              fill="currentColor" class="bi bi-airplane-engines" viewBox="0 0 16 16">
              <path
                d="M8 0c-.787 0-1.292.592-1.572 1.151A4.35 4.35 0 0 0 6 3v3.691l-2 1V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.191l-1.17.585A1.5 1.5 0 0 0 0 10.618V12a.5.5 0 0 0 .582.493l1.631-.272.313.937a.5.5 0 0 0 .948 0l.405-1.214 2.21-.369.375 2.253-1.318 1.318A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .354-.854l-1.318-1.318.375-2.253 2.21.369.405 1.214a.5.5 0 0 0 .948 0l.313-.937 1.63.272A.5.5 0 0 0 16 12v-1.382a1.5 1.5 0 0 0-.83-1.342L14 8.691V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v.191l-2-1V3c0-.568-.14-1.271-.428-1.849C9.292.591 8.787 0 8 0M7 3c0-.432.11-.979.322-1.401C7.542 1.159 7.787 1 8 1s.458.158.678.599C8.889 2.02 9 2.569 9 3v4a.5.5 0 0 0 .276.447l5.448 2.724a.5.5 0 0 1 .276.447v.792l-5.418-.903a.5.5 0 0 0-.575.41l-.5 3a.5.5 0 0 0 .14.437l.646.646H6.707l.647-.646a.5.5 0 0 0 .14-.436l-.5-3a.5.5 0 0 0-.576-.411L1 11.41v-.792a.5.5 0 0 1 .276-.447l5.448-2.724A.5.5 0 0 0 7 7z" />
            </svg>
            <div class="line-1"></div>
          </div>
          <br><br><br>

          <div class="col-md-12">
            <div class="form-container">
              <form action="recoger2.php" method="post">
                <div class="text-center mb-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor"
                    class="bi bi-person-plus" viewBox="0 0 16 16">
                    <path
                      d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    <path fill-rule="evenodd"
                      d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                  </svg>
                  <h4 class="form-title">Registro de vuelo</h4>
                </div>

                <div class="mb-3">
                  <label class="form-label">Digite su Nombre y Apellidos</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Digite nombre" required>
                </div>

                <div class="mb-3">
                  <label class="form-label">Digite su Edad</label>
                  <input type="number" name="Edad" min="1" max="100" class="form-control" placeholder="Edad" required>
                </div>

                <div class="mb-3">
                  <label class="form-label">Seleccione fecha de viaje</label>
                  <input type="date" name="Fecha" class="form-control" required>
                </div>

                <div class="mb-3">
                  <label class="form-label">¿Es usted un cliente VIP?</label>
                  <div class="form-check">
                    <input type="radio" name="VIP" value="si" class="form-check-input" id="vip-yes">
                    <label for="vip-yes" class="form-check-label">Sí</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" name="VIP" value="no" class="form-check-input" id="vip-no">
                    <label for="vip-no" class="form-check-label">No</label>
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label">Seleccione Ciudad Destino</label>
                  <select name="Provincia" class="form-select">
                    <option>Madrid</option>
                    <option>Sevilla</option>
                    <option>Bilbao</option>
                    <option>Barcelona</option>
                  </select>
                </div>

                <div class="d-grid">
                  <button type="submit" class="btn btn-primary">Guardar!</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

<footer>

  <div class="col-md-12" id="foo1" style=" 
  padding-top: 4vh;
  color: white;
  height: 25vh;
  text-align: center;
  background-color: rgb(0, 0, 128);
  display: flex;
  flex-direction: row;
  padding-left: 8vw;
  padding-right: 8vw;">
    <div class="col-md-4" id="foo1-1">
      <div class="col-md-6">
        <h3>Punto fisico</h3>
        <P class="ppp">Bogotá. C.C. Plaza Central. Cra. 65 #11-50 Tienda Fabella 3er</P>
      </div>
    </div>
    <div class="col-md-4" id="foo1-2">
      <div class="col-md-6">
        <h3>Contactanos</h3>
        <div id="circc">
          <a class="iconcolor" href="https://es-la.facebook.com/">
            <div class="circulo"><svg xmlns="http://www.w3.org/2000/svg" width="3vh" height="3vh" fill="currentColor"
                class="bi bi-facebook" viewBox="0 0 16 16">
                <path
                  d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
              </svg></div>
          </a>
          <a class="iconcolor" href="https://x.com/?lang=es">
            <div class="circulo"><svg xmlns="http://www.w3.org/2000/svg" width="3vh" height="3vh" fill="currentColor"
                class="bi bi-twitter" viewBox="0 0 16 16">
                <path
                  d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15" />
              </svg></div>
          </a>
          <a class="iconcolor" href="https://www.linkedin.com/feed/">
            <div class="circulo"><svg xmlns="http://www.w3.org/2000/svg" width="3vh" height="3vh" fill="currentColor"
                class="bi bi-linkedin" viewBox="0 0 16 16">
                <path
                  d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
              </svg></div>
          </a>
          <a class="iconcolor" href="https://dribbble.com/">
            <div class="circulo"><svg xmlns="http://www.w3.org/2000/svg" width="3vh" height="3vh" fill="currentColor"
                class="bi bi-dribbble" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M8 0C3.584 0 0 3.584 0 8s3.584 8 8 8c4.408 0 8-3.584 8-8s-3.592-8-8-8m5.284 3.688a6.8 6.8 0 0 1 1.545 4.251c-.226-.043-2.482-.503-4.755-.217-.052-.112-.096-.234-.148-.355-.139-.33-.295-.668-.451-.99 2.516-1.023 3.662-2.498 3.81-2.69zM8 1.18c1.735 0 3.323.65 4.53 1.718-.122.174-1.155 1.553-3.584 2.464-1.12-2.056-2.36-3.74-2.551-4A7 7 0 0 1 8 1.18m-2.907.642A43 43 0 0 1 7.627 5.77c-3.193.85-6.013.833-6.317.833a6.87 6.87 0 0 1 3.783-4.78zM1.163 8.01V7.8c.295.01 3.61.053 7.02-.971.199.381.381.772.555 1.162l-.27.078c-3.522 1.137-5.396 4.243-5.553 4.504a6.82 6.82 0 0 1-1.752-4.564zM8 14.837a6.8 6.8 0 0 1-4.19-1.44c.12-.252 1.509-2.924 5.361-4.269.018-.009.026-.009.044-.017a28.3 28.3 0 0 1 1.457 5.18A6.7 6.7 0 0 1 8 14.837m3.81-1.171c-.07-.417-.435-2.412-1.328-4.868 2.143-.338 4.017.217 4.251.295a6.77 6.77 0 0 1-2.924 4.573z" />    
              </svg>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="col-md-6">
        <h3>Atención</h3>
        <p class="ppp">Nosotros no te pediremos pagos, si consignaste dinero acude a: <a href="#"
            style="color: rgb(153, 154, 154);">Policia</a>.</p>
      </div>
    </div>
  </div>
  <div class="col-md-12"
    style="height: 4vh; background-color:  #212529; color: white; display: flex; font-size: smaller; align-items: center; justify-content: center;">
    Animate y viaja con nosotros!
  </div>
  </div>
</footer>

</html>