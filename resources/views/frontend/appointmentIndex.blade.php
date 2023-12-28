<section >
    <div class="container position-relative p-0 mt-90 app-max-width" >
        <h3 class="bg-theme-colored1 p-15 mb-0 text-white">{{trans('frontend.Appointment Form')}}</h3>
        <div class="section-content bg-white p-30">
            <div class="row">
                <div class="col-md-12">
                    <!-- Reservation Form Start-->
                    <form id="appointment_form_popup" name="appointment_form" class="appointment-form" method="post"
                        action="{{route('appointment-submit')}}">
                        @csrf
                        <h3 class="mt-0">{{trans('frontend.Get A Free Service')}}<span
                                class="text-theme-colored1 font-weight-600">
                                {{trans('frontend.Now')}}!</span></h3>
                        <p >{{trans('frontend.Lorem ipsum dolor sit amet, consectetur elit.')}}
                        </p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3 mb-30">
                                    <input placeholder="{{trans('frontend.Enter Name')}}" type="text" name="name"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 mb-30">
                                    <input placeholder="{{trans('frontend.Email')}}" type="text" name="email"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 mb-30">
                                    <input placeholder="{{trans('frontend.Phone')}}" type="text" name="phone"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 mb-30">
                                    <input name="date" class="form-control" required type="datetime-local"
                                        placeholder="Date">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <select name="service_id" class="form-select required mb-4 form-control">
                                    <option value=""> --- {{trans('frontend.Choose Service')}} --- </option>
                                    @foreach (@App\Models\Service::all() as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <textarea name="message" class="form-control" required rows="5"
                                        placeholder="{{trans('frontend.Enter Message')}}"></textarea>
                                </div>
                            </div>

                            @if (ReCaptcha('recaptcha_status') == 1)
                                    <div class="row">
                                        <div class="mb-3 col-md-12">
                                            <div
                                                class="form-group{{$errors->has('g-recaptcha-response') ? ' has-error' : ''}}">
                                                <label class="control-label">{{trans('frontend.Captcha')}}</label>
                                                <div class="pull-center">
                                                    {!! app('captcha')->display() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endif

                            <div class="col-sm-12">
                                <div class="mb-3 mb-0 mt-0">
                                    <input name="form_botcheck" class="form-control" type="hidden" value="">
                                    <button type="submit" class="btn btn-theme-colored1 btn-round"
                                        data-loading-text="Please wait...">{{trans('frontend.Submit Now')}}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Reservation Form End-->
                    <!-- Reservation Form Validation Start-->

                    <!-- Reservation Form Validation Start -->
                </div>
            </div>
        </div>
        <button title="Close (Esc)" type="button" class="mfp-close mt-10">×</button>
    </div>
</section>
<!-- Footer Scripts -->
<script>
    //reload date and time picker
    WSUS.initialize.TM_datePicker();
</script>
{!! NoCaptcha::renderJs() !!}
