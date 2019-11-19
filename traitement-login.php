<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    try
    {
	    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    if (isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['password'])) {
        $response = $bdd->prepare('SELECT * FROM user WHERE pseudo = :pseudo');

        $response->execute(array(
            "pseudo" => $_POST["pseudo"]
        ));
        $user = $response->fetch();
        if (password_verify($_POST['password'], $user["password"])) {
            session_start();
            $_SESSION['id'] = $user["id"];
            $_SESSION['pseudo'] = $user['pseudo'];
        }

    }
    header('Location: index.php');
}

?>