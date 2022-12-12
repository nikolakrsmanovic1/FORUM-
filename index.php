<?php
    session_start();
    include "konekcija.php";

    if(isset($_SESSION["loggedIn"]))
    {
        if($_SESSION["loggedIn"] == 0)
        {
            $_SESSION["korisnicko"] = "";        
        }
        
    }
    $_SESSION["idTeme"] = "";
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
    <title>Pocetna</title>
</head>
<body>
<style>

</style>
      <a href="./index.php" class="btn btn-primary" >Home</a>
        <a href="./login.php" class="btn btn-primary" >Uloguj se</a>
        <a href="./prijava.php" class="btn btn-primary">Registruj se</a>
        <a href="./tema.php" class="btn btn-primary">Kreiraj temu</a>
        <a href="./logout.php" class="btn btn-primary">Izloguj se</a>
        <br>
<?php
     
        include 'konekcija.php';
        if($_SESSION["loggedIn"] == 1)
        {
          echo "Dobrodosli ". $_SESSION["korisnicko"];   
          echo "<br><br><br>";
        }    

  {
    $sql = "SELECT id,nazivTeme,opisTeme,DatumKreiranja,ime  FROM tema";
    $result = $conn->query($sql);
   
 
  if($result->num_rows>0)
  {
    while( $row = $result->fetch_assoc())
    {
        echo "<div class='jTema'>";
        echo "<a class='naslovTeme' href='diskusija.php?id=". $row['id'] ." ' >".$row["nazivTeme"]."</a><br>". $row["opisTeme"]. "<br> --- <br>" . $row["ime"]." ". $row["DatumKreiranja"]."<br>";
        echo "</div>";
        $_SESSION['idzaproveru']=$row['id'];
    }
  }
   
  }

  ?>
        
</body>
</html>
