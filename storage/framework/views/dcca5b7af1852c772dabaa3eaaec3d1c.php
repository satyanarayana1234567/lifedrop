<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeDrop — Every Drop Counts</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html, body { width: 100%; height: 100%; overflow: hidden; }

        /* ══════════════════════════════════════════
           BODY & BACKGROUND
        ══════════════════════════════════════════ */
        body {
            font-family: 'DM Sans', sans-serif;
            background: #0a0005;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        /* Deep gradient mesh background */
        .bg-mesh {
            position: fixed; inset: 0; z-index: 0;
            background:
                radial-gradient(ellipse 80% 60% at 20% 20%, rgba(160,10,30,0.55) 0%, transparent 60%),
                radial-gradient(ellipse 60% 80% at 80% 80%, rgba(100,0,20,0.6) 0%, transparent 60%),
                radial-gradient(ellipse 90% 50% at 50% 50%, rgba(60,0,10,0.4) 0%, transparent 70%),
                linear-gradient(160deg, #0a0005 0%, #1a0010 40%, #0d0008 100%);
        }

        /* Grain overlay for depth */
        .bg-grain {
            position: fixed; inset: 0; z-index: 1;
            opacity: 0.045;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
            background-size: 200px 200px;
        }

        /* ══════════════════════════════════════════
           PARTICLE CANVAS
        ══════════════════════════════════════════ */
        #particleCanvas {
            position: fixed; inset: 0; z-index: 2;
            pointer-events: none;
        }

        /* ══════════════════════════════════════════
           DNA HELIX CANVAS
        ══════════════════════════════════════════ */
        #helixCanvas {
            position: fixed; inset: 0; z-index: 3;
            pointer-events: none;
            opacity: 0.35;
        }

        /* ══════════════════════════════════════════
           PULSING RINGS
        ══════════════════════════════════════════ */
        .rings {
            position: fixed; inset: 0; z-index: 2;
            display: flex; align-items: center; justify-content: center;
            pointer-events: none;
        }
        .ring {
            position: absolute; border-radius: 50%;
            border: 1px solid rgba(192,21,42,0.18);
            animation: expandRing linear infinite;
        }
        @keyframes expandRing {
            0%   { width: 60px;  height: 60px;  opacity: 0.8; }
            100% { width: 900px; height: 900px; opacity: 0; }
        }
        .ring:nth-child(1) { animation-duration: 4s;  animation-delay: 0s;   }
        .ring:nth-child(2) { animation-duration: 4s;  animation-delay: 1s;   }
        .ring:nth-child(3) { animation-duration: 4s;  animation-delay: 2s;   }
        .ring:nth-child(4) { animation-duration: 4s;  animation-delay: 3s;   }

        /* ══════════════════════════════════════════
           MAIN CONTENT
        ══════════════════════════════════════════ */
        .splash-content {
            position: relative; z-index: 10;
            text-align: center;
            padding: 40px 24px;
            max-width: 700px;
            width: 100%;
        }

        /* ── LOADING PHASE ── */
        #loadingPhase {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0;
        }

        /* Heart drop icon */
        .heart-drop {
            width: 90px; height: 90px;
            position: relative;
            margin: 0 auto 24px;
            animation: heartBeat 1.4s ease-in-out infinite;
        }
        @keyframes heartBeat {
            0%, 100% { transform: scale(1); }
            14%       { transform: scale(1.18); }
            28%       { transform: scale(1); }
            42%       { transform: scale(1.12); }
            70%       { transform: scale(1); }
        }
        .heart-drop svg { width: 90px; height: 90px; }

        /* Brand name */
        .brand-loading {
            font-family: 'Playfair Display', serif;
            font-size: clamp(48px, 10vw, 88px);
            font-weight: 900;
            color: white;
            letter-spacing: -2px;
            line-height: 1;
            margin-bottom: 8px;
            opacity: 0;
            animation: fadeSlideUp 0.9s ease 0.3s forwards;
        }
        .brand-loading span { color: #ff6b6b; }

        .brand-tagline {
            font-size: clamp(13px, 2.5vw, 16px);
            font-weight: 400;
            color: rgba(255,255,255,0.5);
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 48px;
            opacity: 0;
            animation: fadeSlideUp 0.9s ease 0.5s forwards;
        }

        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Loading bar */
        .loading-bar-wrap {
            width: 220px;
            height: 3px;
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            margin: 0 auto 20px;
            overflow: hidden;
            opacity: 0;
            animation: fadeSlideUp 0.6s ease 0.7s forwards;
        }
        .loading-bar-fill {
            height: 100%;
            width: 0%;
            border-radius: 10px;
            background: linear-gradient(90deg, #c0152a, #ff6b6b, #fff);
            transition: width 0.08s linear;
        }

        .loading-text {
            font-size: 13px;
            color: rgba(255,255,255,0.4);
            letter-spacing: 1.5px;
            text-transform: uppercase;
            opacity: 0;
            animation: fadeSlideUp 0.6s ease 0.8s forwards;
            min-height: 20px;
        }

        /* ── READY PHASE ── */
        #readyPhase {
            display: none;
            flex-direction: column;
            align-items: center;
            gap: 0;
        }

        .ready-eyebrow {
            font-size: 12px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: rgba(255,107,107,0.8);
            font-weight: 600;
            margin-bottom: 16px;
            animation: fadeSlideUp .5s ease forwards;
        }

        .ready-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(48px, 10vw, 88px);
            font-weight: 900;
            line-height: 1.02;
            letter-spacing: -2px;
            color: white;
            margin-bottom: 12px;
            animation: fadeSlideUp .6s ease .1s both;
        }
        .ready-title span { color: #ff6b6b; }
        .ready-title em {
            font-style: italic;
            color: rgba(255,255,255,0.55);
        }

        .ready-sub {
            font-size: clamp(15px, 2.5vw, 18px);
            color: rgba(255,255,255,0.55);
            max-width: 480px;
            line-height: 1.75;
            margin: 0 auto 48px;
            font-weight: 300;
            animation: fadeSlideUp .6s ease .2s both;
        }

        /* CTA BUTTON */
        .cta-wrap {
            display: flex;
            gap: 14px;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeSlideUp .6s ease .35s both;
        }

        .btn-cta-primary {
            position: relative;
            background: linear-gradient(135deg, #c0152a, #8b0e1d);
            color: white;
            border: none;
            border-radius: 60px;
            padding: 18px 48px;
            font-size: 17px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            letter-spacing: .3px;
            overflow: hidden;
            transition: transform .3s ease, box-shadow .3s ease;
            box-shadow: 0 8px 32px rgba(192,21,42,0.5), 0 0 0 0 rgba(192,21,42,0.4);
            animation: ctaPulse 2.5s ease-in-out infinite;
        }
        @keyframes ctaPulse {
            0%, 100% { box-shadow: 0 8px 32px rgba(192,21,42,0.5), 0 0 0 0 rgba(192,21,42,0.4); }
            50%       { box-shadow: 0 8px 32px rgba(192,21,42,0.5), 0 0 0 16px rgba(192,21,42,0); }
        }
        .btn-cta-primary::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
            transition: left .5s ease;
        }
        .btn-cta-primary:hover::before { left: 100%; }
        .btn-cta-primary:hover {
            transform: translateY(-4px) scale(1.03);
            box-shadow: 0 16px 40px rgba(192,21,42,0.6);
        }

        .btn-cta-ghost {
            background: transparent;
            color: rgba(255,255,255,0.7);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 60px;
            padding: 18px 36px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            backdrop-filter: blur(8px);
            transition: all .3s ease;
        }
        .btn-cta-ghost:hover {
            background: rgba(255,255,255,0.1);
            color: white;
            border-color: rgba(255,255,255,0.4);
            transform: translateY(-3px);
        }

        /* Stats row */
        .stats-row {
            display: flex;
            gap: 0;
            justify-content: center;
            margin-top: 52px;
            border-top: 1px solid rgba(255,255,255,0.07);
            padding-top: 32px;
            animation: fadeSlideUp .6s ease .5s both;
        }
        .stat-item {
            padding: 0 28px;
            border-right: 1px solid rgba(255,255,255,0.08);
            text-align: center;
        }
        .stat-item:last-child { border-right: none; }
        .stat-num {
            font-family: 'Playfair Display', serif;
            font-size: clamp(22px, 4vw, 32px);
            font-weight: 900;
            color: #ff8fa3;
            line-height: 1;
        }
        .stat-lbl {
            font-size: 11px;
            color: rgba(255,255,255,0.35);
            letter-spacing: 1.2px;
            text-transform: uppercase;
            margin-top: 5px;
        }

        /* Blood drop decorations */
        .float-drop {
            position: fixed;
            border-radius: 50% 50% 50% 0 / 60% 60% 40% 40%;
            background: rgba(192,21,42,0.25);
            animation: floatUp linear infinite;
            pointer-events: none;
            z-index: 4;
        }
        @keyframes floatUp {
            0%   { transform: translateY(0) rotate(-45deg) scale(1); opacity:0; }
            10%  { opacity:1; }
            80%  { opacity:.6; }
            100% { transform: translateY(-110vh) rotate(-45deg) scale(.5); opacity:0; }
        }

        /* Scroll hint */
        .scroll-hint {
            position: fixed;
            bottom: 28px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 20;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            opacity: 0;
            animation: fadeSlideUp .6s ease .9s both;
        }
        .scroll-mouse {
            width: 22px; height: 34px;
            border: 2px solid rgba(255,255,255,0.2);
            border-radius: 14px;
            display: flex; align-items: flex-start; justify-content: center;
            padding-top: 5px;
        }
        .scroll-dot {
            width: 4px; height: 4px;
            border-radius: 50%;
            background: rgba(255,255,255,0.5);
            animation: scrollBounce 1.6s ease-in-out infinite;
        }
        @keyframes scrollBounce {
            0%, 100% { transform: translateY(0); opacity:1; }
            50%       { transform: translateY(10px); opacity:.3; }
        }
        .scroll-hint span { font-size: 10px; letter-spacing: 2px; text-transform: uppercase; color: rgba(255,255,255,0.25); }

        /* Transition overlay */
        #transitionOverlay {
            position: fixed; inset: 0;
            background: #0a0005;
            z-index: 999;
            opacity: 0;
            pointer-events: none;
            transition: opacity .5s ease;
        }
        #transitionOverlay.active { opacity: 1; pointer-events: all; }
    </style>
