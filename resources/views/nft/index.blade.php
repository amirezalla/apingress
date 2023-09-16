@extends('layouts.admin')

@section('page-title')
    {{__('Nfts')}}
@endsection

@section('breadcrumb')
{{--    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>--}}
    <li class="breadcrumb-item"><a href="">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Order')}}</li>
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
                                <th>{{__('Order Id')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Plan Name')}}</th>
                                <th>{{__('Price')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Payment Type')}}</th>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Coupon')}}</th>
                                <th>{{__('Invoice')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($nfts as $nft)
                                <tr>
                                    <td>{{$nft->id}}</td>
                                    <td>{{$nft->title}}</td>
                                    <td>{{$nft->description}}</td>
                                    <td>{{env('CURRENCY_SYMBOL')}}{{number_format($nft->price)}}</td>
                                    <td>
                                        @if($nft->payment_status == 'succeeded')
                                            <span class="status_badge badge bg-primary p-2 px-3 rounded">{{ucfirst($nft->is_vitrina)}}</span>
                                        @else
                                            <span class="status_badge badge bg-danger p-2 px-3 rounded">{{ucfirst($nft->user_id)}}</span>
                                        @endif
                                    </td>
                                    <td>{{$nft->category_id}}</td>
{{--                                    <td>{{$nft->created_at->format('d M Y')}}</td>--}}
{{--                                    <td>{{!empty($nft->use_coupon)?$nft->use_coupon->coupon_detail->name:'-'}}</td>--}}
                                    <td class="Id">
                                        @if(empty($nft->receipt))
                                            <p>{{__('Manually plan upgraded by Super Admin')}}</p>
                                        @elseif($nft->receipt =='free coupon')
                                            <p>{{__('Used 100 % discount coupon code.')}}</p>
                                        @else
                                            <a href="{{$nft->receipt}}" target="_blank"><i class="ti ti-file-invoice"></i> {{__('Invoice')}}</a>
                                        @endif
                                    </td>
                                    <td><a href="#" data-url="http://fintechcoin.info/project-task-stages/29/edit" data-ajax-popup="true" data-bs-toggle="tooltip" title="" data-title="Edit Bug Status" class="mx-3 btn btn-sm d-inline-flex align-items-center" data-bs-original-title="Edit">
                                            <i class="ti ti-pencil text-white"></i>
                                        </a></td>
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
