<?php
  session_start();
  if (!isset($_SESSION["user"])) {
		header("Location: login.php");
    die();
	}

  include("connection.php");
	include("filter.php");

	if (isset($_GET["submit"])) {
    $limit = filter_html($_GET["limit"]);
		$limit = filter_sql($link,$limit);

		$search = filter_html($_GET["search"]);
		$search = filter_sql($link,$search);

		$layanan = filter_html($_GET["layanan"]);
		$layanan = filter_sql($link,$layanan);

		$active_0 = $active_A = $active_B = $active_C = $active_D = "";
    switch($layanan) {
			case "A" : $active_A = "active";  break;
			case "B" : $active_B = "active";  break;
			case "C" : $active_C = "active";  break;
			case "D" : $active_D = "active";  break;
			default  : $active_0 = "active";  break;
		}

    if ($_GET["submit"]=="Search") {
			$limit = 0;
		}
    else if ($_GET["submit"]=="SearchErase") {
			$limit = 0;
      $search = "";
		}
    else if ($_GET["submit"]=="Layanan") {
			$limit = 0;
		}
    else if ($_GET["submit"]=="First") {
			$limit = 0;
		}
    else if ($_GET["submit"]=="Prev") {
			if ($limit < 0) {
				$pesan_warning = "Anda sudah ada di record terbaru";
				$limit = $limit+10;
			}
		}
    else if ($_GET["submit"]=="Next") {
			$query  = "SELECT * FROM record INNER JOIN siswa USING(nis) INNER JOIN layanan USING(kode_layanan) ";
			$query .= "WHERE nama LIKE '%{$search}%' ";
			$query .= "AND kode_layanan LIKE '{$layanan}%' ";
      $query .= "ORDER BY idx DESC ";
      $query .= "LIMIT {$limit},10";

			$result = mysqli_query($link, $query);
			$count = mysqli_num_rows($result);
			if ($count == 0) {
				$pesan_warning = "Anda sudah ada di record terlama";
				$limit = $limit-10;
			}
		}
    else if ($_GET["submit"]=="Last") {
			$limit = -10;
			do {
				$limit = $limit + 10;
				$query  = "SELECT * FROM record INNER JOIN siswa USING(nis) INNER JOIN layanan USING(kode_layanan) ";
				$query .= "WHERE nama LIKE '%{$search}%' ";
				$query .= "AND kode_layanan LIKE '{$layanan}%' ";
        $query .= "ORDER BY idx DESC ";
				$query .= "LIMIT {$limit},10";
				$result_last = mysqli_query($link, $query);
				$data_last = mysqli_fetch_assoc($result_last);
			} while ($data_last);
			$limit = $limit - 10;
		}
  }
  else {
    // var awal
    $search = $layanan = "";
    $limit = 0;
    switch($layanan) {
			case "A" : $active_A = "active";  break;
			case "B" : $active_B = "active";  break;
			case "C" : $active_C = "active";  break;
			case "D" : $active_D = "active";  break;
			default  : $active_0 = "active";  break;
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
    <title>Record | Pengelolaan Arsip Bimbingan Konseling</title>

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
            <li class="active">Record</li>
          </ol>
        </div>
      </div>
      <!-- End breadcrumb -->
      <div class="row">
        <div class="col-md-12">
          <?php
          if (isset($_GET["pesan_out"])) {
              echo "<div class='alert alert-{$_GET['tipe']} alert-dismissible' role='alert'>";
                echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
                if($_GET["tipe"] == "success") {
                  echo "<span class='glyphicon glyphicon-ok'></span>&nbsp;&nbsp;";
                }
                echo $_GET["pesan_out"];
              echo "</div>";
            }
          ?>
        </div>
      </div>

      <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-md-4">
                    <h3 class="panel-title myh">R E C O R D &nbsp;K E G I A T A N</h3>
                  </div>
                  <div class="col-md-3 col-md-offset-5">
                    <!-- form search siswa -->
                    <form class="" action="m_record.php" method="get">
                      <div class="input-group input-group-sm">
                        <input type="hidden" name="limit" value="<?php echo $limit ?>">
                        <input type="hidden" name="layanan" value="<?php echo $layanan ?>">
                        <input type="text" name="search" value="<?php echo $search ?>" class="form-control" placeholder="Cari Nama Siswa...">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="submit" name="submit" value="Search" data-toggle="tooltip" data-placement="top" title="Search">
                            <span class="glyphicon glyphicon-search"></span>
                          </button>
                          <button class="btn btn-default" type="submit" name="submit" value="SearchErase" data-toggle="tooltip" data-placement="top" title="Clear">
                            <span class="glyphicon glyphicon-remove"></span>
                          </button>
                        </span>
                      </div>
                    </form>
                    <!-- end form search siswa -->
                  </div>
                </div>
              </div>
              <div class="panel-heading">
                <div class="row">
                  <div class="col-md-6">
                    <!-- url navigasi -->
                    <?php
                      $alamat_folder = rawurlencode("m_record.php");
                      $url_first ="{$alamat_folder}?limit=0&search={$search}&layanan={$layanan}&submit=First";
                      $limit_prev = $limit-10;
                      $url_prev ="{$alamat_folder}?limit={$limit_prev}&search={$search}&layanan={$layanan}&submit=Prev";
                      $limit_next = $limit+10;
                      $url_next ="{$alamat_folder}?limit={$limit_next}&search={$search}&layanan={$layanan}&submit=Next";
                      $url_last ="{$alamat_folder}?limit={$limit}&search={$search}&layanan={$layanan}&submit=Last";
                      $nav = $limit/10+1;
                    ?>
                    <!-- end url navigasi -->
                    <!-- button add record -->
                    <a type="button" class="btn btn-primary btn-sm" href="m_record_add.php"><span class="glyphicon glyphicon-plus"></span> &nbsp;Add Record </a>
                    <!-- end button -->
                  </div>
                  <!-- navigasi -->
                  <div class="col-md-6 text-right">
                    <span class="input-group-btn">
                      <a type="button" class="btn btn-default btn-sm" href="<?php echo $url_first; ?> " data-toggle="tooltip" data-placement="left" title="Newest"><span class="glyphicon glyphicon-fast-backward"></span></a>
                      <a type="button" class="btn btn-default btn-sm" href="<?php echo $url_prev; ?> " data-toggle="tooltip" data-placement="bottom" title="Newer"><span class="glyphicon glyphicon-step-backward"></span></a>
                      <a type="button" class="btn btn-default btn-sm disabled"><?php echo $nav; ?></a>
                      <a type="button" class="btn btn-default btn-sm" href="<?php echo $url_next; ?> " data-toggle="tooltip" data-placement="bottom" title="Older"><span class="glyphicon glyphicon-step-forward"></span></a>
                      <a type="button" class="btn btn-default btn-sm" href="<?php echo $url_last; ?> " data-toggle="tooltip" data-placement="right" title="Oldest"><span class="glyphicon glyphicon-fast-forward"></span></a>
                    </span>
                  </div>
                  <!-- end navigasi -->
                </div>
              </div>
              <div class="panel-body">
                <!-- pesan -->
                <?php
        					// tampilkan pesan jika ada
                  // $pesan_succes = "contoh sukses";
                  // $pesan_info = "contoh info";
                  if ($search !== "") {
                    $query  = "SELECT * FROM record INNER JOIN siswa USING(nis) ";
              			$query .= "WHERE nama LIKE '%{$search}%' ";
                    $query .= "ORDER BY idx DESC ";
              			$result = mysqli_query($link, $query);
              			$count_1 = mysqli_num_rows($result);
                    $query  = "SELECT * FROM record INNER JOIN siswa USING(nis) INNER JOIN layanan USING(kode_layanan) ";
              			$query .= "WHERE nama LIKE '%{$search}%' ";
              			$query .= "AND kode_layanan LIKE '{$layanan}%' ";
                    $query .= "ORDER BY idx DESC ";
              			$result = mysqli_query($link, $query);
              			$count_2 = mysqli_num_rows($result);

              			if ($count_1 == 0) {
              				$pesan_danger = "Nama siswa <b>\"$search\"</b> tidak ada dalam kegiatan apapun";
              			}
                    else if ($count_2 == 0) {
                      switch($layanan) {
                        case "A" : $nama_layanan = "Layanan Dasar";  break;
                        case "B" : $nama_layanan = "Layanan Responsif";  break;
                        case "C" : $nama_layanan = "Layanan Perencanaan Individual";  break;
                        case "D" : $nama_layanan = "Dukungan Sistem";  break;
                        default  : $nama_layanan = "Layanan";  break;
                      }
                      $pesan_warning = "Nama siswa <b>\"$search\"</b> tidak ada di <b>\"$nama_layanan\"</b>";
                    }
                    else {
                      $pesan_info = "Hasil pencarian untuk nama siswa <b>\"$search\" </b>";
                    }
                  }
                  if (isset($pesan_danger)) {
        						echo "<div class=\"alert alert-danger\">$pesan_danger</div>";
        					}
                  if (isset($pesan_warning)) {
        						echo "<div class=\"alert alert-warning\">$pesan_warning</div>";
        					}
        					if (isset($pesan_succes)) {
        						echo "<div class=\"alert alert-success\">$pesan_succes</div>";
        					}
                  if (isset($pesan_info)) {
        						echo "<div class=\"alert alert-info\">$pesan_info</div>";
        					}
        				?>
                <!-- end pesan -->

                <?php
  								$alamat_folder = rawurlencode("m_record.php");
  								$ssearch = html_entity_decode($search);
  								$ssearch = urlencode($ssearch);
  								$submit = "";
  							?>
                <!-- T A B L E -->
                <!-- kategori layanan -->
                <ul class="nav nav-tabs">
                  <li role="presentation" class="<?php echo $active_0; ?>">
                    <a href="<?php echo "{$alamat_folder}?limit={$limit}&search={$ssearch}&layanan=&submit=Layanan"; ?>">Semua</a>
                  </li>
                  <li role="presentation" class="<?php echo $active_A; ?>">
                    <a href="<?php echo "{$alamat_folder}?limit={$limit}&search={$ssearch}&layanan=A&submit=Layanan"; ?>">Layanan Dasar</a>
                  </li>
                  <li role="presentation" class="<?php echo $active_B; ?>">
                    <a href="<?php echo "{$alamat_folder}?limit={$limit}&search={$ssearch}&layanan=B&submit=Layanan"; ?>">Layanan Responsif</a>
                  </li>
                  <li role="presentation" class="<?php echo $active_C; ?>">
                    <a href="<?php echo "{$alamat_folder}?limit={$limit}&search={$ssearch}&layanan=C&submit=Layanan"; ?>">Layanan Perencanaan individual</a>
                  </li>
                  <li role="presentation" class="<?php echo $active_D; ?>">
                    <a href="<?php echo "{$alamat_folder}?limit={$limit}&search={$ssearch}&layanan=D&submit=Layanan"; ?>">Dukungan Sistem</a>
                  </li>
                </ul>
                <!-- end kategori layanan -->
                <div class="table-responsive">
                  <table class="table table-condensed" style="border: 1px solid #ddd; border-top: none;">
                    <tr>
                      <th style="width: 10%;" class="myth">Tanggal</th>
                      <th style="width: 15%;" class="myth">Nama Kegiatan</th>
                      <th style="width: 15%;" class="myth">Nama Siswa</th>
                      <th style="width: 10%;" class="myth">Tempat</th>
                      <th style="width: 25%;" class="myth">Uraian Kegiatan</th>
                      <th style="width: 15%;" class="myth">Keterangan</th>
                      <th class='text-center myth' style="width: 1%;" colspan='3'>
                        <a type='button' class='btn btn-sm btn-default disabled'>
                          <span class='glyphicon glyphicon-tasks'></span>
                        </a>
                      </th>
                    </tr>
                    <?php
                      $query  = "SELECT * FROM record INNER JOIN siswa USING(nis) INNER JOIN layanan USING(kode_layanan) ";
        							$query .= "WHERE nama LIKE '%{$search}%' ";
        							$query .= "AND kode_layanan LIKE '{$layanan}%' ";
                      $query .= "ORDER BY idx DESC ";
        							$query .= "LIMIT {$limit},10";

                      $result = mysqli_query($link, $query);
                      if(!$result){
        								die ("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
        							}

                      // array untuk menampung data record kegiatan dari database
        							$data[0]['idx']=null;
        							$i = 1;
        							$bg = "white";
                      while($data[$i] = mysqli_fetch_assoc($result)) {
                        if ($data[$i]['idx']==$data[$i-1]['idx']){
        									echo "<tr style='background-color: {$bg}'>";
        									echo "<td style='border-top: none;'></td>";
        									echo "<td style='border-top: none;'></td>";
                          // new
                          $query_max = "SELECT MAX(idx) FROM record";
                          $result_max = mysqli_query($link, $query_max);
                          $data_max = mysqli_fetch_row($result_max);
                          $idx_max = (int) $data_max[0];
                          $idx_inv = $idx_max-$data[$i]['idx']+1;
                          // end new
        									// echo "<td style='border-top: none;' class='mytext'><span>{$data[$i]['idx']}|{$idx_inv}|{$data[$i]['nama']}</span></td>";
        									echo "<td style='border-top: none;' class='mytext'><span>{$data[$i]['nama']}</span></td>";
        									for ($j=1; $j<=6; $j++) {
        										echo "<td style='border-top: none;'></td>";
        									}
        									echo "</tr>";
        									continue;
        								}
                        if ($bg=="white")	{
        									$bg="#f5f5f5";
        								} else {
        									$bg="white";
        								}
                        $tanggal_php = strtotime($data[$i]['tanggal']);
        								$tanggal = date("d-m-Y", $tanggal_php);
                        echo "<tr style='background-color: {$bg}'>";
          								echo "<td>{$tanggal}</td>";
          								echo "<td class='mytext'><span>{$data[$i]['nama_layanan']}</span></td>";
                          // new
                          $query_max = "SELECT MAX(idx) FROM record";
                          $result_max = mysqli_query($link, $query_max);
                          $data_max = mysqli_fetch_row($result_max);
                          $idx_max = (int) $data_max[0];
                          $idx_inv = $idx_max-$data[$i]['idx']+1;
                          // end new
          								// echo "<td class='mytext'><span>{$data[$i]['idx']}|{$idx_inv}|{$data[$i]['nama']}</span></td>";
          								echo "<td class='mytext'><span>{$data[$i]['nama']}</span></td>";
          								echo "<td class='mytext'><span>{$data[$i]['tempat']}</span></td>";
          								echo "<td class='mytext'><span>{$data[$i]['uraian']}</span></td>";
          								echo "<td class='mytext'><span>{$data[$i]['keterangan']}</span></td>";

                    ?>
                    <td>
    									<form action="m_record_detail.php" method="post">
    										<input type="hidden" name="idx" value="<?php echo $data[$i]['idx']; ?>" >
                        <button class="btn btn-xs btn-info" type="submit" name="submit" value="Detail" data-toggle="tooltip" data-placement="left" title="DETAIL Record">
                          <span class="glyphicon glyphicon-new-window"></span>
                        </button>
    									</form>
                    </td>
                    <td>
                      <form action="m_record_edit_p.php" method="post" >
    										<input type="hidden" name="idx" value="<?php echo $data[$i]['idx']; ?>" >
                        <button class="btn btn-xs btn-primary" type="submit" name="submit" value="Edit" data-toggle="tooltip" data-placement="bottom" title="EDIT Record">
                          <span class="glyphicon glyphicon-edit"></span>
                        </button>
    									</form>
                    </td>
                    <td>
                      <form action="m_record_delete.php" method="post" onsubmit="return validate_delete(this)">
    										<input type="hidden" name="idx" value="<?php echo $data[$i]['idx']; ?>" >
                        <button class="btn btn-xs btn-danger" type="submit" name="submit" value="Delete" data-toggle="tooltip" data-placement="right" title="DELETE Record">
                          <span class="glyphicon glyphicon-trash"></span>
                        </button>
    									</form>
    								</td>
                    <?php
        								echo "</tr>";
        								$i++;
        							}

        							mysqli_free_result($result);
        							mysqli_close($link);
        						?>
                  </table>
                </div>

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
