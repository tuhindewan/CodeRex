<?php
require_once "../vendor/autoload.php";

use App\Lib\Database;


$mysqli = new Database();

$sql = "INSERT INTO users (name, fav_color) VALUES('Lil Sneazy', 'Yellow')";
$result = $mysqli->insert($sql);


$sql = 'SELECT * FROM users';

if ($result = $mysqli->insert($sql)) {
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
}

foreach ($users as $user) {
    echo "<br>";
    echo $user->name . " " . $user->fav_color;
    echo "<br>";
}
