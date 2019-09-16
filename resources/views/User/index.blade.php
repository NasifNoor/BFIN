@extends('User.layout.main')
@section('content')
<div>
	{{session('msg')}}
	</div>
<h1>User page</h1>
<hr>
<table>
	<tr>
		<td>Name :</td>
		<td>{{$usr['name']}}</td>
	</tr>
	<tr>
		<td>Email :</td>
		<td>{{$usr['email']}}</td>
	</tr>
	<tr>
		<td>Address : </td>
		<td>{{$usr['address']}}</td>
	</tr>
</table>
@endsection