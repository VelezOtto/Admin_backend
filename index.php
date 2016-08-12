<?php
include "config.php";
include "header.php";
?>
<p>
<a href="create.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Data</a>
 
</p>
<table id="ghatable" class="display table table-bordered table-stripe" cellspacing="0" width="100%">
<thead>
     <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Category</th>
          <th>Description</th>
          <th>Price</th>
		  <th>Condition</th>
          <th>Action</th>
     </tr>
</thead>
<tbody>
<?php
$res = $mysqli->query("SELECT * FROM products");
while ($row = $res->fetch_assoc()):
?>
     <tr>
          <td><?php echo $row['product_id'] ?></td>
          <td><?php echo $row['product_name'] ?></td>
          <td><?php echo $row['product_category'] ?></td>
          <td><?php echo $row['product_description'] ?></td>
          <td><?php echo $row['product_price'] ?></td>
		  <td><?php echo $row['product_condition'] ?></td>
          <td>
          <a href="update.php?u=<?php echo $row['product_id'] ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
          <a onclick="return confirm('Are you sure you want to delete?')" href="delete.php?d=<?php echo $row['product_id'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>
          </td>
     </tr>
<?php
endwhile;
?>
</tbody>
</table>     
<?php
include "footer.php";
?>