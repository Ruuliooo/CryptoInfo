<?php
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
        
        <form onsubmit="return false;">
          <div class="form-group">
            <label for="email">Adresse e-mail</label>
            <div class="input-container">
              <i data-lucide="mail"></i>
              <input
                id="email"
                type="email"
                placeholder="vous@exemple.com"
                required
              />
            </div>
          </div>

          <div class="form-group">
            <label for="password">Mot de passe</label>
            <div class="input-container">
              <i data-lucide="lock"></i>
              <input
                id="password"
                type="password"
                placeholder="••••••••"
                required
              />
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
          <a href="#">S'inscrire</a>
        </p>
      </div>
    </div>
    <script>
      lucide.createIcons();
    </script>
  </body>
</html>