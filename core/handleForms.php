

<?php 
require_once 'dbConfig.php'; 
require_once 'models.php';



if (isset($_POST['insertBusinessCategory'])) {
    $business_category = trim($_POST['business_cat']);
    if (!empty($business_category)) {
        $query = insertNewCategory($pdo, $business_category);

        if ($query) {
            header("Location: ../index.php");
            exit();
        } else {
            echo "Insert failed. Please try again.";
        }
    } else {
        echo "Make sure that all fields are filled.";
    }
};



if (isset($_POST['insertBusinessDetails'])) {
    $businessOwner = trim($_POST['business_owner']);
    $businessName = trim($_POST['business_name']);
    $branch = trim($_POST['business_branch']);
    $categoryId = trim($_POST['business_category']); 

    if (!empty($businessOwner) && !empty($businessName) && !empty($branch) && !empty($categoryId)) {
      
        $query = insertIntoUsersRecords($pdo, $businessOwner, $businessName, $branch, $categoryId);

        if ($query) {
            header("Location: ../index.php");
            exit();
        } else {
            echo "Insert failed. Please try again.";
        }
    } else {
        echo "Make sure that all fields are filled.";
    }
};

if (isset($_POST['editDetails'])) {
	$query = updateProject($pdo, $_POST['Business_owner'], $_POST['Business_name'], $_POST['Branch'], $_GET['Business_id']);

	if ($query) {
		header("Location: ../viewbusiness.php?business_cat_id=".$_GET['business_cat_id']);
	}
	else {
		echo "Update failed";
	}

}


if (isset($_POST['deletebusiness'])) {
	$query = deletebusiness($pdo, $_GET['Business_id']);

	if ($query) {
		header("Location: ../viewbusiness.php?business_cat_id=".$_GET['business_cat_id']);
	}
	else {
		echo "Deletion failed";
	}
}



if (isset($_POST['editCategory'])) {
	$query = updateCategory($pdo, $_POST['business_cat'], $_GET['business_cat_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Update failed";;
	}

}


if (isset($_POST['deleteCategory'])) {
	$query = deleteCategory($pdo, $_GET['business_cat_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Delete failed";;
	}

}

?>