<?php
  session_start();
  if (!isset($_SESSION["user"])) {
		header("Location: login.php");
    die();
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home | Pengelolaan Arsip Bimbingan Konseling</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="icon" href="img/logo.png">

  </head>

  <body class="mybody">
  <!-- background -->
    <img class="mybg" src="img/bg.jpg" alt="" style="z-index: -1;">
  <!-- end background -->
  <!-- Navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#target-list">
            <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand mynavbar-brand">
            <img class="mynavimg" src="img/header1.png" alt="">
            <img class="mynavimg2" src="img/header2.png" alt="">
          </a>
        </div>
        <div class="collapse navbar-collapse" id="target-list">
          <form class="navbar-form navbar-right">
            <div class="form-group myform-group">
              <a href="m_password.php" class="btn btn-primary">Change Password</a>
              <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
          </form>
          <ul class="nav navbar-nav navbar-right mynavbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="m_record.php">Record</a></li>
            <li><a href="m_about.php">About</a></li>
          </ul>
        </div>
      </div>
    </nav>
  <!-- End Navbar -->

  <!-- Content -->
  <div class="container">
    <div class="jumbotron myjumbotron">
      <h1>Welcome</h1>
      <p>Selamat datang di Aplikasi Pengelolaan Arsip Bimbingan Konseling</p>
      <div>
        <div class="col-md-6">
          <blockquote>
            <p>Jika anda ingin melihat semua record kegiatan yang telah tersimpan di aplikasi bimbingan konseling, silahkan klik tombol berikut</p>
            <p>
              <a href="m_record.php" class="btn btn-primary btn-lg" role="button">Record Kegiatan</a>
            </p>
          </blockquote>
        </div>
        <div class="col-md-6">
          <blockquote>
            <p>Jika anda ingin mengetahui lebih lanjut mengenai aplikasi ini, silahkan klik tombol berikut</p>
            <p>
              <a href="m_about.php" class="btn btn-primary btn-lg" role="button">About</a>
            </p>
          </blockquote>
        </div>
      </div>
    </div>
  </div>
  <!--- End Content --->

  <!-- Footer -->
    <footer>
      <div class="container text-center">
        <div class="row">
          <div class="col-sm-12">
            <p><span class="glyphicon glyphicon-copyright-mark"></span>
            Copyright <?php echo date("Y"); ?> SMKN 1 Majalaya </p>
          </div>
        </div>
      </div>
    </footer>
  <!-- End Footer -->
  </body>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-3.2.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</html>
