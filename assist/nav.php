
<!--start navbar -->

<?php

if(!empty($_COOKIE['_aid_']))
{

	$menu = '
			<li class="nav-item  ml-2 dropdown" ><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><img src="http://localhost/college_project/images/profile/'.$pic.'" width="40" height="40" style="border-radius:50%;margin-top:-10px;"> <span class="d-lg-none">&nbsp; '.$fullname.'</span></a>
			<div class="dropdown-menu bg-white">
				<a href="http://localhost/college_project/pages/profile.php" class="dropdown-item text-secondary"><i class="fa fa-edit" ></i> Profile</a>
				<a href="#" class="dropdown-item text-secondary" ><i class="fa fa-book"></i> My books</a>
				<a href="#" class="dropdown-item text-secondary" ><i class="fa fa-file-pdf-o"></i> Manage E-Books</a>
				<a href="#" class="dropdown-item text-secondary" ><i class="fa fa-comments-o"></i> Chat</a>
				<a href="#" class="dropdown-item text-secondary" ><i class="fa fa-tachometer"></i> Dashborad</a>
				<a href="http://localhost/college_project/pages/logout.php" class="dropdown-item text-secondary" ><i class="fa fa-sign-out"></i> Logout</a>
				
			</div>
		</li>
	';
}
else
{
	$menu = '
			<li class="nav-item  ml-2 dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" style="font-size: 18px"></i> <span class="d-lg-none">&nbsp; User</span></a>
			<div class="dropdown-menu">
				<a href="http://localhost/college_project/pages/login.php" class="dropdown-item">Login / Register</a>
				
			</div>
		</li>
	';
}
?>
<navbar>
<div class="shadow-sm mb-2">
<div class="container bg-white">
<nav class="navbar navbar-expand-lg navbar-light bg-white ">
	<a href="http://localhost/college_project/" class="navbar-brand">
		<img src="http://localhost/college_project/images/logo.svg" width="180" class="pt-1">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
    <span class="navbar-toggler-icon"></span>
  </button>
	<div class="collapse navbar-collapse" id="menu">
	<ul class="navbar-nav mr-auto w-100 mt-2">
		<li class="nav-item  ml-2 d-none d-lg-block">
			<a href="http://localhost/college_project/pages/sell.php" class="nav-link mt-1 shadow-sm" style="background: #00D07E;color: #fff;padding-top:-2px; ">
				SELL BOOK  <i class="fa fa-camera"></i>&nbsp;
			</a>
		</li>
		<li class="d-lg-block d-none"></li>
		<li class="nav-item  ml-lg-auto mt-1">
			<form action="http://localhost/college_project/pages/search.php" method="get">
			<div class="input-group">
			<input type="text" name="search" class="form-control" placeholder="search">
			<button class="input-group-append btn text-secondary border" style="border-radius: 0px 5px 5px 0px;"><i class="fa fa-search mt-1" ></i></button>
			</div>
			</form>
		</li>
		
		<br class="d-lg-none">
		<li class="nav-item  ml-2">
			<a href="http://localhost/college_project/pages/my_cart.php" class="nav-link">
				<i class="fa fa-cart-plus position-relative" style="font-size: 18px">
				<div style="position: absolute;top: -15px;right:-15px;color:white;background:red;font-weight: bold;width: 18px;height: 18px;border-radius: 50%;text-align: center;" class="cart-count ">2</div>
				</i>
				<span class="d-lg-none">&nbsp;&nbsp; CART</span>
			</a>
		</li>

		<li class="nav-item  ml-2 "><a href="#" class="nav-link"><i class="fa fa-bell-o position-relative" style="font-size: 18px">
			<div style="position: absolute;top: -15px;right:-15px;color:white;background:red;font-weight: bold;width: 18px;height: 18px;border-radius: 50%;text-align: center;" class="notification-count ">2</div>
		</i><span class="d-lg-none">&nbsp;&nbsp; NOTIFICATION</span></a></li>
		<?php echo $menu;?>
		
	</ul>
	</div>
</nav>
</div>
</div>
</navbar>

<!-- end nav bar-->