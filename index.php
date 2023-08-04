<?php
$insert = false;
if(isset($_POST['name'])){
//set connection variables
  error_reporting(0);
$submit = true; 
$server = "localhost";
$username = "root";
$password = "";

//creat a database connection
$con = mysqli_connect($server,$username, $password);


//check for connection success
if(!$con){
    die("connecion to this database failed due to" . mysqli_connect_error());
}
 //echo "success connecting to the db";

 //collect post variables
  $name = $_Post['name'];
  $Age = $_Post['Age'];
  $Gender = $_Post['Gender'];
  $Email = $_Post['Email'];
  $Phone = $_Post['Phone'];
  $desc = $_Post['desc'];
 $sql = " INSERT INTO `clg_trip` . `clg_trip` (`name`, `Age`, `Gender`, `Email`, `Phone`, `desc`, `dt`) VALUES ('$name', '$Age', '$Gender', '$Email', '$Phone', '$desc', current_timestamp());";
//echo $sql;


//execute the query
 if($con->query($sql)==true){
    //echo "successfully inserted";

    //flag for successful insertion
    $insert = true;
 }
 else{
    echo "ERROR: $sql <br> $con->error";

 }


 //close the database connection
   $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@300&display=swap"
      rel="stylesheet">
  </head>
  <body>
    <img class="hbtu" src="hbtu building.jpeg" alt="HBTU Kanpur" />
    <div class="container">
      <h1>Welcome to HBTU Kanpur US trip form</h1>
      <p>
        Enter your details and submit this form to confirm your participation in the trip
      </p>
    <?php
    if($insert == true){
      echo "<p class='submitMSG'> Thanks for submitting your form. We are Happy to see you joining for the Trip</p>";
    }
    ?>
      <form actions="index.php" method="post">
        <input
          type="text"
          name="name"
          id="name"
          placeholder="Enter your name"
        />
        <input type="text" name="Age" id="name" placeholder="Enter your Age" />
        <input
          type="text"
          name="Gender"
          id="name"
          placeholder="Enter your Gender"
        />
        <input
          type="text"
          name="Email"
          id="name"
          placeholder="Enter your Email"
        />
        <input
          type="text"
          name="Phone"
          id="name"
          placeholder="Enter your Phone"
        />
        <textarea
          name="desc"
          id="desc"
          cols="30"
          rows="10"
          placeholder="Enter other information"
        ></textarea>
        <button class="btn">Submit</button>
      </form>
    </div>
    <script src="index.js"></script>
   <!-- INSERT INTO `clg_trip` (`S.No`, `Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `dt`) VALUES ('1', '', '23', 'male', 'this@ths.com', '9999-->
  </body>
</html>