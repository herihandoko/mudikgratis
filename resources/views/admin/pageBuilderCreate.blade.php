@php
$page_title = trans('admin.Admin | Create page');
@endphp
@push('style')
    <style>
        .droppable {
            min-height: 110vh;
            border: 2px dashed rgb(232, 232, 232);
        }
        .droppable::before {
            content: ' ';
            display: block;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            opacity: 0.1;
            background-image: url("{{ asset('assets/admin/img/drag-and-drop.png') }}");
            background-repeat: no-repeat;
            background-position: center;
        }
        .scroll {
            width: 100%;
            overflow-y: scroll;
            padding-right: 10px;
            height: 50vh;
        }
        .scroll div {
            /* padding-left: 10px; */
        }
        .elements-card button {
            display: none;
        }
        .alert-primary {
            border-radius: 10px;
            cursor: move;
        }
        .scroll::-webkit-scrollbar {
            width: 8px;
        }
        .scroll::-webkit-scrollbar-thumb {
            background-color: rgb(192, 192, 192);
            border-radius: 5px;
        }
        .elements-card {
            height: 110vh;
        }
        .elements-card .card-body {
            /* padding-right: 10px; */
        }
        .elements-card .card {
            box-shadow: 0 4px 8px rgb(0 0 0 / 0%);
        }
        .custom-padding {
            padding-right: 10px !important;
        }
        .custom-page-header {
            min-height: 10px !important;
        }
        .custom-page-header div {
            background-color: #f4f6f9;
            display: block !important;
            font-size: 12px;
            padding: 15px;
            border-radius: 10px;
        }
        .alert img{
            margin-top: 10px;
            border-radius: 10px;
        }
    </style>
@endpush
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header d-flex justify-content-between">
                <h1>{{trans('admin.Page Builder')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.page-builder.index')}}" role="button"><i class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card elements-card">
                            <form action="{{route('admin.page-builder.store')}}" method="post">
                                @csrf
                                <div class="card-body custom-padding">
                                    <div class="form-group pr-3">
                                        <label for="">{{trans('admin.Page Title')}}</label>
                                        <input type="text" class="form-control" name="title"
                                              required>
                                    </div>
                                    <div class="form-group pr-3">
                                        <label for="">{{trans('admin.Page Slug')}}</label>
                                        <input type="text" class="form-control" name="slug"
                                             >
                                    </div>
                                    <input type="hidden" name="contents" required>
                                    <div class="form-group">
                                        <label for="">{{trans('admin.Page Elements')}}</label>
                                        <div class="scroll">
                                            <div class="accordion" id="accordionExample">
                                                @foreach (App\Models\PageComponentCategory::all() as $category)
                                                    <div class="p-0 custom-page-header d-block mb-4 @if ($loop->iteration !== 1) mt-4 @endif"
                                                        id="{{$category->id}}">
                                                        <h2 class="mb-0">
                                                            <div class="text-left" type="button" data-toggle="collapse"
                                                                data-target="#id-{{$category->id}}" aria-expanded="true"
                                                                aria-controls="id-{{$category->id}}">
                                                                <i class="fas fa-arrow-circle-down    "></i>
                                                                {{$category->name}}
                                                            </div>
                                                        </h2>
                                                    </div>
                                                    <div id="id-{{$category->id}}"
                                                        class="collapse @if ($loop->iteration == 1) show @endif"
                                                        aria-labelledby="{{$category->id}}"
                                                        data-parent="#accordionExample">
                                                        @foreach (App\Models\PageComponent::where(['category_id' => $category->id])->get() as $item)
                                                            <div data-id="{{$item->id}}" id="{{$item->id}}"
                                                                class="alert alert-primary alert-dismissible fade show draggable w-100"
                                                                role="alert">
                                                                <strong>{{$item->name}}</strong>
                                                                <button type="button" class="close"
                                                                    data-dismiss="alert" aria-label="Close"
                                                                    onclick="removeElement({{$item->id}})">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <img src="{{asset($item->image)}}" class="w-100">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group pr-3">
                                        <button type="submit" class="btn btn-primary d-block btn-block mr-3">{{trans('admin.Save')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <img class="w-100" src="{{asset(getHeaderImage())}}">
                        <div class="droppable p-4">
                        </div>
                        <img class="w-100" src="{{asset(getFooterImage())}}">
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('script')

    <script>
        localStorage.clear();
        let content = [];
        $('input[name="title"]').on('change', function() {
            localStorage.page_title = $('input[name="title"]').val();
        });
        function removeElement(data) {
            let Items = JSON.parse(localStorage.content);
            let dataToRemove = data.toString();
            if (Items.includes(dataToRemove)) {
                Items.splice($.inArray(dataToRemove, Items), 1);
            }
            localStorage.content = JSON.stringify(Items);
            content = Items;
            $('input[name="contents"]').val(JSON.parse(localStorage.content));

        }
        function setContent(data) {
            localStorage.content = JSON.stringify(data);
            $('input[name="contents"]').val(JSON.parse(localStorage.content));

        }
        var new_id = 20;
        $(".draggable").draggable({
            cursor: 'move',
            revert: 'invalid',
            helper: function() {
                var cloned = $(this).clone();
                cloned.attr('id', (++new_id).toString());
                return cloned;
            },
            distance: 20
        });
        $(".droppable").droppable({
            cursor: 'move',
            tolerance: 'pointer',
            accept: function(event, ui) {
                return true;
            },
            drop: function(event, ui) {
                var obj;
                if ($(ui.helper).hasClass('draggable')) {
                    obj = $(ui.helper).clone();
                    obj.removeClass('draggable').addClass('editable').removeAttr('style');
                    var element = $(ui.draggable).attr("data-id");
                    if (!content.includes(element)) {
                        $(this).append(obj);
                        content.push(element);
                        setContent(content);
                    } else {
                        Toast.fire({
                            icon: 'warning',
                            title: '{{trans('admin.Element Already Exists!')}}'
                        });
                    }
                }
            }
        }).sortable({
            cursor: 'move',
            revert: false,
            update: function(event, ui) {
                var result = $(this).sortable('toArray', {
                    attribute: 'data-id'
                });
                setContent(result);
            }
        });
        function openInNewTab(href) {
            $.ajax({
                type: "GET",
                success: function() {
                    window.open('{{route('admin.page-preview.index')}}', 'page_preview');
                }
            });
        }
    </script>
@endpush
