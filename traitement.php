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

if (isset($_POST['todo']) && !empty($_POST['todo'])) {
 $req = $bdd->prepare('INSERT INTO taches(todo) VALUES(:todo)');
 $req->execute(array(
     'todo' => test_input($_POST['todo'])
    ));
}
elseif (isset($_POST['update'])) {
$req = $bdd->prepare('UPDATE taches SET todo = ? WHERE id = ?');
$req->execute(array(
    test_input($_POST['update']),
    test_input($_POST['id'])
    ));   
    }

elseif (isset($_POST['delete'])) {
    $req = $bdd->prepare('DELETE FROM taches WHERE id = :id');
    $req->execute(array(
        "id"=>test_input($_POST['delete']),
        ));   
}  
}

 function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
 }

header('Location: index.php');
?>