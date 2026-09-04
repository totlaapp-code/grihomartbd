@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }} - অর্ডার সংক্রান্ত তথ্য
@endsection

<div class="container py-4 py-md-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm rounded-3 text-center p-3 p-sm-4" style="background: #ffffff; border: 1px solid #e2e8f0;">
                <div class="card-body p-2 p-sm-3">
                    <div class="mb-3 d-inline-flex align-items-center justify-content-center" style="width: 72px; height: 72px; border-radius: 50%; background: #fef3c7;">
                        <img src="{{ asset('warning.png') }}" alt="Warning" style="width: 44px; height: auto;">
                    </div>
                    <h2 class="h5 mb-3 fw-bold" style="color: #dc2626; line-height: 1.6;">
                        দুঃখিত, আপনার পূর্ববর্তী অর্ডার আমরা ইতিমধ্যে রিসিভ করেছি।
                    </h2>
                    <p class="text-muted mb-4" style="font-size: 14.5px; line-height: 1.6;">
                        অনুগ্রহপূর্বক অপেক্ষা করুন, আমাদের কাস্টমার কেয়ার প্রতিনিধি খুব শীঘ্রই আপনাকে কল করে আপনার অর্ডারটি কনফার্ম করবেন।
                    </p>
                    <a href="{{ url('/') }}" class="btn btn-primary px-4 py-2" style="border-radius: 25px; font-weight: 500; font-size: 14px;">
                        <i class="fas fa-home me-1"></i> হোমপেজে যান
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
