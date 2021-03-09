<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'brief4_conception');

	// initialize variables
    $id = 0;
	$name = "";
	$fname = "";
    $age = "";
    $email = "";
    $password = "";
	$update = false;

	if (isset($_POST['save'])) {
        $name =  $_POST['name'];
        $fname =  $_POST['fname'];
        $age =  $_POST['age'];
        $email =  $_POST['email'];
        $password =  $_POST['password']; 
        $answer = $_POST['selection'];
        $idclassEtudiant=$_POST['classes'];
         if ($answer == "etudiant") {       
                mysqli_query($db, "INSERT INTO personne (NOM, PRENOM, AGE, EMAIL, PASSWORD) VALUES ('$name', '$fname','$age', '$email','$password')");
                $results_etd=mysqli_query($db,"SELECT ID_PERSON FROM personne ORDER BY ID_PERSON DESC LIMIT 1");
                $temp = mysqli_fetch_array($results_etd);
                $idPersonne =$temp['ID_PERSON'];
                mysqli_query($db, "INSERT INTO personne_etud (ID_PERSON, ID_ClasseETD) VALUES ('$idPersonne' , '$idclassEtudiant')"); 
                $_SESSION['message'] = "Etudiant sauvegardé avec succès";
                header('location: adminDash.php');
            }
         elseif($answer == 'formateur') {   

                mysqli_query($db, "INSERT INTO personne (NOM, PRENOM, AGE, EMAIL, PASSWORD) VALUES ('$name', '$fname','$age', '$email','$password')");
                mysqli_query($db, "INSERT INTO personne_formamteur(ID_PERSON) SELECT ID_PERSON FROM personne ORDER BY ID_PERSON DESC LIMIT 1"); 
                $_SESSION['message'] = "Formateur sauvegardé avec succès";
                header('location: adminDash.php');
            }
            	
	}

    if (isset($_POST['update'])) {
        $id = $_POST['id']; 
        $name =  $_POST['name'];
        $fname =  $_POST['fname'];
        $age =  $_POST['age'];
        $email =  $_POST['email'];
        $password =  $_POST['password'];
        mysqli_query($db, "UPDATE personne SET NOM='$name', PRENOM='$fname', AGE='$age', EMAIL='$email', PASSWORD='$password' WHERE ID_PERSON =$id");
        $_SESSION['message'] = " mis a jour acomplit!";
        header('location: adminDash.php');
    }

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM personne WHERE ID_PERSON=$id");
        mysqli_query($db, "DELETE FROM personne_formamteur WHERE ID_PERSON=$id");
        mysqli_query($db, "DELETE FROM personne_etud WHERE ID_PERSON=$id");
        mysqli_query($db, "DELETE FROM classe_etd WHERE ID_PERSON=$id");

        $_SESSION['message'] = "suppression accompli";
        header('location: adminDash.php'); 
    }

    if (isset($_GET['delM'])) {
        $id = $_GET['delM'];
        mysqli_query($db, "DELETE FROM box_message WHERE id_Msg=$id");
        $_SESSION['message'] = "suppression accompli"; 
        header('location: adminDash.php');
    }
    //teacher dashboard 
