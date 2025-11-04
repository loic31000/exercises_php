<?php
session_start();

try {
    $pdo = new PDO("mysql:host=localhost;dbname=exercise", "phpmyadmin", "P@ssw0rd123!");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $stmt = $pdo->prepare("SELECT id, password FROM user WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: index.php'); // page protégée
            exit();
        } else {
            $error = "Identifiants incorrects.";
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<title>Connexion</title>
</head>
<body>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST" action="">
    <input type="email" name="email" placeholder="Email"/>
    <input type="password" name="password" placeholder="Mot de passe"/>
    <button type="submit">Se connecter</button>
</form>
</body>
</html>
