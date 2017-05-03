<?php
include 'database.php'; 
include 'school.php';
?>
<html>
<head>

</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="width:600px; background-color:#ffffe6">
<h1><center>New member</center></h1>
Firstname: <input type="text" name="firstname" required><br><br>
Lastname:  <input type="text" name="lastname" required><br><br>
School:    <select name="school" id="school" >
	<?php
	$obj->displayschools();
	?>
	</select><br><br>
Email:   <input type="text" name="email" required><br><br>

	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Submit" >
	<input type="submit" name="update" value="Edit Data" onclick="window.location.href='delupdis.php'">
	</form>
<?php
if(isset($_POST['submit']))
{
	mysqli_query($conn, "INSERT INTO `myguests`(`firstname`, `lastname`, `school`, `email`) VALUES ('$_POST[firstname]','$_POST[lastname]','$_POST[school]','$_POST[email]')");

	if(mysqli_affected_rows($conn) > 0){
	echo "<p>Employee Added</p>";
header( 'Location: http://localhost/test/membertable/success.php' ) ;
} else {
	echo "Employee NOT Added<br />";
	echo mysqli_error ($conn);
	header( 'Location: http://localhost/test/membertable/fail.php');
}
 }
$conn->close();
	
?>
  </body>
</html>  
