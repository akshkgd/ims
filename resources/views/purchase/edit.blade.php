@extends('layouts.ims')

@section('content')
<style>
    #hidden_div {
    display: none;
}
</style>
<div class="content ">

    <form action="{{ route('purchase.update',  Crypt::encrypt($purchase->id)) }}" class="w-600 mw-full" method="POST">
        
    @method('Patch')  
    @csrf

        <div class="form-group">
            <label class="required">Select Product</label>
            <select class="form-control" name="product_id" required="required" >
                <option value="{{$purchase->product_id}}" selected="selected" >{{$purchase->item->name}}</option>
                @foreach ($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>

        <!-- <div class="form-group">
            <label for="username" class="required">Select Product</label>
            <input type="text" name="product_id" class="form-control" placeholder="Select Product">
        </div> -->
        <div class="form-group">
            <label for="username" class="required">Date of Purchase</label>
            <p>Date Format: yyyy-mm-dd</p>
            <input type="text" name="date_of_purchase" class="form-control" value="{{$purchase->date_of_purchase}}">
        </div>

        <div class="form-group">
            <label class="required">Select Supplier</label>
            <select class="form-control" name="supplier_id" required="required" value="{{$purchase->supplier_id}}">
                <option value="{{$purchase->supplier_id}}" selected="selected" >{{$purchase->supplier->name}}</option>
                @foreach ($suppliers as $supplier)
                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="username" class="">Date of Delivery</label>
            <p>Date Format: yyyy-mm-dd</p>
            <input type="text" name="date_of_delivery" class="form-control" value="{{$purchase->date_of_delivery}}">
        </div>
        <div class="form-group">
            <label for="username" class="">Invoice Number</label>
            <input type="text" name="invoice_number" class="form-control" value="{{$purchase->invoice_number}}">
        </div>

        <div class="form-group">
            <label for="username" class="required">Purchase Order Number</label>
            <input type="text" name="purchase_order_number" class="form-control" value="{{$purchase->purchase_order_number}}">
        </div>

        <!-- <div class="form-group">
            <label for="username" class="required">Quantity Purchased</label>
            <input type="text" name="purchase_order_number" class="form-control" placeholder="Purchase Order Number">
        </div> -->

        <div class="form-group">
            <label  class="required">Quantity Purchased</label>
            <input type="text" name="quantity_purchased" class="form-control" value="{{$purchase->quantity_purchased}}">
        </div>

        <div class="form-group">
            <label  class="">Rate per unit</label>
            <input type="text" name="rate_per_unit" class="form-control" value="{{$purchase->rate_per_unit}}">
        </div>

        
        <div class="form-group">
            <label class="required">Process Adopted for Purchase</label>
            <select class="form-control" name="process_adopted" required="required" value="{{$purchase->process_adopted}}">
                <option value="{{$purchase->process_adopted}}" selected="selected" >{{$purchase->process_adopted}}</option>
                <option value="E-gem">E-gem</option>
                <option value="Bidding">Bidding</option>
                <option value="Local">Local</option>
            </select>
        </div>
        <div class="form-group">
            <label  class="required">Head</label>
            <input type="text" name="head" class="form-control" value="{{$purchase->head}}">
        </div>

        <div class="form-group" >
            <label for="username" class="required">Purpose of Purchase</label>
            <select class="form-control" name="purpose_of_purchase" required="required" onchange="showDiv('hidden_div', this)" value="{{$purchase->purpose_of_purchase}}">
                <option value="{{$purchase->purpose_of_purchase}}" selected="selected">{{$purchase->purpose_of_purchase}}</option>
                <option value="Central Store">Central Store</option>
                <option value="Purchase on Request">Purchase on Request</option>
                
            </select>
        </div>

        <div class="form-group" id="hidden_div">
            <label >Select Departemnt Which Requested</label>
            <select class="form-control" name = "department_id" value="{{$purchase->department_id}}">
                <option value="{{$purchase->department_id}}" selected="selected" >{{$purchase->department_id}}</option>
                @foreach ($departments as $department)
                <option value="{{$department->id}}">{{$department->name}}</option>
                @endforeach
            </select>
            <div class=" pt-2 mt-2">
            <label  class="required mt-1">Intender Name </label>
            <input type="text" name="intender" class="form-control" value="{{$purchase->intender}}">
        </div>
        </div>
        <div>
        </div>
        <input type="hidden" name="old_pon" value="{{$purchase->purchase_order_number}}">
        <input class="btn btn-primary btn-block" type="submit" value="Update Purchase Details">
    </form>
</div>

<script>
    function showDiv(divId, element)
{
    document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
}
</script>
@endsection