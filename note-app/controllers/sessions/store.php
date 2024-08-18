<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];
// validate forms input
if (! Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (! Validator::string($password)) {
    $errors['password'] = 'Please provide a valid password';
}

if (!empty($errors)) {
    return view("sessions/create.view.php", [
        "errors" => $errors
    ]);
}

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    "email" => $email
])->find();

if (! $user) {
    return view("sessions/create.view.php", [
        "errors" => [
            "email" => "No such user exists in the database"
        ]
    ]);
}

if (! password_verify($password, $user['password'])){
    return view("sessions/create.view.php", [
        "errors" => [
            "password" => "Password Incorrect"
        ]
    ]);
}

login([
    "email" => $email
]);
header('location: /');
exit();