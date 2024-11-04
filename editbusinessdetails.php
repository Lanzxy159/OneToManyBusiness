<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	
	<a href="viewbusiness.php?business_cat_id=<?php echo $_GET['business_cat_id']; ?>">
	View The Businesses</a>
	<h1>Edit the Businesses!</h1>
	<?php $getBusinessbyId = getBusinessbyId($pdo, $_GET['Business_id']); ?>
	<form action="core/handleForms.php?business_cat_id=<?php echo $_GET['business_cat_id']; ?>
	&Business_id=<?php echo $_GET['Business_id']; ?>" method="POST">
		<p>
			<label for="Owner">Owner</label> 
			<input type="text" name="Business_owner" 
			value="<?php echo $getBusinessbyId['Business_owner']; ?>">
		</p>
        <p>
			<label for="Name">Business Name</label> 
			<input type="text" name="Business_name" 
			value="<?php echo $getBusinessbyId['Business_name']; ?>">
		</p>
		<p>
			<label for="Branch">Branch</label> 
			<input type="text" name="Branch" 
			value="<?php echo $getBusinessbyId['Branch']; ?>">
			<input type="submit" name="editDetails">
		</p>
	</form>
</body>
</html>