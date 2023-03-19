<?php
session_start();
include "config.php";
?>
<!DOCTYPE html>
<head>
	<title>Full Screen Landing Page</title>
	<link href="favicon.png" rel="icon">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
	<script src="lib/jquery/jquery.min.js" type="text/javascript"></script>
	<script src="lib/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyA-AB-9XZd-iQby-bNLYPFyb0pR2Qw3orw"></script>
    <script type="text/javascript">
        function initialize() {
            var x = document.getElementById("demo");
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }

            function showPosition(position) {
                x.innerHTML = "<div class='form-group'><label for='latitude'>Latitude:</label><input id='txtLat' type='text' class='form-control' name='latitude' value=' " + position.coords.latitude + " ' /></div><div class='form-group'><label for='longitude'>Longitude:</label><input id='txtLng' type='text' class='form-control' name='longitude' value=' " + position.coords.longitude + " ' /></div><div class='form-group'><div id='map_canvas' style='width: 100%; height: 200px;'></div></div> ";
                // Creating map object
                var map = new google.maps.Map(document.getElementById('map_canvas'), {
                    zoom: 12,
                    center: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                // creates a draggable marker to the given coords
                var vMarker = new google.maps.Marker({
                    position: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
                    draggable: true
                });

                // adds a listener to the marker
                // gets the coords when drag event ends
                // then updates the input with the new coords
                google.maps.event.addListener(vMarker, 'dragend', function(evt) {
                    $("#txtLat").val(evt.latLng.lat().toFixed(6));
                    $("#txtLng").val(evt.latLng.lng().toFixed(6));

                    map.panTo(evt.latLng);
                });

                // centers the map on markers coords
                map.setCenter(vMarker.position);

                // adds the marker on the map
                vMarker.setMap(map);

            }
        }
    </script>
	<style>
		.modal-login {
			width: 320px;
			margin: 30px auto;
		}
		.modal-login .modal-content {
			border-radius: 1px;
			border: none;
		}
		.modal-login .modal-header {
			position: relative;
			justify-content: center;
			background: #f2f2f2;
		}
		.modal-login .modal-body {
			padding: 30px;
		}
		.modal-login .modal-footer {
			background: #f2f2f2;
		}
		.modal-login h4 {
			text-align: center;
			font-size: 26px;
		}
		.modal-login label {
			font-weight: normal;
			font-size: 13px;
		}
		.modal-login .form-control, .modal-login .btn {
			min-height: 38px;
			border-radius: 2px; 
		}
		.modal-login .hint-text {
			text-align: center;
		}
		.modal-login .close {
			position: absolute;
			top: 15px;
			right: 15px;
		}
		.modal-login .checkbox-inline {
			margin-top: 12px;
		}
		.modal-login .btn {
			min-width: 100px;
			background: #4ECDC4;
			border: none;
			line-height: normal;
		}
		.modal-login .btn:hover, .modal-login .btn:focus {
			background:#389e97;
		}
		.modal-login .hint-text a {
			color: #999;
		}
	</style>
</head>
<body onload="initialize();">
	<section class="intro">
		<div class="inner">
			<div class="content">
				<h1>E-KOS</h1>
				<h5>jl.Mulai aja dulu No.69</h5>
				<a class="btn_masuk" href="#myModal" data-toggle="modal">Login</a>
				<a class="btn_daftar" href="#myModals" data-toggle="modal">Regis</a>
			</div>
		</div>
	</section>
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">				
					<h4 class="modal-title">Login</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">				
					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" name="username" required="required">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" required="required">
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary pull-right" name="masuk" value="Login">
				</div>
			</form>
		<?php
		
			?>
		</div>
	</div>
</div>
<!-- Modal HTML -->
<div id="myModals" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">				
					<h4 class="modal-title">Registration</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">				
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" name="nama" required="required">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" class="form-control" name="alamat" required="required">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" name="email" required="required">
					</div>
					<div class="form-group">
						<label>Telpon</label>
						<input type="text" class="form-control" name="telp" required="required">
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" name="user" required="required">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="pass" required="required">
					</div>
					<p id="demo"></p>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary pull-right" name="daftar" value="Registration">
				</div>
			</form>
			<?php
        if(isset($_POST['daftar'])){
			$usrss=$_POST['user'];
			$cek = mysql_query("SELECT * FROM user WHERE username='$usrss'");
			if(mysql_num_rows($cek)>0){
				echo"<script>alert ('username $usrss sudah ada') </script>";
			}else{
				$nama=$_POST['nama'];
				$almt=$_POST['alamat'];
				$email=$_POST['email'];
				$tlp=$_POST['telp'];
				$usr=$_POST['user'];
				$pss=$_POST['pass'];
				$long=$_POST['longitude'];
				$lan=$_POST['latitude'];
				$no="2";
				$tambah=mysql_query("INSERT INTO user values('','$nama','$almt','$email','$tlp','$usr','$pss','$lan','$long','2')") ;
				if($tambah){
					echo"<script>alert ('Berhasil') </script>";
					echo"<meta http-equiv='refresh' content='0 url=index.php'>"; 
				}else{
					echo"<script>alert ('Gagal') </script>";
					echo"<meta http-equiv='refresh' content='0 url=index.php'>"; 
				}
			}
			
		}
		elseif(isset($_POST['masuk'])){
			$username=$_POST['username'];
			$password=$_POST['password'];
			$query=mysql_query("SELECT * FROM user WHERE username='$username' AND password='$password'");
			$baca=mysql_fetch_array($query);
			$dd=$baca['id_user'];
			$id=$baca['id_akses'];
			$nama=$baca['nama'];
			$user=$baca['username'];
			$pass=$baca['password'];
			$email=$baca['email'];
			$almt=$baca['alamat'];
			$tlp=$baca['telp'];
			if(!$baca){
				echo"<script>alert ('gagal login') </script>";
				echo"<meta http-equiv='refresh' content='0 url=index.php'>"; 
			}elseif($id == '1'){
				$_SESSION['idu']=$dd;
				$_SESSION['ida']=$id;
				$_SESSION['nm']=$nama;
				$_SESSION['usr']=$user;
				$_SESSION['pss']=$pass;
				$_SESSION['emel']=$email;
				$_SESSION['amlt']=$almt;
				$_SESSION['tlp']=$tlp;
				echo"<script>alert ('selamat datang $nama') </script>";
				echo"<meta http-equiv='refresh' content='0 url=admin/header.php'>";
			}elseif($id == '2'){
				$_SESSION['idu'] = $dd;
				$_SESSION['ida']=$id;
				$_SESSION['nm']=$nama;
				$_SESSION['usr']=$user;
				$_SESSION['pss']=$pass;
				$_SESSION['emel']=$email;
				$_SESSION['amlt']=$almt;
				$_SESSION['tlp']=$tlp;
				echo"<script>alert ('selamat datang $nama') </script>";
			    echo"<meta http-equiv='refresh' content='0 url=ankkos/header.php'>";
			}elseif($id == '3'){
				$_SESSION['idu'] = $dd;
				$_SESSION['ida']=$id;
				$_SESSION['nm']=$nama;
				$_SESSION['usr']=$user;
				$_SESSION['pss']=$pass;
				$_SESSION['emel']=$email;
				$_SESSION['amlt']=$almt;
				$_SESSION['tlp']=$tlp;
				echo"<script>alert ('selamat datang $nama') </script>";
				echo"<meta http-equiv='refresh' content='0 url=petugas/header.php'>";
			}
		}
      ?>
		</div>
	</div>
</div> 
</body>
</html>