<?php



function insertIntoUsersRecords($pdo, $businessOwner, $businessName, $branch, $categoryId){
    $sql = "INSERT INTO business_details (Business_owner, Business_name, Branch, 
		business_cat_id) VALUES(?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$businessOwner, $businessName, $branch, 
		$categoryId]);

	if ($executeQuery) {
		return true;
	}

} 


function insertNewCategory($pdo, $business_category){
    $sql = "INSERT INTO business_application (business_cat) VALUES(?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$business_category]);

	if ($executeQuery) {
		return true;
	}

}




function getBusinessCategories($pdo) {
    $sql = "SELECT * FROM business_application";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}


function getAllbusiness_category($pdo) {
	$sql = "SELECT * FROM business_application";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}
function getBusiness_details($pdo, $business_cat_id) {
    $sql = "SELECT 
                business_details.Business_id AS `Business_id`,
                business_details.Business_owner AS `Business_owner`,
                business_details.Business_name AS `Business_name`,
                business_details.Branch AS `Branch`,
                business_details.business_cat_id AS `business_cat_id`,
                business_application.business_cat AS `business_cat`
            FROM business_details
            JOIN business_application ON business_details.business_cat_id = business_application.business_cat_id
            WHERE business_details.business_cat_id = ? 
            ";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$business_cat_id]);

    if ($executeQuery) {
        return $stmt->fetchAll(); 
    }
    return []; 
}
function getBusinessbyId($pdo, $Business_id) {
    $sql = "SELECT 
                business_details.Business_id AS Business_id,
                business_details.Business_owner AS Business_owner,
                business_details.Business_name AS Business_name,
                business_details.Branch AS Branch,
                business_application.business_cat AS Business_Category
            FROM business_details
            JOIN business_application ON business_application.business_cat_id = business_details.business_cat_id
            WHERE business_details.Business_id = ? 
            GROUP BY business_details.Business_name";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$Business_id]);
    if ($executeQuery) {
        return $stmt->fetch();
    }
    return null; 
}


function updateProject($pdo, $Business_owner,$Business_name,$Branch, $Business_id){
        $sql = "UPDATE business_details
        SET Business_owner = ?,
        Business_name = ?,
        Branch =?
        WHERE Business_id = ?
        ";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$Business_owner, $Business_name,$Branch, $Business_id]);

    if ($executeQuery) {
    return true;
    }
}


function deletebusiness($pdo, $Business_id){
    $sql = "DELETE FROM business_details WHERE Business_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$Business_id]);
	if ($executeQuery) {
		return true;
	}
}

function getBusinessCategory($pdo,$business_cat_id){
    $sql = "SELECT * FROM business_application WHERE business_cat_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$business_cat_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateCategory($pdo, $business_cat, $business_cat_id){
    $sql = "UPDATE business_application
				SET business_cat = ?
				WHERE business_cat_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$business_cat, $business_cat_id ]);
	
	if ($executeQuery) {
		return true;
	}
    
    
}
function deleteCategory($pdo,$business_cat_id){
    $sql = "DELETE FROM business_application WHERE business_cat_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$business_cat_id]);
	if ($executeQuery) {
		return true;
	}
}

?>
