<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Panel de administracion</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--DataTable-->
  <link href="<?php echo base_url; ?>Assets/DataTables/datatables.min.css" rel="stylesheet" />
  <!--selectr-->
  <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/selectr.min.css">
  <!-- Vendors styles-->
  <link rel="stylesheet" href="<?php echo base_url; ?>Assets/vendors/simplebar/css/simplebar.css">
  <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/vendors/simplebar.css">
  <!-- Main styles for this application-->
  <link href="<?php echo base_url; ?>Assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url; ?>Assets/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
</head>

<body>
  <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
      <img src="<?php echo base_url; ?>Assets/img/logotipo.png" alt="">
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url; ?>Inicio">
          <span class="nav-icon"><i class="fa-solid fa-house"></i></span>Inicio
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url; ?>Ingresos">
          <span class="nav-icon"><i class="fa-solid fa-money-bill-trend-up"></i></span>Ingresos
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url; ?>Egresos">
          <span class="nav-icon"><i class="fa-solid fa-hand-holding-dollar"></i></span>Egresos
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url; ?>Deudas">
          <span class="nav-icon"><i class="fa-solid fa-sack-xmark"></i></span>Deudas
        </a>
      </li>
    </ul>
  </div>
  <div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <header class="header header-sticky mb-4">
      <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
          <i class="fa fa-bars"></i>
        </button>
        <a class="header-brand ml-0" href="#">
          Sistema Balance De finanzas
        </a>
        <ul class="header-nav ms-3">
          <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <div class="avatar avatar-md"><img class="avatar-img" src="<?php echo base_url; ?>Assets/img/avatar.png"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-end pt-0">
              <div class="dropdown-header bg-light py-2">
                <div class="fw-semibold">Cuenta</div>
              </div>
              <a class="dropdown-item" href="#" onclick="MostrarModalPass()" data-bs-toggle="Modalpass" data-bs-target="#Modalpass">
                <i class="fa-solid fa-user-gear"></i> Cambiar contraseña
              </a>
              <a class="dropdown-item" href="<?php echo base_url . $controlador ?>/Salir">
                <i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar Sesión
              </a>
            </div>
          </li>
        </ul>
      </div>
      <div class="header-divider"></div>
      <div class="container-fluid">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
              <span><?php echo $controlador; ?></span>
            </li>
          </ol>
        </nav>
      </div>
    </header>