@php
$page_title = trans('admin.Admin | Add product');
@endphp
@push('style')
    <link rel="stylesheet" href="{{asset('assets/admin/css/mediamanager.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/tagsinput.css')}}">
    <!-- Include stylesheet -->

@endpush
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{trans('admin.Add Product')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.product.index')}}" role="button"><i
                    class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.product.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">{{trans('admin.Product Name')}}</label>
                                <input type="text" class="form-control" name="name" id="title"
                                     required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Slug')}}</label>
                                <input type="text" class="form-control" name="slug" id="slug"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Category')}}</label>
                                <select class="form-control" name="category_id"  required>
                                    <option disabled selected value="">--- {{trans('admin.Select')}} ---</option>
                                    @foreach (App\Models\ProductCategory::all() as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @include('admin.layouts.mediaInput', [
                                'inputTitle' => 'Image',
                                'inputName' => 'media',
                                'inputData' => null,
                                'multiInput' => true,
                                'buttonText' => 'Select',
                            ])
                            <div class="form-group">
                                <label for="">{{trans('admin.Short Description')}}</label>
                                <textarea class="form-control h-100" name="short_description" id="editor"
                                    rows="8"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Full Description')}}</label>
                                <textarea class="form-control h-100" name="description" id="editor"
                                    rows="8"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Price')}}</label>
                                <input type="number" class="form-control" name="price"  required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Discount Price (Optional)')}} </label>
                                <input type="number" class="form-control" name="discount_price">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Brand (Optional)')}}</label>
                                <input type="text" class="form-control" name="brand">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Color (Optional)')}}</label>
                                <input type="text" class="form-control" name="color">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Weight (Optional)')}}</label>
                                <input type="text" class="form-control" name="weight">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Dimensions (Optional)')}}</label>
                                <input type="text" class="form-control" name="dimensions">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Stock (Optional)')}}</label>
                                <input type="number" class="form-control" name="stock">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.SKU')}}</label>
                                <input type="text" class="form-control" name="sku">
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



    <script>
        $("form").bind("keypress", function(e) {
            if (e.keyCode == 13) {
                return false;
            }
        });

    </script>
    @include('admin.layouts.mediaJs')

@endpush
