<?php

require_once 'model/database/conexao.php';


session_start();
if (!isset($_SESSION['logado'])) :
    header('Location: https://lokicgp.com.br/');
endif;

$id = $_SESSION['id_usuario'];
$sql = " SELECT*FROM users WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dadosUser = mysqli_fetch_array($resultado);


//tipo_usuario = $dados['user_level'];
define('Endereco', 'https://admin.emperius.com.br');

$sql_tipo = "SELECT user_level from users where id='$id'";
$resultado_tipo = mysqli_query($connect, $sql_tipo);
$dadoTipo = mysqli_fetch_array($resultado_tipo);
$idcliente = $dadosUser['id'];
$email_user = $dadosUser['email'];

$sql_cli = "SELECT*FROM clients where email='$email_user'";
$query_cli = mysqli_query($connect,$sql_cli);
$row_cli = mysqli_fetch_array($query_cli);

$id_do_cliente = $row_cli['id'];

$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

//Selecionar todos os cursos da tabela
$consulta_blog = "SELECT * FROM guides_and_documents where client_id='$id_do_cliente'";
$dados = mysqli_query($connect, $consulta_blog);

//Contar o total de cursos
$total_cursos = mysqli_num_rows($dados);

//Seta a quantidade de cursos por pagina
$quantidade_pg = 6;

//calcular o número de pagina necessárias para apresentar os cursos
$num_pagina = ceil($total_cursos / $quantidade_pg);

//Calcular o inicio da visualizacao
$incio = ($quantidade_pg * $pagina) - $quantidade_pg;

//Selecionar os cursos a serem apresentado na página
$result_blog = "SELECT * FROM guides_and_documents where client_id='$id_do_cliente' ORDER BY id asc limit $incio, $quantidade_pg";
$resultado_blog = mysqli_query($connect, $result_blog);
$total_cursos = mysqli_num_rows($resultado_blog);

?>
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administração Social</title>
    <meta name="description" content="">
    <meta name="keywords" content="premium, admin, dashboard, template, bootstrap 5, clean ui, hope ui, admin dashboard,responsive dashboard, optimized dashboard, E-commerce app">
    <meta name="author" content="Iqonic Design">
    <meta name="DC.title" content="Hope UI Pro E-commerce | Responsive Bootstrap 5 Admin Dashboard Template">
    <!-- Google Font Api KEY-->
    <meta name="google_font_api" content="AIzaSyBG58yNdAjc20_8jAvLNSVi9E4Xhwjau_k">
    <!-- Config Options -->
    <meta name="setting_options" content='{&quot;saveLocal&quot;:&quot;sessionStorage&quot;,&quot;storeKey&quot;:&quot;huisetting&quot;,&quot;setting&quot;:{&quot;app_name&quot;:{&quot;value&quot;:&quot;Hope UI&quot;},&quot;theme_scheme_direction&quot;:{&quot;value&quot;:&quot;ltr&quot;},&quot;theme_scheme&quot;:{&quot;value&quot;:&quot;light&quot;},&quot;theme_style_appearance&quot;:{&quot;value&quot;:[&quot;theme-default&quot;]},&quot;theme_color&quot;:{&quot;colors&quot;:{&quot;--{{prefix}}primary&quot;:&quot;#242237&quot;,&quot;--{{prefix}}info&quot;:&quot;#242237&quot;},&quot;value&quot;:&quot;theme-color-default&quot;},&quot;theme_transition&quot;:{&quot;value&quot;:&quot;theme-with-animation&quot;},&quot;theme_font_size&quot;:{&quot;value&quot;:&quot;theme-fs-md&quot;},&quot;page_layout&quot;:{&quot;value&quot;:&quot;container-fluid&quot;},&quot;header_navbar&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;header_banner&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;sidebar_color&quot;:{&quot;value&quot;:&quot;sidebar-white&quot;},&quot;card_color&quot;:{&quot;value&quot;:&quot;card-default&quot;},&quot;sidebar_type&quot;:{&quot;value&quot;:[]},&quot;sidebar_menu_style&quot;:{&quot;value&quot;:&quot;left-bordered&quot;},&quot;footer&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;body_font_family&quot;:{&quot;value&quot;:null},&quot;heading_font_family&quot;:{&quot;value&quot;:null}}}'>
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="assets/css/core/libs.min.css" />









    <!-- SwiperSlider css -->
    <link rel="stylesheet" href="assets/vendor/swiperSlider/swiper-bundle.min.css">



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

    <link rel="stylesheet" href="e-commerce/assets/css/e-commerce.min.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
