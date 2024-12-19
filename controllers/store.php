<?php

use Core\Database;

$task = trim($_POST['task']);

if ($task) {
    // inser into db
    $config = require base_path('config.php');
    $db = new Database($config['database']);

    $sql = "INSERT INTO tasks (body,done) VALUES (:task,:done)";

    $db->query($sql, [
        ":task" => $task,
        ":done" => 0,
    ]);
}

header('location: /');
