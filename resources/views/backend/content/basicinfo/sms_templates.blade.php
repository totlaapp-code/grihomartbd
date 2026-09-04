@extends('backend.master')

@section('maincontent')
@section('title')
    GrihomartBD - SMS Templates
@endsection
    <div class="container-fluid pt-2 pt-sm-3 px-1 px-sm-3 px-md-4">
        <div class="row g-2 g-md-4">
            <div class="col-12 mb-3">
                <div class="bg-secondary rounded p-2 p-sm-3 p-md-4">
                    <h4 class="mb-3 text-center text-danger fw-bold" style="font-size: clamp(1.15rem, 3.5vw, 1.5rem);">
                        <i class="fas fa-sms me-2"></i>SMS Templates Management
                    </h4>
                    @if (session('message'))
                        <div class="alert alert-success py-2 px-3" style="font-size: 13.5px;">
                            <i class="fas fa-check-circle me-1"></i> {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.sms_templates.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">

                                {{-- OTP Template --}}
                                <div class="card mb-3 border-0 shadow-sm">
                                    <div class="card-header bg-primary text-white fw-bold d-flex justify-content-between align-items-center flex-wrap gap-2 py-2 px-3">
                                        <span style="font-size: 13.5px;"><i class="fas fa-key me-2"></i> OTP SMS Template</span>
                                        <div class="form-check form-switch m-0 d-flex align-items-center">
                                            <input class="form-check-input sms-toggle" type="checkbox" name="sms_status_otp" value="ON" id="switchOtp" {{ ($statuses['otp'] ?? 'ON') == 'ON' ? 'checked' : '' }}>
                                            <label class="form-check-label text-white ms-2" for="switchOtp" style="font-size: 12.5px; font-weight: 600;">
                                                {{ ($statuses['otp'] ?? 'ON') == 'ON' ? 'Active' : 'Disabled' }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="card-body p-2 p-sm-3">
                                        <p class="text-muted small mb-2" style="font-size: 12px;">
                                            <i class="fas fa-info-circle me-1"></i>
                                            ব্যবহারযোগ্য শর্টকোড:
                                            <code class="px-1 py-0.5 rounded bg-light">[invoice_id]</code> — নম্বর,
                                            <code class="px-1 py-0.5 rounded bg-light">[otp_code]</code> — OTP কোড
                                        </p>
                                        <textarea name="sms_template_otp" id="sms_template_otp" class="form-control" rows="3" style="font-size: 13px;" required>{{ $templates['otp'] }}</textarea>
                                    </div>
                                </div>

                                {{-- Confirmed Template --}}
                                <div class="card mb-3 border-0 shadow-sm">
                                    <div class="card-header bg-success text-white fw-bold d-flex justify-content-between align-items-center flex-wrap gap-2 py-2 px-3">
                                        <span style="font-size: 13.5px;"><i class="fas fa-check-circle me-2"></i> Order Confirmed SMS Template</span>
                                        <div class="form-check form-switch m-0 d-flex align-items-center">
                                            <input class="form-check-input sms-toggle" type="checkbox" name="sms_status_confirmed" value="ON" id="switchConfirmed" {{ ($statuses['confirmed'] ?? 'ON') == 'ON' ? 'checked' : '' }}>
                                            <label class="form-check-label text-white ms-2" for="switchConfirmed" style="font-size: 12.5px; font-weight: 600;">
                                                {{ ($statuses['confirmed'] ?? 'ON') == 'ON' ? 'Active' : 'Disabled' }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="card-body p-2 p-sm-3">
                                        <p class="text-muted small mb-2" style="font-size: 12px;">
                                            <i class="fas fa-info-circle me-1"></i>
                                            ব্যবহারযোগ্য শর্টকোড:
                                            <code class="px-1 py-0.5 rounded bg-light">[invoice_id]</code> — নম্বর,
                                            <code class="px-1 py-0.5 rounded bg-light">[sub_total]</code> — মোট বিল
                                        </p>
                                        <textarea name="sms_template_confirmed" id="sms_template_confirmed" class="form-control" rows="3" style="font-size: 13px;" required>{{ $templates['confirmed'] }}</textarea>
                                    </div>
                                </div>

                                {{-- Shipped Template --}}
                                <div class="card mb-3 border-0 shadow-sm">
                                    <div class="card-header bg-warning text-dark fw-bold d-flex justify-content-between align-items-center flex-wrap gap-2 py-2 px-3">
                                        <span style="font-size: 13.5px;"><i class="fas fa-truck me-2"></i> Order Shipped / Courier SMS Template</span>
                                        <div class="form-check form-switch m-0 d-flex align-items-center">
                                            <input class="form-check-input sms-toggle" type="checkbox" name="sms_status_shipped" value="ON" id="switchShipped" {{ ($statuses['shipped'] ?? 'ON') == 'ON' ? 'checked' : '' }}>
                                            <label class="form-check-label text-dark ms-2" for="switchShipped" style="font-size: 12.5px; font-weight: 600;">
                                                {{ ($statuses['shipped'] ?? 'ON') == 'ON' ? 'Active' : 'Disabled' }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="card-body p-2 p-sm-3">
                                        <p class="text-muted small mb-2" style="font-size: 12px;">
                                            <i class="fas fa-info-circle me-1"></i>
                                            ব্যবহারযোগ্য শর্টকোড:
                                            <code class="px-1 py-0.5 rounded bg-light">[invoice_id]</code> — নম্বর,
                                            <code class="px-1 py-0.5 rounded bg-light">[sub_total]</code> — মোট বিল,
                                            <code class="px-1 py-0.5 rounded bg-light">[tracking_link]</code> — ট্র্যাকিং লিংক
                                        </p>
                                        <textarea name="sms_template_shipped" id="sms_template_shipped" class="form-control" rows="3" style="font-size: 13px;" required>{{ $templates['shipped'] }}</textarea>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-danger btn-md w-100 py-2 fw-bold" style="font-size: 15px; border-radius: 8px;">
                                        <i class="fas fa-save me-2"></i> Update Templates
                                    </button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.form-check-input').forEach(function(el) {
            el.addEventListener('change', function() {
                const label = this.nextElementSibling;
                if (label) {
                    label.textContent = this.checked ? 'Active' : 'Disabled';
                }
            });
        });
    </script>

    <style>
        /* === SMS Toggle Switch — All three toggles === */
        .sms-toggle {
            width: 48px !important;
            height: 26px !important;
            cursor: pointer !important;
            /* Bootstrap SVG thumb is preserved via background-image */
        }
        /* Unchecked: gray track */
        .sms-toggle:not(:checked) {
            background-color: #868e96 !important;
            border-color: #868e96 !important;
        }
        /* OTP — Blue track when checked */
        #switchOtp:checked {
            background-color: #3b82f6 !important;
            border-color: #3b82f6 !important;
        }
        /* Confirmed — Green track when checked */
        #switchConfirmed:checked {
            background-color: #16a34a !important;
            border-color: #16a34a !important;
        }
        /* Shipped — Dark amber track when checked (visible on yellow bg) */
        #switchShipped:checked {
            background-color: #92400e !important;
            border-color: #92400e !important;
        }
    </style>
@endsection
