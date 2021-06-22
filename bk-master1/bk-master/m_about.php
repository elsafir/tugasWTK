<?php
  session_start();
  if (!isset($_SESSION["user"])) {
		header("Location: login.php");
    die();
	}
  // source code untuk load file dan save file ke count.txt
	$fp = fopen("count.txt", "r");
	$count = fread($fp, 1024);
	fclose($fp);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>About | Pengelolaan Arsip Bimbingan Konseling</title>

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

  <body>
  <!-- background -->
    <img class="mybg" src="img/bg.jpg" alt="">
  <!-- end background -->
  <!-- Navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#target-list">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="index.php" class="navbar-brand mynavbar-brand">
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
            <li><a href="index.php">Home</a></li>
            <li><a href="m_record.php">Record</a></li>
            <li class="active"><a href="m_about.php">About</a></li>
          </ul>
        </div>
      </div>
    </nav>
  <!-- End Navbar -->

  <!-- Content -->
    <div class="container">

      <!--- breadcrumb -->
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="index.php"> <span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">About</li>
          </ol>
        </div>
      </div>
      <!-- End breadcrumb -->

      <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default mypanel">
              <div class="panel-heading">
                <h3 class="panel-title">A B O U T</h3>
              </div>
              <div class="panel-body">
                <p>Pengelolaan Arsip Bimbingan Konseling merupakan aplikasi yang digunakan untuk mengelola arsip kegiatan yang berlansung di Bimbingan Konseling SMKN 1 Majalaya. Saat ini, Aplikasi Pengelolaan Arsip Bimbingan Konseling direncanakan akan dijalankan secara Localhost di area sekolah SMKN 1 Majalaya dan telah diakses selama <b><?php echo $count; ?> kali</b></p>
                <p></p>
                <p>Berikut merupakan beberapa kegunaan dari Aplikasi Pengelolaan Arsip Bimbingan Konseling</p>
                <ol>
                  <li>Menambah Data Record Kegiatan yang dilaksanakan di Bimbingan Konseling</li>
                  <li>Menampilkan Data Record Kegiatan yang sudah dilaksanakan di Bimbingan Konseling</li>
                  <li>Menampilkan Detail Data Record Kegiatan yang sudah dilaksanakan di Bimbingan Konseling</li>
                  <li>Mengubah Data Record Kegiatan yang sudah di laksanakan di Bimbingan Konseling</li>
                  <li>Menghapus Data Record Kegiatan yang sudah di laksanakan di Bimbingan Konseling</li>
                  <li>Membuat Report Kegiatan yang sudah dilaksanakan di Bimbingan Konseling dalam bentuk file *.pdf</li>
                </ol>
                <p>Jika ada pertanyaan, saran dan masukan mengenai aplikasi ini, silahkan hubungi Email berikut: <a href="mailto:budimanfajarf@gmail.com">budimanfajarf@gmail.com</a></p> <br>
                <p class="text-center" style="font-size: 96%;"> <em>Aplikasi ini dibuat berdasarkan rancangan desain sistem yang telah dibuat oleh <strong>Ibnu Syina</strong><br>
                  Kemudian diimplementasikan ke dalam sebuah aplikasi oleh <strong>Budiman Fajar Firdaus</strong></em> </p>
              </div>
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
            <p><span class="glyphicon glyphicon-copyright-mark"></span> Copyright 2018 SMKN 1 Majalaya </p>
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
