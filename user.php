
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
<title>Hostel Management Admin Home page</title>


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

button {
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

.button2:hover {
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

table, th, td {
  background-color:white;
 
  text-align:center;
  border: 2px solid brown;
  border-collapse: collapse;
}
.table{
  padding:100px 100px;
  width:90%;
}
th{
  color:skyblue;
  font-size:30px;
  width:100%;
}
td{
  color:black;
  width:100%;
  font-size:30px;
  
}
</style>
</head>
<body>
 
 

<header class="header">
  <a class="header head">Hostel Management users</a>
  <div class="header pname">
  <a class="pemail"> <?php echo  $_SESSION['email'] ?> </a>
  <a href="AdminLogout.php"><button class="button button2">Log out</button></a>
  </div>
  </header>

<hr>

<ul>
  <li><a class="active" href="AdminHome.php">Home</a></li>
  
</ul>




<?php 
  include 'loginDatabase.php';

    
    
    $Admin = mysqli_real_escape_string($con, $_SESSION['email']);

    $sql = "SELECT *  FROM registration WHERE AdminEmail='$Admin'";
    $result = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        ?>
        <div class="sql">
        <div class="table">
        <table>
       
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>NID/Student ID</th>
    <th>Phone Number</th>
    <th>email</th>
    
  </tr>     


        <?php
        while($row = mysqli_fetch_assoc($result)) {
        
            ?>
        

  <tr>
    <td><?php  echo " " . $row["firstName"]; ?></td>
    <td><?php echo " " . $row["lastName"]; ?></td>
    <td><?php echo " " . $row["NID"];  ?></td>
    <td><?php echo " " . $row["phoneNumber"]; ?></td>
    <td><?php echo " " . $row["email"]; ?></td>
  </tr>
 
<?php
       }
        ?>
        </table>
</div>
        </div>
        <?php
    }
  
  
  
  ?>


<footer class="footer">

<a>© copyright Shakib gaming</a>

</footer>
 </body