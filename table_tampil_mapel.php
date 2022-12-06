<!DOCTYPE html>
<html>
<head>
	<title></title>
    <style type="text/css">
        .tombol{
            margin-bottom: 20px;
        }

        h1{
        	text-align: center;
        }

        .box {
        	border-style: outset;
        	padding: 25px;
        	border-radius: 40px 40px 40px 40px;
        }

        .btn-danger{
        	padding: 5px;
        }

        .btn-warning{
        	padding: 5px;
        }
    </style>
</head>
<body>
	<h1>TAMPIL MATA PELAJARAN SISWA</h1>
	<br>
	<div class="box">
		<div class="form-group">
			<?php
					include "../include/koneksi.php";
					$nis = $_SESSION['nis'];
					$sql = mysqli_query($conn, "SELECT nama FROM siswa WHERE siswa.nis = '$nis' ");
					while ($hasil = mysqli_fetch_array($sql)) {
			 ?>

				<label>Nama anda : <?php echo $hasil['nama']; }?> </label>

        </div>
	<div class="table-responsive">

	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>No</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Kelas</th>
                <th>No Mapel</th>
                <th>Nama Mapel</th>
                <th>Nama Guru</th>

            </tr>
        </thead>
        <tbody>
					<?php
							include "../include/koneksi.php";
							$nis = $_SESSION['nis'];
							$i = 0 + 1;
							$sql="SELECT mapel.nama, guru.nama_guru, sum(absensi.hadir) as hadir, sum(absensi.sakit) as sakit, sum(absensi.izin) as izin, sum(absensi.alfa) as alfa FROM (((siswa join absensi on siswa.nis = absensi.nis) join mapel on absensi.id_mapel = mapel.id_mapel) join detail_mapel_guru
						        on mapel.id_mapel = detail_mapel_guru.id_mapel) join guru on detail_mapel_guru.nip = guru.nip WHERE absensi.nis = '".$nis."' GROUP BY mapel.id_mapel";
						  $result = mysqli_query($conn,$sql);
							while ($hasil = mysqli_fetch_array($result)) {
					 ?>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $hasil['nama']; ?></td>
				<td><?php echo $hasil['nama_guru']; ?></td>
				<td><?php echo $hasil['hadir']; ?></td>
        <td><?php echo $hasil['sakit']; ?></td>
        <td><?php echo $hasil['izin']; ?></td>
        <td><?php echo $hasil['alfa']; ?></td>
			</tr>
			<?php $i++; } ?>
        </tbody>
    </table>
    </div>
	</div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
    $('#example').DataTable();
	} );
	</script>
</body>
</html>
