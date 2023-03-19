<?php
session_start();

if(!isset($_SESSION['ida'])){
  echo"<script>alert ('Login Dahulu') </script>";
  echo"<meta http-equiv='refresh' content='0 url=../index.php'>";
}
?>
<html>

<head>
  <title>E-KOS</title>

  <!-- Favicons -->
  <link href="../favicon.png" rel="icon">

  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="../css/fontawesome-free-5.7.2-web/css/all.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <link href="../css/table-responsive.css" rel="stylesheet">

</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="header.php" class="logo"><b><span>E-</span>KOS</b></a>
      <!--logo end-->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><img src="../fr-05.jpg" class="img-circle" width="80"></p>
          <h5 class="centered"><?php echo $_SESSION['nm'];?></h5>
          <li class="mt">
              <a href="header.php?page=komplain">
                <i class="fa fa-envelope"></i>
                <span>Komplain</span>
                </a>
            </li>
            <li>
              <a href="header.php?page=pengguna">
                <i class="fa fa-users"></i>
                <span>User</span>
                </a>
            </li>
            <li>
              <a href="header.php?page=kamar">
                <i class="fa fa-home"></i>
                <span>Kamar</span>
                </a>
            </li>
            <li>
              <a href="header.php?page=sewa">
                <i class="fa fa-tags"></i>
                <span>Sewa</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
          <?php
          error_reporting(0);
          switch ($_GET['page']){

            case 'pengguna':
            include 'user.php';
            break;
            case 'akses':
            include 'akses.php';
            break;

            case 'kamar':
            include 'kamar.php';
            break;

            case 'sewa':
            include 'sewa.php';
            break;

            case 'komplain':
            include 'komplain.php';
            break;

          }
          ?>
      </section>
      <!-- /wrapper -->
    </section>
    <!--main content end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../lib/jquery.scrollTo.min.js"></script>
  <!--common script for all pages-->
  <script src="../lib/common-scripts.js"></script>
  <!--script for this page-->
</body>

</html>
