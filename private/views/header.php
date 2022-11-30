<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Dental</title>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="shortcut icon" href="../favicon.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header id="div_header">
        <div class="container-fluid p-1">
            <div class="row header_container row justify-content-between">
                <?php
                if ($logged_rol === 'user'){
                    ?>
                    <div class="col-md-5 align-self-center titulo">
                        <div class="row justify-content-start">
                            <div class="col-3 align-self-center logo px-4"><img id="logo" class="" src="../assets/logo/logo_clinica_dental.png" alt="logo" width="1024" height="1024"></div>
                            <div class="col-8 align-self-center titulo"><h1 id="titulo" class="display-1 fw-normal lh-1 mb-0">Clínica Dental</h1></div>
                        </div>
                    </div>
                    <div class="col-md-4 align-self-end menu_nav_header my-1">
                        <div class="btn-group" role="group">
                            <form action="./main.php" method="post">
                                <?php include './views/menu_nav/menu_nav.php'; ?>
                            </form>
                        </div>
                    </div>
                <?php
                }
                if ($logged_rol === 'admin'){
                    ?>
                    <div class="col-md-4 align-self-center titulo">
                        <div class="row justify-content-start">
                            <div class="col-3 align-self-center logo px-4"><img id="logo" class="" src="../assets/logo/logo_clinica_dental.png" alt="logo" width="1024" height="1024"></div>
                            <div class="col-8 align-self-center titulo"><h1 id="titulo" class="display-1 fw-normal lh-1 mb-0">Clínica Dental</h1></div>
                        </div>
                    </div>
                    <div class="col-md-7 align-self-end menu_nav_header my-1">
                        <div class="btn-group" role="group">
                            <form action="./main.php" method="post">
                                <?php include './views/menu_nav/menu_nav.php'; ?>
                            </form>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </header>
    <main>