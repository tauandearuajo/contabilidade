<?php

require_once 'model/database/conexao.php';


session_start();
if (!isset($_SESSION['logado'])) :
    header('Location: index.php');
endif;

$id = $_SESSION['id_usuario'];
$sql = " SELECT*FROM users WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);


//tipo_usuario = $dados['user_level'];
define('Endereco', 'https://admin.emperius.com.br');

$sql_tipo = "SELECT user_level from users where id='$id'";
$resultado_tipo = mysqli_query($connect, $sql_tipo);
$dadoTipo = mysqli_fetch_array($resultado_tipo);
$idcliente = $dados['id'];





?>
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administração - social</title>
    <meta name="description" content="">
    <meta name="keywords" content="premium, admin, dashboard, template, bootstrap 5, clean ui, hope ui, admin dashboard,responsive dashboard, optimized dashboard,">
    <meta name="author" content="Iqonic Design">
    <meta name="DC.title" content="Hope UI Pro | Responsive Bootstrap 5 Admin Dashboard Template">

    <!-- Google Font Api KEY-->
    <meta name="google_font_api" content="AIzaSyBG58yNdAjc20_8jAvLNSVi9E4Xhwjau_k">
    <!-- Config Options -->
    <meta name="setting_options" content='{&quot;saveLocal&quot;:&quot;sessionStorage&quot;,&quot;storeKey&quot;:&quot;huisetting&quot;,&quot;setting&quot;:{&quot;app_name&quot;:{&quot;value&quot;:&quot;Hope UI&quot;},&quot;theme_scheme_direction&quot;:{&quot;value&quot;:&quot;ltr&quot;},&quot;theme_scheme&quot;:{&quot;value&quot;:&quot;light&quot;},&quot;theme_style_appearance&quot;:{&quot;value&quot;:[&quot;theme-default&quot;]},&quot;theme_color&quot;:{&quot;colors&quot;:{&quot;--{{prefix}}primary&quot;:&quot;#ef7922&quot;,&quot;--{{prefix}}info&quot;:&quot;#08B1BA&quot;},&quot;value&quot;:&quot;theme-color-default&quot;},&quot;theme_transition&quot;:{&quot;value&quot;:&quot;theme-with-animation&quot;},&quot;theme_font_size&quot;:{&quot;value&quot;:&quot;theme-fs-md&quot;},&quot;page_layout&quot;:{&quot;value&quot;:&quot;container-fluid&quot;},&quot;header_navbar&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;header_banner&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;sidebar_color&quot;:{&quot;value&quot;:&quot;sidebar-white&quot;},&quot;card_color&quot;:{&quot;value&quot;:&quot;card-default&quot;},&quot;sidebar_type&quot;:{&quot;value&quot;:[]},&quot;sidebar_menu_style&quot;:{&quot;value&quot;:&quot;left-bordered&quot;},&quot;footer&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;body_font_family&quot;:{&quot;value&quot;:null},&quot;heading_font_family&quot;:{&quot;value&quot;:null}}}'>
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="assets/css/core/libs.min.css" />

    <!-- Flatpickr css -->
    <link rel="stylesheet" href="assets/vendor/flatpickr/dist/flatpickr.min.css" />

    <link rel="stylesheet" href="assets/vendor/sheperd/dist/css/sheperd.css">










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

</head>

