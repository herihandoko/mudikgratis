@php
$page_title = trans('admin.Admin | Edit product');
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
                <h1>{{trans('admin.Edit Product')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.product.index')}}" role="button"><i
                    class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.product.update', $product->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">{{trans('admin.Product Name')}}</label>
                                <input type="text" class="form-control" name="name" id="title"
                                    value="{{$product->name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Slug')}}</label>
                                <input type="text" class="form-control" name="slug" id="slug"
                                    value="{{$product->slug}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Category')}}</label>
                                <select class="form-control" name="category_id"  required>
                                    <option disabled selected>--- {{trans('admin.Select')}} ---</option>
                                    @foreach (App\Models\ProductCategory::all() as $category)
                                        <option @if ($category->id == $product->category_id)
                                            selected
                                            @endif value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @include('admin.layouts.mediaInput', [
                                'inputTitle' => 'Image',
                                'inputName' => 'media',
                                'inputData' => $product->image,
                                'multiInput' => true,
                                'buttonText' => 'Select',
                            ])
                            <div class="form-group">
                                <label for="">{{trans('admin.Short Description')}}</label>
                                <textarea class="form-control h-100" name="short_description"
                                    rows="8">{!! clean($product->short_description) !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Full Description')}}</label>
                                <textarea class="form-control h-100" name="description" id="editor"
                                    rows="8">{!! clean($product->description) !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" class="form-control" name="price" value="{{$product->price}}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Discount Price (Optional)')}}</label>
                                <input type="number" class="form-control" name="discount_price"
                                    value="{{$product->discount_price}}">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Brand (Optional)')}}</label>
                                <input type="text" class="form-control" name="brand" value="{{$product->brand}}">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Color (Optional)')}}</label>
                                <input type="text" class="form-control" name="color" value="{{$product->color}}">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Weight (Optional)')}}</label>
                                <input type="text" class="form-control" name="weight" value="{{$product->weight}}">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Dimensions (Optional)')}}</label>
                                <input type="text" class="form-control" name="dimensions"
                                    value="{{$product->dimensions}}">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Stock (Optional)')}}</label>
                                <input type="number" class="form-control" name="stock" value="{{$product->stock}}">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.SKU')}}</label>
                                <input type="text" class="form-control" name="sku" value="{{$product->sku}}">
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


    @include('admin.layouts.mediaJs')

    <script>
        $("form").bind("keypress", function(e) {
            if (e.keyCode == 13) {
                return false;
            }
        });
    </script>

@endpush
