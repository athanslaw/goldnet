<?php 
session_start();
		unset($_SESSION["logged"]);
		unset($_SESSION['role']);
		unset($_SESSION['userid']);	
		unset($_SESSION['duration']);	
		unset($_SESSION['regno']);	
		unset($_SESSION['cname']);	
		unset($_SESSION['sessions']);
		unset($_SESSION['subject']);
		header('Location:index.php');
		exit();
?>
<html >
<script type="text/javascript">
function reloads(){
  parent.document.location = "index.php";
  }
</script>
<title></title>

<body >
</body>
</html>