</head>
<body>

<!-- Transition overlay -->
<div id="transitionOverlay"></div>

<!-- Background layers -->
<div class="bg-mesh"></div>
<div class="bg-grain"></div>

<!-- Canvases -->
<canvas id="particleCanvas"></canvas>
<canvas id="helixCanvas"></canvas>

<!-- Pulsing rings -->
<div class="rings">
    <div class="ring"></div>
    <div class="ring"></div>
    <div class="ring"></div>
    <div class="ring"></div>
</div>

<!-- Floating blood drops -->
<div class="float-drop" style="left:5%;bottom:0;width:14px;height:19px;animation-duration:9s;animation-delay:0s;"></div>
<div class="float-drop" style="left:18%;bottom:0;width:9px;height:12px;animation-duration:7s;animation-delay:1.5s;"></div>
<div class="float-drop" style="left:35%;bottom:0;width:12px;height:16px;animation-duration:11s;animation-delay:3s;"></div>
<div class="float-drop" style="left:55%;bottom:0;width:8px;height:11px;animation-duration:8s;animation-delay:0.8s;"></div>
<div class="float-drop" style="left:70%;bottom:0;width:16px;height:21px;animation-duration:10s;animation-delay:2.2s;"></div>
<div class="float-drop" style="left:85%;bottom:0;width:10px;height:14px;animation-duration:6.5s;animation-delay:4s;"></div>
<div class="float-drop" style="left:92%;bottom:0;width:7px;height:10px;animation-duration:9.5s;animation-delay:1s;"></div>

