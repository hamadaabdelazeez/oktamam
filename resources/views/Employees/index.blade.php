@extends('layouts.app')

@section('content')
<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<a href="{{Route('employees.create')}}" class="btn btn-success">Create employee</a>
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
                                <th class="centertxt">@lang('First Name')</th>
                                <th class="centertxt">@lang('Last Name')</th>
                                <th class="centertxt">@lang('Company')</th>
                                <th class="centertxt">@lang('email')</th>
                                <th class="centertxt">@lang('phone')</th>
                                <th class="centertxt">@lang('Created At')</th>
                                <th class="centertxt" colspan="2">@lang('Oprations')</th>

                              </tr>
                            </thead>
                            <tbody>

                              
                              @forelse($employees as $employee)
	                                <tr>
                                    <td class="centertxt">{{$loop->iteration}}</td>
	                                  <td class="centertxt">
	                                    <a href="{{ Route('employees.show',$employee->id) }}">
	                                    	{{ $employee->first_name}}</a>
	                                  </td>
                                      <td class="centertxt">{{ $employee->last_name }}</td>
                                    
                                      <td class="centertxt">{{ $employee->company->name  }}</td>
                                      <td class="centertxt">{{ $employee->email  }}</td>
                                      <td class="centertxt">{{ $employee->phone  }}</td>
                                      <td class="centertxt">{{ $employee->created_at  }}</td>
                                      <td class="centertxt" colspan="2">
                                        <a title="{{__('Edit')}}" href="{{ Route('employees.edit',$employee->id) }}" class="btn btn-success btn-rounded legitRipple" ><i  class="fa fa-edit centertxt ">  </i>{{__('Edit')}}</a>
                                        <a title="{{__('show')}}" href="{{ Route('employees.show',$employee->id) }}" class="btn btn-primary btn-rounded legitRipple" ><i  class="fa fa-edit centertxt ">  </i>{{__('Show')}}</a>
                  											<form action="{{ Route('employees.destroy',$employee->id) }}" method="POST">
                  												@method('DELETE')
                  												@csrf
                  												 <button title=" {{__('Delete')}}"  class="btn btn-danger btn-rounded legitRipple " 
                                            onclick="return confirm('Are you sure you want to delete this element')"

                                           ><i class="fa fa-trash centertxt"> </i>{{__('Delete')}}</button>
                  											</form>
                                     
                                      </td>
	                                </tr>

                                @empty
                                <td colspan="7" style="text-align: center;"><h4>@lang('No Data in this table')</h4></td>
                              @endforelse
                            </tbody>
                          </table>
                            
                            <div class="paginate">

                                <center>{{ $employees->links() }}</center>
                            </div>
         
                        </div>
					<div>
				</div>
			</div>
</div>
@endsection
