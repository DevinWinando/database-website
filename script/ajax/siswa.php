<?php  
require '../../function/function.php';

$keyword = $_GET['keyword'];
$query = "SELECT * FROM siswa WHERE 
			nama LIKE '%$keyword%' OR
			kelas LIKE '%$keyword%' OR
			jurusan LIKE '%$keyword%' OR
			sekolah LIKE '%$keyword%'
			";
$siswa = query($query);
?>

<table class="table table-borderless table-light text-center container" id="table">
		<thead>
			<tr>
				<th>No. </th>
				<th>Gambar</th>
				<th>Nama</th>
				<th>Kelas</th>
				<th>Jurusan</th>
				<th>sekolah</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			<?php foreach ($siswa as $row) : ?>
				<tr>
					<td><?= $i; ?></td>
					<td><img src="../img/<?= $row["gambar"]; ?>" width="50" height="50" style="border-radius: 50%; object-fit: cover;"></td>
					<td><?= $row["nama"]; ?></td>
					<td><?= $row["kelas"]; ?></td>
					<td><?= $row["jurusan"]; ?></td>
					<td><?= $row["sekolah"]; ?></td>
					<td>
						<a href="update.php?id=<?= $row["id"] ?>" class="link-light"><i class="fas fa-pen me-2"></i></a>
						<a href="delete.php?id=<?= $row["id"] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="link-light"><i class="fas fa-lg fa-trash-alt"></i></a>
						</td>
				</tr>
			<?php $i++ ?>
			<?php endforeach; ?>
		</tbody>
	</table>