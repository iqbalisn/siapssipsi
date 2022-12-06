
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
	<h1>INPUT NILAI SISWA</h1>
	<br>

		<div class="box">

			<form onsubmit="return false" class="form-inline">
				<div class="form-grup" style="margin-right:10px;">
					<select id="kelas" class="form-control kelas" name="kelas"  >
						<option value="">Pilih Kelas:</option>
						<?php
								include "../include/koneksi.php";
								$nip = $_SESSION['nip'];
								$sql = mysqli_query($conn, "SELECT * FROM kelas ORDER BY nama_kelas");
								while ($hasil = mysqli_fetch_array($sql)) {
						?>
						<option value="<?php echo $hasil['id_kelas']; ?>"><?php echo $hasil['nama_kelas']; ?></option>
					<?php } ?>
					</select>
				</div>
				<div class="form-grup">
					<select id="mapel" class="form-control" name="mapel"  style="width: 250px" >
						<option value="">Pilih Mata Pelajaran:</option>
						<?php
						include "../include/koneksi.php";

						$sql = mysqli_query($conn, "SELECT mapel.id_mapel, mapel.nama FROM (mapel join detail_mapel_guru on mapel.id_mapel = detail_mapel_guru.id_mapel) join guru on detail_mapel_guru.nip = guru.nip WHERE guru.nip = '$nip'");
						while ($hasil = mysqli_fetch_array($sql)) {
						?>
						<option value="<?php echo $hasil['id_mapel']; ?>"><?php echo $hasil['nama']; ?></option>
					<?php } ?>
					</select>
				</div>

			<button id="tombol_form" class="btn btn-primary" style="margin-left:10px;">Tampil Siswa</button>
		</form>
		<br>
		<div class="table-responsive">

		<form action='proses_tambah_nilai.php' method='post' >
		<div id="txtHint">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
								<th>NO</th>
                <th>NAMA</th>
                <th>NILAI</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
	</div>
	<input id='tombol' type='submit' name='submit' value='Konfirmasi' class='btn btn-success'></form>

	</div>
</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
    $('#example').DataTable();

		document.getElementById("tombol_form").addEventListener("click", tampilkan_nilai_form);

			function tampilkan_nilai_form(){
		  var mapel=document.getElementById("mapel").value;
			var kelas=document.getElementById("kelas").value;
			// if (str=="") {
			// 	document.getElementById("txtHint").innerHTML="";
			// 	return;
			// }
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
				if (this.readyState==4 && this.status==200) {
					document.getElementById("txtHint").innerHTML=this.responseText;
				}
			}
			xmlhttp.open("GET","getuser_nilai.php?kelas="+kelas+"&mapel="+mapel,true);
			xmlhttp.send();

			}
	});
	</script>
</body>
</html>
