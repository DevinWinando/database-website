<?php
require '../function/function.php';
$siswa = query("SELECT * FROM siswa");
require_once '../vendor/autoload.php';

$html = '
	<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Data Siswa</h1>
	<br>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No. </th>
			<th>Gambar</th>
			<th>Nama</th>
			<th>Kelas</th>
			<th>Jurusan</th>
			<th>Sekolah</th>
		</tr>';

		$i = 1;
		foreach ($siswa as $row) {
			$html .= '<tr>
						<td>'. $i++ .'</td>
						<td><img src="../img/'. $row["gambar"] .'" width="50"></td>
						<td>'. $row["nama"] .'</td>
						<td>'. $row["kelas"] .'</td>
						<td>'. $row["jurusan"] .'</td>
						<td>'. $row["sekolah"] .'</td>
					</tr>';
		}

$html .= '</table>
</body>
</html>
';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-siswa-pkl.pdf', 'I');

?>
