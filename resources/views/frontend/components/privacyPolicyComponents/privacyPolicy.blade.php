@if (@App\Models\PrivacyPolicy::first())
    <!-- Section: Our Services -->
    <section class="mb-5">
        <div class="container pb-90">
            <div class="section-content">
                {!! clean(html_entity_decode(@App\Models\PrivacyPolicy::first()->content)) !!}
            </div>
        </div>
    </section>
@endif
