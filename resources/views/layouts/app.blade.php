<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LifeDrop - Blood Donor Finder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --red:       #c0152a;
            --red-dark:  #8b0e1d;
            --red-light: #fee2e2;
            --red-glow:  rgba(192,21,42,0.18);
            --white:     #ffffff;
            --off-white: #fff8f8;
            --text:      #1a1a2e;
            --muted:     #6b7280;
            --card-bg:   #ffffff;
            --radius:    18px;
            --shadow:    0 8px 32px rgba(192,21,42,0.10);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            background: var(--off-white);
            font-family: 'DM Sans', sans-serif;
            color: var(--text);
            overflow-x: hidden;
        }

        /* ─── NAVBAR ─────────────────────────────────────────── */
        .navbar {
            background: rgba(139,14,29,0.97);
            backdrop-filter: blur(12px);
            padding: 14px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 24px rgba(0,0,0,0.18);
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 28px;
            color: white !important;
            letter-spacing: -0.5px;
        }

        .navbar-brand span { color: #ff6b6b; }

        .nav-link {
            color: rgba(255,255,255,0.85) !important;
            font-weight: 500;
            font-size: 15px;
            padding: 8px 18px !important;
            border-radius: 50px;
            transition: all 0.3s ease;
            letter-spacing: 0.3px;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.18);
            color: white !important;
            transform: translateY(-1px);
        }

        .navbar-toggler {
            border: 1px solid rgba(255,255,255,0.3);
            background: rgba(255,255,255,0.1);
        }

        .navbar-toggler-icon { filter: invert(1); }

        /* ─── CARDS ───────────────────────────────────────────── */
        .card {
            background: var(--card-bg);
            border: none;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            transition: transform 0.35s ease, box-shadow 0.35s ease;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(192,21,42,0.18);
        }

        /* ─── BUTTONS ─────────────────────────────────────────── */
        .btn-red {
            background: linear-gradient(135deg, var(--red), var(--red-dark));
            color: white;
            border: none;
            border-radius: 50px;
            padding: 12px 32px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 16px rgba(192,21,42,0.35);
        }

        .btn-red:hover {
            background: linear-gradient(135deg, #e01a30, var(--red));
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(192,21,42,0.45);
        }

        .btn-light-custom {
            background: white;
            color: var(--red);
            border: 2px solid var(--red);
            border-radius: 50px;
            padding: 12px 32px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .btn-light-custom:hover {
            background: var(--red-light);
            color: var(--red-dark);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(192,21,42,0.2);
        }

        /* ─── BLOOD BADGE ─────────────────────────────────────── */
        .blood-badge {
            background: linear-gradient(135deg, var(--red), var(--red-dark));
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        /* ─── FORM CONTROLS ───────────────────────────────────── */
        .form-control, .form-select {
            border-radius: 12px;
            padding: 12px 16px;
            border: 1.5px solid #e5e7eb;
            font-size: 15px;
            transition: all 0.3s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 4px rgba(192,21,42,0.10);
            outline: none;
        }

        label {
            font-weight: 500;
            margin-bottom: 6px;
            color: var(--text);
            display: block;
        }

        /* ─── SECTION HEADINGS ────────────────────────────────── */
        .section-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: clamp(26px, 4vw, 42px);
        }

        .section-subtitle {
            color: var(--muted);
            font-size: 17px;
            max-width: 560px;
            margin: 0 auto;
        }

        /* ─── FOOTER ──────────────────────────────────────────── */
        footer {
            background: linear-gradient(135deg, #1a0005, #3d0010);
            color: rgba(255,255,255,0.85);
            padding: 50px 20px 30px;
            margin-top: 80px;
        }

        footer h5 {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            color: white;
        }

        footer a {
            color: rgba(255,255,255,0.65);
            text-decoration: none;
            transition: color 0.3s;
        }

        footer a:hover { color: #ff8fa3; }

        .footer-divider {
            border-color: rgba(255,255,255,0.12);
            margin: 30px 0 20px;
        }

        /* ─── SCROLL REVEAL ───────────────────────────────────── */
        .reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-left {
            opacity: 0;
            transform: translateX(-60px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }

        .reveal-left.active {
            opacity: 1;
            transform: translateX(0);
        }

        .reveal-right {
            opacity: 0;
            transform: translateX(60px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }

        .reveal-right.active {
            opacity: 1;
            transform: translateX(0);
        }

        .reveal-delay-1 { transition-delay: 0.1s; }
        .reveal-delay-2 { transition-delay: 0.2s; }
        .reveal-delay-3 { transition-delay: 0.3s; }
        .reveal-delay-4 { transition-delay: 0.4s; }
        /* for whatsup */
        section {
    scroll-margin-top: 80px;
}

.list-group-item {
    border: none;
    margin-bottom: 8px;
    border-radius: 12px !important;
    background: #fff;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

.form-control {
    border-radius: 12px;
    padding: 12px;
}

.btn {
    transition: 0.3s;
}

.btn:hover {
    transform: translateY(-2px);
}

.hover-card {
    transition: 0.3s ease;
}

.hover-card:hover {
    transform: translateY(-8px);
}
    </style>

    @stack('styles')
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Life<span>Drop</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto gap-1">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home me-1"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('donors.create') }}"><i class="fas fa-user-plus me-1"></i> Register Donor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('donors.search') }}"><i class="fas fa-search me-1"></i> Find Donor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('donors.index') }}"><i class="fas fa-list me-1"></i> Donor List</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

@if(request()->routeIs('home'))
<footer>
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5 class="mb-3">Life<span style="color:#ff8fa3">Drop</span></h5>
                <p style="color:rgba(255,255,255,0.6); font-size:14px; line-height:1.8;">
                    Connecting hearts and saving lives. One drop of blood can be the difference between life and death.
                </p>
            </div>
            <div class="col-md-4">
                <h6 style="color:white; font-weight:600; margin-bottom:14px;">Quick Links</h6>
                <ul style="list-style:none; padding:0;">
                    <li class="mb-2"><a href="{{ route('home') }}"><i class="fas fa-chevron-right me-2" style="font-size:11px; color:#ff8fa3"></i>Home</a></li>
                    <li class="mb-2"><a href="{{ route('donors.create') }}"><i class="fas fa-chevron-right me-2" style="font-size:11px; color:#ff8fa3"></i>Register as Donor</a></li>
                    <li class="mb-2"><a href="{{ route('donors.search') }}"><i class="fas fa-chevron-right me-2" style="font-size:11px; color:#ff8fa3"></i>Find Donor</a></li>
                    <li class="mb-2"><a href="{{ route('donors.index') }}"><i class="fas fa-chevron-right me-2" style="font-size:11px; color:#ff8fa3"></i>All Donors</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6 style="color:white; font-weight:600; margin-bottom:14px;">Important Info</h6>
                <p style="color:rgba(255,255,255,0.6); font-size:14px; line-height:1.9;">
                    <i class="fas fa-tint me-2" style="color:#ff8fa3"></i> Over 4.5M units needed daily<br>
                    <i class="fas fa-clock me-2" style="color:#ff8fa3"></i> Every 2 seconds someone needs blood<br>
                    <i class="fas fa-heart me-2" style="color:#ff8fa3"></i> 1 donor saves up to 3 lives
                </p>
            </div>
        </div>
        <hr class="footer-divider">
        <p class="text-center mb-0" style="color:rgba(255,255,255,0.45); font-size:13px;">
            © {{ date('Y') }} LifeDrop · Donate Blood, Save Lives · Built with love for humanity
        </p>
    </div>
</footer>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- SCROLL REVEAL -->
<script>
    function revealOnScroll() {
        const elements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');
        elements.forEach(el => {
            const rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight - 80) {
                el.classList.add('active');
            }
        });
    }
    window.addEventListener('scroll', revealOnScroll);
    window.addEventListener('load', revealOnScroll);
</script>

@stack('scripts')
</body>
</html>