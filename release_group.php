<?php 


/*require_once('config/db.php');
$query = "select * from users";
$result = mysqli_query($con,$query);
*/

require_once 'config/db.php';
require_once 'config/functions.php';

$result5 = dispaly_release_group();


if (isset($_GET['delete'])) {
    $deletereleaseID = $_GET['delete'];
    delete_release($deletereleaseID); // Assuming you have a function to delete the song in your functions.php
    header("Location: release_group.php"); // Redirect back to the same page after deletion
}

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $result5 = search_release_groups($searchTerm);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
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
			<li>
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
            <li  class="active">
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
			<form></form>
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
							<a class="active" href="release_group.php">Release Group</a>
						</li>
					</ul>
				</div>
			</div>


            <!-- ALbums Table -->
            <div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Release Group</h3>
						<form method="GET">
							<div class="search-box">
								<input type="text" name="search" placeholder="Search release groups">
								<button type="submit" class="btn btn-primary"><i class='bx bx-search'></i></button>
							</div>
                    	</form>
						<!-- <i class='bx bx-filter' ></i> -->
					</div>
                    <div class="container1">
                        <div class="row">
                            <div class="col m-auto">
                                <div class="row mt-5">
                                    <div class="card mt-5">
                                        <table class="table table-bordered">
                                            <thread>
                                                <tr>
                                                    <td> Release Group ID </td>
                                                    <td> Release Group names </td>
                                                    <!-- <td> Edit  </td>
                                                    <td> Delete </td> -->
                                                </tr>
                                            </thread>
                                            <?php 
                                                    
                                                    while($row=mysqli_fetch_assoc($result5))
                                                    {
                                                        $ReleaseID = $row['release_id'];
                                                        $ReleaseName = $row['re_name'];
                                            ?>
                                                    <tr>
                                                        <td><?php echo $ReleaseID ?></td>
                                                        <td><?php echo $ReleaseName ?></td>
                                                        <!-- <td><a href="#" class="btn btn-primary">Edit</a></td> -->
                                                        <td><a href="?delete=<?php echo $ReleaseID; ?>" class="btn btn-danger">Delete</a></td>
                                                    </tr> 
                                            <?php 
                                                    }  
                                            ?>                                                                  
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<br>
					<a href="add_release_group.php">
						<i class='bx bx-add-to-queue'></i>
					<span class="text">ADD</span>
					</a>
                </div>
            </div>



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