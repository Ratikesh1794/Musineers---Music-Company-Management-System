<?php
require_once 'config/db.php'; // Include your database connection file here

if (isset($_GET['add_songs'])) {
    $song_id = intval($_GET['song_id']); // Convert to integer
    $song_title = $_GET['song_title'];
    $duration = intval($_GET['duration']); // Convert to integer
    $album_id = intval($_GET['album_id']); // Convert to integer
    $platform_id = intval($_GET['platform_id']); // Convert to integer
    

    // Prepare and execute the INSERT query
    $insertQuery = "INSERT INTO song (song_id, song_title, duration, album_id, platform_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $con->prepare($insertQuery);
    $stmt->bind_param("isiii", $song_id, $song_title, $duration, $album_id, $platform_id); // "is" corresponds to integer and string
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Added Successfully"; // You can use this if you want to show a message after redirecting
        header("Location: songs.php"); // Replace "success_page.php" with the actual page you want to redirect to
        exit(); // Terminate the script after redirect
    } else {
        echo "Error adding platform: " . $stmt->error;
    }
    $stmt->close();
    $con->close();
}
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
					<h1>Add Song</h1>
                    <ul class="breadcrumb">
						<li>
							<a href="#">Add Song's Details</a>
						</li>
					</ul>
				</div>
			</div>
            <ul class="box-info">
                <li>
                    <section id="page-wrapper">
                        <div class="container">
                            <form class="form">
                                <div class="input-box">
                                    <h3>Songs ID</h3>
                                    <input type="text" name="song_id" required> <!-- Add the name attribute for email -->
                                </div>
                                
                                <div class="input-box">
                                    <h3>Title</h3>
                                    <input type="text" name="song_title" required> <!-- Add the name attribute for email -->
                                </div>
                                
                                <div class="input-box">
                                    <h3>Duration</h3>
                                    <input type="text" name="duration" required> <!-- Add the name attribute for email -->
                                </div>

                                <div class="input-box">
                                    <h3>Album ID</h3>
                                    <input type="text" name="album_id" required> <!-- Add the name attribute for email -->
                                </div>

                                <div class="input-box">
                                    <h3>Platform ID</h3>
                                    <input type="text" name="platform_id" required> <!-- Add the name attribute for email -->
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default" name="add_songs" value="add_songs" onclick="showSuccessPopup()">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
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
	<script>
		function showSuccessPopup() {
		alert("Added Successfully!");
		}

	</script>
</body>
</body>
</html>