<!-- Main content -->
<div class="splash-content">

    <!-- ── LOADING PHASE ── -->
    <div id="loadingPhase">
        <!-- Animated heart/drop SVG -->
        <div class="heart-drop">
            <svg viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <radialGradient id="hg" cx="50%" cy="40%" r="60%">
                        <stop offset="0%" stop-color="#ff6b6b"/>
                        <stop offset="100%" stop-color="#8b0e1d"/>
                    </radialGradient>
                    <filter id="glow">
                        <feGaussianBlur stdDeviation="3" result="blur"/>
                        <feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge>
                    </filter>
                </defs>
                <!-- Drop shape -->
                <path d="M45 82 C45 82 12 54 12 34 C12 20 22 10 34 10 C39 10 44 13 45 14 C46 13 51 10 56 10 C68 10 78 20 78 34 C78 54 45 82 45 82Z"
                      fill="url(#hg)" filter="url(#glow)"/>
                <!-- Inner shine -->
                <ellipse cx="34" cy="28" rx="6" ry="9" fill="rgba(255,255,255,0.2)" transform="rotate(-20,34,28)"/>
                <!-- DNA cross line inside -->
                <line x1="32" y1="40" x2="58" y2="40" stroke="rgba(255,255,255,0.35)" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="37" y1="34" x2="53" y2="34" stroke="rgba(255,255,255,0.2)" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="34" y1="46" x2="56" y2="46" stroke="rgba(255,255,255,0.2)" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
        </div>

        <div class="brand-loading">Life<span>Drop</span></div>
        <div class="brand-tagline">Every Drop Counts</div>

        <div class="loading-bar-wrap">
            <div class="loading-bar-fill" id="loadBar"></div>
        </div>
        <div class="loading-text" id="loadText">Initialising...</div>
    </div>

    <!-- ── READY PHASE ── -->
    <div id="readyPhase">
        <div class="ready-eyebrow">Welcome to LifeDrop</div>
        <div class="ready-title">
            One Drop.<br>
            <em>Three Lives.</em><br>
            <span>Infinite Hope.</span>
        </div>
        <p class="ready-sub">
            Blood can't be manufactured — it can only come from people like you.
            Join thousands of donors saving lives across India, every single day.
        </p>

        <div class="cta-wrap">
            <a href="<?php echo e(route('home')); ?>" class="btn-cta-primary" id="donateBtn" onclick="goHome(event)">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402 0-3.791 3.068-5.191 5.281-5.191 1.312 0 4.151.501 5.719 4.457 1.59-3.968 4.464-4.447 5.726-4.447 2.54 0 5.274 1.621 5.274 5.181 0 4.069-5.136 8.625-11 14.402z" fill="white"/>
                </svg>
                Let's Donate
            </a>
            <a href="<?php echo e(route('donors.search')); ?>" class="btn-cta-ghost" onclick="goPage(event, this.href)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
                </svg>
                Find a Donor
            </a>
        </div>

        <div class="stats-row">
            <div class="stat-item">
                <div class="stat-num">4.5M+</div>
                <div class="stat-lbl">Units Needed Daily</div>
            </div>
            <div class="stat-item">
                <div class="stat-num">3</div>
                <div class="stat-lbl">Lives per Donation</div>
            </div>
            <div class="stat-item">
                <div class="stat-num">56</div>
                <div class="stat-lbl">Days Between Donations</div>
            </div>
            <div class="stat-item">
                <div class="stat-num">∞</div>
                <div class="stat-lbl">Hope Given</div>
            </div>
        </div>
    </div>
