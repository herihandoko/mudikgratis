@php
$page_title = trans('admin.Admin | Intro section');
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
                <h1>{{trans('admin.Intro')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.dashboard')}}" role="button"><i
                    class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.intro.update', 1)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">{{trans('admin.Title')}}</label>
                                <input type="text" class="form-control" name="title"
                                    value="{{@$intro->title}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Subtitle')}}</label>
                                <input type="text" class="form-control" name="subtitle"
                                    value="{{@$intro->subtitle}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Description')}}</label>
                                <textarea class="form-control h-100" name="description"
                                    rows="3">{!! @filterTag(clean($intro->description)) !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Contact Title')}}</label>
                                <input type="text" class="form-control" name="contact_title"
                                    value="{{@$intro->contact_title}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Contact Subtitle')}}</label>
                                <input type="text" class="form-control" name="contact_subtitle"
                                    value="{{@$intro->contact_subtitle}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Contact Number')}}</label>
                                <input type="text" class="form-control" name="contact_number"
                                    value="{{@$intro->contact_number}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Button Text')}}</label>
                                <input type="text" class="form-control" name="button_text"
                                    value="{{@$intro->button_text}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Button Link')}}</label>
                                <input type="text" class="form-control" name="button_link"
                                    value="{{@$intro->button_link}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Item One Title')}}</label>
                                <input type="text" class="form-control" name="item_one_title"
                                    value="{{@$intro->item_one_title}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Item One Description')}}</label>
                                <input type="text" class="form-control" name="item_one_description"
                                     value="{{@$intro->item_one_description}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Item Two Title')}}</label>
                                <input type="text" class="form-control" name="item_two_title"
                                    value="{{@$intro->item_two_title}}" required>
                            </div>
                            <div class="form-group">{{trans('admin.Item Two Description')}}</label>
                                <input type="text" class="form-control" name="item_two_description"
                                     value="{{@$intro->item_two_description}}" required>
                            </div>

                            <div class="form-group">
                                <label for="">{{trans('admin.Why Choose US Icon')}}</label>
                                <div id="icon" name="why_choose_us_icon"></div>
                            </div>


                            <div class="form-group">
                                <label for="">{{trans('admin.Why Choose Us Title')}}</label>
                                <input type="text" class="form-control" name="why_choose_us_title"
                                     value="{{@$intro->why_choose_us_title}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Why Choose Us Description')}}</label>
                                <textarea class="form-control h-100" name="why_choose_us_description"
                                    rows="3">{!! @filterTag(clean($intro->why_choose_us_description)) !!}</textarea>
                            </div>

                            @include('admin.layouts.mediaInput', [
                            'inputTitle' => 'Image',
                            'inputName' => 'background',
                            'inputData' => @$intro->background,
                            'multiInput' => false,
                            'buttonText' => 'Select',
                            ])

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
    @include('admin.layouts.mediaJs')
    <script>
        $('#icon').iconpicker({
            align: 'left', // Only in div tag
            arrowClass: 'btn-primary',
            arrowPrevIconClass: 'fas fa-angle-left',
            arrowNextIconClass: 'fas fa-angle-right',
            cols: 5,
            footer: true,
            header: true,
            icon: '{{@$intro->why_choose_us_icon}}',
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
        $('input[name=why_choose_us_icon]').val('{{@$intro->why_choose_us_icon}}');
    </script>
@endpush
