<?php
class Main{
	const school = "college";
	
	protected $schools = array ("college" => "college", "highschool" => "highshool");
	
	public function displayschools(){
		if(isset($_POST['school'])){
		foreach($this->schools as $key=>$value){
			if($key == $_POST['school']){
			echo "<option value='$key' selected='selected'>$value</option>";
			}else{
			echo "<option value='$key'>$value</option>";
			}
		}
	}else{
		foreach($this->schools as $key=>$value){
			if($key == self::school){
				echo "<option value='$key' selected='selected'>$value</option>";
			}else{
				echo "<option value='$key'>$value</option>";

			}
		}
	}
}
}
$obj = new Main();
?>
<form action="" method="post">

	</form>
	