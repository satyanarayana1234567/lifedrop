

<?php $__env->startPush('styles'); ?>
<style>
    /* ═══════════════════════════════════════════════
       DNA ANIMATED BACKGROUND CANVAS
    ═══════════════════════════════════════════════ */
    #dnaCanvas {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        opacity: 0.18;
        pointer-events: none;
    }

    /* ═══════════════════════════════════════════════
       HERO SECTION
    ═══════════════════════════════════════════════ */
    .hero {
        position: relative;
        background: linear-gradient(140deg, #8b0e1d 0%, #c0152a 50%, #6b0010 100%);
        color: white;
        padding: 120px 20px 100px;
        overflow: hidden;
        border-radius: 0 0 60px 60px;
    }

    .hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url('https://images.unsplash.com/photo-1615461066841-6116e61058f4?auto=format&fit=crop&w=1400&q=80') center/cover no-repeat;
        opacity: 0.12;
    }

    .hero-content { position: relative; z-index: 2; }

    .hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(40px, 7vw, 80px);
        font-weight: 900;
        line-height: 1.1;
        text-shadow: 0 4px 30px rgba(0,0,0,0.3);
    }

    .hero h1 span { color: #ffb3b3; }

    .hero .lead {
        font-size: clamp(16px, 2.5vw, 20px);
        opacity: 0.9;
        max-width: 580px;
        margin: 20px auto 0;
        line-height: 1.7;
    }

    .hero-badge {
        display: inline-block;
        background: rgba(255,255,255,0.15);
        border: 1px solid rgba(255,255,255,0.3);
        backdrop-filter: blur(8px);
        border-radius: 50px;
        padding: 6px 20px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 20px;
    }

    .hero-stat {
        background: rgba(255,255,255,0.12);
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 16px;
        padding: 20px;
        text-align: center;
        backdrop-filter: blur(8px);
        flex: 1;
        min-width: 120px;
    }

    .hero-stat .num {
        font-family: 'Playfair Display', serif;
        font-size: 32px;
        font-weight: 900;
        color: #ffb3b3;
    }

    .hero-stat .label { font-size: 12px; opacity: 0.85; margin-top: 4px; }

    /* ═══════════════════════════════════════════════
       WHY SECTION
    ═══════════════════════════════════════════════ */
    .why-section { padding: 90px 0; }

    .icon-circle {
        width: 72px; height: 72px;
        border-radius: 50%;
        background: linear-gradient(135deg, #fff0f0, #ffd6d6);
        display: flex; align-items: center; justify-content: center;
        font-size: 32px;
        margin: 0 auto 20px;
        box-shadow: 0 6px 20px rgba(192,21,42,0.15);
        transition: transform 0.3s;
    }

    .card:hover .icon-circle { transform: scale(1.12) rotate(-5deg); }

    /* ═══════════════════════════════════════════════
       ELIGIBILITY QUIZ SECTION
    ═══════════════════════════════════════════════ */
    .eligibility-section {
        padding: 90px 0;
        background: linear-gradient(135deg, #fff0f0, #fffafa);
        border-radius: 40px;
        margin: 0 20px;
    }

    /* Human Body SVG */
    .human-body-wrap {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .human-body-svg {
        width: 220px;
        filter: drop-shadow(0 8px 24px rgba(192,21,42,0.2));
        transition: filter 0.5s;
    }

    .health-ring {
        position: absolute;
        width: 260px; height: 260px;
        border-radius: 50%;
        border: 3px solid #e8c5c5;
        animation: pulseRing 2.5s ease-in-out infinite;
    }

    .health-ring-2 {
        width: 310px; height: 310px;
        animation-delay: 0.7s;
        border-color: #f0d5d5;
    }

    @keyframes pulseRing {
        0%, 100% { transform: scale(1); opacity: 0.7; }
        50%       { transform: scale(1.05); opacity: 0.3; }
    }

    /* Eligibility Progress Bar */
    .eligibility-bar-wrap {
        position: absolute;
        right: -30px;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
    }

    .eligibility-bar {
        width: 12px;
        height: 200px;
        background: #f0d5d5;
        border-radius: 10px;
        overflow: hidden;
        position: relative;
    }

    .eligibility-fill {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 0%;
        border-radius: 10px;
        background: linear-gradient(to top, #c0152a, #ff6b6b);
        transition: height 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .bar-label { font-size: 11px; font-weight: 700; color: #c0152a; }

    /* Quiz Box */
    .quiz-start-btn {
        background: linear-gradient(135deg, #c0152a, #8b0e1d);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 16px 40px;
        font-size: 17px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 8px 28px rgba(192,21,42,0.35);
        letter-spacing: 0.5px;
    }

    .quiz-start-btn:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 36px rgba(192,21,42,0.45);
    }

    #quizBox {
        background: white;
        border-radius: 24px;
        padding: 32px;
        box-shadow: 0 12px 40px rgba(192,21,42,0.12);
        border: 1px solid #fce4e4;
    }

    .quiz-progress {
        background: #f0d5d5;
        border-radius: 10px;
        height: 6px;
        margin-bottom: 24px;
        overflow: hidden;
    }

    .quiz-progress-fill {
        height: 100%;
        border-radius: 10px;
        background: linear-gradient(90deg, #c0152a, #ff6b6b);
        transition: width 0.5s ease;
    }

    .quiz-question {
        font-family: 'Playfair Display', serif;
        font-size: 20px;
        font-weight: 700;
        color: #1a1a2e;
        line-height: 1.5;
        margin-bottom: 28px;
    }

    .quiz-question-num {
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #c0152a;
        margin-bottom: 8px;
    }

    .quiz-btn {
        border: 2px solid;
        border-radius: 50px;
        padding: 13px 30px;
        font-weight: 600;
        font-size: 15px;
        transition: all 0.25s;
        cursor: pointer;
        background: transparent;
        width: 100%;
    }

    .quiz-btn-yes {
        border-color: #16a34a;
        color: #16a34a;
    }

    .quiz-btn-yes:hover {
        background: #16a34a;
        color: white;
        transform: scale(1.03);
    }

    .quiz-btn-no {
        border-color: #c0152a;
        color: #c0152a;
    }

    .quiz-btn-no:hover {
        background: #c0152a;
        color: white;
        transform: scale(1.03);
    }

    .result-box {
        border-radius: 16px;
        padding: 24px;
        text-align: center;
        margin-top: 20px;
    }

    .result-eligible   { background: #f0fdf4; border: 2px solid #86efac; color: #15803d; }
    .result-ineligible { background: #fff7ed; border: 2px solid #fed7aa; color: #9a3412; }

    /* Body glow effect on correct answer */
    .body-glow .human-body-svg {
        filter: drop-shadow(0 0 20px rgba(192,21,42,0.6));
    }

    /* ═══════════════════════════════════════════════
       BENEFITS SECTION
    ═══════════════════════════════════════════════ */
    .benefit-card {
        border-radius: 20px;
        padding: 36px 28px;
        text-align: center;
        transition: all 0.35s;
        border: 1px solid #fce4e4;
    }

    .benefit-card:hover {
        background: linear-gradient(135deg, #c0152a, #8b0e1d);
        color: white;
        border-color: transparent;
    }

    .benefit-card:hover h5,
    .benefit-card:hover p { color: white !important; }

    .benefit-card:hover .icon-circle {
        background: rgba(255,255,255,0.2);
    }

    /* ═══════════════════════════════════════════════
       MOTIVATION QUOTE
    ═══════════════════════════════════════════════ */
    .motivation-section {
        background: linear-gradient(140deg, #8b0e1d, #c0152a, #6b0010);
        border-radius: 36px;
        padding: 80px 40px;
        position: relative;
        overflow: hidden;
        margin: 0 20px;
        color: white;
    }

    .motivation-section::before {
        content: '"';
        position: absolute;
        top: -30px; left: 30px;
        font-family: 'Playfair Display', serif;
        font-size: 280px;
        opacity: 0.06;
        color: white;
        line-height: 1;
    }

    .motivation-section blockquote {
        font-family: 'Playfair Display', serif;
        font-size: clamp(22px, 3.5vw, 36px);
        font-weight: 700;
        line-height: 1.4;
        position: relative;
    }

    /* ═══════════════════════════════════════════════
       FEEDBACK SECTION
    ═══════════════════════════════════════════════ */
    .feedback-section { padding: 90px 0; }

    .star-rating { display: flex; gap: 8px; margin-bottom: 20px; }

    .star {
        font-size: 28px;
        cursor: pointer;
        color: #d1d5db;
        transition: color 0.2s, transform 0.2s;
    }

    .star:hover, .star.active { color: #f59e0b; transform: scale(1.2); }

    /* ═══════════════════════════════════════════════
       FLOATING BLOOD DROPS
    ═══════════════════════════════════════════════ */
    .drop {
        position: absolute;
        width: 12px; height: 16px;
        border-radius: 50% 50% 50% 0 / 60% 60% 40% 40%;
        background: rgba(255,255,255,0.15);
        animation: floatDrop linear infinite;
    }

    @keyframes floatDrop {
        0%   { transform: translateY(0) rotate(-45deg); opacity: 0; }
        10%  { opacity: 1; }
        90%  { opacity: 0.5; }
        100% { transform: translateY(-300px) rotate(-45deg); opacity: 0; }
    }

    .quiz-finished #quizButtons,
.quiz-finished #questionText,
.quiz-finished #questionNum,
.quiz-finished .quiz-progress,
.quiz-finished .text-end {
    display: none !important;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<!-- ═══════════ HERO ═══════════ -->
<section class="hero text-center">
    <canvas id="dnaCanvas"></canvas>

    <!-- Floating drops -->
    <div class="drop" style="left:10%; bottom:0; animation-duration:6s; animation-delay:0s;"></div>
    <div class="drop" style="left:25%; bottom:0; animation-duration:8s; animation-delay:1.5s; width:8px; height:11px;"></div>
    <div class="drop" style="left:70%; bottom:0; animation-duration:7s; animation-delay:0.8s;"></div>
    <div class="drop" style="left:85%; bottom:0; animation-duration:9s; animation-delay:2s; width:14px; height:18px;"></div>
    <div class="drop" style="left:50%; bottom:0; animation-duration:5s; animation-delay:3s;"></div>

    <div class="container hero-content">
        <div class="hero-badge">🩸 &nbsp; Saving Lives Since Day One</div>
        <h1>Donate <span>Blood</span>,<br>Save Lives</h1>
        <p class="lead">LifeDrop connects emergency patients with available blood donors in seconds. Be the reason someone sees tomorrow.</p>

        <div class="mt-5 d-flex justify-content-center gap-3 flex-wrap">
            <a href="<?php echo e(route('donors.create')); ?>" class="btn btn-red btn-lg">
                <i class="fas fa-heart me-2"></i> Become a Donor
            </a>
            <a href="<?php echo e(route('donors.search')); ?>" class="btn btn-light-custom btn-lg">
                <i class="fas fa-search me-2"></i> Find Donor
            </a>
        </div>

        <div class="d-flex justify-content-center gap-3 mt-5 flex-wrap">
            <div class="hero-stat">
                <div class="num">4.5M+</div>
                <div class="label">Units Needed Daily</div>
            </div>
            <div class="hero-stat">
                <div class="num">2s</div>
                <div class="label">Someone Needs Blood</div>
            </div>
            <div class="hero-stat">
                <div class="num">3</div>
                <div class="label">Lives per Donation</div>
            </div>
            <div class="hero-stat">
                <div class="num">56</div>
                <div class="label">Days Between Donations</div>
            </div>
        </div>
    </div>
</section>


<!-- ═══════════ WHY MATTERS ═══════════ -->
<section class="why-section">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <p class="text-danger fw-600" style="font-size:13px; letter-spacing:2px; text-transform:uppercase;">Why It Matters</p>
            <h2 class="section-title">Why Blood Donation<br>Changes Everything</h2>
            <p class="section-subtitle mt-3">A single donation can give someone another chance to live — a parent, a child, a friend.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4 reveal reveal-delay-1">
                <div class="card p-4 text-center h-100">
                    <div class="icon-circle">❤️</div>
                    <h4 style="font-family:'Playfair Display',serif; font-weight:700;">Save Lives</h4>
                    <p class="text-muted mt-2">Blood donation supports accident victims, surgery patients, cancer patients, and emergency cases every single day.</p>
                </div>
            </div>
            <div class="col-md-4 reveal reveal-delay-2">
                <div class="card p-4 text-center h-100">
                    <div class="icon-circle">🚑</div>
                    <h4 style="font-family:'Playfair Display',serif; font-weight:700;">Emergency Support</h4>
                    <p class="text-muted mt-2">Find nearby available donors instantly during urgent medical needs. No waiting, no delays — just action.</p>
                </div>
            </div>
            <div class="col-md-4 reveal reveal-delay-3">
                <div class="card p-4 text-center h-100">
                    <div class="icon-circle">🩸</div>
                    <h4 style="font-family:'Playfair Display',serif; font-weight:700;">Verified Donors</h4>
                    <p class="text-muted mt-2">Registered donors share their blood group, city, and availability — fully verified and ready to help.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ═══════════ ELIGIBILITY QUIZ ═══════════ -->
<div class="eligibility-section reveal">
    <div class="container">
        <div class="row align-items-center g-5">

            <!-- Left: Human Body + Quiz Controls -->
            <div class="col-lg-5 reveal-left">
                <div class="d-flex flex-column align-items-center">

                    <!-- Body Visual -->
                    <div class="human-body-wrap mb-4" id="bodyWrap">
                        <div class="health-ring"></div>
                        <div class="health-ring health-ring-2"></div>

                        <!-- SVG Human Body -->
                        <svg class="human-body-svg" id="humanBody" viewBox="0 0 200 400" xmlns="http://www.w3.org/2000/svg">
                            <!-- Head -->
                            <circle cx="100" cy="50" r="34" fill="#f9c5c5" stroke="#c0152a" stroke-width="2"/>
                            <!-- Face details -->
                            <circle cx="90" cy="46" r="4" fill="#c0152a" opacity="0.6"/>
                            <circle cx="110" cy="46" r="4" fill="#c0152a" opacity="0.6"/>
                            <path d="M88 60 Q100 70 112 60" stroke="#c0152a" stroke-width="2" fill="none" stroke-linecap="round"/>
                            <!-- Neck -->
                            <rect x="90" y="82" width="20" height="18" rx="4" fill="#f9c5c5" stroke="#c0152a" stroke-width="1.5"/>
                            <!-- Body/Torso -->
                            <rect x="60" y="98" width="80" height="105" rx="14" fill="#f9c5c5" stroke="#c0152a" stroke-width="2"/>
                            <!-- Heart symbol on torso -->
                            <path d="M100 125 C100 125 88 113 85 120 C82 128 92 136 100 145 C108 136 118 128 115 120 C112 113 100 125 100 125Z" fill="#c0152a" id="heartIcon" opacity="0.7"/>
                            <!-- Left Arm -->
                            <rect x="30" y="100" width="28" height="85" rx="12" fill="#f9c5c5" stroke="#c0152a" stroke-width="1.5" transform="rotate(8, 44, 145)"/>
                            <!-- Right Arm -->
                            <rect x="142" y="100" width="28" height="85" rx="12" fill="#f9c5c5" stroke="#c0152a" stroke-width="1.5" transform="rotate(-8, 156, 145)"/>
                            <!-- Left hand -->
                            <ellipse cx="38" cy="193" rx="12" ry="10" fill="#f9c5c5" stroke="#c0152a" stroke-width="1.5"/>
                            <!-- Right hand -->
                            <ellipse cx="163" cy="193" rx="12" ry="10" fill="#f9c5c5" stroke="#c0152a" stroke-width="1.5"/>
                            <!-- Left Leg -->
                            <rect x="65" y="200" width="32" height="110" rx="12" fill="#f9c5c5" stroke="#c0152a" stroke-width="1.5"/>
                            <!-- Right Leg -->
                            <rect x="103" y="200" width="32" height="110" rx="12" fill="#f9c5c5" stroke="#c0152a" stroke-width="1.5"/>
                            <!-- Left foot -->
                            <ellipse cx="81" cy="313" rx="17" ry="9" fill="#f9c5c5" stroke="#c0152a" stroke-width="1.5"/>
                            <!-- Right foot -->
                            <ellipse cx="119" cy="313" rx="17" ry="9" fill="#f9c5c5" stroke="#c0152a" stroke-width="1.5"/>

                            <!-- Blood drop indicators (glow points on body) -->
                            <circle cx="100" cy="130" r="6" fill="#c0152a" opacity="0" id="bp1" class="body-point"/>
                            <circle cx="100" cy="165" r="5" fill="#c0152a" opacity="0" id="bp2" class="body-point"/>
                            <circle cx="80" cy="150" r="4" fill="#c0152a" opacity="0" id="bp3" class="body-point"/>
                            <circle cx="120" cy="150" r="4" fill="#c0152a" opacity="0" id="bp4" class="body-point"/>
                            <circle cx="100" cy="50" r="6" fill="#16a34a" opacity="0" id="bp5" class="body-point"/>
                        </svg>

                        <!-- Vertical eligibility bar -->
                        <div class="eligibility-bar-wrap">
                            <div class="bar-label" id="barPercent">0%</div>
                            <div class="eligibility-bar">
                                <div class="eligibility-fill" id="eligibilityFill"></div>
                            </div>
                            <div class="bar-label">❤️</div>
                        </div>
                    </div>

                    <!-- Eligibility hint text -->
                    <div id="bodyStatus" style="font-size:14px; color:#c0152a; font-weight:600; text-align:center; min-height:24px;"></div>
                </div>
            </div>

            <!-- Right: Quiz Content -->
            <div class="col-lg-7 reveal-right">
                <p style="font-size:13px; letter-spacing:2px; text-transform:uppercase; color:#c0152a; font-weight:600;">Step-by-Step</p>
                <h2 class="section-title mb-3">Check Your<br>Eligibility</h2>
                <p class="text-muted mb-4" style="font-size:16px; line-height:1.7;">
                    Answer a few simple questions and discover if you're ready to be a life-saving blood donor. Watch your eligibility score grow with each answer!
                </p>

                <!-- START BUTTON -->
                <div id="quizStart">
                    <button class="quiz-start-btn" onclick="startEligibilityQuiz()">
                        <i class="fas fa-play me-2"></i> Start Eligibility Check
                    </button>
                </div>

                <!-- QUIZ BOX -->
<div id="quizBox" style="display:none;">
    <div class="text-end mb-2">
        <button type="button" onclick="cancelQuiz()" class="btn btn-sm btn-outline-danger rounded-pill">
            Cancel
        </button>
    </div>

    <div class="quiz-progress mb-3">
        <div class="quiz-progress-fill" id="progressFill" style="width:0%"></div>
    </div>

    <div class="quiz-question-num" id="questionNum">Question 1 of 5</div>
    <div class="quiz-question" id="questionText"></div>

    <div id="quizButtons" class="d-flex flex-column gap-3">
        <button class="quiz-btn quiz-btn-yes" onclick="answerQuestion(true)">
            <i class="fas fa-check me-2"></i> Yes
        </button>

        <button class="quiz-btn quiz-btn-no" onclick="answerQuestion(false)">
            <i class="fas fa-times me-2"></i> No
        </button>
    </div>
    <div id="resultBox"></div>
</div>
</div>
</div>
</div>
</div>


<!-- ═══════════ BENEFITS ═══════════ -->
<section style="padding: 90px 0;">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <p style="font-size:13px; letter-spacing:2px; text-transform:uppercase; color:#c0152a; font-weight:600;">Mutual Benefits</p>
            <h2 class="section-title">Benefits of Donating Blood</h2>
            <p class="section-subtitle mt-3">Blood donation is rewarding for both the patient and the donor.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-3 col-sm-6 reveal reveal-delay-1">
                <div class="card benefit-card h-100">
                    <div class="icon-circle">💪</div>
                    <h5 style="font-family:'Playfair Display',serif; font-weight:700;">Health Awareness</h5>
                    <p class="text-muted small mt-2">Donors become more aware of their health with free mini check-ups each time.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 reveal reveal-delay-2">
                <div class="card benefit-card h-100">
                    <div class="icon-circle">🤝</div>
                    <h5 style="font-family:'Playfair Display',serif; font-weight:700;">Social Service</h5>
                    <p class="text-muted small mt-2">A meaningful way to give back to society and strengthen the community.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 reveal reveal-delay-3">
                <div class="card benefit-card h-100">
                    <div class="icon-circle">🫶</div>
                    <h5 style="font-family:'Playfair Display',serif; font-weight:700;">Save Patients</h5>
                    <p class="text-muted small mt-2">Your blood can save emergency patients during surgeries, accidents, or illness.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 reveal reveal-delay-4">
                <div class="card benefit-card h-100">
                    <div class="icon-circle">🌟</div>
                    <h5 style="font-family:'Playfair Display',serif; font-weight:700;">Feel Proud</h5>
                    <p class="text-muted small mt-2">Every donation brings deep confidence, satisfaction, and a sense of purpose.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ═══════════ MOTIVATION ═══════════ -->
<div class="motivation-section reveal" style="text-align:center;">
    <div class="container">
        <blockquote>"Donate blood today,<br>because someone may need it tomorrow."</blockquote>
        <p class="mt-4" style="opacity:0.82; font-size:17px; max-width:560px; margin:16px auto 0; line-height:1.8;">
            Blood cannot be manufactured. It can only come from kind donors like you. Your one decision can save an entire family's world.
        </p>
        <a href="<?php echo e(route('donors.create')); ?>" class="btn btn-light-custom mt-5 btn-lg">
            <i class="fas fa-heart me-2"></i> Register as Donor Today
        </a>
    </div>
</div>

<!-- ═══════════ FEEDBACK ═══════════ -->
<section class="feedback-section py-5">
    <div class="container">

        <div class="text-center mb-5">
            <p style="font-size:13px; letter-spacing:2px; text-transform:uppercase; color:#c0152a; font-weight:600;">
                Your Voice
            </p>

            <h2 class="section-title">Share Your Experience</h2>

            <p class="section-subtitle mt-3">
                Your feedback helps us improve and inspires others to donate blood.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-7">

                <div class="card shadow-lg border-0 p-5 rounded-4">

                   <?php if(session('success')): ?>
    <div id="success-alert" class="alert alert-success text-center">
        <?php echo e(session('success')); ?>

    </div>

    <script>
        setTimeout(() => {
            const alertBox = document.getElementById('success-alert');

            if(alertBox){
                alertBox.style.transition = '0.5s';
                alertBox.style.opacity = '0';

                setTimeout(() => {
                    alertBox.remove();
                }, 500);
            }
        }, 5000);
    </script>
<?php endif; ?>

                    <form action="<?php echo e(route('feedback.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <!-- Rating -->
                        <div class="mb-4">
                            <label class="fw-bold mb-2">Rate your experience</label>

                            <select name="rating" class="form-select">
                                <option value="">Select Rating</option>
                                <option value="5">★★★★★ Excellent</option>
                                <option value="4">★★★★ Very Good</option>
                                <option value="3">★★★ Good</option>
                                <option value="2">★★ Average</option>
                                <option value="1">★ Poor</option>
                            </select>
                        </div>

                        <!-- Name -->
                        <div class="mb-4">
                            <label class="fw-bold">Your Name</label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Enter your name"
                            >
                        </div>

                        <!-- Feedback -->
                        <div class="mb-4">
                            <label class="fw-bold">Your Feedback</label>

                            <textarea
                                name="message"
                                class="form-control"
                                rows="5"
                                placeholder="Share your experience with blood donation or this platform..."
                            ></textarea>
                        </div>

                        <button type="submit" class="btn btn-danger w-100 btn-lg rounded-pill">
                            Submit Feedback
                        </button>

                    </form>

                </div>

            </div>
        </div>

    </div>
</section>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
<script>
/* ═══════════════════════════════════════════
   DNA ANIMATED BACKGROUND
═══════════════════════════════════════════ */
(function() {
    const canvas = document.getElementById('dnaCanvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    let W, H, t = 0;

    function resize() {
        W = canvas.width  = canvas.offsetWidth;
        H = canvas.height = canvas.offsetHeight;
    }

    resize();
    window.addEventListener('resize', resize);

    function drawDNA() {
        ctx.clearRect(0, 0, W, H);
        const strands = 3;
        const spacing = W / (strands + 1);

        for (let s = 0; s < strands; s++) {
            const cx = spacing * (s + 1);
            const amp = 45;
            const freq = 0.018;
            const speed = 0.6;

            // Strand 1
            ctx.beginPath();
            for (let y = 0; y < H; y++) {
                const x = cx + Math.sin(y * freq + t * speed + s) * amp;
                if (y === 0) ctx.moveTo(x, y);
                else         ctx.lineTo(x, y);
            }
            ctx.strokeStyle = 'rgba(255,255,255,0.7)';
            ctx.lineWidth = 2;
            ctx.stroke();

            // Strand 2
            ctx.beginPath();
            for (let y = 0; y < H; y++) {
                const x = cx - Math.sin(y * freq + t * speed + s) * amp;
                if (y === 0) ctx.moveTo(x, y);
                else         ctx.lineTo(x, y);
            }
            ctx.strokeStyle = 'rgba(255,200,200,0.5)';
            ctx.lineWidth = 2;
            ctx.stroke();

            // Rungs (horizontal connectors)
            const step = 36;
            for (let y = step / 2; y < H; y += step) {
                const offset = t * speed * (1000 / H) * step;
                const ry = (y + offset) % H;
                const x1 = cx + Math.sin(ry * freq + t * speed + s) * amp;
                const x2 = cx - Math.sin(ry * freq + t * speed + s) * amp;

                const gradient = ctx.createLinearGradient(x1, ry, x2, ry);
                gradient.addColorStop(0,   'rgba(255,180,180,0.9)');
                gradient.addColorStop(0.5, 'rgba(255,255,255,0.6)');
                gradient.addColorStop(1,   'rgba(255,180,180,0.9)');

                ctx.beginPath();
                ctx.moveTo(x1, ry);
                ctx.lineTo(x2, ry);
                ctx.strokeStyle = gradient;
                ctx.lineWidth = 1.5;
                ctx.stroke();

                // Dots at rung ends
                ctx.beginPath();
                ctx.arc(x1, ry, 3.5, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(255,220,220,0.9)';
                ctx.fill();

                ctx.beginPath();
                ctx.arc(x2, ry, 3.5, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(255,220,220,0.9)';
                ctx.fill();
            }
        }

        t += 0.015;
        requestAnimationFrame(drawDNA);
    }

    drawDNA();
})();


/* ═══════════════════════════════════════════
   ELIGIBILITY QUIZ
═══════════════════════════════════════════ */
const questions = [
    "Are you 18 years of age or older?",
    "Are you feeling healthy and active today?",
    "Have you eaten a proper meal before donation?",
    "Are you free from any recent major illness?",
    "Are you willing to donate blood voluntarily?"
];

let currentQ = 0;
let score = 0;

function startEligibilityQuiz() {
    currentQ = 0;
    score = 0;
document.getElementById('quizBox').classList.remove('quiz-finished');
    document.getElementById('quizStart').style.display = 'none';
    document.getElementById('quizBox').style.display = 'block';

    // Reset visibility for a fresh start or retry
    document.getElementById('questionText').style.display = 'block';
    document.getElementById('questionNum').style.display = 'block';
    document.getElementById('quizButtons').style.display = 'flex';
    document.getElementById('progressFill').parentElement.style.display = 'block';
    document.getElementById('resultBox').innerHTML = ''; // Clear old results

    const cancelWrapper = document.querySelector('#quizBox .text-end');
    if (cancelWrapper) cancelWrapper.style.display = 'block';

    resetBodyPoints();
    updateBar(0);
    document.getElementById('bodyStatus').textContent = '';

    showQuestion();
}

function showQuestion() {
    document.getElementById('questionText').textContent = questions[currentQ];

    document.getElementById('questionNum').textContent =
        `Question ${currentQ + 1} of ${questions.length}`;

    document.getElementById('progressFill').style.width =
        `${(currentQ / questions.length) * 100}%`;
}

function answerQuestion(answer) {
    if (currentQ >= questions.length) {
        return;
    }

    if (answer === true) {
        score++;
        lightBodyPoint(currentQ);
        flashBodyGlow();
    }

    currentQ++;

    if (score > questions.length) {
        score = questions.length;
    }

    updateBar(Math.round((score / questions.length) * 100));

    if (currentQ < questions.length) {
        showQuestion();
    } else {
        showResult();
    }
}

function showResult() {
    const pct = Math.round((score / questions.length) * 100);

    const quizBox = document.getElementById('quizBox');
    quizBox.classList.add('quiz-finished');

    if (score >= 4) {
        document.getElementById('resultBox').innerHTML = `
            <div class="result-box result-eligible">
                <div style="font-size:40px; margin-bottom:10px;">🎉</div>

                <div style="font-size:24px; font-weight:700; font-family:'Playfair Display',serif;">
                    You're Likely Eligible!
                </div>

                <div style="font-size:16px; margin-top:10px; opacity:0.85;">
                    Your score: <strong>${score}/${questions.length} (${pct}%)</strong><br>
                    You may be eligible to donate blood. Please confirm with a doctor or blood bank.
                </div>

                <a href="<?php echo e(route('donors.create')); ?>" class="btn btn-red mt-4">
                    Register as Donor <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        `;
    } else {
        document.getElementById('resultBox').innerHTML = `
            <div class="result-box result-ineligible">
                <div style="font-size:40px; margin-bottom:10px;">💛</div>

                <div style="font-size:24px; font-weight:700; font-family:'Playfair Display',serif;">
                    You Are Not Eligible Right Now
                </div>

                <div style="font-size:16px; margin-top:10px; opacity:0.85;">
                    Your score: <strong>${score}/${questions.length} (${pct}%)</strong><br>
                    Please consult medical staff before donating blood.
                </div>

                <button onclick="startEligibilityQuiz()" class="btn btn-red mt-4">
                    Try Again <i class="fas fa-redo ms-2"></i>
                </button>
            </div>
        `;
    }
}

function cancelQuiz() {
    currentQ = 0;
    score = 0;

    document.getElementById('quizStart').style.display = 'block';
    document.getElementById('quizBox').style.display = 'none';

    document.getElementById('questionText').style.display = 'block';
    document.getElementById('questionNum').style.display = 'block';
    document.getElementById('quizButtons').style.display = 'flex';
    document.getElementById('resultBox').innerHTML = '';

    resetBodyPoints();
    updateBar(0);
    document.getElementById('bodyStatus').textContent = '';
}

function resetQuiz() {
    currentQ = 0;
    score = 0;

    document.getElementById('quizStart').style.display = 'none';
    document.getElementById('quizBox').style.display = 'block';

    document.getElementById('questionText').style.display = 'block';
    document.getElementById('questionNum').style.display = 'block';
    document.getElementById('quizButtons').style.display = 'flex';
    document.getElementById('resultBox').innerHTML = '';

    resetBodyPoints();
    updateBar(0);
    document.getElementById('bodyStatus').textContent = '';

    showQuestion();
}

function updateBar(pct) {
    document.getElementById('eligibilityFill').style.height = pct + '%';
    document.getElementById('barPercent').textContent = pct + '%';
}

function lightBodyPoint(idx) {
    const pointId = 'bp' + (idx + 1);
    const el = document.getElementById(pointId);

    if (el) {
        el.style.transition = 'opacity 0.5s';
        el.setAttribute('opacity', '0.9');

        el.animate([
            { r: 4, opacity: 1 },
            { r: 10, opacity: 0 },
            { r: 4, opacity: 0.9 }
        ], {
            duration: 800,
            easing: 'ease-out'
        });
    }
}

function resetBodyPoints() {
    document.querySelectorAll('.body-point').forEach(el => {
        el.setAttribute('opacity', '0');
    });
}

function flashBodyGlow() {
    const wrap = document.getElementById('bodyWrap');

    if (wrap) {
        wrap.classList.add('body-glow');

        setTimeout(() => {
            wrap.classList.remove('body-glow');
        }, 800);
    }
}


/* ═══════════════════════════════════════════
   STAR RATING
═══════════════════════════════════════════ */
let selectedRating = 0;
function rateStar(n) {
    selectedRating = n;
    document.querySelectorAll('.star').forEach((s, i) => {
        s.classList.toggle('active', i < n);
    });
}

function submitFeedback(btn) {
    btn.innerHTML = '<i class="fas fa-check me-2"></i> Thank you for your feedback!';
    btn.style.background = 'linear-gradient(135deg,#16a34a,#15803d)';
    btn.disabled = true;
}
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\kamir\OneDrive\Desktop\Laravel Projects\lifedrop\resources\views/home.blade.php ENDPATH**/ ?>