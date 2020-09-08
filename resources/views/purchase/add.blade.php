@extends('layouts.ims')

@section('content')
<style>
    #hidden_div {
    display: none;
}
</style>
<div class="content ">

    <form action="{{ route('purchase.store') }}" class="w-600 mw-full" method="POST">
        @csrf

        <div class="form-group">
            <label class="required">Select Product</label>
            <select class="form-control" name="product_id" required="required">
                <option value="" selected="selected" disabled="disabled">Select Product</option>
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
            <input type="text" name="date_of_purchase" class="form-control" placeholder="Select Product">
        </div>

        <div class="form-group">
            <label class="required">Select Supplier</label>
            <select class="form-control" name="supplier_id" required="required">
                <option value="" selected="selected" disabled="disabled">Select Supplier for this purchase</option>
                @foreach ($suppliers as $supplier)
                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="username" class="required">Invoice Number</label>
            <input type="text" name="invoice_number" class="form-control" placeholder="Invoice Number">
        </div>

        <div class="form-group">
            <label for="username" class="required">Purchase Order Number</label>
            <input type="text" name="purchase_order_number" class="form-control" placeholder="Purchase Order Number">
        </div>

        <!-- <div class="form-group">
            <label for="username" class="required">Quantity Purchased</label>
            <input type="text" name="purchase_order_number" class="form-control" placeholder="Purchase Order Number">
        </div> -->

        <div class="form-group">
            <label  class="required">Quantity Purchased</label>
            <input type="text" name="quantity_purchased" class="form-control" placeholder="Quantity Purchased">
        </div>

        <div class="form-group">
            <label  class="required">Rate per unit</label>
            <input type="text" name="rate_per_unit" class="form-control" placeholder="Rate per unit">
        </div>

        
        <div class="form-group">
            <label class="required">Process Adopted for Purchase</label>
            <select class="form-control" name="process_adopted" required="required">
                <option value="" selected="selected" disabled="disabled">Select Process Adopted for Purchase</option>
                <option value="E-gen">E-gen</option>
                <option value="Bidding">Bidding</option>
                <option value="Local">Local</option>
            </select>
        </div>
        <div class="form-group" >
            <label for="username" class="required">Purpose of Purchase</label>
            <select class="form-control" name="purpose_of_purchase" required="required" onchange="showDiv('hidden_div', this)">
                <option value="" selected="selected" disabled="disabled">Select Purpose Of Purchase</option>
                <option value="0">Central Store</option>
                <option value="1">Purchase on Request</option>
                
            </select>
        </div>

        <div class="form-group" id="hidden_div">
            <label >Select Departemnt Which Requested</label>
            <select class="form-control" name = "department_id">
                <option value="" selected="selected" disabled="disabled">Select Department</option>
                @foreach ($departments as $department)
                <option value="{{$department->id}}">{{$department->name}}</option>
                @endforeach
            </select>
        </div>

        <div>
        </div>
        <input class="btn btn-primary btn-block" type="submit" value="Add Purchase Details">
    </form>
</div>

<script>
    function showDiv(divId, element)
{
    document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
}
</script>
@endsection