    @php
        $contact = @App\Models\ContactPage::first();
        $period = App\Models\MudikPeriod::where('status', 'active')->first();
        $tujuans = App\Models\MudikTujuan::with('provinsis')->where('status', 'active')->where('id_period', $period->id)->get();
    @endphp
    <section class="our-testimonials">
        <div class="container pt-lg-25" style="padding-top: 20px !important; padding-bottom: 0px !important;">
            <div class="section-title">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="tm-sc-section-title section-title text-center" style="margin-bottom: 0px !important">
                            <div class="title-wrapper">
                                <h4 class="title text-theme-colored2">Statistik Ketersedian</h4>
                                <h6 class="subtitle" style="color: #009b4d !important;">Mudik Bahagia, Bersama Pemerintah <br> Provinsi Banten {{ date('Y') }}</h6>
                                <h5>Program ini bisa didapatkan secara gratis,<br>tanpa dipungut biaya sedikitpun.</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-content" style="padding-top: 0px !important;">
                <div class="row">
                    <div class="col-md-12 col-md-offset-2" style="padding-top: 0px !important;">
                        <div class="inDiv login-box-body addMarginBottom20" style="padding-top: 0px !important;">
                            {{-- <h4 class="noMargin"><strong><i class="fa fa-bus"></i> Rute Bus</strong></h4>
                            <hr> --}}
                            @foreach ($tujuans as $item => $tujuan)
                                <div class="row text-center mt-1">
                                    <h4>{{ $tujuan->name }}</h4>
                                </div>
                                <?php $no = 1; ?>
                                @foreach ($tujuan->provinsis as $key => $provinsi)
                                    <div class="row text-sm-right text-md-center mt-3">
                                        <h5>{{ $no++ }} . {{ $provinsi->name }}</h5>
                                    </div>
                                    <div class="table-responsive">
                                        <table cellspacing="0" cellpadding="0" class="table table-condensed table-striped table-statistic">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    @if($tujuan->id == 1)
                                                        <th class="text-center">Kota Tujuan</th>
                                                    @else
                                                        <th class="text-center">Kota Asal</th>
                                                    @endif
                                                    <th class="text-center">Total Bus</th>
                                                    <th class="text-center">Total Kuota</th>
                                                    <th class="text-center">Total Pendaftar</th>
                                                    <th class="text-center">Sisa Kuota</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $nox = 1; ?>
                                                @foreach ($provinsi->kota as $keyx => $val)
                                                    <tr>
                                                        <td class="text-left">{{ $nox++ }}</td>
                                                        <td class="text-left">{{ $val->name }}</td>
                                                        <td class="text-right">{{ $val->bus->count() }} Bus</td>
                                                        <td class="text-right">
                                                            {{ $val->bus->sum('jumlah_kursi') }} Kursi
                                                        </td>
                                                        <td class="text-right">
                                                            {{ $val->userKota->sum('jumlah') }} Peserta
                                                        </td>
                                                        @if($val->bus->sum('jumlah_kursi')-$val->userKota->sum('jumlah') < 0)
                                                        <td class="text-right">0 Kursi</td>
                                                        @else
                                                        <td class="text-right">{{ $val->bus->sum('jumlah_kursi')-$val->userKota->sum('jumlah') }} Kursi</td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                                </body>
                                        </table>
                                    </div>
                                @endforeach
                            @endforeach
                            <i class="fa fa-arrow-circle-right"></i> Baca <a href="{{ url('syarat-dan-ketentuan') }}">Syarat & Ketentuan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Divider: Contact -->
    <section class="divider">
        <div class="container" style="padding-top: 20px !important; padding-bottom: 0px !important;">
            <div class="row pt-10">
                <div class="col-lg-7">
                    <h2 class="mt-0 mb-0">{{ @$contact->form_title }}</h2>
                    <p class="font-size-20">{{ @$contact->form_subtitle }}</p>
                    <!-- Contact Form -->
                    <form id="contact_form" name="contact_form" class="" action="{{ route('contact_message') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>{{ trans('frontend.Name') }} <small>*</small></label>
                                    <input name="name" class="form-control" type="text"
                                        placeholder="{{ trans('frontend.Enter Name') }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>{{ trans('frontend.Email') }} <small>*</small></label>
                                    <input name="email" class="form-control required email" type="email"
                                        placeholder="{{ trans('frontend.Enter Email') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>{{ trans('frontend.Subject') }} <small>*</small></label>
                                    <input name="subject" class="form-control" type="text"
                                        placeholder="{{ trans('frontend.Enter Subject') }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>{{ trans('frontend.Phone (Optional)') }}</label>
                                    <input name="phone" class="form-control" type="text"
                                        placeholder="{{ trans('frontend.Enter Phone') }}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>{{ trans('frontend.Message') }}</label>
                            <textarea name="message" class="form-control required" rows="5"
                                placeholder="{{ trans('frontend.Enter Message') }}" required></textarea>
                        </div>
                        <div class="mb-3">

                            <button type="submit"
                                class="btn btn-flat btn-theme-colored1 text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px">{{ trans('frontend.Send your message') }}</button>

                        </div>
                    </form>

                </div>
                <div class="col-lg-5">
                    <h3 class="mt-0">{{ @$contact->contact_title }}</h3>
                    <p>{{ @$contact->contact_subtitle }}</p>
                    <div
                        class="icon-box icon-left iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate mb-30">
                        <div class="icon-box-wrapper">
                            <div class="icon-wrapper">
                                <a class="icon icon-type-font-icon"> <i class="flaticon-contact-044-call-1"></i> </a>
                            </div>
                            <div class="icon-text">
                                <h5 class="icon-box-title mt-0">{{ trans('frontend.Phone') }}</h5>
                                <div class="content"><a href="tel:{{ @$contact->phone }}">{{ @$contact->phone }}</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div
                        class="icon-box icon-left iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate mb-30">
                        <div class="icon-box-wrapper">
                            <div class="icon-wrapper">
                                <a class="icon icon-type-font-icon"> <i class="flaticon-contact-043-email-1"></i> </a>
                            </div>
                            <div class="icon-text">
                                <h5 class="icon-box-title mt-0">{{ trans('frontend.Email') }}</h5>
                                <div class="content"><a
                                        href="mailto:{{ @$contact->email }}">{{ @$contact->email }}</a></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div
                        class="icon-box icon-left iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate mb-30">
                        <div class="icon-box-wrapper">
                            <div class="icon-wrapper">
                                <a class="icon icon-type-font-icon"> <i class="flaticon-contact-025-world"></i> </a>
                            </div>
                            <div class="icon-text">
                                <h5 class="icon-box-title mt-0">{{ trans('frontend.Address') }}</h5>
                                <div class="content">{{ @$contact->address }}</div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Divider: Google Map -->
    <section>
        <div class="container-fluid pt-0 pb-0">
            <div class="row">

                <!-- Google Map HTML Codes -->
                <iframe src="{{ @App\Models\GoogleMap::first()->link }}" data-tm-width="100%" height="500" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>
    </section>
    @push('scripts')
    <link rel="stylesheet" href="{{asset('assets/admin/bundles/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    @endpush
    @push('scripts')
        <script src="{{url('assets/admin/bundles/datatables/datatables.min.js')}}"></script>
        <script src="{{url('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}">
        <script src="{{asset('vendor/datatables/buttons.server-side.js')}}"></script>
        <script>
        $(document).ready(function() {
            $('table.table-statistic').DataTable( {
                responsive: true,
                bLengthChange:false,
                bPaginate:false,
                searching:false,
                info:false,
                scrollX:false,
                scrollY:false,
                ordering:false
            });
        });
        </script>
    @endpush
