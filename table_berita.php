<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.tombol {
			padding-bottom: 20px;
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
	<h1>DATA BERITA</h1>

	<div class="box">
	<div class="tombol" >
        <a href="tambah_berita.php"><button type="button" class="btn btn-success btn-md " >Tambah Data </button></a>
    </div>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Isi Berita</th>
                <th>Aksi</th>
            </tr>
        </thead>
		<tbody>
		<?php
							include "include/koneksi.php";
							$i = 0 + 1;
							$sql = mysqli_query($conn, "SELECT * FROM berita ORDER BY judul");
							while ($hasil = mysqli_fetch_array($sql)) {
					 ?>
					 <tr>
						<td style="text-align: center;"><?php echo $i; ?></td>
						<td><?php echo $hasil['judul']; ?></td>
						<td style="text-align: center;"><a href="edit_berita.php?edit=<?php echo $hasil['id_berita']; ?>" class="btn btn-warning">Edit</a>
						<a href="proses-hapus-berita.php?hapus=<?php echo $hasil['id_berita']; ?>" class="btn btn-danger">Hapus</a></td>
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
