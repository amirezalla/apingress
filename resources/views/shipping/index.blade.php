@extends('layouts.admin')

@section('page-title')
    {{__('shippings')}}
@endsection

@section('breadcrumb')
{{--    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>--}}
    <li class="breadcrumb-item"><a href="">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('shipping')}}</li>
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-bshipping-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>{{__('shipping Id')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Plan Name')}}</th>
                                <th>{{__('Price')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Payment Type')}}</th>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Coupon')}}</th>
                                <th>{{__('Invoice')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($shippings as $shipping)
                                <tr>
                                    <td>{{$shipping->id}}</td>
                                    <td>{{$shipping->user_id}}</td>
                                    <td>{{$shipping->order_id}}</td>
                                    <td>{{$shipping->shipment_status}}</td>
                                    <td>{{$shipping->tracking_number}}</td>

                                    <td>
                                        @if($shipping->payment_status == 'succeeded')
                                            <span class="status_badge badge bg-primary p-2 px-3 rounded">{{ucfirst($shipping->payment_status)}}</span>
                                        @else
                                            <span class="status_badge badge bg-danger p-2 px-3 rounded">{{ucfirst($shipping->payment_status)}}</span>
                                        @endif
                                    </td>
                                    <td>{{$shipping->payment_type}}</td>
{{--                                    <td>{{$shipping->created_at->format('d M Y')}}</td>--}}
{{--                                    <td>{{!empty($shipping->use_coupon)?$shipping->use_coupon->coupon_detail->name:'-'}}</td>--}}
                                    <td class="Id">
                                        @if(empty($shipping->receipt))
                                            <p>{{__('Manually plan upgraded by Super Admin')}}</p>
                                        @elseif($shipping->receipt =='free coupon')
                                            <p>{{__('Used 100 % discount coupon code.')}}</p>
                                        @else
                                            <a href="{{$shipping->receipt}}" target="_blank"><i class="ti ti-file-invoice"></i> {{__('Invoice')}}</a>
                                        @endif
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
