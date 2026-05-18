

<?php $__env->startPush('styles'); ?>
<style>
    /* ── HERO ── */
    .create-hero {
        background: linear-gradient(140deg, #8b0e1d, #c0152a, #6b0010);
        color: white; padding: 70px 20px 130px;
        text-align: center; position: relative; overflow: hidden;
    }
    .create-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(28px,5vw,50px); font-weight: 900;
    }
    .create-hero p { opacity:.85; font-size:16px; max-width:500px; margin:10px auto 0; }
    #createCanvas { position:absolute; inset:0; width:100%; height:100%; opacity:.14; pointer-events:none; }
    .fdrop { position:absolute; border-radius:50% 50% 50% 0/60% 60% 40% 40%; background:rgba(255,255,255,0.16); animation:fdropUp linear infinite; }
    @keyframes fdropUp {
        0%{transform:translateY(0) rotate(-45deg);opacity:0;}
        10%{opacity:1;} 90%{opacity:.4;}
        100%{transform:translateY(-250px) rotate(-45deg);opacity:0;}
    }

    /* ── FORM CARD ── */
    .form-card-wrap { margin-top:-70px; position:relative; z-index:10; }
    .form-card {
        background:white; border-radius:28px; padding:44px 40px;
        box-shadow:0 20px 60px rgba(192,21,42,0.14);
        border:1px solid #fce4e4;
    }
    @media(max-width:600px){ .form-card{ padding:28px 20px; } }

    /* ── PHOTO UPLOAD ── */
    .photo-upload-wrap {
        display:flex; flex-direction:column; align-items:center; justify-content:center;
        gap:14px;
    }
    .photo-preview-circle {
        width:130px; height:130px; border-radius:50%;
        background:linear-gradient(135deg,#fff0f0,#ffd6d6);
        border:3px dashed #c0152a;
        display:flex; align-items:center; justify-content:center;
        font-size:48px; cursor:pointer; overflow:hidden;
        transition:all .3s; position:relative;
    }
    .photo-preview-circle:hover { border-style:solid; box-shadow:0 0 0 6px rgba(192,21,42,0.1); }
    .photo-preview-circle img { width:100%; height:100%; object-fit:cover; border-radius:50%; }
    .photo-overlay {
        position:absolute; inset:0; border-radius:50%;
        background:rgba(192,21,42,0.65);
        display:flex; align-items:center; justify-content:center;
        opacity:0; transition:opacity .3s; color:white; font-size:24px;
    }
    .photo-preview-circle:hover .photo-overlay { opacity:1; }
    .photo-upload-label {
        font-size:13px; color:#6b7280; text-align:center;
        line-height:1.6;
    }
    .photo-upload-label span { color:#c0152a; font-weight:600; cursor:pointer; }

    /* ── FORM FIELDS ── */
    .field-group { margin-bottom:22px; }
    .field-group label {
        display:block; font-weight:600; font-size:14px; color:#374151; margin-bottom:7px;
    }
    .field-group label span.opt { color:#9ca3af; font-weight:400; font-size:12px; }
    .field-group .form-control,
    .field-group .form-select {
        border:1.5px solid #e5e7eb; border-radius:14px;
        padding:13px 16px; font-size:15px; height:auto;
        transition:border-color .3s, box-shadow .3s;
    }
    .field-group .form-control:focus,
    .field-group .form-select:focus {
        border-color:#c0152a;
        box-shadow:0 0 0 4px rgba(192,21,42,0.09);
        outline:none;
    }
    .field-icon-wrap { position:relative; }
    .field-icon-wrap .field-icon {
        position:absolute; left:14px; top:50%; transform:translateY(-50%);
        color:#c0152a; font-size:14px; pointer-events:none;
    }
    .field-icon-wrap .form-control,
    .field-icon-wrap .form-select { padding-left:40px; }

    /* ── BLOOD GROUP GRID ── */
    .blood-grid { display:flex; flex-wrap:wrap; gap:10px; }
    .blood-chip {
        border:2px solid #e5e7eb; border-radius:50px;
        padding:9px 20px; font-weight:700; font-size:14px; cursor:pointer;
        transition:all .25s; background:white; color:#374151;
    }
    .blood-chip:hover { border-color:#c0152a; color:#c0152a; background:#fff0f0; }
    .blood-chip.selected {
        background:linear-gradient(135deg,#c0152a,#8b0e1d);
        color:white; border-color:transparent;
        box-shadow:0 4px 14px rgba(192,21,42,0.35);
    }

    /* ── SUBMIT BUTTON ── */
    .btn-submit {
        background:linear-gradient(135deg,#c0152a,#8b0e1d);
        color:white; border:none; border-radius:50px;
        padding:16px 40px; font-size:17px; font-weight:700;
        width:100%; transition:all .3s;
        box-shadow:0 8px 28px rgba(192,21,42,0.35);
        letter-spacing:.3px;
    }
    .btn-submit:hover {
        transform:translateY(-4px);
        box-shadow:0 14px 36px rgba(192,21,42,0.45);
    }

    /* ── SECTION DIVIDER ── */
    .form-section-title {
        font-family:'Playfair Display',serif;
        font-size:16px; font-weight:700; color:#c0152a;
        display:flex; align-items:center; gap:10px;
        margin-bottom:20px; padding-bottom:10px;
        border-bottom:2px solid #fce4e4;
    }

    /* ── ALERTS ── */
    .alert-success-custom {
        background:#f0fdf4; border:1px solid #86efac; color:#15803d;
        border-radius:16px; padding:16px 22px; margin-bottom:24px;
        display:flex; align-items:center; gap:12px; font-weight:600;
    }
    .alert-error-custom {
        background:#fff0f0; border:1px solid #fca5a5; color:#c0152a;
        border-radius:16px; padding:16px 22px; margin-bottom:24px;
    }
    .alert-error-custom ul { margin:8px 0 0; padding-left:18px; font-size:14px; }

    /* ── AVAILABILITY TOGGLE ── */
    .avail-toggle { display:flex; gap:10px; }
    .avail-opt {
        flex:1; border:2px solid #e5e7eb; border-radius:14px;
        padding:12px; text-align:center; cursor:pointer;
        font-weight:600; font-size:14px; transition:all .25s;
        background:white; color:#6b7280;
    }
    .avail-opt.selected-yes { border-color:#16a34a; background:#f0fdf4; color:#15803d; }
    .avail-opt.selected-no  { border-color:#9ca3af; background:#f5f5f5; color:#6b7280; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<!-- HERO -->
<div class="create-hero">
    <canvas id="createCanvas"></canvas>
    <div class="fdrop" style="left:12%;bottom:0;width:10px;height:14px;animation-duration:7s;"></div>
    <div class="fdrop" style="left:45%;bottom:0;width:7px;height:10px;animation-duration:5s;animation-delay:1.2s;"></div>
    <div class="fdrop" style="left:78%;bottom:0;width:11px;height:15px;animation-duration:8s;animation-delay:2s;"></div>
    <div style="position:relative;z-index:2;">
        <div style="display:inline-block;background:rgba(255,255,255,0.15);border:1px solid rgba(255,255,255,0.3);border-radius:50px;padding:5px 18px;font-size:12px;font-weight:600;letter-spacing:1.5px;text-transform:uppercase;margin-bottom:14px;">
            ❤️ &nbsp; Join the Life-Saving Community
        </div>
        <h1>Register as Blood Donor</h1>
        <p>Your profile will be visible to patients in need. Together we save lives — one donation at a time.</p>
    </div>
</div>

<!-- FORM -->
<div class="container form-card-wrap">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="form-card reveal">

                <!-- Alerts -->
                <?php if(session('success')): ?>
                <div class="alert-success-custom">
                    <i class="fas fa-check-circle fa-lg"></i>
                    <?php echo e(session('success')); ?>

                </div>
                <?php endif; ?>
                <?php if($errors->any()): ?>
                <div class="alert-error-custom">
                    <strong><i class="fas fa-exclamation-circle me-2"></i> Please fix the following:</strong>
                    <ul><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>
                </div>
                <?php endif; ?>

                <form action="<?php echo e(route('donors.store')); ?>" method="POST" enctype="multipart/form-data" id="donorForm">
                    <?php echo csrf_field(); ?>

                    <div class="row g-5 align-items-start">

                        <!-- LEFT: Photo upload -->
                        <div class="col-md-4">
                            <div class="photo-upload-wrap">
                                <div class="photo-preview-circle" onclick="document.getElementById('photoInput').click()">
                                    <span id="photoEmoji">🩸</span>
                                    <img id="photoPreviewImg" src="" alt="" style="display:none;">
                                    <div class="photo-overlay"><i class="fas fa-camera"></i></div>
                                </div>
                                <input type="file" name="photo" id="photoInput" accept="image/*" style="display:none;" onchange="previewPhoto(this)">
                                <div class="photo-upload-label">
                                    <span onclick="document.getElementById('photoInput').click()">Click to upload photo</span><br>
                                    <span style="color:#9ca3af;">Optional · JPG, PNG · max 2MB</span>
                                </div>
                            </div>

                            <!-- Info box -->
                            <div style="background:#fff0f0;border-radius:18px;padding:20px;margin-top:32px;border:1px solid #fce4e4;">
                                <div style="font-family:'Playfair Display',serif;font-weight:700;font-size:15px;color:#c0152a;margin-bottom:10px;">
                                    💡 Why Register?
                                </div>
                                <ul style="font-size:13px;color:#6b7280;line-height:1.9;padding-left:16px;margin:0;">
                                    <li>Save up to <strong>3 lives</strong> per donation</li>
                                    <li>Get matched with patients instantly</li>
                                    <li>Free health check every visit</li>
                                    <li>Contacted only when you're available</li>
                                </ul>
                            </div>
                        </div>

                        <!-- RIGHT: Form fields -->
                        <div class="col-md-8">

                            <!-- Personal Info -->
                            <div class="form-section-title">
                                <i class="fas fa-user"></i> Personal Information
                            </div>

                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="field-group">
                                        <label><i class="fas fa-user me-1 text-danger"></i> Full Name</label>
                                        <div class="field-icon-wrap">
                                            <i class="fas fa-user field-icon"></i>
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="Your full name" value="<?php echo e(old('name')); ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="field-group">
                                        <label><i class="fas fa-birthday-cake me-1 text-danger"></i> Age</label>
                                        <div class="field-icon-wrap">
                                            <i class="fas fa-birthday-cake field-icon"></i>
                                            <input type="number" name="age" class="form-control"
                                                   placeholder="e.g. 25" min="18" max="65" value="<?php echo e(old('age')); ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="field-group">
                                        <label><i class="fas fa-envelope me-1 text-danger"></i> Email</label>
                                        <div class="field-icon-wrap">
                                            <i class="fas fa-envelope field-icon"></i>
                                            <input type="email" name="email" class="form-control"
                                                   placeholder="you@email.com" value="<?php echo e(old('email')); ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="field-group">
                                        <label><i class="fas fa-phone me-1 text-danger"></i> Phone Number</label>
                                        <div class="field-icon-wrap">
                                            <i class="fas fa-phone field-icon"></i>
                                            <input type="text" name="phone" class="form-control"
                                                   placeholder="10-digit mobile" value="<?php echo e(old('phone')); ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="field-group">
                                        <label><i class="fas fa-map-marker-alt me-1 text-danger"></i> City</label>
                                        <div class="field-icon-wrap">
                                            <i class="fas fa-map-marker-alt field-icon"></i>
                                            <input type="text" name="city" class="form-control"
                                                   placeholder="Your city" value="<?php echo e(old('city')); ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Blood Group -->
                            <div class="form-section-title mt-3">
                                <i class="fas fa-tint"></i> Blood Group
                            </div>
                            <div class="field-group">
                                <!-- Hidden input that gets filled by chip click -->
                                <input type="hidden" name="blood_group" id="bloodGroupInput" value="<?php echo e(old('blood_group')); ?>" required>
                                <div class="blood-grid" id="bloodGrid">
                                    <?php $__currentLoopData = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="blood-chip <?php echo e(old('blood_group') == $group ? 'selected' : ''); ?>"
                                             onclick="selectBlood('<?php echo e($group); ?>', this)">
                                            <?php echo e($group); ?>

                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <p style="font-size:12px;color:#9ca3af;margin-top:8px;">
                                    <i class="fas fa-info-circle me-1"></i> Tap your blood group above to select it.
                                </p>
                            </div>

                            <!-- Availability -->
                            <div class="form-section-title">
                                <i class="fas fa-calendar-check"></i> Availability
                            </div>
                            <input type="hidden" name="availability" id="availInput" value="<?php echo e(old('availability', 'Available')); ?>">
                            <div class="avail-toggle field-group">
                                <div class="avail-opt <?php echo e(old('availability','Available') == 'Available' ? 'selected-yes' : ''); ?>"
                                     id="availYes" onclick="setAvail('Available')">
                                    ✅ Available Now
                                </div>
                                <div class="avail-opt <?php echo e(old('availability') == 'Not Available' ? 'selected-no' : ''); ?>"
                                     id="availNo" onclick="setAvail('Not Available')">
                                    ⏸️ Not Available
                                </div>
                            </div>

                            <!-- Submit -->
                            <button type="submit" class="btn-submit mt-3" id="submitBtn">
                                <i class="fas fa-heart me-2"></i> Register as Donor
                            </button>
                            <p class="text-muted text-center mt-3" style="font-size:13px;">
                                By registering, you agree to be contacted by patients in need of blood donation.
                            </p>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div style="padding-bottom:80px;"></div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
/* DNA canvas */
(function(){
    const c=document.getElementById('createCanvas');
    if(!c)return;
    const ctx=c.getContext('2d');
    let W,H,t=0;
    function resize(){W=c.width=c.offsetWidth;H=c.height=c.offsetHeight;}
    resize();window.addEventListener('resize',resize);
    function draw(){
        ctx.clearRect(0,0,W,H);
        const strands=3,sp=W/(strands+1);
        for(let s=0;s<strands;s++){
            const cx=sp*(s+1),amp=36,freq=0.02,spd=0.5;
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

/* Photo preview */
function previewPhoto(input) {
    if (!input.files || !input.files[0]) return;
    const reader = new FileReader();
    reader.onload = function(e) {
        const img  = document.getElementById('photoPreviewImg');
        const emoji = document.getElementById('photoEmoji');
        img.src    = e.target.result;
        img.style.display  = 'block';
        emoji.style.display = 'none';
    };
    reader.readAsDataURL(input.files[0]);
}

/* Blood group chip selection */
function selectBlood(group, el) {
    document.querySelectorAll('.blood-chip').forEach(c => c.classList.remove('selected'));
    el.classList.add('selected');
    document.getElementById('bloodGroupInput').value = group;
}

/* Availability toggle */
function setAvail(val) {
    document.getElementById('availInput').value = val;
    const yes = document.getElementById('availYes');
    const no  = document.getElementById('availNo');
    if (val === 'Available') {
        yes.className = 'avail-opt selected-yes';
        no.className  = 'avail-opt';
    } else {
        yes.className = 'avail-opt';
        no.className  = 'avail-opt selected-no';
    }
}

/* Submit feedback */
document.getElementById('donorForm').addEventListener('submit', function() {
    const btn = document.getElementById('submitBtn');
    btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Registering...';
    btn.disabled  = true;
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\kamir\OneDrive\Desktop\Laravel Projects\lifedrop\resources\views/donors/create.blade.php ENDPATH**/ ?>