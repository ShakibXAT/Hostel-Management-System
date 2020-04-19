<?php
session_start();
if(!isset($_SESSION['email'])){
    echo "you are logged out";
    header('location:AdminLogin.php');
}
 ?>



<!DOCTYPE html>
<html>
<head>
<title>Hostel Management Meal info page</title>


<style>
body {
  background-image:url('img/.jpg');
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
  background-color:gray;
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
 .sql{
    padding:100px 125px;
     width:80%;
     color:black;
   font-size:20px;
   height:50%;
   background-color:skyblue;
   top:80%;
   left:50%;
   position: absolute;
   transform:translate(-50%,-50%);
   box-sizing:border-box;
  
   text-align:left;
}

table, th, td {
  background-color:white;
 
  text-align:center;
  border: 2px solid black;
  border-collapse: collapse;
}
.table{
  padding:2px 10px;
  width:100%;
  top:10px;
  text-align:center;
}
th{
  color:black;
  font-size:30px;
  width:100%;
}
td{
  color:black;
  width:100%;
  font-size:20px;
  
}

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
 
    $date= mysqli_real_escape_string($con, $_POST['date']);
    $Admin = mysqli_real_escape_string($con, $_SESSION['email']);
  
    
    
    $sql = "SELECT id, email, breakfast,lunch,dinner FROM meal WHERE date='$date' and AdminEmail='$Admin'";
    $result = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        ?>
        <div class="sql">
        <div class="table">
        <table>
       
  <tr>
    <th>Email</th>
    <th>Breakfast</th>
    <th>Lunch</th>
    <th>Dinner</th>
  </tr>     


        <?php
        while($row = mysqli_fetch_assoc($result)) {
        
            ?>
        

  <tr>
    <td><?php  echo " " . $row["email"]; ?></td>
    <td><?php echo " " . $row["breakfast"]; ?></td>
    <td><?php echo " " . $row["lunch"];  ?></td>
    <td><?php echo " " . $row["lunch"]; ?></td>
    
  </tr>
 
<?php
       }
        ?>
        </table>
</div>
        </div>
        <?php
    }
  
  }
  
  ?>
 
 <header class="header">
  <a class="header head">Hostel Management</a>
  <div class="header pname">
  <a class="pemail"> <?php echo  $_SESSION['email'] ?> </a>
  <a href="AdminLogout.php"><button class="button button2">Log out</button></a>
  </div>
  </header>

   <hr>

<ul>
  <li><a class="active" href="AdminHome.php">Home</a></li>
  
</ul>
 
<div class="signup" >
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?> " method="POST">
  <div class="container">
   
     <a style="color:skyblue;"><h1> Check Daily Meal </h1><a>
    <hr>

    <label for="date"><b>Date</b></label><br>
    <input type="date" placeholder="date" name="date" required><br>

     <hr>
    
    <div class="save">
      <button  class="but button1" type="submit"  name="submit">Check</button>
    </div>
    </div>
</form>
</div>

<footer class="footer">

<a>© copyright Shakib gaming</a>

</footer>
 </body>