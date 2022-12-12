<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
<style>

</style>

<?php
    $txt="";
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
       $br= $ime =$prezime= $email = $greskaIme = $greskaEmail =$greskaprezime=$greskalozinka=$lozinka=$lozinka1=$greskalozinka1=$greskalozinka2="";
        if(isset($_POST["submit"]))
        {
            $br= $ime =$prezime= $email = $greskaIme = $greskaEmail =$greskaprezime=$greskalozinka=$lozinka=$lozinka1=$greskalozinka1=$greskalozinka2="";
            $br=0;      
            $ime=$_POST["ime"];
            $mail=$_POST["mail"];
            $prezime=$_POST["prezime"];
            $lozinka=$_POST["lozinka"];
            $lozinka1=$_POST["lozinka1"];


            if (empty($_POST["ime"])) {
                $greskaIme = "Morate uneti ime";
                    
            } 
            else
            {
                $br++;
            }
            if (empty($_POST["prezime"])) {
                $greskaprezime = "Morate uneti prezime";
            }
            else
            {
                $br++;
            }
                 if (empty($_POST["lozinka"])) {
                        $greskalozinka = "Morate uneti lozinku";
                    }
                    else
                    {
                        $br++;
                    }
                    if (empty($_POST["lozinka1"])) {
                        $greskalozinka1 = "Morate uneti  ponovljenu lozinku";
                    }
                    else
                    {
                        $br++;
                    }
                    if($lozinka!=$lozinka1)
                    {
                        $greskalozinka2="<br> Ponovljena lozinka nije ista";
                    }
                    else
                    {
                        $br++;
                    }
         
                $email = test_input($_POST["mail"]);
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                $greskaEmail = "Mejl nije u dobrom formatu";
            else {
                $greskaEmail = "";
                $br++;
            }          

        
        }   
            include 'konekcija.php';
            session_start();
            if($br==6)
            {
                $_SESSION["loggedIn"] = 1;
                $sql = "INSERT INTO korisnik (ime, prezime, email,lozinka)
                VALUES ('$ime','$prezime','$mail','$lozinka')";
                 if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                    } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    }
            }
            else
            {
                $_SESSION["loggedIn"] = 0;
                $_SESSION["korisnicko"] = "";
            }
            $conn->close();
             
    ?> 
 
        <a href="./index.php" class="btn btn-primary" >Home</a>
        <a href="./login.php" class="btn btn-primary" >Uloguj se</a>
        <a href="./prijava.php" class="btn btn-primary">Registruj se</a>
        <a href="./tema.php" class="btn btn-primary">Kreiraj temu</a>
        <a href="./logout.php" class="btn btn-primary">Izloguj se</a>

<div class="container forma ">
			 
				<div class="col-md-6 ">					
					<h1 class="naslov">REGISTRACIJA</h1>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            Ime:         
                            <input type="text" name="ime" value="<?php echo $ime; ?>"><span class="error">* <?php echo $greskaIme; ?></span><br>           
                            <br><br>
                        </div>
                        <div class="form-group">
                            Prezime:
                            <input type="text" name="prezime" value="<?php echo $prezime; ?>"><span class="error">* <?php echo $greskaprezime; ?></span><br>              
                            <br><br>
                        </div>
                        <div class="form-group">
                            Korsnicko ime:
                           <input type="text"  placeholder=" email" name="mail" value="<?php echo $email; ?>"><span class="error">* <?php echo $greskaEmail; ?><br>
                            <br><br>
                        </div>
                        <div class="form-group">
                             Lozinka:
                            <input type="password" name="lozinka" value="<?php echo $lozinka; ?>"><span class="error">* <?php echo $greskalozinka; ?><br>
                            <br><br>
                                        
                        </div>

                            <div class="form-group">
                                Ponovljena lozinka:
                                <input type="password" name="lozinka1" value="<?php echo $lozinka1; ?>"><span class="error">* <?php echo $greskalozinka1; ?><br>
                                <?php echo $greskalozinka2; ?>
                                <br><br>                                                 	
                            </div>
                     <input type="submit" name="submit" value="Potvrdi"> 
                     </form>	
	</div>
    
</body>
</html>