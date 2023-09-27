<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="img/logo.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#AcercaDeNosotros">Acerca de Nosotros</a></li>
                <li><a href="#Contacto">Contacto</a></li>            
            </ul>
        </nav>

    </header>


    <div class="content">
        <div class="container custom-index">
            <h1>Bienvenido al Hospital RAWSON</h1>
            <h2>Por favor, seleccione su tipo de usuario:</h2>
            <a href="pagpaciente.php" class="btn">Paciente</a>
            <a href="secretaria.php" class="btn">Secretaria</a>
            <a href="login_administrador.php" class="btn">Administrador</a>

        </div>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Acerca del Hospital RAWSON</h3>
            <p>Hospital RAWSON: Tu Salud en Buenas Manos</p>
            <p>En el Hospital RAWSON, nos enorgullece brindar atención médica excepcional respaldada por décadas de experiencia. Nuestra misión es tu salud y bienestar, con un equipo comprometido, tecnología avanzada y atención de emergencia las 24 horas. Siempre estamos aquí para ti y tu familia.</p>
        </div>
    </div>

    <div id="contactModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Contacto</h3>
            <p><strong>Dirección:</strong> Bajada Pucará 2025, Córdoba</p>
            <p><strong>Teléfono:</strong> 0351 434-8756</p>
            <p><strong>Redes Sociales:</strong> -</p>
        </div>
    </div>

    <script src="menu.js"></script>
</body>
</html>
