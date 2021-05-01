<?php

if (isset($isRestricted)) {
    var_dump($isRestricted);
}

$users = [
    ['admin', 'admin'],
    ['regular', 'regular'],
];

$loginSuccess = null;

if (isset($_POST['username']) && isset($_POST['password'])) {
    foreach ($users as $user) {
        if ($_POST['username'] == $user[0] && $_POST['password'] == $user[1]) {
            $loginSuccess = true;
            echo 'Username: ' . $_POST['username'] . '<br>';
            echo 'Password: ' . $_POST['password'] . '<br>';
            session_start();
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
            header('Location: dashboard');
        } else {
            $loginSuccess = false;
        }
    }
}
