<?php

use Core\Database;


// delete from db
$config = require base_path('config.php');
$db = new Database($config['database']);

$sql = "DELETE FROM tasks WHERE id=:id";

$db->query($sql,[
    ":id" => $_POST['id']
]);

header('location: /');