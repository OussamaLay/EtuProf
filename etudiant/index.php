<?php
	include('fonctions.php');
	session_start();
	
?>
<?php
	if(isset($_POST['uname'])){
		$db = db_connect();
		$pass = $_POST['psw'];
		$email = $_POST['uname'];
		$sql = "SELECT * FROM etudiant where mailEtu = '$email'";
		$result = db_query($db, $sql);
		$data = mysqli_fetch_array($result);
		if($data[0] > 0)
		{
			if($pass==$data['motPass']){
				$_SESSION['email'] = $email;
				echo	'<html>
						<head>
							<title>Bienvenue chez Etu_Prof!</title>
							<img src="../images/logo.jpg" height=80px width=130px/>
							<div class="auth">
            
							<img src="../images/photo.png" height=50px width=50px/>
							<br>
							<p>	
							Nom :'.$data['nomEtu'].' '.$data['prenomEtu'];
							
				echo		'</p>
							</div>
								<link href="style.css" rel="stylesheet" media="all" type="text/css">
						</head>
						<body>
							
							<ul class="menu">
								<li>
									<a href="../etudiant_rating/index.php"><div>Consulter mes notes</div></a>
								</li>
								<li>
									<a href="../etudiant_abscences/index.php"><div>Consulter mes absences</div></a>
								</li>
							</ul>
						</body>
						</html>';
			}
		else {
			echo '<html>
					<link rel="stylesheet" href="../etudiant_login/style.css"> 
					<body>
                        
						<form action="index.php" method="post">
						<div class="login">
						<div class="logo">
							<img src="../images/logo.jpg" alt="logo" class="logo"> 
						</div>

						<div class="container">
							<label for="uname"> <b class="texte"> Identifiant : </b> </label> <br>
							<input type="text" placeholder="Enter Username" name="uname" class="input" required> <br> <br>

							<label for="psw"><b>Mot de passe : </b></label> <br>
							<input type="password" placeholder="Enter Password" name="psw" class="input" required> <br> <br>
							<p style="color:red"> mot de passe ou idantifiant incorrect </p>
							<button type="submit" class="button">se connecter</button> <br>
							<span class="psw"> <a href="#">mot de passe oublié ? </a></span>
						</div>
						</div>
						</form>
						</body>
					</html>';
		}
	}
	}
?>
		 