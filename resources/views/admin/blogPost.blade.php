@php
$page_title = trans('admin.Admin | Post a blog');
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
                <h1>{{trans('admin.Post a Blog')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.blog.index')}}" role="button"><i
                    class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.blog.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">{{trans('admin.Title')}}</label>
                                <input type="text" class="form-control" name="title" id="title"
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
                                    <option disabled selected>{{trans('admin.Select a Category')}}</option>
                                    @foreach (App\Models\BlogCategory::all() as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @include('admin.layouts.mediaInput', [
                            'inputTitle' => 'Image',
                            'inputName' => 'blog_image',
                            'inputData' => null,
                            'multiInput' => false,
                            'buttonText' => 'Select',
                            ])
                            <div class="form-group">
                                <label for="">{{trans('admin.Description')}}</label>
                                <textarea class="form-control h-100" name="description" id="editor"
                                    rows="8"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.SEO Title')}}</label>
                                <input type="text" class="form-control" name="seo_title"
                                    >
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.SEO Description')}}</label>
                                <textarea class="form-control h-100" name="seo_description"  rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Tags')}}</label>
                                <input type="text" class="form-control" data-role="tagsinput" name="tags"
                                    >
                            </div>
                            <div class="form-group">
                                <div class="control-label">{{trans('admin.Status')}}</div>
                                <label class="custom-switch pl-0 mt-2">
                                    <input type="checkbox" name="status" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">{{trans('admin.OFF')}} / {{trans('admin.ON')}}</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="control-label">{{trans('admin.Show on featured')}}</div>
                                <label class="custom-switch pl-0 mt-2">
                                    <input type="checkbox" name="on_featured" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">{{trans('admin.OFF')}} / {{trans('admin.ON')}}</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="control-label">{{trans('admin.Comment Section')}}</div>
                                <label class="custom-switch pl-0 mt-2">
                                    <input type="checkbox" name="comment_status" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">{{trans('admin.OFF')}} / {{trans('admin.ON')}}</span>
                                </label>
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
