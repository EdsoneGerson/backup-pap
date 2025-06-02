const modoAtual = document.body.classList.contains('escuro') ? 'escuro' : 'claro';

const corTexto = modoAtual === 'escuro' ? '#ffffff' : '#000000';
const corFundoGrafico = modoAtual === 'escuro' ? '#121212' : '#ffffff';
const corLinha = modoAtual === 'escuro' ? '#ffffff' : '#000000';
const corArea = modoAtual === 'escuro' ? 'rgba(255,255,255,0.1)' : 'rgba(0,0,0,0.1)';
const corGrelha = modoAtual === 'escuro' ? '#555' : '#ccc';

const ctx = document.getElementById('graficoSalario').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: anos,
        datasets: [{
            label: 'Salário Mínimo (€)',
            data: valores,
            borderColor: corLinha,
            backgroundColor: corArea,
            tension: 0.3,
            pointRadius: 5,
            pointHoverRadius: 7,
            pointStyle: 'hexagon',
            fill: true
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        layout: {
            padding: 10
        },
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Ano',
                    color: corTexto
                },
                ticks: {
                    color: corTexto
                },
                grid: {
                    color: corGrelha
                }
            },
            y: {
                title: {
                    display: true,
                    text: 'Valor (€)',
                    color: corTexto
                },
                ticks: {
                    color: corTexto
                },
                grid: {
                    color: corGrelha
                }
            }
        },
        plugins: {
            legend: {
                position: 'top',
                labels: {
                    usePointStyle: true,
                    pointStyle: 'circle',
                    color: corTexto
                },
                onClick: null
            },
            tooltip: {
                backgroundColor: modoAtual === 'escuro' ? '#222' : '#f9f9f9',
                titleColor: corTexto,
                bodyColor: corTexto,
                borderColor: corTexto,
                borderWidth: 1,
                callbacks: {
                    label: ctx => `€ ${ctx.formattedValue}`
                }
            }
        }
    }
});
