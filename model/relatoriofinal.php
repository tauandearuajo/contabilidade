<?php
require 'vendor/autoload.php';
require_once 'database/conexao.php';

date_default_timezone_set('America/Sao_Paulo');
session_start();
if (!isset($_SESSION['logado'])) :
    header('Location: VALAN.app.br/cliente');
endif;

$id = $_SESSION['id_usuario'];
$idcliente = $_SESSION['client_id'];
$report_id = $_SESSION['idreport'];
$sql = " SELECT*FROM users WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);


//tipo_usuario = $dados['user_level'];
define('Endereco', 'https://admin.emperius.com.br');

$sql_tipo = "SELECT user_level from users where id='$id'";
$resultado_tipo = mysqli_query($connect, $sql_tipo);
$dadoTipo = mysqli_fetch_array($resultado_tipo);

$email_agent = $dados['email'];

$sql_cli = "SELECT*FROM clients where id='$idcliente'";
$query_cli = mysqli_query($connect, $sql_cli);
$dados_cli = mysqli_fetch_array($query_cli);

$sql_agent = "SELECT*FROM agents where email='$email_agent'";
$query_agent = mysqli_query($connect, $sql_agent);
$data_agent = mysqli_fetch_array($query_agent);

$agent_code = $_SESSION['agent_code'];

$sql_site = "SELECT*FROM site where report_id='$idreport' ";
$query_site = mysqli_query($connect, $sql_site);
$data_site = mysqli_fetch_array($query_site);

$sql_cadeado = "SELECT*FROM padlock where report_id='$idreport' ";
$query_cadeado = mysqli_query($connect, $sql_cadeado);
$data_cadeado = mysqli_fetch_array($query_cadeado);


$sql_access = "SELECT*FROM access_way where report_id='$idreport' ";
$query_access = mysqli_query($connect, $sql_access);
$data_access = mysqli_fetch_array($query_access);

// fachada e laterais
$sql_facades = "SELECT*FROM facades_and_sides where report_id='$idreport' ";
$query_facades = mysqli_query($connect, $sql_facades);
$data_facades = mysqli_fetch_array($query_facades);

// energia
$sql_energy = "SELECT*FROM energy where report_id='$idreport' ";
$query_energy = mysqli_query($connect, $sql_energy);
$data_energy = mysqli_fetch_array($query_energy);

// medidores de energia 
$sql_energy_meters = "SELECT*FROM energy_meters where report_id='$idreport' ";
$query_energy_meters = mysqli_query($connect, $sql_energy_meters);
$data_energy_meters = mysqli_fetch_array($query_energy_meters);

// quadros QTM
$sql_qtm_frame = "SELECT*FROM qtm_frame where report_id='$idreport' ";
$query_qtm_frame = mysqli_query($connect, $sql_qtm_frame);
$data_qtm_frame = mysqli_fetch_array($query_qtm_frame);

// caixa de passagem
$sql_junction = "SELECT*FROM junction_box where report_id='$idreport' ";
$query_junction = mysqli_query($connect, $sql_junction);
$data_junction = mysqli_fetch_array($query_junction);

// aterramento
$sql_grounding = "SELECT*FROM grounding where report_id='$idreport' ";
$query_grounding = mysqli_query($connect, $sql_grounding);
$data_grounding = mysqli_fetch_array($query_grounding);

// limpera da area interna do site
$sql_intsite = "SELECT*FROM internal_site_cleaning where report_id='$idreport' ";
$query_intsite = mysqli_query($connect, $sql_intsite);
$data_intsite = mysqli_fetch_array($query_intsite);

// limpera da area externa do site
$sql_extsite = "SELECT*FROM external_cleaning_site where report_id='$idreport' ";
$query_extsite = mysqli_query($connect, $sql_extsite);
$data_extsite = mysqli_fetch_array($query_extsite);

// bota fora 
$sql_put_it = "SELECT*FROM put_it_out where report_id='$idreport' ";
$query_put_it = mysqli_query($connect, $sql_put_it);
$data_put_it = mysqli_fetch_array($query_put_it);

// Bases e chumbadores EV 
$sql_ev_bases = "SELECT*FROM ev_bases_and_anchors where report_id='$idreport' ";
$query_ev_bases = mysqli_query($connect, $sql_ev_bases);
$data_ev_bases = mysqli_fetch_array($query_ev_bases);

