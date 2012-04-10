<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta name="priceription"
	content="You can find everything in the olds days!">
<meta name="author" content="091250153">

<link rel="shortcut icon" href="assets/ico/favicon.ico">
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="assets/css/good-style.css" rel="stylesheet">
<link href="assets/css/shopping.css" rel="stylesheet">

<title>iShopping</title>
</head>

<body>
	<!-- nav bar -->
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse"
					data-target=".nav-collapse"> <span class="icon-bar"></span> <span
					class="icon-bar"></span> <span class="icon-bar"></span>
				</a> <a class="brand" href="#">iShopping</a>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<span id="select_category">All Categories</span>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li class="category"><a>All Categories</a></li>
								<li class="nav-header">Sub Category</li>
								<!-- select the category classes -->
								<?php
									include_once("dbcnt.php");
									$query = "select name from class";
									$result = mysql_query($query);
									ckquery($result);
									while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
										echo '<li class="category"><a>'. $row["name"]. ' Category</a></li>';
									}
								?>
							</ul>
						</li>
					</ul>
					
					<form class="nav navbar-search pull-left" action="">
						<input type="text" class="search-query span2" placeholder="Search">
						<button class="btn btn-inverse" type="submit">Search</button>
					</form>
					
					<ul class="nav pull-right">
						<li><a id="shopping-cart-btn"><i class="icon-shopping-cart icon-white"></i>ShoppingCart</a></li>
						<li class="divider-vertical"></li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-user icon-white"></i>
								<span id="user-info">
									<?php
										if (isset($_COOKIE["username"]))
											echo $_COOKIE["username"];
										else
											echo "User";
									?>
								</span>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a id="trigger-login-btn" data-toggle="modal" href="#login-model"><i class="icon-tag"></i>Log in</a>
								</li>
								<li>
									<a id="trigger-signup-btn" data-toggle="modal" href="#sign-up-model"><i class="icon-leaf"></i>Sign up</a>
								</li>
								<li>
									<a id="trigger-edit-btn" data-toggle="modal" href="#edit-model"><i class="icon-pencil"></i>Edit</a>
								</li>
								<li>
									<a id="trigger-logout-btn"><i class="icon-off"></i>Log out</a>
								</li>
								<li id="user-info-split" class="divider"></li>
								<li>
									<a id="trigger-delete-btn" data-toggle="modal" href="#delete-model"><i class="icon-trash"></i>Delete</a>
								</li>
							</ul>
						</li>
					</ul>
				</div><!-- end of nav-collapse -->
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row-fluid">
			<div class="span3">
				<!-- the announcement board -->
					<div class="well sidebar-nav">
						<article>
							<header>
								<h3 class="blue-white-header center-text">Announcement</h3>
							</header>
							<p class="center-text">A good in need is a good indeed. Enjoy the shopping time.</p>
							<hr />
							<p class="right-text">--iShopping</p>
						</article>
					</div>
				<!-- end of the announcement board -->
				<!-- the category board -->
					<div class="well sidebar-nav">
						<article>
							<header>
								<h3 class="blue-white-header center-text">Categories</h3>
							</header>
							<ul class="nav nav-list best-sales-list">
							<?php
								include_once("dbcnt.php");
								$query = "select name from class";
								$class_result = mysql_query($query);
								while ($class_row = mysql_fetch_array($class_result, MYSQL_ASSOC)) {
									echo '<li><a class="border-radius5" href="#' . $class_row["name"]. '"><i class="icon-tags"></i>';
									echo $class_row["name"]. '</a></li>';	
								}
							?>
							</ul>
						</article>
					</div>
				<!-- the end of category board -->
				<!-- the best sales board -->
					<div class="well sidebar-nav">
						<article>
							<header>
								<h3 class="blue-white-header center-text">Best Sales</h3>
							</header>
							<ul class="nav nav-list best-sales-list">
								<?php
									include_once("dbcnt.php");
									$query = "select sum(s.number) as total, g.name, g.gid from sale as s join goods as g where s.gid=g.gid group by s.gid order by total desc";
									$result = mysql_query($query);
									
									while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
										echo '<li><a class="border-radius5" href="#'. $row["gid"]. '"><i class="icon-tag"></i>'. $row["name"]. '</a></li>';
									}
								?>
							</ul>
						</article>
					</div>
				<!-- the end of best sales board -->
				<!-- the leave message board -->
					<div class="well sidebar-nav">
						<article>
							<header>
								<h3 class="blue-white-header center-text">Messages</h3>
							</header>
							<ul class="nav nav-list best-sales-list" style="border-radius: 10px; display:block;">
								<li><a class="border-radius5" href="#"><i class="icon-tag"></i>Test text</a></li>
								<li><a class="border-radius5" href="#"><i class="icon-tag"></i>Test text</a></li>
								<li><a class="border-radius5" href="#"><i class="icon-tag"></i>Test text</a></li>
								<li><a class="border-radius5" href="#"><i class="icon-tag"></i>Test text</a></li>
								<li><a class="border-radius5" href="#"><i class="icon-tag"></i>Test text</a></li>
								<li><a class="border-radius5" href="#"><i class="icon-tag"></i>Test text</a></li>
								<li><a class="border-radius5" href="#"><i class="icon-tag"></i>Test text</a></li>
								<li><a class="border-radius5" href="#"><i class="icon-tag"></i>Test text</a></li>
								<li><a class="border-radius5" href="#"><i class="icon-tag"></i>Test text</a></li>
								<li><a class="border-radius5" href="#"><i class="icon-tag"></i>Test text</a></li>
							</ul>
						</article>
					</div>
				<!-- end of the leave message board -->
			</div>
			<!-- end of left column -->
			<!-- the right column -->
			<div class="span9">
				<div class="well sidebar-nav">
				<!-- the new goods -->
					<div class="progress progress-success progress-striped" style="height:25px;">
						<div class="bar good-title" style="width:100%; height:100%;">New Goods on Shelf</div>
					</div>
					<ul class="thumbnails">
						<li class="span5">
							<!-- the carousel board -->
							<div id="myCarousel" class="carousel slide">
								<div class="carousel-inner border-radius5">
									<div class="item active">
										<a class="zelda">
											<img alt=""
												src="assets/img/twilight_princess1.jpg">
											<div class="carousel-caption">
												<h4>Twilight Princess</h4>
												<p>The story focuses on series protagonist Link, who tries to prevent Hyrule from being 
												engulfed by a corrupted parallel dimension known as the Twilight Realm. </p>
											</div>
										</a>
									</div>
									<div class="item">
										<a class="zelda">
											<img alt=""
												src="assets/img/twilight_princess2.jpg">
											<div class="carousel-caption">
												<h4>Twilight Princess</h4>
												<p>Twilight Princess is an action-adventure game focusing on exploration and item collection.</p>
											</div>
										</a>
									</div>
									<div class="item">
										<a class="zelda">
											<img alt=""
												src="assets/img/twilight_princess3.jpg">
											<div class="carousel-caption">
												<h4>Twilight Princess</h4>
												<p>The story takes place centuries after Ocarina of Time and Majora's Mask, and begins with Link as a 
												young adult working as a ranch hand in Ordon Village. One day, the village is attacked by monsters...</p>
											</div>
										</a>
									</div>
								</div>
								<a class="left carousel-control" data-slide="prev" href="#myCarousel">‹</a>
								<a class="right carousel-control" data-slide="next" href="#myCarousel">›</a>
							</div>
							<!-- end of carousel board -->
						</li>
						<li class="span2">
							<a class="zelda"><img class="border-radius5 side-new-good" width=213 alt="" src="assets/img/twilight_princess1.jpg"></a>
						</li>
						<li class="span2">
							<a class="zelda"><img class="border-radius5" width=213 alt="" src="assets/img/twilight_princess2.jpg"></a>
						</li>
					</ul>
				<!-- end of the new goods -->
				<!-- goods board, include food, cloth and toy goods board -->
					<?php
						include_once("dbcnt.php");
						$progress_style = array('progress-warning', '', 'progress-danger');
						$border_style = array('javascript', 'python', 'java', 'ruby', 'shell', 'scala');
						
						$query = "select name from class";
						$class_result = mysql_query($query);
						$class_count = 0;
						while ($class_row = mysql_fetch_array($class_result, MYSQL_ASSOC)) {
							echo '<div id="'. $class_row["name"]. '" class="progress '. $progress_style[$class_count++ % 3]. ' progress-striped" style="height: 25px;">';
							echo '<div class="bar good-title" style="width: 100%; height: 100%;">'. ucfirst($class_row["name"]). '</div>';
							echo '</div>';
							$query = "select g.gid, g.name, g.price, g.img from goods as g join class as c on g.cid = c.cid where c.name='". $class_row["name"]. "'";
							$result = mysql_query($query);
							ckquery($result);
							for ($i = 0; $row = mysql_fetch_array($result, MYSQL_ASSOC); $i++) {
								if ($i % 3 == 0) {
									if ($i == 0)
										echo '<div class="row-fluid">';
									else
										echo '</div><div class="row-fluid">';
								}
								echo '<div class="good-block '. $border_style[$i % 6]. ' span4">';
								echo '<a id="'. $row["gid"]. '" >';
								echo '<h2 class="good-style">'. $row["name"]. '</h2>';
								echo '<h3>Price: $'. $row["price"]. '</h3>';
								echo '<img alt='. $row["name"]. ' src='. $row["img"]. '>';
								echo '</a>';
								echo '</div>';
							}
							echo '</div>';
						}
					?>
				<!-- end of goods board -->
				</div>
			</div>
			<!-- end of right column -->
			<footer class="copyright">
				<div class="progress progress-striped active">
					<div class="bar" style="width: 100%;">This is the homework drafted by NJU 091250153 WangChao.</p></div>
				</div>
			</footer>
		</div>
		
