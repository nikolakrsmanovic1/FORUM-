<?php
    include 'konekcija.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="styles.css">
    <title>Log in</title>
</head>
<body>

<style>

</style>

<?php
    $greska="";
    
    if (isset($_POST['korisnicko'])) {
        $username = ($_POST['korisnicko']);    
        $password = ($_POST['lozinka']);
      
        $query    = "SELECT * FROM korisnik WHERE email='$username'  AND lozinka='$password'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION["loggedIn"] = 1;
            $_SESSION['korisnicko'] = $username;
            header("Location: index.php");
           $greska="";
        } else 
        {
             $greska="Neispravni podaci ";
        }


    } 
?>
         <a href="./index.php" class="btn btn-primary" >Home</a>
        <a href="./login.php" class="btn btn-primary" >Uloguj se</a>
        <a href="./prijava.php" class="btn btn-primary">Registruj se</a>
        <a href="./tema.php" class="btn btn-primary">Kreiraj temu</a>
        <a href="./logout.php" class="btn btn-primary">Izloguj se</a>


<div class="container forma ">
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<h1 class="centar">LOGIN</h1>
			<hr>
			<div class="row">
				<div class="col-md-6">
				<h1 class="prvi">Prijavite se</h1>
			</div>
				<div class="col-md-6 ">
					<div class="form-group desno">
                        <label class="velicina"> Korisnicko ime:</label>
                         <input type="text" name="korisnicko" placeholder="email"  ><br><br>
					</div>
					<div class="form-group desno">
                    <label class="velicina"> Lozinka:</label>
                        <input type="password" name="lozinka"  ><br><br>
					</div>
						<div class="form-group desno">
                        <input type="submit" name="submit" value="Potvrdi">  
                        <br><br>
                        <?php echo $greska; ?>
                         
						</div>
			</div>
		</div>
 </form>	
</div>




 


    

</body>
</html>

 