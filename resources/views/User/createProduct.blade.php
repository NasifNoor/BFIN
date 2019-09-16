@extends('User.layout.main')
@section('content')
<h1> Create Product</h1>
<hr>
<div>
	<form method="post">
		<table>
			<tr>
				<td>Name: </td>
				<td><input type="text" name="name" value="{{ $errors->first('name')}}"></td>
			</tr>
			<tr>
				<td>Category: </td>
				<td><input type="text" name="category" value="{{ $errors->first('category')}}"></td>
			</tr>
			<tr>
				<td>Description: </td>
				<td><input type="text" name="description" value="{{ $errors->first('description')}}"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="create" value="Create"></td>
			</tr>
		</table>
	</form>
</div>
@endsection