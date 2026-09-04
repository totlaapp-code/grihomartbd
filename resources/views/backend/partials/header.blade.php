@php
$admin=App\Models\Admin::where('id',Auth::guard('admin')->user()->id)->first();
@endphp
<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-2 px-sm-3 py-0" style="min-height:50px;">
    {{-- Sidebar Toggler --}}
    <a href="#" class="sidebar-toggler flex-shrink-0 text-white" style="font-size:17px; text-decoration:none; padding: 0 8px; line-height:50px;" title="Toggle Sidebar">
        <i class="fa fa-bars"></i>
    </a>
    {{-- Logo for mobile only --}}
    <a href="{{ url('/admin/dashboard') }}" class="navbar-brand d-lg-none d-flex align-items-center" style="padding: 4px 0; margin:0 4px;">
        <img src="{{ asset(App\Models\Basicinfo::first()->logo) }}" alt="Logo" style="max-height: 28px; width: auto; max-width: 130px; object-fit: contain;">
    </a>
    {{-- Desktop nav buttons --}}
    <div class="d-none d-lg-flex ms-3 align-items-center gap-2 flex-wrap">
        <a target="_blank" href="{{url('/')}}" class="btn btn-info btn-sm">View Website</a>
        <a target="_blank" href="{{url('admin/user/report')}}" class="btn btn-warning btn-sm">User Order</a>
        <a target="_blank" href="{{url('/admin/stock/overview')}}" class="btn btn-success btn-sm">Inventory</a>
        <a target="_blank" href="{{url('/complain/Pending')}}" class="btn btn-danger btn-sm">Complain</a>
        <a target="_blank" href="{{url('admin/tasks')}}" class="btn btn-warning btn-sm">My Task</a>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Send Message</button>
    </div>
    {{-- Right side: SMS Balance + Profile --}}
    <div class="navbar-nav align-items-center ms-auto d-flex flex-row gap-1 gap-sm-2">

        @php
            $smsBalance = \App\Services\SmsNetBdService::getBalance();
        @endphp
        @if($smsBalance !== null)
        <div class="nav-item">
            <a href="{{ route('admin.sms_templates') }}" class="btn btn-sm d-flex align-items-center" 
               style="font-weight: 600; font-size: 11px; border-radius: 20px; padding: 3px 8px; 
               background: {{ $smsBalance < 50 ? '#f8d7da' : '#e8f5e9' }}; 
               color: {{ $smsBalance < 50 ? '#842029' : '#1b5e20' }}; 
               border: 1px solid {{ $smsBalance < 50 ? '#f5c2c7' : '#c8e6c9' }}; white-space: nowrap;" 
               title="SMS Balance">
                <i class="fas fa-comment-dots me-1" style="color: {{ $smsBalance < 50 ? '#dc3545' : '#2e7d32' }}; font-size: 11px;"></i> 
                <span class="d-none d-sm-inline">SMS: </span>৳{{ number_format($smsBalance, 2) }}
                @if($smsBalance < 50)
                    <span class="badge bg-danger text-white ms-1" style="font-size: 9px; padding: 2px 4px;">Low!</span>
                @endif
            </a>
        </div>
        @endif

        {{-- Mobile Quick Actions Dropdown --}}
        <div class="nav-item dropdown d-lg-none">
            <a href="#" class="btn btn-sm d-flex align-items-center justify-content-center" 
               data-bs-toggle="dropdown" 
               aria-expanded="false"
               style="width: 30px; height: 30px; border-radius: 50%; background: rgba(0,0,0,0.25); border: 1px solid rgba(255,255,255,0.18); color: #ecc94b; text-decoration:none;" 
               title="Quick Actions">
                <i class="fas fa-bolt" style="font-size: 13px;"></i>
            </a>
            <div class="dropdown-menu admin-dropdown dropdown-menu-end border-0 rounded-3 shadow mt-2 py-2" 
                 style="background:#2d3748; min-width: 185px;">
                <div class="px-3 py-1 text-muted text-uppercase" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px; color: #a0aec0 !important;">Quick Links</div>
                <a target="_blank" href="{{url('/')}}" class="dropdown-item py-1.5"><i class="fas fa-globe me-2" style="color: #63b3ed;"></i>Website</a>
                <a target="_blank" href="{{url('admin/user/report')}}" class="dropdown-item py-1.5"><i class="fas fa-shopping-bag me-2" style="color: #f6ad55;"></i>User Orders</a>
                <a target="_blank" href="{{url('/admin/stock/overview')}}" class="dropdown-item py-1.5"><i class="fas fa-boxes me-2" style="color: #68d391;"></i>Inventory</a>
                <a target="_blank" href="{{url('/complain/Pending')}}" class="dropdown-item py-1.5"><i class="fas fa-exclamation-triangle me-2" style="color: #fc8181;"></i>Complain</a>
                <a target="_blank" href="{{url('admin/tasks')}}" class="dropdown-item py-1.5"><i class="fas fa-tasks me-2" style="color: #ecc94b;"></i>My Tasks</a>
                <div class="dropdown-divider" style="border-color:#4a5568;"></div>
                <a href="#" class="dropdown-item py-1.5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-paper-plane me-2" style="color: #90cdf4;"></i>Send Message
                </a>
            </div>
        </div>

        <div class="nav-item dropdown">
            <a href="#" 
               class="profile-btn d-flex align-items-center"
               data-bs-toggle="dropdown" 
               aria-expanded="false"
               style="text-decoration:none; cursor:pointer; padding: 3px 6px 3px 3px; background:rgba(0,0,0,0.25); border-radius:30px; gap:6px; border:1px solid rgba(255,255,255,0.15);">
                @php
                    $profileSrc = isset($admin->profile) && $admin->profile
                        ? asset(str_replace('public/', '', $admin->profile))
                        : asset('user.jpg');
                @endphp
                <img class="rounded-circle" 
                     src="{{ $profileSrc }}" 
                     alt="{{ $admin->name ?? 'Admin' }}"
                     style="width: 30px; height: 30px; object-fit: cover; border: 2px solid rgba(255,255,255,0.5);"
                     onerror="this.src='{{ asset('user.jpg') }}'">
                <span class="d-none d-lg-inline" style="color:#f0f4f8; font-size:13px; font-weight:600; max-width:120px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">{{ Auth::user()->name }}</span>
                <i class="fas fa-chevron-down d-none d-lg-inline pe-1" style="color:#a0aec0; font-size:10px;"></i>
            </a>
            <div class="dropdown-menu admin-dropdown dropdown-menu-end border-0 rounded-2 shadow mt-2" 
                 style="background:#2d3748; min-width:165px;">
                <a href="{{url('admin/my/profile')}}" class="dropdown-item"><i class="fas fa-user-circle me-2" style="color:#90cdf4;"></i>My Profile</a>
                <a href="{{url('admin/account/settings')}}" class="dropdown-item"><i class="fas fa-cog me-2" style="color:#68d391;"></i>Settings</a>
                <div class="dropdown-divider" style="border-color:#4a5568;"></div>
                <a href="{{ route('admin.logout') }}" class="dropdown-item logout-item"><i class="fas fa-sign-out-alt me-2"></i>Log Out</a>
            </div>
        </div>
    </div>
