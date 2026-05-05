<?php
header("Content-Type: application/json");

$file = "data.json";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!file_exists($file)) {
        echo json_encode([]);
        exit;
    }
    echo file_get_contents($file);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    $data['id'] = count($users) + 1;
    $users[] = $data;

    file_put_contents($file, json_encode($users));
    echo json_encode(["status" => "added"]);
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);

    $users = json_decode(file_get_contents($file), true);

    foreach ($users as &$user) {
        if ($user['id'] == $data['id']) {
            $user['name'] = $data['name'];
            $user['email'] = $data['email'];
        }
    }

    file_put_contents($file, json_encode($users));
    echo json_encode(["status" => "updated"]);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $_GET['id'];

    $users = json_decode(file_get_contents($file), true);

    $users = array_filter($users, function($u) use ($id) {
        return $u['id'] != $id;
    });

    file_put_contents($file, json_encode(array_values($users)));
    echo json_encode(["status" => "deleted"]);
}
?>