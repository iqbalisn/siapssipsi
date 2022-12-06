
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
	<h1>NILAI</h1>
	<br>
	<div class="box">
		<form onsubmit="return false" class="form-inline">
		
		<!-- </div> -->
		</form>
<br>
		<div class="table-responsive">
<div id="txtHint">
<?php
include "../include/koneksi.php";

$i = 1;
$sql="SELECT siswa.nama, nilai.nilai FROM siswa join nilai on siswa.nis = nilai.nis ORDER BY nilai.id_nilai DESC";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
?>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
				        <th>NO</th>
						<th>NAMA</th>
						<th>NILAI</th>

            </tr>
			<?php
			if ($num>0){
				while($row=mysqli_fetch_array($result)){
					echo "<tbody><tr>";
      				echo "<td>" . $i . "</td>";
      				echo "<td>" . $row['nama'] . "</td>";
      				echo "<td>" . $row['nilai'] . "</td>";
     				echo "</tr></tbody>";
					$i++;
				}
			}
			?>
        </thead>

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
			xmlhttp.open("GET","getnilai.php?mapel="+mapel +"&kelas="+kelas,true);
			xmlhttp.send();

			}
	});
	</script>
</body>
</html>
