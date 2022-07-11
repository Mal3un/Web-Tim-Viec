<div class="col-md-4 col-lg-4">
    <div class="rotating-card-container manual-flip" style="height: 328.844px; margin-bottom: 30px;">
        <div class="card card-rotate">
            <div class="front" style="height: 328.844px; ">
                <div class="card-content">
                    <h5 class="category-social text-success">
                        <i class="fa fa-newspaper-o"></i>{{$post->job_title}}
                    </h5>
                    <h4 class="card-title">
                        <a href="#pablo"></a>
                    </h4>
                    <p class="card-description">
                        {{$languages}}
                    </p>
                    <div>
                        <img src="{{$company->logo}}}" alt="..." class="img-raised img-circle">
                        {{$company->name}}
                    </div>
                    <div class="footer text-center">
                        <button type="button" name="button" class="btn btn-success btn-fill btn-round btn-rotate">
                            <i class="material-icons">refresh</i> Rotate...
                            <div class="ripple-container"></div></button>
                    </div>
                </div>
            </div>

            <div class="back" style="height: 328.844px">
                <div class="card-content">
                    <br>
                    <h5 class="card-title">
                        {{  __('frontpage.title2') }}
                    </h5>
                    <p class="card-description">
                        {{$post->district}}  {{$post->city}}
                        <br>
                        @if(!empty($post->min_salary) || !empty($post->max_salary) )
                            {{$post->min_salary}} - {{$post->max_salary}} {{$currency_salary}}
                        @endif
                    </p>
                    <div class="footer text-center">
                        <div class="" style="display: flex; justify-content:center;margin-bottom:14px">
                            <a href="#pablo" class="btn btn-rose btn-round ">
                                <i class="material-icons">subject</i> Read
                            </a>
                        </div>
                        <a href="#pablo" class="btn btn-just-icon btn-round btn-twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#pablo" class="btn btn-just-icon btn-round btn-dribbble">
                            <i class="fa fa-dribbble"></i>
                        </a>
                        <a href="#pablo" class="btn btn-just-icon btn-round btn-facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </div>
                    <br>
                    <button type="button" name="button" class="btn btn-simple btn-round btn-rotate">
                        <i class="material-icons">refresh</i> Back...
                        <div class="ripple-container"></div></button>

                </div>
            </div>

        </div>
    </div>
</div>

