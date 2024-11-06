// URL de l'API CoinGecko pour récupérer les infos sur les cryptos + constante tbody ainsi que les paramètres
const apiURL = 'https://api.coingecko.com/api/v3/coins/markets';
const tbody = document.getElementById("table-body");
const params = new URLSearchParams({
  vs_currency: 'eur',
  order: 'market_cap_desc',
  per_page: 50,
  page: 1,
  sparkline: true
});
// Fonction pour récupérer les données de l'API et les afficher dans la table
const fetchData = async () => {
  try {
    const request = await fetch(`${apiURL}?${params.toString()}`);
    const data = await request.json();
    console.log(data);
    return data;
  } catch (error) {
    console.log(error);
  }
};
// afficher les données dans la table
const insertData = async () => {
  const datas = await fetchData();
  for (const data of datas) {
    const row = document.createElement("tr");

  // Ajouter les données dans le tableau
  row.innerHTML = `
    <td>${data.market_cap_rank}</td>
    <td>${data.name} <strong>[${data.symbol}]</strong></td>
    <td>${data.current_price} €</td>
    <td>${data.market_cap} €</td>
    <td>${data.circulating_supply}</td>
    <td><img src='${data.image}'-/></td>
  `;
  tbody.appendChild(row);
  }
};

// Appel de la fonction pour insérer les données dans le tableau
insertData();
