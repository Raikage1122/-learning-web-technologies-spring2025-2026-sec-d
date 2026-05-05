<?php
header("Content-Type: application/json");

$file = "users.json"; 

$data = json_decode(file_get_contents("php://input"), true);

if($data['action'] === "signup") {
    $users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    foreach($users as $u){
        if($u['email'] === $data['email']){
            echo json_encode(["status"=>"error","message"=>"Email already registered"]);
            exit;
        }
    }

    $users[] = [
        "name" => $data['name'],
        "email" => $data['email'],
        "password" => password_hash($data['password'], PASSWORD_DEFAULT)
    ];

    file_put_contents($file, json_encode($users));
    echo json_encode(["status"=>"success","message"=>"Sign up successful!"]);
}

if($data['action'] === "login") {
    if(!file_exists($file)){
        echo json_encode(["status"=>"error","message"=>"No users registered"]);
        exit;
    }

    $users = json_decode(file_get_contents($file), true);

    foreach($users as $u){
        if($u['email'] === $data['email'] && password_verify($data['password'], $u['password'])){
            echo json_encode(["status"=>"success","message"=>"Login successful"]);
            exit;
        }
    }

    echo json_encode(["status"=>"error","message"=>"Invalid email or password"]);
}
?>