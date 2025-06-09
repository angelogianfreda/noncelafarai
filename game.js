const canvas = document.getElementById('game');
const ctx = canvas.getContext('2d');

const player = {
    x: canvas.width / 2,
    y: canvas.height / 2,
    size: 20,
    color: 'skyblue',
    hunger: 100,
    energy: 100,
    mood: 100
};

const speed = 4;
const decay = 0.05;

function update() {
    player.hunger -= decay;
    player.energy -= decay;
    player.mood -= decay / 2;
    player.hunger = Math.max(0, player.hunger);
    player.energy = Math.max(0, player.energy);
    player.mood = Math.max(0, player.mood);
}

function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.fillStyle = player.color;
    ctx.fillRect(player.x - player.size/2, player.y - player.size/2, player.size, player.size);
    drawBar('Fame', player.hunger, 10, 10, 'red');
    drawBar('Energia', player.energy, 10, 30, 'green');
    drawBar('Umore', player.mood, 10, 50, 'yellow');
}

function drawBar(label, value, x, y, color) {
    ctx.fillStyle = '#555';
    ctx.fillRect(x, y, 100, 8);
    ctx.fillStyle = color;
    ctx.fillRect(x, y, value, 8);
    ctx.fillStyle = 'white';
    ctx.font = '10px Arial';
    ctx.fillText(label, x + 110, y + 7);
}

function gameLoop() {
    update();
    draw();
    requestAnimationFrame(gameLoop);
}

function feed() {
    player.hunger = Math.min(100, player.hunger + 20);
}

function rest() {
    player.energy = Math.min(100, player.energy + 20);
}

document.addEventListener('keydown', (e) => {
    switch (e.key) {
        case 'ArrowUp':
            player.y = Math.max(player.size/2, player.y - speed);
            break;
        case 'ArrowDown':
            player.y = Math.min(canvas.height - player.size/2, player.y + speed);
            break;
        case 'ArrowLeft':
            player.x = Math.max(player.size/2, player.x - speed);
            break;
        case 'ArrowRight':
            player.x = Math.min(canvas.width - player.size/2, player.x + speed);
            break;
    }
});

requestAnimationFrame(gameLoop);
