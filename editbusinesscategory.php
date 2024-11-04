
<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="index.php">Return to Category</a>
	<?php $getBusinessCategory = getBusinessCategory($pdo, $_GET['business_cat_id']); ?>
	<h1>Edit the category!</h1>
	<form action="core/handleForms.php?business_cat_id=<?php echo $_GET['business_cat_id']; ?>" method="POST">
		<p>
			<label for="Category">Category</label> 
			<input type="text" name="business_cat" value="<?php echo $getBusinessCategory['business_cat']; ?>">
		</p>
		<p>
			<input type="submit" name="editCategory">
		</p>
	</form>
</body>
</html>
