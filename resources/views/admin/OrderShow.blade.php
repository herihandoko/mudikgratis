@php
$page_title = trans('admin.Admin | Order');
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ trans('admin.Order') }}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{ URL::previous() }}" role="button"><i
                    class="fas fa-arrow-circle-left    "></i> {{ trans('admin.Back') }}</a>
            <div class="section-body">
                <div class="card bg-white">
                    <div class="card-header">
                        {{ trans('admin.Customer Information') }}
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>{{ trans('admin.Name') }}</td>
                                    <td colspan="2">{{ $order->customer->name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('admin.Phone') }}</td>
                                    <td colspan="2">{{ $order->customer->phone }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('admin.Email') }}</td>
                                    <td colspan="2">{{ $order->customer->email }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('admin.Address') }}</td>
                                    <td colspan="2" rowspan="3">
                                        {{ trans('City : ') . $order->address->city }},
                                        {{ trans('Post Code : ') . $order->address->post_code }},
                                        {{ trans('Country : ') . $order->address->country }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                @if ($order->bank_info)
                    <div class="card bg-white">
                        <div class="card-header">
                            {{ trans('admin.Bank Information') }}
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <textarea class="form-control h-100" name="" id="" rows="3">{!! filterTag(clean($order->bank_info)) !!}</textarea>
                            </div>

                        </div>
                    </div>
                @endif









                <div class="card">
                    <div class="card-header">
                        {{ trans('admin.Order Details') }}
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ trans('admin.Item') }}</th>
                                    <th>{{ trans('admin.Quantity') }}</th>
                                    <th>{{ trans('admin.Unit Price') }}</th>
                                    <th>{{ trans('admin.Sub Total') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->items as $item)
                                    <tr>
                                        <td>
                                            <div class="order-item d-flex">
                                                <img class="order-item-image"
                                                    src="{{ asset(MediaImage($item->item->image, 1)) }}">
                                                <div class="order-item-name">
                                                    <b>{{ @$item->item->name }}</b>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ @$item->item_qty }}</td>
                                        <td>{{ GetSetting('site_currency_icon') . ' ' . numberFormat(@$item->item_price) }}
                                        </td>
                                        <td>{{ GetSetting('site_currency_icon') . ' ' . numberFormat(@$item->item_price * @$item->item_qty) }}
                                        </td>
                                    </tr>
                                @endforeach


                                <tr>
                                    <td scope="row" colspan="3">{{ trans('admin.Tax') }}</td>
                                    <td class="font-weight-bold">
                                        {{ GetSetting('site_currency_icon') . ' ' . numberFormat(@$order->tax) }}
                                    </td>
                                </tr>

                                <tr>
                                    <td scope="row" colspan="3">{{ trans('admin.Shipping fee') }}</td>
                                    <td class="font-weight-bold">
                                        {{ GetSetting('site_currency_icon') . ' ' . numberFormat(@$order->shipping_fee) }}
                                    </td>
                                </tr>


                                <tr>
                                    <td class="font-weight-bold" scope="row" colspan="3">{{ trans('admin.Total') }}</td>
                                    <td class="font-weight-bold">
                                        {{ GetSetting('site_currency_icon') . ' ' . numberFormat(@$order->total_amount) }}
                                    </td>
                                </tr>




                                <tr>
                                    @can('order-edit')
                                        <form action="{{ route('admin.order.update', $order->id) }}" method="POST">
                                        @endcan
                                        <td colspan="1">
                                            {{ trans('admin.Order Status') }} :
                                        </td>
                                        @csrf
                                        @method('PUT')
                                        <td colspan="2">
                                            <div class="form-group pt-4">
                                                <select class="form-control" name="status">
                                                    <option value="pending"
                                                        @if ($order->status == 'pending') selected @endif>
                                                        {{ trans('admin.Pending ') }}</option>
                                                    <option value="shipping"
                                                        @if ($order->status == 'shipping') selected @endif>
                                                        {{ trans('admin.Shipping') }}</option>
                                                    <option value="cancelled"
                                                        @if ($order->status == 'cancelled') selected @endif>
                                                        {{ trans('admin.Cancelled') }}</option>
                                                    <option value="completed"
                                                        @if ($order->status == 'completed') selected @endif>
                                                        {{ trans('admin.Complete') }}</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            @can('order-edit')
                                                <button
                                                    class="btn btn-primary btn-block @cannot('order-edit') disabled @endcannot">{{ trans('admin.Update') }}</button>
                                            @endcan
                                        </td>

                                        @can('order-edit')
                                        </form>
                                    @endcan


                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
