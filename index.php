	<?php 
		include("includ_html/hedar.php");
	?>
		<div class="pushDown"></div>
		<main>
			<div class="container">
				<div class="box box1">
					<h1>Welcome to HOWARD UNIVERSITY</h1>
					<p>Lorem ipsum, dolor sit amet consectetur 
						adipisicing elit. Tempore nobis nihil aspernatur 
						recusandae quam iure et?
					</p>

					<?php if(!empty($_SESSION['ID_FRM']) || !empty($_SESSION['ID_ETD']) || !empty($_SESSION['ID_ADM'])){ ?>
                         <p>Read more about HOWARD university</p>
				<?php }else {
				?>
				<button class="buttonHome"><a style="text-decoration:none;" href="page_login.php">Login</a></button>
				<?php } ?>
				</div>
				<div class="box box2"><img class="home" src="img/home.png" alt=""></div>	
			</div>
				<div class="sebarator">
					<h1>Read more about HOWARD university</h1>
				</div>
	

					 <div class="wrapperCards">
					 <div class="containerA">
						<img src="img/education.png" alt="Avatar" class="image">
						<div class="overlay">
						  <div class="text">
							<h2>Best university in north america</h2>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
								 Dolorum hic veniam culpa. Fuga libero nostrum ab vitae doloribus, 
								 ipsa illum voluptate laborum, nesciunt 
								 amet vero dolorum esse rerum est explicabo!</p>
						  </div>
						</div>
					  </div>
					  <div class="containerA">
						<img src="img/imagination.png" alt="Avatar" class="image">
						<div class="overlay">
						  <div class="text">
							<h2>Best university in north america</h2>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
								 Dolorum hic veniam culpa. Fuga libero nostrum ab vitae doloribus, 
								 ipsa illum voluptate laborum, nesciunt 
								 amet vero dolorum esse rerum est explicabo!</p>
						  </div>
						</div>
					  </div>
					  <div class="containerA">
						<img src="img/phisics.png" alt="Avatar" class="image">
						<div class="overlay">
						  <div class="text">
							<h2>Best university in north america</h2>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
								 Dolorum hic veniam culpa. Fuga libero nostrum ab vitae doloribus, 
								 ipsa illum voluptate laborum, nesciunt 
								 amet vero dolorum esse rerum est explicabo!</p>
						  </div>
						</div>
					  </div>
					  <div class="containerA">
						<img src="img/teacher.png" alt="Avatar" class="image">
						<div class="overlay">
						  <div class="text">
							<h2>Best university in north america</h2>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
								 Dolorum hic veniam culpa. Fuga libero nostrum ab vitae doloribus, 
								 ipsa illum voluptate laborum, nesciunt 
								 amet vero dolorum esse rerum est explicabo!</p>
						  </div>
						</div>
					  </div>
					</div>
		</main>

		<?php include("includ_html/footer_html.php"); ?>
