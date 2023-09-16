@extends('layouts.admin')

@section('page-title')
    {{__('bids')}}
@endsection

@section('breadcrumb')
{{--    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>--}}
    <li class="breadcrumb-item"><a href="">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('bid')}}</li>
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-bbid-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>{{__('bid Id')}}</th>
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
                            @foreach($bids as $bid)
                                <tr>
                                    <td>{{$bid->id}}</td>
                                    <td>{{$bid->user_id}}</td>
                                    <td>{{$bid->nft_id }}</td>

                                    <td>{{env('CURRENCY_SYMBOL')}}{{number_format($bid->bid_amount)}}</td>
                                    <td>
                                        @if($bid->payment_status == 'succeeded')
                                            <span class="status_badge badge bg-primary p-2 px-3 rounded">{{ucfirst($bid->payment_status)}}</span>
                                        @else
                                            <span class="status_badge badge bg-danger p-2 px-3 rounded">{{ucfirst($bid->payment_status)}}</span>
                                        @endif
                                    </td>
                                    <td>{{$bid->payment_type}}</td>
                                    <td>{{$bid->created_at->format('d M Y')}}</td>
                                    <td>{{!empty($bid->use_coupon)?$bid->use_coupon->coupon_detail->name:'-'}}</td>
                                    <td class="Id">
                                        @if(empty($bid->receipt))
                                            <p>{{__('Manually plan upgraded by Super Admin')}}</p>
                                        @elseif($bid->receipt =='free coupon')
                                            <p>{{__('Used 100 % discount coupon code.')}}</p>
                                        @else
                                            <a href="{{$bid->receipt}}" target="_blank"><i class="ti ti-file-invoice"></i> {{__('Invoice')}}</a>
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
