
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
 
  background-image:url('img/2.jpg');
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
  background-color: tomato;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}

table, th, td {
  background-color:white;
 
  text-align:center;
  border: 2px solid black;
  border-collapse: collapse;
}
.table{
  padding:100px 125px;
  width:80%;
}
th{
  color:black;
  font-size:40px;
  width:80%;
}
td{
  color:black;
  width:80%;
  font-size:30px;
  
}
</style>
</head>
<body>
 
 
 <header class="header">
  <a class="header head">Hostel Management</a>
  <div class="header pname">
  <a class="pemail"> <?php echo  $_SESSION['email'] ?> </a>
  <a href="AdminLogout.php"><button class="button button2">Log out</button></a>
  </div>
  </header>



<ul>
  <li><a class="active">Profile</a></li>
  <li><a href="AdminMeal.php">Meals</a></li>
  <li><a href="user.php">Users</a></li>
  <li><a href="#about">About</a></li>
</ul>

<div class="table">
<table>
  <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>NID/Student id</th>
    <th>Phone number</th>
    <th>Email</th>
  </tr>
  <tr>
    <td><?php echo  $_SESSION['firstName'] ?></td>
    <td><?php echo  $_SESSION['lastName'] ?></td>
    <td><?php echo  $_SESSION['NID'] ?></td>
    <td><?php echo  $_SESSION['phoneNumber'] ?></td>
    <td><?php echo  $_SESSION['email'] ?></td>
  </tr>
 
</table>
</div>

<footer class="footer">

<a>© copyright Shakib gaming</a>

</footer>
 </body