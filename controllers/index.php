<?php

use Core\Database;

// get tasks from db
$config = require base_path('config.php');
$db = new Database($config['database']);

$sql = "SELECT * FROM tasks";

$tasks = $db->query($sql)->get();


view('index.view.php', [
    'tasks' => $tasks
]);
