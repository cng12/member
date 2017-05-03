<?php
include 'database.php'; 
include 'school.php';
include 'difsearch.php';
?>
<html>
<head>

</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="width:600px; background-color:#ccffdd; text-align:left;">
<h3><center>Edit Data</center></h3><p style="color:blue; text-align:center; font-size:16px;">You can update and delete users' data by entering data in the fields below and then select one of the buttons<br><br></p>
Firstname: <input type="text" name="firstname" ><br><br>
Lastname:  <input type="text" name="lastname" ><br><br>
School:    <select name="school" id="school" >
	<?php
	$obj->displayschools();
	?>
	</select><br><br>
Email:   <input type="text" name="email" ><br><br>

	<table style="background-color:white; border:0px;"><tr style="text-align:center;">
	<td style="width:200px; border:0px;"><a href="submit.php"><input type="button" name="home" value="Home" style="border-radius:50px; background-color: #4CAF50; width:120px;"></a></td>
	<td style="width:200px; border:0px;"><input type="submit" name="update" value="Update" onclick="return confirm('You to update : <?php echo ($_POST["firstname"]). "&nbsp;".($_POST["lastname"]). "&nbsp;".($_POST["school"]). "&nbsp;".($_POST["email"]);?>');"></td>
	<td style="width:200px; border:0px;"><input type="submit" name="delete" value="Delete" onclick="return confirm('Delete? <?php echo $_POST["firstname"];?>');" style="background-color: #f44336; "></td>
	</tr></table>
	</form>
<?php
	
if(isset($_POST['update']))
{
	mysqli_query($conn, "UPDATE `myguests` SET `firstname`='$_POST[firstname]',`lastname`='$_POST[lastname]',`school`='$_POST[school]',`email`='$_POST[email]' WHERE `firstname`='$_POST[firstname]'");
}
if(isset($_POST['delete']))
{
	mysqli_query($conn, "DELETE FROM `myguests` WHERE `firstname`='$_POST[firstname]'");

}	
?>

<form action="delupdis.php" method="post" style="width:600px; background-color:#ccffcc">
<br>
<h3>Search members information</h3><br>
            <input type="text" name="valueToSearch"><br><br>
            <input type="submit" name="search" value="Filter">
            <button type="button" onclick="window.location.href='submit.php'">Add a new member</button>
<br><br>
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>School</th>
					<th>Email</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
				                <tr>
                    <td><?php echo $row['firstname'];?></td>
                    <td><?php echo $row['lastname'];?></td>
                    <td><?php echo $row['school'];?></td>
					<td><?php echo $row['email'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
  </body>
</html>  
