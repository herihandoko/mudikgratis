@php
$page_title =  'Transactions';
@endphp
@extends('frontend.layouts.master')
@section('content')
    <div id="wrapper" class="clearfix">
        <!-- Header -->
        @include(getHeader())
        <!-- Start main-content -->
        <div class="main-content-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="mt-4 mb-4">
                            <div class="user-profile mb-4">
                                <img src="{{@$user->avatar ? asset(@$user->avatar) : asset('assets/frontend/images/user.png')}}" alt="user">
                                <h1 class="user-name"> {{Auth::user()->name}} </h1>
                            </div>
                            <div class="side-nav">
                                <ul>
                                    <li>
                                        <a href="{{route('user.dashboard')}}">{{trans('frontend.Dashboard')}}</a>
                                    </li>
                                    <li>
                                        <a href="{{route('user.transactions')}}" class="active">{{trans('frontend.Transactions')}}</a>
                                    </li>
                                    <li>
                                        <a href="{{route('user.profile')}}">{{trans('frontend.Profile')}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="table-responsive">
                            <table class="table table-bordered w-100 mt-4 mb-4">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>{{trans('frontend.#id')}}</th>
                                        <th> {{trans('frontend.Method')}} </th>
                                        <th> {{trans('frontend.Transaction ID')}} </th>
                                        <th> {{trans('frontend.Currency')}} </th>
                                        <th>{{trans('frontend.Amount')}}</th>
                                        <th>{{trans('frontend.Status')}}</th>
                                        <th>{{trans('frontend.Date')}} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>
                                                {{$loop->iteration}}
                                            </td>
                                            <td>
                                                {{$transaction->payment_method}}
                                            </td>
                                            <td>
                                                {{$transaction->transaction_id}}
                                            </td>
                                            <td>
                                                {{$transaction->currency}}
                                            </td>
                                            <td>
                                                {{GetSetting('site_currency_icon'). ' '. numberFormat($transaction->amount)}}
                                            </td>
                                            <td>
                                                <span class="badge bg-success"> {{trans('frontend.Successful')}} </span>
                                            </td>
                                            <td>
                                                {{Carbon\Carbon::parse($transaction->created_at)->format('Y M h:i a')}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mb-4">
                                {{$transactions->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end main-content -->
        @include(getFooter())
        <a class="scrollToTop" href="javascript::void()"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- end wrapper -->
@endsection
