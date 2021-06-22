<?php
  session_start();
  if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    die();
  }

  include("connection.php");
  include("filter.php");

  if (isset($_GET["error"])) {
		$error = base64_decode($_GET["error"]);
		$username = base64_decode($_GET["username"]);
		$old_password = base64_decode($_GET["old_password"]);
		$new_password = base64_decode($_GET["new_password"]);
	}
	else {
		$error = $username = $old_password = $new_password = null;
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Change Password | Pengelolaan Arsip Bimbingan Konseling</title>

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
  </head>

  <body>
    <!-- background -->
      <img class="mybg" src="img/bg.jpg" alt="">
    <!-- end background -->
    <!-- Navbar -->
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#target-list">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand mynavbar-brand">
              <img class="mynavimg" src="img/header1.png" alt="">
              <img class="mynavimg2" src="img/header2.png" alt="">
            </a>
          </div>
          <div class="collapse navbar-collapse" id="target-list">
            <form class="navbar-form navbar-right">
              <div class="form-group myform-group">
                <a href="#" class="btn btn-primary mybtn-active">Change Password</a>
                <a href="logout.php" class="btn btn-danger">Logout</a>
              </div>
            </form>
            <ul class="nav navbar-nav navbar-right mynavbar-nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="m_record.php">Record</a></li>
              <li><a href="m_about.php">About</a></li>
            </ul>
          </div>
        </div>
      </nav>
    <!-- End Navbar -->

    <!-- Content -->
      <div class="container">

        <!--- breadcrumb -->
        <div class="row">
          <div class="col-md-12">
            <ol class="breadcrumb">
              <li><a href="index.php"> <span class="glyphicon glyphicon-home"></span></a></li>
              <li class="active">Change Password</li>
            </ol>
          </div>
        </div>
        <!-- End breadcrumb -->

        <!-- pesan -->
        <div class="row">
          <div class="col-md-12">
            <?php
      				if (isset($_GET["message"])) {
                $message = base64_decode($_GET["message"]);
                echo "<div class=\"alert alert-success\" id='danger'><span class='glyphicon glyphicon-ok'></span> &nbsp;{$message}</div>";
      				}
      			?>
          </div>
        </div>
        <!-- end pesan -->

        <div class="row">

          <div class="col-md-6 col-md-push-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Keterangan</h3>
              </div>
              <div class="panel-body">
                <div id="info" class="alert alert-info">
                  <p><span class='glyphicon glyphicon-info-sign'></span> &nbsp;Username & password tidak boleh kosong</p>
                  <p><span class='glyphicon glyphicon-info-sign'></span> &nbsp;Username & password minimal berisi 8 karakter</p>
                </div>
                <div id="danger" class="alert alert-danger mynone"></div>
                <div id="warning" class="alert alert-warning mynone"></div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-md-pull-6" id="ps">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Change Password</h3>
              </div>
              <div class="panel-body">
                <form action="m_password_p.php" method="post" class="form-horizontal" onsubmit="return validate_input(this)">
                  <div class="form-group">
                    <label for="username" class="col-sm-4 control-label" >Username</label>
                    <div class="col-sm-8">
                      <input name="username" type="text" class="form-control" placeholder="Username"
                        value="<?php echo $username ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="old_password" class="col-sm-4 control-label" >Old Password</label>
                    <div class="col-sm-8">
                      <input name="old_password" type="password" class="form-control" placeholder="Old Password"
                        value="<?php echo $old_password ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="new_password" class="col-sm-4 control-label" >New Password</label>
                    <div class="col-sm-8">
                      <input name="new_password" type="password" class="form-control" placeholder="New Password"
                        value="<?php echo $new_password ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-4">
                      <!-- <button type="submit" name="submit" value="CANCEL" class="btn btn btn-danger"> <span class="glyphicon glyphicon-floppy-remove"></span> Cancel</button> -->
								      <a href="index.php" class="btn btn btn-danger"> <span class="glyphicon glyphicon-floppy-remove"></span> Cancel</a>                      
                      <button type="submit" name="submit" value="SAVE" class="btn btn btn-primary"> <span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>


      </div>
    <!-- End Conten -->

    <!-- Footer -->
      <footer>
        <div class="container text-center">
          <div class="row">
            <div class="col-sm-12">
              <p><span class="glyphicon glyphicon-copyright-mark"></span> Copyright 2018 SMKN 1 Majalaya </p>
            </div>
          </div>
        </div>
      </footer>
    <!-- End Footer -->

  </body>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-3.2.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
  </script>
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
	var new_password = form.new_password.value;
	var old_password = form.old_password.value;

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
	else if (username.length < 8){
    display_none('danger');
    var id ='warning';
    var icon ='glyphicon glyphicon-exclamation-sign';
    var txt ='Panjang Username minimal 8 karater';
    var text = '<span class="'+ icon +'"></span> &nbsp;'+txt;
		display_block(id);
		inner_html(id, text);
		form.username.focus();
		return (false);
	}
	else if (old_password == '') {
    display_none('danger');
    var id ='warning';
    var icon ='glyphicon glyphicon-exclamation-sign';
    var txt ='Password Lama harus di isi';
    var text = '<span class="'+ icon +'"></span> &nbsp;'+txt;
		display_block(id);
		inner_html(id, text);
		form.old_password.focus();
		return (false);
	}
	else if (new_password == '') {
    display_none('danger');
    var id ='warning';
    var icon ='glyphicon glyphicon-exclamation-sign';
    var txt ='Password Baru harus di isi';
    var text = '<span class="'+ icon +'"></span> &nbsp;'+txt;
		display_block(id);
		inner_html(id, text);
		form.new_password.focus();
		return (false);
	}
	else if (new_password.length < 8) {
    display_none('danger');
    var id ='warning';
    var icon ='glyphicon glyphicon-exclamation-sign';
    var txt ='Panjang Password minimal 8 karater';
    var text = '<span class="'+ icon +'"></span> &nbsp;'+txt;
		display_block(id);
		inner_html(id, text);
		form.new_password.focus();
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
      echo "form.old_password.focus();";
    echo "</script>";
	}
?>
