<div class="container-fluid p-0">
    <div class="row">
      <div class="col">
        <!-- START Industrivo Rev Slider 2 REVOLUTION SLIDER 6.1.7 -->
        <p class="rs-p-wp-fix"></p>
        <rs-module-wrap id="rev_slider_1_1_wrapper" data-alias="firoox-revolution-slider" data-source="gallery">
          <rs-module id="rev_slider_1_1" data-version="6.3.3">
            <rs-slides>
                @foreach (@App\Models\Slider::all() as $item)
                <rs-slide data-key="rs-{{$item->id}}" data-title="Slide {{$loop->iteration}}" data-thumb="{{MediaImage($item->image, 1)}}" data-anim="ei:d;eo:d;s:d;r:default;t:slotslide-horizontal;sl:d;">
                    <img src="{{MediaImage($item->image, 1)}}" title="firoox-s1" width="1920" height="1280" data-bg="p:center top;" data-parallax="off" class="rev-slidebg" data-no-retina>
                    <rs-layer
                      id="slider-2-slide-2-layer-10"
                      data-type="text"
                      data-rsp_ch="on"
                      data-xy="x:l,l,c,c;xo:50px,0,-155px,0;yo:300px,203px,175px,179px;"
                      data-text="w:normal;s:18,22,18,18;l:36,36,36,36;ls:1px,1px,0px,1px;fw:500;a:center,center,center,center;"
                      data-dim="w:345px,400px,330px,356px;h:auto,auto,auto,auto;"
                      data-frame_0="y:-50,-37,-28,-17;"
                      data-frame_1="st:500;sp:1000;sR:500;"
                      data-frame_999="o:0;st:w;sR:7500;"
                      class="font-current-theme2 bg-white text-theme-colored2 border-radius-5"
                    >{{$item->title}}
                    </rs-layer>
                    <rs-layer
                      id="slider-2-slide-2-layer-18"
                      data-type="text"
                      data-rsp_ch="on"
                      data-xy="x:l,l,c,c;xo:55px,0px,8px,0;yo:338px,249px,220px,245px;"
                      data-text="w:normal;s:90,72,62,46;l:95,90,80,48;ls:1px,0px,0px,0px;fw:900;a:left,left,left,center;"
                      data-dim="w:1000px,743px,659px,455px;"
                      data-frame_0="y:-50,-37,-28,-17;"
                      data-frame_1="st:1100;sp:1000;sR:1100;"
                      data-frame_999="o:0;st:w;sR:6900;"
                      class="font-current-theme2"
                    >{{$item->subtitle}}
                    </rs-layer>
                    <rs-layer
                      id="slider-2-slide-2-layer-22"
                      data-type="text"
                      data-rsp_ch="on"
                      data-xy="x:l,l,c,c;xo:60px,0px,-225px,0px;yo:548px,450px,400px,400px;"
                      data-text="w:normal;s:20,16,16,13;l:22,20,18,20;a:left,left,left,center;"
                      data-frame_0="y:-50,-37,-28,-17;"
                      data-frame_1="st:1700;sp:1000;sR:1700;"
                      data-frame_999="o:0;st:w;sR:6300;"
                      class="font-current-theme1"
                    ><a href="{{$item->button_link}}" class="btn btn-theme-colored1">{{$item->button}}</a>
                    </rs-layer>
                    <rs-layer
                      id="slider-2-slide-2-layer-0"
                      data-type="shape"
                      data-rsp_ch="on"
                      data-text="w:normal;s:20,14,10,6;l:0,18,13,8;"
                      data-dim="w:100%;h:100%;"
                      data-basealign="slide"
                      data-frame_999="o:0;st:w;sR:8700;"
                    >
                    </rs-layer>
                  </rs-slide>
        @endforeach
            </rs-slides>
            <rs-static-layers>
              <!--
                -->
            </rs-static-layers>
            <rs-progress class="rs-bottom rs-bottom-height"></rs-progress>
          </rs-module>
          <script>
            if(typeof revslider_showDoubleJqueryError === "undefined") {
              function revslider_showDoubleJqueryError(sliderID) {
                var err = "<div class='rs_error_message_box'>";
                err += "<div class='rs_error_message_oops'>Oops...</div>";
                err += "<div class='rs_error_message_content'>";
                err += "You have some jquery.js library include that comes after the Slider Revolution files js inclusion.<br>";
                err += "To fix this, you can:<br>&nbsp;&nbsp;&nbsp; 1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on";
                err += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jQuery.js inclusion and remove it";
                err += "</div>";
                err += "</div>";
                jQuery(sliderID).show().html(err);
              }
            }
          </script>
        </rs-module-wrap>
        <!-- END REVOLUTION SLIDER -->
      </div>
    </div>
  </div>
