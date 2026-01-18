const container = document.getElementById('magic-container');
const emojis = ['🧙‍♀️','✨','🪄','🔮','🖤','😈'];

function createEmoji() {
    const emoji = document.createElement('div');
    emoji.classList.add('flying-emoji');

    // Escolhe emoji aleatório
    emoji.textContent = emojis[Math.floor(Math.random() * emojis.length)];

    // Posição horizontal aleatória
    emoji.style.left = Math.random() * 95 + 'vw';

    // Tamanho aleatório
    const size = 20 + Math.random() * 30;
    emoji.style.fontSize = size + 'px';

    // Duração aleatória da animação
    const duration = 5 + Math.random() * 7;
    emoji.style.animationDuration = duration + 's';

    // Rotação inicial aleatória
    const rotation = Math.random() * 360; 
    emoji.style.transform = `rotate(${rotation}deg)`;

    // Delay inicial aleatório
    const delay = Math.random() * 2;
    emoji.style.animationDelay = delay + 's';

    // Posição inicial
    emoji.style.bottom = '-50px';

    container.appendChild(emoji);

    // Remove emoji após a animação
    setTimeout(() => {
        if (container.contains(emoji)) container.removeChild(emoji);
    }, (duration + delay) * 1000);
}

// Cria emojis a cada 250ms para fluxo contínuo
setInterval(createEmoji, 250);
