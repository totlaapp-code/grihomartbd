@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Basicinfo
@endsection

<div class="container-fluid pt-4 px-4">
    <div class="row">

        <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4" style="text-align: center;color:red">Website Basic Information Update</h2>
                <form action="{{ route('admin.basicinfos.update', $webinfo->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" value="{{ $webinfo->email }}"
                                    id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="phone_one"
                                    value="{{ $webinfo->phone_one }}" id="floatingPassword" placeholder="Phone One">
                                <label for="floatingPassword">Phone One</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="phone_two"
                                    value="{{ $webinfo->phone_two }}" id="floatingPassword" placeholder="Phone Two">
                                <label for="floatingPassword">Phone Two</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="wp_1"
                                    value="{{ $webinfo->wp_1 }}" id="floatingPassword" placeholder="Whats App One">
                                <label for="floatingPassword">Whats App One</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="wp_2"
                                    value="{{ $webinfo->wp_2 }}" id="floatingPassword" placeholder="Whats App Two">
                                <label for="floatingPassword">Whats App Two</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="messanger"
                                    value="{{ $webinfo->messanger }}" id="floatingPassword" placeholder="Messanger Link">
                                <label for="floatingPassword">Messanger Link</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="imo"
                                    value="{{ $webinfo->imo }}" id="floatingPassword" placeholder="Imo">
                                <label for="floatingPassword">Imo</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Office Address" name="address" id="floatingTextarea" style="height: 100px;">{{ $webinfo->address }}</textarea>
                                <label for="floatingTextarea">Office Address</label>
                            </div>
                             <div class="mb-3">
                                <input class="form-control form-control-lg bg-dark" name="favicon" id="favicon"
                                    type="file">
                            </div>
                            <div class="m-3 ms-0" style="text-align: center;height: 85px;margin-top:50px !important">
                                <h4 style="width:30%;float: left;text-align: left;">FAV ICON : </h4>
                                <img src="{{ asset($webinfo->favicon) }}" alt="" srcset=""
                                    style="max-height: 100px;">
                            </div>
                             <div class="mb-3">
                                <input class="form-control form-control-lg bg-dark" name="page_image" id="page_image"
                                    type="file">
                            </div>
                            <div class="m-3 ms-0" style="text-align: center;height: 85px;margin-top:50px !important">
                                <h4 style="width:30%;float: left;text-align: left;">Page Image : </h4>
                                <img src="{{ asset($webinfo->page_image) }}" alt="" srcset=""
                                    style="max-height: 100px;">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="bk"
                                    value="{{ $webinfo->bk }}" id="floatingPassword" placeholder="Bkash Account">
                                <label for="floatingPassword">Bkash Account</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="ng"
                                    value="{{ $webinfo->ng }}" id="floatingPassword" placeholder="Nagad Account">
                                <label for="floatingPassword">Nagad Account</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="dbbl"
                                    value="{{ $webinfo->dbbl }}" id="floatingPassword" placeholder="DBBL Account">
                                <label for="floatingPassword">DBBL Account</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="usd_rate"
                                    value="{{ $webinfo->usd_rate }}" id="floatingPassword" placeholder="Phone Two">
                                <label for="floatingPassword">1 USD TO BDT</label>
                            </div>
                            <div class="mb-3">
                                <input class="form-control form-control-lg bg-dark" name="logo" id="formFileLg"
                                    type="file">
                            </div>
                            <div class="m-3 ms-0" style="text-align: center;height: 85px;margin-top:50px !important">
                                <h4 style="width:30%;float: left;text-align: left;">LOGO : </h4>
                                <img src="{{ asset($webinfo->logo) }}" alt="" srcset=""
                                    style="max-height: 100px;">
                            </div>
                            <div class="mb-3">
                                <lable>Vat Status</lable>
                                <select name="vat_status" id="vat_status" required
                                    class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                    @if ($webinfo->vat_status == 'On')
                                        <option value="On" selected>On</option>
                                        <option value="Off">Off</option>
                                    @else
                                        <option value="On">On</option>
                                        <option value="Off" selected>Off</option>
                                    @endif

                                </select>
                            </div>
                            <div class="mb-3">
                                <lable>Choose Courier</lable>
                                <select name="courier" id="courier" required
                                    class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                    @if ($webinfo->courier == '1')
                                        <option value="1" selected>Grihomart BD Courier</option>
                                        <option value="2">Grihomart BD World Courier</option>
                                    @else
                                        <option value="1">Grihomart BD Courier</option>
                                        <option value="2" selected>Grihomart BD World Courier</option>
                                    @endif

                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="vat"
                                    value="{{ $webinfo->vat }}" id="floatingPassword" placeholder="Vat">
                                <label for="floatingPassword">Vat (%)</label>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4" style="text-align: center;color:red">Shipping Information Update</h2>
                <form action="{{ route('admin.shipping.update', $webinfo->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="inside_dhaka_charge"
                                    value="{{ $webinfo->inside_dhaka_charge }}" id="inside_dhaka_charge"
                                    placeholder="Inside Dhaka Charge">
                                <label for="floatingInput">Inside Dhaka Charge</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="outside_dhaka_charge"
                                    value="{{ $webinfo->outside_dhaka_charge }}" id="outside_dhaka_charge"
                                    placeholder="Outside Dhaka Charge">
                                <label for="floatingPassword">Outside Dhaka Charge</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="insie_dhaka"
                                    value="{{ $webinfo->insie_dhaka }}" id="insie_dhaka"
                                    placeholder="Inside Dhaka Delivery Time">
                                <label for="floatingPassword">Inside Dhaka Delivery Time</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="outside_dhaka"
                                    value="{{ $webinfo->outside_dhaka }}" id="outside_dhaka"
                                    placeholder="Outside Dhaka Delivery Time">
                                <label for="floatingPassword">Outside Dhaka Delivery Time</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="contact"
                                    value="{{ $webinfo->contact }}" id="contact" placeholder="Contact Info">
                                <label for="floatingInput">Contact Info</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="refund_rule"
                                    value="{{ $webinfo->refund_rule }}" id="refund_rule" placeholder="Refund Rules">
                                <label for="floatingPassword">Refund Rules</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="cash_on_delivery" id="cash_on_delivery" required
                                    class="form-select bg-white text-dark" aria-label="Cash on Delivery">
                                    @if ($webinfo->cash_on_delivery == 'ON')
                                        <option value="ON" selected>ON</option>
                                        <option value="OFF">OFF</option>
                                    @else
                                        <option value="ON">ON</option>
                                        <option value="OFF" selected>OFF</option>
                                    @endif
                                </select>
                                <label for="cash_on_delivery">Cash on Delivery</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select name="otp_system" id="otp_system" required
                                    class="form-select bg-white text-dark" aria-label="OTP System">
                                    @if ($webinfo->otp_system == 'ON')
                                        <option value="ON" selected>ON</option>
                                        <option value="OFF">OFF</option>
                                    @else
                                        <option value="ON">ON</option>
                                        <option value="OFF" selected>OFF</option>
                                    @endif
                                </select>
                                <label for="otp_system">OTP Verification System</label>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4" style="text-align: center;color:red">Pixel & Analytics</h2>
                <form action="{{ url('/admin/pixel/analytics', $webinfo->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-2">
                                <textarea class="form-control" placeholder="Facebook Pixel" name="facebook_pixel" id="floatingTextarea"
                                    style="height: 120px;" disabled readonly>{{ $webinfo->facebook_pixel }}</textarea>
                                <label for="floatingTextarea">Facebook Pixel (Managed via .env)</label>
                            </div>
                            <small class="text-warning d-block mb-3">⚡ Active via Server-side CAPI & .env (Disabled to prevent duplicate tracking)</small>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-2">
                                <textarea class="form-control" placeholder="Google Analytics" name="google_analytics" id="floatingTextarea"
                                    style="height: 120px;" disabled readonly>{{ $webinfo->google_analytics }}</textarea>
                                <label for="floatingTextarea">Google Analytics (Managed via .env)</label>
                            </div>
                            <small class="text-warning d-block mb-3">⚡ Active via GTM & .env configuration</small>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Marquee Text" name="marquee_text" id="marquee_text"
                                    style="height: 100px;">{{ $webinfo->marquee_text }}</textarea>
                                <label for="floatingTextarea">Marquee Text</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Chatbox Script" name="chat_box" id="chat_box"
                                    style="height: 100px;">{{ $webinfo->chat_box }}</textarea>
                                <label for="floatingTextarea">Chatbox Script</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Footer Text" name="footer_text" id="footer_text"
                                    style="height: 100px;">{{ $webinfo->footer_text }}</textarea>
                                <label for="floatingTextarea">Footer Text</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-3 text-center text-danger">
                    <i class="fas fa-shield-alt me-2"></i>ডুপ্লিকেট অর্ডার সিকিউরিটি (Duplicate Order Protection)
                </h2>
                
                <div class="alert alert-info py-2 px-3 mb-4" style="font-size: 13.5px; border-left: 4px solid #0dcaf0; background: #e8f4f8; color: #1e3a5f;">
                    <i class="fas fa-info-circle text-primary me-2"></i>
                    একই কাস্টমার ফোন নম্বর অথবা একই আইপি/ডিভাইস থেকে নির্ধারিত সময়ের মধ্যে বারবার ফেইক বা ডাবল অর্ডার রোধ করার সিস্টেম।
                    <strong>পূর্ববর্তী অর্ডারটি Cancel বা Delivered হয়ে গেলে কাস্টমার পুনরায় নতুন অর্ডার করতে পারবেন।</strong>
                </div>

                <form action="{{ route('admin.order_security.update') }}" method="POST">
                    @csrf
                    <div class="row align-items-center g-3">
                        <div class="col-md-5 col-lg-4">
                            <div class="card p-3 border shadow-sm" style="background: #ffffff;">
                                <label class="form-label fw-bold text-dark mb-2">
                                    <i class="fas fa-toggle-on text-primary me-1"></i> সিকিউরিটি স্ট্যাটাস:
                                </label>
                                <div class="form-check form-switch m-0 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" name="duplicate_order_check" value="ON" id="duplicate_order_check" 
                                           style="width: 48px; height: 25px; cursor: pointer;"
                                           {{ $orderSecurityStatus == 'ON' ? 'checked' : '' }}
                                           onchange="const l = document.getElementById('secStatusLabel'); l.textContent = this.checked ? 'Active (চালু)' : 'Disabled (বন্ধ)'; l.className = this.checked ? 'badge bg-success ms-2' : 'badge bg-danger ms-2';">
                                    <span id="secStatusLabel" class="badge {{ $orderSecurityStatus == 'ON' ? 'bg-success' : 'bg-danger' }} ms-2" style="font-size: 13px; font-weight: 600;">
                                        {{ $orderSecurityStatus == 'ON' ? 'Active (চালু)' : 'Disabled (বন্ধ)' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-lg-5">
                            <div class="card p-3 border shadow-sm" style="background: #ffffff;">
                                <label class="form-label fw-bold text-dark mb-2">
                                    <i class="fas fa-clock text-primary me-1"></i> রেস্ট্রিকশন লক টাইম:
                                </label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="duplicate_order_hours" value="{{ $orderSecurityHours }}" min="1" max="720" required placeholder="24" style="font-weight: 600; font-size: 15px;">
                                    <span class="input-group-text bg-light text-dark fw-bold">ঘণ্টা (Hours)</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-lg-3">
                            <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold py-3" style="font-size: 15px;">
                                <i class="fas fa-save me-1"></i> আপডেট করুন
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4" style="text-align: center;color:red">Social Links Update</h2>
                <form action="{{ url('/admin/basicinfo/update', $webinfo->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="facebook"
                                    value="{{ $webinfo->facebook }}" id="floatingInput"
                                    placeholder="https://www.facebook.com/">
                                <label for="floatingInput">Facebook</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="twitter"
                                    value="{{ $webinfo->twitter }}" id="floatingInput"
                                    placeholder="https://www.google.com/maps">
                                <label for="floatingInput">Google Maps</label>
                            </div> 
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="pinterest"
                                    value="{{ $webinfo->pinterest }}" id="floatingInput"
                                    placeholder="https://www.tiktok.com/">
                                <label for="floatingInput">Tiktok</label>
                            </div>
                        </div>
                        <div class="col-lg-6"> 
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="linkedin"
                                    value="{{ $webinfo->linkedin }}" id="floatingInput"
                                    placeholder="https://www.instagram.com/">
                                <label for="floatingInput">Instagram</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="youtube"
                                    value="{{ $webinfo->youtube }}" id="floatingInput"
                                    placeholder="https://www.Youtube.com/">
                                <label for="floatingInput">Youtube</label>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12 mt-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4" style="text-align: center;color:red">Facebook Catalog</h2>
                <div class="text-center">
                    <p class="text-white mb-3">Facebook Product Catalog CSV ডাউনলোড করুন এবং Facebook Business Manager এ আপলোড করুন।</p>
                    <a href="{{ url('facebook-catalog') }}" target="_blank" class="btn btn-primary btn-lg">
                        <i class="fa fa-download me-2"></i> Download Facebook Catalog CSV
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
