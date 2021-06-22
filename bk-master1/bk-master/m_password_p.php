<?php
	session_start();
	if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    die();
  }

	include("connection.php");
	include("filter.php");

	if (isset($_POST["submit"])) {

		if ($_POST["submit"]=="SAVE") {
			$error = $message = "";
			$username = filter_html($_POST["username"]);
			$old_password = filter_html($_POST["old_password"]);
			$new_password = filter_html($_POST["new_password"]);

			$username = filter_sql($link,$username);
			$old_password = filter_sql($link,$old_password);
			$new_password = filter_sql($link,$new_password);

			// $old_password_hash = sha1(md5(sha1($old_password)));
			$query_old = "SELECT * FROM user WHERE password = '{$old_password}'";
			$result_old = mysqli_query($link, $query_old);

			if (mysqli_num_rows($result_old) == 0 ) {
				$error = urlencode(base64_encode("Password lama yang anda masukan salah"));
				$username = urlencode(base64_encode($username));
				$old_password = urlencode(base64_encode($old_password));
				$new_password = urlencode(base64_encode($new_password));
				header("Location: m_password.php?error={$error}&username={$username}&old_password={$old_password}&new_password={$new_password}");
			}
			else {
				$data_old = mysqli_fetch_assoc($result_old);
				$old_username = $data_old["username"];

				// $new_password_hash = sha1(md5(sha1($new_password)));
				$query_update = "UPDATE user SET username='{$username}', password='{$new_password}' WHERE username='{$old_username}'";
				$result_update= mysqli_query($link, $query_update);

				$message = urlencode(base64_encode("Data User berhasil di <b>Update</b>"));
				header("Location: m_password.php?message={$message}");
			}

		}

	}
	else {
		header("Location: m_password.php");
	}
?>
