<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  die();
}

  include("connection.php");
  include("filter.php");

  if (isset($_POST["submit"])) {

		if  (($_POST["submit"]=="Delete") || ($_POST["submit"]=="Delete Record")) {
			$idx = filter_html($_POST["idx"]);
      $idx = filter_sql($link,$idx);

      $query_del = "DELETE FROM record WHERE idx='{$idx}';";
      $result_del = mysqli_query($link, $query_del);

      if($result_del) {
        $pesan ="Record Kegiatan berhasil <b>dihapus</b>";
        $pesan = urlencode($pesan);

				$query_sel ="SELECT * FROM record ORDER BY idx;";
        $result_sel = mysqli_query($link, $query_sel);

				if (!$result_sel) {
          die ("Query gagal dijalankan: ".mysqli_errno($link)." - ".mysqli_error($link));
        }

				$data[0]['idx']=0;
        $i = 1;

        while($data[$i] = mysqli_fetch_assoc($result_sel)) {
          if ($data[$i]['idx']==$data[$i-1]['idx']) {
						continue;
					}

					$query_up = "UPDATE record SET idx='{$i}' WHERE idx='{$data[$i]['idx']}';";
					$result_up = mysqli_query($link, $query_up);
					if (!$result_up) {
						die ("Query gagal dijalankan: ".mysqli_errno($link)." - ".mysqli_error($link));
					}
					$i++;
				}
        header("Location: m_record.php?pesan_out={$pesan}&tipe=success");
      }
			else {
				die ("Query gagal dijalankan: ".mysqli_errno($link)." - ".mysqli_error($link));
			}
    }
		else {
			header("Location: m_record.php");
		}
  }
	else {
			header("Location: m_record.php");
	}
?>
