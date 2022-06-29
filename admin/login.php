<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NVT điện máy</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/bootstrap-table.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<?php
	if (isset($_POST['sbm'])) {
		$mail = $_POST['mail'];
		$pass = $_POST['pass'];
		$sql = "SELECT*FROM employeei WHERE user_mail = '$mail' AND user_pass = '$pass' ";
		$query = mysqli_query($conn, $sql);
		$num_row = mysqli_num_rows($query);
		if ($num_row > 0) {
			$_SESSION['mail'] = $mail;
			$_SESSION['pass'] = $pass;
			
			header("location: index.php");
		} else {
			$err = '<div class="alert alert-danger">Tài khoản không hợp lệ !</div>';
			
			// if (isset($_SESSION['time_failed'])) {
			// 	$time = 60 - (time() - $_SESSION['time_failed']);
			// }

			if (isset($_COOKIE['login_failed'])) {
				if ($_COOKIE['login_failed'] < 2) {
					$num_failed = $_COOKIE['login_failed'] + 1;
					setcookie('login_failed', $num_failed, time() + 15);
				} else {
					// $err_lock = "<div class='alert alert-danger'>Tài khoản bị khóa. Vui lòng đăng nhập lại sau <span id='time'></span> giây </div>";
					$err_lock = "<div class='alert alert-danger'>Tài khoản bị khóa. Vui lòng đăng nhập lại sau <span id='time'></span> giây </div>";
				}
			} else {
				setcookie('login_failed', 1, time() + 15);
			}
		}
	}
	?>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">NVT Computer</div>
				<div class="panel-body">
					<!-- error -->
					<?php
					if (isset($err) && !isset($err_lock)) {
						echo $err;
					}
					?>
					<form role="form" method="post" name="form1" id="form1">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="mail" type="email" autofocus>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mật khẩu" name="pass" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Nhớ tài khoản
								</label>
							</div>

							<?php
							if (isset($err_lock)) {
								echo $err_lock;
							} else {
							?>
								<button type="submit" name="sbm" class="btn btn-primary">Đăng nhập</button>
							<?php } ?>

							<script>
								var a = 16;
								function timelock() {
									a--;
									if (a != 0) {
										document.getElementById('time').innerHTML = a;
										setTimeout("timelock()", 1000);
									} else {
										<?php
										header('refresh: 16 ');
										?>
									}
								}
								timelock();
							</script>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
</body>

</html>