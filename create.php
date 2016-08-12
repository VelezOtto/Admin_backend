<?php
include "config.php";
include "header.php";
?>
<a href="index.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Back</a>
<?php
if(isset($_POST['bts'])):
  if($_POST['name']!=null && $_POST['category']!=null && $_POST['description']!=null  && $_POST['price']!=null && $_POST['condition']!=null){
     $stmt = $mysqli->prepare("INSERT INTO products(product_name,product_category,product_description,product_price,product_condition) VALUES (?,?,?,?,?)");
     $stmt->bind_param('sssss', $name, $category, $description, $price, $condition);
 
     $name = $_POST['name'];
     $category = implode(',',$_POST['category']);
     $description = $_POST['description'];
     $condition = $_POST['condition'];
	 $price = $_POST['price'];
 
     if($stmt->execute()):
?>
<p></p>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong>Success!</strong> Click Home to return <a href="index.php">Home</a>.
</div>
<?php
     else:
?>
<p></p>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong>Error!</strong> please try again.<?php echo $stmt->error; ?>
</div>
<?php
     endif;
  } else{
?>
<p></p>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong>Error!</strong> Please fill in everything
</div>
<?php
  }
endif;
?>
 
     <p>
</p>
     <div class="panel panel-default">
       <div class="panel-body">
        
  <form role="form" method="post">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
    </div>
    <div class="form-group">
      
       <label for="category">Category:</label><br>
      
        <input type="checkbox" name="category[]" value="Fashion" checked>Fashion
		<input type="checkbox" name="category[]"  value="jewellery">Jewellery
		<input type="checkbox" name="category[]"  value="Laptop">Laptop<br>
		<input type="checkbox" name="category[]"  value="Software">Software
		<input type="checkbox" name="category[]"  value="Food">Food
		<input type="checkbox" name="category[]"  value="Book">Book
      
    </div>
    </div>
	<div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="description" rows="3" placeholder="Write a description"></textarea>
    </div>
    <div class="form-group">
      <label for="price">Price</label>
      <input type="text" class="form-control" name="price" id="price" placeholder="Enter Price">
    </div>
      <div class="form-group">
      <label for="condition">Condition</label><br>
      
        <input type="checkbox" name="condition" value="Used"> Used<br>
		<input type="checkbox" name="condition" value="Renewed"> Renewed <br>
		<input type="checkbox" name="condition" value="New"> New<br>
      
    </div>  
    <button type="submit" name="bts" class="btn btn-default">Submit</button>
  </form>
<?php
include "footer.php";
?>