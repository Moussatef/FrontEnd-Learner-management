<?php  include('server.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM personne WHERE ID_PERSON=$id");

			$n = mysqli_fetch_array($record);
		
            $name = $n['NOM'];
            $fname = $n['PRENOM'];
            $age = $n['AGE'];
            $email = $n['EMAIL'];
            $password = $n['PASSWORD'];
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<style>
</style>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Document</title>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<link rel="stylesheet" href="sass/styles.css">
	</head>
	<body>
		<header class="header">
			<a href="" class="logo">HOWARD</a>
			<input class="menu-btn" type="checkbox" id="menu-btn" />
			<label class="menu-icon" for="menu-btn"
				><span class="navicon"></span
			></label>
			<ul class="menu">
				<li><a href="#work">Logout</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#contact">Contact</a></li>
				<li><a href="#careers">Home</a></li>
			</ul>
		</header>
		<div class="pushDown"></div>
		<main>

			<div class="containerDash">
				<div class="sidebar">
				<ul>
				<li><a  href="#Messages"><img src="img/comment.png" alt="">Voir les messages</a></li>
				<li></li>
				<li></ul>
				</div>
		<div class="maincontent">
			<div class="adminDashtitle">

			<h1>Admin Dashboard</h1>	

			</div>
		<?php if (isset($_SESSION['message'])): ?>
	        <div class="msg">
                <?php 
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>
	<div class="aze">
		<div class="tables">
               <?php $results1 = mysqli_query($db, "SELECT * from personne inner join personne_etud on personne.ID_PERSON = personne_etud.ID_PERSON"); ?>
			   <h2 class="titles">Table des Etudiant</h2>
                <div class="tablewrapper">
                    <table>
                        <thead>
                            <tr>
							<th>Id</th>
                                <th>Name</th>
                                <th>First name</th>
                                <th id="show">Age</th>
                                <th  id="show">Email</th>
                                <th id="show">Password</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        
                        <?php while ($row1 = mysqli_fetch_array($results1)) { ?>
                            <tr>
								<td><?php echo $row1['ID_PERSON']; ?></td>
                                <td><?php echo $row1['NOM']; ?></td>
                                <td><?php echo $row1['PRENOM']; ?></td>
                                <td id="show"><?php echo $row1['AGE']; ?></td>
                                <td id="show"><?php echo $row1['EMAIL']; ?></td>
                                <td id="show"><?php echo $row1['PASSWORD']; ?></td>
                                <td>
                                    <a href="adminDash.php?edit=<?php echo $row1['ID_PERSON']; ?>" class="edit_btn" ><img width="20px" src="img/edit.png"></a>
                                </td>
                                <td>
                                    <a href="server.php?del=<?php echo $row1['ID_PERSON']; ?>" class="del_btn"><img width="20px" src="img/remove.png"></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
					<?php $results2 = mysqli_query($db, "SELECT * FROM personne INNER JOIN personne_formamteur ON personne.ID_PERSON = personne_formamteur.ID_PERSON"); ?>
			   <h2 class="titles">Table des Formateurs</h2>
                <div class="tablewrapper">
                    <table>
                        <thead>
                            <tr>
								<th>Id</th>
                                <th>Name</th>
                                <th>First nmae</th>
                                <th id="show">Age</th>
                                <th id="show">Email</th>
                                <th id="show">Password</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        
                        <?php while ($row2 = mysqli_fetch_array($results2)) { ?>
                            <tr>
							    <td><?php echo $row2['ID_PERSON']; ?></td>
                                <td><?php echo $row2['NOM']; ?></td>
                                <td><?php echo $row2['PRENOM']; ?></td>
                                <td id="show"><?php echo $row2['AGE']; ?></td>
                                <td id="show"><?php echo $row2['EMAIL']; ?></td>
                                <td id="show"><?php echo $row2['PASSWORD']; ?></td>
                                <td>
                                    <a href="adminDash.php?edit=<?php echo $row2['ID_PERSON']; ?>" class="edit_btn" ><img width="20px" src="img/edit.png"></a>
                                </td>
                                <td>
                                    <a href="server.php?del=<?php echo $row2['ID_PERSON']; ?>" class="del_btn"><img width="20px" src="img/remove.png"></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    </div>
		</div>
            <form id="adminform" method="post" action="server.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-group">
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo $name; ?>">
                </div>
                <div class="input-group">
                    <label>First name</label>
                    <input type="text" name="fname" value="<?php echo $fname; ?>">
                </div>
                <div class="input-group">
                    <label>Age</label>
                    <input type="text" name="age" value="<?php echo $age; ?>">
                </div>
                <div class="input-group">
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" value="<?php echo $password; ?>">
                </div>
				<div class="azerty input-group">
				    <?php $results4 = mysqli_query($db, "SELECT * FROM classe_etd"); ?>
							<label>classes :</label>
							<select id="selectA" name="classes">
							<?php while ($row4 = mysqli_fetch_array($results4)) { ?>
								
										<option value="<?php echo $row4['ID_CLASSE_ETD']; ?>"><?php echo $row4['NOM']; ?></option>
							<?php } ?>  
											</select>
					
				</div>

				<div class="radio input-group">
                    <label>Etudiant : <input onclick="classeShow()" class="radiobutton" type="radio" name="selection" checked value="etudiant"></label>
                    
					<label>Formateur : <input id="formateurRadio" onclick="classeShow()" class="radiobutton" type="radio" name="selection"  value="formateur"></label>
                </div>
				 
                <div class="input-group">
                <?php if ($update == true): ?>
                <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
                <?php else: ?>
                    <button class="btn" type="submit" name="save" >Save</button>
                <?php endif ?>
		        </div>
	        </form>
		</div>
		<?php $results3 = mysqli_query($db, "SELECT * FROM box_message"); ?>
		<div class="meessagesTitle">
			<h2 id ="Messages">Messages</h2>
		</div>
		<div class="messagesCards">
		<?php while ($row3 = mysqli_fetch_array($results3)) { ?>
			<div class="cards">
			<div class="isma">
			<div class="name"><?php echo $row3['Nom']; ?></div>
			<a href="server.php?delM=<?php echo $row3['id_Msg']; ?>" class="del_message del_btn"><img width="20px" src="img/remove.png"></a>
			</div>
				<div class="phone"><?php echo $row3['Telephpne']; ?></div>
				<div class="phone"><?php echo $row3['Email']; ?></div>
				<hr>
				<div class="msgC"><?php echo $row3['Message']; ?></div>
				<hr>
				<div class="date"><?php echo $row3['Date']; ?></div>
				
			</div>
			<?php } ?>
			
		</div>
	</div>
</div>
		</main>

		<!-- footer start -->
		<footer class="">
			<div class="footer">
				<div class="footer-section footer1">
					<img id="logo-footer" src="img/howard_social2.png" alt="logo" />
					<p>
							Find and Compare Great Car Deals. <br>
							Book with Confidence Create a Car <br>
							and Monitor Car Deals for Specific Travel Dates
					</p>
					<br />
					<a class="socials" href="#"
						><img src="img/facebook.png" alt=""
					/></a>
					<a class="socials" href="#"
						><img src="img/instagram.png" alt=""
					/></a>
					<a class="socials" href="#"
						><img src="img/linkedin.png" alt=""
					/></a>
					<a class="socials" href="#"
						><img src="img/Twitter.png" alt=""
					/></a>
				</div>
				<div class="footer-section footer2">
					<ul class="boxFooter">
						<h2>Product</h2>
						<li><a href="#">Theme Design</a></li>
						<li><a href="#">Plug in Design</a></li>
						<li><a href="#">WordPress</a></li>
						<li><a href="#">Some World</a></li>
						<li><a href="#">Contact Design</a></li>
					</ul>
				</div>
				<div class="footer-section footer3">
					<ul class="boxFooter">
						<h2>Useful links</h2>
						<li><a href="#">sponsors</a></li>
						<li><a href="#">Our Murch</a></li>
						<li><a href="#">Sales</a></li>
						<li><a href="#">Best Deals</a></li>
						<li><a href="#">Customer Service</a></li>
					</ul>
				</div>
				<div class="footer-section footer4">
					<ul class="boxFooter">
						<h2>Address</h2>
						<li><a href="#">127, DownTown</a></li>
						<li><a href="#">7D1F S2 Long Street</a></li>
						<li><a href="#">London</a></li>
						<li><a href="#">United kingdom</a></li>
					</ul>
				</div>
			</div>
			<div class="footer-bottom">
				All rights reserved &copy;copyrights 2021
			</div>
		</footer>

		<!-- footer end -->
		<script src="js/app.js"></script>
	</body>
</html>
