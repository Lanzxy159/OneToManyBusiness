<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BUSINESS</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>BUSINESS MANAGEMENT APPLICATION</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="">Add Category Name</label> 
			<input type="text" name="business_cat"> 
			<input type="submit" name="insertBusinessCategory">
		</p>
		<p>
		
		</p>
		<p>
	</form>


	
    <?php $getAllbusiness_category =  getAllbusiness_category($pdo)?>

	<?php foreach ($getAllbusiness_category as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 120px; margin-top: 20px; padding-left: 10px;">
		<h3>Category ID: <?php echo $row['business_cat_id']; ?></h3>
		<h3>Category: <?php echo $row['business_cat']; ?></h3>
		<a href="viewbusiness.php?business_cat_id=<?php echo $row['business_cat_id']; ?>">View business</a>
		<a href="editbusinesscategory.php?business_cat_id=<?php echo $row['business_cat_id']; ?>">Edit</a>
		<a href="deletebusinesscategory.php?business_cat_id=<?php echo $row['business_cat_id']; ?>">Delete</a>


	</div> 
	<?php } ?>



</body>
</html>