// Drenos 
$sql_drains = "SELECT*FROM drains where report_id='$idreport' ";
$query_drains = mysqli_query($connect, $sql_drains);
$data_drains = mysqli_fetch_array($query_drains);

// Montante Cabos RF
$sql_amount = "SELECT*FROM amount where report_id='$idreport' ";
$query_amount = mysqli_query($connect, $sql_amount);
$data_amount = mysqli_fetch_array($query_amount);

// Cabos RF
$sql_rf_cables = "SELECT*FROM rf_cables where report_id='$idreport' ";
$query_rf_cables = mysqli_query($connect, $sql_rf_cables);
$data_rf_cables = mysqli_fetch_array($query_rf_cables);

// Trava quedas
$sql_lock_falls = "SELECT*FROM lock_falls where report_id='$idreport' ";
$query_lock_falls = mysqli_query($connect, $sql_lock_falls);
$data_lock_falls = mysqli_fetch_array($query_lock_falls);

// Balizamento
$sql_marking = "SELECT*FROM marking where report_id='$idreport' ";
$query_marking = mysqli_query($connect, $sql_marking);
$data_marking = mysqli_fetch_array($query_marking);

// Iluminação
$sql_site_lighting = "SELECT*FROM site_lighting where report_id='$idreport' ";
$query_site_lighting = mysqli_query($connect, $sql_site_lighting);
$data_site_lighting = mysqli_fetch_array($query_site_lighting);

// Vista da EV face A
$sql_viewface_a = "SELECT*FROM view_and_face_a where report_id='$idreport' ";
$query_viewface_a = mysqli_query($connect, $sql_viewface_a);
$data_viewface_a = mysqli_fetch_array($query_viewface_a);

// Vista da EV face B
$sql_viewface_b = "SELECT*FROM view_and_face_b where report_id='$idreport' ";
$query_viewface_b = mysqli_query($connect, $sql_viewface_b);
$data_viewface_b = mysqli_fetch_array($query_viewface_b);

// Vista da EV face C
$sql_viewface_c = "SELECT*FROM view_and_face_c where report_id='$idreport' ";
$query_viewface_c = mysqli_query($connect, $sql_viewface_c);
$data_viewface_c = mysqli_fetch_array($query_viewface_c);

// Vista da EV face D
$sql_viewface_d = "SELECT*FROM view_and_face_d where report_id='$idreport' ";
$query_viewface_d = mysqli_query($connect, $sql_viewface_d);
$data_viewface_d = mysqli_fetch_array($query_viewface_d);

// Vista áerea 2 M de altura
$sql_aerialview2m = "SELECT*FROM aerial_view_2_meters where report_id='$idreport' ";
$query_aerialview2m = mysqli_query($connect, $sql_aerialview2m);
$data_aerialview2m = mysqli_fetch_array($query_aerialview2m);

// Vista superior 2 M de altura
$sql_topview2m = "SELECT*FROM top_view_2_meters where report_id='$idreport' ";
$query_topview2m = mysqli_query($connect, $sql_topview2m);
$data_topview2m = mysqli_fetch_array($query_topview2m);

// Contrução próxima 500M
$sql_nearby500m = "SELECT*FROM nearby_construction_500m where report_id='$idreport' ";
$query_nearby500m = mysqli_query($connect, $sql_nearby500m);
$data_nearby500m = mysqli_fetch_array($query_nearby500m);

// Equipamento das operadoras
$sql_operator = "SELECT*FROM operator_equipment where report_id='$idreport' ";
$query_operator = mysqli_query($connect, $sql_operator);
$data_operator = mysqli_fetch_array($query_operator);

// Observações
$sql_observations = "SELECT*FROM general_observations where report_id='$idreport' ";
$query_observations = mysqli_query($connect, $sql_observations);
$data_observations = mysqli_fetch_array($query_observations);

// anotações
$sql_notes = "SELECT*FROM notes where report_id='$idreport' ";
$query_notes = mysqli_query($connect, $sql_notes);
$data_notes = mysqli_fetch_array($query_notes);


