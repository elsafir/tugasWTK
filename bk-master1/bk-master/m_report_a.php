<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  die();
}
if ( (!isset($_POST["submit"])) || ($_POST["submit"] != "Create Report") ) {
  header("Location: m_record.php");
  die();
}

include("connection.php");
include("filter.php");

// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf([
  'format' => 'A4',
	'margin_left' => 20,
	'margin_right' => 15,
	'margin_top' => 35,
	'margin_bottom' => 25,
	'margin_header' => 10,
	'margin_footer' => 10
]);

// Define the Header/Footer before writing anything so they appear on the first page
$mpdf->SetHTMLHeader('
<table class="report report-header">
    <tr>
        <td style="width: 15%;"><img src="img/logo.png" style="width: 70px;"></td>
        <td style="width: 85%;">
          <div class="head1">LAPORAN KEGIATAN BIMBINGAN KONSELING</div>
          <div class="head2">SMK NEGERI 1 MAJALAYA</div>
          <div class="head3">JL.Idris No.99 Rancajigang Kec. Majalaya Kab.Bandung Telp. (021) 52725477</div>
        </td>
    </tr>
</table>');
$mpdf->SetHTMLFooter('
<table width="100%">
    <tr>
        <td width="33%" style="font-style: italic; font-size: 12px;">Dicetak tanggal: {DATE j-m-Y}</td>
        <td width="33%" align="center"></td>
        <td width="33%" style="text-align: right;">{PAGENO}/{nbpg}</td>
    </tr>
</table>');

$stylesheet = file_get_contents('css/style.css');
$mpdf->WriteHTML($stylesheet,1);


$idx = filter_html($_POST["idx"]);
$idx = filter_sql($link,$idx);

// $idx = 8;

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

$html = '
<table class="report report-rincian">
  <tr>
    <td style="width: 20%;">Tanggal</td>
    <td style="width: 2%;">:</td>
    <td>'.$tanggal.'</td>
  </tr>
  <tr>
    <td>Layanan</td>
    <td>:</td>
    <td>'.$kat_layanan.'</td>
  </tr>
  <tr>
  <tr>
    <td>Nama Kegiatan</td>
    <td>:</td>
    <td>'.$nama_layanan.'</td>
  </tr>
  <tr>
    <td>Tempat</td>
    <td>:</td>
    <td>'.$tempat.'</td>
  </tr>
  <tr>
    <td>Uraian Kegiatan</td>
    <td>:</td>
    <td>'.$uraian.'</td>
  </tr>
  <tr>
    <td>Keterangan</td>
    <td>:</td>
    <td>'.$keterangan.'</td>
  </tr>
</table>
<br>
<h4>SISWA YANG BERSANGKUTAN</h4>
<table class="report-siswa" style"width: 100%;">
<tr>
  <th style="width: 7%;">No</th>
  <th style="width: 15%;">NIS</th>
  <th style="width: 60%;">Nama</th>
  <th style="width: 15%;">KK</th>
  <th style="width: 15%;">Tingkat</th>
  <th style="width: 15%;">Kelas</th>
</tr>';
$i = 1;
foreach($siswa as $row) {
  $html .= '<tr>';
  $html .= '<td>'.str_pad($i,2,"0",STR_PAD_LEFT).'</td>';
  $html .= '<td>'.$row['nis'].'</td>';
  $html .= '<td style="text-align: left;">&nbsp;'.$row['nama'].'</td>';
  $html .= '<td>'.$row['kk'].'</td>';
  $html .= '<td>'.$row['tingkat'].'</td>';
  $html .= '<td>'.$row['kelas'].'</td>';
  $html .= '</tr>';
  $i++;
}
$html.='</table>';
$mpdf->WriteHTML($html);

$query_max = "SELECT MAX(idx) FROM record";
$result_max = mysqli_query($link, $query_max);
$data_max = mysqli_fetch_row($result_max);
$idx_max = (int) $data_max[0];
$idx_inv = $idx_max-$idx+1;

$file_name = "Report-".str_pad($idx_inv,2,"0",STR_PAD_LEFT).date("-dmy").".pdf";
$mpdf->SetTitle('Laporan Kegiatan Bimbingan Konseling');
$mpdf->SetAuthor('budimanfajarf');
$mpdf->SetCreator('budimanfajarf');
$mpdf->SetSubject($file_name);
$mpdf->SetKeywords('Report, Laporan, SMKN 1 Majalaya, Pengelolaan Arsip, Bimbingan Konseling, Record');

// Output a PDF file directly to the browser
$mpdf->Output($file_name,\Mpdf\Output\Destination::INLINE);
?>
