<?php
error_reporting(0);
session_start();
include("connectionclass.php");

include("header.php");

$status=$_REQUEST['status'];
if($status=="already")
{
?>	
	<script type="text/javascript">
	alert("Already Joined");
	</script>
	
<?php	
}
if($status=="success")
{
?>	
	<script type="text/javascript">
	alert("Successfully Joined");
	</script>
	
<?php	
}


?> 







<div class="col-sm-6">
<br />
 <br>Share your thoughts....<br>
 <?php
 include("spama.php");
 ?>

 <span style="color:#F00;">Posts</span><br>
 
 <?php
 
 $query="select * from activity where status='none' order by id desc";
$res=mysqli_query($con,$query);
while($row=mysqli_fetch_array($res))
 {
	$email=$row['user'];
	//echo $email;
	$res9=mysqli_query($con,"SELECT * from profile_tb where email='$email'");
	$arr9=mysqli_fetch_array($res9);
	$pic=$arr9['profile_pic'];
	//echo $pic;
 ?>
 <table width="100%">
 <tr>
 <?php
 if($row['status']=="none")
 {
echo "<td class='alert alert-success'>";
 }
 else
 {
	 echo "<td class='alert alert-danger'>";
	 
 }
 ?>
 <button style="background-color:#4a85d9;color:white;border-radius:50px;">
 <img src="<?php echo $pic; ?>" width="40px" height="40px" style="border-radius:6px;">
</button>
	<?php 
 echo $row['user']; ?>
<br>
<br>
<font color="black">
 <?php
 echo "MESSAGE:".$row['msg']."<br>".$row['date']; ?> 
</font> 
</td>
 
 </tr>
 </table>
 <br>
 <?php
 }?>
 
 
 
  
  
  </div>
  
  
  
  <?php
  include("right.php");
  
  ?>