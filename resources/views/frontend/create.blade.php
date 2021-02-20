@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/pickadate/classic.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/pickadate/classic.date.css') }}">
    @if(config('app.locale') == 'ar')
        <link rel="stylesheet" href="{{ asset('frontend/css/pickadate/rtl.css') }}">
    @endif
    <style>
        form.form label.error, label.error {
            color: red;
            font-style: italic;
        }
    </style>
@endsection
@section('content')
<div class="row justify-content-center">
<div class="col-12">
<div class="card">
<div class="card-header">
index
</div>
<div class="card-body">
<form action="{{route('invoce.store')}}" method="post" class="form">
@csrf
<div class="row">
<div class="col-4">
<div class="form-group">
<label for="customer_name">Customer name</label>
<input type="text" name="customer_name" class="form-control">
@error('customer_name')
<span class="text-danger help-block">{{$message}} </span>
@enderror
</div>
</div>
<div class="col-4">
<div class="form-group">
<label for="customer_email">Customer email</label>
<input type="text" name="customer_email" class="form-control">
@error('customer_email')
<span class="text-danger help-block">{{$message}} </span>
@enderror
</div>
</div>
<div class="col-4">
<div class="form-group">
<label for="customer_mobile">Customer mobile</label>
<input type="text" name="customer_mobile" class="form-control">
@error('customer_mobile')
<span class="text-danger help-block">{{$message}} </span>
@enderror
</div>
</div>
</div>


<div class="row">
<div class="col-4">
<div class="form-group">
<label for="company_name">company name</label>
<input type="text" name="company_name" class="form-control">
@error('company_name')
<span class="text-danger help-block">{{$message}} </span>
@enderror
</div>
</div>
<div class="col-4">
<div class="form-group">
<label for="invoice_number">invoice number</label>
<input type="text" name="invoice_number" class="form-control">
@error('invoice_number')
<span class="text-danger help-block">{{$message}} </span>
@enderror
</div>
</div>
<div class="col-4">
<div class="form-group">
<label for="invoice_date">invoice date</label>
<input type="text" name="invoice_date" class="form-control pickdate">
@error('invoice_date')
<span class="text-danger help-block">{{$message}} </span>
@enderror
</div>
</div>
</div>

<div class="table-responsive">
<table class="table" id="invoice_details">
<thead>
<tr>
  <th></th>
  <th>product name</th>
  <th>unit</th>
  <th>quantity</th>
  <th>unit price</th>
  <th>subtotal</th>
</tr>
</thead>
<tbody>
<tr class="cloning_row" id="0">
<td>#</td>
<td>
	<input type="text" name="product_name[0]" id="product_name" class="product_name form-control">
@error('product_name')
<span class="text-danger help-block">{{$message}} </span>
@enderror
</td>
<td>
	<select name="unit[0]" id="unit" class="unit form-control">
<option></option>
<option value="piece">piece</option>
<option value="g">gram</option>
<option value="kg">killo gram</option>
</select>		
@error('unit')
<span class="text-danger help-block">{{$message}} </span>
@enderror
</td>
<td>
<input type="number" name="quantity[0]" step="0.01" id="quantity" class="quantity form-control">
@error('quantity')
<span class="text-danger help-block">{{$message}} </span>
@enderror
</td>
<td>
<input type="number" name="unit_price[0]" step="0.01" id="unit_price" class="unit_price form-control">
@error('unit_price')
<span class="text-danger help-block">{{$message}} </span>
@enderror
</td>
<td>
<input type="number" name="row_sub_total[0]"   step="0.01" id="row_sub_total" class="row_sub_total form-control" readonly="readonly">
@error('row_sub_total')
<span class="text-danger help-block">{{$message}} </span>
@enderror
</td>
</tr>
</tbody>
<tfoot>
<tr>
  <td colspan="6">
<button type="button" class="btn_add btn btn-primary">Add Another product</button>
  </td>
</tr>
<tr>
<td colspan="3"></td>
<td colspan="2"> subtotal</td>
<td><input type="number" name="sub_total" id="sub_total" class="sub_total form-control" readonly="readonly"></td>
</tr>
<tr>
<td colspan="3"></td>
<td colspan="2"> Discount</td>
<td>
<div class="input-group mb-3">
<select name="discount_type" id="discount_type" class="discount_type custom-select">
<option value="fixed">SR</option>
<option value="percentage">percentage</option>
</select>
<div class="input-group-append">
<input type="number" step="0.01" name="discount_value" id="discount_value" class="discount_value form-control" value="0.00">
</div>
</div>
</td>
</tr>
<tr>
<td colspan="3"></td>
<td colspan="2"> Vat (5%)</td>
<td><input type="number" step="0.01" name="vat_value" id="vat_value" class="vat_value form-control" readonly="readonly"></td>
</tr>
<tr>
<td colspan="3"></td>
<td colspan="2">shipping</td>
<td><input type="number" step="0.01" name="shipping" id="shipping" class="shipping form-control" ></td>
</tr>
<tr>
<td colspan="3"></td>
<td colspan="2">Total Due</td>
<td><input type="number" step="0.01" name="total_due" id="total_due" class="total_due form-control" readonly="readonly"></td>
</tr>
</tfoot>
</table>
</div>

<div class="text-right pt-3x">
<button type="submit" name="save" class="btn btn-primary">Save</button>
</div>
</form>

</div>
</div>
</div>
</div>
@endsection
@section('script')
 <script src="{{ asset('frontend/js/form_validation/jquery.form.js') }}"></script>
    <script src="{{ asset('frontend/js/form_validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/js/form_validation/additional-methods.min.js') }}"></script>

 <script src="{{ asset('frontend/js/pickadate/picker.js') }}"></script>
    <script src="{{ asset('frontend/js/pickadate/picker.date.js') }}"></script>
     @if(config('app.locale') == 'ar')
           <script src="{{ asset('frontend/js/form_validation/messages_ar.js') }}"></script>
        <script src="{{ asset('frontend/js/pickadate/ar.js') }}"></script>
    @endif

<script src="{{asset('frontend/js/custom.js')}}"></script>
@endsection