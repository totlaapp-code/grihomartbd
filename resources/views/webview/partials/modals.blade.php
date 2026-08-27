{{-- Processing Modal --}}
<div class="modal" id="processing">
    <div class="modal-dialog">
        <div class="modal-content" style="text-align: center;background: none;">
            <i class="spinner fa fa-spinner fa-spin" style="color: #ffffff; font-size: 70px; padding: 22px;"></i>
        </div>
    </div>
</div>

{{-- Cart View Modal --}}
<div class="modal" id="cartViewModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="AddToCartModel" style="padding-top: 0"></div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <span aria-hidden="true">Add More Products</span>
                </button>
                <a href="{{ url('checkout') }}" class="btn btn-primary">Submit Order</a>
            </div>
        </div>
    </div>
</div>

{{-- Floating Cart Counter Button --}}
<div id="cartcount">
    @if (count(\Cart::content()) > 0)
    <div id="posit" type="button" onclick="checkcartview()" style="display: flex; align-items: center; justify-content: center; gap: 6px;">
        <span style="font-size: 18px; font-weight: bold; color: white;">{{ count(\Cart::content()) }}</span>
        <i class="fa-solid fa-cart-shopping" style="font-size: 18px; color: white;"></i>
    </div>
    @endif
</div>
