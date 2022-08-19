<?php
    if(isset($_POST['btnProbar']))
    {
        InsertAnimalito();
    } 
    function InsertAnimalito(){
        if($_POST){
            $servername = "localhost";
            $username = "root";
            $password = "123456";
            $dbname = "phptestdb";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            
            // Recivir la información cuando le de al boton probar
            $tipoAnimalito=$_POST['txtTipoAnimalito'];
            $patas=$_POST['txtPatas'];
            $sexo=$_POST['txtSexo'];
    
            $sql = "INSERT INTO `animalito`(`TipoAnimalito`, `Patas`, `Sexo`) VALUES ('$tipoAnimalito',$patas,'$sexo')";
            echo $sql;
            if ($conn->query($sql) === TRUE) {
              echo "New record created successfully";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            $conn->close();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Un putito aprendiendo</title>
</head>
<body>
    <header>Mi primer PHP</header>
    <form action="index.php" method="post">
        <strong>TipoAnimalito:</strong>
        <input type="text" name="txtTipoAnimalito">
        <strong>Patas:</strong>
        <input type="number" name="txtPatas" min="0">
        <strong>Sexo:</strong>
        <input type="text" name="txtSexo" maxlength="1">
        <br>
        <input type="submit" value="Probar" name="btnProbar">
    </form>
    <footer>footer php</footer>
</body>
</html>