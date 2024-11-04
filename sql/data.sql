CREATE TABLE business_application (
    business_cat_id INT AUTO_INCREMENT PRIMARY KEY,
    business_cat VARCHAR(50)
);

CREATE TABLE business_details (
    Business_id INT AUTO_INCREMENT PRIMARY KEY,
    Business_owner VARCHAR(50),
    Business_name VARCHAR(50),
    Branch VARCHAR(50),
    business_cat_id INT,
);
