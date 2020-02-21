@extends('layouts.app')

@section('content')
<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<a href="{{Route('companies.create')}}" class="btn btn-success">Create Company</a>
					<br><br>
				</div>
				<div class="col-sm-12">
					<div class="box">
						<div class="box-header">
						</div>
                        <div class="table-responsive">


                          <table class="table">
                            <thead>
                              <tr>

                                <th class="centertxt">#</th>
                                <th class="centertxt">@lang('Company Name')</th>
                                <th class="centertxt">@lang('Email')</th>
                                <th class="centertxt">@lang('logo')</th>
                                <th class="centertxt">@lang('website')</th>
                                <th class="centertxt">@lang('Created At')</th>
                                <th class="centertxt">@lang('Operations')</th>

                              </tr>
                            </thead>
                            <tbody>


                              @forelse($companies as $company)
	                                <tr>
                                    <td class="centertxt">{{$loop->iteration}}</td>
	                                  <td class="centertxt">
	                                    <a href="{{ Route('companies.show',$company->id) }}">
	                                    	{{ $company->name}}</a>
	                                  </td>
                                      <td class="centertxt">{{ $company->email }}</td>
                                      <td class="centertxt">
                                      	@if(!empty($company->logo))
                                      	<img style=" height: 50px; width: 50px; border-radius: 20px;"  src="{{url(\Storage::disk('local')->url("app/".$company->logo))}}">
                                      	@else

                                      	@endif
                                   	  </td>

                                      <td class="centertxt">{{ $company->website  }}</td>
                                      <td class="centertxt">{{ $company->created_at  }}</td>
                                      <td class="centertxt">
                                        <div class="col-sm-12">

                                            <a title="{{__('Show')}}" href="{{ Route('companies.show',$company->id) }}" class="btn btn-primary btn-rounded legitRipple" ><i  class="fa fa-edit centertxt ">  </i>{{__('Show')}}</a>
                                              <a title="{{__('Edit')}}" href="{{ Route('companies.edit',$company->id) }}" class="btn btn-success btn-rounded legitRipple" ><i  class="fa fa-edit centertxt ">  </i>{{__('Edit')}}</a>
											<form action="{{ Route('companies.destroy',$company->id) }}" method="POST" perventD>
												@method('DELETE')
												@csrf
												 <button  onclick="return confirm('Are you sure you want to delete this element')" title=" {{__('Delete')}}"  class="btn btn-danger btn-rounded legitRipple " ><i class="fa fa-trash centertxt"> </i>{{__('Delete')}}</button>
											</form>
                                          </div>
                                        </div>
                                      </td>
	                                </tr>

                                @empty
                                <td colspan="7" style="text-align: center;"><h4>@lang('No Data in this table')</h4></td>
                              @endforelse
                            </tbody>
                          </table>

                            <div class="paginate">

                                <center>{{ $companies->links() }}</center>
                            </div>

                        </div>
					<div>
				</div>
			</div>
</div>
@endsection
