@extends('User.layout.main')
@section('content')
<h1> Create Invoice</h1>
<hr>
<div class="invoice">
	<form method="post">
		<table >
			<tr class="text-left">
				<td>Customer: </td>
				<td><select type="text" name="customer" placeholder="{{ $errors->first('customer')}}">
					@foreach($usr as $value)
					<option value="{{$value['id']}}">{{$value['name']}}</option>
					@endforeach
				</td>
			</tr>
			<tr class="text-left">
				<td>Currency: </td>
				<td><select type="text" name="currency" placeholder="{{ $errors->first('currency')}}">
					<option value="euro" >Euro</option>
					<option value="doller" >Doller</option>
					<option value="taka" >Taka</option>
				</td>
			</tr>
			<tr class="text-left">
				<td>Date: </td>
				<td><input type="date" name="date" placeholder="{{ $errors->first('date')}}"></td>
			</tr>
		</table><br><br>
<h1 class="text-center"> Sales Invoice Item</h1>
<hr>
		<table class="table table-striped table-bordered">
			<tr class="text-center">
				<td><b>Item </b></td>
				<td><b>Quantity </b></td>
				<td><b>Unit Price </b></td>
				<td><b>Discount % </b></td>
			</tr>
			<tr class="text-center">
				<td><select type="text" name="item" value="{{ $errors->first('item')}}">
					@foreach($pro as $value)
					<option value="{{$value['id']}}">{{$value['name']}}</option>
					@endforeach
				</td>
				<td><input type="text" name="quantity" placeholder="{{ $errors->first('quantity')}}"></td>
				<td><input type="text" name="unitprice" placeholder="{{ $errors->first('unitprice')}}"></td>
				<td><input type="text" name="discount" placeholder="{{ $errors->first('discount')}}"></td>
			</tr>
		</table><br><br>
		<input type="submit" name="create" value="Create" align="center">
	</form>
</div>
@endsection