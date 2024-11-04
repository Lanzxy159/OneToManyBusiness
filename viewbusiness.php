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
	<a href="index.php">Return to home</a>


	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="business_owner">Business Owner</label> 
			<input type="text" name="business_owner">
		</p>
		<p>
			<label for="business_name">Business Name </label> 
			<input type="text" name="business_name">
		</p>
		<p>
			<label for="business_branch">Branch</label> 
			<input type="text" name="business_branch">
		</p>
		<p>

		<?php $getBusinessCategories = getBusinessCategories($pdo); ?>
		<div>
			<label for="businessCategory">Business Category</label>
			<select name="business_category" id="businessCategory" onchange="toggleOtherInput()">
				<?php foreach ($getBusinessCategories as $row): ?>
					<option value="<?php echo ($row['business_cat_id']); ?>">
						<?php echo ($row['business_cat']); ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
        </p>
		<p>
			<input type="submit" name="insertBusinessDetails">
		</p>
	</form>


	<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Business ID</th>
	    <th>Business Owner</th>
	    <th>Business Name</th>
	    <th>Branch</th>
	    <th>Category</th>   
	    <th>Category ID</th>
	  </tr>
	  <?php $getBusiness_details = getBusiness_details($pdo, $_GET['business_cat_id']); ?>
	  <?php foreach ($getBusiness_details as $row) { ?>
	  <tr>
        <td><?php echo ($row['Business_id']); ?></td>
        <td><?php echo ($row['Business_owner']); ?></td>
        <td><?php echo ($row['Business_name']); ?></td>
        <td><?php echo ($row['Branch']); ?></td>
        <td><?php echo ($row['business_cat']); ?></td>
        <td><?php echo ($row['business_cat_id']); ?></td>
		<td>
	  		<a href="editbusinessdetails.php?Business_id=<?php echo $row['Business_id']; ?>&business_cat_id=<?php echo $_GET['business_cat_id']; ?>">Edit</a>
	  		<a href="deletebusinessdetails.php?Business_id=<?php echo $row['Business_id']; ?>&business_cat_id=<?php echo $_GET['business_cat_id']; ?>">Delete</a>


	  	</td>	  


	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>