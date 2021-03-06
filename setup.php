<!DOCTYPE HTML>
<?PHP
	require_once 'functions.php';
	session_start();
	
	if(isset($_POST['dbSetup'])){
		
		// Sanitize user input
		$_SESSION['db_host'] = sanitize($_POST['db_host']);
		$_SESSION['db_user'] = sanitize($_POST['db_user']);
		$_SESSION['db_pass'] = sanitize($_POST['db_pass']);
		$_SESSION['db_name'] = sanitize($_POST['db_name']);
		$_SESSION['db_type'] = sanitize($_POST['db_type']);
				
		// Create Database
		require "setup_dbcreate.php";
		
		// Forward to setup-dbimport.php
		header ('Location:setup_dbimport.php');
	}
?>

<html>
	<?PHP includeHead('Microfinance Management', 0) ?>	
		<link rel="stylesheet" type="text/css" href="css/setup.css" />
		<div style="width:850px; margin: 0px auto;">
		<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</div>
	</head>
	<body>
		<div class="content_center">
			<img src="ico/mangoo_l.png" style="width:380px; margin-top:3em; margin-bottom:2em;"/>
			<p class="heading">mangoO Setup Assistant</p>
			
			<div class="setup">
				<p>Database Setup</p>
				<form action="setup.php" method="post" onsubmit="return validate(this)">
					<input type="text" name="db_host" placeholder="Database Host" required="required" />
					<input type="text" name="db_user" placeholder="Database User" required="required" />					
					<input type="password" name="db_pass" placeholder="Database Password" />
					<input type="text" name="db_name" placeholder="Database Name" required="required" />
					<select name="db_type">
						<option value="1">Fresh Database</option>
						<option value="2">Test Database</option>
					</select>
					<input type="submit" name="dbSetup" value="Setup" />
				</form>
			</div>
		</div>
	</body>
</html>