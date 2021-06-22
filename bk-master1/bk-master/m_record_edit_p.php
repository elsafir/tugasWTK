<?php
  session_start();
  if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    die();
  }

  include("connection.php");
  include("filter.php");

  if (isset($_POST["submit"])) {

    if (($_POST["submit"]=="Edit") || ($_POST["submit"]=="Edit Record")) {
      setcookie("record_edit[search]",null);
			if (isset($_COOKIE["record_edit"]["nis"])) {
				foreach($_COOKIE["record_edit"]["nis"] as $key => $value) {
					setcookie("record_edit[nis][$key]",null);
				}
			}

			$idx = filter_html($_POST["idx"]);
			$idx = filter_sql($link,$idx);
			$query  = "SELECT * FROM record WHERE idx={$idx} ORDER BY idx ASC";
			$result = mysqli_query($link, $query);

      if(!$result){
        die ("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
      }

			$i = 0;
      while($data = mysqli_fetch_assoc($result)) {
				$tanggal = strtotime($data['tanggal']);
				$tgl = date("j", $tanggal);
				$bln = date("n", $tanggal);
				$thn = date("Y", $tanggal);

				setcookie("record_edit[nis][$i]",$data['nis']);

				setcookie("record_edit[tanggal][tgl]","$tgl");
				setcookie("record_edit[tanggal][bln]","$bln");
				setcookie("record_edit[tanggal][thn]","$thn");

        setcookie("record_edit[idx]",$data['idx']);
        setcookie("record_edit[layanan]",$data['kode_layanan']);
        setcookie("record_edit[tempat]",$data['tempat']);
        setcookie("record_edit[uraian]",$data['uraian']);
        setcookie("record_edit[keterangan]",$data['keterangan']);

				$i++;
			}
			header("Location: m_record_edit.php");
		}

    if ($_POST["submit"]=="Search") {
			$search = filter_html($_POST["search"]);
			if (empty($search)) {
				setcookie("record_edit[search]",null);
			} else {
				setcookie("record_edit[search]","$search");
			}
			header("Location: m_record_edit.php");
		}
    if ($_POST["submit"]=="SearchErase") {
      setcookie("record_edit[search]",null);
      header("Location: m_record_edit.php");
    }

		if ($_POST["submit"]=="Add") {
			$add_nis = filter_html($_POST["add_nis"]);
			$add_nis_err = "";

			if (isset($_COOKIE["record_edit"]["nis"])) {
				foreach($_COOKIE["record_edit"]["nis"] as $key => $value) {
					if ($value == $add_nis) {
						$add_nis_err= $add_nis;
						header("Location: m_record_edit.php?add_nis_err={$add_nis_err}");
						die();
					}
				}
				$key += 1;
				setcookie("record_edit[nis][$key]","{$add_nis}");
				header("Location: m_record_edit.php");
			}
			else {
				setcookie("record_edit[nis][0]","{$add_nis}");
				header("Location: m_record_edit.php");
			}
		}

		if ($_POST["submit"]=="Delete") {
			$key_del_nis = filter_html($_POST["key_del_nis"]);
			setcookie("record_edit[nis][$key_del_nis]",null);
			header("Location: m_record_edit.php");
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

      if (!isset($_COOKIE["record_edit"]["nis"])) {
        $save_record_err .= "<span class='glyphicon glyphicon-warning-sign'></span>&nbsp;&nbsp;Minimal harus ada 1 <b>data siswa</b> yang ditambahkan <br>";
      }

      if ($layanan=="0") {
        setcookie("record_edit[layanan]",null);
        $save_record_err .= "<span class='glyphicon glyphicon-warning-sign'></span>&nbsp;&nbsp;<b>Layanan</b> harus dipilih";
			}
			else {
        setcookie("record_edit[layanan]","$layanan");
			}

			if ($save_record_err=="") {
        $save_record_succ="";

        $tgl = filter_sql($link,$tgl);
        $bln = filter_sql($link,$bln );
        $thn = filter_sql($link,$thn);
        $layanan = filter_sql($link,$layanan);
        $tempat = filter_sql($link,$tempat);
        $uraian = filter_sql($link,$uraian);
        $keterangan = filter_sql($link,$keterangan);

        $tanggal = $thn."-".$bln."-".$tgl;

				$idx = (int) filter_sql($link,$_COOKIE["record_edit"]["idx"]);

        $query_del = "DELETE FROM record WHERE idx='{$idx}';";
        $result_del = mysqli_query($link, $query_del);
				if (!$result_del) {
          die ("Query gagal dijalankan: ".mysqli_errno($link)." - ".mysqli_error($link));
        }

        foreach($_COOKIE["record_edit"]["nis"] as $key => $nis) {
          $query = "INSERT INTO record VALUES ($idx, '$tanggal', '$nis', '$layanan', '$tempat', '$uraian', '$keterangan')";
          $result = mysqli_query($link, $query);
          if(!$result) {
            die ("Query gagal dijalankan: ".mysqli_errno($link)." - ".mysqli_error($link));
          }
				}

        $save_record_succ = urlencode("Record Kegiatan berhasil di <b>Edit</b>");

        foreach($_COOKIE["record_edit"]["nis"] as $key => $value) {
					setcookie("record_edit[nis][$key]",null);
				}
        foreach($_COOKIE["record_edit"]["tanggal"] as $key => $value) {
					setcookie("record_edit[tanggal][$key]",null);
				}
        setcookie("record_edit[idx]",null);
        setcookie("record_edit[search]",null);
        setcookie("record_edit[layanan]",null);
        setcookie("record_edit[tempat]",null);
        setcookie("record_edit[uraian]",null);
        setcookie("record_edit[keterangan]",null);

        $tipe = "success";
				header("Location: m_record.php?pesan_out={$save_record_succ}&tipe={$tipe}");
			}
			else {
				setcookie("record_edit[tanggal][tgl]","$tgl");
				setcookie("record_edit[tanggal][bln]","$bln");
				setcookie("record_edit[tanggal][thn]","$thn");
        setcookie("record_edit[tempat]","$tempat");
        setcookie("record_edit[uraian]","$uraian");
        setcookie("record_edit[keterangan]","$keterangan");
        $save_record_err = urlencode($save_record_err);
        header("Location: m_record_edit.php?save_record_err={$save_record_err}");
			}
		}

		if ($_POST["submit"]=="CANCEL")	{
			$idx = (int) $_COOKIE["record_edit"]["idx"];
			if (isset($_COOKIE["record_edit"]["nis"])) {
        foreach($_COOKIE["record_edit"]["nis"] as $key => $value) {
					setcookie("record_edit[nis][$key]",null);
				}
			}
			if (isset($_COOKIE["record_edit"]["tanggal"])) {
        foreach($_COOKIE["record_edit"]["tanggal"] as $key => $value) {
					setcookie("record_edit[tanggal][$key]",null);
				}
			}
			setcookie("record_edit[idx]",null);
			setcookie("record_edit[search]",null);
			setcookie("record_edit[layanan]",null);
			setcookie("record_edit[tempat]",null);
			setcookie("record_edit[uraian]",null);
			setcookie("record_edit[keterangan]",null);

      $pesan_out = urlencode("Edit Record Kegiatan <b>dibatalkan</b>");
      $tipe = "warning";
			header("Location: m_record.php?pesan_out={$pesan_out}&tipe={$tipe}");

		}

  }
	else {
		header("Location: m_record.php");
	}
?>
