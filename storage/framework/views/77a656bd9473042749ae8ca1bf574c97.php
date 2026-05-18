

<?php $__env->startPush('styles'); ?>
<style>
    /* ── PAGE HERO BANNER ── */
    .page-hero {
        background: linear-gradient(140deg, #8b0e1d 0%, #c0152a 55%, #6b0010 100%);
        color: white;
        padding: 70px 20px 80px;
        text-align: center;
        position: relative;
        overflow: hidden;
        border-radius: 0 0 50px 50px;
    }
    .page-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(30px, 5vw, 52px);
        font-weight: 900;
    }
    .page-hero p { opacity: .85; font-size: 17px; max-width: 520px; margin: 12px auto 0; }
    #donorCanvas {
        position: absolute; inset: 0;
        width: 100%; height: 100%;
        opacity: .15; pointer-events: none;
    }

    /* Floating drops */
    .fdrop {
        position: absolute; border-radius: 50% 50% 50% 0/60% 60% 40% 40%;
        background: rgba(255,255,255,0.18);
        animation: fdropFloat linear infinite;
    }
    @keyframes fdropFloat {
        0%   { transform: translateY(0) rotate(-45deg); opacity: 0; }
        10%  { opacity: 1; }
        90%  { opacity: .4; }
        100% { transform: translateY(-260px) rotate(-45deg); opacity: 0; }
    }

    /* ── STAT CHIPS ── */
    .stat-chip {
        background: rgba(255,255,255,0.13);
        border: 1px solid rgba(255,255,255,0.25);
        border-radius: 50px;
        padding: 10px 24px;
        font-size: 14px;
        font-weight: 600;
        backdrop-filter: blur(6px);
    }

    /* ── DONOR CARD ── */
    .donor-card {
        background: #fff;
        border-radius: 24px;
        padding: 32px 28px 24px;
        box-shadow: 0 6px 28px rgba(192,21,42,0.08);
        border: 1px solid #fce8e8;
        transition: transform .35s ease, box-shadow .35s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .donor-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 5px;
        background: linear-gradient(90deg, #c0152a, #ff6b6b, #c0152a);
        background-size: 200%;
        animation: shimmer 3s linear infinite;
    }
    @keyframes shimmer { 0%{background-position:0%} 100%{background-position:200%} }
    .donor-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(192,21,42,0.18);
    }

    /* Photo circle */
    .donor-photo {
        width: 88px; height: 88px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #c0152a;
        box-shadow: 0 0 0 5px rgba(192,21,42,0.12);
        margin-bottom: 16px;
    }
    .donor-photo-fallback {
        width: 88px; height: 88px;
        border-radius: 50%;
        background: linear-gradient(135deg, #c0152a, #8b0e1d);
        display: flex; align-items: center; justify-content: center;
        font-size: 32px;
        border: 3px solid #c0152a;
        box-shadow: 0 0 0 5px rgba(192,21,42,0.12);
        margin-bottom: 16px;
        flex-shrink: 0;
    }

    /* Blood badge */
    .blood-badge-lg {
        background: linear-gradient(135deg, #c0152a, #8b0e1d);
        color: white;
        padding: 5px 16px;
        border-radius: 20px;
        font-weight: 800;
        font-size: 15px;
        letter-spacing: .5px;
        margin-bottom: 16px;
    }

    /* Info rows */
    .donor-info { width: 100%; text-align: left; margin-bottom: 16px; }
    .donor-info-row {
        display: flex; align-items: center; gap: 10px;
        padding: 9px 0;
        border-bottom: 1px solid #fce4e4;
        font-size: 14px; color: #374151;
    }
    .donor-info-row:last-child { border-bottom: none; }
    .donor-info-row i { color: #c0152a; width: 16px; flex-shrink: 0; }
    .donor-info-row strong { color: #1a1a2e; }

    /* Availability badge */
    .avail-badge {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 5px 14px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .5px;
        margin-bottom: 16px;
    }
    .avail-yes { background: #f0fdf4; color: #15803d; border: 1px solid #86efac; }
    .avail-no  { background: #f5f5f5; color: #6b7280; border: 1px solid #d1d5db; }

    /* WhatsApp button */
    .btn-whatsapp {
        background: linear-gradient(135deg, #25d366, #128c7e);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 11px 26px;
        font-weight: 700;
        font-size: 14px;
        width: 100%;
        transition: all .3s;
        box-shadow: 0 4px 16px rgba(37,211,102,0.3);
        display: flex; align-items: center; justify-content: center; gap: 8px;
        text-decoration: none;
    }
    .btn-whatsapp:hover {
        background: linear-gradient(135deg, #20b557, #0e7a6b);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(37,211,102,0.4);
    }
    .btn-whatsapp svg { width: 18px; height: 18px; fill: white; flex-shrink: 0; }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 80px 20px;
        background: white;
        border-radius: 24px;
        border: 2px dashed #fce4e4;
    }
    .empty-state-icon { font-size: 64px; margin-bottom: 20px; }

    /* Filter bar */
    .filter-bar {
        background: white;
        border-radius: 20px;
        padding: 20px 28px;
        box-shadow: 0 4px 20px rgba(192,21,42,0.08);
        border: 1px solid #fce4e4;
        margin-bottom: 36px;
    }
    .filter-bar input {
        border: 1.5px solid #e5e7eb;
        border-radius: 50px;
        padding: 10px 20px;
        font-size: 14px;
        outline: none;
        transition: border-color .3s;
        width: 100%;
    }
    .filter-bar input:focus { border-color: #c0152a; box-shadow: 0 0 0 3px rgba(192,21,42,0.09); }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<!-- PAGE HERO -->
<div class="page-hero">
    <canvas id="donorCanvas"></canvas>
    <div class="fdrop" style="left:8%;bottom:0;width:10px;height:13px;animation-duration:7s;"></div>
    <div class="fdrop" style="left:30%;bottom:0;width:7px;height:10px;animation-duration:5s;animation-delay:1s;"></div>
    <div class="fdrop" style="left:65%;bottom:0;width:12px;height:16px;animation-duration:8s;animation-delay:2s;"></div>
    <div class="fdrop" style="left:85%;bottom:0;width:9px;height:12px;animation-duration:6s;animation-delay:.5s;"></div>

    <div style="position:relative;z-index:2;">
        <div style="display:inline-block;background:rgba(255,255,255,0.15);border:1px solid rgba(255,255,255,0.3);border-radius:50px;padding:5px 18px;font-size:12px;font-weight:600;letter-spacing:1.5px;text-transform:uppercase;margin-bottom:16px;">
            🩸 &nbsp; Community of Life-Savers
        </div>
        <h1>Registered Blood Donors</h1>
        <p>Every name on this list is a hero ready to save a life. Find a match and reach out today.</p>

        <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
            <div class="stat-chip">❤️ <?php echo e($donors->count()); ?> Registered Donors</div>
            <div class="stat-chip">🌍 Multiple Cities</div>
            <div class="stat-chip">⚡ Instant Contact</div>
        </div>
    </div>
</div>


<!-- CONTENT -->
<div class="container" style="padding: 56px 20px 80px;">

    <!-- Live search filter -->
    <div class="filter-bar d-flex align-items-center gap-3 flex-wrap reveal">
        <i class="fas fa-search text-danger"></i>
        <input type="text" id="liveSearch" placeholder="Filter by name, city, or blood group..." oninput="filterCards()">
        <span id="filterCount" style="font-size:13px;color:#6b7280;white-space:nowrap;"></span>
    </div>

    <?php if($donors->count() > 0): ?>
        <div class="row g-4" id="donorGrid">
            <?php $__currentLoopData = $donors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6 reveal reveal-delay-<?php echo e(($loop->index % 3) + 1); ?>"
                 data-name="<?php echo e(strtolower($donor->name)); ?>"
                 data-city="<?php echo e(strtolower($donor->city)); ?>"
                 data-blood="<?php echo e(strtolower($donor->blood_group)); ?>">
                <div class="donor-card">

                    <!-- Photo -->
                    <?php if($donor->photo): ?>
                        <img src="<?php echo e(asset($donor->photo)); ?>" class="donor-photo" alt="<?php echo e($donor->name); ?>">
                    <?php else: ?>
                        <div class="donor-photo-fallback">🩸</div>
                    <?php endif; ?>

                    <!-- Name + blood group -->
                    <h5 style="font-family:'Playfair Display',serif;font-weight:700;font-size:19px;margin-bottom:6px;">
                        <?php echo e($donor->name); ?>

                    </h5>
                    <div class="blood-badge-lg"><?php echo e($donor->blood_group); ?></div>

                    <!-- Availability -->
                    <?php if($donor->availability == 'Available'): ?>
                        <div class="avail-badge avail-yes">
                            <span style="width:7px;height:7px;border-radius:50%;background:#16a34a;animation:pulse 1.5s infinite;display:inline-block;"></span>
                            Available
                        </div>
                    <?php else: ?>
                        <div class="avail-badge avail-no">
                            <span style="width:7px;height:7px;border-radius:50%;background:#9ca3af;display:inline-block;"></span>
                            Not Available
                        </div>
                    <?php endif; ?>

                    <!-- Info rows -->
                    <div class="donor-info">
                        <div class="donor-info-row">
                            <i class="fas fa-envelope"></i>
                            <span><?php echo e($donor->email); ?></span>
                        </div>
                        <div class="donor-info-row">
                            <i class="fas fa-phone"></i>
                            <span><?php echo e($donor->phone); ?></span>
                        </div>
                        <div class="donor-info-row">
                            <i class="fas fa-birthday-cake"></i>
                            <span><strong>Age:</strong> <?php echo e($donor->age); ?> years</span>
                        </div>
                        <div class="donor-info-row">
                            <i class="fas fa-map-marker-alt"></i>
                            <span><strong>City:</strong> <?php echo e($donor->city); ?></span>
                        </div>
                    </div>

                    <!-- WhatsApp button -->
                    <a href="https://wa.me/91<?php echo e($donor->phone); ?>?text=Hello%20<?php echo e(urlencode($donor->name)); ?>,%20I%20found%20your%20contact%20on%20LifeDrop.%20Are%20you%20available%20for%20blood%20donation?"
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

        <!-- No results after filter -->
        <div id="noFilterResult" style="display:none;" class="empty-state mt-4">
            <div class="empty-state-icon">🔍</div>
            <h4 style="font-family:'Playfair Display',serif;font-weight:700;">No match found</h4>
            <p class="text-muted mt-2">Try a different name, city, or blood group.</p>
        </div>

    <?php else: ?>
        <div class="empty-state reveal">
            <div class="empty-state-icon">🩸</div>
            <h4 style="font-family:'Playfair Display',serif;font-weight:700;">No donors registered yet</h4>
            <p class="text-muted mt-2 mb-4">Be the first to make a difference in someone's life.</p>
            <a href="<?php echo e(route('donors.create')); ?>" class="btn btn-red btn-lg">
                <i class="fas fa-user-plus me-2"></i> Register as Donor
            </a>
        </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<style>
    @keyframes pulse { 0%,100%{opacity:1;} 50%{opacity:.4;} }
</style>
<script>
/* DNA-style canvas for hero */
(function(){
    const c=document.getElementById('donorCanvas');
    if(!c)return;
    const ctx=c.getContext('2d');
    let W,H,t=0;
    function resize(){W=c.width=c.offsetWidth;H=c.height=c.offsetHeight;}
    resize(); window.addEventListener('resize',resize);
    function draw(){
        ctx.clearRect(0,0,W,H);
        const strands=4, sp=W/(strands+1);
        for(let s=0;s<strands;s++){
            const cx=sp*(s+1),amp=36,freq=0.02,spd=0.5;
            ctx.beginPath();
            for(let y=0;y<H;y++){const x=cx+Math.sin(y*freq+t*spd+s)*amp;y===0?ctx.moveTo(x,y):ctx.lineTo(x,y);}
            ctx.strokeStyle='rgba(255,255,255,0.6)';ctx.lineWidth=1.8;ctx.stroke();
            ctx.beginPath();
            for(let y=0;y<H;y++){const x=cx-Math.sin(y*freq+t*spd+s)*amp;y===0?ctx.moveTo(x,y):ctx.lineTo(x,y);}
            ctx.strokeStyle='rgba(255,200,200,0.4)';ctx.lineWidth=1.8;ctx.stroke();
            for(let y=18;y<H;y+=36){
                const ry=(y+t*spd*36)%H;
                const x1=cx+Math.sin(ry*freq+t*spd+s)*amp;
                const x2=cx-Math.sin(ry*freq+t*spd+s)*amp;
                ctx.beginPath();ctx.moveTo(x1,ry);ctx.lineTo(x2,ry);
                ctx.strokeStyle='rgba(255,200,200,0.55)';ctx.lineWidth=1.2;ctx.stroke();
                [x1,x2].forEach(x=>{ctx.beginPath();ctx.arc(x,ry,2.8,0,Math.PI*2);ctx.fillStyle='rgba(255,230,230,0.85)';ctx.fill();});
            }
        }
        t+=0.012; requestAnimationFrame(draw);
    }
    draw();
})();

/* Live search filter */
function filterCards(){
    const q = document.getElementById('liveSearch').value.toLowerCase().trim();
    const cards = document.querySelectorAll('#donorGrid > div[data-name]');
    let visible = 0;
    cards.forEach(card => {
        const match = !q
            || card.dataset.name.includes(q)
            || card.dataset.city.includes(q)
            || card.dataset.blood.includes(q);
        card.style.display = match ? '' : 'none';
        if(match) visible++;
    });
    const total = cards.length;
    document.getElementById('filterCount').textContent = q
        ? `Showing ${visible} of ${total} donors`
        : `${total} donors`;
    document.getElementById('noFilterResult').style.display = visible === 0 ? 'block' : 'none';
}
// Init count
window.addEventListener('load', () => {
    const total = document.querySelectorAll('#donorGrid > div[data-name]').length;
    if(total) document.getElementById('filterCount').textContent = `${total} donors`;
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\kamir\OneDrive\Desktop\Laravel Projects\lifedrop\resources\views/donors/index.blade.php ENDPATH**/ ?>