@php
$page_title = trans('admin.Admin | Edit blog category');
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{trans('admin.Edit Category')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.blog-category.index')}}" role="button"><i class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.blog-category.update', $category->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">{{trans('admin.Name')}}</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{$category->name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Slug')}}</label>
                                <input type="text" class="form-control" name="slug"
                                    value="{{$category->slug}}" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block"> {{trans('admin.Save')}} </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
