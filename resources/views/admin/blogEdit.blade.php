@php
$page_title = trans('admin.Admin | Edit blog');
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
                <h1>{{trans('admin.Edit Blog')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.blog.index')}}" role="button"><i class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.blog.update', $blog->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">{{trans('admin.Title')}}</label>
                                <input type="text" class="form-control" name="title"
                                    value="{{$blog->title}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Slug')}}</label>
                                <input type="text" class="form-control" name="slug"
                                    value="{{$blog->slug}}">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Category')}}</label>
                                <select class="form-control" name="category_id"  required>
                                    <option disabled selected>Select a category</option>
                                    @foreach (App\Models\BlogCategory::all() as $category)
                                        <option @if ($category->id == $blog->category_id)
                                            selected
                                            @endif value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            @include('admin.layouts.mediaInput', [
                            'inputTitle' => 'Image',
                            'inputName' => 'blog_image',
                            'inputData' => $blog->image,
                            'multiInput' => false,
                            'buttonText' => 'Select',
                            ])


                            <div class="form-group">
                                <label for="">{{trans('admin.Description')}}</label>
                                <textarea class="form-control h-100" name="description" id="editor"
                                    rows="8">{!! clean($blog->description) !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.SEO Title')}}</label>
                                <input type="text" class="form-control" name="seo_title"
                                    value="{{$blog->seo_title}}">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.SEO Description')}}</label>
                                <textarea class="form-control h-100" name="seo_description"
                                    rows="4">{!! filterTag(clean($blog->seo_description)) !!}</textarea>
                            </div>


                            <div class="form-group">
                                <label for="">{{trans('admin.Tags')}}</label>
                                <input type="text"
                                  class="form-control"  data-role="tagsinput" name="tags"  value="{{$blog->tags}}">
                              </div>



                            <div class="form-group">
                                <div class="control-label">{{trans('admin.Status')}}</div>
                                <label class="custom-switch pl-0 mt-2">
                                    <input type="checkbox" name="status" class="custom-switch-input" @if ($blog->status == 1)
                                    checked
                                    @endif>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">{{trans('admin.OFF')}} / {{trans('admin.ON')}}</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="control-label">{{trans('admin.Show on featured')}}</div>
                                <label class="custom-switch pl-0 mt-2">
                                    <input type="checkbox" name="on_featured" class="custom-switch-input" @if ($blog->on_featured == 1)
                                    checked
                                    @endif>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">{{trans('admin.OFF')}} / {{trans('admin.ON')}}</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="control-label">{{trans('admin.Comment Section')}}</div>
                                <label class="custom-switch pl-0 mt-2">
                                    <input type="checkbox" name="comment_status" class="custom-switch-input" @if ($blog->comment_status == 1)
                                    checked
                                    @endif>
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



    @include('admin.layouts.mediaJs')
    <script>
        $("form").bind("keypress", function(e) {
            if (e.keyCode == 13) {
                return false;
            }
        });
    </script>

@endpush
