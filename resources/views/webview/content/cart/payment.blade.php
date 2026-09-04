@extends('webview.master')

@section('title')
    {{ env('APP_NAME') }} - Order Placed Successfully
@endsection

@section('subhead')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&family=Noto+Sans+Bengali:wght@400;500;600;700&display=swap');
    
    .success-wrapper {
        font-family: 'Hind Siliguri', 'Noto Sans Bengali', system-ui, -apple-system, sans-serif;
        padding: 45px 15px 35px;
        background-color: #fff;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-rendering: optimizeLegibility;
    }
    
    /* Top Banner */
    .success-header {
        text-align: center;
        margin-bottom: 35px;
    }
    .success-header h1 {
        font-size: 26px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 12px;
        line-height: 1.4;
    }
    .success-header .leaf-icon {
        font-size: 24px;
        color: #16a34a;
        margin-bottom: 10px;
    }
    .success-header p {
        font-size: 18px;
        color: #334155;
        font-weight: 500;
        line-height: 1.6;
    }

    /* Reconfirm Box */
    .reconfirm-box {
        background-color: #f1f8e9;
        border-radius: 12px;
        padding: 30px 20px;
        text-align: center;
        max-width: 800px;
        margin: 0 auto 40px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }
    .reconfirm-box h2 {
        font-size: 22px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 10px;
        line-height: 1.4;
    }
    .reconfirm-box p {
        font-size: 16px;
        color: #334155;
        font-weight: 500;
        margin-bottom: 20px;
    }
    .btn-reconfirm {
        background-color: #ff5722 !important;
        color: #fff !important;
        font-weight: 600;
        padding: 12px 30px;
        border-radius: 6px;
        border: none;
        font-size: 18px;
        text-transform: none;
        transition: background 0.3s;
        display: inline-block;
        box-shadow: 0 4px 6px rgba(255, 87, 34, 0.3);
    }
    .btn-reconfirm:hover {
        background-color: #e64a19 !important;
        color: #fff !important;
    }
    .reconfirm-notes {
        margin-top: 20px;
        font-size: 15px;
        color: #15803d;
        text-align: left;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }
    .reconfirm-notes p {
        margin-bottom: 6px;
        font-size: 15px;
        color: #15803d;
        font-weight: 500;
        line-height: 1.6;
    }

    #successVerifiedSection h3 {
        font-size: 26px;
        font-weight: 700;
        color: #15803d !important;
        margin-bottom: 10px;
    }
    #successVerifiedSection p {
        font-size: 17px;
        color: #334155;
        font-weight: 500;
    }

    /* Policy Section */
    .policy-section {
        text-align: center;
        max-width: 820px;
        margin: 0 auto 40px;
    }
    .policy-section h4 {
        color: #15803d;
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 15px;
        letter-spacing: 0.3px;
    }
    .policy-box {
        background-color: #f0fdf4;
        border: 1px solid #bbf7d0;
        border-left: 5px solid #16a34a;
        border-radius: 10px;
        padding: 22px 26px;
        text-align: center;
        color: #1e293b;
        font-style: normal !important;
        font-size: 16px;
        line-height: 1.85;
        font-weight: 500;
        box-shadow: 0 2px 10px rgba(0,0,0,0.03);
    }
    .policy-box p {
        margin-bottom: 12px;
        color: #1e293b;
        font-size: 16px;
        line-height: 1.85;
        font-style: normal !important;
        font-weight: 500;
    }
    .policy-box p:last-child {
        margin-bottom: 0;
    }
    .policy-box .source-tag {
        display: inline-block;
        color: #15803d;
        font-weight: 700;
        margin-left: 6px;
    }

    /* Contact Section */
    .contact-section {
        text-align: center;
        margin-bottom: 40px;
    }
    .contact-section h3 {
        color: #15803d;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 6px;
    }
    .contact-section p {
        font-size: 15px;
        color: #475569;
        font-weight: 500;
    }
    .contact-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 20px;
    }
    .contact-btn {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100px;
        height: 90px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        color: #333;
        transition: transform 0.2s;
    }
    .contact-btn:hover {
        transform: translateY(-5px);
    }
    .contact-btn i {
        font-size: 28px;
        margin-bottom: 8px;
    }
    .btn-fb { background-color: #e3f2fd; }
    .btn-fb i { color: #1976d2; }
    .btn-msg { background-color: #f3e5f5; }
    .btn-msg i { color: #9c27b0; }
    .btn-call { background-color: #f1f8e9; }
    .btn-call i { color: #388e3c; }
    .btn-wa { background-color: #e8f5e9; }
    .btn-wa i { color: #4caf50; }

    /* Order Details */
    .order-details-box {
        max-width: 800px;
        margin: 0 auto;
        background: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 20px;
    }
    .order-details-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #e0e0e0;
        padding-bottom: 15px;
        margin-bottom: 15px;
    }
    .order-details-header h4 {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
    }
    .total-badge {
        background-color: #8bc34a;
        color: #fff;
        padding: 5px 15px;
        border-radius: 20px;
        font-weight: 600;
    }
    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 20px;
    }
    .info-col h5 {
        font-size: 14px;
        font-weight: 700;
        color: #000;
        margin-bottom: 10px;
    }
    .info-row {
        display: flex;
        margin-bottom: 5px;
        font-size: 13px;
    }
    .info-label {
        width: 80px;
        color: #888;
    }
    .info-value {
        font-weight: 500;
        color: #333;
    }
    .payment-badge {
        background-color: #ffb300;
        color: #000;
        padding: 2px 8px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 600;
    }

    /* Modal Styles */
    .otp-modal-content {
        border-radius: 20px;
        border: none;
        padding: 20px;
    }
    .otp-modal-header {
        border-bottom: none;
        text-align: center;
        display: block;
        padding-bottom: 0;
    }
    .otp-modal-title {
        font-weight: 700;
        color: #2e7d32;
        font-size: 22px;
    }
    .otp-modal-body {
        text-align: center;
    }
    .otp-inputs {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin: 20px 0;
    }
    .otp-box {
        width: 45px;
        height: 50px;
        border: 2px solid #c8e6c9;
        border-radius: 10px;
        font-size: 20px;
        font-weight: 700;
        text-align: center;
        color: #1b5e20;
    }
    .otp-box:focus {
        border-color: #4caf50;
        outline: none;
        box-shadow: 0 0 0 3px rgba(76,175,80,0.18);
    }
    .btn-verify {
        background: linear-gradient(135deg, #2e7d32, #4caf50);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 700;
        width: 100%;
        margin-top: 10px;
    }
</style>
@endsection

@section('maincontent')
@php
    $basicinfo = \App\Models\Basicinfo::first();
    $otp_system = $basicinfo ? $basicinfo->otp_system : 'OFF';
    $show_reconfirm = ($otp_system == 'ON' && isset($orders) && $orders != 'Nothing' && !$orders->otp_verified);
@endphp

<div class="success-wrapper">
    <div class="container">
        
        <!-- Top Banner -->
        <div class="success-header">
            <h1>🎉 আলহামদুলিল্লাহ, আপনার অর্ডারটি সফলভাবে গ্রহণ করা হয়েছে</h1>
            <div class="leaf-icon"><i class="fas fa-leaf"></i></div>
            <p>{{ env('APP_NAME') }} পরিবারের সাথে থাকার জন্য জাযাকাল্লাহু খাইরান 🤲</p>
        </div>

        @if($show_reconfirm)
        <!-- Reconfirm Box -->
        <div class="reconfirm-box" id="reconfirmSection">
            <h2><i class="far fa-clock"></i> কলের অপেক্ষা নয়, এখনই রি-কনফার্ম করুন আপনি নিজেই!</h2>
            <p>দ্রুত ডেলিভারি পেতে নিচের বাটনে ক্লিক করুন।</p>
            
            <button type="button" class="btn btn-reconfirm" id="btnReconfirmOrder" onclick="triggerReconfirmOtp()">
                <i class="fas fa-shopping-bag" id="reconfirmBtnIcon"></i>
                <span id="reconfirmBtnSpinner" style="display:none;"><i class="fas fa-spinner fa-spin"></i></span>
                <span id="reconfirmBtnText">Re-Confirm Order</span>
            </button>

            <div class="reconfirm-notes">
                <p><i class="fas fa-check-square text-success"></i> কনফার্ম করলেই অর্ডার দ্রুত কুরিয়ারে যাবে, ইনশাআল্লাহ।</p>
                <p><i class="fas fa-check-square text-success"></i> অথবা রিকনফার্ম করতে আমাদের কাস্টমার সার্ভিস সেন্টার থেকে কলের অপেক্ষা করতে হবে।</p>
            </div>
        </div>
        @endif

        <div id="successVerifiedSection" style="display: {{ $show_reconfirm ? 'none' : 'block' }}; text-align: center; margin-bottom: 40px;">
            <h3 class="text-success" style="font-weight: 700;"><i class="fas fa-check-circle"></i> আপনার অর্ডারটি কনফার্ম হয়েছে!</h3>
            <p>খুব শীঘ্রই ডেলিভারি ম্যান আপনার সাথে যোগাযোগ করবে।</p>
        </div>


        <!-- Policy Section -->
        <div class="policy-section">
            <h4>বিসমিল্লাহির রাহমানির রাহীম</h4>
            <div class="policy-box">
                <p>
                    "হে ঈমানদারগণ! তোমরা পরস্পরের সম্পদ অন্যায়ভাবে ভক্ষণ করো না; তবে পারস্পরিক সম্মতির ভিত্তিতে ব্যবসা হলে ভিন্ন কথা।"
                    <span class="source-tag">— সূরা আন-নিসা: ২৯</span>
                </p>
                <p>
                    "যে ব্যক্তি কোনো অনুতপ্ত ক্রেতার সঙ্গে তার ক্রয়-বিক্রয় বাতিল করে দেয়, আল্লাহ তা'আলা কিয়ামতের দিন তার ভুলত্রুটি ক্ষমা করে দেবেন।"
                    <span class="source-tag">— সুনানে আবু দাউদ ৩৪৬০</span>
                </p>
            </div>
        </div>
        <!-- Contact Section -->
        <div class="contact-section">
            <h3>যোগাযোগ করুন</h3>
            <p style="font-size: 14px; color: #666;">যেকোনো প্রয়োজনে আমাদের সাথে যোগাযোগ করুন</p>
            <div class="contact-buttons">
                <a href="{{ $basicinfo->facebook ?? '#' }}" class="contact-btn btn-fb" target="_blank">
                    <i class="fab fa-facebook"></i> Facebook
                </a>
                <a href="#" class="contact-btn btn-msg">
                    <i class="fab fa-facebook-messenger"></i> Messenger
                </a>
                <a href="tel:{{ $basicinfo->phone_one ?? '' }}" class="contact-btn btn-call">
                    <i class="fas fa-phone-alt"></i> Call
                </a>
                <a href="https://wa.me/{{ $basicinfo->phone_one ?? '' }}" class="contact-btn btn-wa" target="_blank">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
            </div>
        </div>

        @if(isset($orders) && $orders != 'Nothing')
        <!-- Order Details -->
        <div class="order-details-box">
            <div class="order-details-header">
                <div>
                    <h4>Order Id: {{ $orders->invoiceID }}</h4>
                    <span style="font-size: 12px; color: #888;">{{ $orders->created_at->format('F d, Y') }} ({{ $orders->created_at->diffForHumans() }})</span>
                </div>
                <div class="total-badge">
                    Total ৳{{ number_format($orders->subTotal, 0) }}
                </div>
            </div>

            <div class="info-grid">
                <div class="info-col">
                    <h5>Customer Information</h5>
                    <div class="info-row"><div class="info-label">Name:</div><div class="info-value">{{ $orders->customers->customerName ?? '' }}</div></div>
                    <div class="info-row"><div class="info-label">Phone:</div><div class="info-value">{{ $orders->customers->customerPhone ?? '' }}</div></div>
                    <div class="info-row"><div class="info-label">Address:</div><div class="info-value">{{ $orders->customers->customerAddress ?? '' }}</div></div>
                </div>
                <div class="info-col">
                    <h5>Order Information</h5>
                    <div class="info-row"><div class="info-label">Payment:</div><div class="info-value"><span class="payment-badge">Cash on delivery</span></div></div>
                    <div class="info-row"><div class="info-label">Delivery:</div><div class="info-value">Home Delivery</div></div>
                    <div class="info-row"><div class="info-label">Charge:</div><div class="info-value">৳{{ $orders->deliveryCharge }}</div></div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless" style="background: #f9f9f9; border-radius: 8px;">
                    <thead style="border-bottom: 1px solid #eee;">
                        <tr>
                            <th>Product</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-end">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $products = Session::has('ordered_products') ? Session::get('ordered_products') : DB::table('orderproducts')->where('order_id', '=', $orders->id)->get();
                        @endphp
                        @foreach ($products as $product)
                            @php
                                $pid = $product->product_id ?? $product->id;
                                $dbProd = App\Models\Product::where('id', $pid)->first();
                                $pName = $product->productName ?? $product->name;
                                $pQty = $product->quantity ?? ($product->qty ?? 0);
                                $pPrice = $product->productPrice ?? $product->price;
                            @endphp
                            <tr>
                                <td>
                                    @if($dbProd)
                                    <img src="{{ asset($dbProd->ProductImage) }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px; margin-right: 10px;">
                                    @endif
                                    <span style="font-weight: 500;">{{ $pName }}</span>
                                </td>
                                <td class="text-center">{{ $pQty }}</td>
                                <td class="text-end">৳{{ $pPrice }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot style="border-top: 1px solid #eee;">
                        <tr>
                            <td colspan="2" class="text-end font-weight-bold">Subtotal</td>
                            <td class="text-end text-success" style="font-weight: 700;">৳{{ number_format($orders->subTotal - $orders->deliveryCharge + ($orders->discountCharge ?? 0), 0) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end">Delivery charge</td>
                            <td class="text-end text-success" style="font-weight: 700;">৳{{ $orders->deliveryCharge }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end">Discount</td>
                            <td class="text-end text-success" style="font-weight: 700;">৳{{ $orders->discountCharge ?? 0 }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end font-weight-bold" style="font-size: 16px;">Total</td>
                            <td class="text-end text-success" style="font-size: 16px; font-weight: 700;">৳{{ number_format($orders->subTotal, 0) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
            <div class="text-center mt-3" style="font-size: 12px; color: #888;">
                {{ env('APP_NAME') }} সবসময় নিশ্চিত করে ১০০% খাঁটি ও প্রাকৃতিক পণ্য, নিরাপদ প্যাকেজিং এবং সময়মতো ডেলিভারি।
            </div>
        </div>
        @endif

    </div>
</div>

<!-- OTP Modal -->
@if($show_reconfirm)
<div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content otp-modal-content">
      <div class="modal-header otp-modal-header">
        <h5 class="modal-title otp-modal-title" id="otpModalLabel"><i class="fas fa-mobile-alt"></i> OTP যাচাই করুন</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position: absolute; right: 20px; top: 20px;"></button>
      </div>
      <div class="modal-body otp-modal-body">
        <p style="color: #666; font-size: 14px;">আপনার মোবাইলে পাঠানো ৬ ডিজিটের কোডটি লিখুন</p>
        
        <div id="otpErrorMsg" class="alert alert-danger" style="display: none; padding: 8px; font-size: 13px;"></div>

        <form id="ajaxOtpForm">
            @csrf
            <input type="hidden" name="order_id" value="{{ $orders->id }}">
            <input type="hidden" name="otp" id="otpHiddenModal">
            
            <div class="otp-inputs">
                @for($i = 1; $i <= 6; $i++)
                    <input type="text" class="otp-box modal-otp-box" maxlength="1" inputmode="numeric" pattern="[0-9]" autocomplete="off">
                @endfor
            </div>
            
            <button type="submit" class="btn-verify" id="ajaxVerifyBtn">
                <span id="ajaxBtnText"><i class="fas fa-check-circle"></i> নিশ্চিত করুন</span>
                <span id="ajaxBtnSpinner" style="display:none;"><i class="fas fa-spinner fa-spin"></i></span>
            </button>
        </form>
        
        <div class="mt-3" style="font-size: 13px; color: #888;">
            SMS পাননি? <button class="btn btn-link p-0 text-success" id="ajaxResendBtn" style="font-weight: 600; text-decoration: none;" onclick="resendOtpAjax()">পুনরায় পাঠান</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    const mBoxes = document.querySelectorAll('.modal-otp-box');
    const mHidden = document.getElementById('otpHiddenModal');

    mBoxes.forEach((box, idx) => {
        box.addEventListener('input', (e) => {
            const val = e.target.value.replace(/\D/g, '');
            e.target.value = val;
            if (val.length === 1 && idx < mBoxes.length - 1) mBoxes[idx + 1].focus();
            updateModalHidden();
        });
        box.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && !e.target.value && idx > 0) {
                mBoxes[idx - 1].focus();
                mBoxes[idx - 1].value = '';
                updateModalHidden();
            }
        });
    });

    function updateModalHidden() {
        mHidden.value = Array.from(mBoxes).map(b => b.value).join('');
    }

    function forceUnlockScroll() {
        document.body.classList.remove('modal-open');
        document.body.style.overflow = '';
        document.body.style.paddingRight = '';
        document.documentElement.style.overflow = '';
        document.documentElement.style.paddingRight = '';
        document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
    }

    document.getElementById('ajaxOtpForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const otp = mHidden.value;
        if(otp.length < 6) {
            showError('অনুগ্রহ করে ৬ সংখ্যার OTP দিন।');
            return;
        }
        
        document.getElementById('ajaxBtnText').style.display = 'none';
        document.getElementById('ajaxBtnSpinner').style.display = 'inline-block';
        document.getElementById('ajaxVerifyBtn').disabled = true;
        document.getElementById('otpErrorMsg').style.display = 'none';

        fetch("{{ route('otp.verify') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ order_id: {{ $orders->id }}, otp: otp })
        })
        .then(r => r.json())
        .then(data => {
            if(data.status === 'success') {
                var myModalEl = document.getElementById('otpModal');
                var modal = bootstrap.Modal.getInstance(myModalEl);

                // Wait for Bootstrap's hide animation to finish, THEN clean up
                myModalEl.addEventListener('hidden.bs.modal', function() {
                    forceUnlockScroll();
                    document.getElementById('reconfirmSection').style.display = 'none';
                    document.getElementById('successVerifiedSection').style.display = 'block';
                }, { once: true });

                if (modal) {
                    modal.hide();
                } else {
                    // Fallback if modal wasn't initialized via JS
                    myModalEl.classList.remove('show');
                    myModalEl.setAttribute('aria-hidden', 'true');
                    myModalEl.style.display = 'none';
                    forceUnlockScroll();
                    document.getElementById('reconfirmSection').style.display = 'none';
                    document.getElementById('successVerifiedSection').style.display = 'block';
                }

                // Safety net — runs after Bootstrap's 300ms hide animation
                setTimeout(forceUnlockScroll, 500);

                // Show success toast (if toastr is available)
                if(typeof toastr !== 'undefined') toastr.success(data.message);
            } else {
                showError(data.message);
                resetBtn();
            }
        })
        .catch(err => {
            showError('কোথাও কোনো সমস্যা হয়েছে। আবার চেষ্টা করুন।');
            resetBtn();
        });
    });

    function showError(msg) {
        const errEl = document.getElementById('otpErrorMsg');
        errEl.textContent = msg;
        errEl.style.display = 'block';
    }

    function resetBtn() {
        document.getElementById('ajaxBtnText').style.display = 'inline-block';
        document.getElementById('ajaxBtnSpinner').style.display = 'none';
        document.getElementById('ajaxVerifyBtn').disabled = false;
        mBoxes.forEach(b => b.value = '');
        mBoxes[0].focus();
        updateModalHidden();
    }

    let otpSentOnce = false;

    function triggerReconfirmOtp() {
        const btn = document.getElementById('btnReconfirmOrder');
        const btnIcon = document.getElementById('reconfirmBtnIcon');
        const btnSpinner = document.getElementById('reconfirmBtnSpinner');
        const btnText = document.getElementById('reconfirmBtnText');

        if (otpSentOnce) {
            var myModalEl = document.getElementById('otpModal');
            var myModal = bootstrap.Modal.getOrCreateInstance(myModalEl);
            myModal.show();
            setTimeout(() => {
                if (mBoxes.length > 0) mBoxes[0].focus();
            }, 400);
            return;
        }

        btn.disabled = true;
        if(btnIcon) btnIcon.style.display = 'none';
        if(btnSpinner) btnSpinner.style.display = 'inline-block';
        if(btnText) btnText.textContent = 'OTP পাঠানো হচ্ছে...';

        fetch("{{ route('otp.resend') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ order_id: {{ $orders->id }} })
        })
        .then(r => r.json())
        .then(data => {
            btn.disabled = false;
            if(btnIcon) btnIcon.style.display = 'inline-block';
            if(btnSpinner) btnSpinner.style.display = 'none';
            if(btnText) btnText.textContent = 'Re-Confirm Order';

            if(data.status === 'already_verified') {
                document.getElementById('reconfirmSection').style.display = 'none';
                document.getElementById('successVerifiedSection').style.display = 'block';
                if(typeof toastr !== 'undefined') toastr.success('অর্ডার আগেই নিশ্চিত হয়েছে!');
                return;
            }

            otpSentOnce = true;

            var myModalEl = document.getElementById('otpModal');
            var myModal = bootstrap.Modal.getOrCreateInstance(myModalEl);
            myModal.show();

            const errEl = document.getElementById('otpErrorMsg');
            if (errEl) errEl.style.display = 'none';

            setTimeout(() => {
                if (mBoxes.length > 0) mBoxes[0].focus();
            }, 400);

            if(typeof toastr !== 'undefined') {
                toastr.success('আপনার মোবাইলে ৬ ডিজিটের OTP পাঠানো হয়েছে!');
            }
        })
        .catch(err => {
            btn.disabled = false;
            if(btnIcon) btnIcon.style.display = 'inline-block';
            if(btnSpinner) btnSpinner.style.display = 'none';
            if(btnText) btnText.textContent = 'Re-Confirm Order';

            var myModalEl = document.getElementById('otpModal');
            var myModal = bootstrap.Modal.getOrCreateInstance(myModalEl);
            myModal.show();
        });
    }

    function resendOtpAjax() {
        const rBtn = document.getElementById('ajaxResendBtn');
        rBtn.disabled = true;
        rBtn.textContent = 'পাঠানো হচ্ছে...';
        
        fetch("{{ route('otp.resend') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ order_id: {{ $orders->id }} })
        })
        .then(r => r.json())
        .then(data => {
            otpSentOnce = true;
            rBtn.textContent = 'পাঠানো হয়েছে!';
            rBtn.style.color = '#2e7d32';
            if(typeof toastr !== 'undefined') {
                toastr.success('আপনার মোবাইলে পুনরায় OTP পাঠানো হয়েছে!');
            }
            setTimeout(() => {
                rBtn.disabled = false;
                rBtn.textContent = 'পুনরায় পাঠান';
                rBtn.style.color = '';
            }, 30000);
        })
        .catch(err => {
            rBtn.disabled = false;
            rBtn.textContent = 'পুনরায় পাঠান';
            rBtn.style.color = '';
        });
    }
</script>
@endif


    <?php 
        $rawPhone = $orders->customers->customerPhone;
        $phone = preg_replace('/\D/', '', $rawPhone);
        if (strlen($phone) == 11 && strpos($phone, '01') === 0) {
            $phone = '88' . $phone;
        }
        $hashedPhone = hash('sha256', $phone);
        $hashedName = hash('sha256', strtolower(trim($orders->customers->customerName)));
    ?>
    <script>
    // Purchase event handled by GTM Partner Integration + sGTM

    // Clear the previous ecommerce object.
    dataLayer.push({ ecommerce: null });

    // Push the begin_checkout event to dataLayer.
    dataLayer.push({
        event: "purchase", 
        ecommerce: { 
            currency: "BDT",  
            value: Number("<?php echo $orders->subTotal ?>"),
            shipping: "<?php echo $orders->deliveryCharge ?>",
            tax:0,
            coupon:"",
            affiliation:"", 
            external_id :"<?php echo $orders->id ?>",
            transaction_id:"<?php echo 'TRX45324'.$orders->id ?>", 
            user_data: {
                phone: "<?php echo $hashedPhone ?>",
                first_name: "<?php echo $hashedName ?>"
            },
            items: [@foreach ($products as $cartInfo)
                {
                    item_name: "{{$cartInfo->productName ?? $cartInfo->name}}",
                    item_id: "{{$cartInfo->product_id ?? $cartInfo->id}}",
                    price: Number("{{$cartInfo->productPrice ?? $cartInfo->price}}"),  
                    item_size: "{{$cartInfo->size ?? ($cartInfo->options['size'] ?? '')}}",
                    item_color: "{{$cartInfo->color ?? ($cartInfo->options['color'] ?? '')}}",
                    currency: "BDT",
                    quantity: {{$cartInfo->quantity ?? ($cartInfo->qty ?? 0)}}
                },
            @endforeach],
            more:[
                {
                    Customer_Name:"<?php echo $orders->customers->customerName ?>", 
                    Customer_Address:"<?php echo $orders->customers->customerAddress ?>", 
                    Customer_Phone_Number:"<?php echo $orders->customers->customerPhone ?>", 
                    Customer_Country:'Bangladesh', 
                    Customer_Visitor_ID :"<?php echo $orders->customers->id ?>", 
                    payment_method:"Cash On Delivery", 
                }
            ]
        }
    });
    </script>

<style>
    .process-steps {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .process-steps li {
        width: 25%;
        float: left;
        text-align: center;
        position: relative;
    }

    .process-steps li .icon {
        height: 30px;
        width: 30px;
        margin: auto;
        background: #fff;
        border-radius: 50%;
        line-height: 30px;
        font-size: 14px;
        font-weight: 700;
        color: #adadad;
        position: relative;
    }

    .process-steps li .title {
        font-weight: 600;
        font-size: 13px;
        color: #777;
        margin-top: 8px;
        margin-bottom: 0;
    }

    .process-steps li+li:after {
        position: absolute;
        content: "";
        height: 3px;
        width: calc(100% - 30px);
        background: #fff;
        top: 14px;
        z-index: 0;
        right: calc(50% + 15px);
    }

    .breadcrumb {
        padding: 5px 0;
        border-bottom: 1px solid #e9e9e9;
        background-color: #fafafa;
    }

    .search-area .search-button {
        border-radius: 0px 3px 3px 0px;
        display: inline-block;
        float: left;
        margin: 0px;
        padding: 5px 15px 6px;
        text-align: center;
        background-color: #e62e04;
        border: 1px solid #e62e04;
    }

    .search-area .search-button:after {
        color: #fff;
        content: "\f002";
        font-family: fontawesome;
        font-size: 16px;
        line-height: 9px;
        vertical-align: middle;
    }
</style>

<script>
    // Ensure body scroll is never locked on order received page
    document.addEventListener('DOMContentLoaded', function() {
        document.body.classList.remove('modal-open');
        document.body.style.overflow = '';
        document.body.style.paddingRight = '';
        document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
    });
</script>

@endsection
