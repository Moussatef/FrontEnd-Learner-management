<?php  include('TeacherApp.php'); ?>
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
				<li></li>
				<li></ul>
				</div>
		<div class="maincontent">
			<div class="adminDashtitle">

			<h1>Formateur Dashboard</h1>	
			</div>
			<div class="teachercardWrapper">
			<div class="drop teachercard">
				
			</div>
			<div class="drop teachercard">
				
			</div>
			<?php $idF =  $_SESSION['ID_FRM']?>
			<?php  $identifiant=$_SESSION['ID_FRM'];?>
			<?php $results3 = mysqli_query($db, "SELECT NOM FROM `classe_etd` WHERE classe_etd.ID_FORMATEUR ='$identifiant'");
			$row3 = mysqli_fetch_array($results3);
			$className = $row3['NOM']; ?>
			<div class ="teachercard">
				<h2><?php echo $_SESSION['Full_Name'];?></h2>
				<h3><?php echo $className; ?></h3>
			</div>
			</div>
				<?php $results2 = mysqli_query($db, "SELECT personne.ID_PERSON,personne.NOM,personne.PRENOM,personne.AGE,personne.EMAIL,personne.PASSWORD FROM personne INNER JOIN personne_etud ON personne.ID_PERSON = personne_etud.ID_PERSON INNER JOIN classe_etd ON personne_etud.ID_ClasseETD = classe_etd.ID_CLASSE_ETD WHERE classe_etd.ID_FORMATEUR='$idF'"); ?>
				<div class="tableWrapperT">
				<h2 class="titles">Table de vos etudiants</h2>
				<table>
                        <thead>
                            <tr>
								<th>Id</th>
                                <th>Name</th>
                                <th>First nmae</th>
                                <th id="show">Age</th>
                                <th id="show">Email</th>
                                <th id="show">Password</th>
                                <th></th>
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
                            </tr>
                        <?php } ?>
                    </table>
				</div>
				<div class="actionsWrapper">
				<form id="formT" method="post" action="server.php">
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
				 
                <div class="input-group">
                <?php if ($update == true): ?>
                <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
                <?php else: ?>
                    <button class="btn" type="submit" name="save" >Save</button>
                <?php endif ?>
		        </div>
	        </form>
			<div class="mlkj">
			<div class="input-group">
			<?php $results7 = mysqli_query($db, "SELECT personne.ID_PERSON,personne.NOM,personne.PRENOM,personne.AGE,personne.EMAIL,personne.PASSWORD FROM personne INNER JOIN personne_etud ON personne.ID_PERSON = personne_etud.ID_PERSON INNER JOIN classe_etd ON personne_etud.ID_ClasseETD = classe_etd.ID_CLASSE_ETD WHERE classe_etd.ID_FORMATEUR='$idF'"); ?>
                    <label>Identifiant des etudiants : </label>
                    <select class="idsStudents" name="studentsIds">
					<?php while ($row7 = mysqli_fetch_array($results7)) { ?>
								<option value="<?php echo $row7['ID_PERSON']; ?>"><?php echo $row7['ID_PERSON']; ?></option>
					<?php } ?> 
					</select>
                </div>
				<?php $results8 = mysqli_query($db, "SELECT * FROM module"); ?>
				<div class="input-group">
                    <label>Module :</label>
                    <select class="idsStudents" name="studentsIds">
					<?php while ($row8 = mysqli_fetch_array($results8)) { ?>
								<option value="<?php echo $row8['ID_MODULE']; ?>"><?php echo $row8['NOM_MODULE']; ?></option>
					<?php } ?> 
					</select>
                </div>
				<div class="input-group">
                    <label>Note : </label>
					<input type="text" name="note" id="noteStudent">
                </div>
				<div class="tableNote">
					<table id="table123">
                        <thead>
                            <tr>
								<th>Id</th>
                                <th>Name</th>
								<th>Langues de conception</th>
								<th>Algorithme</th>
								<th>POO</th>
                            </tr>
                        </thead>
                        
                        
                            <tr>
							    <td>11</td>
                                <td> moussetef</td>
                                <td>13</td>
                                <td>16</td>
                                <td>18</td>
                            </tr>
							<tr>
							    <td>12</td>
                                <td> Mnifil</td>
                                <td>13</td>
                                <td>16</td>
                                <td>18</td>
                            </tr>
							<tr>
							    <td>14</td>
                                <td> Youssef</td>
                                <td>13</td>
                                <td>16</td>
                                <td>18</td>
                            </tr>
							<tr>
							    <td>15</td>
                                <td> Youssef</td>
                                <td>13</td>
                                <td>16</td>
                                <td>18</td>
                            </tr>
							<tr>
							    <td>16</td>
                                <td> Youssef</td>
                                <td>13</td>
                                <td>16</td>
                                <td>18</td>
                            </tr>
                    </table>
				</div>
			</div>
			</div>
		</div>
		
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
