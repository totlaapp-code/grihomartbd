<div class="bottom-navbar b-block d-lg-none" style="overflow: hidden;">
    <div class="container">
        <div class="row">
            <div class="logo-bar-icons col-lg-12 col" style="margin: 0px">
                <ul class="inline-links d-flex justify-content-between align-items-center" style="margin: 0; padding: 0; list-style: none; width: 100%;">
                    <li class="text-center" style="flex: 1;">
                        <a href="javascript:void(0);" onclick="openNav()" class="nav-cart-box" style="display: flex; flex-direction: column; align-items: center; text-decoration: none;">
                            <i class="fa-solid fa-list" style="font-size: 20px; color: #333;"></i>
                            <span style="color: black; font-size: 11px; margin-top: 4px;">Category</span>
                        </a>
                    </li>
                    
                    <li class="text-center" style="flex: 1;">
                        <a class="nav-cart-box" href="tel:{{$basicinfo->phone_one}}" style="display: flex; flex-direction: column; align-items: center; text-decoration: none;">
                            <i class="fa-solid fa-phone" style="font-size: 20px; color: #333;"></i>
                            <span style="color: black; font-size: 11px; margin-top: 4px;">Call</span>
                        </a>
                    </li>
                    
                    <li class="text-center" style="flex: 1;">
                        <a class="nav-cart-box" href="{{ url('/') }}" style="display: flex; flex-direction: column; align-items: center; text-decoration: none;">
                            <i class="fa-solid fa-house" style="font-size: 20px; color: #333;"></i>
                            <span style="color: black; font-size: 11px; margin-top: 4px;">Home</span>
                        </a>
                    </li>
                    
                    <li class="text-center" style="flex: 1;">
                        <a href="{{ url('/checkout') }}" class="nav-cart-box" style="display: flex; flex-direction: column; align-items: center; text-decoration: none;">
                            <i class="fa-solid fa-bag-shopping" style="font-size: 20px; color: #333;"></i>
                            <span style="color: black; font-size: 11px; margin-top: 4px;">Shop</span>
                        </a>
                    </li>
                    
                    <li class="text-center" style="flex: 1;">
                        <a class="nav-cart-box" href="{{ url('login') }}" style="display: flex; flex-direction: column; align-items: center; text-decoration: none;">
                            <i class="fa-solid fa-user" style="font-size: 20px; color: #333;"></i>
                            <span style="color: black; font-size: 11px; margin-top: 4px;">Login</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
