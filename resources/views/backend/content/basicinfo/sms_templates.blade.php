@extends('backend.master')

@section('title')GrihomartBD - SMS Templates@endsection

@section('maincontent')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12 mb-4">
                <div class="bg-secondary rounded h-100 p-4">
                    <h2 class="mb-4 text-center text-danger">SMS Templates Management</h2>
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.sms_templates.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">

                                {{-- OTP Template --}}
                                <div class="card mb-4 border-0 shadow-sm">
                                    <div class="card-header bg-primary text-white fw-bold">
                                        <i class="fas fa-key me-2"></i> OTP SMS Template
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted small mb-2">
                                            <i class="fas fa-info-circle me-1"></i>
                                            ব্যবহারযোগ্য শর্টকোড:
                                            <code>[invoice_id]</code> — অর্ডার নম্বর,
                                            <code>[otp_code]</code> — OTP কোড
                                        </p>
                                        <textarea name="sms_template_otp" id="sms_template_otp" class="form-control" rows="3" required>{{ $templates['otp'] }}</textarea>
                                    </div>
                                </div>

                                {{-- Confirmed Template --}}
                                <div class="card mb-4 border-0 shadow-sm">
                                    <div class="card-header bg-success text-white fw-bold">
                                        <i class="fas fa-check-circle me-2"></i> Order Confirmed SMS Template
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted small mb-2">
                                            <i class="fas fa-info-circle me-1"></i>
                                            ব্যবহারযোগ্য শর্টকোড:
                                            <code>[invoice_id]</code> — অর্ডার নম্বর,
                                            <code>[sub_total]</code> — মোট বিল
                                        </p>
                                        <textarea name="sms_template_confirmed" id="sms_template_confirmed" class="form-control" rows="3" required>{{ $templates['confirmed'] }}</textarea>
                                    </div>
                                </div>

                                {{-- Shipped Template --}}
                                <div class="card mb-4 border-0 shadow-sm">
                                    <div class="card-header bg-warning text-dark fw-bold">
                                        <i class="fas fa-truck me-2"></i> Order Shipped / Courier SMS Template
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted small mb-2">
                                            <i class="fas fa-info-circle me-1"></i>
                                            ব্যবহারযোগ্য শর্টকোড:
                                            <code>[invoice_id]</code> — অর্ডার নম্বর,
                                            <code>[sub_total]</code> — মোট বিল,
                                            <code>[tracking_link]</code> — ট্র্যাকিং লিংক
                                        </p>
                                        <textarea name="sms_template_shipped" id="sms_template_shipped" class="form-control" rows="3" required>{{ $templates['shipped'] }}</textarea>
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <button type="submit" class="btn btn-danger btn-lg w-100">
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
@endsection
