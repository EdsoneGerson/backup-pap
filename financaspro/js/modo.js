document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('modoToggle');
    const corpo = document.body;

    // Estado inicial (opcional: com base em classe ou cookie)
    toggle.checked = corpo.classList.contains('escuro');

    toggle.addEventListener('change', function () {
        if (toggle.checked) {
            corpo.classList.replace('claro', 'escuro');
            document.cookie = "modo=escuro; path=/";
        } else {
            corpo.classList.replace('escuro', 'claro');
            document.cookie = "modo=claro; path=/";
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const logo = document.querySelector(".logo-financaspro");
    const modoAtual = document.body.classList.contains("escuro") ? "escuro" : "claro";

    function atualizarLogo(modo) {
        if (!logo) return;
        const novaSrc = modo === "escuro" ? logo.dataset.srcEscuro : logo.dataset.srcClaro;
        logo.src = novaSrc;
    }

    // Atualiza logo no carregamento
    atualizarLogo(modoAtual);

    // Monitoriza alterações de modo com o toggle
    const toggle = document.getElementById("modoToggle");
    if (toggle) {
        toggle.addEventListener("change", () => {
            const novoModo = toggle.checked ? "escuro" : "claro";
            atualizarLogo(novoModo);
        });
    }
});
