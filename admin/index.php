<!DOCTYPE html>
<html>
<head>

	<title>Restoran</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
	<style type="text/css">
		body {
  background: #f4f4f4;
  background-image: url(restoran.jpg);
}

.container {
  margin-top: 30px
}
form {
  max-width: 350px;
  width: 100%;
  margin: 40px auto;
  background: #fff;
  position: relative;
  box-shadow: 0 5px 5px 0 rgba(50, 50, 50, 0.7);
}

.form-Wrapper::before, .form-Wrapper::after {
  background: #fff none repeat scroll 0 0;
  border: 1px solid #ccc;
  content: "";
  height: 100%;
  left: 0;
  position: absolute;
  top: 3.5px;
  transform: rotateZ(8deg);
  width: 100%;
  z-index: -1;
}
.form-group {
  padding: 20px 0;
  position: relative;
  margin-bottom: 0;
}
.form-control, .form-control:focus {
  border: none;
  box-shadow: none;
  padding-left: 0;
  border-bottom: 1px solid rgba(0, 0, 0, 0.26);
  border-radius: 0
}
.form-group label {
  position: absolute;
  width: 100%;
  left:0;
  right: 0;
  bottom: 0;
  overflow: hidden;
  top: 4px;
  color: rgba(0, 0, 0, 0.26);
}
.form-group.focused label {
  transition-duration: 0.2s;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  top: 4px;
  color: #ff6c00;
}

.form-group label::after {
  background-color: #ff6c00 ;
  bottom: 14px;
  content: "";
  height: 2px;
  left: 45%;
  position: absolute;
  transition-duration: 0.2s;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  visibility: hidden;
  width: 10px;
}

form h2 {
  color: #ff6c00;
  font-style: italic;
  text-align: center;
  text-transform: ;
  margin-bottom: 30px;
  background: rgba(0, 0, 0, 0.26);
  padding: 5px 0;
 
}
.form-Wrapper {
    padding: 20px;
}

.form-group.focused label::after {
  left: 0;
  visibility: visible;
  width: 100%;
}
button.btn {
  background: #ff6c00;
  border: none;
  border-radius: 0;
  text-transform: uppercase;
 font-weight: bold;
  width: 180px;
  height: 45px;
  margin: 30px auto;
  display: block;
}
button.btn:hover, button.btn:focus {
  background:#e96800;
}

/*for slideDown animation*/

.slideDown {
    animation-duration: 1.5s;
    animation-name: slideDown;
    animation-timing-function: ease;
    visibility: visible !important;
}
@keyframes slideDown {
0% {
    transform: translateY(-100%);
}
50% {
    transform: translateY(8%);
}
65% {
    transform: translateY(-4%);
}
80% {
    transform: translateY(4%);
}
95% {
    transform: translateY(-2%);
}
100% {
    transform: translateY(0%);
}
}
	</style>
</head>
<body>
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert alert-warning'>
  <strong>Danger!</strong> Username Dan Password Salah!.
</div>";
		}
	}
	?>
<div class='container'>
  <div class='row'>
    <div class='col-md-12'>
    <form class="slideDown" action="cek_login.php" method="post">
      <h2>login Administrator</h2>
      <div class="form-Wrapper">
        <div class="form-group">            
            <input type="text" class="form-control" name="username" id="inputEmail">
          <label for="inputEmail">Username</label>
        </div>
        <div class="form-group">           
            <input type="password" class="form-control" name="password" id="inputPassword">
           <label for="inputPassword">Password</label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>
    </div>
  </div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function($) {

 $(".form-control").focus(function(){
   $(this).parent().removeClass("not-focused");
   $(this).parent().addClass("focused");

  }).blur(function(){
       $(this).parent().removeClass("focused");
   $(this).parent().addClass("not-focused");
  })

}); 
</script>
</body>
</html>