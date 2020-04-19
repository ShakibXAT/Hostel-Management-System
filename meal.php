<?php
session_start();
if(!isset($_SESSION['email'])){
    echo "you are logged out";
    header('location:login.php');
}
 ?>



<!DOCTYPE html>
<html>
<head>
<title>Hostel Management Home page</title>


<style>
body {
  background-image:url('img/meal.jpg');
  background-attachment: fixed;
  background-size: cover;
 
}

.header{
    background-color: white;
    height:50%;
    width: 100%;
}

.head{
  color:Black;
  text-align:center;
  font-size:50px
}
.pname{
  text-align:right;
  color:gray;
}
.pemail{
  font-size:35px;
}

.button {
  position:right;
  background-color:tomato;
  color:white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
 
}
.but{
  position:right;
  background-color:green;
  color:white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
 
}
.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
  
}
.button1:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
  
}
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: gray;
  color: black;
  text-align: center;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 10px 3px;
  width: 5%;
  background-color:white;
  position: fixed;

  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 5px 10px;
  text-decoration: none;
}

li a.active {
  background-color: skyblue;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}

.signup {
   width:450px;
   height:400px;
   color:white;
   top:30%;
   left:50%;
   position: absolute;
   transform:translate(-50%,-50%);
   box-sizing:border-box;
   padding:140px 30px;
   text-align:center;
   
   
 }

 .signup input{
   width:100%;
   margin-top:5px;
 }

 input[type=text], input[type=number], input[type=date] {
  
  
  border:none;
  
  display: inline-block;
  border-bottom:1px solid black;
  outline:none;
  height: 40px;
  
}


</style>
</head>
<body>
 <?php 
  include 'mealDatabase.php';
  if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($con, $_SESSION['email']);
    $AdminEmail = mysqli_real_escape_string($con, $_SESSION['AdminEmail']);
    $breakfast = mysqli_real_escape_string($con, $_POST['breakfast']);
    $lunch= mysqli_real_escape_string($con, $_POST['lunch']);
    $dinner= mysqli_real_escape_string($con, $_POST['dinner']);
    $Date= mysqli_real_escape_string($con, $_POST['date']);
 
  
    $datequery = "select email,date from meal where date='$Date' and email='$email' ";
    $query = mysqli_query($con, $datequery);
  
    $datecount = mysqli_num_rows($query);

  
    if($datecount>0){
      echo "meal already given";
    }
    else{
      if($email === $_SESSION['email']){
        $insertquery = "insert into meal (email, Adminemail, breakfast, lunch, dinner, date) values('$email','$AdminEmail','$breakfast','$lunch','$dinner','$Date')";
        $iquery = mysqli_query($con, $insertquery);
        
        if($iquery){
          
            ?>
             <script>
              alert("meal saved Successfully");
              </script>
            <?php
        }
         else{
             ?>
             <script>
             alert("couldn't save meal");
             </script>
             <?php
         
        }
  
      }
    }
  }
  
  ?>
 
 <header class="header">
  <a class="header head">Hostel Management</a>
  <div class="header pname">
  <a class="pemail"> <?php echo  $_SESSION['email'] ?> </a>
  <a href="logout.php"><button class="button button2">Log out</button></a>
  </div>
  </header>

   

<ul>
  <li><a class="active" href="home.php">Home</a></li>
  
</ul>
 
<div class="signup" >
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?> " method="POST">
  <div class="container">
   
     <a style="color:skyblue;"><h1> Add Daily Meal </h1><a>
    <hr>


    <label for="brakfast"><b>Breakfast</b></label><br>
    <input type="number" placeholder="Add breakfast" name="breakfast" required><br>

    <label for="lunch"><b>Lunch</b></label><br>
    <input type="number" placeholder="Add lunch" name="lunch" required><br>
    
    <label for="dinner"><b>Dinner</b></label><br>
    <input type="number" placeholder="Add dinner" name="dinner" required><br>

    <label for="date"><b>Date</b></label><br>
    <input type="date" placeholder="date" name="date" required><br>

     <hr>
    
    <div class="save">
      <button  class="but button1" type="submit"  name="submit">Save</button>
    </div>
    </div>
</form>
</div>

<footer class="footer">

<a>© copyright Shakib gaming</a>

</footer>
 </body>