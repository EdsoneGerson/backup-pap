<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['autenticado'])){
    session_destroy();
    header('Location: login.php');
    exit();
}

$salarios = [
    1974 => 16.47,
    1975 => 19.98,
    1977 => 22.47,
    1978 => 28.47,
    1979 => 37.41,
    1980 => 44.94,
    1981 => 53.41,
    1983 => 64.87,
    1984 => 77.99,
    1985 => 95.77,
    1986 => 112.09,
    1987 => 125.79,
    1988 => 135.73,
    1989 => 149.62,
    1990 => 174.57,
    1991 => 199.26,
    1992 => 225.85,
    1993 => 243.89,
    1994 => 255.52,
    1995 => 271.85,
    1996 => 291.13,
    1997 => 305.87,
    1998 => 318.15,
    1999 => 331.13,
    2000 => 346.15,
    2001 => 363.42,
    2002 => 341.23,
    2003 => 353.20,
    2004 => 365.60,
    2005 => 374.70,
    2006 => 385.90,
    2007 => 403.00,
    2008 => 426.00,
    2009 => 450.00,
    2010 => 475.00,
    2011 => 485.00,
    2012 => 485.00,
    2013 => 485.00,
    2014 => 505.00,
    2015 => 505.00,
    2016 => 530.00,
    2017 => 557.00,
    2018 => 580.00,
    2019 => 600.00,
    2020 => 635.00,
    2021 => 665.00,
    2022 => 705.00,
    2023 => 760.00,
    2024 => 820.00,
    2025 => 870.00
];
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Valor do Ordenado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/mensal.css">
    <link rel="stylesheet" href="css/ordenado.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="<?= isset($_COOKIE['modo']) ? $_COOKIE['modo'] : 'claro' ?>">
    <?php require_once('inc/menu.php'); ?>

    <main class="container-fluid">
        <section class="row">
            <div class="col-12 text-center mt-4">
                <h1><b>Ordenado Mínimo</b></h1>
            </div>
        </section>
        <section class="row justify-content-center">
            <div class="salario text-center">
                <div class="scroll-tabela">
                    <canvas id="graficoSalario" style="width:100%; max-height:500px;"></canvas>
                </div>
            </div>
        </section>
    </main>

    <script>
        const anos = <?= json_encode(array_keys($salarios)) ?>;
        const valores = <?= json_encode(array_values($salarios)) ?>;

        const ctx = document.getElementById('graficoSalario').getContext('2d');

        // Função que retorna as cores baseadas no modo atual
        function obterCores(modo) {
            return {
                corTexto: modo === 'escuro' ? '#ffffff' : '#000000',
                corLinha: modo === 'escuro' ? '#ffffff' : '#000000',
                corArea: modo === 'escuro' ? 'rgba(255,255,254,0.3)' : 'rgba(0,0,0,0.3)',
                corGrid: modo === 'escuro' ? '#ffffff' : '#000000',
                corTooltipBg: modo === 'escuro' ? '#000000' : '#c4c4c4'
            };
        }

        function obterModoAtual() {
            return document.body.classList.contains('escuro') ? 'escuro' : 'claro';
        }

        let cores = obterCores(obterModoAtual());

        // Criar o gráfico inicialmente
        const grafico = new Chart(ctx, {
            type: 'line',
            data: {
                labels: anos,
                datasets: [{
                    label: 'Salário Mínimo (€)',
                    data: valores,
                    borderColor: cores.corLinha,
                    backgroundColor: cores.corArea,
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
                            color: cores.corTexto
                        },
                        ticks: {
                            color: cores.corTexto
                        },
                        grid: {
                            color: cores.corGrid
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Valor (€)',
                            color: cores.corTexto
                        },
                        ticks: {
                            color: cores.corTexto
                        },
                        grid: {
                            color: cores.corGrid
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            color: cores.corTexto
                        },
                        onClick: null
                    },
                    tooltip: {
                        backgroundColor: cores.corTooltipBg,
                        titleColor: cores.corTexto,
                        bodyColor: cores.corTexto,
                        callbacks: {
                            label: ctx => `€ ${ctx.formattedValue}`
                        }
                    }
                }
            }
        });

        // Observar mudanças na classe do body para atualizar as cores
        const observer = new MutationObserver(() => {
            const novoModo = obterModoAtual();
            const novasCores = obterCores(novoModo);

            const dataset = grafico.data.datasets[0];
            dataset.borderColor = novasCores.corLinha;
            dataset.backgroundColor = novasCores.corArea;

            grafico.options.scales.x.title.color = novasCores.corTexto;
            grafico.options.scales.x.ticks.color = novasCores.corTexto;
            grafico.options.scales.x.grid.color = novasCores.corGrid;

            grafico.options.scales.y.title.color = novasCores.corTexto;
            grafico.options.scales.y.ticks.color = novasCores.corTexto;
            grafico.options.scales.y.grid.color = novasCores.corGrid;

            grafico.options.plugins.legend.labels.color = novasCores.corTexto;
            grafico.options.plugins.tooltip.backgroundColor = novasCores.corTooltipBg;
            grafico.options.plugins.tooltip.titleColor = novasCores.corTexto;
            grafico.options.plugins.tooltip.bodyColor = novasCores.corTexto;

            grafico.update();
        });

        observer.observe(document.body, {
            attributes: true,
            attributeFilter: ['class']
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>