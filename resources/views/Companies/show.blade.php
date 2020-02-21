@extends('layouts.app')

@section('content')
		<div class="form-group col-sm-6">
			<label class="control-label text-bold" for="name">@lang('name')</label>
			<input disabled type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $company->name }}"  id="name" placeholder="@lang('Enter Name')">
		    @if ($errors->has('name'))
		        <label class="validation-error-label" role="alert">
		            <strong>{{ $errors->first('name') }}</strong>
		        </label>
		    @endif
		</div>
		<div class="form-group col-sm-6">
			<label class="control-label text-bold" for="email">@lang('email')</label>
			<input disabled type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $company->email }}"  id="email" placeholder="@lang('Enter Name')">
		    @if ($errors->has('email'))
		        <label class="validation-error-label" role="alert">
		            <strong>{{ $errors->first('email') }}</strong>
		        </label>
		    @endif
		</div>
		<div class="form-group col-sm-6">
			<label class="control-label text-bold" for="website">@lang('Website')</label>
			<input disabled type="url" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" name="website" value="{{ $company->website }}"  id="website" placeholder="@lang('Enter website')">
		    @if ($errors->has('website'))
		        <label class="validation-error-label" role="alert">
		            <strong>{{ $errors->first('website') }}</strong>
		        </label>
		    @endif
		</div>
		<div class="form-group col-sm-6">
			<img height="150" width="150" src="{{Storage::disk('local')->url($company->logo)}}">
		</div>

@endsection