@php
$page_title = trans('admin.Admin | Edit portfolio');
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
                <h1>{{trans('admin.Edit Portfolio')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.portfolio.index')}}" role="button"><i
                    class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.portfolio.update', $portfolio->id )}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="">{{trans('admin.Title')}}</label>
                                <input type="text" class="form-control" value="{{$portfolio->title}}" name="title"
                                    id="title" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Slug')}}</label>
                                <input type="text" class="form-control" value="{{$portfolio->slug}}" name="slug"
                                    id="slug" required>
                            </div>
                            @include('admin.layouts.mediaInput', [
                                'inputTitle' => 'Image',
                                'inputName' => 'image',
                                'inputData' => $portfolio->image,
                                'multiInput' => false,
                                'buttonText' => 'Select',
                            ])
                            <div class="form-group">
                                <label for="">{{trans('admin.Description')}}</label>
                                <textarea class="form-control h-100" name="description" id="editor" rows="8"
                                    >{!! clean($portfolio->description) !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Client')}}</label>
                                <input type="text" class="form-control" value="{{$portfolio->client}}" name="client"
                                    id="slug" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Location')}}</label>
                                <input type="text" class="form-control" value="{{$portfolio->location}}"
                                    name="location" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Category')}}</label>
                                <input type="text" class="form-control" value="{{$portfolio->category}}"
                                    name="category" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Start Date')}}</label>
                                <input type="datetime-local"
                                    value="{{Carbon\Carbon::parse($portfolio->start_date)->format('Y-m-d\TH:i')}}"
                                    class="form-control" name="start_date" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.End Date')}}</label>
                                <input type="datetime-local"
                                    value="{{Carbon\Carbon::parse($portfolio->end_date)->format('Y-m-d\TH:i')}}"
                                    class="form-control" name="end_date" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Website')}}</label>
                                <input type="text" class="form-control" value="{{$portfolio->website}}"
                                    name="website" required>
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
        $('#slug').slugify('#title');
    </script>
    @include('admin.layouts.mediaJs')

@endpush
