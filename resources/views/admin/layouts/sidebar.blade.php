<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand px-5 mb-4">
            <a href="{{ url('/admin/dashboard') }}">
                <img class="w-100 mt-2" src="{{ url(GetSetting('site_logo')) }}">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/admin/dashboard') }}">
                <img src="{{ url(GetSetting('site_favicon')) }}">
            </a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">{{ trans('admin.Basics') }}</li>
            <li class="{{ ActiveMenu('dashboard', 2) }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fire"></i>
                    <span>{{ trans('admin.Dashboard') }}</span>
                </a>
            </li>
            @canany(['mudik-periode-index', 'mudik-tujuan-index', 'mudik-provinsi-index', 'mudik-kota-index',
                'mudik-bus-index', 'mudik-peserta-index', 'mudik-verifikasi-index'])
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-bus"></i><span>Mudik</span></a>
                    <ul class="dropdown-menu">
                        @can('mudik-periode-index')
                            <li class="{{ ActiveSidebarNew('admin.mudik-periode.*') }}">
                                <a class="nav-link" href="{{ route('admin.mudik-periode.index') }}">Pengaturan</a>
                            </li>
                        @endcan
                        @can('mudik-tujuan-index')
                            <li class="{{ ActiveSidebarNew('admin.mudik-tujuan.*') }}">
                                <a class="nav-link" href="{{ route('admin.mudik-tujuan.index') }}">Master Tujuan</a>
                            </li>
                        @endcan
                        @can('mudik-provinsi-index')
                            <li class="{{ ActiveSidebarNew('admin.mudik-provinsi.*') }}">
                                <a class="nav-link" href="{{ route('admin.mudik-provinsi.index') }}">Master Provinsi</a>
                            </li>
                        @endcan
                        @can('mudik-bus-index')
                            <li class="{{ ActiveSidebarNew('admin.mudik-bus.*') }}">
                                <a class="nav-link" href="{{ route('admin.mudik-bus.index') }}">Master Bus</a>
                            </li>
                        @endcan
                        @can('mudik-kota-index')
                            <li class="{{ ActiveSidebarNew('admin.mudik-kota.*') }}">
                                <a class="nav-link" href="{{ route('admin.mudik-kota.index') }}">Master Kota Tujuan</a>
                            </li>
                        @endcan
                        @can('mudik-rute-index')
                            <li class="{{ ActiveSidebarNew('admin.mudik-rute.*') }}">
                                <a class="nav-link" href="{{ route('admin.mudik-rute.index') }}">Master Rute & Pemb.</a>
                            </li>
                        @endcan
                        @can('setting-rute-index')
                            <li class="{{ ActiveSidebarNew('admin.setting-rute.*') }}">
                                <a class="nav-link" href="{{ route('admin.setting-rute.index') }}">Setting Rute </a>
                            </li>
                        @endcan
                        @can('setting-stop-index')
                            <li class="{{ ActiveSidebarNew('admin.setting-stop.*') }}">
                                <a class="nav-link" href="{{ route('admin.setting-stop.index') }}">Setting Pemberhentian</a>
                            </li>
                        @endcan
                        @can('profession-index')
                            <li class="{{ ActiveSidebarNew('admin.profession.*') }}">
                                <a class="nav-link" href="{{ route('admin.profession.index') }}">Master Pekerjaan</a>
                            </li>
                        @endcan
                        @can('mudik-peserta-index-x')
                            <li class="{{ ActiveSidebarNew('admin.mudik-peserta.*') }}">
                                <a class="nav-link" href="{{ route('admin.mudik-peserta.index') }}">Peserta Gagal</a>
                            </li>
                        @endcan
                        @can('mudik-peserta-create')
                            <li class="{{ ActiveSidebarNew('admin.mudik-peserta.create') }}">
                                <a class="nav-link" href="{{ route('admin.mudik-peserta.create') }}">Input Peserta</a>
                            </li>
                        @endcan
                        @can('mudik-verifikasi-index')
                            <li class="{{ ActiveSidebarNew('admin.mudik-verifikasi.*') }}">
                                <a class="nav-link" href="{{ route('admin.mudik-verifikasi.index') }}">Verifikasi</a>
                            </li>
                        @endcan
                        @can('mudik-report-index')
                            <li class="{{ ActiveSidebarNew('admin.mudik-report.*') }}">
                                <a class="nav-link" href="{{ route('admin.mudik-report.index') }}">Report Peserta</a>
                            </li>
                        @endcan
                        @can('mudik-pengguna-index')
                            <li class="{{ ActiveSidebarNew('admin.mudik-pengguna.*') }}">
                                <a class="nav-link" href="{{ route('admin.mudik-pengguna.index') }}">Pengguna</a>
                            </li>
                        @endcan
                        @can('brodcast-pengguna-index')
                            <li class="{{ ActiveSidebarNew('admin.broadcast-pengguna.*') }}">
                                <a class="nav-link" href="{{ route('admin.broadcast-pengguna.index') }}">Kirim Notifikasi</a>
                            </li>
                        @endcan
                        @can('history-notifikasi-index')
                            <li class="{{ ActiveSidebarNew('admin.history-notifikasi.*') }}">
                                <a class="nav-link" href="{{ route('admin.history-notifikasi.index') }}">History Notifikasi</a>
                            </li>
                        @endcan
                        @can('peserta-cancel-index')
                            <li class="{{ ActiveSidebarNew('admin.peserta-cancel.*') }}">
                                <a class="nav-link" href="{{ route('admin.peserta-cancel.index') }}">Peserta Cancelled</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['survei-pertanyaan-index'])
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Survei</span></a>
                    <ul class="dropdown-menu">
                        @can('survei-pertanyaan-index')
                            <li class="{{ ActiveSidebarNew('admin.survei-pertanyaan.*') }}">
                                <a class="nav-link" href="{{ route('admin.survei-pertanyaan.index') }}">Pertanyaan</a>
                            </li>
                        @endcan
                        @can('survei-respon-index')
                            <li class="{{ ActiveSidebarNew('admin.survei-respon.*') }}">
                                <a class="nav-link" href="{{ route('admin.survei-respon.index') }}">Responden</a>
                            </li>
                        @endcan
                        @can('survei-report-index')
                            <li class="{{ ActiveSidebarNew('admin.survei-report.*') }}">
                                <a class="nav-link" href="{{ route('admin.survei-report.index') }}">Report</a>
                            </li>
                        @endcan
                        <li class="{{ ActiveSidebarNew('admin.survei-saran.*') }}">
                            <a class="nav-link" href="{{ route('admin.survei-saran.index') }}">Saran & Masukan</a>
                        </li>
                    </ul>
                </li>
            @endcanany
            @canany(['about-index', 'faq-index', 'portfolio-index', 'contact-page-index', 'terms-of-use-index',
                'privacy-policy-index'])
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"> <i
                            class="fas fa-copy"></i><span>{{ trans('admin.Pages') }}</span></a>
                    <ul class="dropdown-menu">
                        @can('contact-page-index')
                            <li class="{{ ActiveSidebarNew('admin.contact-page.*') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.contact-page.index') }}">{{ trans('admin.ContactPage') }}</a>
                            </li>
                        @endcan
                        @can('terms-of-use-index')
                            <li class="{{ ActiveSidebarNew('admin.terms-of-use.*') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.terms-of-use.index') }}">{{ trans('admin.Terms of use') }}</a>
                            </li>
                        @endcan
                        @can('privacy-policy-index')
                            <li class="{{ ActiveSidebarNew('admin.privacy-policy.*') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.privacy-policy.index') }}">{{ trans('admin.Privacy policy') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @can('contact-message-index')
                <li class="{{ ActiveSidebarNew('admin.contact-messages.*') }}"><a class="nav-link"
                        href="{{ route('admin.contact-messages.index') }}"><i class="fas fa-comment    "></i>
                        <span>{{ trans('admin.Contact Messages') }}</span></a>
                </li>
            @endcan
            @can('page-builder-index')
                <li class="{{ ActiveSidebarNew('admin.page-builder.*') }}"><a class="nav-link"
                        href="{{ route('admin.page-builder.index') }}"><i class="fas fa-hammer"></i>
                        <span>{{ trans('admin.Page builder') }}</span></a></li>
            @endcan
            @can('menu-builder-index')
                <li class="{{ ActiveSidebarNew('admin.menubuilder') }}"><a class="nav-link"
                        href="{{ route('admin.menubuilder') }}"><i class="fas fa-tools"></i>
                        <span>{{ trans('admin.Menu builder') }}</span></a></li>
            @endcan
            @canany(['testimonial-index', 'service-index', 'slider-index', 'sponsor-index'])
                <li class="menu-header">{{ trans('admin.Contents') }}</li>
                @can('slider-index')
                    <li class="nav-item {{ route('admin.slider.index') }}">
                        <a href="{{ route('admin.slider.index') }}" class="nav-link"><i
                                class="fas fa-sliders-h"></i><span>{{ trans('admin.Slider') }}</span></a>
                    </li>
                @endcan
            @endcanany
            @canany(['header-contact-index', 'social-link-index'])
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i
                            class="fas fa-edit"></i><span>{{ trans('admin.Header') }}</span></a>
                    <ul class="dropdown-menu">
                        @can('header-contact-index')
                            <li class="{{ ActiveSidebarNew('admin.header-contact.*') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.header-contact.index') }}">{{ trans('admin.Contact') }}
                                </a>
                            </li>
                        @endcan
                        @can('social-link-index')
                            <li class="{{ ActiveSidebarNew('admin.social-link.*') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.social-link.index') }}">{{ trans('admin.Social media') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['footer-contact-item-index', 'footer-link-index', 'footer-information-index'])
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i
                            class="fas fa-edit"></i><span>{{ trans('admin.Footer') }}</span></a>
                    <ul class="dropdown-menu">

                        @can('footer-contact-item-index')
                            <li class="{{ ActiveSidebarNew('admin.footer-contact-item.*') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.footer-contact-item.index') }}">{{ trans('admin.Contact') }}
                                </a>
                            </li>
                        @endcan


                        @can('footer-link-index')
                            <li class="{{ ActiveSidebarNew('admin.footer-link.*') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.footer-link.index') }}">{{ trans('admin.Links') }}</a>
                            </li>
                        @endcan


                        @can('footer-information-index')
                            <li class="{{ ActiveSidebarNew('admin.footer-information.*') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.footer-information.index') }}">{{ trans('admin.Informations') }}</a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcanany



            @canany(['admin-language-index', 'frontend-language-index'])
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"> <i class="fas fa-globe-asia"></i>
                        <span>{{ trans('admin.Language') }}</span></a>
                    <ul class="dropdown-menu">

                        @can('frontend-language-index')
                            <li class="{{ ActiveSidebarNew('admin.frontend-language.*') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.frontend-language.index') }}">{{ trans('admin.Frontend') }}
                                </a>
                            </li>
                        @endcan

                        @can('admin-language-index')
                            <li class="{{ ActiveSidebarNew('admin.admin-language.*') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.admin-language.index') }}">{{ trans('admin.Admin') }}</a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcanany


            @canany(['settings-index', 'role-index', 'user-index', 'media-manager-index', 'subscriber-index',
                'send-email-index'])

                <li class="menu-header">{{ trans('admin.Tools') }}</li>


                @can('settings-index')
                    <li class="{{ ActiveSidebarNew('admin.settings') }}"><a class="nav-link"
                            href="{{ route('admin.settings') }}"><i class="fas fa-cog"></i>
                            <span>{{ trans('admin.Settings') }}</span></a>
                    </li>
                @endcan


                @can('role-index')
                    <li class="{{ ActiveSidebarNew('admin.roles.*') }}"><a class="nav-link"
                            href="{{ route('admin.roles.index') }}"><i class="fas fa-key"></i>
                            <span>{{ trans('admin.Roles') }}</span></a>
                    </li>
                @endcan



                @can('user-index')
                    <li class="{{ ActiveSidebarNew('admin.users.*') }}"><a class="nav-link"
                            href="{{ route('admin.users.index') }}"><i class="fas fa-user"></i>
                            <span>{{ trans('admin.Users') }}</span></a>
                    </li>
                @endcan



                @can('media-manager-index')
                    <li class="{{ ActiveSidebarNew('admin.showmanager') }}"><a class="nav-link"
                            href="{{ route('admin.showmanager') }}"><i class="fas fa-images"></i>
                            <span>{{ trans('admin.Media manager') }}</span></a></li>
                @endcan


                @can('subscriber-index')
                    <li class="{{ ActiveSidebarNew('admin.subscriber.*') }}"><a class="nav-link"
                            href="{{ route('admin.subscriber.index') }}"><i class="fas fa-mail-bulk"></i>
                            <span>{{ trans('admin.Email subscribers') }}</span></a>
                    </li>
                @endcan



                @can('send-email-index')
                    <li class="{{ ActiveSidebarNew('admin.send-email.*') }}"><a class="nav-link"
                            href="{{ route('admin.send-email.index') }}"><i class="fas fa-envelope"></i>
                            <span>{{ trans('admin.Send email') }}</span></a></li>
                @endcan
            @endcanany


        </ul>
    </aside>
</div>
