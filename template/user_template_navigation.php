<div class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">CV Inti Roll</a>
		</div>

		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">

				<!-- highlight if $page_title has 'Products' word. -->
				<li class=<?php echo (isset($page_url) && $page_url === 'list_product') ? "active": "";?>>
					<a href="index.php" class="dropdown-toggle">Daftar Produk</a>
				</li>

				<li class=<?php echo (isset($page_url) &&  $page_url === 'list_order') ? "active": "";?>>
					<a href="cart.php">
						Daftar Belanja <span class="badge" id="comparison-count"><?php echo count( $_SESSION['cart'])?></span>
					</a>
				</li>
				<?php   
					if (isset($_SESSION['status_login']) && isset($_SESSION['username'])){ ?>
				<li class=<?php echo (isset($page_url) &&  $page_url === 'history_order') ? "active": "";?>>
					<a href="v_history_order.php">
						History Order  
					</a>
				</li>
				<?php }?>
				<li>
					
					
					<?php   
					if (isset($_SESSION['status_login']) && isset($_SESSION['username'])){ ?>
						<a class="left" href="logout.php">Hai <?php echo $_SESSION['username'];?>,logout</a>
					<?php }else{?>
						<a class="left" href="login.php">Login</a>
					<?php }?>
					
				</li>
			</ul>

		</div><!--/.nav-collapse -->

	</div>
</div>