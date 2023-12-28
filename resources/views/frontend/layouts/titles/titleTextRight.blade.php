 <!-- Section: page title -->
 <section class="page-title tm-page-title page-title-standard layer-overlay overlay-dark-9 bg-img-center" data-tm-bg-img="images/bg/bg1.jpg">
    <div class="container padding-small">
      <div class="row">
        <div class="col-md-8 title-content sm-text-center">
          <h2 class="text-white">{{$page->title}}</h2>
        </div>
        <div class="col-md-4 title-content text-center">
          <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
            <div class="breadcrumbs">
              <span><a href="{{url('/')}}" rel="home">{{trans('frontend.Home')}}</a></span>
              <span><i class="fa fa-angle-right"></i></span>
              <span>{{trans('frontend.Pages')}}</span>
              <span><i class="fa fa-angle-right"></i></span>
              <span class="active">{{$page->title}}</span>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </section>
