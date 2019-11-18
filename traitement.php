<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
$req = $bdd->prepare('INSERT INTO taches(ToDo) VALUES(:todo)');
$req->execute(array(
    'todo' => $_POST['todo']
	));

    
}

header('Location: index.php');
?>