<?php

$pdo = require "../app/connection.php";

$statements = [
    'CREATE TABLE categories( 
        id INT AUTO_INCREMENT,
        category_name  VARCHAR(100) NOT NULL, 
        category_status VARCHAR(50) NULL, 
        created_date datetime,
        PRIMARY KEY(id)
    );',

    'CREATE TABLE tasks (
        id INT AUTO_INCREMENT, 
        task_title VARCHAR(100),
        task_description TEXT(300),
        due_date datetime NOT NULL,
        task_status VARCHAR(10) NOT NULL,
        category_id INT NOT NULL,
        created_date datetime NOT NULL,
        updated_date datetime NULL,
        PRIMARY KEY(id), 
        FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE 
    );',
];

if ($statements) {
    foreach ($statements as $statement) {
        $pdo->exec($statement);
    }
    return true;
}
