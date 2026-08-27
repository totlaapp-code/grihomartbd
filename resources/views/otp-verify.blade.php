@extends('webview.master')

@section('title', 'OTP যাচাই করুন — Grihomartbd')

@section('meta')
<meta name="description" content="আপনার অর্ডার নিশ্চিত করতে OTP দিন">
@endsection

@section('subhead')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap');

    .otp-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(160deg, #f0faf0 0%, #e6f5e6 50%, #d4edda 100%);
        padding: 20px;
        font-family: 'Hind Siliguri', sans-serif;
    }
    .otp-card {
        background: #fff;
        border-radius: 24px;
        box-shadow: 0 20px 60px rgba(56, 142, 60, 0.12);
        padding: 36px 32px 28px;
        max-width: 430px;
        width: 100%;
        text-align: center;
        border-top: 4px solid #4caf50;
    }
    .brand-logo {
        margin-bottom: 6px;
    }
    .brand-logo img {
        max-height: 55px;
        object-fit: contain;
    }
    .otp-icon {
        width: 72px;
        height: 72px;
        background: linear-gradient(135deg, #388e3c, #66bb6a);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 14px auto 16px;
        font-size: 28px;
        color: white;
        box-shadow: 0 8px 20px rgba(56,142,60,0.30);
    }
    .otp-title {
        font-size: 21px;
        font-weight: 700;
        color: #1b5e20;
        margin-bottom: 8px;
    }
    .otp-subtitle {
        font-size: 13.5px;
        color: #555;
        margin-bottom: 6px;
        line-height: 1.7;
    }
    .otp-phone {
        font-weight: 700;
        color: #388e3c;
        font-size: 16px;
        margin-bottom: 4px;
    }
    .order-summary {
        background: #f1f8e9;
        border: 1px solid #c5e1a5;
        border-radius: 12px;
        padding: 12px 16px;
        margin: 16px 0;
        text-align: left;
    }
    .order-summary p {
        margin: 4px 0;
        font-size: 13px;
        color: #555;
    }
    .order-summary strong {
        color: #2e7d32;
    }
    /* OTP Input Boxes */
    .otp-inputs {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin: 22px 0 10px;
    }
    .otp-box {
        width: 48px;
        height: 56px;
        border: 2px solid #c8e6c9;
        border-radius: 12px;
        font-size: 22px;
        font-weight: 700;
        text-align: center;
        color: #1b5e20;
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
        background: #f9fef9;
        font-family: 'Hind Siliguri', sans-serif;
    }
    .otp-box:focus {
        border-color: #4caf50;
        box-shadow: 0 0 0 3px rgba(76,175,80,0.18);
        background: #fff;
    }
    .otp-box.filled {
        border-color: #4caf50;
        background: #f1f8e9;
    }
    .otp-box.error {
        border-color: #e53935;
        background: #fff5f5;
    }
    .error-msg {
        color: #c62828;
        font-size: 13px;
        margin-bottom: 10px;
        background: #ffebee;
        border: 1px solid #ffcdd2;
        border-radius: 8px;
        padding: 8px 12px;
    }
    .btn-verify {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #2e7d32, #4caf50);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: transform 0.15s, box-shadow 0.15s;
        margin-top: 6px;
        letter-spacing: 0.3px;
        font-family: 'Hind Siliguri', sans-serif;
    }
    .btn-verify:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(56,142,60,0.38);
    }
    .btn-verify:active { transform: translateY(0); }
    .btn-verify:disabled {
        opacity: 0.65;
        cursor: not-allowed;
        transform: none;
    }
    .resend-row {
        margin-top: 18px;
        font-size: 13px;
        color: #888;
    }
    .resend-btn {
        background: transparent !important;
        border: none;
        color: #388e3c !important;
        font-weight: 700;
        cursor: pointer;
        font-size: 14px;
        padding: 4px 8px;
        border-radius: 6px;
        transition: all 0.2s ease;
        font-family: 'Hind Siliguri', sans-serif;
    }
    .resend-btn:not(:disabled):hover { background: #e8f5e9 !important; }
    .resend-btn:disabled { color: #aaa !important; cursor: not-allowed; }
    #countdown { font-weight: 700; color: #388e3c; }
    .attempts-badge {
        display: inline-block;
        background: #fff8e1;
        border: 1px solid #ffe082;
        color: #e65100;
        font-size: 12px;
        border-radius: 20px;
        padding: 3px 12px;
        margin-top: 6px;
    }
    .spinner {
        display: none;
        width: 20px;
        height: 20px;
        border: 2px solid rgba(255,255,255,0.5);
        border-top-color: #fff;
        border-radius: 50%;
        animation: spin 0.7s linear infinite;
        margin: 0 auto;
    }
    .trust-row {
        display: flex;
        gap: 8px;
        margin-top: 16px;
        border-top: 1px solid #e8f5e9;
        padding-top: 14px;
        justify-content: center;
    }
    .trust-item {
        font-size: 11.5px;
        color: #558b2f;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    @keyframes spin { to { transform: rotate(360deg); } }
</style>
@endsection

@section('maincontent')
<div class="otp-wrapper">
    <div class="otp-card">

        {{-- Brand Logo --}}
        <div class="brand-logo">
            <img src="{{ asset(\App\Models\Basicinfo::first()->logo) }}" alt="Logo">
        </div>

        <div class="otp-icon">
            <i class="fas fa-mobile-alt"></i>
        </div>

        <h1 class="otp-title">OTP যাচাই করুন</h1>
        <p class="otp-subtitle">OTP দিয়ে অর্ডার কনফার্ম করুন, আর যদি OTP না দেন তাহলে আমাদের কাস্টমার কেয়ার থেকে আপনার সাথে খুব শীঘ্রই কল করা হবে।</p>

        <div class="otp-phone"><i class="fas fa-phone-alt me-1"></i>{{ $customer->customerPhone ?? '' }}</div>

        <div class="order-summary">
            <p><i class="fas fa-file-invoice" style="color: #388e3c; margin-right: 5px;"></i> <strong>Invoice:</strong> {{ $order->invoiceID }}</p>
            <p><i class="fas fa-money-bill-wave" style="color: #388e3c; margin-right: 5px;"></i> <strong>মোট:</strong> ৳{{ number_format($order->subTotal, 0) }}</p>
        </div>

        @if($errors->has('otp'))
            <div class="error-msg">
                <i class="fas fa-exclamation-triangle"></i> {{ $errors->first('otp') }}
            </div>
        @endif

        <form action="{{ route('otp.verify') }}" method="POST" id="otpForm">
            @csrf
            <input type="hidden" name="order_id" value="{{ $order->id }}">
            <input type="hidden" name="otp" id="otpHidden">

            <div class="otp-inputs">
                @for($i = 1; $i <= 6; $i++)
                    <input type="text"
                           class="otp-box @error('otp') error @enderror"
                           id="otp{{ $i }}"
                           maxlength="1"
                           inputmode="numeric"
                           pattern="[0-9]"
                           autocomplete="off">
                @endfor
            </div>

            @if($order->otp_attempts > 0)
                <div class="attempts-badge">
                    <i class="fas fa-exclamation-triangle"></i> {{ 3 - $order->otp_attempts }}টি চেষ্টা বাকি আছে
                </div>
            @endif

            <button type="submit" class="btn-verify" id="verifyBtn">
                <span id="btnText"><i class="fas fa-check-circle"></i> অর্ডার নিশ্চিত করুন</span>
                <div class="spinner" id="btnSpinner"></div>
            </button>
        </form>

        <div class="resend-row">
            SMS পাননি?
            <button class="resend-btn" id="resendBtn" disabled onclick="resendOtp()">
                পুনরায় পাঠান <span id="countdown-text">(<span id="countdown">60</span>s)</span>
            </button>
        </div>

        {{-- Trust Badges --}}
        <div class="trust-row">
            <span class="trust-item"><i class="fas fa-lock"></i> সুরক্ষিত</span>
            <span class="trust-item"><i class="fas fa-leaf"></i> ১০০% হালাল</span>
            <span class="trust-item"><i class="fas fa-undo"></i> রিটার্ন সুবিধা</span>
        </div>

    </div>
</div>
@endsection

@section('subfooter')
<script>
    // ─── OTP Box Auto-focus & navigation ─────────────────────────────────────
    const boxes = document.querySelectorAll('.otp-box');
    const hiddenInput = document.getElementById('otpHidden');

    boxes.forEach((box, idx) => {
        box.addEventListener('input', (e) => {
            const val = e.target.value.replace(/\D/g, '');
            e.target.value = val;
            if (val.length === 1 && idx < boxes.length - 1) {
                boxes[idx + 1].focus();
            }
            box.classList.toggle('filled', val.length > 0);
            updateHidden();
        });

        box.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && !e.target.value && idx > 0) {
                boxes[idx - 1].focus();
                boxes[idx - 1].value = '';
                boxes[idx - 1].classList.remove('filled');
                updateHidden();
            }
        });

        box.addEventListener('paste', (e) => {
            e.preventDefault();
            const pasted = e.clipboardData.getData('text').replace(/\D/g, '').slice(0, 6);
            pasted.split('').forEach((char, i) => {
                if (boxes[i]) {
                    boxes[i].value = char;
                    boxes[i].classList.add('filled');
                }
            });
            if (pasted.length > 0) boxes[Math.min(pasted.length, 5)].focus();
            updateHidden();
        });
    });

    boxes[0].focus();

    function updateHidden() {
        hiddenInput.value = Array.from(boxes).map(b => b.value).join('');
    }

    // ─── Form submit spinner ───────────────────────────────────────────────
    document.getElementById('otpForm').addEventListener('submit', function(e) {
        const otp = hiddenInput.value;
        if (otp.length < 6) {
            e.preventDefault();
            alert('অনুগ্রহ করে ৬ সংখ্যার OTP দিন।');
            return;
        }
        document.getElementById('btnText').style.display = 'none';
        document.getElementById('btnSpinner').style.display = 'block';
        document.getElementById('verifyBtn').disabled = true;
    });

    // ─── Resend countdown ──────────────────────────────────────────────────
    let seconds = 60;
    const countdownEl = document.getElementById('countdown');
    const resendBtn   = document.getElementById('resendBtn');

    const timer = setInterval(() => {
        seconds--;
        countdownEl.textContent = seconds;
        if (seconds <= 0) {
            clearInterval(timer);
            resendBtn.disabled = false;
            document.getElementById('countdown-text').style.display = 'none';
        }
    }, 1000);

    function resendOtp() {
        resendBtn.disabled = true;
        resendBtn.textContent = 'পাঠানো হচ্ছে...';

        fetch("{{ route('otp.resend') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ order_id: {{ $order->id }} })
        })
        .then(r => r.json())
        .then(data => {
            if (data.status === 'sent') {
                resendBtn.textContent = 'পাঠানো হয়েছে!';
                resendBtn.style.color = '#28a745';
                // clear boxes
                boxes.forEach(b => { b.value = ''; b.classList.remove('filled'); });
                boxes[0].focus();
                updateHidden();
            } else {
                resendBtn.textContent = 'আবার চেষ্টা করুন';
                resendBtn.disabled = false;
            }
        })
        .catch(() => {
            resendBtn.textContent = 'সমস্যা হয়েছে';
            resendBtn.disabled = false;
        });
    }
</script>
@endsection