?>
<!doctype html>
<html lang='en' dir='ltr'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>Relatório de zeladoria</title>
    <meta name='description' content='Hope UI Pro is a revolutionary Bootstrap Admin Dashboard Template and UI Components Library. The Admin Dashboard Template and UI Component features 8 modules.'>
    <meta name='keywords' content='premium, admin, dashboard, template, bootstrap 5, clean ui, hope ui, admin dashboard,responsive dashboard, optimized dashboard, simple auth'>
    <meta name='author' content='Programadores em ação'>
    <meta name='DC.title' content='Hope UI Pro Simple | Responsive Bootstrap 5 Admin Dashboard Template'>
    <!-- Google Font Api KEY-->
    <meta name='google_font_api' content='AIzaSyBG58yNdAjc20_8jAvLNSVi9E4Xhwjau_k'>
    <!-- Config Options -->
    <!-- Favicon -->
    <link rel='shortcut icon' href='assets/images/favicon.png' />

    <!-- Library / Plugin Css Build -->
    <link rel='stylesheet' href='assets/css/core/libs.min.css' />

    <link rel='stylesheet' href='assets/vendor/swiperSlider/swiper-bundle.min.css'>

    <!-- Hope Ui Design System Css -->
    <link rel='stylesheet' href='assets/css/hope-ui.min.css?v=2.2.0' />
    <link rel='stylesheet' href='assets/css/pro.min.css?v=2.2.0' />

    <!-- Custom Css -->
    <link rel='stylesheet' href='assets/css/custom.min.css?v=2.2.0' />

    <!-- Dark Css -->
    <link rel='stylesheet' href='assets/css/dark.min.css?v=2.2.0' />

    <!-- Customizer Css -->
    <link rel='stylesheet' href='assets/css/customizer.min.css?v=2.2.0' />

     <!-- Customizer Css -->
     <link rel='stylesheet' href='assets/css/estilizarpdf.css' />
    <!-- RTL Css -->
    <link rel='stylesheet' href='assets/css/rtl.min.css?v=2.2.0' />

    <!-- Google Font -->
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap' rel='stylesheet'>
    <style>
        table,
        th,
        td {
            border: 1px solid #CCCCCC;

            align-items: center;
        }
tr{
    height: 2px !important;
}


        .tdper {
            width: 358px;
        }

.th-line{
    height: 5px !important;
}
        thead,
        tfoot {

           
        }
    </style>
</head>

