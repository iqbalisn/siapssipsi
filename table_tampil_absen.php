
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
		<script>
		function showUser(str) {
			console.log(str);
						if (window.XMLHttpRequest) {
		            // code for IE7+, Firefox, Chrome, Opera, Safari
		            xmlhttp = new XMLHttpRequest();
		        } else {
		            // code for IE6, IE5
		            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		        }
		        xmlhttp.onreadystatechange = function() {
		            if (this.readyState == 4 && this.status == 200) {
		                document.getElementById("siswa").innerHTML = this.responseText;
		            }
		        };
		        xmlhttp.open("GET","getpilihansiswa.php?q="+str,true);
		        xmlhttp.send();
		    }
		</script>
</head>
<body>
	<h1>ABSENSI SISWA</h1>
	<br>
	<div class="box">
		<form onsubmit="return false" class="form-inline">
		<!-- <div class="row">
			<div class="col-md-3"> -->
				<div class="form-grup">
					<select id="kelas" class="form-control kelas" name="kelas"  onchange="showUser(this.value)" style="margin-right:10px;" >
						<option value="">Pilih Kelas:</option>
						<?php
								include "../include/koneksi.php";
								$nip = $_SESSION['nip'];
								$sql = mysqli_query($conn, "SELECT * FROM ((((kelas join siswa on kelas.id_kelas = siswa.kelas_id) join absensi on siswa.nis = absensi.nis) join mapel on absensi.id_mapel = mapel.id_mapel) join detail_mapel_guru
											on mapel.id_mapel = detail_mapel_guru.id_mapel) join guru on detail_mapel_guru.nip = guru.nip WHERE guru.nip = '$nip' GROUP BY kelas.id_kelas ORDER BY nama_kelas");
								while ($hasil = mysqli_fetch_array($sql)) {
						 ?>
						<option value="<?php echo $hasil['id_kelas']; ?>"><?php echo $hasil['nama_kelas']; ?></option>
					<?php } ?>
					</select>
				</div>
			<!-- </div>
			<div class="col-md-2 col-md-offset-2"> -->
				<div id="siswa">
						<div class="form-grup">
							<select id="mapel" class="form-control" name="mapel"   >
								<option  value="">Pilih Siswa:</option>
							</select>
						</div>
				</div>
			<!-- </div>
			<div class="col-md-2 col-md-offset-1"> -->
					<button id="tombol_form" class="btn btn-primary" style="margin-left:10px;">Tampil Siswa</button>

		<!-- </div> -->
		</form>
<br>
		<div class="table-responsive">
<div id="txtHint">
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
				        <th>No</th>
                <th>Mapel</th>
                <th>Nama Guru</th>
                <th>Hadir</th>
                <th>Sakit</th>
                <th>Izin</th>
                <th>Alfa</th>

            </tr>
        </thead>
        <tbody>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
        <td></td>
        <td></td>
        <td></td>
			</tr>
        </tbody>
    </table>
    </div>
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
			// var kelas=document.getElementById("kelas").value;

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
			xmlhttp.open("GET","getabsen.php?mapel="+mapel,true);
			xmlhttp.send();

			}
	});
	</script>
</body>
</html>
