

<?php $__env->startPush('styles'); ?>
<style>
    /* ── HERO BANNER ── */
    .search-hero {
        background: linear-gradient(140deg, #8b0e1d, #c0152a, #6b0010);
        color: white;
        padding: 70px 20px 130px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .search-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(28px, 5vw, 50px);
        font-weight: 900;
    }
    .search-hero p { opacity: .85; font-size: 16px; max-width: 500px; margin: 10px auto 0; }
    #searchCanvas { position:absolute; inset:0; width:100%; height:100%; opacity:.15; pointer-events:none; }
    .fdrop { position:absolute; border-radius:50% 50% 50% 0/60% 60% 40% 40%; background:rgba(255,255,255,0.16); animation:fdropAnim linear infinite; }
    @keyframes fdropAnim {
        0%{transform:translateY(0) rotate(-45deg);opacity:0;}
        10%{opacity:1;} 90%{opacity:.4;}
        100%{transform:translateY(-250px) rotate(-45deg);opacity:0;}
    }

    /* ── SEARCH CARD (floats over hero) ── */
    .search-card-wrap {
        margin-top: -70px;
        position: relative;
        z-index: 10;
    }
    .search-card {
        background: white;
        border-radius: 28px;
        padding: 36px 36px 32px;
        box-shadow: 0 16px 50px rgba(192,21,42,0.18);
        border: 1px solid #fce4e4;
    }
    .search-card .form-select,
    .search-card .form-control {
        border: 1.5px solid #e5e7eb;
        border-radius: 14px;
        padding: 13px 18px;
        font-size: 15px;
        height: auto;
        transition: border-color .3s, box-shadow .3s;
    }
    .search-card .form-select:focus,
    .search-card .form-control:focus {
        border-color: #c0152a;
        box-shadow: 0 0 0 4px rgba(192,21,42,0.09);
        outline: none;
    }
    .btn-search {
        background: linear-gradient(135deg, #c0152a, #8b0e1d);
        color: white; border: none; border-radius: 14px;
        padding: 13px 32px; font-size: 16px; font-weight: 700;
        width: 100%; transition: all .3s;
        box-shadow: 0 6px 20px rgba(192,21,42,0.3);
        display: flex; align-items: center; justify-content: center; gap: 8px;
    }
    .btn-search:hover {
        background: linear-gradient(135deg, #e01a30, #c0152a);
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(192,21,42,0.4);
    }

    /* ── RESULT SECTION HEADER ── */
    .results-header {
        display: flex; align-items: center; justify-content: space-between;
        flex-wrap: wrap; gap: 12px;
        margin-bottom: 28px;
    }
    .results-header h4 {
        font-family: 'Playfair Display', serif;
        font-size: 24px; font-weight: 700; margin: 0;
    }
    .result-count-chip {
        background: #fff0f0; border: 1px solid #fce4e4;
        color: #c0152a; border-radius: 50px;
        padding: 6px 18px; font-size: 13px; font-weight: 700;
    }

    /* ── DONOR CARD ── */
    .donor-card {
        background: white;
        border-radius: 24px;
        padding: 28px 24px 22px;
        box-shadow: 0 6px 28px rgba(192,21,42,0.08);
        border: 1px solid #fce8e8;
        transition: transform .35s ease, box-shadow .35s ease;
        position: relative; overflow: hidden;
    }
    .donor-card::before {
        content: ''; position: absolute; top:0; left:0; right:0; height:4px;
        background: linear-gradient(90deg,#c0152a,#ff6b6b,#c0152a);
        background-size: 200%; animation: shimmer 3s linear infinite;
    }
    @keyframes shimmer{0%{background-position:0%}100%{background-position:200%}}
    .donor-card:hover { transform: translateY(-8px); box-shadow: 0 20px 50px rgba(192,21,42,0.18); }

    .donor-top { display:flex; align-items:center; gap:16px; margin-bottom:18px; }
    .donor-photo {
        width:72px; height:72px; border-radius:50%; object-fit:cover;
        border:3px solid #c0152a; box-shadow:0 0 0 4px rgba(192,21,42,0.1);
        flex-shrink:0;
    }
    .donor-photo-fb {
        width:72px; height:72px; border-radius:50%;
        background:linear-gradient(135deg,#c0152a,#8b0e1d);
        display:flex; align-items:center; justify-content:center;
        font-size:26px; flex-shrink:0;
        border:3px solid #c0152a; box-shadow:0 0 0 4px rgba(192,21,42,0.1);
    }
    .blood-badge-lg {
        display:inline-block; background:linear-gradient(135deg,#c0152a,#8b0e1d);
        color:white; padding:4px 14px; border-radius:20px;
        font-weight:800; font-size:14px; letter-spacing:.5px;
    }
    .donor-info-row {
        display:flex; align-items:center; gap:10px;
        padding:8px 0; border-bottom:1px solid #fce4e4;
        font-size:14px; color:#374151;
    }
    .donor-info-row:last-child{border-bottom:none;}
    .donor-info-row i{color:#c0152a;width:15px;flex-shrink:0;}
    .avail-badge {
        display:inline-flex; align-items:center; gap:5px;
        padding:4px 12px; border-radius:50px; font-size:12px; font-weight:700;
        margin-top:2px;
    }
    .avail-yes{background:#f0fdf4;color:#15803d;border:1px solid #86efac;}
    .avail-no {background:#f5f5f5;color:#6b7280;border:1px solid #d1d5db;}
    @keyframes blink{0%,100%{opacity:1;}50%{opacity:.3;}}
    .btn-whatsapp {
        background:linear-gradient(135deg,#25d366,#128c7e);
        color:white; border:none; border-radius:50px;
        padding:11px 22px; font-weight:700; font-size:14px;
        width:100%; margin-top:16px; transition:all .3s;
        box-shadow:0 4px 16px rgba(37,211,102,0.3);
        display:flex; align-items:center; justify-content:center; gap:8px;
        text-decoration:none;
    }
    .btn-whatsapp:hover{background:linear-gradient(135deg,#20b557,#0e7a6b);color:white;transform:translateY(-3px);box-shadow:0 8px 24px rgba(37,211,102,0.4);}
    .btn-whatsapp svg{width:17px;height:17px;fill:white;flex-shrink:0;}

    /* ── NEARBY NOTICE ── */
    .nearby-notice {
        background: linear-gradient(135deg, #fff7ed, #fef3c7);
        border: 1px solid #fcd34d;
        border-radius: 20px;
        padding: 28px 32px;
        margin-bottom: 36px;
        display: flex; align-items: flex-start; gap: 16px;
    }
    .nearby-notice-icon { font-size: 36px; flex-shrink:0; }

    /* ── EMPTY STATE ── */
    .empty-state {
        text-align:center; padding:70px 20px;
        background:white; border-radius:24px;
        border:2px dashed #fce4e4;
    }
    .empty-state-icon{ font-size:60px; margin-bottom:18px; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<!-- HERO -->
<div class="search-hero">
    <canvas id="searchCanvas"></canvas>
    <div class="fdrop" style="left:8%;bottom:0;width:10px;height:14px;animation-duration:7s;"></div>
    <div class="fdrop" style="left:40%;bottom:0;width:7px;height:10px;animation-duration:5s;animation-delay:1.2s;"></div>
    <div class="fdrop" style="left:75%;bottom:0;width:11px;height:15px;animation-duration:8s;animation-delay:2s;"></div>
    <div style="position:relative;z-index:2;">
        <div style="display:inline-block;background:rgba(255,255,255,0.15);border:1px solid rgba(255,255,255,0.3);border-radius:50px;padding:5px 18px;font-size:12px;font-weight:600;letter-spacing:1.5px;text-transform:uppercase;margin-bottom:14px;">
            🔍 &nbsp; Emergency Donor Search
        </div>
        <h1>Find a Blood Donor</h1>
        <p>Search by blood group and city. We'll find verified available donors near you instantly.</p>
    </div>
</div>

<!-- SEARCH CARD -->
<div class="container search-card-wrap">
    <div class="search-card reveal">
        <h5 style="font-family:'Playfair Display',serif;font-weight:700;font-size:18px;margin-bottom:20px;color:#1a1a2e;">
            <i class="fas fa-filter me-2 text-danger"></i> Search Filters
        </h5>
        <form method="GET" action="<?php echo e(route('donors.search')); ?>">
            <div class="row g-3 align-items-end">
                <div class="col-md-5">
                    <label style="font-size:13px;font-weight:600;color:#6b7280;margin-bottom:6px;display:block;">
                        <i class="fas fa-tint me-1 text-danger"></i> Blood Group
                    </label>
                    <select name="blood_group" class="form-select">
                        <option value="">All Blood Groups</option>
                        <?php $__currentLoopData = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($group); ?>" <?php echo e(request('blood_group') == $group ? 'selected' : ''); ?>>
                                <?php echo e($group); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-5">
                    <label style="font-size:13px;font-weight:600;color:#6b7280;margin-bottom:6px;display:block;">
                        <i class="fas fa-map-marker-alt me-1 text-danger"></i> City
                    </label>
                    <input type="text" name="city" class="form-control" placeholder="e.g. Mumbai, Delhi, Jaipur..."
                           value="<?php echo e(request('city')); ?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn-search">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- RESULTS -->
<div class="container" style="padding:48px 20px 80px;">

    <?php if(request('blood_group') || request('city')): ?>

        <?php
            $searchedCity  = request('city');
            $searchedGroup = request('blood_group');
            $found         = count($donors) > 0;
        ?>

        <!-- Nearby city suggestion notice (when no results found) -->
        <?php if(!$found): ?>
        <div class="nearby-notice reveal">
            <div class="nearby-notice-icon">📍</div>
            <div>
                <div style="font-weight:700;font-size:17px;color:#92400e;margin-bottom:6px;">
                    No donors found in <strong><?php echo e($searchedCity ?: 'your city'); ?></strong>
                    <?php if($searchedGroup): ?> for blood group <strong><?php echo e($searchedGroup); ?></strong><?php endif; ?>
                </div>
                <p style="color:#78350f;font-size:14px;line-height:1.7;margin:0;">
                    Don't worry — blood group compatibility means donors from nearby cities can also help.
                    Try searching for a <strong>neighbouring city</strong>, or broaden your search by removing the city filter
                    to see all available donors across the platform. You can also
                    <a href="<?php echo e(route('donors.create')); ?>" style="color:#c0152a;font-weight:700;">register yourself</a>
                    to help grow the donor network.
                </p>
                <div class="d-flex gap-2 mt-3 flex-wrap">
                    <a href="<?php echo e(route('donors.search')); ?>?blood_group=<?php echo e($searchedGroup); ?>"
                       class="btn btn-red btn-sm" style="border-radius:50px;padding:8px 20px;font-size:13px;">
                        <i class="fas fa-globe me-1"></i> Search All Cities
                    </a>
                    <a href="<?php echo e(route('donors.search')); ?>"
                       class="btn btn-light-custom btn-sm" style="border-radius:50px;padding:8px 20px;font-size:13px;">
                        <i class="fas fa-redo me-1"></i> New Search
                    </a>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if($found): ?>
        <!-- Results header -->
        <div class="results-header reveal">
            <h4>
                <i class="fas fa-heart me-2 text-danger"></i>
                Donors Found
                <?php if($searchedCity): ?> in <em><?php echo e($searchedCity); ?></em><?php endif; ?>
            </h4>
            <div class="result-count-chip">🩸 <?php echo e(count($donors)); ?> <?php echo e(count($donors) == 1 ? 'donor' : 'donors'); ?> available</div>
        </div>

        <div class="row g-4">
            <?php $__currentLoopData = $donors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6 reveal reveal-delay-<?php echo e(($loop->index % 3) + 1); ?>">
                <div class="donor-card">

                    <!-- Top: photo + name + blood -->
                    <div class="donor-top">
                        <?php if($donor->photo): ?>
                            <img src="<?php echo e(asset($donor->photo)); ?>" class="donor-photo" alt="<?php echo e($donor->name); ?>">
                        <?php else: ?>
                            <div class="donor-photo-fb">🩸</div>
                        <?php endif; ?>
                        <div>
                            <h5 style="font-family:'Playfair Display',serif;font-weight:700;font-size:18px;margin-bottom:6px;">
                                <?php echo e($donor->name); ?>

                            </h5>
                            <div class="blood-badge-lg"><?php echo e($donor->blood_group); ?></div>
                        </div>
                    </div>

                    <!-- Info rows -->
                    <div class="donor-info-row">
                        <i class="fas fa-map-marker-alt"></i>
                        <span><strong>City:</strong> <?php echo e($donor->city); ?></span>
                    </div>
                    <div class="donor-info-row">
                        <i class="fas fa-phone"></i>
                        <span><?php echo e($donor->phone); ?></span>
                    </div>
                    <div class="donor-info-row" style="border-bottom:none;">
                        <i class="fas fa-circle" style="font-size:8px;animation:blink 1.5s infinite;color:<?php echo e($donor->availability=='Available' ? '#16a34a' : '#9ca3af'); ?>;"></i>
                        <?php if($donor->availability == 'Available'): ?>
                            <div class="avail-badge avail-yes">● Available Now</div>
                        <?php else: ?>
                            <div class="avail-badge avail-no">● Not Available</div>
                        <?php endif; ?>
                    </div>

                    <!-- WhatsApp -->
                    <a href="https://wa.me/91<?php echo e($donor->phone); ?>?text=Hello%20<?php echo e(urlencode($donor->name)); ?>,%20I%20found%20your%20contact%20on%20LifeDrop.%20We%20need%20blood%20group%20<?php echo e(urlencode($donor->blood_group)); ?>.%20Are%20you%20available%20to%20donate?"
                       target="_blank" class="btn-whatsapp">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        Contact on WhatsApp
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>

    <?php else: ?>
        <!-- Default empty prompt -->
        <div class="empty-state reveal">
            <div class="empty-state-icon">🩸</div>
            <h4 style="font-family:'Playfair Display',serif;font-weight:700;">Search for a Donor</h4>
            <p class="text-muted mt-2 mb-4" style="max-width:420px;margin:12px auto 24px;">
                Select a blood group and enter your city above to find available donors near you instantly.
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <div style="background:#fff0f0;border-radius:16px;padding:16px 24px;font-size:14px;color:#c0152a;font-weight:600;">
                    🅰️ &nbsp; A+, A−
                </div>
                <div style="background:#fff0f0;border-radius:16px;padding:16px 24px;font-size:14px;color:#c0152a;font-weight:600;">
                    🅱️ &nbsp; B+, B−
                </div>
                <div style="background:#fff0f0;border-radius:16px;padding:16px 24px;font-size:14px;color:#c0152a;font-weight:600;">
                    🆎 &nbsp; AB+, AB−
                </div>
                <div style="background:#fff0f0;border-radius:16px;padding:16px 24px;font-size:14px;color:#c0152a;font-weight:600;">
                    🅾️ &nbsp; O+, O−
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<style>@keyframes blink{0%,100%{opacity:1;}50%{opacity:.3;}}</style>
<script>
(function(){
    const c=document.getElementById('searchCanvas');
    if(!c)return;
    const ctx=c.getContext('2d');
    let W,H,t=0;
    function resize(){W=c.width=c.offsetWidth;H=c.height=c.offsetHeight;}
    resize();window.addEventListener('resize',resize);
    function draw(){
        ctx.clearRect(0,0,W,H);
        const strands=3,sp=W/(strands+1);
        for(let s=0;s<strands;s++){
            const cx=sp*(s+1),amp=38,freq=0.02,spd=0.5;
            ctx.beginPath();
            for(let y=0;y<H;y++){const x=cx+Math.sin(y*freq+t*spd+s)*amp;y===0?ctx.moveTo(x,y):ctx.lineTo(x,y);}
            ctx.strokeStyle='rgba(255,255,255,0.65)';ctx.lineWidth=1.8;ctx.stroke();
            ctx.beginPath();
            for(let y=0;y<H;y++){const x=cx-Math.sin(y*freq+t*spd+s)*amp;y===0?ctx.moveTo(x,y):ctx.lineTo(x,y);}
            ctx.strokeStyle='rgba(255,200,200,0.4)';ctx.lineWidth=1.8;ctx.stroke();
            for(let y=18;y<H;y+=36){
                const ry=(y+t*spd*36)%H;
                const x1=cx+Math.sin(ry*freq+t*spd+s)*amp;
                const x2=cx-Math.sin(ry*freq+t*spd+s)*amp;
                ctx.beginPath();ctx.moveTo(x1,ry);ctx.lineTo(x2,ry);
                ctx.strokeStyle='rgba(255,200,200,0.5)';ctx.lineWidth=1.2;ctx.stroke();
                [x1,x2].forEach(x=>{ctx.beginPath();ctx.arc(x,ry,2.5,0,Math.PI*2);ctx.fillStyle='rgba(255,230,230,0.9)';ctx.fill();});
            }
        }
        t+=0.012;requestAnimationFrame(draw);
    }
    draw();
})();
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\kamir\OneDrive\Desktop\Laravel Projects\lifedrop\resources\views/donors/search.blade.php ENDPATH**/ ?>