<?php
	if(isset($_POST["district_id"])) 
	{
		$district_id = $_POST["district_id"];

		// You can replace this code with a database query to retrieve the states for the selected country
		include_once("../dboperation.php");
        $sql="select * from tbl_location where district_id=$district_id";
        $obj=new dboperation();
        $result=$obj->query($sql);
?>
<label for="ddllocation">Location</label>
<select name="ddllocation" id="ddllocation" class="form-control">
<option value="0">--select--</option>
<?php
while($r=mysqli_fetch_array($result))
{
?>

<option value="<?php echo $r["location_id"];?>"><?php echo $r["location"];?></option>
<?php
}
	}
?>
</select>