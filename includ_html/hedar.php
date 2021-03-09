<?php 
session_start();
  if(isset($_GET['logout'])){
    unset($_SESSION['ID_ETD']); unset($_SESSION['Email_ETD']);unset($_SESSION['ID_ADM']);unset($_SESSION['ID_FRM']);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<title>Document</title>
		<link rel="stylesheet" href="sass/navbar.css" />
		<link rel="stylesheet" href="sass/footer.css">
        <link rel="stylesheet" href="sass/main.css">
        
        <?php if($_SERVER['REQUEST_URI'] == "/brief4/Etudiant_pg.php?dash=0" || $_SERVER['REQUEST_URI'] == "/brief4/Etudiant_pg.php?dash=1" || $_SERVER['REQUEST_URI'] == "/brief4/Etudiant_pg.php?dash=2" || $_SERVER['REQUEST_URI'] == "/brief4/Etudiant_pg.php"){ ?>
        <link rel="stylesheet" href="sass/Etudiant_sass.css">
        <?php }elseif($_SERVER['REQUEST_URI'] == "/brief4/page_login.php"){ ?>
        <link rel="stylesheet" href="sass/Style_Login.css">
        <?php }elseif($_SERVER['REQUEST_URI'] == "/brief4/Page_contactUS.php"){ ?>
        <link rel="stylesheet" href="sass/contactStyle.css">
        <?php }elseif($_SERVER['REQUEST_URI'] == "/brief4/adminDash.php"){ ?>
        <link rel="stylesheet" href="sass/adminDash.css">
        <?php } ?>
	</head>
	<body>
		<header class="header">
			<a href="" class="logo">HOWARD</a>
			<input class="menu-btn" type="checkbox" id="menu-btn" />
			<label class="menu-icon" for="menu-btn"
				><span class="navicon"></span
			></label>
			<ul class="menu">
                <?php if(!empty($_SESSION['ID_FRM']) || !empty($_SESSION['ID_ETD']) || !empty($_SESSION['ID_ADM']) ){ ?>
                    <li><a href="<?php echo $_SESSION['LogOut']; ?>"  >Logout</a></li>
                    <li><a href="<?php echo $_SESSION['Profil']; ?>">Profile</a></li>
                    <?php } else { ?>
				<li><a href="page_login.php">Login</a></li>
                <?php } ?>
				<li><a href="Page_contactUS.php">Contact Us</a></li>
				<li><a href="index.php">HOME</a></li>
			</ul>
		</header>