</nav>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Write Here</h5>
        <button type="button" class="close" style="border:none" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" method="POST" id="sendMessage">
            @csrf
            <div class="form-group">
                <lable>Phone</lable>
                <input type="text" name="phone" id="smsphone" class="form-control">
            </div>
            <div class="form-group mb-3">
                <lable>Messages</lable>
                <textarea class="form-control" name="textmessage" id="textmessage" rows="3"></textarea>
            </div>
            <button type="button" id="sendMessagebtn" class="btn btn-primary" style="float:right">Send</button>
        </form>
      </div>
 
    </div>
  </div>
</div>

<script>
    $(document).on('click', '#sendMessagebtn', function(e) {
        e.preventDefault();
         
        swal({
                title: "আপনি কি মেসেজ টি পাঠাতে চাচ্ছেন ?",
                text: "যদি Ok ক্লিক করেন তাহলে মেসেজটি চলে যাবে | সেটা ক্যানসেল করা যাবে না !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('admin/sendsms') }}",
                        data: {
                            phone: $('#smsphone').val(),
                            message: $('#textmessage').val(),
                        },
                        success: function(response) { 
                            var data = JSON.parse(response);
                            if (data["status"] == "success") {
                                $('#smsphone').val(''),
                                $('#textmessage').val(''),
                            
                                swal(data["message"]); 
                            } else {
                                if (data["status"] == "failed") {
                                    swal(data["message"]);
                                } else {
                                    swal("Something wrong ! Please try again.");
                                }
                            }
                        }
                    });


                } else {
                    swal("Your data is safe!");
                }
            });

    });

    $(document).ready(function() {
        // Sidebar toggler - no header text needed, sidebar handles its own state
        // Mobile logo is already shown in navbar-brand
    });
</script>
