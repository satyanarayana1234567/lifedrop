<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeDrop — Every Drop Counts</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
    /* ═══════════════════════════════════════════════════
       BASE
    ═══════════════════════════════════════════════════ */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }
    body {
        font-family: 'DM Sans', sans-serif;
        background: #0a0005;
        color: white;
        overflow-x: hidden;
    }

    /* ═══════════════════════════════════════════════════
       LOADER OVERLAY  (full screen, sits on top of everything)
    ═══════════════════════════════════════════════════ */
    #loaderOverlay {
        position: fixed; inset: 0; z-index: 9999;
        background: #0a0005;
        display: flex; align-items: center; justify-content: center;
        flex-direction: column;
        transition: opacity .6s ease, visibility .6s ease;
    }
    #loaderOverlay.hidden {
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
    }

    .loader-heart {
        width: 80px; height: 80px;
        margin-bottom: 28px;
        animation: hbeat 1.3s ease-in-out infinite;
    }
    @keyframes hbeat {
        0%,100%{transform:scale(1);}
        14%{transform:scale(1.2);}
        28%{transform:scale(1);}
        42%{transform:scale(1.13);}
    }
    .loader-brand {
        font-family: 'Playfair Display', serif;
        font-size: clamp(42px, 9vw, 76px);
        font-weight: 900;
        letter-spacing: -2px;
        color: white;
        opacity: 0;
        animation: fadeUp .8s ease .2s forwards;
    }
    .loader-brand span { color: #ff6b6b; }
    .loader-tag {
        font-size: 13px; letter-spacing: 3px; text-transform: uppercase;
        color: rgba(255,255,255,0.4); margin-top: 6px; margin-bottom: 44px;
        opacity: 0; animation: fadeUp .8s ease .4s forwards;
    }
    .loader-bar-wrap {
        width: 200px; height: 3px;
        background: rgba(255,255,255,0.1); border-radius: 10px; overflow: hidden;
        opacity: 0; animation: fadeUp .6s ease .6s forwards;
    }
    .loader-bar-fill {
        height: 100%; width: 0%;
        background: linear-gradient(90deg, #c0152a, #ff6b6b, #fff);
        border-radius: 10px; transition: width .08s linear;
    }
    .loader-msg {
        margin-top: 14px; font-size: 12px; letter-spacing: 1.5px;
        text-transform: uppercase; color: rgba(255,255,255,0.35);
        min-height: 18px; opacity: 0;
        animation: fadeUp .6s ease .7s forwards;
        transition: opacity .3s;
    }

    /* loader bg rings */
    .loader-rings {
        position: absolute; inset: 0;
        display: flex; align-items: center; justify-content: center;
        pointer-events: none; overflow: hidden;
    }
    .lring {
        position: absolute; border-radius: 50%;
        border: 1px solid rgba(192,21,42,0.15);
        animation: lexpand 4s linear infinite;
    }
    .lring:nth-child(1){animation-delay:0s;}
    .lring:nth-child(2){animation-delay:1s;}
    .lring:nth-child(3){animation-delay:2s;}
    .lring:nth-child(4){animation-delay:3s;}
    @keyframes lexpand {
        0%  {width:60px;height:60px;opacity:.8;}
        100%{width:900px;height:900px;opacity:0;}
    }

    /* loader particles canvas */
    #loaderCanvas { position:absolute; inset:0; pointer-events:none; }

    @keyframes fadeUp {
        from { opacity:0; transform: translateY(24px); }
        to   { opacity:1; transform: translateY(0); }
    }

    /* ═══════════════════════════════════════════════════
       PAGE TRANSITION CURTAIN
    ═══════════════════════════════════════════════════ */
    #curtain {
        position: fixed; inset: 0; z-index: 9998;
        background: #0a0005;
        opacity: 0; pointer-events: none;
        transition: opacity .5s ease;
    }
    #curtain.closing { opacity: 1; pointer-events: all; }

    /* ═══════════════════════════════════════════════════
       FIXED BACKGROUND (persists across all sections)
    ═══════════════════════════════════════════════════ */
    .fixed-bg {
        position: fixed; inset: 0; z-index: 0; pointer-events: none;
    }
    .bg-mesh {
        position: absolute; inset: 0;
        background:
            radial-gradient(ellipse 80% 60% at 15% 15%, rgba(160,10,30,0.5) 0%, transparent 55%),
            radial-gradient(ellipse 60% 80% at 85% 85%, rgba(100,0,20,0.55) 0%, transparent 55%),
            radial-gradient(ellipse 70% 50% at 50% 50%, rgba(50,0,10,0.35) 0%, transparent 65%),
            linear-gradient(160deg, #0a0005 0%, #180008 45%, #0d0005 100%);
    }
    #bgCanvas { position:absolute; inset:0; width:100%; height:100%; opacity:.28; }

    /* Floating drops */
    .fdrop {
        position: fixed; pointer-events: none; z-index: 1;
        border-radius: 50% 50% 50% 0 / 60% 60% 40% 40%;
        background: rgba(192,21,42,0.22);
        animation: fdropUp linear infinite;
    }
    @keyframes fdropUp {
        0%  {transform:translateY(0) rotate(-45deg);opacity:0;}
        10% {opacity:1;} 85%{opacity:.5;}
        100%{transform:translateY(-105vh) rotate(-45deg);opacity:0;}
    }

    /* ═══════════════════════════════════════════════════
       SCROLLABLE PAGE WRAPPER
    ═══════════════════════════════════════════════════ */
    #page { position: relative; z-index: 2; }

    /* ═══════════════════════════════════════════════════
       HERO SECTION
    ═══════════════════════════════════════════════════ */
    .hero-section {
        min-height: 100vh;
        display: flex; align-items: center; justify-content: center;
        text-align: center;
        padding: 60px 24px 80px;
        position: relative;
    }

    /* Pulse rings in hero */
    .hero-rings {
        position: absolute; inset: 0;
        display: flex; align-items: center; justify-content: center;
        pointer-events: none; overflow: hidden;
    }
    .hring {
        position: absolute; border-radius: 50%;
        border: 1px solid rgba(192,21,42,0.12);
        animation: hringExpand 5s linear infinite;
    }
    .hring:nth-child(1){animation-delay:0s;}
    .hring:nth-child(2){animation-delay:1.25s;}
    .hring:nth-child(3){animation-delay:2.5s;}
    .hring:nth-child(4){animation-delay:3.75s;}
    @keyframes hringExpand {
        0%  {width:80px;height:80px;opacity:.7;}
        100%{width:1100px;height:1100px;opacity:0;}
    }

    .hero-inner { position: relative; z-index: 2; max-width: 760px; }

    .hero-badge {
        display: inline-flex; align-items: center; gap: 8px;
        background: rgba(192,21,42,0.2);
        border: 1px solid rgba(192,21,42,0.4);
        border-radius: 50px; padding: 7px 22px;
        font-size: 12px; font-weight: 600; letter-spacing: 2px;
        text-transform: uppercase; color: #ff9999;
        margin-bottom: 28px;
        animation: fadeUp .7s ease .1s both;
    }

    .hero-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(46px, 9vw, 90px);
        font-weight: 900; line-height: 1.02;
        letter-spacing: -2px; color: white;
        margin-bottom: 14px;
        animation: fadeUp .8s ease .2s both;
    }
    .hero-title .red   { color: #ff6b6b; }
    .hero-title .muted { color: rgba(255,255,255,0.4); font-style: italic; }

    .hero-sub {
        font-size: clamp(15px, 2.2vw, 19px);
        color: rgba(255,255,255,0.5);
        max-width: 520px; margin: 0 auto 52px;
        line-height: 1.8; font-weight: 300;
        animation: fadeUp .8s ease .3s both;
    }

    .hero-btns {
        display: flex; gap: 14px; justify-content: center; flex-wrap: wrap;
        animation: fadeUp .8s ease .4s both;
    }

    .btn-primary-cta {
        position: relative; overflow: hidden;
        background: linear-gradient(135deg, #c0152a, #8b0e1d);
        color: white; border: none; border-radius: 60px;
        padding: 17px 46px; font-size: 17px; font-weight: 700;
        cursor: pointer; text-decoration: none;
        display: inline-flex; align-items: center; gap: 10px;
        transition: transform .3s, box-shadow .3s;
        box-shadow: 0 8px 30px rgba(192,21,42,0.5);
        animation: ctaPulse 2.8s ease-in-out infinite;
    }
    @keyframes ctaPulse {
        0%,100%{box-shadow:0 8px 30px rgba(192,21,42,.5),0 0 0 0 rgba(192,21,42,.35);}
        50%{box-shadow:0 8px 30px rgba(192,21,42,.5),0 0 0 18px rgba(192,21,42,0);}
    }
    .btn-primary-cta::before {
        content:''; position:absolute; top:0; left:-100%; width:100%; height:100%;
        background:linear-gradient(90deg,transparent,rgba(255,255,255,0.18),transparent);
        transition:left .5s;
    }
    .btn-primary-cta:hover::before { left:100%; }
    .btn-primary-cta:hover { transform:translateY(-4px) scale(1.03); color:white; }

    .btn-ghost-cta {
        background: transparent; color: rgba(255,255,255,0.65);
        border: 1px solid rgba(255,255,255,0.2); border-radius: 60px;
        padding: 17px 36px; font-size: 16px; font-weight: 500;
        cursor: pointer; text-decoration: none;
        display: inline-flex; align-items: center; gap: 10px;
        backdrop-filter: blur(8px);
        transition: all .3s;
    }
    .btn-ghost-cta:hover {
        background: rgba(255,255,255,0.1); color: white;
        border-color: rgba(255,255,255,0.4);
        transform: translateY(-3px);
    }

    /* Hero stats */
    .hero-stats {
        display: flex; justify-content: center;
        border-top: 1px solid rgba(255,255,255,0.07);
        margin-top: 64px; padding-top: 32px;
        flex-wrap: wrap;
        animation: fadeUp .8s ease .55s both;
    }
    .hstat {
        padding: 0 30px; text-align: center;
        border-right: 1px solid rgba(255,255,255,0.07);
    }
    .hstat:last-child { border-right: none; }
    .hstat-num {
        font-family: 'Playfair Display', serif;
        font-size: clamp(24px, 4vw, 36px);
        font-weight: 900; color: #ff8fa3; line-height: 1;
    }
    .hstat-lbl {
        font-size: 11px; letter-spacing: 1.5px;
        text-transform: uppercase; color: rgba(255,255,255,0.3);
        margin-top: 5px;
    }

    /* Scroll indicator */
    .scroll-cue {
        position: absolute; bottom: 30px; left: 50%;
        transform: translateX(-50%);
        display: flex; flex-direction: column; align-items: center; gap: 8px;
        animation: fadeUp .6s ease 1.2s both;
    }
    .scroll-mouse {
        width: 22px; height: 34px;
        border: 2px solid rgba(255,255,255,0.18);
        border-radius: 14px;
        display: flex; align-items: flex-start; justify-content: center;
        padding-top: 5px;
    }
    .scroll-dot {
        width: 4px; height: 4px; border-radius: 50%;
        background: rgba(255,255,255,0.45);
        animation: sdot 1.7s ease-in-out infinite;
    }
    @keyframes sdot { 0%,100%{transform:translateY(0);opacity:1;} 50%{transform:translateY(10px);opacity:.3;} }
    .scroll-cue span { font-size: 10px; letter-spacing: 2.5px; text-transform: uppercase; color: rgba(255,255,255,0.22); }

    /* ═══════════════════════════════════════════════════
       SHARED SECTION STYLES
    ═══════════════════════════════════════════════════ */
    .section { padding: 100px 24px; }
    .section-inner { max-width: 1100px; margin: 0 auto; }

    .sec-label {
        font-size: 11px; letter-spacing: 3px; text-transform: uppercase;
        color: #ff8fa3; font-weight: 700; margin-bottom: 12px;
    }
    .sec-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(28px, 4.5vw, 50px);
        font-weight: 900; line-height: 1.15;
        color: white;
    }
    .sec-sub {
        color: rgba(255,255,255,0.45);
        font-size: 16px; line-height: 1.8; max-width: 540px;
        margin-top: 12px;
    }

    /* reveal on scroll */
    .reveal { opacity:0; transform:translateY(48px); transition:opacity .75s ease,transform .75s ease; }
    .reveal.visible { opacity:1; transform:translateY(0); }
    .reveal-l { opacity:0; transform:translateX(-56px); transition:opacity .75s ease,transform .75s ease; }
    .reveal-l.visible { opacity:1; transform:translateX(0); }
    .reveal-r { opacity:0; transform:translateX(56px); transition:opacity .75s ease,transform .75s ease; }
    .reveal-r.visible { opacity:1; transform:translateX(0); }
    .d1{transition-delay:.1s;} .d2{transition-delay:.2s;} .d3{transition-delay:.3s;} .d4{transition-delay:.4s;}

    /* ═══════════════════════════════════════════════════
       DIVIDER
    ═══════════════════════════════════════════════════ */
    .sec-divider {
        max-width: 1100px; margin: 0 auto;
        border: none; border-top: 1px solid rgba(255,255,255,0.06);
    }

    /* ═══════════════════════════════════════════════════
       HOW IT WORKS
    ═══════════════════════════════════════════════════ */
    .steps-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 24px; margin-top: 56px;
    }
    .step-card {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 24px; padding: 36px 28px;
        text-align: center;
        transition: background .35s, border-color .35s, transform .35s;
        cursor: default;
    }
    .step-card:hover {
        background: rgba(192,21,42,0.15);
        border-color: rgba(192,21,42,0.4);
        transform: translateY(-8px);
    }
    .step-num {
        font-family: 'Playfair Display', serif;
        font-size: 42px; font-weight: 900; color: rgba(192,21,42,0.35);
        line-height: 1; margin-bottom: 14px;
    }
    .step-icon { font-size: 36px; margin-bottom: 14px; }
    .step-title {
        font-weight: 700; font-size: 17px; color: white; margin-bottom: 10px;
    }
    .step-desc { font-size: 14px; color: rgba(255,255,255,0.45); line-height: 1.75; }

    /* ═══════════════════════════════════════════════════
       BLOOD TYPES
    ═══════════════════════════════════════════════════ */
    .blood-types-section {
        background: rgba(255,255,255,0.02);
        border-top: 1px solid rgba(255,255,255,0.05);
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }
    .blood-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px; margin-top: 48px;
    }
    @media(max-width:600px){ .blood-grid{grid-template-columns:repeat(2,1fr);} }
    .blood-type-card {
        border-radius: 20px;
        padding: 28px 18px;
        text-align: center;
        border: 1px solid rgba(192,21,42,0.25);
        background: rgba(192,21,42,0.07);
        transition: all .35s;
        cursor: default;
    }
    .blood-type-card:hover {
        background: rgba(192,21,42,0.22);
        border-color: rgba(192,21,42,0.6);
        transform: scale(1.06);
        box-shadow: 0 12px 36px rgba(192,21,42,0.3);
    }
    .bt-group {
        font-family: 'Playfair Display', serif;
        font-size: 32px; font-weight: 900; color: #ff8fa3;
    }
    .bt-label { font-size: 11px; letter-spacing: 1.5px; text-transform: uppercase; color: rgba(255,255,255,0.35); margin-top: 6px; }

    /* ═══════════════════════════════════════════════════
       WHY DONATE (facts)
    ═══════════════════════════════════════════════════ */
    .facts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px; margin-top: 52px;
    }
    .fact-card {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 20px; padding: 30px 26px;
        display: flex; align-items: flex-start; gap: 18px;
        transition: all .35s;
    }
    .fact-card:hover {
        background: rgba(192,21,42,0.12);
        border-color: rgba(192,21,42,0.3);
        transform: translateX(6px);
    }
    .fact-icon {
        width: 52px; height: 52px; border-radius: 14px;
        background: rgba(192,21,42,0.2);
        display: flex; align-items: center; justify-content: center;
        font-size: 24px; flex-shrink: 0;
    }
    .fact-title { font-weight: 700; font-size: 16px; color: white; margin-bottom: 6px; }
    .fact-body  { font-size: 14px; color: rgba(255,255,255,0.45); line-height: 1.7; }

    /* ═══════════════════════════════════════════════════
       TESTIMONIALS
    ═══════════════════════════════════════════════════ */
    .testi-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px; margin-top: 52px;
    }
    .testi-card {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 24px; padding: 32px 28px;
        transition: all .35s;
        position: relative;
    }
    .testi-card::before {
        content: '"';
        position: absolute; top: 14px; right: 22px;
        font-family: 'Playfair Display', serif;
        font-size: 80px; color: rgba(192,21,42,0.18);
        line-height: 1;
    }
    .testi-card:hover {
        background: rgba(192,21,42,0.1);
        border-color: rgba(192,21,42,0.3);
        transform: translateY(-6px);
    }
    .testi-text {
        font-size: 15px; color: rgba(255,255,255,0.65);
        line-height: 1.8; margin-bottom: 20px; font-style: italic;
    }
    .testi-author { display: flex; align-items: center; gap: 12px; }
    .testi-avatar {
        width: 44px; height: 44px; border-radius: 50%;
        background: linear-gradient(135deg, #c0152a, #8b0e1d);
        display: flex; align-items: center; justify-content: center;
        font-size: 20px; flex-shrink: 0;
    }
    .testi-name  { font-weight: 700; font-size: 14px; color: white; }
    .testi-role  { font-size: 12px; color: rgba(255,255,255,0.3); }
    .stars { color: #f59e0b; font-size: 13px; letter-spacing: 1px; }

    /* ═══════════════════════════════════════════════════
       FINAL CTA BAND
    ═══════════════════════════════════════════════════ */
    .cta-band {
        text-align: center; padding: 100px 24px;
        position: relative; overflow: hidden;
    }
    .cta-band::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse 80% 80% at 50% 50%, rgba(192,21,42,0.22) 0%, transparent 70%);
        pointer-events: none;
    }
    .cta-band-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(32px, 6vw, 64px);
        font-weight: 900; color: white; line-height: 1.1;
        margin-bottom: 16px; position: relative;
    }
    .cta-band-sub {
        font-size: 17px; color: rgba(255,255,255,0.45);
        max-width: 480px; margin: 0 auto 44px;
        line-height: 1.8; position: relative;
    }
    .cta-band-btns {
        display: flex; gap: 14px; justify-content: center;
        flex-wrap: wrap; position: relative;
    }

    /* ═══════════════════════════════════════════════════
       FOOTER
    ═══════════════════════════════════════════════════ */
    .welcome-footer {
        border-top: 1px solid rgba(255,255,255,0.06);
        padding: 40px 24px 28px;
        text-align: center;
    }
    .footer-brand {
        font-family: 'Playfair Display', serif;
        font-size: 24px; font-weight: 900;
        color: white; margin-bottom: 8px;
    }
    .footer-brand span { color: #ff6b6b; }
    .footer-links {
        display: flex; justify-content: center; gap: 28px;
        flex-wrap: wrap; margin: 18px 0;
    }
    .footer-links a {
        color: rgba(255,255,255,0.35); font-size: 14px;
        text-decoration: none; transition: color .3s;
    }
    .footer-links a:hover { color: #ff8fa3; }
    .footer-copy { font-size: 12px; color: rgba(255,255,255,0.18); }
    </style>
</head>
<body>

<!-- ══════════════════════════════════════════════
     PAGE TRANSITION CURTAIN
══════════════════════════════════════════════ -->
<div id="curtain"></div>

<!-- ══════════════════════════════════════════════
     LOADER OVERLAY
══════════════════════════════════════════════ -->
<div id="loaderOverlay">
    <canvas id="loaderCanvas"></canvas>
    <div class="loader-rings">
        <div class="lring"></div><div class="lring"></div>
        <div class="lring"></div><div class="lring"></div>
    </div>
    <div style="position:relative;z-index:2;text-align:center;display:flex;flex-direction:column;align-items:center;">
        <svg class="loader-heart" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <radialGradient id="hg" cx="50%" cy="40%" r="60%">
                    <stop offset="0%" stop-color="#ff6b6b"/>
                    <stop offset="100%" stop-color="#8b0e1d"/>
                </radialGradient>
                <filter id="glow"><feGaussianBlur stdDeviation="3" result="blur"/><feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge></filter>
            </defs>
            <path d="M45 82 C45 82 12 54 12 34 C12 20 22 10 34 10 C39 10 44 13 45 14 C46 13 51 10 56 10 C68 10 78 20 78 34 C78 54 45 82 45 82Z" fill="url(#hg)" filter="url(#glow)"/>
            <ellipse cx="34" cy="28" rx="6" ry="9" fill="rgba(255,255,255,0.2)" transform="rotate(-20,34,28)"/>
            <line x1="32" y1="40" x2="58" y2="40" stroke="rgba(255,255,255,0.3)" stroke-width="1.5" stroke-linecap="round"/>
            <line x1="37" y1="34" x2="53" y2="34" stroke="rgba(255,255,255,0.2)" stroke-width="1.5" stroke-linecap="round"/>
            <line x1="34" y1="46" x2="56" y2="46" stroke="rgba(255,255,255,0.2)" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
        <div class="loader-brand">Life<span>Drop</span></div>
        <div class="loader-tag">Every Drop Counts</div>
        <div class="loader-bar-wrap"><div class="loader-bar-fill" id="loadBar"></div></div>
        <div class="loader-msg" id="loadMsg">Initialising…</div>
    </div>
</div>

<!-- ══════════════════════════════════════════════
     FIXED BACKGROUND
══════════════════════════════════════════════ -->
<div class="fixed-bg">
    <div class="bg-mesh"></div>
    <canvas id="bgCanvas"></canvas>
</div>

<!-- Floating drops (fixed, behind page) -->
<div class="fdrop" style="left:4%;bottom:0;width:12px;height:16px;animation-duration:9s;animation-delay:0s;z-index:1;"></div>
<div class="fdrop" style="left:16%;bottom:0;width:8px;height:11px;animation-duration:7s;animation-delay:1.5s;z-index:1;"></div>
<div class="fdrop" style="left:32%;bottom:0;width:14px;height:18px;animation-duration:11s;animation-delay:3s;z-index:1;"></div>
<div class="fdrop" style="left:52%;bottom:0;width:9px;height:12px;animation-duration:8s;animation-delay:0.7s;z-index:1;"></div>
<div class="fdrop" style="left:68%;bottom:0;width:16px;height:20px;animation-duration:10s;animation-delay:2s;z-index:1;"></div>
<div class="fdrop" style="left:82%;bottom:0;width:10px;height:13px;animation-duration:6.5s;animation-delay:4s;z-index:1;"></div>
<div class="fdrop" style="left:93%;bottom:0;width:7px;height:10px;animation-duration:9.5s;animation-delay:1.2s;z-index:1;"></div>

<!-- ══════════════════════════════════════════════
     SCROLLABLE PAGE
══════════════════════════════════════════════ -->
<div id="page">

    <!-- ── HERO ── -->
    <section class="hero-section">
        <div class="hero-rings">
            <div class="hring"></div><div class="hring"></div>
            <div class="hring"></div><div class="hring"></div>
        </div>

        <div class="hero-inner">
            <div class="hero-badge">
                <span style="width:7px;height:7px;border-radius:50%;background:#ff6b6b;animation:sdot 1.5s ease-in-out infinite;display:inline-block;"></span>
                Saving Lives Every Day
            </div>

            <h1 class="hero-title">
                One Drop.<br>
                <span class="muted">Three Lives.</span><br>
                <span class="red">Infinite Hope.</span>
            </h1>

            <p class="hero-sub">
                Blood cannot be manufactured — it can only come from generous people like you.
                Join thousands of donors saving lives across India, every single day.
            </p>

            <div class="hero-btns">
                <a href="<?php echo e(route('home')); ?>" class="btn-primary-cta" onclick="navigate(event,this.href)">
                    <i class="fas fa-heart"></i> Let's Donate
                </a>
                <a href="<?php echo e(route('donors.search')); ?>" class="btn-ghost-cta" onclick="navigate(event,this.href)">
                    <i class="fas fa-search"></i> Find a Donor
                </a>
            </div>

            <div class="hero-stats">
                <div class="hstat"><div class="hstat-num">4.5M+</div><div class="hstat-lbl">Units Needed Daily</div></div>
                <div class="hstat"><div class="hstat-num">3</div><div class="hstat-lbl">Lives per Donation</div></div>
                <div class="hstat"><div class="hstat-num">56</div><div class="hstat-lbl">Days Between Donations</div></div>
                <div class="hstat"><div class="hstat-num">∞</div><div class="hstat-lbl">Hope Given</div></div>
            </div>
        </div>

        <div class="scroll-cue">
            <div class="scroll-mouse"><div class="scroll-dot"></div></div>
            <span>Scroll to explore</span>
        </div>
    </section>

    <!-- ── HOW IT WORKS ── -->
    <section class="section">
        <div class="section-inner">
            <div class="reveal" style="text-align:center;margin-bottom:0;">
                <div class="sec-label">Simple Process</div>
                <h2 class="sec-title">How LifeDrop Works</h2>
                <p class="sec-sub" style="margin:0 auto;">
                    From registering to saving a life — it takes just minutes.
                </p>
            </div>

            <div class="steps-grid">
                <div class="step-card reveal d1">
                    <div class="step-num">01</div>
                    <div class="step-icon">📋</div>
                    <div class="step-title">Register as Donor</div>
                    <div class="step-desc">Fill in your basic details, blood group, and city. It takes under 2 minutes and your profile goes live instantly.</div>
                </div>
                <div class="step-card reveal d2">
                    <div class="step-num">02</div>
                    <div class="step-icon">🔍</div>
                    <div class="step-title">Patient Searches</div>
                    <div class="step-desc">Someone in need searches for your blood group in their city and finds your profile with contact details.</div>
                </div>
                <div class="step-card reveal d3">
                    <div class="step-num">03</div>
                    <div class="step-icon">💬</div>
                    <div class="step-title">Instant Contact</div>
                    <div class="step-desc">They reach you directly via WhatsApp in one tap. No delays, no waiting — emergency response at the speed of life.</div>
                </div>
                <div class="step-card reveal d4">
                    <div class="step-num">04</div>
                    <div class="step-icon">🩸</div>
                    <div class="step-title">Donate & Save</div>
                    <div class="step-desc">Visit the hospital or blood bank, donate, and walk away knowing you just gave someone the gift of life.</div>
                </div>
            </div>
        </div>
    </section>

    <hr class="sec-divider">

    <!-- ── BLOOD TYPES ── -->
    <section class="section blood-types-section">
        <div class="section-inner">
            <div class="reveal" style="text-align:center;">
                <div class="sec-label">All Groups Welcome</div>
                <h2 class="sec-title">Every Blood Type Saves Lives</h2>
                <p class="sec-sub" style="margin:0 auto;">
                    Whether you're A+, O−, or AB+, every blood group is urgently needed somewhere right now.
                </p>
            </div>

            <div class="blood-grid">
                <?php $__currentLoopData = [['A+','Most common & in high demand'],['A−','Universal plasma donor'],['B+','3rd most common group'],['B−','Rare — very valuable'],['AB+','Universal recipient'],['AB−','Rarest of all types'],['O+','Most donated group'],['O−','Universal donor 🏆']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="blood-type-card reveal d<?php echo e(($loop->index % 4) + 1); ?>">
                    <div class="bt-group"><?php echo e($bt[0]); ?></div>
                    <div class="bt-label"><?php echo e($bt[1]); ?></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <hr class="sec-divider">

    <!-- ── WHY DONATE ── -->
    <section class="section">
        <div class="section-inner">
            <div class="reveal reveal-l">
                <div class="sec-label">Reasons to Give</div>
                <h2 class="sec-title">Why Donating Blood<br>Matters</h2>
                <p class="sec-sub">The impact of one donation ripples far beyond the hospital room.</p>
            </div>

            <div class="facts-grid" style="margin-top:52px;">
                <div class="fact-card reveal d1">
                    <div class="fact-icon">🚨</div>
                    <div>
                        <div class="fact-title">Every 2 Seconds</div>
                        <div class="fact-body">Someone in India needs blood — for surgery, accidents, cancer treatment, or childbirth complications. Demand never stops.</div>
                    </div>
                </div>
                <div class="fact-card reveal d2">
                    <div class="fact-icon">💧</div>
                    <div>
                        <div class="fact-title">Cannot Be Manufactured</div>
                        <div class="fact-body">Despite decades of research, blood still cannot be artificially created. Human donors are the only source — making you irreplaceable.</div>
                    </div>
                </div>
                <div class="fact-card reveal d3">
                    <div class="fact-icon">❤️‍🩹</div>
                    <div>
                        <div class="fact-title">One Donation = 3 Lives</div>
                        <div class="fact-body">Your blood is separated into red cells, plasma, and platelets — each component saving a different patient. One donor. Three lives.</div>
                    </div>
                </div>
                <div class="fact-card reveal d4">
                    <div class="fact-icon">🩺</div>
                    <div>
                        <div class="fact-title">Donors Stay Healthier</div>
                        <div class="fact-body">Regular donation triggers new blood cell production, reduces harmful iron levels, and is associated with lower heart disease risk.</div>
                    </div>
                </div>
                <div class="fact-card reveal d1">
                    <div class="fact-icon">🧬</div>
                    <div>
                        <div class="fact-title">Free Health Screening</div>
                        <div class="fact-body">Every donation includes a free mini medical check — blood pressure, haemoglobin, and pulse — helping you stay aware of your health.</div>
                    </div>
                </div>
                <div class="fact-card reveal d2">
                    <div class="fact-icon">🌍</div>
                    <div>
                        <div class="fact-title">Community Impact</div>
                        <div class="fact-body">Blood donation strengthens the healthcare system of your entire community. Your 30 minutes of time protects millions of strangers.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr class="sec-divider">

    <!-- ── TESTIMONIALS ── -->
    <section class="section">
        <div class="section-inner">
            <div class="reveal" style="text-align:center;">
                <div class="sec-label">Real Stories</div>
                <h2 class="sec-title">Voices of Our Community</h2>
                <p class="sec-sub" style="margin:0 auto;">
                    Donors and patients who experienced the difference a single drop can make.
                </p>
            </div>

            <div class="testi-grid">
                <div class="testi-card reveal d1">
                    <div class="stars">★★★★★</div>
                    <p class="testi-text" style="margin-top:12px;">
                        "I registered on LifeDrop and within a week I was contacted by a family whose child needed B+ blood urgently. I donated and they sent me a photo of the child recovering. I cried. Best decision of my life."
                    </p>
                    <div class="testi-author">
                        <div class="testi-avatar">🙏</div>
                        <div>
                            <div class="testi-name">Rahul Sharma</div>
                            <div class="testi-role">Regular Donor · Jaipur</div>
                        </div>
                    </div>
                </div>
                <div class="testi-card reveal d2">
                    <div class="stars">★★★★★</div>
                    <p class="testi-text" style="margin-top:12px;">
                        "My mother needed AB− blood after an accident. I searched on LifeDrop at 2 AM and found a donor in our city. He answered WhatsApp immediately and arrived at the hospital within an hour. She survived."
                    </p>
                    <div class="testi-author">
                        <div class="testi-avatar">❤️</div>
                        <div>
                            <div class="testi-name">Priya Mehta</div>
                            <div class="testi-role">Patient's Family · Mumbai</div>
                        </div>
                    </div>
                </div>
                <div class="testi-card reveal d3">
                    <div class="stars">★★★★★</div>
                    <p class="testi-text" style="margin-top:12px;">
                        "I've donated six times since joining LifeDrop. The platform is simple, the requests are genuine, and the feeling you get after donating is indescribable. Every drop truly counts."
                    </p>
                    <div class="testi-author">
                        <div class="testi-avatar">💪</div>
                        <div>
                            <div class="testi-name">Arjun Patel</div>
                            <div class="testi-role">6-time Donor · Ahmedabad</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ── FINAL CTA ── -->
    <div class="cta-band">
        <div class="reveal">
            <h2 class="cta-band-title">Ready to Save a Life?</h2>
            <p class="cta-band-sub">
                It takes 30 minutes. It costs nothing. And it means everything to someone waiting right now.
            </p>
            <div class="cta-band-btns">
                <a href="<?php echo e(route('home')); ?>" class="btn-primary-cta" onclick="navigate(event,this.href)">
                    <i class="fas fa-heart"></i> Get Started Now
                </a>
                <a href="<?php echo e(route('donors.create')); ?>" class="btn-ghost-cta" onclick="navigate(event,this.href)">
                    <i class="fas fa-user-plus"></i> Register as Donor
                </a>
            </div>
        </div>
    </div>

    <!-- ── FOOTER ── -->
    <footer class="welcome-footer">
        <div class="footer-brand">Life<span>Drop</span></div>
        <p style="font-size:13px;color:rgba(255,255,255,0.28);margin-bottom:4px;">Connecting donors with patients across India</p>
    
        <div class="footer-copy">© <?php echo e(date('Y')); ?> LifeDrop · Built with love for humanity · Every drop saves a life</div>
    </footer>

</div><!-- /page -->

<script>
/* ═══════════════════════════════════════════════════
   LOADER CANVAS PARTICLES
═══════════════════════════════════════════════════ */
(function(){
    const c = document.getElementById('loaderCanvas');
    const ctx = c.getContext('2d');
    let W, H;
    const pts = [];
    function resize(){ W = c.width = window.innerWidth; H = c.height = window.innerHeight; }
    resize(); window.addEventListener('resize', resize);
    class P {
        constructor(){ this.reset(true); }
        reset(init){
            this.x = Math.random() * (W||800);
            this.y = init ? Math.random() * (H||600) : (H||600)+10;
            this.r = Math.random()*2+0.4;
            this.vy = -(Math.random()*0.5+0.15);
            this.vx = (Math.random()-.5)*0.3;
            this.a = Math.random()*0.5+0.1;
            this.life = 0; this.ml = Math.random()*280+120;
            const t = Math.random();
            this.c = t<.5 ? `rgba(192,21,42,${this.a})` : t<.8 ? `rgba(255,100,100,${this.a*.7})` : `rgba(255,255,255,${this.a*.35})`;
        }
        update(){ this.x+=this.vx; this.y+=this.vy; this.life++; if(this.life>this.ml||this.y<-10) this.reset(false); }
        draw(){ ctx.beginPath(); ctx.arc(this.x,this.y,this.r,0,Math.PI*2); ctx.fillStyle=this.c; ctx.fill(); }
    }
    for(let i=0;i<100;i++) pts.push(new P());
    function tick(){ ctx.clearRect(0,0,W,H); pts.forEach(p=>{p.update();p.draw();}); requestAnimationFrame(tick); }
    tick();
})();

/* ═══════════════════════════════════════════════════
   BACKGROUND DNA CANVAS
═══════════════════════════════════════════════════ */
(function(){
    const c = document.getElementById('bgCanvas');
    const ctx = c.getContext('2d');
    let W, H, t = 0;
    function resize(){ W = c.width = window.innerWidth; H = c.height = window.innerHeight; }
    resize(); window.addEventListener('resize', resize);
    function draw(){
        ctx.clearRect(0,0,W,H);
        [[W*.06,1],[W*.94,-1]].forEach(([cx,dir])=>{
            const amp=26,freq=0.022,spd=0.4;
            ctx.beginPath();
            for(let y=0;y<H;y++){const x=cx+dir*Math.sin(y*freq+t*spd)*amp;y===0?ctx.moveTo(x,y):ctx.lineTo(x,y);}
            ctx.strokeStyle='rgba(192,21,42,0.5)';ctx.lineWidth=1.4;ctx.stroke();
            ctx.beginPath();
            for(let y=0;y<H;y++){const x=cx-dir*Math.sin(y*freq+t*spd)*amp;y===0?ctx.moveTo(x,y):ctx.lineTo(x,y);}
            ctx.strokeStyle='rgba(255,100,100,0.28)';ctx.lineWidth=1.4;ctx.stroke();
            for(let y=20;y<H;y+=38){
                const ry=(y+t*spd*19)%H;
                const x1=cx+dir*Math.sin(ry*freq+t*spd)*amp;
                const x2=cx-dir*Math.sin(ry*freq+t*spd)*amp;
                ctx.beginPath();ctx.moveTo(x1,ry);ctx.lineTo(x2,ry);
                ctx.strokeStyle='rgba(255,160,160,0.35)';ctx.lineWidth=1;ctx.stroke();
                [x1,x2].forEach(x=>{ctx.beginPath();ctx.arc(x,ry,2,0,Math.PI*2);ctx.fillStyle='rgba(255,200,200,0.55)';ctx.fill();});
            }
        });
        t+=0.011;requestAnimationFrame(draw);
    }
    draw();
})();

/* ═══════════════════════════════════════════════════
   LOADING SEQUENCE
═══════════════════════════════════════════════════ */
const msgs = [
    'Initialising LifeDrop…',
    'Connecting donor network…',
    'Loading blood groups…',
    'Finding heroes near you…',
    'Ready to save lives…'
];
let prog=0, mi=0;
const bar = document.getElementById('loadBar');
const msg = document.getElementById('loadMsg');

function tick(){
    prog += Math.random()*4+1.8;
    if(prog>100) prog=100;
    bar.style.width = prog+'%';

    const ni = Math.min(Math.floor((prog/100)*msgs.length), msgs.length-1);
    if(ni !== mi){
        mi = ni;
        msg.style.opacity='0';
        setTimeout(()=>{ msg.textContent=msgs[mi]; msg.style.opacity='1'; msg.style.transition='opacity .35s'; },200);
    }

    if(prog<100) setTimeout(tick, 55+Math.random()*75);
    else setTimeout(hideLoader, 450);
}
setTimeout(tick, 900);

function hideLoader(){
    document.getElementById('loaderOverlay').classList.add('hidden');
    // enable scroll once loader is gone
    document.body.style.overflow = '';
}

// Prevent scroll while loader is visible
document.body.style.overflow = 'hidden';

/* ═══════════════════════════════════════════════════
   NAVIGATION — simple direct href (no curtain bug)
═══════════════════════════════════════════════════ */
function navigate(e, href){
    e.preventDefault();

    const curtain = document.getElementById('curtain');

    // show smooth transition
    curtain.classList.add('closing');

    // small delay for animation
    setTimeout(() => {
        window.location.assign(href);
    }, 400);
}

/* FIX BACK BUTTON / SWIPE BACK ISSUE */
window.addEventListener("pageshow", function (event) {

    // if page loaded from browser cache
    if (event.persisted) {

        // remove curtain
        document.getElementById("curtain")
            .classList.remove("closing");

        // hide loader completely
        const loader = document.getElementById("loaderOverlay");

        loader.classList.add("hidden");

        loader.style.display = "none";

        // restore scrolling
        document.body.style.overflow = "";
    }
});
/* ═══════════════════════════════════════════════════
   SCROLL REVEAL
═══════════════════════════════════════════════════ */
function revealAll(){
    document.querySelectorAll('.reveal,.reveal-l,.reveal-r').forEach(el=>{
        if(el.getBoundingClientRect().top < window.innerHeight - 80)
            el.classList.add('visible');
    });
}
window.addEventListener('scroll', revealAll);
window.addEventListener('load',   revealAll);
setTimeout(revealAll, 100);
</script>
</body>
</html><?php /**PATH C:\Users\kamir\OneDrive\Desktop\Laravel Projects\lifedrop\resources\views/welcome.blade.php ENDPATH**/ ?>