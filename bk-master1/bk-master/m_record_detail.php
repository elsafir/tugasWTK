<?php
  session_start();
  if (!isset($_SESSION["user"])) {
		header("Location: login.php");
    die();
	}
  include("connection.php");
	include("filter.php");

	if (isset($_POST["submit"])) {
		$idx = filter_html($_POST["idx"]);
		$idx = filter_sql($link,$idx);
		$pesan_danger = null;

		$query_max = "SELECT MAX(idx) FROM record";
		$result_max = mysqli_query($link, $query_max);
		$data_max = mysqli_fetch_row($result_max);
		$idx_max = (int) $data_max[0];
    $idx_inv = $idx_max-$idx+1;

		$query_min = "SELECT MIN(idx) FROM record";
		$result_min = mysqli_query($link, $query_min);
		$data_min = mysqli_fetch_row($result_min);
		$idx_min = (int) $data_min[0];

		if ($idx < $idx_min) {
			$pesan_warning = "Anda sudah ada di record terlama";
			$idx++;
      $idx_inv = $idx_max-$idx+1;
		}
		else if ($idx > $idx_max) {
			$pesan_warning = "Anda sudah ada di record terbaru";
			$idx--;
      $idx_inv = $idx_max-$idx+1;
		}
		else if ($_POST["submit"]=="First") {
			$idx = $idx_max;
      $idx_inv = $idx_max-$idx+1;
		}
		else if ($_POST["submit"]=="Last") {
			$idx = $idx_min;
      $idx_inv = $idx_max-$idx+1;
		}

		$i= 1;
		$siswa = Array();
		$arr_bln = array( "1"=>"Januari", "2"=>"Februari", "3"=>"Maret", "4"=>"April", "5"=>"Mei", "6"=>"Juni",
											"7"=>"Juli", "8"=>"Agustus", "9"=>"September", "10"=>"Oktober", "11"=>"November", "12"=>"Desember" );

		$query  = "SELECT * FROM record INNER JOIN siswa USING(nis) INNER JOIN layanan USING(kode_layanan) WHERE idx={$idx} ORDER BY idx ASC";
		$result = mysqli_query($link, $query);
		while($data = mysqli_fetch_assoc($result))	{
			$siswa[$i]['nis'] = $data['nis'];
			$siswa[$i]['nama'] = $data['nama'];
			$siswa[$i]['kk'] = $data['kk'];
			$siswa[$i]['tingkat'] = $data['tingkat'];
			$siswa[$i]['kelas'] = $data['kelas'];

			$tanggal_php = strtotime($data['tanggal']);
			$tgl = str_pad((date("j", $tanggal_php)),2,"0",STR_PAD_LEFT);
			$bln = date("n", $tanggal_php);
			$thn = date("Y", $tanggal_php);
			$tanggal = $tgl." ".$arr_bln[$bln]." ".$thn;

			$kode_layanan = $data['kode_layanan'];
			$nama_layanan = $data['nama_layanan'];
			$tempat = $data['tempat'];
			$uraian = $data['uraian'];
			$keterangan = $data['keterangan'];

      // new
      $kat_layanan = $kode_layanan[0];
      switch($kat_layanan) {
        case "A" : $kat_layanan = "Layanan Dasar";  break;
        case "B" : $kat_layanan = "Layanan Responsif";  break;
        case "C" : $kat_layanan = "Layanan Perencanaan Individual";  break;
        case "D" : $kat_layanan = "Dukungan Sistem";  break;
        default  : $kat_layanan = "0";  break;
      }
      //

			$i++;
		}
	}
	else {
		header("Location: m_record.php");
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
    <title>Detail Record | Record | Pengelolaan Arsip Bimbingan Konseling</title>

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
              <li class="active">Detail Record</li>
            </ol>
          </div>
        </div>
        <!-- End breadcrumb -->

        <div class="row">
          <div class="col-md-12">
            <?php
              if (isset($pesan_warning)) {
                echo "<div class=\"alert alert-warning\">$pesan_warning</div>";
              }
            ?>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-sm-6">
                    <form action="m_record.php" method="post" class="form-inline myform-inline">
                      <button type="submit" name="submit" value="BACK" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Back">
                        <span class="glyphicon glyphicon-arrow-left"></span>
                      </button>
          					</form>
          					<form action="m_report_a.php" method="post" class="form-inline myform-inline" target="_blank">
          						<input type="hidden" name="idx" value="<?php echo $idx ?>">
                      <button type="submit" name="submit" value="Create Report" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Create Report(Laporan)">
                        <span class="glyphicon glyphicon-print"></span>
                      </button>
          					</form>
          					<form action="m_record_edit_p.php" method="post" class="form-inline myform-inline">
          						<input type="hidden" name="idx" value="<?php echo $idx ?>">
                      <button type="submit" name="submit" value="Edit Record" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit Record">
                        <span class="glyphicon glyphicon-edit"></span>
                      </button>
          					</form>
          					<form action="m_record_delete.php" method="post" class="form-inline myform-inline" onsubmit="return validate_delete(this)">
          						<input type="hidden" name="idx" value="<?php echo $idx ?>">
                      <button type="submit" name="submit" value="Delete Record" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete Record">
                        <span class="glyphicon glyphicon-trash"></span>
                      </button>
          					</form>
                  </div>
                  <div class="col-sm-6" style="text-align: right">
                    <form action="m_record_detail.php" method="post" class="form-inline myform-inline myform2">
          						<input type="hidden" name="idx" value="<?php echo $idx ?>">
                      <button type="submit" name="submit" value="First" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="left" title="Newest">
                        <span class="glyphicon glyphicon-fast-backward"></span>
                      </button>
          					</form>
          					<form action="m_record_detail.php" method="post" class="form-inline myform-inline myform2">
          						<input type="hidden" name="idx" value="<?php echo $idx+1 ?>">
                      <button type="submit" name="submit" value="Prev" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="Newer">
                        <span class="glyphicon glyphicon-step-backward"></span>
                      </button>
          					</form>
                    <form action="m_record_detail.php" method="post" class="form-inline myform-inline myform2">
                      <a class="btn btn-default btn-sm disabled">
                        <?php echo $idx_inv; ?>
                      </a>
          					</form>
          					<form action="m_record_detail.php" method="post" class="form-inline myform-inline myform2">
          						<input type="hidden" name="idx" value="<?php echo $idx-1 ?>">
                      <button type="submit" name="submit" value="Next" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="Older">
                        <span class="glyphicon glyphicon-step-forward"></span>
                      </button>
          					</form>
          					<form action="m_record_detail.php" method="post" class="form-inline myform-inline" data-toggle="tooltip" data-placement="right" title="Newest">
          						<input type="hidden" name="idx" value="<?php echo $idx ?>">
                      <button type="submit" name="submit" value="Last" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-fast-forward"></span>
                      </button>
          					</form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-5">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Siswa yang bersangkutan</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-condensed table-bordered table-striped" >
      							<tr>
      								<th>No</th>
      								<th>NIS</th>
      								<th>Nama</th>
      								<th>Kelas</th>
      							</tr>
      							<?php
      								foreach ($siswa as $key => $value) {
      									echo "<tr>";
      										echo "<td style='text-align: center;'>{$key}</td>";
      										echo "<td>{$siswa[$key]['nis']}</td>";
      										echo "<td>{$siswa[$key]['nama']}</td>";
      										// echo "<td>{$siswa[$key]['kk']}</td>";
      										// echo "<td>{$siswa[$key]['tingkat']}</td>";
      										echo "<td>{$siswa[$key]['kelas']}</td>";
      									echo "</tr>";
      								}
      							?>
      						</table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Rincian Kegiatan</h3>
              </div>
              <div class="panel-body">
                <form class="form-horizontal" >
                  <div class="form-group">
                    <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                    <div class="col-sm-10">
                      <input name="tanggal" type="text" class="form-control myreadonly" readonly
                        value="<?php echo $tanggal; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="kegiatan" class="col-sm-2 control-label">Nama Kegiatan</label>
                    <div class="col-sm-10">
      								<textarea name="kegiatan" rows="2" class="form-control myreadonly mytextarea" readonly><?php echo "{$kat_layanan}\n-- {$nama_layanan} --"; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tempat" class="col-sm-2 control-label">Tempat</label>
                    <div class="col-sm-10">
                      <input name="tempat" type="text" class="form-control myreadonly" readonly
                        value="<?php echo $tempat; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="uraian" class="col-sm-2 control-label" >Uraian Kegiatan</label>
                    <div class="col-sm-10">
      								<textarea name="uraian" rows="4" class="form-control myreadonly" readonly><?php echo $uraian; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="keterangan" class="col-sm-2 control-label" >Keterangan</label>
                    <div class="col-sm-10">
      								<textarea name="keterangan" rows="2" class="form-control myreadonly" readonly><?php echo $keterangan; ?></textarea>
                    </div>
                  </div>
    						</form>
              </div>
            </div>
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
<script type="text/javascript">
  function validate_delete(form) {
    var validasi = confirm("Apakah anda yakin ingin menghapus record kegiatan ini?");
    return (validasi);
  }
</script>
