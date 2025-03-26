<?php
// Inclure la fonction de connexion à la base de données
include('../functions/function_connexion.php');

// Traitement du formulaire d'inscription
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les informations du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connexion à la base de données
    $pdo = getConnection();

    if ($pdo) {
        // Vérifier si l'email existe déjà
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            // Si l'email existe déjà, afficher un message d'erreur
            $error = "Cet email est déjà utilisé.";
        } else {
            // Hashage du mot de passe avant de l'enregistrer dans la base de données
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Insertion de l'utilisateur dans la base de données
            $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            if ($stmt->execute()) {
                // Rediriger l'utilisateur vers la page de connexion après l'inscription réussie
                header('Location: connexion.php');
            } else {
                $error = "Une erreur s'est produite lors de l'inscription.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Page d'Inscription</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="../styles/connexion.css" />
</head>
<body>
    <div class="container">
        <div class="login-card">
            <div class="header">
                <div class="icon-container">
                    <i data-lucide="user-plus"></i>
                </div>
                <h2>Inscription</h2>
                <p>Créez un nouveau compte</p>
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
                    <a href="connexion.php" class="forgot">Déjà un compte ?</a>
                </div>

                <button type="submit" class="login-button">
                    S'inscrire
                </button>
            </form>
        </div>
    </div>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>
