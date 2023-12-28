@php
$page_title = trans('admin.Admin | Contact Messages');
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{trans('admin.Contact Messages')}}</h1>
            </div>

            <a class="btn btn-primary mb-4" href="{{route('admin.dashboard')}}" role="button"><i class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>

            <div class="card text-dark">
                <div class="card-body">
                  <div class="alert alert-primary" role="alert">
                      <strong>{{trans('admin.If you want to save contact messages here, Turn this button on.')}}</strong>
                  </div>


                    <div class="form-group">
                        <div class="control-label">{{trans('admin.Save Messages?')}}</div>
                        <label class="custom-switch pl-0 mt-2">
                            <input type="checkbox" name="save_contact_message"
                                @if (GetSetting('save_contact_message') == 1) checked @endif
                                class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">{{trans('admin.NO / YES')}}</span>
                        </label>
                    </div>
                  </form>


                </div>
              </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-body wsus_custom_overflow">
                        {{$dataTable->table()}}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('script')
    {{$dataTable->scripts()}}
    @include('admin.layouts.sweetalertDelete')
    <script>
        $('input[name=save_contact_message]').on('change', function(){
            $.ajax({
            type: "GET",
            url: "{{route('admin.contact_message')}}",
            processData: false,
            contentType: false,
            success: function(data) {
                toastr.success(data.message);
            }
        });
        })


    </script>
@endpush
