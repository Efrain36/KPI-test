CREATE TABLE form_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    company VARCHAR(255),
    country VARCHAR(255) NOT NULL,
    prefix VARCHAR(255) NOT NULL,
    phoneNumber VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);
