<?php
// Inclure la fonction de connexion à la base de données
include('../functions/function_connexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les informations du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connexion à la base de données
    $pdo = getConnection();

    if ($pdo) {
        // Vérifier si l'email existe dans la base de données
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Si les informations sont valides, connecter l'utilisateur
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            header('Location: ../../index.php'); // Rediriger vers le tableau de bord
        } else {
            // Si les informations sont incorrectes, afficher un message d'erreur
            $error = "Identifiants incorrects.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Page de Connexion</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="../styles/connexion.css" />
</head>
<body>
    <div class="container">
        <div class="login-card">
            <div class="header">
                <div class="icon-container">
                    <i data-lucide="log-in"></i>
                </div>
                <h2>Bienvenue</h2>
                <p>Connectez-vous à votre compte</p>
            </div>

            <!-- Affichage du message d'erreur -->
            <?php if (isset($error)): ?>
                <div class="error"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <div class="input-container">
                        <i data-lucide="mail"></i>
                        <input id="email" name="email" type="email" placeholder="vous@exemple.com" required />
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <div class="input-container">
                        <i data-lucide="lock"></i>
                        <input id="password" name="password" type="password" placeholder="••••••••" required />
                    </div>
                </div>

                <div class="remember-forgot">
                    <a href="#" class="forgot">Mot de passe oublié ?</a>
                </div>

                <button type="submit" class="login-button">
                    Se connecter
                </button>
            </form>

            <p class="signup-link">
                Vous n'avez pas de compte ?
                <a href="inscription.php">S'inscrire</a>
            </p>
        </div>
    </div>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>
