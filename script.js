// Matrix rain background + small page interactions
const canvas = document.getElementById('matrix');
const ctx = canvas.getContext('2d');

function resize(){ 
  canvas.width = innerWidth;
  canvas.height = innerHeight;
}
resize();
addEventListener('resize', resize);

const cols = Math.floor(canvas.width / 16);
const drops = new Array(cols).fill(1);
const chars = '01株式会社ドラゴンデーモンΖλΨ▓▒░█▲■●◼︎◆';

function draw(){
  ctx.fillStyle = 'rgba(5,6,7,0.15)';
  ctx.fillRect(0,0,canvas.width,canvas.height);

  ctx.fillStyle = 'rgba(138,43,226,0.9)'; // purple-ish
  ctx.font = '16px monospace';
  for(let i=0;i<drops.length;i++){
    const text = chars[Math.floor(Math.random()*chars.length)];
    const x = i*16;
    const y = drops[i]*16;
    ctx.fillText(text, x, y);
    if(y > canvas.height && Math.random() > 0.975) drops[i]=0;
    drops[i]++;
  }
  requestAnimationFrame(draw);
}
draw();

// set current year
document.getElementById('year').textContent = new Date().getFullYear();
