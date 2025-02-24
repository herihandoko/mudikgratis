@php
$page_title = "Admin | Tambah Rute";
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Rute & Pemberhentian</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.mudik-rute.index')}}" role="button"><i class="fas fa-arrow-alt-circle-left    "></i>{{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.mudik-rute.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
                            </div>
                            <label>Kategori : </label>
                            <div class="form-group">
                                <input type="checkbox" name="is_rute" value="1"> <label for="">Rute</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="is_stop" value="1"> <label for="">Pemberhentian / Penurunan Penumpang</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"> {{trans('admin.Save')}} </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
