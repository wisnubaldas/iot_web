@extends('layouts.empty', ['paceTop' => true])

@section('title', '403 Error Page')

@section('content')
	<!-- begin error -->
	<div class="error">
		<div class="error-code">403</div>
		<div class="error-content">
			<div class="error-message">{{__('Forbidden')}}</div>
			<div class="error-desc mb-3 mb-sm-4 mb-md-5">
				{{__($exception->getMessage() ?: 'Forbidden')}}
			</div>
			<div>
				<a href="{{url()->previous()}}" class="btn btn-success p-l-20 p-r-20">Go Back</a>
			</div>
		</div>
	</div>
	<!-- end error -->
@endsection
        
