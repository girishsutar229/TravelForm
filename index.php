<?php
$insert=false;  

if(isset($_POST['name'])){
$server = "localhost";
$username = "root";
$password ="";   


$con =mysqli_connect( $server, $username ,$password);

if(!$con){
    die("connection to this database failed due to" .mysqli_connect());

}
// echo "Success connecting to the db";

$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$adhar = $_POST['adhar'];
$desc = $_POST['desc'];

$sql =" INSERT INTO `trip`.`travelforam` (`name`, `gender`, `age`, `email`, `phone`,`adhar`, `other`, `dt`) VALUES ('$name', '$gender', '$age',  '$email', '$phone','$adhar', '$desc', current_timestamp()); ";

// echo$sql;


if($con->query($sql) == true){
    // echo "successfully inserted";
    $insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error ";
}

$con->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="colloge.jpg" alt="IIT Kharagpur">
    <div class="container">
        <h1> Welcome to IIT  Kharagpur US Trip Form</h1>
        <p>Enter your details and submit this  form to confirm your 
            participaton in the trip</p>
            
        <?php
        if($insert==true){
        echo "<p class='submitMsg'> Thanks For submitting your Form . We are happy to see you joining us for the US trip</p>";
        }    
        ?>

            <form action="index.php" method="post">
            
                <input type="text" name="name" id="name" placeholder="Enter your name...">
                <input type="text" name="gender" id="gender" placeholder="Enter your Gender...">
                <input type="text" name="age" id="age" placeholder="Enter your Age...">
                <input type="email" name="email" id="email" placeholder="Enter your Email...">
                <input type="phone" name="phone" id="phone" placeholder="Enter your Phone...">
                <input type="number" name="adhar" id="adhar" placeholder="Enter your Adhar number...">
                <textarea name="desc" id="desc" cols="30" rows="8" placeholder="Enter your other information Here..."></textarea>
                
                <button class="btn">Submit</button> 
            </form>


    </div>
    <script src="index.js"></script>
    
</body>
</html>