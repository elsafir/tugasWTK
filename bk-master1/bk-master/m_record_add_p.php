<?php
  session_start();
  if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    die();
  }

  include("connection.php");
  include("filter.php");


  if (isset($_POST["submit"])) {

    if ($_POST["submit"]=="Search") {
			$search = filter_html($_POST["search"]);
      if (empty($search)) {
        setcookie("record[search]",null,time()-3600);
      } else {
        setcookie("record[search]","$search");
      }
			header("Location: m_record_add.php");
		}
    if ($_POST["submit"]=="SearchErase") {
      setcookie("record[search]",null);
      header("Location: m_record_add.php");
    }

		if ($_POST["submit"]=="Add") {
			$add_nis = filter_html($_POST["add_nis"]);
			$add_nis_err = "";

				if (isset($_COOKIE["record"]["nis"])) {
					foreach($_COOKIE["record"]["nis"] as $key => $value) {
						if ($value == $add_nis) {
							$add_nis_err= $add_nis;
							header("Location: m_record_add.php?add_nis_err={$add_nis_err}");
							die();
						}
					}
					$key += 1;
					setcookie("record[nis][$key]","{$add_nis}");
					header("Location: m_record_add.php");
				}
				else {
					setcookie("record[nis][0]","{$add_nis}");
					header("Location: m_record_add.php");
				}
		}

		if ($_POST["submit"]=="Delete") {
			$key_del_nis = filter_html($_POST["key_del_nis"]);
			setcookie("record[nis][$key_del_nis]",null);
			header("Location: m_record_add.php");
		}

    if ($_POST["submit"]=="SAVE") {
			$tgl = filter_html($_POST["tgl"]);
			$bln = filter_html($_POST["bln"]);
			$thn = filter_html($_POST["thn"]);
			$layanan = filter_html($_POST["layanan"]);
			$tempat = filter_html($_POST["tempat"]);
			$uraian = filter_html($_POST["uraian"]);
			$keterangan = filter_html($_POST["keterangan"]);

			$save_record_err ="";

			if (!isset($_COOKIE["record"]["nis"])) {
				$save_record_err .= "<span class='glyphicon glyphicon-warning-sign'></span>&nbsp;&nbsp;Minimal harus ada 1 <b>data siswa</b> yang ditambahkan <br>";
			}

			if ($layanan=="0") {
				setcookie("record[layanan]",null);
				$save_record_err .= "<span class='glyphicon glyphicon-warning-sign'></span>&nbsp;&nbsp;<b>Layanan</b> harus dipilih";
			}
			else {
				setcookie("record[layanan]","$layanan");
			}

			if ($save_record_err=="") {
				$tgl = filter_sql($link,$tgl);
				$bln = filter_sql($link,$bln );
				$thn = filter_sql($link,$thn);
				$layanan = filter_sql($link,$layanan);
				$tempat = filter_sql($link,$tempat);
				$uraian = filter_sql($link,$uraian);
				$keterangan = filter_sql($link,$keterangan);

				$tanggal = $thn."-".$bln."-".$tgl;

				$query = "SELECT MAX(idx) FROM record";
				$result = mysqli_query($link, $query);
				$data = mysqli_fetch_row($result);
				$idx = (int) $data[0] + 1;

				foreach($_COOKIE["record"]["nis"] as $key => $nis) {
					$query = "INSERT INTO record VALUES ";
					$query .= "($idx, '$tanggal', '$nis', '$layanan', '$tempat', '$uraian', '$keterangan')";
					$result = mysqli_query($link, $query);
					if(!$result) {
						die ("Query gagal dijalankan: ".mysqli_errno($link)." - ".mysqli_error($link));
					}
				}

				foreach($_COOKIE["record"]["nis"] as $key => $value) {
					setcookie("record[nis][$key]",null);
				}
				foreach($_COOKIE["record"]["tanggal"] as $key => $value) {
					setcookie("record[tanggal][$key]",null);
				}
				setcookie("record[search]",null);
				setcookie("record[layanan]",null);
				setcookie("record[tempat]",null);
				setcookie("record[uraian]",null);
				setcookie("record[keterangan]",null);
        $save_record_succ = urlencode("Penambahan Record Kegiatan <b>berhasil</b>");
        $tipe = "success";
				header("Location: m_record.php?pesan_out={$save_record_succ}&tipe={$tipe}");
			}
			else {
				setcookie("record[tanggal][tgl]","$tgl");
				setcookie("record[tanggal][bln]","$bln");
				setcookie("record[tanggal][thn]","$thn");
				setcookie("record[tempat]","$tempat");
				setcookie("record[uraian]","$uraian");
				setcookie("record[keterangan]","$keterangan");
				$save_record_err = urlencode($save_record_err);
				header("Location: m_record_add.php?save_record_err={$save_record_err}");
			}
		}

		if ($_POST["submit"]=="CANCEL")	{
			if (isset($_COOKIE["record"]["nis"])) {
				foreach($_COOKIE["record"]["nis"] as $key => $value) {
					setcookie("record[nis][$key]",null);
				}
			}
			if (isset($_COOKIE["record"]["tanggal"])) {
				foreach($_COOKIE["record"]["tanggal"] as $key => $value) {
					setcookie("record[tanggal][$key]",null);
				}
			}
			setcookie("record[search]",null);
			setcookie("record[layanan]",null);
			setcookie("record[tempat]",null);
			setcookie("record[uraian]",null);
			setcookie("record[keterangan]",null);

      $pesan_out = urlencode("Penambahan Record Kegiatan <b>dibatalkan</b>");
      $tipe = "warning";
			header("Location: m_record.php?pesan_out={$pesan_out}&tipe={$tipe}");
		}

  }
?>
