<section id="slider">
  <!--slider-->
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#slider-carousel" data-slide-to="1"></li>
            <li data-target="#slider-carousel" data-slide-to="2"></li>
          </ol>
          <style type="text/css">
            img.img.img-responsive.img-slider {
              height: 400px;
            }
          </style>
          <div class="carousel-inner">
            @php
            $i = 0;
            @endphp
            @foreach($slider as $key => $slide)
            @php
            $i++;
            @endphp
            <div class="item {{$i==1 ? 'active' : '' }}">

              <div class="col-sm-12">
                <a href="#">
                  <img alt="{{$slide->slider_desc}}" src="{{asset('public/uploads/slider/'.$slide->slider_image)}}"
                    height="200px" width="100%" class="img img-responsive img-slider"
                    style="margin-left: -45px;border-radius:20px;" />



                </a>
              </div>

            </div>
            @endforeach


          </div>

          <a href=" #slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>
        </div>

      </div>
    </div>
  </div>
</section>
<!--/slider-->

