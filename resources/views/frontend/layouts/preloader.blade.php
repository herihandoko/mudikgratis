@if (GetSetting('preloader_enabled') == true)
    @if (GetSetting('preloader_style') == 1)
        <div class="preloader">
            <div class="loader">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    @elseif(GetSetting('preloader_style') == 2)
        <div class="preloader">
            <div class="lds-dual-ring"></div>
        </div>
    @endif
@endif
