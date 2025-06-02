document.addEventListener("DOMContentLoaded", function () {
    const montanteInput = document.getElementById("montante");
    const mesesInput = document.getElementById("meses");
    const resultado = document.getElementById("poupanca");

    function calcular() {
        const montanteRaw = montanteInput.value.replace(/\./g, '').replace(',', '.');
        const montante = parseFloat(montanteRaw);
        const meses = parseInt(mesesInput.value);

        if (isNaN(montante) || isNaN(meses) || montante <= 0 || meses <= 0) {
            resultado.textContent = "";
            return;
        }

        const poupancaMensal = montante / meses;

        resultado.textContent = `Deverás poupar ${poupancaMensal.toLocaleString("pt-PT", {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        })} € por mês.`;
    }

    montanteInput.addEventListener("input", calcular);
    mesesInput.addEventListener("input", calcular);
});
