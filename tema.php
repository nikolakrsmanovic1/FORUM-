<?php 
    session_start();
    include "konekcija.php";

    if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == 0)
    {
        header("Location: index.php");
    }
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
    <title>Document</title>
</head>
<body>
<style>
.velicina
{
    font-size:30px;
}
</style>
<?php 
            include "konekcija.php";       
            $naziv = $opis = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!empty($_POST["naziv"])){
                    $naziv = test_input($_POST["naziv"]);
                }
                if (!empty($_POST["opis"])){
                    $opis = test_input($_POST["opis"]);
                }
              
            }
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            if(!empty($naziv) && !empty($opis))
            {
                $vreme = date("d.m.Y H:i");
                $username= $_SESSION['korisnicko'];
                $sql = "INSERT INTO tema (nazivTeme,opisTeme,DatumKreiranja,ime) VALUES ('$naziv','$opis','$vreme','$username')";
                if(mysqli_query($conn, $sql)){} else{}
                  header("Location: index.php");
                $naziv = $opis = $vreme = "";
                $_SESSION["idTeme"] = $_GET["id"];
            }
        ?>
   <a href="./index.php" class="btn btn-primary" >Home</a>
        <a href="./login.php" class="btn btn-primary" >Uloguj se</a>
        <a href="./prijava.php" class="btn btn-primary">Registruj se</a>
        <a href="./tema.php" class="btn btn-primary">Kreiraj temu</a>
        <br>
        <div class="container">       
                
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="text-center mt-5"> 
                                <label class="mt-2" for="naziv">Naziv: </label>  
                                <input class="mt-1" type="text" name="naziv"> <span class="error">*</span>
                                <br><br>
                                Opis teme<br>
                                <textarea id="opis" name="opis" rows="4" cols="50"> </textarea>
                                <br><br>
                                <input class="btn btn-primary mt-2" type="submit" name="submit" value="Kreiraj">
                            </form>
                        </div>
                    </div>
                </div>


</body>
</html>