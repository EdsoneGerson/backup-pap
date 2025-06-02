document.addEventListener("DOMContentLoaded", function () {
    const aporteInput = document.getElementById("aporte");
    const mesesInput = document.getElementById("meses");
    const taxaInput = document.getElementById("taxa");
    const resultDiv = document.getElementById("result");

    function formatEuro(value) {
        return new Intl.NumberFormat("pt-PT", {
            style: "currency",
            currency: "EUR",
            minimumFractionDigits: 2,
        }).format(value);
    }

    function limparNumero(str) {
        return str.replace(/\./g, "").replace(",", ".").replace(/[^\d.]/g, "");
    }

    function calcular() {
        const aporteStr = aporteInput.value.trim();
        const mesesStr = mesesInput.value.trim();
        const taxaStr = taxaInput.value.trim();

        // Se algum campo estiver vazio, não calcula
        if (!aporteStr || !mesesStr || !taxaStr) {
            resultDiv.innerHTML = "";
            return;
        }

        const aporte = parseFloat(limparNumero(aporteStr));
        const meses = parseInt(mesesStr);
        const taxa = parseFloat(limparNumero(taxaStr)) / 100;

        if (isNaN(aporte) || isNaN(meses) || isNaN(taxa) || aporte <= 0 || meses <= 0 || taxa <= 0) {
            resultDiv.innerHTML = "";
            return;
        }

        const totalSemRendimento = aporte * meses;
        const totalComRendimento = aporte * ((Math.pow(1 + taxa, meses) - 1) / taxa);
        const diferenca = totalComRendimento - totalSemRendimento;

        resultDiv.innerHTML = `
            <p>Total poupado (sem rentabilidade): ${formatEuro(totalSemRendimento)}</p>
            <p>Total com rentabilidade de ${(taxa * 100).toFixed(2).replace('.', ',')}% ao mês: ${formatEuro(totalComRendimento)}</p>
            <p>Ganho com rentabilidade: ${formatEuro(diferenca)}</p>
        `;
    }

    aporteInput.addEventListener("input", calcular);
    mesesInput.addEventListener("input", calcular);
    taxaInput.addEventListener("input", calcular);
});
