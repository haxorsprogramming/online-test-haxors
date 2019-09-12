<?php
session_start();

if(!isset($_SESSION['userSes'])){
header('location:../');
}
$userSes = $_SESSION['userSes'];
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../ladun/dashboard/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../ladun/dashboard/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../ladun/dashboard/css/style.min.css" rel="stylesheet">
  <style>

  </style>
</head>

<body class="grey lighten-3">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top  navbar-light white scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="#!/" target="_blank">
          <strong class="blue-text">Haxors Online Test</strong> <small>User : <?=$userSes; ?></small>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link waves-effect btnBeranda" href="#!" id=''>Home

              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect  btnProfile" href="#!">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect btnTestRoom" href="#!">Test Room</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#!">Test Result</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#!">Public Chat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="logOut.php">LogOut</a>
            </li>

          </ul>

          <!-- Right -->

        </div>

      </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

      <a class="logo-wrapper waves-effect">
        <img src="../ladun/dashboard/img/logo_club.png"alt="">
      </a>

      <div class="list-group list-group-flush">
        <a href="#!" class="list-group-item list-group-item-action waves-effect btnBeranda" >
          <i class="fas fa-chart-pie mr-3"></i>Dashboard
        </a>
        <a href="#!" class="list-group-item list-group-item-action waves-effect btnProfile">
          <i class="fas fa-user mr-3"></i>Profile</a>
        <a href="#!" class="list-group-item list-group-item-action waves-effect btnTestRoom">
          <i class="fas fa-table mr-3"></i>Test Room</a>
        <a href="#!" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-map mr-3"></i>Test Result</a>
        <a href="#!" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-money-bill-alt mr-3"></i>Public Chat</a>
      </div>

    </div>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5" id='divUtama'>

    </div>

  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">


    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2019 Copyright
      <a href="http://haxors.or.od" target="_blank">Haxorsprogrammingclub</a>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="../ladun/dashboard/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../ladun/dashboard/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../ladun/dashboard/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../ladun/dashboard/js/mdb.min.js"></script>
  <script type='text/javascript' src='../ladun/dashboard/js/main.js'></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>

  <!-- Charts -->
  <script>
    // Line

  </script>
</body>

</html>
