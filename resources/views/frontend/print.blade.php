@extends('layouts.print')
@section('content')
<div class="row justify-content-center">
<div class="col-12">
<div class="card">
<div class="card-header d-flex text-center">
show invoice
</div>
<div class="card-body">
	<div class="table-responsive">
<table class="table">
<tr>
<th>customer name</th>
<td>{{$invoice->customer_name}}</td>
<th>customer email</th>
<td>{{$invoice->customer_email}}</td>
</tr>
<tr>
<th>customer mobile</th>
<td>{{$invoice->customer_mobile}}</td>
<th>company name</th>
<td>{{$invoice->company_name}}</td>
</tr>
<tr>
<th>invoice number</th>
<td>{{$invoice->invoice_number}}</td>
<th>invoice date</th>
<td>{{$invoice->invoice_date}}</td>
</tr>
</table>

<h3>invoice details</h3>
<table class="table">
<thead>
	<tr>
<th></th>
<th>product_name</th>
<th>unit</th>
<th>quantity</th>
<th>unit_price</th>
<th>row_sub_total</th>
</tr>
</thead>
<tbody>
	@foreach($invoice->details as $item)
<tr>
<td width="5%">{{$loop->iteration}}</td>
<td width="35%">{{$item->product_name}}</td>
<td width="10%">{{$item->unitText()}}</td>
<td width="10%">{{$item->quantity}}</td>
<td width="10%">{{$item->unit_price}}</td>
<td width="">{{$item->row_sub_total}}</td>
</tr>
@endforeach
</tbody>
<tfoot>
<tr>
<td colspan="3"></td>
<td colspan="2">sub total</td>
<td>{{$invoice->sub_total}}</td>
</tr>

<tr>
<td colspan="3"></td>
<td colspan="2">discount</td>
<td>{{$invoice->discountResult()}}</td>
</tr>
<tr>
<td colspan="3"></td>
<td colspan="2">vat</td>
<td>{{$invoice->vat_value}}</td>
</tr>
<tr>
<td colspan="3"></td>
<td colspan="2">shipping</td>
<td>{{$invoice->shipping}}</td>
</tr>
<tr>
<td colspan="3"></td>
<td colspan="2">total_due</td>
<td>{{$invoice->total_due}}</td>
</tr>
</tfoot>

</table>
</div>
</div>
</div>
</div>
</div>
@endsection

@section('script')
<script>
window.print();
</script>


@endsection