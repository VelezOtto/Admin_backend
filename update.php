<?php
include "config.php";
include "header.php";
if(isset($_GET['u'])):
     if(isset($_POST['bts'])):
          $stmt = $mysqli->prepare("UPDATE products SET product_name=?, product_category=?, product_description=?, product_price=?, product_condition=? WHERE product_id=?");
          $stmt->bind_param('ssssss', $name, $category, $description, $price, $condition, $id);
 
          $name = $_POST['name'];
          $category = implode(', ',$_POST['category']);
          $description = $_POST['description'];
		  $condition = $_POST['condition'];
          $price = $_POST['price'];
          $id = $_POST['id'];
 
          if($stmt->execute()):
               echo "<script>location.href='index.php'</script>";
          else:
               echo "<script>alert('".$stmt->error."')</script>";
          endif;
     endif;
     $res = $mysqli->query("SELECT * FROM products WHERE product_id=".$_GET['u']);
     $row = $res->fetch_assoc();
?>
 
 
 
 
   <p>
</p>
     <div class="panel panel-default">
       <div class="panel-body">
        
  <form role="form" method="post">
    <input type="hidden" value="<?php echo $row['product_id'] ?>" name="id"/>
    <div class="form-group">
      <label for="nm">Name</label>
      <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['product_name'] ?>">
    </div>
    <div class="form-group">
      <label for="category">Category:</label>
      
        <?php echo $row['product_category'] ?>
		<br>
        <input type="checkbox" name="category[]" value="Fashion" checked>Fashion
		<input type="checkbox" name="category[]"  value="jewellery">Jewellery
		<input type="checkbox" name="category[]"  value="Laptop">Laptop<br>
		<input type="checkbox" name="category[]"  value="Software">Software
		<input type="checkbox" name="category[]"  value="Food">Food
		<input type="checkbox" name="category[]"  value="Book">Book
      
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="description" rows="3"><?php echo $row['product_description'] ?></textarea>
    </div>
	    <div class="form-group">
      <label for="price">Price</label>
      <input type="text" class="form-control" name="price" id="price" value="<?php echo $row['product_price'] ?>">
    </div>
	<div class="form-group">
      <label for="condition">Condition:</label>
      <?php echo $row['product_condition'] ?><br>
       
        <input type="radio" name="condition" value="Used"> Used<br>
		<input type="radio" name="condition" value="Renewed"> Renewed <br>
		<input type="radio" name="condition" value="New"> New<br>
      
    </div>
    <button type="submit" name="bts" class="btn btn-default">Submit</button>
  </form>
<?php
endif;
include "footer.php";
?>