<!-- login board -->
<div class="modal hide fade" style="display: none;" id="login-model">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>User Login</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="user-name">User Name:</label>
				<div class="controls">
    				<input id="user-name" type="text" class="input-medium search-query">
    			</div>
    		</div>
    		<div class="control-group">
    			<label class="control-label" for="password">Password :</label>
    			<div class="controls">
    				<input id="password" type="password" class="input-medium search-query">
    			</div>
    		</div>
    	</form>
    	<div class="control-group error">
    			<label style="margin-left: 65px;" id="login-message" class="control-label"></label>
		</div>
	</div>
	<div class="modal-footer">
		<a class="btn" data-dismiss="modal" href="#">Cancel</a>
		<a id="login-button" class="btn btn-primary">Login</a>
	</div>
</div>
<!-- end of login board -->
<!-- sign up board -->
<div class="modal hide fade" style="display: none;" id="sign-up-model">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>User Sign Up</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="sign-up-user-name">User Name:</label>
				<div class="controls">
    				<input id="sign-up-user-name" type="text" class="input-medium search-query">
    			</div>
    		</div>
    		<div class="control-group">
    			<label class="control-label" for="sign-up-password">Password :</label>
    			<div class="controls">
    				<input id="sign-up-password" type="password" class="input-medium search-query">
    			</div>
    		</div>
    		<div class="control-group">
    			<label class="control-label" for="verify-sign-up-password">V-Password :</label>
    			<div class="controls">
    				<input id="verify-sign-up-password" type="password" class="input-medium search-query">
    			</div>
    		</div>
    	</form>
    	<div class="control-group error">
    			<label style="margin-left: 65px;" id="sign-up-message" class="control-label"></label>
		</div>
	</div>
	<div class="modal-footer">
		<a class="btn" data-dismiss="modal" href="#">Cancel</a>
		<a id="sign-up-button" class="btn btn-primary">Sign Up</a>
	</div>
