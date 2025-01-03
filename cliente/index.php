<?php

require_once 'model/database/conexao.php';

session_start();
if (isset($_POST['btn-entrar'])) :
    $erros = array();
    $login = mysqli_escape_string($connect, $_POST['email']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    $sql_status = "SELECT *FROM users WHERE email = '$login'";
    $result_status = mysqli_query($connect, $sql_status);
    $dados_status = mysqli_fetch_array($result_status);



    $sql = "SELECT id, email FROM users WHERE email = '$login'";
    $resultado = mysqli_query($connect, $sql);

    if (mysqli_num_rows($resultado) > 0) :
        $senha = md5($senha);
        $sql = "SELECT*FROM users WHERE email = '$login' AND password = '$senha'";
        $resultado = mysqli_query($connect, $sql);

        if (mysqli_num_rows($resultado) == 1) :
            $dados = mysqli_fetch_array($resultado);

            $_SESSION['logado'] = true;
            $_SESSION['id_usuario'] = $dados['id'];

            header('Location:guiasedocumentos.php');
        else :
            $erros[] = "<div class='alert alert-danger' role='alert'>
             Usuario e senha, não conferem!</div>";

        endif;
    else :
        $erros[] = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='background-color:red;border:none;color:#fff'>
          Usuário $login, não possui acesso a area de administração®!</div>";

    endif;




endif;


?>
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Social - Admin</title>
    <meta name="keywords" content="premium, admin, dashboard, template, bootstrap 5, clean ui, hope ui, admin dashboard,responsive dashboard, optimized dashboard, simple auth">
    <meta name="author" content="Programadores em ação">
    <meta name="DC.title" content="Hope UI Pro Simple | Responsive Bootstrap 5 Admin Dashboard Template">
    <!-- Google Font Api KEY-->
    <meta name="google_font_api" content="AIzaSyBG58yNdAjc20_8jAvLNSVi9E4Xhwjau_k">
    <!-- Config Options -->
    <meta name="setting_options" content='{&quot;saveLocal&quot;:&quot;sessionStorage&quot;,&quot;storeKey&quot;:&quot;huisetting&quot;,&quot;setting&quot;:{&quot;app_name&quot;:{&quot;value&quot;:&quot;Hope UI&quot;},&quot;theme_scheme_direction&quot;:{&quot;value&quot;:&quot;ltr&quot;},&quot;theme_scheme&quot;:{&quot;value&quot;:&quot;light&quot;},&quot;theme_style_appearance&quot;:{&quot;value&quot;:[&quot;theme-default&quot;]},&quot;theme_color&quot;:{&quot;colors&quot;:{&quot;--{{prefix}}primary&quot;:&quot;#051d29&quot;,&quot;--{{prefix}}info&quot;:&quot;#051d29&quot;},&quot;value&quot;:&quot;theme-color-default&quot;},&quot;theme_transition&quot;:{&quot;value&quot;:&quot;theme-with-animation&quot;},&quot;theme_font_size&quot;:{&quot;value&quot;:&quot;theme-fs-md&quot;},&quot;page_layout&quot;:{&quot;value&quot;:&quot;container-fluid&quot;},&quot;header_navbar&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;header_banner&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;sidebar_color&quot;:{&quot;value&quot;:&quot;sidebar-white&quot;},&quot;card_color&quot;:{&quot;value&quot;:&quot;card-default&quot;},&quot;sidebar_type&quot;:{&quot;value&quot;:[]},&quot;sidebar_menu_style&quot;:{&quot;value&quot;:&quot;left-bordered&quot;},&quot;footer&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;body_font_family&quot;:{&quot;value&quot;:null},&quot;heading_font_family&quot;:{&quot;value&quot;:null}}}'>
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo.webp" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="assets/css/core/libs.min.css" />



    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="assets/css/hope-ui.min.css?v=2.2.0" />
    <link rel="stylesheet" href="assets/css/pro.min.css?v=2.2.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/css/custom.min.css?v=2.2.0" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="assets/css/dark.min.css?v=2.2.0" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="assets/css/customizer.min.css?v=2.2.0" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="assets/css/rtl.min.css?v=2.2.0" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #051d29;
            background-size: cover;
        }
    </style>

</head>

<body class=" ">
    <!-- loader END -->
    <div class="wrapper">
        <div class="iq-auth-page">

            <nav class="navbar iq-auth-logo">
                <div class="container-fluid">
                </div>
            </nav>
            <div class="row d-flex justify-content-center align-items-center iq-auth-container w-100 mt-5">
                <div class="col-8 col-xl-8 d-flex justify-content-center align-items-center">
                    <div class="card mb-3 mt-5" style="width: 340px; ">
                        <div class="row g-0 justify-content-center text-center">
                            <div class="col-md-12">
                                <div class="card-header" style="">
                                    <h3 class="text-center"></h3>

                                </div>
                                <div class="card-body">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">


                                        <?php
                                        if (!empty($erros)) :
                                            foreach ($erros as $erro) :
                                                echo $erro;
                                            endforeach;
                                        endif;


                                        ?>
                                        <h4><img src="assets/images/logo.webp" width="150" alt=""></h4>
                                        <p class="text-center">Insira seus dados</p>
                                        <div class="form-group">
                                            <input type="email" class="form-control  rounded-pill mb-0" name="email" id="email-id" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control  rounded-pill mb-0" name="senha" id="password" placeholder="Enter password">
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="form-check d-inline-block pt-1 mb-0">
                                                <!-- <input type="checkbox" class="form-check-input" id="customCheck11">
    <label class="form-check-label" for="customCheck11">Remember Me</label>--->
                                            </div>

                                        </div>
                                        <div class="text-center pb-3">
                                            <button type="submit" name="btn-entrar" class="btn btn-primary rounded-pill">Entrar no sistema</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Live Customizer start -->
    <!-- Setting offcanvas start here -->

    <!-- Settings sidebar end here -->
    <!-- Live Customizer end -->

    <!-- Library Bundle Script -->
    <script src="assets/js/core/libs.min.js"></script>
    <!-- Plugin Scripts -->




    <!-- Slider-tab Script -->
    <script src="assets/js/plugins/slider-tabs.js"></script>













    <!-- Lodash Utility -->
    <script src="assets/vendor/lodash/lodash.min.js"></script>
    <!-- Utilities Functions -->
    <script src="assets/js/iqonic-script/utility.js"></script>
    <!-- Settings Script -->
    <script src="assets/js/iqonic-script/setting.js"></script>
    <!-- Settings Init Script -->
    <script src="assets/js/setting-init.js"></script>
    <!-- External Library Bundle Script -->
    <script src="assets/js/core/external.min.js"></script>
    <!-- Widgetchart Script -->
    <script src="assets/js/charts/widgetcharts.js?v=2.2.0" defer></script>
    <!-- Dashboard Script -->
    <script src="assets/js/charts/dashboard.js?v=2.2.0" defer></script>
    <script src="assets/js/charts/alternate-dashboard.js?v=2.2.0" defer></script>
    <!-- Hopeui Script -->
    <script src="assets/js/hope-ui.js?v=2.2.0" defer></script>
    <script src="assets/js/hope-uipro.js?v=2.2.0" defer></script>
    <script src="assets/js/sidebar.js?v=2.2.0" defer></script>
</body>

</html>