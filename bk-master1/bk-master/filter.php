<?php
	// Filter html untuk menghindari kesalahan input user
	function filter_html($var_html) {
		$var_html = htmlentities(strip_tags(trim($var_html)));
		return $var_html;
	}
	
	// Filter SQL agar terhidar dari SQL Injection
	function filter_sql($link, $var_sql) {
		$var_sql = mysqli_real_escape_string($link, $var_sql);
		return $var_sql;	
	}
?>