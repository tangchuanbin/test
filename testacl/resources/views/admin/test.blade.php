@extends('admin.layout.template')
@section('content')
	<ul>
		@foreach($users as $user)
			<li>{{ $user->name }}</li>	
		@endforeach		
	</ul>	
	{!! $users->render() !!}
@endsection


