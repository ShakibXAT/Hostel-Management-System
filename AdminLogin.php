<?PHP 
  session_start();
  ?>

<DOCTYPE html>
<html>
 <head>
  <title>Admin Log in</title>
  <style>
* {box-sizing: border-box;}

body {
  background-color:skyblue;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
  height:70px;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 15px 16px;
  margin-top:10px;
  
  text-decoration: none;
  font-size: 17px;
  
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .login-container {
  float: right;
}

.topnav input[type=text]  {
  padding: 6px;
  margin-top: 14px;
  font-size: 15px;
  border: none;
  width:220px;
}
.topnav input[type=Password]  {
  padding: 6px;
  margin-top: 8px;
  font-size: 15px;
  border: none;
  width:220px;
}

.topnav .login-container button {
  float: right;
  padding: 10px 10px;
  margin-top: 14px;
  margin-right: 16px;
  background-color: #555;
  color: white;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .login-container button:hover {
  background-color: skyblue;
}

@media screen and (max-width: 600px) {
  .topnav .login-container {
    float: none;
  }
  .topnav a, .topnav input[type=text] input[type=password], .topnav .login-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] input[type=password]{
    border: 1px solid #ccc;  
  }
}


 .signup {
   width:450px;
   height:400px;
   color:black;
   top:30%;
   left:50%;
   position: absolute;
   transform:translate(-50%,-50%);
   box-sizing:border-box;
   padding:70px 30px;
   text-align:center;
   
   
 }

 .signup input{
   width:100%;
   margin-top:5px;
 }

 input[type=text], input[type=password] {
  
  
  border:none;
  
  display: inline-block;
  border-bottom:1px solid black;
  outline:none;
  height: 40px;
  
}

.button {
  background-color: blue;
  color: white;
  
  padding: 10px 40px;
  margin: 8px 0;
  border: circle;
  cursor: pointer;
  width: 35%;
}

.clearfix .signupbtn button:hover {
  opacity: 0.8;
  background-color: skyblue;
}


.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: gray;
  color: black;
  text-align: center;
  font-size:120%;
}
</style>
 </head>

 <body>

 <?php
  include 'loginDatabase.php';

  if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = "select * from adminregistration where email = '$email' ";
    $query = mysqli_query($con,$email_search);

    $email_count = mysqli_num_rows($query);

    if($email_count){
      $email_pass = mysqli_fetch_assoc($query);
      
      $db_pass = $email_pass['password'];

        
      $_SESSION['firstName'] = $email_pass['firstName'];
      $_SESSION['lastName'] = $email_pass['lastName'];
      $_SESSION['NID'] = $email_pass['NID'];
      $_SESSION['phoneNumber'] = $email_pass['phoneNumber'];
      $_SESSION['email'] = $email_pass['email'];

      $pass_decode = password_verify($password, $db_pass);
      
      if($pass_decode){
        echo "login successfull";
        ?>
        <script>
         location.replace("AdminHome.php");
        </script>
       <?php

      }
      else{
        echo "password wrong";
      }
     
    }
    else{
      echo "Invalid Email";
    }
  }



  if(isset($_POST['submit'])){
  $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
  $NID= mysqli_real_escape_string($con, $_POST['NID']);
  $phoneNumber = mysqli_real_escape_string($con, $_POST['phoneNumber']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $repassword = mysqli_real_escape_string($con, $_POST['repassword']);

  $pass = password_hash($password, PASSWORD_BCRYPT);
  $repass = password_hash($repassword, PASSWORD_BCRYPT);

  $emailquery = "select * from adminregistration where email='$email' ";
  $query = mysqli_query($con, $emailquery);

  $emailcount = mysqli_num_rows($query);

  if($emailcount>0){
    echo "email already exist";
  }
  else{
    if($password === $repassword){
         
      $insertquery = "insert into adminregistration (firstName, lastName, NID, phoneNumber, email, password, repassword) values('$firstName','$lastName','$NID','$phoneNumber','$email','$pass','$repass')";
      $iquery = mysqli_query($con, $insertquery);
      
      if($iquery){
        
          ?>
           <script>
            alert("inserted Successfully");
            </script>
          <?php
      }
       else{
           ?>
           <script>
           alert("Not inserted");
           </script>
           <?php
       
      }

    }
    else{
      ?>
      <script>
      alert("Password are not matching ");
      </script>
      <?php
    }
  }
}


  
  
 ?>
  
  
 <div class="topnav">
  <a class="active" href="index.php">Home</a>
  
  
  <div class="login-container">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
      <input type="text" placeholder="Email" name="email">
      <input type="password" placeholder="Password" name="password">
      <button  type="submit" name="login">Login</button>
    </form>
  </div>
</div>

<div class="signup" >
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?> " method="POST">
  <div class="container">
    <h1 style="color:white;text-align:center;">Sign Up for Admin</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="firstName"><b>First Name</b></label><br>
    <input type="text" placeholder="Enter First name" name="firstName" required><br>

    <label for="lastName"><b>Last Name</b></label><br>
    <input type="text" placeholder="Enter Last Name" name="lastName" required><br>

    <label for="NID"><b>NID/Student id</b></label><br>
    <input type="text" placeholder="Enter NID/Studentid" name="NID" required><br>
     
    <label for="PhoneNumber"><b>Phone Number</b></label><br>
    <input type="text" placeholder="Enter Phone Number" name="phoneNumber" required><br>

    <label for="email"><b>Email</b></label><br>
    <input type="text" placeholder="Enter Email Address" name="email" required><br>

    <label for="password"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="password" required><br>

    <label for="repassword"><b>Repeat Password</b></label><br>
    <input type="password" placeholder="Repeat Password" name="repassword" required><br>
    
   
    
    

    <div class="clearfix">
      <button  type="submit"  name="submit" class="button">Sign Up</button>
    </div>
    </div>
</form>
</div>
 

<footer class="footer">

<a>© copyright Shakib gaming</a>

</footer>

 </body>
</html>