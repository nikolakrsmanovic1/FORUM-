<?php
        session_start();
        include 'konekcija.php';
      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>

        <a href="./index.php" class="btn btn-primary" >Home</a>
        <a href="./login.php" class="btn btn-primary" >Uloguj se</a>
        <a href="./prijava.php" class="btn btn-primary">Registruj se</a>
        <a href="./tema.php" class="btn btn-primary">Kreiraj temu</a>
<?php
        {
         $kom="";
         $_SESSION["idTeme"] = $_GET["id"];
          $sql = "SELECT id,NazivTeme ,opisTeme ,ime FROM tema  WHERE id = " . $_SESSION["idTeme"];
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
          $imeTeme = $row["NazivTeme"];
          $tema=$row["opisTeme"];
          $korIme=$row["ime"];
          $username=  $_SESSION['korisnicko'];
          $idZaUnos=$row["id"];
          $sql1 = "SELECT Ime ,prezime FROM Korisnik WHERE email='$korIme'";
          $result1 = $conn->query($sql1);
          $row1 = $result1->fetch_assoc();

      echo '<div class="jumbotron jumbotron-fluid">
      <div class="media">
      <div class="media">
      <div class="media-left">
         
      </div>
      <div class="media-body">
        <a href="#" class="anchor-username"><h4 class="media-heading">'.$row1["Ime"].'  '.$row1["prezime"].'</h4></a> 
  
      </div>
    </div>
                              </div>
      <div class="container">
        <h1 class="display-4">'. $row["NazivTeme"].'</h1>
        <p class="lead">'. $row["opisTeme"].'</p>
        <form method="POST">
        <input name="kom" type="text"></input>
        <input type="submit" name="submit" value="Kreiraj "> 
        </form>
      </div>
    </div>';

    if(isset($_POST["submit"]))
    {
      if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == 0)
      {
          header("Location: index.php");
      }

      $kom = $_POST["kom"];
    
       
        $sql2 = "INSERT INTO komentari (opis,imeKreatora,tema_id) VALUES ('$kom','$username','$idZaUnos')";
        if ($conn->query($sql2) === TRUE) {
          echo "New record created successfully";
          } else {
          echo "Error: " . $sql2 . "<br>" . $conn->error;
          }
        } 
  }

  $sql3 = "SELECT id, opis, datum, imeKreatora, tema_id FROM komentari WHERE tema_id = " . $_SESSION["idTeme"] . " ORDER BY datum DESC";
  $result3 = $conn->query($sql3);
 if ($result3->num_rows > 0) {
    while($row3 = $result3->fetch_assoc()){
      
          echo '<div class="jumbotron jumbotron-fluid">
          <div class="media">
          <div class="media">
          <div class="media-left">
             
          </div>
            <p class="lead">'. $row3["opis"].'</p> ';
    }  
  }
  $conn->close();
                 
?>      
</body>
</html>