@extends('User.layout.main')
@section('content')
<h1> Create Customer</h1>
<hr>
<div>
	<form method="post">
		<table>
			<tr>
				<td>Name: </td>
				<td><input type="text" name="name" placeholder="{{ $errors->first('name')}}"></td>
			</tr>
			<tr>
				<td>Email: </td>
				<td><input type="text" name="email" placeholder="{{ $errors->first('email')}}"></td>
			</tr>
			<tr>
				<td>Address: </td>
				<td><input type="text" name="address" placeholder="{{ $errors->first('address')}}"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="create" value="Create"></td>
			</tr>
		</table>
	</form>
</div>
@endsection