</head>

<body class="">

    <aside class="sidebar sidebar-base " data-toggle="main-sidebar" data-sidebar="responsive">
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a href="painel.php" class="navbar-brand">

                <!--Logo start-->
                <div class="logo-main">
                    <div class="logo-normal">
                        <img src="assets/images/logo.webp" class="img-fluid" alt="">
                    </div>
                    <div class="logo-mini">
                        <img src="assets/images/logo.webp" class="img-fluid" alt="">
                    </div>
                </div>
                <!--logo End-->
            </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon">
                    <svg class="icon-20" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </i>
            </div>
        </div>
        <div class="sidebar-body pt-0 data-scrollbar">
            <div class="sidebar-profile-card mt-3">
                <div class="sidebar-profile-body">
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="rounded rounded-3  border-primary p-2">
                            <img src="<?php echo $dadosUser['photo_user'] ?>" alt="User-Profile" class="img-fluid rounded-circle" style="border: 4px solid #F5773D;" loading="lazy">
                        </div>
                    </div>
                    <div class="sidebar-profile-detail">
                        <h6 class="sidebar-profile-name"><?php echo $dadosUser['name'] ?></h6>
                        <span class="sidebar-profile-username"><?php echo $dadosUser['status'] ?></span>
                    </div>
                </div>
            </div>
            <hr class="hr-horizontal">
            <div class="sidebar-list">
                <!-- Sidebar Menu Start -->
                <ul class="navbar-nav iq-main-menu" id="iq-filemanger-page">
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled text-start" href="#" tabindex="-1">
                            <span class="default-icon">Menu</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li>
                        <hr class="hr-horizontal">
                    </li>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled text-start" href="#" tabindex="-1">
                            <span class="default-icon">Opções</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="myaccount.php">
                            <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z" fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Minha conta</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="guiasedocumentos.php">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                </svg>
                            </i>
                            <span class="item-name">Guias e documentos</span>

                        </a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="honorarios.php">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                </svg>
                            </i>
                            <span class="item-name">Honorarios</span>

                        </a>
                    </li>
                    <li>
                        <hr class="hr-horizontal">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="model/sair.php">
                            <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M2 6.447C2 3.996 4.03024 2 6.52453 2H11.4856C13.9748 2 16 3.99 16 6.437V17.553C16 20.005 13.9698 22 11.4744 22H6.51537C4.02515 22 2 20.01 2 17.563V16.623V6.447Z" fill="currentColor"></path>
                                    <path d="M21.7787 11.4548L18.9329 8.5458C18.6388 8.2458 18.1655 8.2458 17.8723 8.5478C17.5802 8.8498 17.5811 9.3368 17.8743 9.6368L19.4335 11.2298H17.9386H9.54826C9.13434 11.2298 8.79834 11.5748 8.79834 11.9998C8.79834 12.4258 9.13434 12.7698 9.54826 12.7698H19.4335L17.8743 14.3628C17.5811 14.6628 17.5802 15.1498 17.8723 15.4518C18.0194 15.6028 18.2113 15.6788 18.4041 15.6788C18.595 15.6788 18.7868 15.6028 18.9329 15.4538L21.7787 12.5458C21.9199 12.4008 21.9998 12.2048 21.9998 11.9998C21.9998 11.7958 21.9199 11.5998 21.7787 11.4548Z" fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Sair do sistema</span>
                        </a>
                    </li>
                </ul>
                <!-- Sidebar Menu End -->
            </div>
        </div>
        <div class="sidebar-footer"></div>
    </aside>
    <main class="main-content">
        <div class="position-relative">
            <!--Nav Start-->
            <nav class="nav navbar navbar-expand-xl navbar-light iq-navbar header-hover-menu left-border">
                <div class="container-fluid navbar-inner">
                    <a href="painel.php" class="navbar-brand">

                        <!--Logo start-->
                        <div class="logo-main">
                            <div class="logo-normal">
                                <img src="assets/images/logo.webp" height="30" alt="">
                            </div>
                            <div class="logo-mini">
                                <img src="assets/images/logo.webp" height="30" alt="">
                            </div>
                        </div>
                        <!--logo End-->

                    </a>
                    <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                        <i class="icon d-flex">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                            </svg>
                        </i>
                    </div>
                    <div class="d-flex align-items-center justify-content-between product-offcanvas">
                        <div class="breadcrumb-title border-end me-3 pe-3 d-none d-xl-block">
                            <small class="mb-0 text-capitalize">Painel</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <button id="navbar-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <span class="navbar-toggler-bar bar1 mt-1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
                            <li class="nav-item dropdown me-0 me-xl-3">
                                <div class="d-flex align-items-center mr-2 iq-font-style" role="group" aria-label="First group" data-setting="radio">
                                    <input type="radio" class="btn-check" name="theme_font_size" value="theme-fs-sm" id="font-size-sm">
                                    <label for="font-size-sm" class="btn btn-border border-0 btn-icon btn-sm" data-bs-toggle="tooltip" title="Font size 14px" data-bs-placement="bottom">
                                        <span class="mb-0 h6" style="color: inherit !important;">A</span>
                                    </label>
                                    <input type="radio" class="btn-check" name="theme_font_size" value="theme-fs-md" id="font-size-md">
                                    <label for="font-size-md" class="btn btn-border border-0 btn-icon" data-bs-toggle="tooltip" title="Font size 16px" data-bs-placement="bottom">
                                        <span class="mb-0 h4" style="color: inherit !important;">A</span>
                                    </label>
                                    <input type="radio" class="btn-check" name="theme_font_size" value="theme-fs-lg" id="font-size-lg">
                                    <label for="font-size-lg" class="btn btn-border border-0 btn-icon" data-bs-toggle="tooltip" title="Font size 18px" data-bs-placement="bottom">
                                        <span class="mb-0 h2" style="color: inherit !important;">A</span>
                                    </label>
                                </div>
                            </li>
                            <li class="nav-item dropdown border-end pe-3 d-none d-xl-block">
                                <div class="form-group input-group mb-0 search-input">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-text">
                                        <svg class="icon-20" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                                            <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </div>
                            </li>
                            <li class="nav-item dropdown iq-responsive-menu border-end d-block d-xl-none">
                                <div class="btn btn-sm bg-body" id="navbarDropdown-search-11" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                                        <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown-search-11" style="width: 25rem;">
                                    <li class="px-3 py-0">
                                        <div class="form-group input-group mb-0">
                                            <input type="text" class="form-control" placeholder="Search...">
                                            <span class="input-group-text">
                                                <svg class="icon-20" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                                                    <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link ps-3" id="notification-drop" data-bs-toggle="dropdown">
                                    <div class="btn btn-primary btn-icon btn-sm rounded-pill btn-action">
                                        <span class="btn-inner">
                                            <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19.7695 11.6453C19.039 10.7923 18.7071 10.0531 18.7071 8.79716V8.37013C18.7071 6.73354 18.3304 5.67907 17.5115 4.62459C16.2493 2.98699 14.1244 2 12.0442 2H11.9558C9.91935 2 7.86106 2.94167 6.577 4.5128C5.71333 5.58842 5.29293 6.68822 5.29293 8.37013V8.79716C5.29293 10.0531 4.98284 10.7923 4.23049 11.6453C3.67691 12.2738 3.5 13.0815 3.5 13.9557C3.5 14.8309 3.78723 15.6598 4.36367 16.3336C5.11602 17.1413 6.17846 17.6569 7.26375 17.7466C8.83505 17.9258 10.4063 17.9933 12.0005 17.9933C13.5937 17.9933 15.165 17.8805 16.7372 17.7466C17.8215 17.6569 18.884 17.1413 19.6363 16.3336C20.2118 15.6598 20.5 14.8309 20.5 13.9557C20.5 13.0815 20.3231 12.2738 19.7695 11.6453Z" fill="currentColor"></path>
                                                <path opacity="0.4" d="M14.0088 19.2283C13.5088 19.1215 10.4627 19.1215 9.96275 19.2283C9.53539 19.327 9.07324 19.5566 9.07324 20.0602C9.09809 20.5406 9.37935 20.9646 9.76895 21.2335L9.76795 21.2345C10.2718 21.6273 10.8632 21.877 11.4824 21.9667C11.8123 22.012 12.1482 22.01 12.4901 21.9667C13.1083 21.877 13.6997 21.6273 14.2036 21.2345L14.2026 21.2335C14.5922 20.9646 14.8734 20.5406 14.8983 20.0602C14.8983 19.5566 14.4361 19.327 14.0088 19.2283Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <span class="notification-alert"></span>
                                    </div>
                                </a>
                                <div class="p-0 sub-drop dropdown-menu dropdown-menu-end" aria-labelledby="notification-drop">
                                    <div class="m-0 shadow-none card">
                                        <div class="py-3 card-header d-flex justify-content-between bg-primary">
                                            <div class="header-title">
                                                <h5 class="mb-0 text-white">Notificações</h5>
                                            </div>
                                        </div>
                                        <div class="p-0 card-body max-17 scroll-thin">
                                            <div class="iq-sub-card">
                                                <div class="d-flex align-items-center">
                                                    <img class="p-1 avatar-40 rounded-pill bg-soft-primary" src="assets/images/shapes/01.png" alt="" loading="lazy" />
                                                    <div class="ms-3 flex-grow-1">
                                                        <h6 class="mb-0 ">Nova notificação</h6>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="mb-0">O que foi feito</p>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-icon text-danger btn-sm">
                                                        <span class="btn-inner">
                                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.4" d="M19.643 9.48851C19.643 9.5565 19.11 16.2973 18.8056 19.1342C18.615 20.8751 17.4927 21.9311 15.8092 21.9611C14.5157 21.9901 13.2494 22.0001 12.0036 22.0001C10.6809 22.0001 9.38741 21.9901 8.13185 21.9611C6.50477 21.9221 5.38147 20.8451 5.20057 19.1342C4.88741 16.2873 4.36418 9.5565 4.35445 9.48851C4.34473 9.28351 4.41086 9.08852 4.54507 8.93053C4.67734 8.78453 4.86796 8.69653 5.06831 8.69653H18.9388C19.1382 8.69653 19.3191 8.78453 19.4621 8.93053C19.5953 9.08852 19.6624 9.28351 19.643 9.48851Z" fill="currentColor"></path>
                                                                <path d="M21 5.97686C21 5.56588 20.6761 5.24389 20.2871 5.24389H17.3714C16.7781 5.24389 16.2627 4.8219 16.1304 4.22692L15.967 3.49795C15.7385 2.61698 14.9498 2 14.0647 2H9.93624C9.0415 2 8.26054 2.61698 8.02323 3.54595L7.87054 4.22792C7.7373 4.8219 7.22185 5.24389 6.62957 5.24389H3.71385C3.32386 5.24389 3 5.56588 3 5.97686V6.35685C3 6.75783 3.32386 7.08982 3.71385 7.08982H20.2871C20.6761 7.08982 21 6.75783 21 6.35685V5.97686Z" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer p-0 text-center">
                                            <div class="d-grid">
                                                <a href="notifications.php" class="btn btn-primary">Ver todas</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown" id="itemdropdown1">
                                <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="btn btn-primary btn-icon btn-sm rounded-pill">
                                        <span class="btn-inner">
                                            <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z" fill="currentColor"></path>
                                                <path opacity="0.4" d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="myaccount.php">Meu perfil</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="settings.php">Configurações</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="model/sair.php">Sair do sistema</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item iq-full-screen d-none d-xl-block" id="fullscreen-item">
                                <a href="#" class="nav-link" id="btnFullscreen" data-bs-toggle="dropdown">
                                    <div class="btn btn-primary btn-icon btn-sm rounded-pill">
                                        <span class="btn-inner">
                                            <svg class="normal-screen icon-24" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.5528 5.99656L13.8595 10.8961" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M14.8016 5.97618L18.5524 5.99629L18.5176 9.96906" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M5.8574 18.896L10.5507 13.9964" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M9.60852 18.9164L5.85775 18.8963L5.89258 14.9235" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <svg class="full-normal-screen d-none icon-24" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.7542 10.1932L18.1867 5.79319" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M17.2976 10.212L13.7547 10.1934L13.7871 6.62518" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M10.4224 13.5726L5.82149 18.1398" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M6.74391 13.5535L10.4209 13.5723L10.3867 17.2755" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> <!--Nav End-->
        </div>
        <div class="container-fluid content-inner pb-0" id="page_layout">
            <div class="row">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-6">
                                <?php
                                if (isset($_SESSION['msg'])) {
                                    echo $_SESSION['msg'];
                                }
                                unset($_SESSION['msg']);


                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header mb-4 mt-1" style="border-radius: 25px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Suas guias - <?= $dadosUser['name'] ?></h4>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="card" style="background-color: transparent; box-shadow:none;">
                        <div class="card-body px-0">
                            <div class="row">
                                <?php

                                //$query_agent = mysqli_query($connect, "SELECT*FROM clients order by name asc");
                                while ($dados_agent = mysqli_fetch_array($resultado_blog)) :

                                ?>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-header"><h4><?= $dados_agent['name'] ?></h4></div>
                                            <div class="card-body">
                                                <p class="ms-4">
                                                    <h6>Mês: <?= $dados_agent['mounth'] ?></h6>
                                                    <h6>Data de venc.: <?= $dados_agent['date'] ?></h6>
                                                </p>
                                                <p class="ms-4">
                                                    <h5>Tipo de guia: <?= $dados_agent['type'] ?></h5>
                                                    <h5>Valor: <?= $dados_agent['value'] ?></h5>
                                                </p>
                                                <p class="">
                                                    <a class='btn btn-primary w-100' href="<?= $dados_agent['document'] ?>" download="<?= $dados_agent['document'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-download-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0m-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708z" />
                                        </svg> Baixar </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    endwhile;
                                    ?>
                            </div>


                           
                        </div>
                        <div class="card-footer">
                            <?php
                            //Verificar a pagina anterior e posterior
                            $pagina_anterior = $pagina - 1;
                            $pagina_posterior = $pagina + 1;
                            ?>

                            <div class="bd-example">
                                <nav aria-label="Standard pagination example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <?php
                                            if ($pagina_anterior != 0) { ?>
                                                <a class="page-link" href="clientes.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
                                                    <span aria-hidden="true">«</span>
                                                </a>
                                            <?php } else { ?>
                                                <a class="page-link" aria-label="Previous">
                                                    <span aria-hidden="true">«</span>
                                                </a>

                                            <?php }  ?>

                                        </li>
                                        <?php
                                        //Apresentar a paginacao
                                        for ($i = 1; $i < $num_pagina + 1; $i++) { ?>
                                            <li class="page-item"><a class="page-link" href="clientes.php?pagina=<?php echo $i; ?>#page"><?php echo $i; ?></a></li>
                                        <?php } ?>
                                        <li class="page-item">
                                            <?php
                                            if ($pagina_posterior <= $num_pagina) { ?>
                                                <a class="page-link" href="clientes.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
                                                    <span aria-hidden="true">»</span>
                                                </a>
                                            <?php } else { ?>
                                                <a class="page-link" href="clientes.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
                                                    <span aria-hidden="true">»</span>
                                                </a>
                                            <?php }  ?>
                                            <!-- fim verificação /exibição do botão pagina posterior --->

                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Section Start -->
        <footer class="footer">
            <div class="footer-body">
                <ul class="left-panel list-inline mb-0 p-0">
                    <li class="list-inline-item"><a href="dashboard/extra/privacy-policy.html">Politicas de privacidade</a></li>
                    <li class="list-inline-item"><a href="dashboard/extra/terms-of-service.html">Termos de uso</a></li>
                </ul>
                <div class="right-panel">
                    ©<script>
                        2022
                    </script> <span>Todos os direitos reservados</span>, Desenvolvido
                    <span class="text-gray">
                        <svg class="icon-16" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.85 2.50065C16.481 2.50065 17.111 2.58965 17.71 2.79065C21.401 3.99065 22.731 8.04065 21.62 11.5806C20.99 13.3896 19.96 15.0406 18.611 16.3896C16.68 18.2596 14.561 19.9196 12.28 21.3496L12.03 21.5006L11.77 21.3396C9.48102 19.9196 7.35002 18.2596 5.40102 16.3796C4.06102 15.0306 3.03002 13.3896 2.39002 11.5806C1.26002 8.04065 2.59002 3.99065 6.32102 2.76965C6.61102 2.66965 6.91002 2.59965 7.21002 2.56065H7.33002C7.61102 2.51965 7.89002 2.50065 8.17002 2.50065H8.28002C8.91002 2.51965 9.52002 2.62965 10.111 2.83065H10.17C10.21 2.84965 10.24 2.87065 10.26 2.88965C10.481 2.96065 10.69 3.04065 10.89 3.15065L11.27 3.32065C11.3618 3.36962 11.4649 3.44445 11.554 3.50912C11.6104 3.55009 11.6612 3.58699 11.7 3.61065C11.7163 3.62028 11.7329 3.62996 11.7496 3.63972C11.8354 3.68977 11.9247 3.74191 12 3.79965C13.111 2.95065 14.46 2.49065 15.85 2.50065ZM18.51 9.70065C18.92 9.68965 19.27 9.36065 19.3 8.93965V8.82065C19.33 7.41965 18.481 6.15065 17.19 5.66065C16.78 5.51965 16.33 5.74065 16.18 6.16065C16.04 6.58065 16.26 7.04065 16.68 7.18965C17.321 7.42965 17.75 8.06065 17.75 8.75965V8.79065C17.731 9.01965 17.8 9.24065 17.94 9.41065C18.08 9.58065 18.29 9.67965 18.51 9.70065Z" fill="currentColor"></path>
                        </svg>
                    </span> Por .
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->
    </main>
    <!-- Wrapper End-->

    <!--- modal --->

    <div class='modal  fade' id='cadastroAgent' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header bg-primary' style='border:none;'>
                    <h5 class='modal-title text-white' id='staticBackdropLabel'>Cadastro clientes Social</h5>
                    <button type='button' class='btn-close rounded-circle bg-danger' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <form action='model/add_guia.php' method='post' enctype="multipart/form-data">
                        <div class='row '>
                            <div class='col-lg-12'>
                                <div class='form-group'>
                                    <label class='form-label' for='fName'>Selecione o arquivo</label>
                                    <input type="file" class='form-control' name="document" id="document">
                                </div>
                            </div>
                            <div class='col-lg-12'>
                                <div class='form-group'>
                                    <label class='form-label' for='fName'>Nome do documento</label>
                                    <input type="text" class='form-control' name="name" id="name">
                                </div>
                            </div>
                            <div class='col-lg-6'>
                                <div class='form-group'>
                                    <label class='form-label' for='fName'>Selecione o mês</label>
                                    <select class="form-select" name="mounth" aria-label="Default select example">
                                        <option value="Janeiro" selected>Janeiro</option>
                                        <option value="Fevereiro">Fevereiro</option>
                                        <option value="Março">Março</option>
                                        <option value="Abril">Abril</option>
                                        <option value="Maio">Maio</option>
                                        <option value="Junho">Junho</option>
                                        <option value="Julho">Julho</option>
                                        <option value="Agosto">Agosto</option>
                                        <option value="Setembro">Setembro</option>
                                        <option value="Outubro">Outubro</option>
                                        <option value="Novembro">Novembro</option>
                                        <option value="Dezembro">Dezembro</option>
                                    </select>
                                </div>
                            </div>
                            <div class='col-lg-6'>
                                <div class='form-group'>
                                    <label class='form-label' for='fName'>Data de vencimento da guia</label>
                                    <input type="text" class='form-control' name="date" id="date_venciment">
                                    <script type="text/javascript">
                                        $("#date_venciment").mask("00/00/0000");
                                    </script>
                                </div>
                            </div>
                            <div class='col-lg-6'>
                                <div class='form-group'>
                                    <label class='form-label' for='fName'>Tipo de documento </label>
                                    <select class="form-select" name="type" aria-label="Default select example">
                                        <?php
                                        $sql_typedoc = "SELECT*FROM document_type";
                                        $query_typedoc = mysqli_query($connect, $sql_typedoc);
                                        while ($row_tdoc = mysqli_fetch_array($query_typedoc)):
                                        ?>
                                            <option value="<?= $row_tdoc['name'] ?>"><?= $row_tdoc['name'] ?></option>
                                        <?php
                                        endwhile;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class='col-lg-6'>
                                <div class='form-group'>
                                    <label class='form-label' for='fName'>Valor da guia</label>
                                    <input type="text" class='form-control' name="value" id="value">
                                </div>
                            </div>
                            <div class='col-lg-12'>
                                <div class='form-group'>
                                    <label class='form-label' for='fName'>Selecione o cliente</label>
                                    <select class="form-select" name="client_id" aria-label="Default select example">
                                        <?php
                                        $sql_typedoc = "SELECT*FROM clients";
                                        $query_typedoc = mysqli_query($connect, $sql_typedoc);
                                        while ($row_tdoc = mysqli_fetch_array($query_typedoc)):
                                        ?>
                                            <option value="<?= $row_tdoc['id'] ?>"><?= $row_tdoc['name'] ?></option>
                                        <?php
                                        endwhile;
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class='col-lg-12 justify-content-center text-center'>
                                <div class='form-group'>
                                    <button type='submit' class='btn btn-primary btn-lg '>Cadastrar</button>

                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class='modal-footer' style='border:none;'>


                </div>
            </div>
        </div>
    </div>


    <!-- Settings sidebar end here -->
    <!-- Library Bundle Script -->
    <script src="assets/js/core/libs.min.js"></script>
    <!-- Plugin Scripts -->




    <!-- Slider-tab Script -->
    <script src="assets/js/plugins/slider-tabs.js"></script>













    <!-- SwiperSlider Script -->
    <script src="assets/vendor/swiperSlider/swiper-bundle.min.js"></script>
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
    <script src="e-commerce/assets/js/ecommerce.js" defer></script>
</body>

</html>