</div>

<!-- Scroll hint (shows after ready) -->
<div class="scroll-hint" id="scrollHint" style="display:none;">
    <div class="scroll-mouse"><div class="scroll-dot"></div></div>
    <span>Scroll to explore</span>
</div>

<script>
/* ══════════════════════════════════════════════
   PARTICLE SYSTEM
══════════════════════════════════════════════ */
(function() {
    const canvas = document.getElementById('particleCanvas');
    const ctx    = canvas.getContext('2d');
    let W, H;
    const particles = [];

    function resize() {
        W = canvas.width  = window.innerWidth;
        H = canvas.height = window.innerHeight;
    }
    resize();
    window.addEventListener('resize', resize);

    class Particle {
        constructor() { this.reset(true); }
        reset(init) {
            this.x    = Math.random() * (W || window.innerWidth);
            this.y    = init ? Math.random() * (H || window.innerHeight) : (H || window.innerHeight) + 10;
            this.size = Math.random() * 2.5 + 0.5;
            this.speedY = -(Math.random() * 0.6 + 0.2);
            this.speedX = (Math.random() - 0.5) * 0.4;
            this.opacity = Math.random() * 0.6 + 0.1;
            this.life = 0;
            this.maxLife = Math.random() * 300 + 150;
            const r = Math.random();
            if (r < 0.5)       this.color = `rgba(192,21,42,${this.opacity})`;
            else if (r < 0.8)  this.color = `rgba(255,107,107,${this.opacity * 0.7})`;
            else               this.color = `rgba(255,255,255,${this.opacity * 0.4})`;
        }
        update() {
            this.x += this.speedX;
            this.y += this.speedY;
            this.life++;
            if (this.life > this.maxLife || this.y < -20) this.reset(false);
        }
        draw() {
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fillStyle = this.color;
            ctx.fill();
        }
    }

    for (let i = 0; i < 120; i++) particles.push(new Particle());

    function animate() {
        ctx.clearRect(0, 0, W, H);
        particles.forEach(p => { p.update(); p.draw(); });
        requestAnimationFrame(animate);
    }
    animate();
})();