<body class="  ">
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
                            <img src="<?php echo $dados['photo_user'] ?>" alt="User-Profile" class="img-fluid rounded-circle" style="border: 4px solid #F5773D;" loading="lazy">
                        </div>
                    </div>
                    <div class="sidebar-profile-detail">
                        <h6 class="sidebar-profile-name"><?php echo $dados['name'] ?></h6>
                        <span class="sidebar-profile-username"><?php echo $dados['status'] ?></span>
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
                        <a class="nav-link active" aria-current="page" href="myaccount.php">
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
                        <a class="nav-link " aria-current="page" href="guiasedocumentos.php">
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
        <div class="position-relative  iq-banner ">
            <!--Nav Start-->
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
            <div class="iq-navbar-header" style="height: 215px;">
                <div class="container-fluid iq-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="flex-wrap d-flex justify-content-between align-items-center">
                                <div>
                                    <h1>Meu Perfil</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Nav Header Component End -->
            <!--Nav End-->
        </div>
        <div class="content-inner container-fluid pb-0" id="page_layout">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="profile-img position-relative me-3 mb-3 mb-lg-0 profile-logo profile-logo1">
                                        <img src="<?= $dados['photo_user'] ?>" alt="User-Profile" class="theme-color-default-img img-fluid rounded-pill avatar-100" loading="lazy" />

                                    </div>
                                    <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                                        <h4 class="me-2 h4"><?= $dados['name'] ?></h4>
                                        <h5> - Nivel de usuário: <?= $dados['user_level'] ?></h5>
                                    </div>

                                </div>
                                <ul class="d-flex nav nav-pills mb-0 text-center profile-tab" data-toggle="slider-tab" id="profile-pills-tab" role="tablist">
                                    <!--<li class="nav-item">
                              <a class="nav-link " data-bs-toggle="tab" href="#profile-feed" role="tab" aria-selected="false">Feed</a>
                           </li>-->
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-bs-toggle="tab" href="#profile-activity" role="tab" aria-selected="false">Registro de atividades</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#profile-profile" role="tab" aria-selected="false">Perfil</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title">
                                <h4 class="card-title">Registro de acesso</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-inline m-0 p-0">
                                <li class="d-flex mb-2">
                                    <div class="news-icon me-3">
                                        <svg width="20" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M20,2H4A2,2 0 0,0 2,4V22L6,18H20A2,2 0 0,0 22,16V4C22,2.89 21.1,2 20,2Z" />
                                        </svg>
                                    </div>
                                    <p class="news-detail mb-0">Sua conta de usuario doi criada em: <?= $dados['created_at'] ?></p>
                                </li>
                            </ul>
                        </div>
                    </div>

                    
                </div>
                <div class="col-lg-6">
                    <div class="profile-content tab-content iq-tab-fade-up">
                        <div id="profile-activity" class="tab-pane fade active show">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">Atividades recentes</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="iq-timeline0 m-0 d-flex align-items-center justify-content-between position-relative">
                                        <ul class="list-inline p-0 m-0">

                                          

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="profile-profile" class="tab-pane fade">
                            <div class="card">
                                <div class="card-header">
                                    <div class="header-title">
                                        <h4 class="card-title">Meu perfil</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <div>
                                            <img src="<?= $dados['photo_user'] ?>" style="border: 4px solid #F5773D;" alt="profile-img" class=" border-primary rounded-pill avatar-130 img-fluid" loading="lazy" />
                                            <br> <button type="button" class="btn btn-primary btn-sm rounded-pill mt-3" data-bs-toggle="modal" data-bs-target="#atualizarfoto<?= $dados['id'] ?>"> <svg height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.4" d="M19.9927 18.9534H14.2984C13.7429 18.9534 13.291 19.4124 13.291 19.9767C13.291 20.5422 13.7429 21.0001 14.2984 21.0001H19.9927C20.5483 21.0001 21.0001 20.5422 21.0001 19.9767C21.0001 19.4124 20.5483 18.9534 19.9927 18.9534Z" fill="currentColor"></path>
                                                    <path d="M10.309 6.90385L15.7049 11.2639C15.835 11.3682 15.8573 11.5596 15.7557 11.6929L9.35874 20.0282C8.95662 20.5431 8.36402 20.8344 7.72908 20.8452L4.23696 20.8882C4.05071 20.8903 3.88775 20.7613 3.84542 20.5764L3.05175 17.1258C2.91419 16.4915 3.05175 15.8358 3.45388 15.3306L9.88256 6.95545C9.98627 6.82108 10.1778 6.79743 10.309 6.90385Z" fill="currentColor"></path>
                                                    <path opacity="0.4" d="M18.1208 8.66544L17.0806 9.96401C16.9758 10.0962 16.7874 10.1177 16.6573 10.0124C15.3927 8.98901 12.1545 6.36285 11.2561 5.63509C11.1249 5.52759 11.1069 5.33625 11.2127 5.20295L12.2159 3.95706C13.126 2.78534 14.7133 2.67784 15.9938 3.69906L17.4647 4.87078C18.0679 5.34377 18.47 5.96726 18.6076 6.62299C18.7663 7.3443 18.597 8.0527 18.1208 8.66544Z" fill="currentColor"></path>
                                                </svg> Atualizar foto do perfil</button>

                                        </div>
                                        <div class="mt-3">

                                            <h3 class="d-inline-block"><?= $dados['name'] ?></h3>
                                            <p class="d-inline-block pl-3"> - Nivel de usuário: <?= $dados['user_level'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="header-title">
                                        <h4 class="card-title">Dados de usuario</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="user-bio">
                                        <p></p>
                                    </div>
                                    <div class="mt-2">
                                        <h6 class="mb-1">Email:</h6>
                                        <p>
                                        <h5><a class="text-body"><?= $dados['email'] ?>
                                                <button type="button" class="btn btn-primary btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#atualizaremail<?= $dados['id'] ?>"> <svg height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.4" d="M19.9927 18.9534H14.2984C13.7429 18.9534 13.291 19.4124 13.291 19.9767C13.291 20.5422 13.7429 21.0001 14.2984 21.0001H19.9927C20.5483 21.0001 21.0001 20.5422 21.0001 19.9767C21.0001 19.4124 20.5483 18.9534 19.9927 18.9534Z" fill="currentColor"></path>
                                                        <path d="M10.309 6.90385L15.7049 11.2639C15.835 11.3682 15.8573 11.5596 15.7557 11.6929L9.35874 20.0282C8.95662 20.5431 8.36402 20.8344 7.72908 20.8452L4.23696 20.8882C4.05071 20.8903 3.88775 20.7613 3.84542 20.5764L3.05175 17.1258C2.91419 16.4915 3.05175 15.8358 3.45388 15.3306L9.88256 6.95545C9.98627 6.82108 10.1778 6.79743 10.309 6.90385Z" fill="currentColor"></path>
                                                        <path opacity="0.4" d="M18.1208 8.66544L17.0806 9.96401C16.9758 10.0962 16.7874 10.1177 16.6573 10.0124C15.3927 8.98901 12.1545 6.36285 11.2561 5.63509C11.1249 5.52759 11.1069 5.33625 11.2127 5.20295L12.2159 3.95706C13.126 2.78534 14.7133 2.67784 15.9938 3.69906L17.4647 4.87078C18.0679 5.34377 18.47 5.96726 18.6076 6.62299C18.7663 7.3443 18.597 8.0527 18.1208 8.66544Z" fill="currentColor"></path>
                                                    </svg></button></a>
                                            <div class=""></div>
                                        </h5>

                                        </p>
                                    </div>
                                    <div class="mt-2">
                                        <h6 class="mb-1">Status da conta:</h6>
                                        <p><a class="text-body"><?= $dados['status'] ?></a></p>
                                    </div>
                                    <div class="mt-2">
                                        <!--  <h6 class="mb-1">Contato:</h6>
                                        <p><a class="text-body"><?= $dados['status'] ?><button type="button" class="btn btn-primary btn-sm rounded-pill"> <svg height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.4" d="M19.9927 18.9534H14.2984C13.7429 18.9534 13.291 19.4124 13.291 19.9767C13.291 20.5422 13.7429 21.0001 14.2984 21.0001H19.9927C20.5483 21.0001 21.0001 20.5422 21.0001 19.9767C21.0001 19.4124 20.5483 18.9534 19.9927 18.9534Z" fill="currentColor"></path>
                                                        <path d="M10.309 6.90385L15.7049 11.2639C15.835 11.3682 15.8573 11.5596 15.7557 11.6929L9.35874 20.0282C8.95662 20.5431 8.36402 20.8344 7.72908 20.8452L4.23696 20.8882C4.05071 20.8903 3.88775 20.7613 3.84542 20.5764L3.05175 17.1258C2.91419 16.4915 3.05175 15.8358 3.45388 15.3306L9.88256 6.95545C9.98627 6.82108 10.1778 6.79743 10.309 6.90385Z" fill="currentColor"></path>
                                                        <path opacity="0.4" d="M18.1208 8.66544L17.0806 9.96401C16.9758 10.0962 16.7874 10.1177 16.6573 10.0124C15.3927 8.98901 12.1545 6.36285 11.2561 5.63509C11.1249 5.52759 11.1069 5.33625 11.2127 5.20295L12.2159 3.95706C13.126 2.78534 14.7133 2.67784 15.9938 3.69906L17.4647 4.87078C18.0679 5.34377 18.47 5.96726 18.6076 6.62299C18.7663 7.3443 18.597 8.0527 18.1208 8.66544Z" fill="currentColor"></path>
                                                    </svg></button></a></p>-->
                                    </div>
                                    <div class="mt-2">

                                        <p>
                                        <form action="model/atualizar_senha.php" method="post" class="row g-3 ">


                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <input type="hidden" class="form-control" name="fun_id" id="lname" value="<?= $dados['id'] ?>" required>
                                                    <input type="hidden" class="form-control" name="fun_email" id="lname" value="<?= $dados['email'] ?>" required>

                                                </div>
                                                <h4 class="mb-3">Alterar minha senha:</h4>
                                                <input type="hidden" class="form-control" name="cli_id" value="<?= $id ?>" id="disabledCustomFile">
                                                <input type="hidden" class="form-control" name="cli_nameuser" value="<?= $dados['name'] ?>" id="disabledCustomFile">
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="pass">Insira a nova senha:</label>
                                                    <input type="password" name="password" class="form-control" id="pass">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="rpass">Repetir senha:</label>
                                                    <input type="password" name="repeat_password" class="form-control" id="rpass">
                                                </div>
                                            </div>
                                            <!--
                                        <div class="checkbox">
                                            <label class="form-label"><input class="form-check-input me-2" type="checkbox" value="" id="flexchexked" required>Ativar perfil do funcionario</label>
                                        </div>--->
                                            <button type="submit" class="btn btn-primary mt-4">Atualizar senha</button>
                                        </form>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title">
                                <h4 class="card-title">Dados do usuário</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-1">Email: <a href="#" class="ms-3"><?= $dados['email'] ?></a></div>
                            <div class="mb-1">Celular: <a href="#" class="ms-3"></a></div>
                            <div>Status da conta: <span class="ms-3"><?= $dados['status'] ?></span></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="offcanvas offcanvas-bottom share-offcanvas" tabindex="-1" id="share-btn" aria-labelledby="shareBottomLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="shareBottomLabel">Share</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body small">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="text-center me-3 mb-3">
                            <img src="assets/images/brands/08.png" class="img-fluid rounded mb-2" alt="" loading="lazy">
                            <h6>Facebook</h6>
                        </div>
                        <div class="text-center me-3 mb-3">
                            <img src="assets/images/brands/09.png" class="img-fluid rounded mb-2" alt="" loading="lazy">
                            <h6>Twitter</h6>
                        </div>
                        <div class="text-center me-3 mb-3">
                            <img src="assets/images/brands/10.png" class="img-fluid rounded mb-2" alt="" loading="lazy">
                            <h6>Instagram</h6>
                        </div>
                        <div class="text-center me-3 mb-3">
                            <img src="assets/images/brands/11.png" class="img-fluid rounded mb-2" alt="" loading="lazy">
                            <h6>Google Plus</h6>
                        </div>
                        <div class="text-center me-3 mb-3">
                            <img src="assets/images/brands/13.png" class="img-fluid rounded mb-2" alt="" loading="lazy">
                            <h6>In</h6>
                        </div>
                        <div class="text-center me-3 mb-3">
                            <img src="assets/images/brands/12.png" class="img-fluid rounded mb-2" alt="" loading="lazy">
                            <h6>YouTube</h6>
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
                    </span> Por </a>.
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->
    </main>
    <!-- Live Customizer start -->
    <!-- Setting offcanvas start here -->
    <div class="offcanvas offcanvas-end live-customizer" tabindex="-1" id="live-customizer" data-bs-scroll="true" data-bs-backdrop="false" aria-labelledby="live-customizer-label">
        <div class="offcanvas-header">
            <div class="d-flex align-items-center">
                <h4 class="offcanvas-title" id="live-customizer-label">Personalizar template</h4>
            </div>
            <div class="d-flex gap-2 align-items-center">

                <button class="btn btn-primary btn-icon" data-reset="settings" data-bs-toggle="tooltip" data-bs-placement="left" title="Reset All Settings">
                    <span class="btn-inner">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.4">
                                <path d="M4.88076 14.6713C4.74978 14.2784 4.32504 14.066 3.93208 14.197C3.53912 14.328 3.32675 14.7527 3.45774 15.1457L4.88076 14.6713ZM20.8808 15.1457C21.0117 14.7527 20.7994 14.328 20.4064 14.197C20.0135 14.066 19.5887 14.2784 19.4577 14.6713L20.8808 15.1457ZM4.16925 14.9085C3.45774 15.1457 3.45785 15.146 3.45797 15.1464C3.45802 15.1465 3.45815 15.1469 3.45825 15.1472C3.45845 15.1478 3.45868 15.1485 3.45895 15.1493C3.45948 15.1509 3.46013 15.1528 3.46092 15.1551C3.46249 15.1597 3.46456 15.1657 3.46716 15.1731C3.47235 15.188 3.47961 15.2084 3.48902 15.2341C3.50782 15.2854 3.53521 15.3576 3.5717 15.4477C3.64461 15.6279 3.7542 15.8805 3.90468 16.1814C4.2048 16.7817 4.67223 17.5836 5.34308 18.3886C6.68942 20.0043 8.88343 21.6585 12.1693 21.6585V20.1585C9.45507 20.1585 7.64908 18.8128 6.49542 17.4284C5.91627 16.7334 5.5087 16.0354 5.24632 15.5106C5.11555 15.2491 5.02201 15.0329 4.96212 14.8849C4.9322 14.811 4.91076 14.7543 4.89733 14.7177C4.89062 14.6994 4.88593 14.6861 4.88318 14.6783C4.88181 14.6744 4.88093 14.6718 4.88053 14.6706C4.88033 14.67 4.88025 14.6698 4.88029 14.6699C4.88031 14.67 4.88036 14.6701 4.88044 14.6704C4.88047 14.6705 4.88056 14.6707 4.88058 14.6708C4.88067 14.671 4.88076 14.6713 4.16925 14.9085ZM12.1693 21.6585C15.4551 21.6585 17.6491 20.0043 18.9954 18.3886C19.6663 17.5836 20.1337 16.7817 20.4338 16.1814C20.5843 15.8805 20.6939 15.6279 20.7668 15.4477C20.8033 15.3576 20.8307 15.2854 20.8495 15.2341C20.8589 15.2084 20.8662 15.188 20.8713 15.1731C20.8739 15.1657 20.876 15.1597 20.8776 15.1551C20.8784 15.1528 20.879 15.1509 20.8796 15.1493C20.8798 15.1485 20.8801 15.1478 20.8803 15.1472C20.8804 15.1469 20.8805 15.1465 20.8805 15.1464C20.8807 15.146 20.8808 15.1457 20.1693 14.9085C19.4577 14.6713 19.4578 14.671 19.4579 14.6708C19.4579 14.6707 19.458 14.6705 19.4581 14.6704C19.4581 14.6701 19.4582 14.67 19.4582 14.6699C19.4583 14.6698 19.4582 14.67 19.458 14.6706C19.4576 14.6718 19.4567 14.6744 19.4553 14.6783C19.4526 14.6861 19.4479 14.6994 19.4412 14.7177C19.4277 14.7543 19.4063 14.811 19.3764 14.8849C19.3165 15.0329 19.223 15.2491 19.0922 15.5106C18.8298 16.0354 18.4222 16.7334 17.8431 17.4284C16.6894 18.8128 14.8834 20.1585 12.1693 20.1585V21.6585Z" fill="currentColor"></path>
                                <path d="M21.5183 19.2271C21.4293 19.2234 21.3427 19.196 21.2671 19.1465L16.3546 15.8924C16.2197 15.8026 16.1413 15.6537 16.148 15.4969C16.1546 15.34 16.2452 15.1982 16.3873 15.1202L21.5571 12.2926C21.7075 12.2106 21.8932 12.213 22.0416 12.3003C22.1907 12.387 22.2783 12.5436 22.2712 12.7096L22.014 18.7913C22.007 18.9573 21.9065 19.1059 21.7506 19.1797C21.6772 19.215 21.597 19.2305 21.5183 19.2271" fill="currentColor"></path>
                            </g>
                            <path d="M20.0742 10.0265C20.1886 10.4246 20.6041 10.6546 21.0022 10.5401C21.4003 10.4257 21.6302 10.0102 21.5158 9.61214L20.0742 10.0265ZM4.10803 8.88317C3.96071 9.27031 4.15513 9.70356 4.54226 9.85087C4.92939 9.99818 5.36265 9.80377 5.50996 9.41664L4.10803 8.88317ZM20.795 9.81934C21.5158 9.61214 21.5157 9.6118 21.5156 9.61144C21.5155 9.61129 21.5154 9.6109 21.5153 9.61059C21.5152 9.60998 21.515 9.60928 21.5147 9.60848C21.5143 9.60689 21.5137 9.60493 21.513 9.6026C21.5116 9.59795 21.5098 9.59184 21.5075 9.58431C21.503 9.56925 21.4966 9.54853 21.4882 9.52251C21.4716 9.47048 21.4473 9.39719 21.4146 9.3056C21.3493 9.12256 21.2503 8.8656 21.1126 8.55861C20.8378 7.94634 20.4044 7.12552 19.7678 6.29313C18.4902 4.62261 16.3673 2.87801 13.0844 2.74053L13.0216 4.23922C15.7334 4.35278 17.4816 5.77291 18.5763 7.20436C19.1258 7.92295 19.5038 8.63743 19.744 9.17271C19.8638 9.43949 19.9482 9.65937 20.0018 9.80972C20.0286 9.88483 20.0477 9.94238 20.0596 9.97951C20.0655 9.99808 20.0696 10.0115 20.072 10.0195C20.0732 10.0235 20.074 10.0261 20.0744 10.0273C20.0746 10.0278 20.0746 10.0281 20.0746 10.028C20.0746 10.0279 20.0745 10.0278 20.0745 10.0275C20.0744 10.0274 20.0744 10.0272 20.0743 10.0271C20.0743 10.0268 20.0742 10.0265 20.795 9.81934ZM13.0844 2.74053C9.80146 2.60306 7.54016 4.16407 6.12741 5.72193C5.42345 6.49818 4.92288 7.27989 4.59791 7.86704C4.43497 8.16144 4.31491 8.40923 4.23452 8.58617C4.1943 8.67471 4.16391 8.7457 4.14298 8.79616C4.13251 8.82139 4.1244 8.84151 4.11859 8.85613C4.11568 8.86344 4.11336 8.86938 4.1116 8.8739C4.11072 8.87616 4.10998 8.87807 4.10939 8.87962C4.10909 8.88039 4.10883 8.88108 4.1086 8.88167C4.10849 8.88196 4.10834 8.88234 4.10829 8.88249C4.10815 8.88284 4.10803 8.88317 4.80899 9.14991C5.50996 9.41664 5.50985 9.41692 5.50975 9.41719C5.50973 9.41725 5.50964 9.41749 5.50959 9.4176C5.5095 9.41784 5.50945 9.41798 5.50942 9.41804C5.50938 9.41816 5.50947 9.41792 5.50969 9.41734C5.51014 9.41619 5.51113 9.41365 5.51267 9.40979C5.51574 9.40206 5.52099 9.38901 5.52846 9.37101C5.5434 9.335 5.56719 9.27924 5.60018 9.20664C5.66621 9.0613 5.76871 8.84925 5.91031 8.59341C6.19442 8.08008 6.63084 7.39971 7.23855 6.72958C8.44912 5.39466 10.3098 4.12566 13.0216 4.23922L13.0844 2.74053Z" fill="currentColor"></path>
                            <path d="M8.78337 9.33604C8.72981 9.40713 8.65805 9.46292 8.57443 9.49703L3.1072 11.6951C2.95672 11.7552 2.78966 11.7352 2.66427 11.6407C2.53887 11.5462 2.47359 11.3912 2.48993 11.2299L3.09576 5.36863C3.11367 5.19823 3.22102 5.04666 3.37711 4.97402C3.5331 4.9005 3.71173 4.91728 3.84442 5.01726L8.70581 8.68052C8.8385 8.78051 8.90387 8.94759 8.8762 9.1178C8.86358 9.19825 8.83082 9.27308 8.78337 9.33604" fill="currentColor"></path>
                        </svg>
                    </span>
                </button>
            </div>
            <button type="button" class="btn-close px-0 text-reset shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body data-scrollbar">
            <div class="row">
                <div class="col-lg-12">
                    <div class="border border-2 rounded mb-3">
                        <div class="px-3 pt-3 text-center">
                            <h5 class="d-inline-block">Configuração de estilo</h5>
                        </div>
                        <div class="p-3">
                            <!-- Theme start here -->
                            <div>
                                <h6 class="mb-3">Tema</h6>
                                <div class="d-grid gap-3 grid-cols-3 mb-3">
                                    <div data-setting="radio">
                                        <input type="radio" value="auto" class="btn-check" name="theme_scheme" id="color-mode-auto" checked>
                                        <label class="btn btn-border d-block" for="color-mode-auto">
                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill="currentColor" d="M7,2V13H10V22L17,10H13L17,2H7Z" />
                                            </svg>
                                            Auto
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="dark" class="btn-check" name="theme_scheme" id="color-mode-dark">
                                        <label class="btn btn-border d-block" for="color-mode-dark">
                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill="currentColor" d="M9,2C7.95,2 6.95,2.16 6,2.46C10.06,3.73 13,7.5 13,12C13,16.5 10.06,20.27 6,21.54C6.95,21.84 7.95,22 9,22A10,10 0 0,0 19,12A10,10 0 0,0 9,2Z" />
                                            </svg>
                                            Dark
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="light" class="btn-check" name="theme_scheme" id="color-mode-light">
                                        <label class="btn  btn-border d-block" for="color-mode-light">
                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill="currentColor" d="M12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8M12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18M20,8.69V4H15.31L12,0.69L8.69,4H4V8.69L0.69,12L4,15.31V20H8.69L12,23.31L15.31,20H20V15.31L23.31,12L20,8.69Z">
                                                </path>
                                            </svg>
                                            Light
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <!-- Theme end here -->

                            <hr class="hr-horizontal">

                            <!-- Color customizer start here -->

                            <div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="mt-4 mb-3">Personalizador de cores</h6>
                                    <div class="d-flex align-items-center">
                                        <a href="#custom-color" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="custom-color">Costumizar</a>
                                        <div data-setting="radio">
                                            <input type="radio" value="theme-color-default" class="btn-check" name="theme_color" id="theme-color-default" data-colors='{"primary": "#ef7922", "info": "#08B1BA"}'>
                                            <label class="btn bg-transparent px-2 border-0" for="theme-color-default" data-bs-toggle="tooltip" data-bs-placement="top" title="Reset Color" data-bs-original-title="Reset color">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21.4799 12.2424C21.7557 12.2326 21.9886 12.4482 21.9852 12.7241C21.9595 14.8075 21.2975 16.8392 20.0799 18.5506C18.7652 20.3986 16.8748 21.7718 14.6964 22.4612C12.518 23.1505 10.1711 23.1183 8.01299 22.3694C5.85488 21.6205 4.00382 20.196 2.74167 18.3126C1.47952 16.4293 0.875433 14.1905 1.02139 11.937C1.16734 9.68346 2.05534 7.53876 3.55018 5.82945C5.04501 4.12014 7.06478 2.93987 9.30193 2.46835C11.5391 1.99683 13.8711 2.2599 15.9428 3.2175L16.7558 1.91838C16.9822 1.55679 17.5282 1.62643 17.6565 2.03324L18.8635 5.85986C18.945 6.11851 18.8055 6.39505 18.549 6.48314L14.6564 7.82007C14.2314 7.96603 13.8445 7.52091 14.0483 7.12042L14.6828 5.87345C13.1977 5.18699 11.526 4.9984 9.92231 5.33642C8.31859 5.67443 6.8707 6.52052 5.79911 7.74586C4.72753 8.97119 4.09095 10.5086 3.98633 12.1241C3.8817 13.7395 4.31474 15.3445 5.21953 16.6945C6.12431 18.0446 7.45126 19.0658 8.99832 19.6027C10.5454 20.1395 12.2278 20.1626 13.7894 19.6684C15.351 19.1743 16.7062 18.1899 17.6486 16.8652C18.4937 15.6773 18.9654 14.2742 19.0113 12.8307C19.0201 12.5545 19.2341 12.3223 19.5103 12.3125L21.4799 12.2424Z" fill="#31BAF1" />
                                                    <path d="M20.0941 18.5594C21.3117 16.848 21.9736 14.8163 21.9993 12.7329C22.0027 12.4569 21.7699 12.2413 21.4941 12.2512L19.5244 12.3213C19.2482 12.3311 19.0342 12.5633 19.0254 12.8395C18.9796 14.283 18.5078 15.6861 17.6628 16.8739C16.7203 18.1986 15.3651 19.183 13.8035 19.6772C12.2419 20.1714 10.5595 20.1483 9.01246 19.6114C7.4654 19.0746 6.13845 18.0534 5.23367 16.7033C4.66562 15.8557 4.28352 14.9076 4.10367 13.9196C4.00935 18.0934 6.49194 21.37 10.008 22.6416C10.697 22.8908 11.4336 22.9852 12.1652 22.9465C13.075 22.8983 13.8508 22.742 14.7105 22.4699C16.8889 21.7805 18.7794 20.4073 20.0941 18.5594Z" fill="#0169CA" />
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="custom-color">
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <label class="" for="custom-primary-color">Primary</label>
                                        <input class="" name="theme_color" data-extra="primary" type="color" id="custom-primary-color" value="#ef7922" data-setting="color">
                                    </div>
                                    <div class="form-group d-flex d-flex justify-content-between align-items-center">
                                        <label class="" for="custom-info-color">Secondary</label>
                                        <input class="" name="theme_color" data-extra="info" type="color" id="custom-info-color" value="#08B1BA" data-setting="color">
                                    </div>
                                </div>
                                <div class="grid-cols-5 mb-4 d-grid gap-3">
                                    <div data-setting="radio">
                                        <input type="radio" value="theme-color-blue" class="btn-check" name="theme_color" id="theme-color-1" data-colors='{"primary": "#00C3F9", "info": "#573BFF"}'>
                                        <label class="btn btn-border d-block bg-transparent" for="theme-color-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Theme-1" data-bs-original-title="Theme-1">
                                            <svg class="customizer-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="26" height="26">
                                                <circle cx="12" cy="12" r="10" fill="#00C3F9" />
                                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#573BFF" />
                                            </svg>
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="theme-color-gray" class="btn-check" name="theme_color" id="theme-color-2" data-colors='{"primary": "#91969E", "info": "#FD8D00"}'>
                                        <label class="btn btn-border d-block bg-transparent" for="theme-color-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Theme-2" data-bs-original-title="Theme-2">
                                            <svg class="customizer-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="26" height="26">
                                                <circle cx="12" cy="12" r="10" fill="#91969E" />
                                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#FD8D00" />
                                            </svg>
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="theme-color-red" class="btn-check" name="theme_color" id="theme-color-3" data-colors='{"primary": "#DB5363", "info": "#366AF0"}'>
                                        <label class="btn btn-border d-block bg-transparent" for="theme-color-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Theme-3" data-bs-original-title="Theme-3">
                                            <svg class="customizer-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="26" height="26">
                                                <circle cx="12" cy="12" r="10" fill="#DB5363" />
                                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#366AF0" />
                                            </svg>
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="theme-color-yellow" class="btn-check" name="theme_color" id="theme-color-4" data-colors='{"primary": "#EA6A12", "info": "#6410F1"}'>
                                        <label class="btn btn-border d-block bg-transparent" for="theme-color-4" data-bs-toggle="tooltip" data-bs-placement="top" title="Theme-4" data-bs-original-title="Theme-4">
                                            <svg class="customizer-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="26" height="26">
                                                <circle cx="12" cy="12" r="10" fill="#EA6A12" />
                                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#6410F1" />
                                            </svg>
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="theme-color-pink" class="btn-check" name="theme_color" id="theme-color-5" data-colors='{"primary": "#E586B3", "info": "#25C799"}'>
                                        <label class="btn btn-border d-block bg-transparent" for="theme-color-5" data-bs-toggle="tooltip" data-bs-placement="top" title="Theme-5" data-bs-original-title="Theme-5">
                                            <svg class="customizer-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="26" height="26">
                                                <circle cx="12" cy="12" r="10" fill="#E586B3" />
                                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#25C799" />
                                            </svg>
                                        </label>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Settings sidebar end here -->
    <a class="btn btn-fixed-end btn-warning btn-icon btn-setting" id="settingbutton" data-bs-toggle="offcanvas" data-bs-target="#live-customizer" role="button" aria-controls="live-customizer">
        <svg class="icon-24 animated-rotate" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8064 7.62361L20.184 6.54352C19.6574 5.6296 18.4905 5.31432 17.5753 5.83872V5.83872C17.1397 6.09534 16.6198 6.16815 16.1305 6.04109C15.6411 5.91402 15.2224 5.59752 14.9666 5.16137C14.8021 4.88415 14.7137 4.56839 14.7103 4.24604V4.24604C14.7251 3.72922 14.5302 3.2284 14.1698 2.85767C13.8094 2.48694 13.3143 2.27786 12.7973 2.27808H11.5433C11.0367 2.27807 10.5511 2.47991 10.1938 2.83895C9.83644 3.19798 9.63693 3.68459 9.63937 4.19112V4.19112C9.62435 5.23693 8.77224 6.07681 7.72632 6.0767C7.40397 6.07336 7.08821 5.98494 6.81099 5.82041V5.82041C5.89582 5.29601 4.72887 5.61129 4.20229 6.52522L3.5341 7.62361C3.00817 8.53639 3.31916 9.70261 4.22975 10.2323V10.2323C4.82166 10.574 5.18629 11.2056 5.18629 11.8891C5.18629 12.5725 4.82166 13.2041 4.22975 13.5458V13.5458C3.32031 14.0719 3.00898 15.2353 3.5341 16.1454V16.1454L4.16568 17.2346C4.4124 17.6798 4.82636 18.0083 5.31595 18.1474C5.80554 18.2866 6.3304 18.2249 6.77438 17.976V17.976C7.21084 17.7213 7.73094 17.6516 8.2191 17.7822C8.70725 17.9128 9.12299 18.233 9.37392 18.6717C9.53845 18.9489 9.62686 19.2646 9.63021 19.587V19.587C9.63021 20.6435 10.4867 21.5 11.5433 21.5H12.7973C13.8502 21.5001 14.7053 20.6491 14.7103 19.5962V19.5962C14.7079 19.088 14.9086 18.6 15.2679 18.2407C15.6272 17.8814 16.1152 17.6807 16.6233 17.6831C16.9449 17.6917 17.2594 17.7798 17.5387 17.9394V17.9394C18.4515 18.4653 19.6177 18.1544 20.1474 17.2438V17.2438L20.8064 16.1454C21.0615 15.7075 21.1315 15.186 21.001 14.6964C20.8704 14.2067 20.55 13.7894 20.1108 13.5367V13.5367C19.6715 13.284 19.3511 12.8666 19.2206 12.3769C19.09 11.8873 19.16 11.3658 19.4151 10.928C19.581 10.6383 19.8211 10.3982 20.1108 10.2323V10.2323C21.0159 9.70289 21.3262 8.54349 20.8064 7.63277V7.63277V7.62361Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <circle cx="12.1747" cy="11.8891" r="2.63616" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
        </svg>
    </a>
    <!-- Modal  atualizar foto-->
    <div class="modal fade" id="atualizarfoto<?= $dados['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Atualize a foto de perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="model/atualizacao_imagem_cliente.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <input type="hidden" class="form-control" name="cli_id" value="<?= $id ?>" id="disabledCustomFile">
                                <input type="hidden" class="form-control" name="cli_nameuser" value="<?= $dados['name'] ?>" id="disabledCustomFile">
                                <label class="form-label" for="disabledCustomFile">Selecione a nova foto</label>
                                <input type="file" name="foto_do_cliente" class="form-control" id="disabledCustomFile">
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary">Atualizar foto</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal  atualizar email de cadastro -->
    <div class="modal fade" id="atualizaremail<?= $dados['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Atualize seu email de cadastro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="model/atualizacao_email.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <input type="hidden" class="form-control" name="cli_id" value="<?= $id ?>" id="disabledCustomFile">
                                <input type="hidden" class="form-control" name="cli_nameuser" value="<?= $dados['name'] ?>" id="disabledCustomFile">
                                <label class="form-label" for="disabledCustomFile">Informa o novo email</label>
                                <input type="text" class="form-control" name="cli_email" id="disabledCustomFile">
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary">Atualizar email</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Library Bundle Script -->
    <script src="assets/js/core/libs.min.js"></script>
    <!-- Plugin Scripts -->




    <!-- Slider-tab Script -->
    <script src="assets/js/plugins/slider-tabs.js"></script>

    <!-- fslightbox Script -->
    <script src="assets/js/plugins/fslightbox.js" defer></script>












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