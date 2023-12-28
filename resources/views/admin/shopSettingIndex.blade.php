@php
$page_title = trans('admin.Admin | Shop settings');
@endphp
@push('style')
    <link rel="stylesheet" href="{{asset('assets/admin/css/mediamanager.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-iconpicker.min.css')}}">

@endpush
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{trans('admin.Shop Settings')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.dashboard')}}" role="button"><i
                    class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.shop-setting.update', 1)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">{{trans('admin.Default Shipping Charge')}}</label>
                                <input type="number" class="form-control" name="default_shipping_fee"
                                     value="{{@$setting->default_shipping_fee}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Product Tax')}} (%)</label>
                                <input type="number" class="form-control" name="tax"
                                    value="{{@$setting->tax}}" required>
                            </div>

                            <div class="form-group">
                              <label for="">{{trans('admin.Shop Status')}}</label>
                              <select class="form-control" name="status">
                                <option value="1" @if(@$setting->status == 1) selected @endif>Visible</option>
                                <option value="0" @if(@$setting->status == 0) selected @endif>Disable</option>
                              </select>
                            </div>


                            <button type="submit" class="btn btn-primary btn-block" href="#" role="button"> {{trans('admin.Save')}} </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('admin.layouts.mediaModal')
@endsection
@push('script')
    <script type="text/javascript" src="{{asset('assets/admin/js/bootstrap-iconpicker.bundle.min.js')}}"></script>
    <script>
        $('#icon').iconpicker({
            align: 'left', // Only in div tag
            arrowClass: 'btn-primary',
            arrowPrevIconClass: 'fas fa-angle-left',
            arrowNextIconClass: 'fas fa-angle-right',
            cols: 5,
            footer: true,
            header: true,
            iconset: 'fontawesome5',
            labelHeader: '{0} of {1} pages',
            labelFooter: '{0} - {1} of {2} icons',
            placement: 'bottom', // Only in button tag
            rows: 5,
            search: true,
            searchText: 'Search',
            selectedClass: 'btn-primary',
            unselectedClass: 'btn-dark',
        });
    </script>
    @include('admin.layouts.mediaJs')
@endpush
