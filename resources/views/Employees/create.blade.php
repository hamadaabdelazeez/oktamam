@extends('layouts.app')

@section('content')

	<form method="POST" action="{{Route('employees.store')}}">
		{{ csrf_field() }}
		<div class="form-group col-sm-6">
			<label class="control-label text-bold" for="first_name">@lang('first name')</label>
			<input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}"  id="name" placeholder="@lang('Enter Name')">
		    @if ($errors->has('first_name'))
		        <label class="validation-error-label" role="alert">
		            <strong>{{ $errors->first('first_name') }}</strong>
		        </label>
		    @endif
		</div>

		<div class="form-group col-sm-6">
			<label class="control-label text-bold" for="last_name">@lang('last name')</label>
			<input type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}"  id="last_name" placeholder="@lang('Enter Name')">
		    @if ($errors->has('last_name'))
		        <label class="validation-error-label" role="alert">
		            <strong>{{ $errors->first('last_name') }}</strong>
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
			<label class="control-label text-bold" for="phone">@lang('phone')</label>
			<input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}"  id="phone" placeholder="@lang('Enter Phone')">
		    @if ($errors->has('phone'))
		        <label class="validation-error-label" role="alert">
		            <strong>{{ $errors->first('phone') }}</strong>
		        </label>
		    @endif
		</div>
		<div class="form-group col-sm-6">
			  <label  for="Company text-bold" class="control-label text-bold">@lang('Company') : </label>
			  <select id="Company"  name="company_id" class="form-control {{ $errors->has('Company') ? ' is-invalid' : '' }}">
			  	<option value="">@lang('Select Company')</option>

			  	@foreach($companies as $key => $value)
					  		<option value="{{ $key}}"
					  			@if(old('company_id') ==  $key)
					  			selected
					  			@endif>
					  			@lang($value)
					  		</option>
				@endforeach
			  </select>
                @if ($errors->has('company_id'))
                    <label class="validation-error-label text-bold" role="alert">
                        <strong>{{ $errors->first('company_id') }}</strong>
                    </label>
                @endif
		</div>

		<div class="form-group col-sm-3 text-right" style="padding: 10px;">
			<button type="submit" class="btn btn-info ">@lang('Submit')</button>
		</div>
	</form>
@endsection