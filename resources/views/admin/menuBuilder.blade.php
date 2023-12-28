@php
$page_title = trans('admin.Admin | Menu builder');
@endphp
@push('style')

@endpush
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header d-flex justify-content-between">
                <h1>{{trans('admin.Menu builder')}}</h1>
                <button id="add-menu" class="btn btn-icon btn-primary pull-right">
                    <i class="fas fa-plus-circle"></i> {{trans('admin.Add Item')}}
                </button>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.dashboard')}}" role="button"><i
                    class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="row sort" id="menu-items">
                    @foreach ($items as $item)
                        <div class="col-md-2 mb-4" id="id-{{$item->id}}">
                            <div class="btn bg-primary text-white mb-2 w-100 menu-item" id="id-{{$item->id}}"
                                data-title="{{$item->title}}" data-link="{{$item->link}}">
                                {{$item->title}}
                            </div>
                            <div id="sub-menu" class="sort">
                                @foreach (App\Models\Menu::where('parent_id', $item->id)->orderBy('order', 'asc')->get()
        as $subitem)
                                    <div class="btn bg-white mb-2 w-100 menu-item" id="id-{{$subitem->id}}"
                                        data-title="{{$subitem->title}}" data-link="{{$subitem->link}}">
                                        {{$subitem->title}}
                                    </div>
                                @endforeach
                            </div>
                            <button onclick="addSubmenu({{$item->id}})" class="btn btn-icon btn-light w-100">
                                <i class="fas fa-plus-circle"></i> {{trans('admin.Sub Menu')}}
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="add-menu-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{trans('admin.Add Menu Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-menu-form" action="{{route('admin.addmenu')}}" method="get">
                        <div class="form-group ">
                            <label>{{trans('admin.Title')}}</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="form-group">
                            <label>{{trans('admin.Select Page')}}</label>
                            <select class="form-control" data-items="page">
                                <option value="">-- {{trans('admin.Select')}} ---</option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label>{{trans('admin.Link')}}</label>
                            <input type="text" class="form-control" data-link="addmenu" name="link">
                        </div>
                        <button type="submit" class="btn btn-primary float-right">{{trans('admin.Save')}}</button>
                        <button type="button" class="btn btn-danger mr-2 float-right" data-dismiss="modal">{{trans('admin.Close')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="add-sub-menu-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{trans('admin.Add Sub Manu Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-sub-menu-form" action="{{route('admin.addsubmenu')}}" method="get">
                        <input type="hidden" name="parent_id">
                        <div class="form-group ">
                            <label>{{trans('admin.Title')}}</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="form-group">
                            <label>{{trans('admin.Select Page')}}</label>
                            <select class="form-control" data-items="page">
                                <option value="">-- {{trans('admin.Select')}} ---</option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label>{{trans('admin.Link')}}</label>
                            <input type="text" class="form-control" data-link="addmenu" name="link">
                        </div>
                        <button type="submit" class="btn btn-primary float-right">{{trans('admin.Save')}}</button>
                        <button type="button" class="btn btn-danger mr-2 float-right" data-dismiss="modal">{{trans('admin.Close')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="edit-menu-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{trans('admin.Edit Menu')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-menu-form" action="{{route('admin.editmenu')}}" method="get">
                        <input type="hidden" name="id" required>
                        <div class="form-group ">
                            <label>{{trans('admin.Title')}}</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="form-group">
                            <label>{{trans('admin.Select Page')}}</label>
                            <select class="form-control" data-items="page">
                                <option value="">-- {{trans('admin.Select')}} ---</option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label>{{trans('admin.Link')}}</label>
                            <input type="text" class="form-control" data-link="addmenu" name="link">
                        </div>
                        <button type="submit" class="btn btn-primary float-right">{{trans('admin.Save')}}</button>
                        <button class="btn btn-danger mr-2 float-right" data-dismiss="modal"
                            onclick="deleteMenu()">{{trans('admin.Delete')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function fetchMenuItems(data = null) {
            $('[data-items="page"]').empty();
            $.ajax({
                url: "{{route('admin.menu_items')}}",
                type: 'get',
                success: function(result) {
                    $('[data-items="page"]').append(`<option value="">-- Custom Link --</option>`);
                    $.each(result, function(key, val) {
                        $('[data-items="page"]').append(
                            `<option value="${key}" ${data == key ? 'selected' : ''} >${val}</option>`
                        );
                    });
                },
            });
        }

        function deleteMenu() {
            $.ajax('{{route('admin.deletemenu')}}', {
                data: $(`#edit-menu-form`).serialize(),
                success: function(data) {

                    if (data.status == 'demo_mode') {
                        toastr.error('{{trans('admin.This action is blocked in demo mode!')}}');
                        return false;
                    }

                    location.reload(true);
                }
            });
        }
        $(document).on('click', '.menu-item', function(e) {
            $('[data-link="addmenu"]').empty();
            $('[data-items="page"]').on('change', function() {
                $('[data-link="addmenu"]').val($(this).find(":selected").val())
            });
            e.stopImmediatePropagation();
            fetchMenuItems($(this).attr("data-link"));
            $("#edit-menu-form    input[name=id]").val($(this).attr("id").replace("id-", ""));
            $("#edit-menu-form input[name=title]").val($(this).attr("data-title"));
            $("#edit-menu-form  input[name=link]").val($(this).attr("data-link"));
            $('#edit-menu-modal').modal('show');
        });
        $("#edit-menu-form").submit(function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();
            $.ajax('{{route('admin.editmenu')}}', {
                data: $(`#edit-menu-form`).serialize(),
                success: function(data) {

                    if (data.status == 'demo_mode') {
                        toastr.error('{{trans('admin.This action is blocked in demo mode!')}}');
                        return false;
                    }
                    location.reload(true);
                }
            });
        });
        $('#add-menu').click(function(e) {
            $('[data-link="addmenu"]').empty();
            $('[data-items="page"]').on('change', function() {
                $('[data-link="addmenu"]').val($('[data-items="page"]').find(":selected").val())
            });
            fetchMenuItems();
            e.stopImmediatePropagation();
            $('#add-menu-modal').modal('show');
        });

        function addSubmenu(menu) {
            $('[data-link="addmenu"]').empty();
            $('[data-items="page"]').on('change', function() {
                $('[data-link="addmenu"]').val($('[data-items="page"]').find(":selected").val())
            });
            fetchMenuItems();
            $('#add-sub-menu-form input[name=parent_id]').val(menu);
            $('#add-sub-menu-modal').modal('show');
        }
        $("#add-menu-form").submit(function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();
            $.ajax('{{route('admin.addmenu')}}', {
                data: $(`#add-menu-form`).serialize(),
                success: function(data) {

                    if (data.status == 'demo_mode') {
                        toastr.error('{{trans('admin.This action is blocked in demo mode!')}}');
                        return false;
                    }

                    $("#add-menu-form")[0].reset();
                    $('#menu-items').append(`
                            <div class="col-md-2 mb-4 ui-sortable-handle" id="id-${data.id}">
                                <div class="btn bg-primary text-white mb-2 w-100 menu-item" id="id-${data.id}" data-title="${data.title}" data-link="${data.link}">
                                ${data.title}
                                </div>
                                <div id="sub-menu" class="sort ui-sortable"></div>
                                <button onclick="addSubmenu(${data.id})" class="btn btn-icon btn-light w-100">
                                    <i class="fas fa-plus-circle"></i> Sub menu
                                </button>
                            </div>
                        `).sortable("refresh");
                    Toast.fire({
                        icon: 'success',
                        title: '{{trans('admin.Menu Item Added')}}'
                    });
                    $('#add-menu-modal').modal('hide');
                }
            });
        });
        $("#add-sub-menu-form").submit(function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();
            $.ajax('{{route('admin.addsubmenu')}}', {
                data: $(`#add-sub-menu-form`).serialize(),
                success: function(data) {

                    if (data.status == 'demo_mode') {
                        toastr.error('{{trans('admin.This action is blocked in demo mode!')}}');
                        return false;
                    }

                    Toast.fire({
                        icon: 'success',
                        title: '{{trans('admin.Menu Item Added')}}'
                    });
                    $('#id-' + data.parent_id + ' #sub-menu').append(`
                            <div class="btn bg-white mb-2 w-100 menu-item ui-sortable-handle" id="id-${data.id}" data-title="${data.title}" data-link="${data.link}">
                                ${data.title}
                            </div>
                        `);
                    $('#add-sub-menu-modal').modal('hide');
                    $("#add-sub-menu-form")[0].reset();
                }
            });
        });
    </script>

    <script>
        $(".sort").sortable({
            update: function(e, u) {
                var data = $(this).sortable('serialize');
                $.ajax({
                    url: "{{route('admin.sortmenu')}}",
                    type: 'get',
                    data: data,
                    success: function(result) {

                        if (result.status == 'demo_mode') {
                        toastr.error('{{trans('admin.This action is blocked in demo mode!')}}');
                        return false;
                        }


                        Toast.fire({
                            icon: 'success',
                            title: '{{trans('admin.Menu Updated')}}'
                        })
                    },
                });
            }
        });
    </script>
@endpush
