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

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bus"></i><span>Mudik</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ ActiveSidebar('admin.mudik-tujuan.index') }}">
                        <a class="nav-link" href="{{ route('admin.mudik-tujuan.index') }}">Master Tujuan</a>
                    </li>
                    <li class="{{ ActiveSidebar('admin.mudik-provinsi.index') }}">
                        <a class="nav-link" href="{{ route('admin.mudik-provinsi.index') }}">Master Provinsi</a>
                    </li>
                    <li class="{{ ActiveSidebar('admin.mudik-kota.index') }}">
                        <a class="nav-link" href="{{ route('admin.mudik-kota.index') }}">Master Kota Tujuan</a>
                    </li>
                    <li class="{{ ActiveSidebar('admin.mudik-bus.index') }}">
                        <a class="nav-link" href="{{ route('admin.mudik-bus.index') }}">Master Bus</a>
                    </li>
                    <li class="{{ ActiveSidebar('admin.mudik-peserta.index') }}">
                        <a class="nav-link" href="{{ route('admin.mudik-peserta.index') }}">Peserta Gagal</a>
                    </li>
                    <li class="{{ ActiveSidebar('admin.mudik-verifikasi.index') }}">
                        <a class="nav-link" href="{{ route('admin.mudik-verifikasi.index') }}">Verifikasi</a>
                    </li>
                </ul>
            </li>

            @canany(['blog-index', 'blog-create', 'blog-category-index', 'blog-comment-index'])
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fas fa-edit"></i><span>{{ trans('admin.Blog') }}</span></a>
                    <ul class="dropdown-menu">

                        @can('blog-create')
                            <li class="{{ ActiveSidebar('admin.blog.create') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.blog.create') }}">{{ trans('admin.Post') }}</a>
                            </li>
                        @endcan

                        @can('blog-category-index')
                            <li class="{{ ActiveSidebar('admin.blog-category.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.blog-category.index') }}">{{ trans('admin.Categories') }}</a>
                            </li>
                        @endcan


                        @can('blog-index')
                            <li class="{{ ActiveSidebar('admin.blog.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.blog.index') }}">{{ trans('admin.Blogs') }}</a>
                            </li>
                        @endcan


                        @can('blog-comment-index')
                            <li class="{{ ActiveSidebar('admin.blog-comment.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.blog-comment.index') }}">{{ trans('admin.Comments') }}</a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcanany



            @canany(['about-index', 'faq-index', 'portfolio-index', 'contact-page-index', 'terms-of-use-index',
                'privacy-policy-index'])
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"> <i
                            class="fas fa-copy"></i><span>{{ trans('admin.Pages') }}</span></a>
                    <ul class="dropdown-menu">

                        @can('about-index')
                            <li class="{{ ActiveSidebar('admin.about.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.about.index') }}">{{ trans('admin.About') }}</a>
                            </li>
                        @endcan


                        @can('faq-index')
                            <li class="{{ ActiveSidebar('admin.faq.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.faq.index') }}">{{ trans('admin.Faq') }}</a>
                            </li>
                        @endcan


                        @can('portfolio-index')
                            <li class="{{ ActiveSidebar('admin.portfolio.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.portfolio.index') }}">{{ trans('admin.Portfolio') }}</a>
                            </li>
                        @endcan


                        @can('contact-page-index')
                            <li class="{{ ActiveSidebar('admin.contact-page.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.contact-page.index') }}">{{ trans('admin.ContactPage') }}</a>
                            </li>
                        @endcan


                        @can('terms-of-use-index')
                            <li class="{{ ActiveSidebar('admin.terms-of-use.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.terms-of-use.index') }}">{{ trans('admin.Terms of use') }}</a>
                            </li>
                        @endcan


                        @can('privacy-policy-index')
                            <li class="{{ ActiveSidebar('admin.privacy-policy.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.privacy-policy.index') }}">{{ trans('admin.Privacy policy') }}</a>
                            </li>
                        @endcan


                    </ul>
                </li>
            @endcanany




            @canany(['intro-index', 'parallax-index', 'statistic-index', 'blog-comment-index'])
                <li class="nav-item dropdown ">
                    <a href="#" class="nav-link has-dropdown"> <i
                            class="fas fa-puzzle-piece"></i><span>{{ trans('admin.Sections') }}</span></a>
                    <ul class="dropdown-menu">

                        @can('intro-index')
                            <li class="{{ ActiveSidebar('admin.intro.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.intro.index') }}">{{ trans('admin.Intro') }}</a>
                            </li>
                        @endcan


                        @can('parallax-index')
                            <li class="{{ ActiveSidebar('admin.parallax.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.parallax.index') }}">{{ trans('admin.Parallax') }}</a>
                            </li>
                        @endcan


                        @can('statistic-index')
                            <li class="{{ ActiveSidebar('admin.statistic.index') }}">
                                <a href="{{ route('admin.statistic.index') }}" class="nav-link">
                                    {{ trans('admin.Statistics') }}</a>
                            </li>
                        @endcan


                        @can('statistic-item-index')
                            <li class="{{ ActiveSidebar('admin.statistic-item.index') }}">
                                <a href="{{ route('admin.statistic-item.index') }}" class="nav-link">
                                    {{ trans('admin.Statistics items') }}</a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcanany




            @canany(['product-index', 'product-category-index', 'order-index', 'product-review-index',
                'shop-slider-index', 'shop-service-index', 'shop-discount-index', 'transaction-index',
                'shipping-country-index', 'shop-settings-index'])
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fas fa-store"></i>
                        <span>{{ trans('admin.Shop') }}</span></a>
                    <ul class="dropdown-menu">

                        @can('product-index')
                            <li class="{{ ActiveSidebar('admin.product.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.product.index') }}">{{ trans('admin.Products') }}</a>
                            </li>
                        @endcan


                        @can('product-category-index')
                            <li class="{{ ActiveSidebar('admin.product-category.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.product-category.index') }}">{{ trans('admin.Categories') }}</a>
                            </li>
                        @endcan


                        @can('order-index')
                            <li class="{{ ActiveSidebar('admin.order.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.order.index') }}">{{ trans('admin.Orders') }}</a>
                            </li>
                        @endcan

                        @can('product-review-index')
                            <li class="{{ ActiveSidebar('admin.product-review.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.product-review.index') }}">{{ trans('admin.Reviews') }}</a>
                            </li>
                        @endcan


                        @can('shop-slider-index')
                            <li class="{{ ActiveSidebar('admin.shop-slider.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.shop-slider.index') }}">{{ trans('admin.Slider') }}</a>
                            </li>
                        @endcan


                        @can('shop-service-index')
                            <li class="{{ ActiveSidebar('admin.shop-service.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.shop-service.index') }}">{{ trans('admin.Service') }}</a>
                            </li>
                        @endcan


                        @can('shop-discount-index')
                            <li class="{{ ActiveSidebar('admin.shop-discount.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.shop-discount.index') }}">{{ trans('admin.Discount section') }}</a>
                            </li>
                        @endcan


                        @can('transaction-index')
                            <li class="{{ ActiveSidebar('admin.transaction.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.transaction.index') }}">{{ trans('admin.Transactions') }}</a>
                            </li>
                        @endcan


                        @can('shipping-country-index')
                            <li class="{{ ActiveSidebar('admin.shipping-country.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.shipping-country.index') }}">{{ trans('admin.Shipping country') }}</a>
                            </li>
                        @endcan


                        @can('shop-settings-index')
                            <li class="{{ ActiveSidebar('admin.shop-setting.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.shop-setting.index') }}">{{ trans('admin.Shop setting') }}</a>
                            </li>
                        @endcan

                    </ul>
                </li>

            @endcanany






            @can('appointment-index')
                <li class="{{ ActiveSidebar('admin.appointment.index') }}"><a class="nav-link"
                        href="{{ route('admin.appointment.index') }}"><i class="fas fa-clock"></i>
                        <span>{{ trans('admin.Appointments') }}</span></a>
                </li>
            @endcan



            @can('contact-message-index')
                <li class="{{ ActiveSidebar('admin.contact-messages.index') }}"><a class="nav-link"
                        href="{{ route('admin.contact-messages.index') }}"><i class="fas fa-comment    "></i>
                        <span>{{ trans('admin.Contact Messages') }}</span></a>
                </li>
            @endcan




            @can('page-builder-index')
                <li class="{{ ActiveSidebar('admin.page-builder.index') }}"><a class="nav-link"
                        href="{{ route('admin.page-builder.index') }}"><i class="fas fa-hammer"></i>
                        <span>{{ trans('admin.Page builder') }}</span></a></li>
            @endcan




            @can('menu-builder-index')
                <li class="{{ ActiveSidebar('admin.menubuilder') }}"><a class="nav-link"
                        href="{{ route('admin.menubuilder') }}"><i class="fas fa-tools"></i>
                        <span>{{ trans('admin.Menu builder') }}</span></a></li>
            @endcan






            @canany(['testimonial-index', 'service-index', 'slider-index', 'sponsor-index'])

                <li class="menu-header">{{ trans('admin.Contents') }}</li>


                @can('testimonial-index')
                    <li class="nav-item {{ route('admin.testimonial.index') }}">
                        <a href="{{ route('admin.testimonial.index') }}" class="nav-link"><i
                                class="fas fa-comments"></i><span>{{ trans('admin.Testimonials') }}</span></a>
                    </li>
                @endcan


                @can('service-index')
                    <li class="nav-item {{ route('admin.service.index') }}">
                        <a href="{{ route('admin.service.index') }}" class="nav-link"><i
                                class="fas fa-cogs"></i><span>{{ trans('admin.Services') }}</span></a>
                    </li>
                @endcan


                @can('slider-index')
                    <li class="nav-item {{ route('admin.slider.index') }}">
                        <a href="{{ route('admin.slider.index') }}" class="nav-link"><i
                                class="fas fa-sliders-h"></i><span>{{ trans('admin.Slider') }}</span></a>
                    </li>
                @endcan


                @can('sponsor-index')
                    <li class="nav-item {{ route('admin.sponsor.index') }}">
                        <a href="{{ route('admin.sponsor.index') }}" class="nav-link">
                            <i class="far fa-handshake"></i>
                            <span>{{ trans('admin.Sponsors') }}</span></a>
                    </li>
                @endcan
            @endcanany




            @canany(['header-contact-index', 'social-link-index'])
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i
                            class="fas fa-edit"></i><span>{{ trans('admin.Header') }}</span></a>
                    <ul class="dropdown-menu">

                        @can('header-contact-index')
                            <li class="{{ ActiveSidebar('admin.header-contact.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.header-contact.index') }}">{{ trans('admin.Contact') }}
                                </a>
                            </li>
                        @endcan


                        @can('social-link-index')
                            <li class="{{ ActiveSidebar('admin.social-link.index') }}">
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
                            <li class="{{ ActiveSidebar('admin.footer-contact-item.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.footer-contact-item.index') }}">{{ trans('admin.Contact') }}
                                </a>
                            </li>
                        @endcan


                        @can('footer-link-index')
                            <li class="{{ ActiveSidebar('admin.footer-link.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.footer-link.index') }}">{{ trans('admin.Links') }}</a>
                            </li>
                        @endcan


                        @can('footer-information-index')
                            <li class="{{ ActiveSidebar('admin.footer-information.index') }}">
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
                            <li class="{{ ActiveSidebar('admin.frontend-language.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.frontend-language.index') }}">{{ trans('admin.Frontend') }}
                                </a>
                            </li>
                        @endcan

                        @can('admin-language-index')
                            <li class="{{ ActiveSidebar('admin.admin-language.index') }}">
                                <a class="nav-link"
                                    href="{{ route('admin.admin-language.index') }}">{{ trans('admin.Admin') }}</a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcanany


            @canany(['settings-index', 'role-index', 'user-index', 'media-manager-index','subscriber-index', 'send-email-index'])

                <li class="menu-header">{{ trans('admin.Tools') }}</li>


                @can('settings-index')
                    <li class="{{ ActiveSidebar('admin.settings') }}"><a class="nav-link"
                            href="{{ route('admin.settings') }}"><i class="fas fa-cog"></i>
                            <span>{{ trans('admin.Settings') }}</span></a>
                    </li>
                @endcan


                @can('role-index')
                    <li class="{{ ActiveSidebar('admin.roles.index') }}"><a class="nav-link"
                            href="{{ route('admin.roles.index') }}"><i class="fas fa-key"></i>
                            <span>{{ trans('admin.Roles') }}</span></a>
                    </li>
                @endcan



                @can('user-index')
                    <li class="{{ ActiveSidebar('admin.users.index') }}"><a class="nav-link"
                            href="{{ route('admin.users.index') }}"><i class="fas fa-user"></i>
                            <span>{{ trans('admin.Users') }}</span></a>
                    </li>
                @endcan



                @can('media-manager-index')
                    <li class="{{ ActiveSidebar('admin.showmanager') }}"><a class="nav-link"
                            href="{{ route('admin.showmanager') }}"><i class="fas fa-images"></i>
                            <span>{{ trans('admin.Media manager') }}</span></a></li>
                @endcan


                @can('subscriber-index')
                    <li class="{{ ActiveSidebar('admin.subscriber.index') }}"><a class="nav-link"
                            href="{{ route('admin.subscriber.index') }}"><i class="fas fa-mail-bulk"></i>
                            <span>{{ trans('admin.Email subscribers') }}</span></a>
                    </li>
                @endcan



                @can('send-email-index')
                    <li class="{{ ActiveSidebar('admin.send-email.index') }}"><a class="nav-link"
                            href="{{ route('admin.send-email.index') }}"><i class="fas fa-envelope"></i>
                            <span>{{ trans('admin.Send email') }}</span></a></li>
                @endcan
            @endcanany


        </ul>
    </aside>
</div>