</div>
<!-- end of sign up board -->
<!-- edit user info board -->
<div class="modal hide fade" style="display: none;" id="edit-model">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Edit User Info</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal">
    		<div class="control-group">
    			<label class="control-label">New Password :</label>
    			<div class="controls">
    				<input id="new-password" type="password" class="input-medium search-query">
    			</div>
    		</div>
    		<div class="control-group">
    			<label class="control-label">VNew Password :</label>
    			<div class="controls">
    				<input id="new-vpassword" type="password" class="input-medium search-query">
    			</div>
    		</div>
    	</form>
    	<div class="control-group error">
    			<label style="margin-left: 65px;" id="edit-message" class="control-label"></label>
		</div>
	</div>
	<div class="modal-footer">
		<a class="btn" data-dismiss="modal" href="#">Cancel</a>
		<a id="save-button" class="btn btn-primary">Save Changes</a>
	</div>
</div>
<!-- end of edit user info board -->
<!-- delete user board -->
<div class="modal hide fade" style="display: none;" id="delete-model">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Delete User</h3>
	</div>
	<div class="modal-body">
    	<div class="control-group error">
    		<label style="margin-left: 65px;" id="edit-message" class="control-label">Are you sure to delete your account?</label>
		</div>
	</div>
	<div class="modal-footer">
		<a class="btn" data-dismiss="modal" href="#">Cancel</a>
		<a id="delete-button" class="btn btn-primary">Delete</a>
	</div>
</div>
<!-- end of delete user board -->
<!-- good detail board -->
<div class="modal hide fade" style="display: none;" id="good-model">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3 id="title">Buy Goods</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="good-block javascript span5">
				<a id="">
					<h2 id="goods-name" class="good-style"></h2>
					<h3 id="goods-price"></h3>
					<img id="goods-img" src="" alt="">
				</a>
			</div>
			
			<div class="span6">
				<div class="control-group success">
					<label class="control-label" id="goods-number"></label>
				</div>
				<div class="control-group warning">
					<label class="control-label">Description: </label>
					<label class="control-label" id="goods-description"></label>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<a class="btn" data-dismiss="modal" href="#">Cancel</a>
		<a id="goods-buy-button" class="btn btn-primary">Add to Cart</a>
	</div>
</div>
<!-- end of good detail board -->
<!-- shopping cart -->
<div class="modal hide fade" style="display: none;" id="shopping-cart-modal">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3 id="title">Shopping Cart</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid" id="shopping-cart-content">

		</div>
	</div>
	<div class="modal-footer">
		<a class="btn" data-dismiss="modal" href="#">Cancel</a>
		<a id="cart-buy-button" class="btn btn-primary">Buy</a>
	</div>
</div>
<!-- end of the shopping cart -->
<a id="backtotop" href="#"></a>

	<!-- javascript files, placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery-1.7.2.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
	<script src="assets/js/shopping.js"></script>
</body>

</html>