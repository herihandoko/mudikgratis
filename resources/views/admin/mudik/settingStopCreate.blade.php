@php
$page_title = "Admin | Tambah Pemberhentian";
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add Setting Pemberhentian ({{ $tujuanKota->name }})</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{ url()->previous() }}" role="button"><i class="fas fa-arrow-alt-circle-left"></i>{{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.setting-stop.store')}}" method="POST">
                            @csrf
                            {{ Form::hidden('tujuan_id',$request->tujuan_id) }}
                            {{ Form::hidden('kota_tujuan_id',$request->kota_tujuan_id) }}
                            <div class="form-group">
                                <label for="">Name</label>
                                {{ Form::select('id_rute', $rute, old('id_rute') , ['class' => 'form-control','id'=>'sel-id_rute','required'=> true]) }}
                            </div>
                            <div class="form-group">
                                <label for="">Urutan</label>
                                {{ Form::number('sorting', old('sorting'), ['class' => 'form-control','required'=> true]) }}
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="search" value="1"> {{trans('admin.Save')}} </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
