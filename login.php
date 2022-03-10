<?php
session_start();

if ( isset($_SESSION["login"]) ) {
    header("location: admin.php");
    exit;
}

require 'functions.php';

if (isset($_POST["login"])) {

    
    

    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek username
    $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");
    if ( mysqli_num_rows($result) === 1 ) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])){
            // set session
            $_SESSION["login"] = true;

            header("location: admin.php");
            exit;
        }

    } 
        $error = true;
    


}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        article, 
aside, 
details, 
figcaption, 
figure, 
footer, 
header, 
hgroup, 
nav, 
section {
    display: block;
}

html {
    font-size: 100%;
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
}

input:focus, 
textarea:focus {
    outline: none;
}

label, 
select, 
button, 
input[type="submit"], 
input[type="radio"], 
input[type="checkbox"] 
input[type="button"] {
    cursor: pointer;
}

a, 
a:visited, 
a:active {
    text-decoration: none;
}

a:hover {
    text-decoration: none;
}

::selection {
    background: #ed327b;
    color: #fff;
}

::-moz-selection {
    background: #ed327b;
    color: #fff;
}

* {
    font-size:100%;
    margin: 0;
    padding: 0;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
body {
  background:#fd7e14;
}

* {
  font-family:"Helvetica Neue", Helvetica, Arial;
}

h5 {
  text-align:center;
  margin-top:5px;
  color:rgba(0,0,0,.3);
}

h5 > a,a:visited {
  color:#fff;
  text-decoration:underline;
}

h5 > a:hover {
  text-decoration:none;
}

form {
  background:#fff;
  border-radius:6px;
  padding:20px;
  padding-top:30px;
  width:300px;
  margin:50px auto;
  box-shadow:15px 15px 0px rgba(0,0,0,.1);
}

h1 {
  text-align:center;
  font-size:1.4em;
  font-weight:700;
  color:#ccc;
  margin-bottom:24px;
}

span {
  font-weight:200;
}

input {
  width:100%;
  background:#f5f5f5;
  border:0;
  padding:20px;
  border-radius:6px;
  margin-bottom:10px;
  border:1px solid #eee;
}

.btn {
  position:relative;
  width:100%;
  padding:20px;
  border-radius:6px;
  border:0;
  background:#f26964;
  font-size:1.2em;
  color:#fff;
  text-shadow:1px 1px 0px rgba(0,0,0,.1);
  box-shadow:0px 3px 0px #c1524e;
}

.btn:active {
  top:3px;
  box-shadow:none;
}

h6 {
  text-align:center;
  padding:20px;
  padding-top:35px;
  color:#777;
  cursor:pointer;
}

.social {
  display:none;
}

.fb {
  margin-top:15px;
  background:#3b5998;
  box-shadow:0px 3px 0px #2c416e;
}

.tw {
  background:#00acee;
  box-shadow:0px 3px 0px #008dc3;
}

.google {
  background:#db4a39;
  box-shadow:0px 3px 0px #b93f31;
}

    </style>
</head>
<body>
<form action="" method="POST">
  <h1><span>Halaman</span> Login</h1>
  <?php if (isset($error)) :?>
        <p class="call">Password atau username salah</p>
  <?php endif; ?>
  <input placeholder="Username" type="text" name="username"/>
  <input placeholder="Password" type="password" name="password"/>
  <button class="btn" type="submit" name="login">Log in</button>
  </div>
</form>
<footer>
  <h5>Balik Ke home?<a href="index.php">Tekan disini</a></h5>
</footer>

</body>

<script>
    $(document).ready(function(e){
   $('h6').on('click',function(){
      $('.social').stop().slideToggle();
   });
})
</script>
</html>