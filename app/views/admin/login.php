<?php 
  session_start();
  if(isset($_SESSION['email'])){
    header("location: location: ../admin/index");
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <title>Login</title>
</head>
<body>
    <div class="alert alert-warning" role="alert">
    </div>
 
    <div class="container">
      <form action="<?php echo BASEURL;?>/admin/loginCheck" method="POST" class="login-email" enctype="multipart/form-data" autocomplete="on">
            <p class="multi-bg"  ></p>
            <div class="error-alert">

            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="" required>
            </div>
            <div id= "btnsubmit" class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
            <!-- <p class="login-register-text">Sudah punya akun? <a  href="register.php">Register</a></p>    -->
            
            <!-- <button name="register" id="register" class="btnRegis" href="register.php">Register</button> -->
            

        </form>
        
        
        
    </div>
</body>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap');

input {
  caret-color: red;
}
p{
    margin-top: 20px;
    color: white;
}

.multi-bg{
    height: 90px;
      display: block;
      background-color: #808;
      background-image:url('<?php echo BASEURL;?>/img/logo.svg');
    background-repeat: no-repeat;
      background-size: cover;
      margin-top: 5px;
      margin-bottom: 40px;
}

body {
  margin: 0;
  width: 100vw;
  height: 100vh;
  background: #CDCDCD;
  display: flex;
  align-items: center;
  text-align: center;
  justify-content: center;
  place-items: center;
  overflow: hidden;
  font-family: poppins;
  background: "assets/img/background.png";
}

.container {
  position: relative;
  width: 350px;
  height: 445px;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #000000;
  box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
}

.inputs {
  text-align: left;
  margin-top: 30px;
}

label, input, button {
  display: block;
  width: 100%;
  padding: 0;
  border: none;
  outline: none;
  box-sizing: border-box;
}

label {
  margin-bottom: 4px;
}

label:nth-of-type(2) {
  margin-top: 12px;
}

input::placeholder {
  color: gray;
}

input {
    margin-top: 15px;
  background: #ecf0f3;
  padding: 10px;
  padding-left: 20px;
  height: 50px;
  font-size: 14px;
  border-radius: 50px;
  box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
}

button {
  color: white;
  margin-top: 15px;
  background: #FF8000;
  height: 40px;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 900;
  box-shadow: 3px 3px 5px grey;;
  transition: 0.5s;
}
.btnRegis{
color: black;
  margin-top: 10px;
  background: #FFFFFF;
  height: 40px;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 900;
  box-shadow: 3px 3px 5px grey;;
  transition: 0.5s;
}
a{
    color: #FF8000;
  margin-top: 15px;
  cursor: pointer;
  font-weight: 900;
  transition: 0.5s;
  font-style:italic;
  font-weight:normal;
}

button:hover {
  box-shadow: none;
}


h1 {
  position: absolute;
  top: 0;
  left: 0;
}
    </style>

<script src="<?php echo BASEURL;?>/js/login.js"></script>

</html>