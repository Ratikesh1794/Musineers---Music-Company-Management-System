<?php 


/*require_once('config/db.php');
$query = "select * from users";
$result = mysqli_query($con,$query);
*/

require_once 'config/db.php';
require_once 'config/functions.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="dashboard1.css">

	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="home.html" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">The Musineers</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="dashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="albums.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Albums</span>
				</a>
			</li>
			<li>
				<a href="songs.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Songs</span>
				</a>
			</li>
			<li>
				<a href="platforms.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Platforms</span>
				</a>
			</li>
			<li>
				<a href="artists.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Artists</span>
				</a>
			</li>
            <li>
				<a href="release_group.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Release Group</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="index.html" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bx-album' ></i>
					<span class="text">
						<h3><?php
						echo getalbumscount();
						?></h3>
						<p>Albums</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-music'></i>
					<span class="text">
						<h3><?php
						echo getsongscount();
						?></h3>
						<p>Songs</p>
					</span>
				</li>
				<li>
					<i class='bx bx-user' ></i>
					<span class="text">
						<h3><?php
						echo getartistscount();
						?></h3>
						<p>Artists</p>
					</span>
				</li>
			</ul>
			<ul class="box-info">
				<li>
					<i class='bx bxl-deezer'></i>
					<span class="text">
						<h3><?php
						echo getplatformcount();
						?></h3>
						<p>Platforms</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><h3><?php
						echo getreleasegroupscount();
						?></h3>
						<p>Release Groups</p>
					</span>
				</li>
			</ul>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script>
		const switchMode = document.getElementById('switch-mode');

		switchMode.addEventListener('change', function () {
			if(this.checked) {
				document.body.classList.add('dark');
			} else {
				document.body.classList.remove('dark');
			}
		})
		const menuBar = document.querySelector('#content nav .bx.bx-menu');
		menuBar.addEventListener('click', function () {
		sidebar.classList.toggle('hide');
		})
	</script>
</body>
</html>