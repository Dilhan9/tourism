<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/style2.css">
<link rel="stylesheet" type="text/css" href="css/style.css"> 
<link rel="stylesheet" type="text/css" href="css/st.css">

<script language="javascript" type="text/javascript">
  function validateForm() {
   var x = document.forms["myform"]["name"].value;
   
   if (x == "") {
     alert("Name must be filled out");
     return false;
   }
   var y=document.forms["myform"]["mes"].value;
    if (y == "") {
     alert("Pleace enter email befor submit");
     return false;
   }
   var z=document.forms["myform"]["email"].value;
   if (z == "") {
     alert("Pleace enter comment befor submit");
     return false;
   }
   

 }
     
     </script>





<title>Document</title>
</head>
<body>
<div class="header">
                 <nav class="navigation">
                   <a href="#" class="navbar-logo" style="margin-right:600px">Tourism</a>
                   <div class="navbar-right">
                    <a  href="Home.html">Home</a>
            <a  href="tourism.html">Tour</a>
            <a  href="https://inna.lk/">Hotels</a>
            <a  href="Aboutus.html">About</a>
            <a  href="contact.php">Contact</a>
                   </div>
                 </nav>
             
                 <div class="video-container">
                   <video autoplay loop muted id="video-bg">
             
                     <source src="web.mp4" type="video/mp4" height=>
             
                   </video>
                 </div>
               </div>
    

<!-- Table start -->
<table cellpading="50px" style="margin-top: 600px" >
  <tr>
    <td>
      <br>
      
      <form name="myform"  method="POST" action="contact.php" onsubmit="return validateForm()">
          <lable style="margin-left: 400px; ">Name:<br><input style="margin-left: 400px;" type="text" name="name" value size="60" aria-required="true" aria-invalid="false"><br></lable>

          <lable style="margin-left: 400px; ">Email:<br><input style="margin-left: 400px;" type="text" name="email" value size="60" aria-required="true" aria-invalid="false"><br></lable>
          
          <label style="margin-left:400px;">Comment:<br><textarea cols=65 rows=5 name="mes"></textarea></label><br>
          <input style="margin-left: 400px;" type="submit" name="post">
        </form>
     </td>
     <td> 
<p style="margin-left: 50px; font-size: 20px"><b>CONTACT INFO</b></p><br>
<p class="tr"><b>Addres</b></p><br>
<p class="tr">267/A/3 Palanwatha Pannipitiya</p>
<p class="tr">Palanwatah</p>
<p class="tr">Pannipitiya</p>
<p class="tr"><a href=www.face.com><image src="img/14.png" width="25px height=20px"></a>  <a href=www.gmail.com><image src="img/17.png" width="25px height=20px"></a>  <a href=www.youtube.com><image src="img/16.png" width="25px height=20px"></a>  <a href=www.instargram.com><image src="img/15.png" width="25px height=20px"></a></p>
</td>
</tr>

</table>
<!-- Table end -->

  <!--PHP Start-->
<?php

// Connect with MySQL Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="tourism";


// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error)
{
die("Connection failed: " . $conn->connect_error);
}	
else
{
  
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $mes = mysqli_real_escape_string($conn,$_POST['mes']);
    
    $query = "INSERT INTO contact (name, email, commentdetails)

            VALUES ('$name', '$email', '$mes');";
            
            


        if ($conn->query($query)) {
            


            $query = "SELECT * FROM contact ;";
        
            $result = mysqli_query($conn, $query);
        
                      while($row = mysqli_fetch_array($result)) 
                      { ?>
                        <table border="2">
                          <tr>

                              <hr align="center"; width="500"; size="5"; noshade>
                          <p style="margin-left: 40%"> Name: <?php  echo $row['name'];?></p>
                          <p style="margin-left:40%"> comment: <?php echo $row['commentdetails'];?><br> </p>
                          <br>
                            <hr align="center"; width="500"; size="5"; noshade>
                          </tr>
                        <table>
                      
                     <?php  }
        
         } 
        else 
        {
            echo "Error";
        }
    
    

}
    
?>

<!--PHP end-->
  

<!--footer start-->
	
<footer class="page-footer font-small mdb-color pt-4">

<!-- Footer Links -->
<div class="container text-center text-md-left">
  <hr width="100%"; size="3"; noshade>
  <!-- Footer links -->
  <div class="row text-center text-md-left mt-3 pb-3">

  <!-- Grid column -->
  <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
    <h6 class="text-uppercase mb-4 font-weight-bold">Sri Lanka</h6>
    <p>Sri Lanka is one of the leading romantic destinations in the whole world. 
      The land of serendipity brings spiritual tranquility and a chance to rediscover oneself..
      <br><br>Best Tour Operator in Sri Lanka 2019
    </p>
  </div>
  <!-- Grid column -->

  <hr class="w-100 clearfix d-md-none">

  <!-- Grid column -->
  <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
    <h6 class="text-uppercase mb-4 font-weight-bold">Social Media</h6>
    <p>
    <a href="https://www.facebook.com/K2-Photography-2875597659147801/"><img src="img/facebook.png">Facebook</a>
    </p>
    <p>
    <a href="https://twitter.com/tviter"><img src="img/twitter.png">Twitter</a>
    </p>
    <p>
    <a href="https://www.instagram.com/travel_with_wife/"><img src="img/instagram.png">Instagram</a>
    </p>
    <p>
    <a href="https://www.youtube.com/channel/UCwXfRdTtVeVnXXF4poaYw0Q"><img src="img/youtube.png">Youtube</a>
    </p>
  </div>
  <!-- Grid column -->


  <hr class="w-100 clearfix d-md-none">

  <!-- Grid column -->
  <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
    <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
    <p>
    <i class="fas fa-home mr-3"></i>Simplex Group</p>
    <p>
    <i class="fas fa-envelope mr-3"></i>simplex@gmail.com</p>
    <p>
    <i class="fas fa-phone mr-3"></i> +94  710506478</p>
    <p>
    <i class="fas fa-print mr-3"></i> +94  716625326</p>
  </div>
  <!-- Grid column -->

  </div>
  <!-- Footer links -->

  <hr>

 
</footer>
<!-- Footer -->
</div>
<!--footer end-->


</body>
</html>