<style>
    #featureimageCt {
        height: 180px;
        width: auto;
        padding: 2px;
        padding-top: 0;
    }
    @media only screen and (max-width: 600px) {
       #featureimageCt {
           height: 180px;
            width: auto;
            padding: 2px;
            padding-top: 0;
        }
    }
</style>
<div class="row pt-2 pb-2" id="cateoryPro" style="background: white;">
 @forelse ($categoryproducts as $categoryproduct)
    @php
        $relatedIds = json_decode($categoryproduct->RelatedProductIds);
        $firstcatepro = null;
        if (!empty($relatedIds) && isset($relatedIds[0]->productID)) {
            $firstcatepro=App\Models\Product::with([
                'sizes' => function ($query) {
                    $query->select('id','product_id','Discount','RegularPrice','SalePrice')->take(1);
                }
                ])->where('id', $relatedIds[0]->productID)->select('id','ProductName')->first();
        }

        $reviewRating = 0;
        if ($firstcatepro) {
            $reviewRating = App\Models\Review::where('product_id', $firstcatepro->id)->avg('rating');
        }

        $dis = 0;
        if (isset($firstcatepro->sizes[0]) && $firstcatepro->sizes[0]->RegularPrice > 0) {
            $dis=intval(($firstcatepro->sizes[0]->Discount/$firstcatepro->sizes[0]->RegularPrice)*100);
        }
    @endphp
    @if(isset($firstcatepro))
        <div class="mb-2 px-1 col-6 col-md-4 col-lg-3">
            <div class="product-micro-row">
                
                     <div class="product_item_inner">
                        <div class="product-image">
                            <a href="{{ url('view-product/' . $categoryproduct->ProductSlug) }}">
                                <img src="{{ asset($categoryproduct->ProductImage) }}">
                            </a>
                        </div>
                        <span style="position: absolute;top: 0;background: green;width: 50px;color: white;border-radius: 4px;font-weight: bold;font-size: 12px;">&nbsp;{{$dis}}% off</span>
                        <!-- /.product-image -->
                        <div class="product-text" style="padding-bottom: 4px !important;background: white;">
                            <div class="pro_name">
                             <a href="{{ url('view-product/' . $categoryproduct->ProductSlug) }}" id="f_pro_name"><p style="margin: 0;height: 50px;">{{ $categoryproduct->ProductName }}</p></a>
                             
                            <div class="d-flex my-2" style="justify-content:center">
                                <div class="star" style="padding-top: 5px;" display="none!important;">
                                    <span style="font-weight: bold;color:black;font-size:10px">({{ App\Models\Review::where('product_id', $categoryproduct->id)->get()->count() }})</span>
                                        <span class="fas fa-star" id="checked"></span>
                                        <span class="fas fa-star" id="checked"></span>
                                        <span class="fas fa-star" id="checked"></span>
                                        <span class="fas fa-star" id="checked"></span>
                                        <span class="fas fa-star" id="checked"></span>
                                     
                                </div>
                            </div>
                            <div class="price-box">
                                @if(isset($firstcatepro->sizes[0]))
                                    <del class="old-product-price strong-400" style="color:red">৳
                                        {{ round($firstcatepro->sizes[0]->RegularPrice) }}</del>
                                    <span
                                        class="product-price strong-600" style="color:black">৳ {{ round($firstcatepro->sizes[0]->SalePrice) }}</span>
                                @endif
                            </div>
                            
                          </div>
                        </div>
                        <div class="pro_btn">
                          <form name="form" action="{{url('add-to-cart')}}" method="POST" enctype="multipart/form-data" style="width: 100%;float: left;text-align: center;">
                                @method('POST')
                                @csrf
                                <input type="text" name="color" id="product_colorold" hidden>
                                <input type="text" name="size" id="product_sizeold" hidden>
                                <input type="text" name="product_id" value="{{ $firstcatepro->id }}" hidden>
                                <input type="text" name="qty" value="1" id="qtyor" hidden>
                                <button class="btn  btn-sm mb-0 btn-block"  id="purcheseBtn" style="background: #ff4e00; color: white;">অর্ডার করুন</button>
                            </form>
                        </div>
                 </div>
                </div>
        </div>
    @endif
@empty
@endforelse
</div>
