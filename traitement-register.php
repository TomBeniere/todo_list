<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=todolist;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
    $response = $bdd->prepare('SELECT * FROM user WHERE pseudo = :pseudo');

    $response->execute(array(
        "pseudo" => $_POST["pseudo"]
    ));
    $user = $response->fetch();
    
    if (isset($_POST['pseudo']) && $_POST['pseudo'] != $user['pseudo'] && !empty($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['password'])) {
        $req = $bdd->prepare('INSERT INTO user(pseudo , password) VALUES(:pseudo , :password)');
        $req->execute(array(
            'pseudo' => test_input($_POST['pseudo']),
            'password' => password_hash(test_input($_POST['password']), PASSWORD_DEFAULT)
           ));
       }    
       header('Location: login.php');
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

header('Location: index.php');
?>