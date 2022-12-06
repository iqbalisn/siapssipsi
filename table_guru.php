<!DOCTYPE html>
<html>
<head>
	<title></title>
    <style type="text/css">
        .tombol {
            margin-bottom: 20px;
        }

        h1{
        	padding-bottom: 20px;
        	text-align: center;
        }

        .box {
        	border-style: outset;
        	padding: 25px;
        	border-radius: 0px 40px 0px 40px;
        }
    </style>
</head>
<body>
	<h1>DATA GURU</h1>

	<div class="box">
    <div class="tombol" >
        <a href="tambah_data_guru.php"><button type="button" class="btn btn-success btn-md " >Tambah Data </button></a>
    </div>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>N</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No_Hp</th>
				<th>Aksi</th>
            </tr>
        </thead>
        <tbody>
					<?php
			        include "include/koneksi.php";
			        $i = 0 + 1;
			        $sql = mysqli_query($conn, "SELECT * FROM guru ORDER BY nama_guru");
			        while ($hasil = mysqli_fetch_array($sql)) {
			     ?>
					 <tr>
			      <td style="text-align: center;"><?php echo $i; ?></td>
			      <td><?php echo $hasil['nip']; ?></td>
			      <td><?php echo $hasil['nama_guru']; ?></td>
						<td><?php echo $hasil['alamat']; ?></td>
						<td><?php echo $hasil['no_hp']; ?></td>
			      <td style="text-align: center;"><a href="edit_data_guru.php?edit=<?php echo $hasil['nip']; ?>" class="btn btn-warning">Edit</a>
			      <a href="proses-hapus-guru.php?hapus=<?php echo $hasil['nip']; ?>" class="btn btn-danger">Hapus</a></td>
			  </tr>
			  <?php
			      $i++;
			      }
			    ?>
        </tbody>
    </table>
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