/* ══════════════════════════════════════════════
   DNA HELIX
══════════════════════════════════════════════ */
(function() {
    const canvas = document.getElementById('helixCanvas');
    const ctx    = canvas.getContext('2d');
    let W, H, t  = 0;

    function resize() {
        W = canvas.width  = window.innerWidth;
        H = canvas.height = window.innerHeight;
    }
    resize();
    window.addEventListener('resize', resize);

    function draw() {
        ctx.clearRect(0, 0, W, H);

        // Draw two vertical helices on left and right sides
        const positions = [W * 0.07, W * 0.93];
        positions.forEach((cx, si) => {
            const amp = 28, freq = 0.022, speed = 0.45;
            const dir = si === 0 ? 1 : -1;

            // Strand A
            ctx.beginPath();
            for (let y = 0; y < H; y++) {
                const x = cx + dir * Math.sin(y * freq + t * speed) * amp;
                y === 0 ? ctx.moveTo(x, y) : ctx.lineTo(x, y);
            }
            ctx.strokeStyle = 'rgba(192,21,42,0.55)';
            ctx.lineWidth = 1.5;
            ctx.stroke();

            // Strand B
            ctx.beginPath();
            for (let y = 0; y < H; y++) {
                const x = cx - dir * Math.sin(y * freq + t * speed) * amp;
                y === 0 ? ctx.moveTo(x, y) : ctx.lineTo(x, y);
            }
            ctx.strokeStyle = 'rgba(255,100,100,0.3)';
            ctx.lineWidth = 1.5;
            ctx.stroke();

            // Rungs
            for (let y = 20; y < H; y += 38) {
                const ry = (y + t * speed * 38 * 0.5) % H;
                const x1 = cx + dir * Math.sin(ry * freq + t * speed) * amp;
                const x2 = cx - dir * Math.sin(ry * freq + t * speed) * amp;
                const alpha = 0.3 + 0.3 * Math.sin(ry * 0.02 + t);
                ctx.beginPath();
                ctx.moveTo(x1, ry);
                ctx.lineTo(x2, ry);
                ctx.strokeStyle = `rgba(255,150,150,${alpha})`;
                ctx.lineWidth = 1;
                ctx.stroke();
                [x1, x2].forEach(x => {
                    ctx.beginPath();
                    ctx.arc(x, ry, 2, 0, Math.PI * 2);
                    ctx.fillStyle = `rgba(255,180,180,${alpha + 0.2})`;
                    ctx.fill();
                });
            }
        });

        // Centre faint helix
        const cAmp = 50, cFreq = 0.016, cSpeed = 0.3;
        ctx.globalAlpha = 0.12;
        ctx.beginPath();
        for (let y = 0; y < H; y++) {
            const x = W/2 + Math.sin(y * cFreq + t * cSpeed) * cAmp;
            y === 0 ? ctx.moveTo(x, y) : ctx.lineTo(x, y);
        }
        ctx.strokeStyle = 'rgba(255,100,100,1)';
        ctx.lineWidth = 2;
        ctx.stroke();
        ctx.beginPath();
        for (let y = 0; y < H; y++) {
            const x = W/2 - Math.sin(y * cFreq + t * cSpeed) * cAmp;
            y === 0 ? ctx.moveTo(x, y) : ctx.lineTo(x, y);
        }
        ctx.stroke();
        ctx.globalAlpha = 1;

        t += 0.012;
        requestAnimationFrame(draw);
    }
    draw();
})();

