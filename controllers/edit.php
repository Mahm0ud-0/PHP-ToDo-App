<?php

use Core\Database;

// invert the boolean value then cast it to int
$done = (int)!$_POST['done'];

// update record in db
$config = require base_path('config.php');
$db = new Database($config['database']);

$sql = "UPDATE tasks SET done = :done WHERE id=:id";


$db->query($sql,[
    ":id" => $_POST['id'],
    ":done" => $done
]);

header('location: /');