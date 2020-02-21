@extends('layouts.app')

@section('content')

	<form method="POST" action="{{Route('companies.store')}}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group col-sm-6">
			<label class="control-label text-bold" for="name">@lang('name')</label>
			<input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  id="name" placeholder="@lang('Enter Name')">
		    @if ($errors->has('name'))
		        <label class="validation-error-label" role="alert">
		            <strong>{{ $errors->first('name') }}</strong>
		        </label>
		    @endif
		</div>
		<div class="form-group col-sm-6">
			<label class="control-label text-bold" for="email">@lang('email')</label>
			<input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  id="email" placeholder="@lang('Enter Name')">
		    @if ($errors->has('email'))
		        <label class="validation-error-label" role="alert">
		            <strong>{{ $errors->first('email') }}</strong>
		        </label>
		    @endif
		</div>
		<div class="form-group col-sm-6">
			<label class="control-label text-bold" for="website">@lang('Website')</label>
			<input type="url" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" name="website" value="{{ old('website') }}"  id="website" placeholder="@lang('Enter website')">
		    @if ($errors->has('website'))
		        <label class="validation-error-label" role="alert">
		            <strong>{{ $errors->first('website') }}</strong>
		        </label>
		    @endif
		</div>
		<div class="form-group col-sm-6">
			<label class="control-label text-bold" for="logo">@lang('Logo')</label>
			<input type="file" class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" name="logo" value="{{ old('logo') }}"  id="website" placeholder="@lang('Enter logo')">
		    @if ($errors->has('logo'))
		        <label class="validation-error-label" role="alert">
		            <strong>{{ $errors->first('logo') }}</strong>
		        </label>
		    @endif
		</div>
		<div class="form-group col-sm-3 text-right" style="padding: 10px;">
			<button type="submit" class="btn btn-info ">@lang('Submit')</button>
		</div>
	</form>
@endsection