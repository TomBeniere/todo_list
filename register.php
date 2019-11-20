<?php
session_start();
    if (isset($_SESSION['id'])) {
        header('Location: index.php');
    }            
?>
<!DOCTYPE html>
<html lang="en">

<head>
<style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #e8e4e3;
        }

        header {
            margin-bottom: 5rem;
        }

        header>h1 {
            font-size: 48px;
        }

        main {
            margin-bottom: 5rem;
        }

        form>div>input {
            border: none;
            border: none;
            padding: 0.5rem;
            border-radius: 20px;
            outline: none;
            width: 200px;
            color: black;
            font-size: 16px;
            font-weight: 500;
            line-height: 26px;
            margin-right: 5px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form>button {
            margin-top: 3rem;
            border-radius: 20px;
            border: none;
            background-color: #fff;
            padding: 0.5rem;
            width: 200px;
            font-size: 16px;
            cursor: pointer;
        }
        footer>a {
            list-style-type: none;
            color: black;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Register Page</h1>
    </header>
    <main>
        <form action="traitement-register.php" method="post">
            <div>
                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" value="">
                <label for="password">Password :</label>
                <input type="password" name="password" value="">
            </div>
            <button type="submit">Register</button>
        </form>
    </main>
    <footer>
        <a href="login.php">Login Now !</a>
    </footer>
</body>

</html>