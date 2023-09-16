@extends('layouts.admin')
@php
   // $profile=asset(Storage::url('uploads/avatar/'));
//    $profile=\App\Models\Utility::get_file('uploads/avatar');
@endphp
@section('page-title')
    {{__('Manage User')}}
@endsection
@push('script-page')
@endpush
@section('breadcrumb')
{{--    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>--}}
    <li class="breadcrumb-item"><a href="">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('User')}}</li>
@endsection
@section('action-btn')
    @can('create user')
        <div class="float-end">
            <a href="#" data-size="lg" data-url="{{ route('users.create') }}" data-ajax-popup="true"  data-bs-toggle="tooltip" title="{{__('Create')}}"  class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        </div>
    @endcan
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>{{__('Category Id')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Description')}}</th>
                                <th>{{__('Action')}}</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $user)

                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{ ucfirst($user->type) }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->last_login_at}}</td>

                                    <td>{{$user->name}}</td>
                                    <td>{{$user->description}}</td>
                                    <td>
                                        <a href="#!" data-size="lg" data-url="{{ route('users.edit',$user->id) }}" data-ajax-popup="true" class="dropdown-item" data-bs-original-title="{{__('Edit User')}}">
                                            <i class="ti ti-pencil"></i>
                                            <span>{{__('Edit')}}</span>
                                        </a>
                                    </td>

                                    <td class="Action">
                                        <span>

                                                <div class="action-btn bg-primary ms-2">
                                                        <a href="#" class="mx-3 btn btn-sm align-items-center" data-url="" data-ajax-popup="true" data-title="{{__('Edit Competencies')}}" data-bs-toggle="tooltip" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}">
                                                            <i class="ti ti-pencil text-white"></i>
                                                        </a>
                                                    </div>
                                        </span>
                                    </td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-12">
            <div class="row">
                @foreach($users as $user)
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-header border-0 pb-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">
                                        <div class="badge bg-primary p-2 px-3 rounded">
                                            {{ ucfirst($user->type) }}
                                        </div>
                                    </h6>
                                </div>


                                @if(Gate::check('edit user') || Gate::check('delete user'))
                                    <div class="card-header-right">
                                        <div class="btn-group card-option">
                                            @if($user->is_active==1)
                                                <button type="button" class="btn dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-end">

                                                    @can('edit user')
                                                        <a href="#!" data-size="lg" data-url="{{ route('users.edit',$user->id) }}" data-ajax-popup="true" class="dropdown-item" data-bs-original-title="{{__('Edit User')}}">
                                                            <i class="ti ti-pencil"></i>
                                                            <span>{{__('Edit')}}</span>
                                                        </a>
                                                    @endcan

                                                    @can('delete user')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user['id']],'id'=>'delete-form-'.$user['id']]) !!}
                                                        <a href="#!"  class="dropdown-item bs-pass-para">
                                                            <i class="ti ti-archive"></i>
                                                            <span> @if($user->delete_status!=0){{__('Delete')}} @else {{__('Restore')}}@endif</span>
                                                        </a>
                                                        {!! Form::close() !!}
                                                    @endcan

                                                    <a href="#!" data-url="{{route('users.reset',\Crypt::encrypt($user->id))}}" data-ajax-popup="true" data-size="md" class="dropdown-item" data-bs-original-title="{{__('Reset Password')}}">
                                                        <i class="ti ti-adjustments"></i>
                                                        <span>  {{__('Reset Password')}}</span>
                                                    </a>
                                                </div>
                                            @else
                                                <a href="#" class="action-item"><i class="ti ti-lock"></i></a>
                                            @endif

                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body full-card">
                                <div class="img-fluid rounded-circle card-avatar">
                                    <img src="{{(!empty($user->avatar))? asset(Storage::url("uploads/avatar/".$user->avatar)): asset(Storage::url("uploads/avatar/avatar.png"))}}" class="img-user wid-80 round-img rounded-circle">
                                </div>
                                <h4 class=" mt-3 text-primary">{{ $user->name }}</h4>
                                @if($user->delete_status==0)
                                    <h5 class="office-time mb-0">{{__('Soft Deleted')}}</h5>
                                @endif
                                <small class="text-primary">{{ $user->email }}</small>
                                <p></p>
                                <div class="text-center" data-bs-toggle="tooltip" title="{{__('Last Login')}}">
                                    {{ (!empty($user->last_login_at)) ? $user->last_login_at : '' }}
                                </div>

                                    <div class="mt-4">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-6 text-center">
                                                <span class="d-block font-bold mb-0">{{!empty($user->currentPlan)?$user->currentPlan->name:''}}</span>
                                            </div>

                                            <div class="col-12">
                                                <hr class="my-3">
                                            </div>
                                            <div class="col-12 text-center pb-2">
                                                <span class="text-dark text-xs">{{__('Plan Expired : ') }} {{!empty($user->plan_expire_date) ? \Auth::user()->dateFormat($user->plan_expire_date): __('Unlimited')}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-12">
                                            <div class="card mb-0">
                                                <div class="card-body p-3">
                                                    <div class="row">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
