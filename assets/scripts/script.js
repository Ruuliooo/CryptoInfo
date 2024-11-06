// URL de l'API CoinGecko pour récupérer les infos sur les cryptos
const apiURL = 'https://api.coingecko.com/api/v3/coins/markets';
const params = new URLSearchParams({
  vs_currency: 'usd',          // La devise en laquelle tu veux afficher les prix (ex: usd, eur)
  order: 'market_cap_desc',     // Trié par capitalisation de marché décroissante
  per_page: 20,                 // Nombre de cryptos par page
  page: 1,                      // Numéro de page
  sparkline: false              // On désactive les mini graphiques dans les résultats
});

// Appel de l'API CoinGecko pour récupérer les 10 premières cryptos
fetch(`${apiURL}?${params.toString()}`)
  .then(response => response.json())
  .then(data => {
    data.forEach((crypto, index) => {
      console.log(`Rank ${index + 1}: ${crypto.name}`);
      console.log(`Symbol: ${crypto.symbol.toUpperCase()}`);
      console.log(`Current Price: $${crypto.current_price}`);
      console.log(`Market Cap: $${crypto.market_cap}`);
      
      // Récupération et affichage du changement de pourcentage
      const priceChange = crypto.price_change_percentage_24h;
      console.log(`24h Change: ${priceChange}%`);

      // Vérification si la crypto a gagné ou perdu
      if (priceChange < 0) {
        console.log("Status: Down");
      } else {
        console.log("Status: Up");
      }

      console.log('----------------------------------');
    });
  })
  .catch(error => console.error('Erreur lors de la récupération des données:', error));
