<?php
  if (isset($_POST["submit"])) {
    $username = htmlentities(strip_tags(trim($_POST["username"])));
    $password = htmlentities(strip_tags(trim($_POST["password"])));

    $error = "";

    include("connection.php");

    $username = mysqli_real_escape_string($link,$username);
    $password = mysqli_real_escape_string($link,$password);

    $query = "SELECT * FROM user WHERE username = '$username'
              AND password = '$password'";
    $result = mysqli_query($link,$query);

    if (mysqli_num_rows($result) == 0 )  {
      $error .= "Username atau Password tidak sesuai";
    }

    mysqli_free_result($result);
    mysqli_close($link);

    if ($error === "") {
      session_start();
      $_SESSION["user"] = $username;
      header("Location: index.php");
    }

  }
  else {
		$error = "";
		$username = "";
		$password = "";
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login | Pengelolaan Arsip Bimbingan Konseling</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="icon" href="img/logo.png">
    <style media="screen">

    </style>
  </head>

  <body class="mylogbody">
  <!-- background -->
    <img class="mybg" src="img/bg.jpg" alt="">
  <!-- end background -->
  <!-- Content -->
    <div class="container">
      <div class="row">
          <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <img src="img/header3.png" alt="" class="img-responsive">
              </div>
              <div class="panel-body mylogpanbody">
                <div id="danger" class="alert alert-danger mynone"></div>
                <div id="warning" class="alert alert-warning mynone"></div>

                <form action="login.php" method="post" onsubmit="return validate_input(this)">
                  <div class="form-group input-group">
                    <span class="input-group-btn">
                      <a class="btn btn-default btn-lg disabled" type="button"><span class="glyphicon glyphicon-user"></span></a>
                    </span>
                    <input type="text" class="form-control input-lg" name="username" id="username" placeholder="Username" value="<?php echo $username;  ?>">
                  </div>
                  <div class="form-group input-group">
                    <span class="input-group-btn">
                      <a class="btn btn-default btn-lg disabled" type="button"><span class="glyphicon glyphicon-lock"></span></a>
                    </span>
                    <input type="password" class="form-control input-lg" name="password" placeholder="Password" value="<?php echo $password;  ?>">
                  </div>
                  <input class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Login">
                </form>
              </div>
              <div class="panel-footer panel-primary text-center mylogpanfoot">
                <span class="glyphicon glyphicon-copyright-mark"></span>
                Copyright 2018 SMKN 1 Majalaya
              </div>
            </div>
          </div>
      </div>

    </div>
  <!--- End Content --->

  </body>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-3.2.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</html>
<script>
function display_block(id) {
	document.getElementById(id).style ="display: block";
}
function display_none(id) {
	document.getElementById(id).style ="display: none";
}
function inner_html(id, inn) {
	document.getElementById(id).innerHTML = inn;
}

function validate_input(form) {
	var username = form.username.value;
	var password = form.password.value;

	if (username == ''){
    display_none('danger');
    var id ='warning';
    var icon ='glyphicon glyphicon-exclamation-sign';
    var txt ='Username harus di isi';
    var text = '<span class="'+ icon +'"></span> &nbsp;'+txt;
		display_block(id);
		inner_html(id, text);
		form.username.focus();
		return (false);
	}
	else if (password == '') {
    display_none('danger');
    var id ='warning';
    var icon ='glyphicon glyphicon-exclamation-sign';
    var txt ='Password harus di isi';
    var text = '<span class="'+ icon +'"></span> &nbsp;'+txt;
		display_block(id);
		inner_html(id, text);
		form.password.focus();
		return (false);
	}
	else {
		return (true);
	}
}
</script>
<?php
	if ($error) {
    echo "<script>";
      echo "var id ='danger';";
      echo "var icon ='glyphicon glyphicon-warning-sign';";
      echo "var txt ='<span class=\"glyphicon glyphicon-warning-sign\"></span> &nbsp;{$error}';";
      echo "display_block(id);";
      echo "inner_html(id, txt);";
      echo "form.password.focus();";
    echo "</script>";
	}
?>
