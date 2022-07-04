<?php
require_once "vendor/autoload.php";

require_once "bootstrap.php";


[$filename, $username, $password] = $argv;
$hpwd = password_hash($password, PASSWORD_DEFAULT);

$user = new \App\Entity\User();

$user->setUsername($username);
$user->setPassword($hpwd);

$em = $entityManager;

$em->persist($user);
$em->flush();

echo "Created user with id - " . $user->getId();