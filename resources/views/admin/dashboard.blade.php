@php
$page_title = trans('admin.Admin | Dashboard');
@endphp
@extends('admin.layouts.master')
@section('content')
{{-- Main Content --}}
<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1>{{trans('admin.Dashboard')}}</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                 <i class="fab fa-blogger    "></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>{{trans('admin.Blogs')}}</h4>
                  </div>
                  <div class="card-body">
                    {{App\Models\Blog::count()}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="fas fa-tshirt"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>{{trans('admin.Products')}}</h4>
                    </div>
                    <div class="card-body">
                      {{App\Models\Product::count()}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="fas fa-shopping-cart"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>{{trans('admin.Orders')}}</h4>
                    </div>
                    <div class="card-body">
                      {{App\Models\Order::count()}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                    <i class="fas fa-users"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>{{trans('admin.Customers')}}</h4>
                    </div>
                    <div class="card-body">
                      {{App\Models\User::count()}}
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>{{trans('admin.Appointments')}}</h4>
                  </div>
                  <div class="card-body">
                    {{App\Models\Appointment::count()}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-camera"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>{{trans('admin.Gallery')}}</h4>
                  </div>
                  <div class="card-body">
                    {{App\Models\Media::count()}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>{{trans('admin.Portfolio')}}</h4>
                  </div>
                  <div class="card-body">
                    {{App\Models\Portfolio::count()}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-comment-alt"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>{{trans('admin.Testimonial')}}</h4>
                  </div>
                  <div class="card-body">
                    {{App\Models\Testimonial::count()}}
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</section>
</div>
@endsection

