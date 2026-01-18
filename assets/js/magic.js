const container = document.getElementById('magic-container');
const emojis = ['🧙‍♀️','✨','🪄','🔮','🖤','😈'];

function createEmoji() {
    const emoji = document.createElement('div');
    emoji.classList.add('flying-emoji');

    // Escolhe emoji aleatório
    emoji.textContent = emojis[Math.floor(Math.random()*emojis.length)];

    // posição horizontal aleatória
    emoji.style.left = Math.random() * 100 + 'vw';

    // tamanho aleatório
    const size = 20 + Math.random() * 30;
    emoji.style.fontSize = size + 'px';

    // duração aleatória
    const duration = 4 + Math.random() * 6; // entre 4s e 10s
    emoji.style.animationDuration = duration + 's';

    // define posição inicial
    emoji.style.bottom = '-50px';

    container.appendChild(emoji);

    // remove emoji após a animação terminar
    setTimeout(() => {
        if (container.contains(emoji)) container.removeChild(emoji);
    }, duration * 1000);
}

// Cria emojis a cada 300ms
setInterval(createEmoji, 300);
