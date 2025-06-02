let saldoAtual = 0;


const dadosGrafico = {
  labels: ['Início'],
  datasets: [{
    label: 'Saldo',
    data: [saldoAtual],
    borderColor: 'blue',
    backgroundColor: 'rgba(0, 0, 255, 0.1)',
    borderWidth: 2,
    fill: true
  }]
};

const configGrafico = {
  type: 'line',
  data: dadosGrafico,
  options: {
    responsive: true,
    plugins: {
      legend: { display: true },
    },
    scales: { y: { beginAtZero: false } }
  }
};

const ctx = document.getElementById('graficoSaldo').getContext('2d');
const graficoSaldo = new Chart(ctx, configGrafico);

function atualizarGrafico() {
  dadosGrafico.labels.push(new Date().toLocaleTimeString());
  dadosGrafico.datasets[0].data.push(saldoAtual);
  graficoSaldo.update();
}

function atualizarSaldo() {
  document.getElementById('saldo').innerText = saldoAtual.toFixed(2);
  atualizarGrafico();
}

function adicionarAoHistorico(nome, hora, data, valor, tipo, categoria) {
  const tabelaHistorico = document.getElementById('tabelaHistorico');
  
  // Cria a nova linha
  const novaLinha = document.createElement('tr');
  novaLinha.innerHTML = `
    <td>${nome}</td>
    <td>${hora}</td>
    <td>${data}</td>
    <td>${valor.toFixed(2)}€</td>
    <td>${tipo}</td>
    <td>${categoria}</td>
  `;

  // Adiciona a linha no local correto (ordenado por data)
  const linhas = Array.from(tabelaHistorico.querySelectorAll('tr'));
  const novaData = new Date(data);

  let inserido = false;
  for (let i = 0; i < linhas.length; i++) {
    const dataExistente = new Date(linhas[i].querySelector('td:nth-child(2)').innerText);
    if (novaData < dataExistente) {
      tabelaHistorico.insertBefore(novaLinha, linhas[i]);
      inserido = true;
      break;
    }
  }

  // Se não foi inserido (nova data é a mais recente), adiciona ao final
  if (!inserido) {
    tabelaHistorico.appendChild(novaLinha);
  }
}


document.getElementById('botaoAbrir').addEventListener('click', () => {
  document.getElementById('formulario').style.display = 'block';
});

document.getElementById('formEntrada').addEventListener('submit', function(event) {
  event.preventDefault();

  const nome = document.getElementById('nome').value;
  // const data = document.getElementById('data').value;
  const now = new Date();
  const data = now.toLocaleDateString();
  const hora = now.toLocaleTimeString();
  const valor = parseFloat(document.getElementById('valor').value);
  const operacao = document.getElementById('operacao').value;
  const categoria = document.getElementById('categoria').value;
  

  if (isNaN(valor) || valor <= 0) {
    alert('Por favor, insira um valor válido!');
    return;
  }

    saldoAtual += operacao === 'aumentar' ? valor : -valor;
    atualizarSaldo();

  if (operacao === 'aumentar') {
    adicionarAoHistorico(nome, hora, data, valor, 'Crédito', categoria);
  } else {
    adicionarAoHistorico(nome, hora, data, valor, 'Débito', categoria);
  }

  document.getElementById('formulario').style.display = 'none';

  document.getElementById('formEntrada').reset();
});
atualizarSaldo();

// Evento para o botão de fechar
document.getElementById('botaoFechar').addEventListener('click', () => {
    document.getElementById('formulario').style.display = 'none';
  });
  
  // Permitir fechar clicando fora do formulário
  document.addEventListener('click', (event) => {
    const formulario = document.getElementById('formulario');
    if (formulario.style.display === 'block' && !formulario.contains(event.target) && event.target.id !== 'botaoAbrir') {
      formulario.style.display = 'none';
    }
  });
  

  document.getElementById('formEntrada').addEventListener('submit', function(event) {
    if (validacaoPersonalizadaFalhou) {
      event.preventDefault();
      alert('Corrija os erros antes de enviar.');
    } else {
      alert('Formulário enviado com sucesso!');
    }
  });