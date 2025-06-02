const switchers = [...document.querySelectorAll('.switcher')]

switchers.forEach(item => {
	item.addEventListener('click', function () {
		switchers.forEach(item => item.parentElement.classList.remove('is-active'))
		this.parentElement.classList.add('is-active')
	})
})

const botao = document.getElementById('botao');

function atualizarClasseBotao() {
	const body = document.body;
	if (body.classList.contains('escuro')) {
		botao.classList.remove('btn-outline-dark');
		botao.classList.add('btn-outline-light');
	} else {
		botao.classList.remove('btn-outline-light');
		botao.classList.add('btn-outline-dark');
	}
}

// Atualiza ao carregar
atualizarClasseBotao();

// Observador para detectar mudanças no atributo "class" do <body>
const observer = new MutationObserver(mutations => {
	for (const mutation of mutations) {
		if (mutation.attributeName === 'class') {
			atualizarClasseBotao();
		}
	}
});

observer.observe(document.body, { attributes: true });

