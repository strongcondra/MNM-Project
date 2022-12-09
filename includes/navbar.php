<?php !function_exists("is_authenticated") && exit(); ?>
<nav class="main-header navbar navbar-expand 0 navbar-light bg-white border-bottom">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="<?= $base_url; ?>dashboard.php" class="nav-link">Dashboard</a>
		</li>
	</ul>
	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
			<img src="images/avatar_default.png" class="brand-image mx-2 img-circle elevation-2" alt="User Image">
			<i class="fa fa fa-angle-down"></i> <?= $_SESSION['owner_name']; ?>
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="<?= $base_url; ?>profile.php" class="dropdown-item"> 
					<i class="fa fa-user mr-2"></i> Profile 
				</a>
				<div class="dropdown-divider"></div>
				<a href="<?= $base_url; ?>logout.php" class="dropdown-item">
					<i class="fa fa-envelope mr-2"></i> Logout
				</a>
			</div>
		</li>
	</ul>
</nav>