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
	<h1>DATA SISWA</h1>
	<br>
	<div class="box">
    <div class="tombol" >
        <a href="tambah_data_siswa.php"><button type="button" class="btn btn-success btn-md " >Tambah Data </button></a>
    </div>

<div class="table-responsive">

	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
								<th>NO</th>
                <th>NIS</th>
                <th>NAMA</th>
                <th>JENIS KELAMIN</th>
                <th>AGAMA</th>
                <th>ALAMAT</th>
                <th>NO_HP</th>
                <th>KELAS</th>
								<th>AKSI</th>

            </tr>
        </thead>
        <tbody>
					<?php
			        include "include/koneksi.php";
			        $i = 0 + 1;
			        $sql = mysqli_query($conn, "SELECT siswa.nis, siswa.nama, siswa.jk, siswa.agama, siswa.alamat, siswa.no_hp, kelas.nama_kelas FROM siswa join kelas on siswa.kelas_id = kelas.id_kelas ORDER BY siswa.nama");
			        while ($hasil = mysqli_fetch_array($sql)) {
			     ?>
					 <tr>
			      <td style="text-align: center;"><?php echo $i; ?></td>
			      <td><?php echo $hasil['nis']; ?></td>
			      <td><?php echo $hasil['nama']; ?></td>
						<td><?php echo $hasil['jk']; ?></td>
						<td><?php echo $hasil['agama']; ?></td>
						<td><?php echo $hasil['alamat']; ?></td>
						<td><?php echo $hasil['no_hp']; ?></td>
						<td><?php echo $hasil['nama_kelas']; ?></td>
			      <td style="text-align: center;"><a href="edit_data_siswa.php?edit=<?php echo $hasil['nis']; ?>" class="btn btn-warning">Edit</a>
			      <a href="proses-hapus-siswa.php?hapus=<?php echo $hasil['nis']; ?>" class="btn btn-danger">Hapus</a></td>
			  </tr>
			  <?php
			      $i++;
			      }
			    ?>
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
