window.onscroll = function() {
    myFunction();
};

var header = document.getElementById("myHeader");
var sticky = header ? header.offsetTop : 0;

function myFunction() {
    if (header && window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else if (header) {
        header.classList.remove("sticky");
    }
}

function checkcartview(){
    $('#cartViewModal .modal-body').html('<div class="text-center py-4"><i class="fa fa-spinner fa-spin fa-2x text-primary"></i><p class="mt-2 text-muted mb-0" style="font-size: 14px;">Loading cart items...</p></div>');
    $('#processing').modal('hide');
    $('#cartViewModal').modal('show');

    $.ajax({
        type: 'GET',
        url: '/get-cart-content',
        success: function(response) {
            $('#cartViewModal .modal-body').empty().append(response);
        },
        error: function(error) {
            console.log('error', error);
        }
    });
}

function showmessage(){
    $('#showm').hide();
    $('#crossm').css({ 'display': 'flex' });
    $('#message').fadeIn(200);
}

function hidemessage(){
    $('#crossm').hide();
    $('#showm').css({ 'display': 'flex' });
    $('#message').fadeOut(200);
}

$(document).ready(function() {
    var idval = $('#CountSlider').val();

    if($('#slider').length) {
        $('#slider').owlCarousel({
            loop: true, margin: 0, autoplay: true, lazyLoad: false, autoplayTimeout: 3500,
            autoplayHoverPause: true, responsiveClass: true, dots: false, nav: false,
            responsive: { 0: { items: 1 }, 600: { items: 1 }, 1000: { items: 1 } }
        });
    }

    if($('#youtube').length) {
        $('#youtube').owlCarousel({
            loop: true, margin: 10, autoplay: true, lazyLoad: true, autoplayTimeout: 3000,
            autoplayHoverPause: true, responsiveClass: true, dots: false, nav: false,
            responsive: { 0: { items: 2 }, 600: { items: 2 }, 1000: { items: 4 } }
        });
    }

    if($('#categorySlide').length) {
        $('#categorySlide').owlCarousel({
            loop: true, margin: 10, autoplay: true, lazyLoad: true, autoplayTimeout: 2500,
            autoplayHoverPause: true, responsiveClass: true, dots: false, nav: true,
            responsive: { 0: { items: 3 }, 600: { items: 3 }, 768: { items: 4 }, 1000: { items: 8 } }
        });
    }

    if($('#promotionalofferSlide').length) {
        $('#promotionalofferSlide').owlCarousel({
            loop: true, margin: 8, autoplay: true, lazyLoad: false, autoplayTimeout: 2500,
            autoplayHoverPause: true, responsiveClass: true, nav: true, dots: false,
            responsive: { 0: { items: 2 }, 600: { items: 3 }, 992: { items: 4 }, 1200: { items: 6 } }
        });
    }

    if($('#bestSellingSlide').length) {
        $('#bestSellingSlide').owlCarousel({
            loop: true, margin: 8, autoplay: true, lazyLoad: false, autoplayTimeout: 2500,
            autoplayHoverPause: true, responsiveClass: true, nav: true, dots: false,
            responsive: { 0: { items: 2 }, 600: { items: 3 }, 992: { items: 4 }, 1200: { items: 6 } }
        });
    }

    if($('#featuredProductSlide').length) {
        $('#featuredProductSlide').owlCarousel({
            loop: true, margin: 10, autoplay: true, lazyLoad: true, autoplayTimeout: 2500,
            autoplayHoverPause: true, responsiveClass: true, nav: true, dots: false,
            responsive: { 0: { items: 3 }, 600: { items: 3 }, 1000: { items: 6 } }
        });
    }

    if($('#bestsellingproductSlide').length) {
        $('#bestsellingproductSlide').owlCarousel({
            loop: true, margin: 0, autoplay: true, lazyLoad: true, autoplayTimeout: 2500,
            autoplayHoverPause: true, responsiveClass: true, dots: false, nav: true,
            responsive: { 0: { items: 2 }, 600: { items: 2 }, 1000: { items: 4 } }
        });
    }

    for (let i = 0; i < idval; i++) {
        if($('#CategoryProductSlide' + i).length) {
            $('#CategoryProductSlide' + i).owlCarousel({
                loop: true, margin: 10, autoplay: true, autoplayTimeout: 2500, lazyLoad: true,
                autoplayHoverPause: true, responsiveClass: true, nav: true, dots: false,
                responsive: { 0: { items: 3 }, 600: { items: 3 }, 1000: { items: 6 } }
            });
        }
    }

    if(typeof $.fn.lazyload !== 'undefined') {
        $('img').lazyload();
    }
});

function getCsrfToken() {
    return $("input[name='_token']").val() || $('meta[name="csrf-token"]').attr('content');
}

function addtocart(product_id) {
    $('#cartViewModal .modal-body').html('<div class="text-center py-4"><i class="fa fa-spinner fa-spin fa-2x text-primary"></i><p class="mt-2 text-muted mb-0" style="font-size: 14px;">Adding product to cart...</p></div>');
    $('#cartViewModal').modal('show');

    $.ajax({
        type: 'POST',
        url: '/add-to-cart',
        data: {
            _token: getCsrfToken(),
            product_id: product_id,
            qty: '1',
        },
        success: function(data) {
            updatecart();
            if (data && data.fbEventId && typeof fbq !== 'undefined') {
                fbq('track', 'AddToCart', {
                    content_name: data.name,
                    content_ids: [data.product_id.toString()],
                    content_type: 'product',
                    value: Number(data.price),
                    currency: 'BDT'
                }, { eventID: data.fbEventId });
            }
            $.ajax({
                type: 'GET',
                url: '/get-cart-content',
                success: function(response) {
                    $('#cartViewModal .modal-body').empty().append(response);
                }
            });
        },
        error: function(error) {
            console.log('error', error);
            $('#cartViewModal').modal('hide');
        }
    });
}

function buynow(product_id) {
    $('#processing').css({'display': 'flex', 'justify-content': 'center', 'align-items': 'center'}).modal('show');
    $.ajax({
        type: 'POST',
        url: '/add-to-cart',
        data: {
            _token: getCsrfToken(),
            product_id: product_id,
            qty: '1',
        },
        success: function(data) {
            updatecart();
            window.location.href = '/checkout';
        },
        error: function(error) {
            console.log('error', error);
            $('#processing').modal('hide');
        }
    });
}

function removeFromCartItem(rowId) {
    $.ajax({
        type: 'POST',
        url: '/remove-cart',
        data: {
            _token: getCsrfToken(),
            rowId: rowId,
        },
        success: function(response) {
            updatecart();
            if (typeof swal !== 'undefined') {
                swal({ position: 'top-end', icon: 'success', title: 'Product removed from your Cart', showConfirmButton: false, timer: 1500 });
            }
            if (response == 'empty') {
                $('#loadingreload').css({'display': 'flex', 'justify-content': 'center', 'align-items': 'center'}).modal('show');
                $('#cartViewModal').modal('hide');
                location.reload();
            } else {
                $('#cartViewModal .modal-body').empty().append(response);
                $('#cartViewModal').modal('show');
            }
        }
    });
}

function upQuantity() {
    var qty = $('#proQuantity').val();
    if (qty < 10) {
        var cq = parseInt(qty) + 1;
        $('#proQuantity').val(cq);
        $('#qty').val(cq);
        $('#qtyor').val(cq);
    }
}

function downQuantity() {
    var qty = $('#proQuantity').val();
    if (qty > 1) {
        var cq = parseInt(qty) - 1;
        $('#proQuantity').val(cq);
        $('#qty').val(cq);
        $('#qtyor').val(cq);
    }
}

function checkcart() {
    $.ajax({
        type: 'GET',
        url: '/get-checkcart-content',
        success: function(response) {
            $('#checkcartview').html('').append(response);
        }
    });
}

function removeFromCartItemHead(rowId) {
    $.ajax({
        type: 'POST',
        url: '/remove-cart',
        data: {
            _token: getCsrfToken(),
            rowId: rowId,
        },
        success: function(response) {
            if (typeof toastr !== 'undefined') toastr.success('Product removed from Cart');
            checkcart();
            viewcart();
            updatecart();
            if (response == 'empty') {
                location.reload();
            }
        }
    });
}

function viewcart() {
    $.ajax({
        type: 'GET',
        url: '/load-cart',
        success: function(response) {
            $('#cart-summary').empty().append(response);
        }
    });
}

function updatecart() {
    $.ajax({
        type: 'GET',
        url: '/update-cart',
        success: function(response) {
            $('.basket-item-count').html(response.item);
            $('.cartamountvalue').html(response.amount);
        }
    });
}

function searchproduct() {
    var search = $('#modalsearchinput').val();
    $.ajax({
        type: 'GET',
        url: '/get-search-content',
        data: {
            _token: getCsrfToken(),
            search: search,
        },
        success: function(response) {
            $('#searchproductlist').html('').append(response);
        }
    });
}

$(document).ready(function () {
    $('#searchToggleIcon').on('click', function () {
        $('#nav-item').toggle();
        $('#pro-search-form').toggleClass('d-none');
    });
});
