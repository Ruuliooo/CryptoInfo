<?php

require 'vendor/autoload.php';

Sentry\init(['dsn' => 'http://b478ff4f9b994d28a6c65667f7be9e2a@172.16.0.100:8000/6']);

Sentry\captureMessage("Page d'acceuil✅");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COINGECKO CHECKER</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/styles/style.css">
</head>

<body>
  <header>
    <div class="header-container">
      <img class="fit-picture" src="assets/img/logo_crypto.png" alt="Logo Crypto" />
      <span class="navbar-brand">CryptoInfo</span>
      <nav class="ml-auto">
        <button class="btn btn-primary"
          onclick="window.location.href='assets/pages/informations.php'">Informations</button>
        <button class="btn btn-primary" onclick="window.location.href='assets/pages/liens.php'">Liens</button>
        <button class="btn btn-primary" onclick="window.location.href='assets/pages/achats.php'">Achats</button>
        <button class="btn btn-primary" onclick="window.location.href='assets/pages/.php'">Connexion</button>
      </nav>
    </div>
  </header>
  <main>
    <h2>Cryptomonnaie: signification & définition</h2>

    <p>La cryptomonnaie, parfois appelée crypto-monnaie ou crypto, fait référence à une monnaie numérique ou virtuelle
      qui utilise des techniques cryptographiques pour sécuriser les transactions.
      Elle existe uniquement sous forme électronique, indépendamment de toute autorité centrale,
      et fonctionne sur des réseaux décentralisés, tels que la technologie de la blockchain.
      Une cryptomonnaie est un système de paiement numérique qui ne s'appuie pas sur les banques pour vérifier les
      transactions.
      Il s'agit d'un système de partage P2P (peer-to-peer) permettant à tout le monde d'envoyer et de recevoir des
      paiements n'importe où.
      Il ne s'agit pas d'argent physique transporté ni échangé dans le monde réel : les paiements en cryptomonnaies sont
      des saisies purement virtuelles réalisées dans une base de données en ligne et correspondant à certaines
      transactions particulières.
      Lorsque vous transférez des fonds en cryptomonnaies, les transactions sont enregistrées dans un registre public.
      Les cryptomonnaies sont stockées dans des portefeuilles numériques.
      <br><br> <b>Source :</b> https://www.kaspersky.fr/resource-center/definitions/what-is-cryptocurrency
    </p>

    <p class="additional-info">Clique sur le bouton en dessous pour rejoindre le Discord de <a href="https://crypto.com"
        target="_blank">crypto.com</a>, qui est une référence dans ce milieu.</p>

    <button onclick="window.location.href = 'https://crypto.com';" class="discord-button">
      <img src="assets/img/discord_button.png" alt="Lien Discord Crypto" />
    </button>
  </main>
  <section class="crypto-table">
    <table>
      <thead>
        <tr>
          <th>Classement</th>
          <th>Nom</th>
          <th>Prix actuel</th>
          <th>Valeur totale</th>
          <th>En circulation</th>
          <th>Logo</th>
        </tr>
      </thead>
      <tbody id="table-body"></tbody>
    </table>
  </section>
  <script src="assets/scripts/script.js"></script>
</body>

</html>