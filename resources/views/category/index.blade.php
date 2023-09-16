@extends('layouts.admin')

@section('page-title')
    {{__('Category')}}
@endsection

@section('breadcrumb')
{{--    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>--}}
    <li class="breadcrumb-item"><a href="">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Category')}}</li>
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
                            @foreach($nftcategories as $nftcategory)
                                <tr>
                                    <td>{{$nftcategory->id}}</td>
                                    <td>{{$nftcategory->name}}</td>
                                    <td>{{$nftcategory->description}}</td>
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
@endsection
