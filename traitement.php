<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=sql_php", 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['todo'])) {
        $request = $pdo->prepare('INSERT INTO todos(todo) VALUES(:todo)');
        $request->execute(array(
          "todo" => $_POST['todo']
        ));
        $request->closeCursor();
      }

      if (isset($_POST['update'])) {
        $request = $pdo->prepare('UPDATE todos SET todo = :todo WHERE id = :id');
        $request->execute(array(
          "todo" => $_POST['update'],
          "id" => $_POST["id"]
        ));
        $request->closeCursor();
      }

      if (isset($_POST['delete'])) {
        $request = $pdo->prepare('DELETE FROM todos WHERE id = :id');
        $request->execute(array(
          "id" => $_POST["delete"]
        ));
        $request->closeCursor();
      }
    }
    header('Location: index.php');
}
catch(PDOException $e){
  echo "Erreur : " . $e->getMessage();
}
