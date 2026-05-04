@extends('backend.master')

@section('maincontent')

@section('title')
    {{ env('APP_NAME') }}-Admin
@endsection
@php
    $admin=App\Models\Admin::where('id',Auth::guard('admin')->user()->id)->first();
@endphp

<style>
    p {
        margin-top: 0;
        margin-bottom: 1rem;
        font-size: 20px;
    }
    h6, .h6 {
        font-size: 1.3rem;
    }
</style>

<div class="px-4 pt-4 container-fluid">
    
    <div  id="print-area">
    <div class="mb-4 row g-4">
        <div class="card card-body"> 
            <div class="col-12 mb-4 text-center">
                <h4 style="margin: 0;margin-top: 8px;">Grihomart BD</h4>
            </div>
            <div class="col-12 d-flex justify-content-between">
                <h4 style="margin: 0;margin-top: 8px;">INFORMATION</h4>
                <div class="d-flex justify-content-between d-none d-lg-flex" style="font-size: 24px;">
                     
                    From: &nbsp;<input type="text" style="width:200px" class="form-control datepicker" id="infodate" value="{{date('Y-m-d')}}" name="infodate">
                     &nbsp;  &nbsp; &nbsp; To: &nbsp;<input type="text" style="width:200px" class="form-control datepicker" id="infodateto" value="{{date('Y-m-d')}}" name="infodateto">
                </div>
            </div>
            <div class="mb-3 col-12 d-block d-lg-none">
                <div class="row g-2" style="font-size: 20px;">
                    <div class="col-6">
                        <label>From:</label>
                        <input type="text" class="form-control datepicker w-100" id="infodate" value="{{date('Y-m-d')}}" name="infodate">
                    </div>
                    <div class="col-6">
                        <label>To:</label>
                        <input type="text" class="form-control datepicker w-100" id="infodateto" value="{{date('Y-m-d')}}" name="infodateto">
                    </div>
                </div>
            </div> 
        </div>
    </div>
    @if ($admin->hasRole('superadmin') || $admin->hasRole('admin') || $admin->hasRole('accounts'))
    <div class="mb-4 row g-4">
        <div class="card card-body">
             
            <div class="col-sm-6 col-xl-3">
                <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                    <div class="ms-3">
                        <p class="mb-2">Account Balance</p>
                        <h6 class="mb-0" id="account">{{ \App\Models\Basicinfo::first()->account_balance }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   
    <div class="mb-4 row g-4">
        <div class="card card-body">
            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <a href="{{url('admin/account-deposit/Courier')}}">
                        <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                            <img src="{{asset('public/cash1.png')}}" style="width:50px;">
                            <div class="ms-3">
                                <p class="mb-2">Courier Payment</p>
                                <h6 class="mb-0"><span id="courierpayment">0</span> TK</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="{{url('admin/account-deposit/Office Sale')}}">
                        <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                            <img src="{{asset('public/money.png')}}" style="width:50px;">
                            <div class="ms-3">
                                <p class="mb-2">Office Sale Payment</p>
                                <h6 class="mb-0"><span id="officesalepayment">0</span> TK</h6>
                            </div>
                        </div>
                     </a>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <a href="{{url('admin/account-deposit/Wholesale')}}">
                        <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                            <img src="{{asset('public/pallete.png')}}" style="width:50px;">
                            <div class="ms-3">
                                <p class="mb-2">Wholesale Payment</p>
                                <h6 class="mb-0"><span id="wholesalepayment">0</span> TK</h6>
                            </div>
                        </div>
                     </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="{{url('admin/account-deposit/Total')}}">
                        <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                            <img src="{{asset('public/icon/income.png')}}" style="width:50px;">
                            <div class="ms-3">
                                <p class="mb-2">Total Payment </p>
                                <h6 class="mb-0"><span id="totalpayment">0</span> TK</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-4 row g-4">
        <div class="card card-body">
            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <a href="{{url('admin/expense-cost/Boost Cost')}}">
                        <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                            <img src="{{asset('public/shuttle.png')}}" style="width:50px;">
                            <div class="ms-3">
                                <p class="mb-2">Boost Cost</p>
                                <h6 class="mb-0"><span id="bostcost">0</span> TK</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="{{url('admin/expense-cost/Office Cost')}}">
                    <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                        <img src="{{asset('public/expense.png')}}" style="width:50px;">
                        <div class="ms-3">
                            <p class="mb-2">Office Cost</p>
                            <h6 class="mb-0"><span id="officecost">0</span> TK</h6>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <a href="{{url('admin/expense-cost/Bank Deposit')}}">
                    <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                        <img src="{{asset('public/mobile-banking.png')}}" style="width:50px;">
                        <div class="ms-3">
                            <p class="mb-2">Bank Deposit</p>
                            <h6 class="mb-0"><span id="bankcost">0</span> TK</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="{{url('admin/expense-cost/Total Cost')}}">
                    <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                        <img src="{{asset('public/reduction.png')}}" style="width:50px;">
                        <div class="ms-3">
                            <p class="mb-2">Total Cost</p>
                            <h6 class="mb-0"><span id="totalcost">0</span> TK</h6>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <br>
    <hr>
    <br>
   
     @endif 
     
    <div id="ord">
        <div class="flex-wrap mb-4 col-12 d-flex justify-content-between align-items-center">
            <h4 style="margin: 0;margin-top: 8px;">ORDERS</h4>
            <div class="flex-wrap d-flex align-items-center" style="gap:10px;">
                <div class="d-flex align-items-center">
                    <label>From:&nbsp;</label>
                    <input type="text" style="width:160px" class="form-control datepicker" id="orderdate"
                           value="{{ date('Y-m-d') }}" name="orderdate">
                </div>
                <div class="d-flex align-items-center">
                    <label>&nbsp;To:&nbsp;</label>
                    <input type="text" style="width:160px" class="form-control datepicker" id="orderdateto"
                           value="{{ date('Y-m-d') }}" name="orderdateto">
                </div>
                <div>
                    <select class="form-select" id="dateselect" style="width:180px;background-color:#fff">
                        <option value="custom" selected> Filter</option>
                        <option value="today">Today</option>
                        <option value="yesterday">Yesterday</option>
                        <option value="7days">Last 7 Days</option>
                        <option value="30days">Last 30 Days</option>
                        <option value="lastmonths">Last Months</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mb-4 row g-4">
            <div class="card card-body">
                <div class="row">
                    <div class="col-sm-6 col-xl-3">
                        <a href="{{ url('admin_order/orderall') }}">
                        <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                            <img src="{{asset('public/icon/order.png')}}" style="width:50px;">
                            <div class="ms-3">
                                <p class="mb-2">Total</p>
                                <h6 class="mb-0" id="total">0</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-9">

                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="card card-body">
                <div class="row">
                    <div class="mb-2 col-sm-6 col-xl-3">
                        <a href="{{ url('admin_order/orderall') }}">
                        <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                            <div class="ms-3">
                                <p class="mb-2">Total Order</p>
                                <h6 class="mb-0" id="all">0</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="mb-2 col-sm-6 col-xl-3">
                        <a href="{{ url('admin_order/Pending') }}">
                        <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                            <div class="ms-3">
                                <p class="mb-2">Pending</p>
                                <h6 class="mb-0" id="pending">0</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="mb-2 col-sm-6 col-xl-3">
                        <a href="{{ url('admin_order/Hold') }}">
                        <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                            <div class="ms-3">
                                <p class="mb-2">Hold</p>
                                <h6 class="mb-0" id="hold">0</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="mb-2 col-sm-6 col-xl-3">
                        <a href="{{ url('admin_order/Cancelled') }}">
                        <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                            <div class="ms-3">
                                <p class="mb-2">Cancelled</p>
                                <h6 class="mb-0" id="cancelled">0</h6>
                            </div>
                        </div>
                        </a>
                    </div>



                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="card card-body">
                <div class="row">
                    <div class="mb-2 col-sm-6 col-xl-3">
                        <a href="{{ url('admin_order/Ready to Ship') }}">
                        <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                            <div class="ms-3">
                                <p class="mb-2">Ready to Ship</p>
                                <h6 class="mb-0" id="readytoship">0</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="mb-2 col-sm-6 col-xl-3">
                        <a href="{{ url('admin_order/Packaging') }}">
                        <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                            <div class="ms-3">
                                <p class="mb-2">Packaging</p>
                                <h6 class="mb-0" id="packaging">0</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="mb-2 col-sm-6 col-lg-3">
                        <a href="{{ url('admin_order/Shipped') }}">
                        <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                            <div class="ms-3">
                                <p class="mb-2">Shipped</p>
                                <h6 class="mb-0" id="shipped">0</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @php
        $date = date('Y-m-d');
        $dateold = date("Y-m-d", strtotime($date ." -15 day") );
    @endphp

    <div  id="print-areac">
        <div class="col-12 mb-4 text-center">
                <h4 style="margin: 0;margin-top: 8px;">Grihomart BD</h4>
            </div>
        <div class="p-4 mb-4 col-12 d-flex flex-wrap justify-content-between align-items-center mt-4">
            <h4 style="margin: 0;margin-top: 8px;">COURIER STATUS</h4>  
            <div class="d-flex flex-wrap align-items-center mt-2 mt-md-0" style="gap: 10px;">
                <a type="button" data-bs-toggle="modal" data-bs-target="#mainTask" class="btn btn-primary"
                            style="white-space: nowrap;"> + Create Note</a>
                 <button onclick="printDivc()" class="btn btn-info">Print</button>
            </div>
        </div>
        <div class="row">
            <div style="margin: 0;margin-top: 8px;display: flex;font-size: 24px;color: black;font-weight: bold;margin-bottom: 20px;justify-content: center;">Date: <div id="dateid">{{date('Y-m-d')}}</div> </div> 
        </div>
        
        <div class="row g-4">
            <div class="card card-body">
                <div class="row">
                    <div class="mb-2 col-sm-6 col-xl-3">
                        <a href="{{ url('admin_order/Courier Pending') }}">
                        <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                            <div class="ms-3">
                                <p class="mb-2">Courier Pending</p>
                                <h6 class="mb-0" id="courierPending">0</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="mb-2 col-sm-6 col-lg-3">
                        <a href="{{ url('admin_order/Completed') }}">
                        <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                            <div class="ms-3">
                                <p class="mb-2">Completed</p>
                                <h6 class="mb-0" id="completed">0</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="mb-2 col-sm-6 col-xl-3">
                        <a href="{{ url('admin_order/Partial Delivered') }}">
                        <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                            <div class="ms-3">
                                <p class="mb-2">Partial Delivered</p>
                                <h6 class="mb-0" id="partialDelivered">0</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="mb-2 col-sm-6 col-lg-3">
                        <a href="{{ url('admin_order/Del. Failed') }}">
                        <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                            <div class="ms-3">
                                <p class="mb-2">Del. Failed</p>
                                <h6 class="mb-0" id="delfailed">0</h6>
                            </div>
                        </div>
                        </a>
                    </div>
    
                    <div class="mb-2 col-sm-6 col-xl-3">
                        <a href="{{ url('admin_order/Unknown') }}">
                        <div class="p-4 rounded bg-secondary d-flex align-items-center justify-content-start h-100">
                            <div class="ms-3">
                                <p class="mb-2">Unknown</p>
                                <h6 class="mb-0" id="unknown">0</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="" style="width: 100%;float:left;">
                        <div class="row">
                            
                            <div class="form-group col-md-3">
                                <label for="inputCity" class="col-form-label">Start Date</label>
                                <input type="text" class="form-control datepicker" id="startDates"
                                    value="{{$dateold}}" placeholder="Select Date">
                            </div>
                            <input type="hidden" name="type" value="task">
                            <div class="form-group col-md-3">
                                <label for="inputCity" class="col-form-label">End Date</label>
                                <input type="text" class="form-control datepicker" id="endDates"
                                    value="<?php echo date('Y-m-d'); ?>" placeholder="Select Date">
                            </div>
                            <div class="form-group col-md-2 mt-3" style="margin-top: 14px !important;">
                                <label for="floatingInput">Choose Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="Pending">Pending</option>
                                    <option value="All">All</option> 
                                    <option value="Done">Done</option>
                                </select>
                            </div>  
                        </div>
                    </div>
                    <table class="table table-dark" id="taskinfo" width="100%" style="text-align: center;">
                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Date</th> 
                                <th>Customer Number</th> 
                                <th>Note</th>
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="mainTask" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content rounded h-100">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red;">Create Note</h5>
                    <button type="button" class="btn-dark btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form name="form" id="AddTask" enctype="multipart/form-data">
                        @csrf
                        @if(Auth::user()->id==1)
                        <div class="form-group mb-3">
                            <label for="floatingInput">Choose User For Assign Task</label>
                            <select class="form-control" id="admin_id" name="admin_id">
                                <option value="">Choose</option>
                                @forelse(App\Models\Admin::all() as $adm)
                                    <option value="{{$adm->id}}">{{$adm->name}}</option>
                                @empty
                                
                                @endforelse
                            </select>
                        </div>
                        @endif
                        <input type="hidden" name="type" value="courier">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control datepicker" value="{{date('Y-m-d')}}" name="date" min="{{date('Y-m-d')}}" id="date"
                                placeholder="Date">
                            <label for="floatingInput">Date</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="task_name" id="task_name"
                                placeholder="Title">
                            <label for="floatingInput">Customer Number</label>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="floatingInput">Notes</label>
                            <textarea class="form-control" name="message" id="message" rows="4"></textarea>
                        </div>
                        <br>
                        <div class="form-group mt-2" style="text-align: right">
                            <div class="submitBtnSCourse">
                                <button type="submit" name="btn" data-bs-dismiss="modal" class="btn btn-dark "
                                    style="float: left">Close</button>
                                <button type="submit" name="btn" id="submbyn"
                                    class="btn btn-primary AddTaskBtn">Save</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div><!-- End popup Modal-->

   

   @if ($admin->hasRole('superadmin') || $admin->hasRole('store') || $admin->hasRole('accounts') || $admin->hasRole('storeassistant')  || $admin->hasRole('admin')  || $admin->hasRole('manager'))
    
    <div class="col-sm-12 col-md-12 col-xl-12 mt-4" id="inv">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="mb-4 col-12 d-flex justify-content-between">
                    <h4 style="margin: 0;margin-top: 8px;">INVENTORY</h4> 
                    <button onclick="printDivcinv()" class="btn btn-info">Print</button>
                </div>
                <div class="row">
                    @php
                        $total=0;
                        $avtotal=0;
                        @endphp
                        @foreach(App\Models\Category::all() as $category)
                            @php
                                $productid=App\Models\Product::where('category_id',$category->id)->get()->pluck('id');
                                $totalstock=App\Models\Size::whereIn('product_id',$productid)->get()->sum('total_stock');
                                $stock=App\Models\Size::whereIn('product_id',$productid)->get()->sum('available_stock');
            
                                $total+=$totalstock;
                                $avtotal+=$stock;
                            @endphp
                            <div class="mb-2 col-sm-6 col-xl-3">
                                <div class="p-4 rounded bg-white d-flex align-items-center justify-content-start h-100">
                                    <div class="ms-3">
                                        <p class="mb-2">{{$category->category_name}}</p>
                                        <h6 class="mb-0" id="">{{$stock}} pics</h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="mb-2 col-sm-6 col-xl-3">
                            <div class="p-4 rounded bg-white d-flex align-items-center justify-content-start h-100">
                                <div class="ms-3">
                                    <p class="mb-2">Total</p>
                                    <h6 class="mb-0" id="">{{$avtotal}} pics</h6>
                                </div>
                            </div>
                        </div>
            
                </div>
            </div>
        </div>
    @endif
</div>
    <!-- Sale & Revenue End -->
    <div class="modal fade" id="editmainTask" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content rounded h-100">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red;">Edit Task</h5>
                    <button type="button" class="btn-dark btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form name="form" id="EditTask" enctype="multipart/form-data">
                        @csrf
                        @if(Auth::user()->id==1)
                        <div class="form-group mb-3">
                            <label for="floatingInput">Choose User For Assign Task</label>
                            <select class="form-control" id="admin_id" name="admin_id">
                                <option value="">Choose</option>
                                @forelse(App\Models\Admin::all() as $adm)
                                    <option value="{{$adm->id}}">{{$adm->name}}</option>
                                @empty
                                
                                @endforelse
                            </select>
                        </div>
                        @endif
                        <input type="hidden" name="type" value="courier">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control datepicker" value="{{date('Y-m-d')}}" name="date" min="{{date('Y-m-d')}}" id="date"
                                placeholder="Date">
                            <label for="floatingInput">Date</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="task_name" id="task_name"
                                placeholder="Title">
                            <label for="floatingInput">Customer Number</label>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="floatingInput">Notes</label>
                            <textarea class="form-control" name="message" id="message" rows="4"></textarea>
                        </div>
                        <input type="text" name="task_id" id="task_id" hidden>

                        <br>
                        <div class="form-group mt-2" style="text-align: right">
                            <div class="submitBtnSCourse">
                                <button type="submit" name="btn" data-bs-dismiss="modal"
                                    class="btn btn-dark" style="float: left">Close</button>
                                <button type="submit" name="btn"
                                    class="btn btn-primary AddTaskBtn">Update</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div><!-- End popup Modal-->
        
<script>
    $(document).ready(function(){
        $(".datepicker").flatpickr();
        loadinfo();
        loadorder();
        
        var token = $("input[name='_token']").val();

        var taskinfo = $('#taskinfo').DataTable({
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
             ajax: {
                url:'{!! route('task.datacourier') !!}',
                data: {
                    startDate: function() {
                        return $('#startDates').val()
                    },
                    endDate: function() {
                        return $('#endDates').val()
                    },
                    status: function() {
                        return $('#status').val()
                    },
                    assign_for: function() {
                        return '';
                    }
                }
            },
            columns: [{
                    data: 'id'
                }, 
                {
                    data: 'date'
                }, 
                {
                    data: 'task_name'
                },
                {
                    data: 'message'
                },
                {
                    "data": null,
                    render: function(data) {

                        if (data.status === 'Done') {
                            return '<button type="button" class="btn btn-success btn-sm btn-status" data-status="Pending" id="taskstatusBtn" data-id="' +
                                data.id + '">Done</button>';
                        } else {
                            return '<button type="button" class="btn btn-warning btn-sm btn-status" data-status="Done" id="taskstatusBtn" data-id="' +
                                data.id + '" >Pending</button>';
                        }


                    }
                },
                {
                    data: 'create_by'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }

            ],
            lengthChange: false,
            bFilter: false,
            search: false,
            dom: '<"row"<"col-sm-6"Bl><"col-sm-6"f>>' +
                '<"row"<"col-sm-12"<"table-responsive"tr>>>' +
                '<"row"<"col-sm-5"i><"col-sm-7"p>>',
            buttons: {
                buttons: [{
                    extend: 'print',
                    text: 'Print',
                    footer: true,
                    title: function() {
                        var printTitle = 'Daily Task Report Of : '+'<?php echo Auth::guard()->user()->name ?>';
                        return printTitle;
                    },
                    exportOptions : {
                        stripHtml : false,
                        columns: [ 0, 1, 2, 3, 4,5,6]
                    },
                    customize: function(win) {
                        $(win.document.body).find('h1').css('text-align', 'center');
                        $(win.document.body).find('h1').after(
                            '<p style="text-align: center">From : ' + $('#startDate').val() + ' - To : ' + $('#endDate').val() + '</p>');

                    }
                }]
            },
            language: {
                paginate: {
                    previous: "<i class='fas fa-chevron-left'>",
                    next: "<i class='fas fa-chevron-right'>"
                }
            },
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-sm");
                $('.dt-buttons').hide();
            },
            footerCallback: function() {
                var api = this.api();
                var numRows = api.rows().count();
            }
        });
        
        $(document).on('change', '#startDates', function() {
            taskinfo.ajax.reload();
        });
        $(document).on('change', '#endDates', function() {
            taskinfo.ajax.reload();
        });
        $(document).on('change', '#status', function() {
            taskinfo.ajax.reload();
        });
        
        $(document).on('click', '#editTaskBtn', function() {
            let taskId = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: 'tasks/' + taskId + '/edit',

                success: function(data) {
                    $('#EditTask').find('#task_name').val(data.task_name);
                    $('#EditTask').find('#task_id').val(data.id);
                    $('#EditTask').find('#message').val(data.message);
                    $('#EditTask').find('#date').val(data.date);
                    $('#EditTask').find('#admin_id').val(data.admin_id);
                    $('#EditTask').find('#date').val(data.date);
                    $('#EditTask').attr('data-id', data.id);
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });
        
        $('#EditTask').submit(function(e) {
            e.preventDefault();
            let taskId = $('#task_id').val();

            $.ajax({
                type: 'POST',
                url: 'task/' + taskId,
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    $('#EditTask').find('#task_name').val('');
                    $('#EditTask').find('#message').val('');
                    $('#EditTask').find('#task_id').val('');

                    swal({
                        title: "Task update successfully !",
                        icon: "success",
                        showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                    });
                    taskinfo.ajax.reload();

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });
        
        $(document).on('click', '#deleteTaskBtn', function() {
            let taskId = $(this).data('id');
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: 'DELETE',
                            url: 'tasks/' + taskId,
                            data: {
                                '_token': token
                            },
                            success: function(data) {
                                swal("Task has been deleted!", {
                                    icon: "success",
                                });
                                taskinfo.ajax.reload();
                            },
                            error: function(error) {
                                console.log('error');
                            }

                        });


                    } else {
                        swal("Your data is safe!");
                    }
                });

        });

        // status update

        $(document).on('click', '#taskstatusBtn', function() {
            let taskId = $(this).data('id');
            let taskStatus = $(this).data('status');

            $.ajax({
                type: 'PUT',
                url: 'task/status',
                data: {
                    task_id: taskId,
                    status: taskStatus,
                    '_token': token
                },

                success: function(data) {
                    swal({
                        title: "Status updated !",
                        icon: "success",
                        showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                    });
                    taskinfo.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

        // front status update

        $(document).on('click', '#taskfrontstatusBtn', function() {
            let taskId = $(this).data('id');
            let taskFrontStatus = $(this).data('status');

            $.ajax({
                type: 'PUT',
                url: 'task/status',
                data: {
                    task_id: taskId,
                    front_status: taskFrontStatus,
                    '_token': token
                },

                success: function(data) {
                    swal({
                        title: "Status updated !",
                        icon: "success",
                        showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                    });
                    taskinfo.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

        $(document).on('change', '#infodate', function(){ 
            loadinfo(); 
        });
        $(document).on('change', '#infodateto', function(){ 
            loadinfo(); 
        });
        $(document).on('change', '#orderdate', function(){
            var date=$('#orderdate').val();
            $('#dateid').html(date);
            loadinfo();
        });
        $(document).on('change', '#orderdateto', function(){
            var date2=$('#infodateto').val();
            $('#dateid2').html(date2);
            loadinfo();
        });
        
        $('#AddTask').submit(function(e) {
            e.preventDefault(); 
            $.ajax({
                type: 'POST',
                url: '{{ route('tasks.store') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    $('#task_name').val('');
                    $('#message').val('');

                    swal({
                        title: "Success!",
                        icon: "success",
                    });
                    taskinfo.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }
            });
        });
        
    });

    function loadinfo(){
        var infodate=$('#infodate').val();
        var infodateto=$('#infodateto').val();
        $.ajax({
            type: "get",
            url: "{{ url('admin/get/information') }}",
            data:{
                'infodate':infodate,
                'infodateto':infodateto
            },
            contentType: "application/json",
            success: function(response) {
                var data = JSON.parse(response);

                if (data["status"] == "success") {
                    $('#courierpayment').text(data["courierpayment"]);
                    $('#officesalepayment').text(data["officesalepayment"]);
                    $('#wholesalepayment').text(data["wholesalepayment"]);
                    $('#totalpayment').text(data["totalpayment"]);

                    $('#totalcost').text(data["totalcost"]);
                    $('#bankcost').text(data["bankcost"]);
                    $('#officecost').text(data["officecost"]);
                    $('#bostcost').text(data["bostcost"]);
                } else {
                    if (data["status"] == "failed") {
                        swal(data["message"]);
                    } else {
                        swal("Something wrong ! Please try again.");
                    }
                }
            }
        });
    }
    function loadorder(){
        var orderdate=$('#orderdate').val();
        var orderdateto=$('#orderdateto').val();
        $.ajax({
            type: "get",
            url: "{{ url('admin/get/order/information') }}",
            data:{
                'orderdate':orderdate,
                'orderdateto':orderdateto
            },
            contentType: "application/json",
            success: function(response) {
                var data = JSON.parse(response);

                if (data["status"] == "success") {
                    $('#total').text(data["total"]);
                    $('#all').text(data["all"]);
                    $('#pending').text(data["pending"]);
                    $('#readytoship').text(data["readytoship"]);
                    $('#hold').text(data["hold"]);
                    $('#shipped').text(data["shipped"]);
                    $('#cancelled').text(data["cancelled"]);
                    $('#completed').text(data["completed"]);
                    $('#packaging').text(data["packaging"]);
                    $('#delfailed').text(data["delFailed"]);
                    
                    $('#courierPending').text(data["courierPending"]);
                    $('#partialDelivered').text(data["partialDelivered"]); 
                    $('#delfailed').text(data["delFailed"]);
                    $('#unknown').text(data["unknown"]);
                } else {
                    if (data["status"] == "failed") {
                        swal(data["message"]);
                    } else {
                        swal("Something wrong ! Please try again.");
                    }
                }
            }
        });
    }
    
    function printDivcOrd() {
        var divContent = document.getElementById("ord").innerHTML;
        var originalContent = document.body.innerHTML;

        document.body.innerHTML = divContent;
        window.print();
        document.body.innerHTML = originalContent; 
    }
    
    function printDivcinv() {
        var divContent = document.getElementById("inv").innerHTML;
        var originalContent = document.body.innerHTML;

        document.body.innerHTML = divContent;
        window.print();
        document.body.innerHTML = originalContent; 
    }
    function printDiv() {
            var divContent = document.getElementById("print-area").innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = divContent;
            window.print();
            document.body.innerHTML = originalContent;
            location.reload(); // Reload to restore original content
        }
    function printDivc() {
            var divContent = document.getElementById("print-areac").innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = divContent;
            window.print();
            document.body.innerHTML = originalContent;
            location.reload(); // Reload to restore original content
        }
        
        
        
        
$(document).ready(function(){
    // Enable HTML5 datepicker
    $('.datepicker').attr('type', 'date');

    // First load
    loadorder();

    // === Date change event ===
    $('#orderdate, #orderdateto').on('change', function(){
        $('#dateselect').val('custom');
        loadorder();
    });

    // === Dropdown filter change ===
    $('#dateselect').on('change', function(){
        const val = $(this).val();
        const today = new Date();
        let fromDate = '', toDate = '';

        if(val === 'today'){
            fromDate = toDate = formatDate(today);
        }
        else if(val === 'yesterday'){
            const y = new Date(today);
            y.setDate(today.getDate() - 1);
            fromDate = toDate = formatDate(y);
        }
        else if(val === '7days'){
            const d = new Date(today);
            d.setDate(today.getDate() - 7);
            fromDate = formatDate(d);
            toDate = formatDate(today);
        }
        else if(val === '30days'){
            const d = new Date(today);
            d.setDate(today.getDate() - 30);
            fromDate = formatDate(d);
            toDate = formatDate(today);
        }
        else if(val === 'lastmonths'){
           const d = new Date(today);
            const lastDayPrevMonth = new Date(d.getFullYear(), d.getMonth(), 0);
            const firstDayPrevMonth = new Date(d.getFullYear(), d.getMonth() - 1, 1);

            fromDate = formatDate(firstDayPrevMonth);
            toDate = formatDate(lastDayPrevMonth);
        }
        else {
            // custom
            return;
        }

        $('#orderdate').val(fromDate);
        $('#orderdateto').val(toDate);
        loadorder();
    });
});
function formatDate(date){
    let m = date.getMonth() + 1;
    let d = date.getDate();
    const y = date.getFullYear();
    if(m < 10) m = '0' + m;
    if(d < 10) d = '0' + d;
    return `${y}-${m}-${d}`;
}

function loadorder(){
    const orderdate = $('#orderdate').val();
    const orderdateto = $('#orderdateto').val();

    $.ajax({
        type: "GET",
        url: "{{ url('admin/get/order/information') }}",
        data: { orderdate, orderdateto },
        beforeSend: function(){
            // Optional loading indicator
            $('#total, #totalorderamount, #totalcompleteorderamount, #all, #pending, #readytoship, #hold, #shipped, #cancelled, #completed_new, #packaging')
                .text('...');
        },
        success: function(data){
            if(data.status === 'success'){
                $('#total').text(data.total);
                $('#totalorderamount').text(data.totalorderamount);
                $('#totalcompleteorderamount').text(data.totalcompleteorderamount);
                $('#all').text(data.all);
                $('#pending').text(data.pending);
                $('#readytoship').text(data.readytoship);
                $('#hold').text(data.hold);
                $('#shipped').text(data.shipped);
                $('#cancelled').text(data.cancelled);
                $('#completed_new').text(data.completed_new);
                $('#packaging').text(data.packaging);
            } else {
                alert('Something went wrong: ' + (data.message ?? 'Unknown error'));
            }
        },
        error: function(xhr){
            console.error(xhr.responseText);
            alert('Server error occurred!');
        }
    });
}
</script>
 
@endsection
