const API_KEY = 'b1b2e184880a198eea5a4c2d'; // substitui pela tua chave
const BASE = 'EUR';

const moedas = {
    BRL: "R$",   // Real Brasileiro
    USD: "$",    // Dólar Americano
    CHF: "CHF",  // Franco Suíço
    GBP: "£",    // Libra Esterlina
    AUD: "A$",   // Dólar Australiano
    CAD: "C$",   // Dólar Canadense
    SGD: "S$",   // Dólar de Cingapura
    NZD: "NZ$",  // Dólar Neozelandês
    SEK: "kr",   // Coroa Sueca
    NOK: "kr",   // Coroa Norueguesa
    DKK: "kr"    // Coroa Dinamarquesa
};

fetch(`https://v6.exchangerate-api.com/v6/${API_KEY}/latest/${BASE}`)
    .then(res => res.json())
    .then(data => {
        const lista = document.getElementById('cotacoes');
        Object.entries(moedas).forEach(([codigo, simbolo]) => {
            const taxa = data.conversion_rates[codigo];
            if (taxa) {
                const item = document.createElement('ul');
                item.textContent = `1 ${BASE} = ${simbolo} ${taxa.toFixed(4)} (${codigo})`;
                lista.appendChild(item);
            }
        });
    })
    .catch(err => {
        console.error('Erro ao carregar cotações:', err);
        document.getElementById('cotacoes').innerText = 'Erro ao obter os dados.';
    });

    setInterval(() => location.reload(), 300000); // 5 minutos

