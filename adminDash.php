
<?php 
    $_SESSION['LogOut']='adminDash.php?logout=1';
	$_SESSION['Profil']='adminDash.php';
    include("includ_html/hedar.php");
	include('server.php');
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
                                    <a href="adminDash.php?edit=<?php echo $row1['ID_PERSON']; ?>" class="edit_btn" ><img width="30px" src="img/edit.png"></a>
                                </td>
                                <td>
                                    <a href="server.php?del=<?php echo $row1['ID_PERSON']; ?>" class="del_btn"><img width="30px" src="img/remove.png"></a>
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
                                    <a href="adminDash.php?edit=<?php echo $row2['ID_PERSON']; ?>" class="edit_btn" ><img width="30px" src="img/edit.png"></a>
                                </td>
                                <td>
                                    <a href="server.php?del=<?php echo $row2['ID_PERSON']; ?>" class="del_btn"><img width="30px" src="img/remove.png"></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    </div>
		</div>
            <form method="post" action="server.php">
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
				
				<div class=" radio input-group">
                    <label>Etudiant : <input class="radiobutton" type="radio" id="etd_s" onclick="check_c()" name="selection" checked value="etudiant"></label>
                    
					<label>Formateur : <input class="radiobutton" type="radio" name="selection" onclick="check_c()"  value="formateur"></label>
                    
                </div>

				<div class="input-group" id="select_C">
                    <label>Class</label>
                    <select name="classe_ETD" >
						<?php $record2 = mysqli_query($db, "SELECT * FROM classe_etd "); while($row4 = mysqli_fetch_array($record2)){ ?>
						<option value="<?php echo $row4['ID_CLASSE_ETD'] ; ?>"><?php echo $row4['NOM'] ; ?></option>
						<?php } ?>
					</select>
                </div>
				<script>
					let select_c = document.getElementById("select_C");
					let etd_s = document.getElementById("etd_s");
					function check_c(){
						if(etd_s.checked==false){
						select_c.style.display='none';
					}else{
						select_c.style.display='block';

					}
					}
				</script>
				 
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
			<div class="name"><?php echo $row3['Nom']; ?></div>
				<div class="phone"><?php echo $row3['Telephpne']; ?></div>
				<div class="phone"><?php echo $row3['Email']; ?></div>
				<hr>
				<div class="msgC"><?php echo $row3['Message']; ?></div>
				<hr>
				<div class="date"><?php echo $row3['Date']; ?></div>
				<a  href="server.php?delM=<?php echo $row3['id_Msg']; ?>" class="del_message del_btn"><img width="30px" src="img/remove.png"></a>
			</div>
			<?php } ?>
			
		</div>
	</div>
</div>
		</main>
		<?php include("includ_html/footer_html.php"); ?>