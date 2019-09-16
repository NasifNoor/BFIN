@extends('User.layout.main')
@section('content')
<div>
	{{session('msg')}}
</div>
<h1> View Invoice</h1>
<hr>
<form method="post">
	<table class="table table-striped table-bordered">
		<tr class="text-center">
			<td><b>Invoice Id </b></td>
			<td><b>Customer Name </b></td>
			<td><b>Customer Email</b></td>
			<td><b>Date </b></td>
			<td><b>Price </b></td>
			<td><b>Currency </b></td>
			<td><b>Action </b></td>
		</tr>
		@if(count($inv) > 0)
		@foreach($inv as $value)
		<tr class="text-center">
			<td>{{$value['id']}}</td>
			<td>{{$value['customername']}}</td>
			<td>{{$value['customeremail']}}</td>
			<td>{{$value['date']}}</td>
			<td>{{$value['amount']}}</td>
			<td>{{$value['currency']}}</td>
			<td>
				<a href="/view/{{$value['id']}}">View</a>				
			</td>
		</tr>
		@endforeach
		
		@else
		<tr>
        	<td align="center" colspan="7">No Data Found</td>
        </tr>
		@endif
	</table>
</form>
@endsection