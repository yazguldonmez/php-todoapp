<?php
const BASEDIR = 'C:\xampp\htdocs\todoapp';
const URL = 'http://localhost/todoapp/';
const DEV_MODE = true;
try{
    $db = new PDO('mysql:host=localhost;dbname=todo;charset=utf8','root','');
}catch(PDOException $e){
    echo $e->getMessage();
}