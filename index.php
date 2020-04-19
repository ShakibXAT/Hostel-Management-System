<docktype html>
<html>
 <head>
 <title>Index page</title>

 <style>
body {
  font-size: 20px;
  background-image:url('img/hostel.jpg');
  background-attachment: fixed;
  background-size: cover;
}
.header{
    background-color: white;
    text-align:right;
    width: 100%;
    height:10%;
}



.button {
  position:right;
  background-color:skyblue;
  color:white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
 
}
.button1 {
  position:right;
  background-color:blue;
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
</style>
 </head>

 <body>

<header class="header">
  <a style="color:skyblue;text-align:center"><h1>Hostel management</h1></a>
  <a href="AdminLogin.php"><button class="button1 button2">Admin</button></a>
  <a href="login.php"><button class="button button2">Log in</button></a>
  </header>

<footer class="footer">

<a>© copyright Shakib gaming</a>

</footer>

 </body>
</html>