<body class=''>
    <!-- loader Start -->


    <main class='main-content'>
        <div class='content-inner container-fluid pb-0' id='page_layout'>
            <div class="container d-flex justify-content-center text-center">
                <div class='row d-flex justify-content-center mt-3' style="align-content: center !important;">
                    <div class='row mb-3 mt-5  d-flex justify-content-center'>
                        <div class="col-md-8 text-center">
                            <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                        </div>
                    </div>
                    <div class='col-md-11 d-flex justify-content-center mb-4'>
                        <table style="width:717px;">
                            <thead>
                                <tr>
                                    <th colspan="2" class='' style="background-color: red; color:#FFF">
                                        <h4 class='text-center  text-white rounded mt-4 mb-4'>Site <?= $data_site['site_name'] ?></h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h4>Cidade: <?= $data_site['city'] ?></h4>
                                    </td>
                                    <td>
                                        <h4>Site ID: <?= $data_site['siteid'] ?></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Data inicial: <?= $data_site['initial_date'] ?></h4>
                                    </td>
                                    <td>
                                        <h4>Data Final: <?= $data_site['final_date'] ?></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Coordenadas: <?= $data_site['coordinates'] ?></h5>
                                    </td>
                                    <td>
                                        <h5>Coordenadas: <?= $data_site['coordinates2'] ?></h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class='col-md-11 d-flex justify-content-center' style="text-align:center; align-items:center;align-content:center;">
                        <table style="width:717px;">
                            <thead>
                                <tr>
                                    <th>
                                        <h4>Visão geral</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class='tdper' style="height:400px;"><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_site['overview'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>


            </div>
        </div>
        <div class='content-inner container-fluid pb-0' id='page_layout'>
            <!--- cadeado ----->
            <div class="container d-flex justify-content-center text-center">
                <div class='row d-flex justify-content-center text-center '>
                    <div class='row mb-3 mt-5  d-flex justify-content-center'>
                        <div class="col-md-8 text-center">
                            <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                        </div>
                    </div>
                    <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                        <table style="width:717px;">
                            <thead>
                                <tr>
                                    <th colspan="2" style="background-color: red; color:#FFF;">
                                        <h4 class='text-center  text-white rounded mt-4 mb-4'>Cadeado</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                        <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_cadeado['padlock_password'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                        <h4 class='text-center mt-4 mb-4'>Senha do cadeado</h4>
                                    </td>
                                    <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                        <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_cadeado['photo_padlock'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                        <h4>Foto da corrente</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                        <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_cadeado['padlock_password'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                        <h4>Anti ferrugem</h4>
                                    </td>
                                    <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                        <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_cadeado['photo_padlock'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                        <h4>Trinco do portão</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; align-items:center; align-content:center;">
                                        <h6 class='text-center mt-4 mb-4'>Foi instalado cadeado novo?</h6>
                                    </td>
                                    <td style="text-align:center; align-items:center; align-content:center;">
                                        <h6 class='text-center mt-4 mb-4'><?= $data_cadeado['new_padlock_installed'] ?></h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; align-items:center; align-content:center;">
                                        <h6 class='text-center mt-4 mb-4'>Estado fisico do portão</h6>
                                    </td>
                                    <td style="text-align:center; align-items:center; align-content:center;">
                                        <h6 class='text-center mt-4 mb-4'> <?= $data_cadeado['gate_status'] ?></h6>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>



            </div><br><br><br><br><br><br>


            <!-- via de acesso -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8  text-center ">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11 d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Via de acesso</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="tdper" style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_access['gps'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>GPS</h4>
                                </td>
                                <td class="tdper" style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_access['site_facade'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Fachada do site</h4>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdper" style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_access['1st_street_access'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Acesso a Rua 1</h4>
                                </td>
                                <td class="tdper" style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_access['2st_street_access'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Acesso a Rua 2</h4>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdper" style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_access['identification_plate_ev'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Placa de identificação da EV</h4>
                                </td>
                                <td class="tdper" style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_access['identification_plate_sba'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Placa de identificação da SBA</h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br><br><br><br><br><br><br><br>
            <!-- Fachada e laterais -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-7  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Fachada e laterais</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_facades['front_of_site'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Frente do site</h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_facades['gate'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Portão</h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_facades['external_sides1'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Laterais Externas</h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_facades['external_sides2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Laterais Externas</h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_facades['external_sides3'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Laterais Externas</h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_facades['external_sides4'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Laterais Externas</h4>
                                </td>
                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>
            <div class='row justify-content-center mt-3'>
                <div class='col-md-11 text-center d-flex justify-content-center'>
                    <table style="width:717px">
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_facades['right_side_internal'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Lateral Direita interna</h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_facades['left_side_internal'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Laterais Esquerda interna</h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_facades['internal_site_background'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Fundo do site(Interno)</h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_facades['internal_site_backgrounds'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Fundo do site(Interno)</h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_facades['extra1'] ?>' height='150' alt=''></h4>
                                    <h4>Extra</h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_facades['extra2'] ?>' height='150' alt=''></h4>
                                    <h4>Extra</h4>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h4 class='text-center mt-4 mb-4'>Tipo de fechamento</h4>
                                </th>
                                <th>
                                    <h4 class='text-center mt-4 mb-4'>Altura do muro/ alamb.</h4>
                                </th>
                            </tr>


                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center;">
                                    <h4 class='text-center mt-4 mb-4'><?php echo $data_facades['type_of_closure'] ?></h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center;">
                                    <h4 class='text-center mt-4 mb-4'> <?php echo $data_facades['wall_height'] ?></h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>


                </div>
            </div><br><br><br>
            <!-- Energia -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5 d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Energia</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">

                                    <h4>Operadoras</h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><?php echo $data_energy['operators'] ?></h4>

                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_energy['definitive_power_input'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Entrada de Energia - Definitiva </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_energy['power_pole1'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Poste de Energia </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_energy['post_in_good_condition'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Poste de Energia em bom estado</h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:150px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_energy['power_pole2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Poste de Energia</h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br><br><br><br><br><br><br><br>
            <!-- Medidores de Energia  1 -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Medidores de Energia 1</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4>inquilino 1: <?php echo $data_energy_meters['tenant1'] ?></h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4>Medidor 1: <?php echo $data_energy_meters['meter1'] ?></h4>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4>Leitura Medidor 1: <?php echo $data_energy_meters['meter_reading1'] ?></h4>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo  $data_energy_meters['meter_photo1'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Medidor 1</h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo  $data_energy_meters['reading_photo1'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Leitura 1</h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br>
            <!-- Quadros qtm  1 -->
            <div class='row d-flex justify-content-center text-center '>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Quadro QTM 1</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_qtm_frame['qtm'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>QTM </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_qtm_frame['qtm2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>QTM </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br>

            <!-- Medidores de Energia  2 -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Medidores de Energia 2</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">

                                    <h4>inquilino: <?php echo $data_energy_meters['tenant2'] ?></h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4>Medidor: <?php echo $data_energy_meters['meter2'] ?></h4>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4>Leitura Medidor: <?php echo $data_energy_meters['meter_reading2'] ?></h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo  $data_energy_meters['meter_photo2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Medidor 1</h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo  $data_energy_meters['reading_photo2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Leitura 1</h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br>
            <!-- Quadros qtm  2 -->
            <div class='row d-flex justify-content-center text-center '>
                <div class='col-md-11 d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Quadro QTM 2</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_qtm_frame['qtm3'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>QTM </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_qtm_frame['qtm4'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>QTM </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br>

            <!-- Medidores de Energia  3 -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Medidores de Energia 3</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">

                                    <h4>inquilino: <?php echo $data_energy_meters['tenant3'] ?></h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4>Medidor: <?php echo $data_energy_meters['meter3'] ?></h4>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4>Leitura Medidor: <?php echo $data_energy_meters['meter_reading3'] ?></h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo  $data_energy_meters['meter_photo3'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Medidor 1</h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo  $data_energy_meters['reading_photo3'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Leitura 1</h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br>
            <!-- Quadros qtm  3 -->
            <div class='row d-flex justify-content-center text-center '>
                <div class='col-md-11 d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Quadro QTM 3</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_qtm_frame['qtm5'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>QTM </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_qtm_frame['qtm6'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>QTM </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br>

            <!-- Medidores de Energia  4 -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Medidores de Energia 4</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">

                                    <h4>inquilino: <?php echo $data_energy_meters['tenant4'] ?></h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4>Medidor: <?php echo $data_energy_meters['meter4'] ?></h4>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4>Leitura Medidor: <?php echo $data_energy_meters['meter_reading4'] ?></h4>
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo  $data_energy_meters['meter_photo4'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Medidor 1</h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo  $data_energy_meters['reading_photo4'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Leitura 1 </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br>
            <!-- Quadros qtm  4 -->
            <div class='row d-flex justify-content-center text-center '>
                <div class='col-md-11 d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Quadro QTM 4</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_qtm_frame['qtm7'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>QTM </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_qtm_frame['qtm8'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>QTM </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br>

            <!-- Caixa de passagem -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Caixa de passagem</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_junction['good_junction_box1'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h5>Caixa de passagem - em bom estado </h5>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_junction['good_junction_box2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h5>Caixa de passagem - em bom estado </h5>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_junction['junction_box1'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Caixa de passagem </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_junction['junction_box2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Caixa de passagem </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

            <!-- Aterramento -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Aterramento</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_grounding['base_a'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Aterramento - Base A </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_grounding['base_b']  ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Aterramento - Base B </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_grounding['base_c']  ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Aterramento - Base C </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_grounding['base_d']  ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Aterramento - Base D </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_grounding['gate_grounding']  ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Aterramento - portão </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_grounding['lighting_pole_grounding']  ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Aterramento - poste iluminação </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_grounding['grounding1']  ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Aterramento </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_grounding['grounding2']  ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Aterramento </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br>

            <!-- Limpeza do site interna do site -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Limpeza do site</h4>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2" style="background-color: grey; color:black; width: 100%;">
                                    <h4 class='text-center  text-white rounded '>Limpeza na Área interna do site</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_intsite['before1'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Antes </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_intsite['after1']  ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Depois </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_intsite['before2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Antes </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_intsite['after2']  ?>'style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Depois </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_intsite['before3'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Antes </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_intsite['after3']  ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Depois </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br><br><br><br><br>

            <!-- Limpeza do site externa do site -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width: 717px;">
                        <tbody>
                            <tr>
                                <th colspan="2" style="background-color: grey; color:black; width: 100%;">
                                    <h4 class='text-center  text-white rounded'>Limpeza na Área Externa do site</h4>
                                </th>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_extsite['before4'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Antes </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_extsite['after4']  ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Depois </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_extsite['before5'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Antes </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_extsite['after5']  ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Depois </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br><br><br><br>

            <!-- bota fota -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width: 717px;">
                        <tbody>
                            <tr>
                                <th colspan="2" style="background-color: grey; color:black; width: 100%;">
                                    <h4 class='text-center  text-white rounded'>Bota fora</h4>
                                </th>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_put_it['garbage_removal'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Remoção do lixo </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_put_it['garbage_removal2']  ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Remoção do lixo </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_put_it['before6'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Antes </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php $data_put_it['after6']  ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Depois </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_put_it['before7'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Antes </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_put_it['after7']  ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Depois </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_put_it['before8'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Antes </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_put_it['after8']  ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Depois </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4>Erosão </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><?php echo $data_put_it['soil_erosion']  ?></h4>

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4>Sobra de material </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><?php echo $data_put_it['leftover_material']  ?></h4>

                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br><br><br><br><br><br><br>

            <!-- Bases e chumbadores -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Bases e Chumbadores</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_ev_bases['base_detail'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Detalhe da base </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_ev_bases['base_detail2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Detalhe da base </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_ev_bases['base_detail3'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Detalhe da base </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_ev_bases['base_detail4'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Detalhe da base </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br>

            <!-- Drenos -->
            <div class='row d-flex justify-content-center text-center '>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width: 717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Drenos</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_drains['drains1'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Drenos </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_drains['drains1'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Drenos </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br>

            <!-- Montante -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Montante</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_amount['amount1'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Montante </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_amount['amount2']  ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Montante </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_amount['amount3'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Montante </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_amount['amount4']  ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Montante </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_amount['ladder'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Escada</h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_amount['narrowing']  ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Estreitamento </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br>

            <!-- Cabos RF -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Cabos RF</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_rf_cables['rf_cables'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Cabos RF </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_rf_cables['rf_cables2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Cabos RF </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4>Cabo Pintado </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><?php echo $data_rf_cables['painted_handle'] ?></h4>

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4>Cabos RF Novo</h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><?php echo $data_rf_cables['new_rf_cable'] ?></h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

            <!-- Trava Quedas -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Trava Quedas</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_lock_falls['lock_falls'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Trava Quedas </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_lock_falls['lock_falls2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Trava Quedas </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_lock_falls['lock_falls3'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Trava Quedas </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_lock_falls['lock_falls4'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Trava Quedas </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br>

            <!-- balizamento -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Balizamento</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4>Tipo de balizamento: </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><?php echo $data_marking['type_of_marking'] ?></h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_marking['qcab'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>QCAB </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_marking['multimeter_test'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Teste Multimetro </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br>
            <div class='row d-flex justify-content-center text-center '>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width: 717px;">
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_marking['conventional_overhead_goal']   ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Baliza superior </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_marking['conventional_intermediate_goal']  ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h5>Baliza intermediario convencional </h5>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br>

            <!-- Iluminação do site -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Iluminação do site</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_site_lighting['indoor_lighting_pole'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Posta de Iluminação interna </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_site_lighting['indoor_lighting_pole2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Posta de Iluminação interna </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4>Iluminação com problema? </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><?php echo  $data_site_lighting['problem_lighting'] ?></h4>

                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

            <!-- Vista da EV - face A -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Vista da EV - face A</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_viewface_a['face_a'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Face A </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_viewface_a['face_a2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Face A </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_viewface_a['face_a_zoom'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Face A - Zoom </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_viewface_a['face_a_zoom2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Face A - Zoom </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

            <!-- Vista da EV - face B -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Vista da EV - face B</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_viewface_b['face_b'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Face B </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_viewface_b['face_b2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Face B </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_viewface_b['face_b_zoom'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Face B - Zoom </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_viewface_b['face_b_zoom2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Face B - Zoom </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

            <!-- Vista da EV - face C -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Vista da EV - face C</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_viewface_c['face_c'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Face C </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_viewface_c['face_c2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Face C </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_viewface_c['face_c_zoom'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Face C - Zoom </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_viewface_c['face_c_zoom2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Face C - Zoom </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

            <!-- Vista da EV - face D -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Vista da EV - face D</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_viewface_d['face_d'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Face D </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_viewface_d['face_d2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Face D </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_viewface_d['face_d_zoom'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Face D - Zoom </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_viewface_d['face_d_zoom2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Face D - Zoom </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

            <!-- Vista Área - 2 Metros de altura -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Vista Área - 2 Metros de altura</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_aerialview2m['zero'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>0º </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_aerialview2m['sixty'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>60º </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_aerialview2m['i_sit_and_come'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>120º </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_aerialview2m['one_hundred_and_eighty'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>180º </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_aerialview2m['two_hundred_and_forty'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>240º </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_aerialview2m['three_hundred'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>300º </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br>

            <!-- Vista Superior - 2 Metros de altura -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Vista Superior - 2 Metros de altura</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_topview2m['front'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Front </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_topview2m['right_side'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Lateral Direita </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_topview2m['left_side'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Lateral Esquerda </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_topview2m['site_background'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Fundo do site </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br>

            <!-- Construção proxima - 500m -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Construção proxima - 500m</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_nearby['new_construction_nearby'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Nova construção próximo ao site </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_nearby['new_construction_nearby2']  ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Nova construção próximo ao site </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div><br><br><br>

            <!-- Equipamentoss das Operadoras -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Equipamentos das Operadoras</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4>Operadora 1 </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><?php echo $data_operator['operator'] ?></h4>

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4>Metragem das Bases </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><?php echo $data_operator['base_size'] ?></h4>

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_operator['operator_identification'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Identificação da Operadora </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_operator['equipment_base'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Base do equipamento 1 </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_operator['equipment'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Equipamento </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_operator['rru_on_the_ground'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>RRU em Solo </h4>
                                </td>
                            </tr>


                        </tbody>

                    </table>
                </div>
            </div><br><br><br><br><br><br><br><br><br><br><br><br>

            <!-- Equipamentoss das Operadoras - OP2 -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width: 717px;">
                        <tbody>
                            <!-- operador 2 ---->
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4>Operadora 2 </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><?php echo $data_operator['operator2'] ?></h4>

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4>Metragem das Bases </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><?php echo $data_operator['base_size2'] ?></h4>

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_operator['operator_identification2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Identificação da Operadora </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_operator['equipment_base2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Base do equipamento 1 </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_operator['equipment2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Equipamento </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_operator['rru_on_the_ground2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>RRU em Solo </h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

            <!-- Observações -->
            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width:717px;">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: red; color:#FFF; width: 100%;">
                                    <h4 class='text-center  text-white rounded mt-4 mb-4'>Observações</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_observations['comments'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Observações </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_observations['comments2'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Observações </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_observations['comments3'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Observações </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_observations['comments4'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Observações </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_observations['comments5'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Observações </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_observations['comments6'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Observações </h4>
                                </td>
                            </tr>


                        </tbody>

                    </table>
                </div>
            </div>

            <div class='row d-flex justify-content-center text-center mt-5'>
                <div class='col-md-11  d-flex justify-content-center text-center' style="text-align:center; align-items:center; align-content:center;">
                    <table style="width: 717px;">
                        <tbody>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_observations['comments7'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Observações </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_observations['comments8'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Observações </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_observations['comments9'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Observações </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_observations['comments10'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Observações </h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_observations['comments11'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Observações </h4>
                                </td>
                                <td style="text-align:center; align-items:center; align-content:center; width:358px; height:100px !important;">
                                    <h4><img src='https://vantechdobrasil.com.br/app/admin/uploads/<?php echo $data_observations['comments12'] ?>' style="display: block; width:100%; height:100%; flex:1;flex-direction: row;" alt=''></h4>
                                    <h4>Observações </h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

            <!-- Notas -->
            <div class='row d-flex justify-content-center mt-5'>
                <div class='row mb-3 mt-5  d-flex justify-content-center'>
                    <div class="col-md-8 text-center">
                        <img src='https://vantechdobrasil.com.br/app/assets/images/cabecario_relatorio.png' width="700" alt=''>
                    </div>
                </div>
                <div class='col-md-11  d-flex justify-content-center'>
                    <table style="width:717px;">
                        <thead width="717px">
                            <tr>
                                <th colspan="2"  style="background-color: red; color:#FFF; width: 100%; height: 4px; text-align: center;">
                                    notas
                                </th>
                            </tr>
                        </thead>
                        <tbody width="717px">
                            <tr colspan="2">
                                <td style="color:red; text-align:center; font-weight:bold;">
                                    Anotações:
                                </td>
                            </tr>
                            <tr colspan="2" height="4px">
                                <td style="color:black; text-align:center;  background-color:#CCCCCC; height:4px;">
                                    Observações gerais sobre irregularidades do site
                                </td>
                            </tr>
                            <tr colspan="2" height="2px">
                                <td style="height:2px !important;">
                                    &nbsp;&nbsp;<?php echo $data_notes['site_irregularities'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="2px">
                                <td style="height:5px !important;">
                                    &nbsp;&nbsp;<?php echo $data_notes['site_irregularities2'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="2px">
                                <td>
                                    &nbsp;&nbsp;<?php echo $data_notes['site_irregularities3'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="2px">
                                <td>
                                    &nbsp;&nbsp;<?php echo $data_notes['site_irregularities4'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="2px">
                                <td>
                                    &nbsp;&nbsp;<?php echo $data_notes['site_irregularities5'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="2px">
                                <td>
                                    &nbsp;&nbsp;<?php echo $data_notes['site_irregularities6'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="2px">
                                <td>
                                    &nbsp;&nbsp;<?php echo $data_notes['site_irregularities7'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="2px">
                                <td>
                                    &nbsp;&nbsp;<?php echo $data_notes['site_irregularities8'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="2px">
                                <td>
                                    &nbsp;&nbsp;<?php echo $data_notes['site_irregularities9'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="2px">
                                <td>
                                    &nbsp;&nbsp;<?php echo $data_notes['site_irregularities10'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="2px">
                                <td>
                                    &nbsp;&nbsp;<?php echo $data_notes['site_irregularities11'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="2px">
                                <td>
                                    &nbsp;&nbsp;<?php echo $data_notes['site_irregularities12'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="2px">
                                <td>
                                    &nbsp;&nbsp;<?php echo $data_notes['site_irregularities13'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="2px">
                                <td>
                                    &nbsp;&nbsp;<?php echo $data_notes['site_irregularities14'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="4px">
                                <td height="4" style="color:red; text-align:center; font-weight:bold;">
                                    Informações do acesso:
                                </td>
                            </tr>
                            <tr colspan="2">
                                <td style="color:black; text-align:center;  background-color:#CCCCCC; height:20px;">
                                    Site fica dentro de propriedade(sitio, empresa etc..)?
                                </td>
                            </tr>
                            <tr colspan="2" height="2px">
                                <td>
                                    <?php echo $data_notes['inside_property'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="2px">
                                <td style="color:red; text-align:center; font-weight:bold;">
                                    Observações
                                </td>
                            </tr>
                            <tr colspan="2" height="4px">
                                <td>
                                <?php echo $data_notes['comments'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="4px">
                                <td height="4px">
                                <?php echo $data_notes['comments2'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="4px">
                                <td height="4px">
                                <?php echo $data_notes['comments3'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="4px">
                                <td height="4px">
                                <?php echo $data_notes['comments4'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="4px">
                                <td height="4px">
                                <?php echo $data_notes['comments5'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="4px">
                                <td height="4px">
                                <?php echo $data_notes['comments6'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="4px">
                                <td height="4px">
                                <?php echo $data_notes['comments7'] ?>
                                </td>
                            </tr>
                            <tr colspan="2" height="4px">
                                <td height="4px">
                              <?php echo $data_notes['comments8'] ?>
                                </td>
                            </tr>


                        </tbody>

                    </table>
                </div>
            </div><br><br><br>






            <!-- Footer Section Start -->

            <!-- Footer Section End -->
    </main>
    <!-- loader END -->

    <!-- Live Customizer start -->
    <!-- Setting offcanvas start here -->

    <!-- Settings sidebar end here -->
    <!-- Live Customizer end -->

    <!-- Library Bundle Script -->
    <script src='assets/js/core/libs.min.js'></script>
    <!-- Plugin Scripts -->




    <!-- Slider-tab Script -->
    <script src='assets/js/plugins/slider-tabs.js'></script>











    <!-- SwiperSlider Script -->
    <script src='assets/vendor/swiperSlider/swiper-bundle.min.js'></script>

    <!-- Lodash Utility -->
    <script src='assets/vendor/lodash/lodash.min.js'></script>
    <!-- Utilities Functions -->
    <script src='assets/js/iqonic-script/utility.js'></script>
    <!-- Settings Script -->
    <script src='assets/js/iqonic-script/setting.js'></script>
    <!-- Settings Init Script -->
    <script src='assets/js/setting-init.js'></script>
    <!-- External Library Bundle Script -->
    <script src='assets/js/core/external.min.js'></script>
    <!-- Widgetchart Script -->
    <script src='assets/js/charts/widgetcharts.js?v=2.2.0' defer></script>
    <!-- Dashboard Script -->
    <script src='assets/js/charts/dashboard.js?v=2.2.0' defer></script>
    <script src='assets/js/charts/alternate-dashboard.js?v=2.2.0' defer></script>
    <!-- Hopeui Script -->
    <script src='assets/js/hope-ui.js?v=2.2.0' defer></script>
    <script src='assets/js/hope-uipro.js?v=2.2.0' defer></script>
    <script src='assets/js/sidebar.js?v=2.2.0' defer></script>
</body>

</html>