<?php
// echo "Hello world";


try {
    $pdo = new PDO("mysql:host=localhost;dbname=exercise", "phpmyadmin", "P@ssw0rd123!");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $email = $_POST['email'] ?? '';
        $lastname = $_POST['lastname'] ?? '';
        $name = $_POST['name'] ?? '';
        $password = $_POST['password'] ?? '';

        // Préparer la requête d'insertion (requête préparée)
        $stmt = $pdo->prepare("INSERT INTO user(email, lastname, name, password) VALUES (?, ?, ?, ?)");

        // Exécuter la requête avec les données
        $stmt->execute([$email, $lastname, $name, $password]);

        echo "Utilisateur ajouté avec succès !";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}


$user = [
    "email" => "billy@example.com",
    "name" => "Billy",
    "lastname" => "Joe",
    "img" => "http://unsplash.it/100/100"
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="user-card">
        <img src="<?php echo $user['img']; ?>" alt="User Image">
        <div class="info">
            <h1><?php echo $user['name'] . " " . $user['lastname']; ?></h1>
            <p><?php echo $user['email']; ?></p>
        </div>
    </div>
    <form method="POST" action="">

        <input type="email" id="email" name="email" placeholder="email">
        <input type="text" id="lastname" name="lastname" placeholder="lastname">
        <input type="text" id="name" name="name" placeholder="name">
        <input type="password" id="password" name="password" placeholder="password">
        <button type="submit">Submit</button>
    </form>

</body>

</html>

