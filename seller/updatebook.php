<?php
session_start();
if ($_SESSION['accesslevel']!='seller') {
	header('location: ../login.php');
}

//database operation
include "../dbconnect.php";

if(isset($_POST['btn_updatebook'])){

	$bookid=$_SESSION['idbook'];
	$price=$_POST['price'];
	$bookname=$_POST['bookname'];
	$bookcodesubject=$_POST['bookcodesubject'];

//sql update
$sql="UPDATE orderbook SET 
		price='price', bookname='bookname', bookcodesubject='bookcodesubject' WHERE idbook='$bookid'";

$rs=mysqli_query($conn,$sql);
	if($rs==true){
		echo "Record saved";
		header('Location: listing.php?success=saved');
		exit();	
	}else{
		echo "Cannot save record";
		exit();
	}
}//end isset
//updatebook.php
include "header.template.php";
?>
<div class="card o-hidden border-0 shadow-lg my-1"  >
 <div class="card-header py-3" >
 <h5 class="m-0  font-weight-bold text-primary">Update Book</h5>
 </div>
  <div class="card-body p-0" >
    <!-- card padding -->
    <div class="p-4">
    <!-- form start -->
    <form class="user" method="post" action="listing.php">

	    <!-- ISBN textbox -->
	    <div class="form-row">
	      <div class="form-group col-md-7">
	        <label  for="title">Price</label>
	        <input name="price" type="text"  class="form-control form-control" id="title" placeholder="price" required>
	       </div>
	     </div>
	     <!-- Book Name textbox -->
	     <div class="form-row">
	       <div class="form-group col-md-4">
	         <label for="starttime">Book Name</label>
	         <input name="bookname" type="text" class="form-control form-control" id="starttime" placeholder="book name" required>
	       </div>
	       <!-- Book code subject textbox -->
	       <div class="form-group col-md-4">
	          <label for="endtime">Book Code Subject</label>
	          <input name="bookcodesubject" type="text" class="form-control form-control" id="endtimes" placeholder ="book code subject" required>
	       </div>
	     </div>
	     <hr>   
	     <div align="right">
	       <div  class="col-md-2">
	         <input class="btn btn-success" type="submit" name="btn_updatebook" value="Save Update">
	       </div>
	     </div>
    </form>
    <!-- close card padding -->
    </div>  
    <!-- close card element-->
  </div>
</div>

<?php
include "footer.template.php";
?>