/* ══════════════════════════════════════════════
   LOADING SEQUENCE
══════════════════════════════════════════════ */
const messages = [
    'Initialising LifeDrop…',
    'Connecting donor network…',
    'Loading blood groups…',
    'Finding heroes near you…',
    'Ready to save lives…'
];

let progress = 0;
let msgIdx   = 0;
const bar    = document.getElementById('loadBar');
const txt    = document.getElementById('loadText');

function tick() {
    progress += Math.random() * 4 + 1.5;
    if (progress > 100) progress = 100;

    bar.style.width = progress + '%';

    const newMsgIdx = Math.floor((progress / 100) * messages.length);
    if (newMsgIdx !== msgIdx && newMsgIdx < messages.length) {
        msgIdx = newMsgIdx;
        txt.style.opacity = '0';
        setTimeout(() => {
            txt.textContent  = messages[msgIdx];
            txt.style.opacity = '1';
            txt.style.transition = 'opacity .4s ease';
        }, 200);
    }

    if (progress < 100) {
        setTimeout(tick, 60 + Math.random() * 80);
    } else {
        // Show ready phase after bar completes
        setTimeout(showReady, 500);
    }
}

// Start loading tick after initial animations settle
setTimeout(tick, 1200);

function showReady() {
    const loading = document.getElementById('loadingPhase');
    const ready   = document.getElementById('readyPhase');
    const hint    = document.getElementById('scrollHint');

    loading.style.transition = 'opacity .5s ease, transform .5s ease';
    loading.style.opacity    = '0';
    loading.style.transform  = 'translateY(-20px)';

    setTimeout(() => {
        loading.style.display = 'none';
        ready.style.display   = 'flex';
        hint.style.display    = 'flex';
        // Trigger re-animation
        void ready.offsetWidth;
    }, 500);
}

/* ══════════════════════════════════════════════
   NAVIGATION WITH TRANSITION
══════════════════════════════════════════════ */
function goHome(e) {
    e.preventDefault();
    const overlay = document.getElementById('transitionOverlay');
    overlay.classList.add('active');
    setTimeout(() => { window.location.href = e.currentTarget.href; }, 500);
}

function goPage(e, href) {
    e.preventDefault();
    const overlay = document.getElementById('transitionOverlay');
    overlay.classList.add('active');
    setTimeout(() => { window.location.href = href; }, 500);
}
</script>
</body>
</html><?php /**PATH C:\Users\kamir\OneDrive\Desktop\Laravel Projects\lifedrop\resources\views/landingpage.blade.php ENDPATH**/ ?>