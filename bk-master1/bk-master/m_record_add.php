<?php
  session_start();
  if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    die();
  }

  include("connection.php");
  include("filter.php");

  $tgl=date("j");	$bln=date("n");	$thn=date("Y");

  $arr_bln = array( "1"=>"Januari",
                    "2"=>"Februari",
                    "3"=>"Maret",
                    "4"=>"April",
                    "5"=>"Mei",
                    "6"=>"Juni",
                    "7"=>"Juli",
                    "8"=>"Agustus",
                    "9"=>"September",
                    "10"=>"Oktober",
                    "11"=>"November",
                    "12"=>"Desember" );

  if (isset($_COOKIE["record"]["tanggal"])) {
    $tgl = $_COOKIE["record"]["tanggal"]["tgl"];
    $bln = $_COOKIE["record"]["tanggal"]["bln"];
    $thn = $_COOKIE["record"]["tanggal"]["thn"];
  }

  $select_0   = $select_A01 = $select_A02 = $select_A03 = $select_A04 = $select_A05 = "";
  $select_B01 = $select_B02 = $select_B03 = $select_B04 = $select_B05 = "";
  $select_B06 = $select_B07 = $select_B08 = $select_B09 = $select_B10 = "";
  $select_C01 = $select_C02 = "";
  $select_D01 = $select_D02 = $select_D03 = "";

  if (isset($_COOKIE["record"]["layanan"])) {
    $layanan = $_COOKIE["record"]["layanan"];
    switch($layanan) {
      case  "0"  : $select_0   = "selected";  break;
      case "A01" : $select_A01 = "selected";  break;
      case "A02" : $select_A02 = "selected";  break;
      case "A03" : $select_A03 = "selected";  break;
      case "A04" : $select_A04 = "selected";  break;
      case "A05" : $select_A05 = "selected";  break;
      case "B01" : $select_B01 = "selected";  break;
      case "B02" : $select_B02 = "selected";  break;
      case "B03" : $select_B03 = "selected";  break;
      case "B04" : $select_B04 = "selected";  break;
      case "B05" : $select_B05 = "selected";  break;
      case "B06" : $select_B06 = "selected";  break;
      case "B07" : $select_B07 = "selected";  break;
      case "B08" : $select_B08 = "selected";  break;
      case "B09" : $select_B09 = "selected";  break;
      case "B10" : $select_B10 = "selected";  break;
      case "C01" : $select_C01 = "selected";  break;
      case "C02" : $select_C02 = "selected";  break;
      case "D01" : $select_D01 = "selected";  break;
      case "D02" : $select_D02 = "selected";  break;
      case "D03" : $select_D03 = "selected";  break;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Add Record | Record | Pengelolaan Arsip Bimbingan Konseling</title>

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
              <li class="active"><a href="m_record.php">Record</a></li>
              <li><a href="m_about.php">About</a></li>
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
              <li><a href="m_record.php">Record</a></li>
              <li class="active">Add Record</li>
            </ol>
          </div>
        </div>
        <!-- End breadcrumb -->

        <div class="row">
          <div class="col-md-12">
            <?php
      				if (isset($_GET["save_record_err"])) {
                echo "<div class=\"alert alert-danger\">{$_GET['save_record_err']}</div>";
      				} else {
                $info = "Silahkan cari dan pilih terlebih dahulu <b>Siswa yang bersangkutan</b>, setelah itu silahkan isi <b>Rincian kegiatan</b>";
                echo "<div class=\"alert alert-info\"> <span class='glyphicon glyphicon-exclamation-sign'></span> &nbsp;$info</div>";
      				}
      			?>
          </div>
        </div>

        <div class="row">
          <div class="col-md-5">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Siswa yang bersangkutan</h3>
              </div>
              <div class="panel-body">
                <form class="" action="m_record_add_p.php" method="post">
                  <div class="input-group input-group-sm">
                    <input type="text" name="search" class="form-control" placeholder="Cari dengan NIS atau Nama Siswa"
                      value="<?php if (isset($_COOKIE["record"]["search"])) { echo $_COOKIE["record"]["search"]; } ?>">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit" name="submit" value="Search" data-toggle="tooltip" data-placement="top" title="Cari dengan NIS atau Nama Siswa">
                        <span class="glyphicon glyphicon-search"></span>
                      </button>
                      <button class="btn btn-default" type="submit" name="submit" value="SearchErase" data-toggle="tooltip" data-placement="top" title="Clear">
                        <span class="glyphicon glyphicon-remove"></span>
                      </button>
                    </span>
                  </div>
                </form>
                <br>
                <?php
    							if (isset($_COOKIE["record"]["search"])) {
    								$search = filter_sql($link, $_COOKIE["record"]["search"]);
    								$query_siswa = "SELECT * FROM siswa WHERE nama LIKE '%{$search}%' OR nis LIKE '%{$search}%';";
    								$result_siswa = mysqli_query($link, $query_siswa);

    								$jumlah_siswa = mysqli_num_rows($result_siswa);

    								if ($jumlah_siswa == 0 ) {
    									echo "<div class='alert alert-danger myalert-sm'>";
    									echo "Nama / Nim yang anda cari tidak ada dalam database";
    									echo "</div>";
    								}
    								else {
                      echo "<div class='table-responsive'>";
    									echo "<table class='table table-condensed table-bordered'>";
    										echo "<tr class='active'>";
    											echo "<th class='text-center myth'>NIS</th>";
    											echo "<th class='text-center myth'>Nama</th>";
    											echo "<th class='text-center myth'>Kelas</th>";
    											echo "<th class='text-center'>
                                  <a type='button' class='btn btn-sm btn-default disabled'>
                                  <span class='glyphicon glyphicon-tasks'></span>
                                </a></th>";
    										echo "</tr>";

    									while ($data_siswa = mysqli_fetch_assoc($result_siswa)) {
    										echo "<tr>";
    											echo "<td>{$data_siswa['nis']}</td>";
    											echo "<td>{$data_siswa['nama']}</td>";
    											echo "<td>{$data_siswa['kelas']}</td>";
    											echo "<td class='text-center'>";
    												echo "<form action='m_record_add_p.php' method='post'>";
    													echo "<input type='hidden' name='add_nis' value='{$data_siswa['nis']}'>";
    													echo "<button type='submit' name='submit' value='Add' class='btn btn-xs btn-primary'>
                                      <span class='glyphicon glyphicon-plus'></span>
                                    </button>";
    												echo "</form>";
    											echo "</td>";
    										echo "</tr>";
    									}
    									echo "</table>";
                      echo "</div>";
    								}
    							}
    						?>
  						<?php
  							if (isset($_GET["add_nis_err"])) {
                  echo "<div class='alert alert-warning myalert-sm'>";
  								echo "Siswa dengan NIS='<b>{$_GET['add_nis_err']}</b>' sudah ditambahkan
                          <strong>&nbsp;<span class='glyphicon glyphicon-hand-down'></strong><span>";
                  echo "</div>";
  							}

  							if (isset($_COOKIE["record"]["nis"])) {
                  echo "<ul class='nav nav-tabs'>";
                    echo "<li role='presentation' class='active'>";
                      echo "<a style='background-color: #f5f5f5;'><strong>Siswa yang sudah ditambahkan</strong></a>";
                    echo "</li>";
                  echo "</ul>";
  								echo "<table class='table table-condensed table-bordered'>";
                    echo "<tr class='active'>";
                      echo "<th class='text-center myth'>NIS</th>";
                      echo "<th class='text-center myth'>Nama</th>";
                      echo "<th class='text-center myth'>Kelas</th>";
                      echo "<th class='text-center'>
                              <a type='button' class='btn btn-sm btn-default disabled'>
                              <span class='glyphicon glyphicon-tasks'></span>
                            </a></th>";
                    echo "</tr>";
  									foreach($_COOKIE["record"]["nis"] as $key => $value) {
  										$nis = filter_sql($link, $value);
  										$query = "SELECT * FROM siswa WHERE nis='$nis'";
  										$result = mysqli_query($link, $query);
  										$data = mysqli_fetch_assoc($result);

  										echo "<tr>";
  											echo "<td>{$data['nis']}</td>";
  											echo "<td>{$data['nama']}</td>";
  											echo "<td>{$data['kelas']}</td>";
  											echo "<td class='text-center'>";
  												echo "<form action='m_record_add_p.php' method='post'>";
  													echo "<input type='hidden' name='key_del_nis' value='{$key}'>";
  													echo "<button type='submit' name='submit' value='Delete' class='btn btn-xs btn-danger'>";
                              echo "<span class='glyphicon glyphicon-remove'></span>";
                            echo "</button>";
  												echo "</form>";
  											echo "</td>";
  										echo "</tr>";
  									}
  								echo "</table>";
  							}
  						?>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Rincian Kegiatan</h3>
              </div>
              <div class="panel-body">
                <form action="m_record_add_p.php" method="post" id="form-record" class="form-horizontal" >
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal</label>
                    <div class="col-sm-10">
                      <select name="tgl">
      									<?php
      										// Perulangan untuk menampilkan pilihan tanggal di tag select
      										for ($i = 1; $i <= 31; $i++) {
      											// percabangan untuk menampilkan(selected) tanggal saat ini
      											if ($i==$tgl){
      												echo "<option value = $i selected>";
      											}
      											else {
      												echo "<option value = $i >";
      											}
      											echo str_pad($i,2,"0",STR_PAD_LEFT);
      											echo "</option>";
      										}
      									?>
      								</select>
                      <select name="bln">
      									<?php
      										foreach ($arr_bln as $key => $value) {
      											if ($key==$bln){
      												echo "<option value=\"{$key}\" selected>{$value}</option>";
      											}
      											else {
      												echo "<option value=\"{$key}\">{$value}</option>";
      											}
      										}
      									?>
      								</select>
      								<select name="thn">
      									<?php
      										for ($i = 2007; $i <= date("Y"); $i++) {
      											if ($i==$thn){
      												echo "<option value = $i selected>";
      											}
      											else {
      												echo "<option value = $i >";
      											}
      											echo "$i </option>";
      										}
      									?>
      								</select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="layanan" class="col-sm-2 control-label">Layanan</label>
                    <div class="col-sm-10">
                      <select name="layanan" class="form-control">
      										<option value="0" <?php echo $select_0 ?>>Pilih layanan</option>
      									<optgroup label="LAYANAN DASAR">
      										<option value="A01" <?php echo $select_A01 ?>>Bimbingan Klasikal </option>
      										<option value="A02" <?php echo $select_A02 ?>>Layanan Orientasi</option>
      										<option value="A03" <?php echo $select_A03 ?>>Layanan Informasi</option>
      										<option value="A04" <?php echo $select_A04 ?>>Bimbingan Kelompok</option>
      										<option value="A05" <?php echo $select_A05 ?>>Layanan Pengumpulan Data</option>
      									<optgroup label="LAYANAN RESPONSIF">
      										<option value="B01" <?php echo $select_B01 ?>>Konseling Individual </option>
      										<option value="B02" <?php echo $select_B02 ?>>Konseling Kelompok</option>
      										<option value="B03" <?php echo $select_B03 ?>>Konsultasi Guru</option>
      										<option value="B04" <?php echo $select_B04 ?>>Konsultasi Orang Tua</option>
      										<option value="B05" <?php echo $select_B05 ?>>Konsultasi Siswa</option>
      										<option value="B06" <?php echo $select_B06 ?>>Kolaborasi Guru</option>
      										<option value="B07" <?php echo $select_B07 ?>>Kolaborasi Orang Tua</option>
      										<option value="B08" <?php echo $select_B08 ?>>Kolaborasi Siswa</option>
      										<option value="B09" <?php echo $select_B09 ?>>Konferensi Kasus</option>
      										<option value="B10" <?php echo $select_B10 ?>>Home Visit</option>
      									<optgroup label="LAYANAN PERENCANAAN INDIVIDUAL">
      										<option value="C01" <?php echo $select_C01 ?>>Penilaian Individual/Kelompok </option>
      										<option value="C02" <?php echo $select_C02 ?>>Layanan Konsultasi Hasil Penilaian Individual/Kelompok</option>
      									<optgroup label="DUKUNGAN SISTEM">
      										<option value="D01" <?php echo $select_D01 ?>>Pengembangan Profesional</option>
      										<option value="D02" <?php echo $select_D02 ?>>Manajemen Program</option>
      										<option value="D03" <?php echo $select_D03 ?>>Layanan Kerjasama</option>
      								</select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tempat" class="col-sm-2 control-label" >Tempat</label>
                    <div class="col-sm-10">
                      <input name="tempat" type="text" class="form-control" placeholder="Tempat Kegiatan" value="<?php if (isset($_COOKIE["record"]["tempat"])) { echo $_COOKIE["record"]["tempat"]; } ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="uraian" class="col-sm-2 control-label" >Uraian Kegiatan</label>
                    <div class="col-sm-10">
      								<textarea name="uraian" rows="3" class="form-control" placeholder="Uraian Kegiatan"><?php if (isset($_COOKIE["record"]["uraian"])) { echo $_COOKIE["record"]["uraian"]; } ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="uraian" class="col-sm-2 control-label" >Keterangan</label>
                    <div class="col-sm-10">
                      <textarea name="keterangan" rows="1" class="form-control" placeholder="Keterangan Kegiatan"><?php if (isset($_COOKIE["record"]["keterangan"])) { echo $_COOKIE["record"]["keterangan"]; } ?></textarea>
                    </div>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12" style="text-align: right;">
            <button type="submit" name="submit" value="CANCEL" form="form-record" class="btn btn-lg btn-danger"> <span class="glyphicon glyphicon-floppy-remove"></span> Cancel</button>
            <button type="submit" name="submit" value="SAVE" form="form-record" class="btn btn-lg btn-primary"> <span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
          </div>
        </div>

      </div>
      <!-- End Content -->

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
  <script type="text/javascript">
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
  </script>
</html>
