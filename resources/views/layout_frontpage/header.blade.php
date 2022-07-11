<nav  class="navbar navbar-default navbar-transparent navbar-fixed-top navbar-color-on-scroll" color-on-scroll="100"
     id="sectionsNav" style="background-color:cadetblue">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="presentation.html">{{  __('frontpage.content') }}</a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">public</i> Languages
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-with-icons">
                        <li>
                            <a href="{{ route('language', 'en') }}">
                                <img alt="" src="{{asset('images/england.png')}}" style="width:20px" > English
                            </a>
                            <a href="{{ route('language', 'vi') }}">
                                <img alt="" src="{{asset('images/vietnam.png')}}" style="width:20px" > English
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">view_carousel</i> Examples
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-with-icons">
                        <li>
                            <a href="../examples/about-us.html">
                                <i class="material-icons">account_balance</i> About Us
                            </a>
                        </li>
                        <li>
                            <a href="../examples/blog-post.html">
                                <i class="material-icons">art_track</i> Blog Post
                            </a>
                        </li>
                        <li>
                            <a href="../examples/blog-posts.html">
                                <i class="material-icons">view_quilt</i> Blog Posts
                            </a>
                        </li>
                        <li>
                            <a href="../examples/contact-us.html">
                                <i class="material-icons">location_on</i> Contact Us
                            </a>
                        </li>
                        <li>
                            <a href="../examples/landing-page.html">
                                <i class="material-icons">view_day</i> Landing Page
                            </a>
                        </li>
                        <li>
                            <a href="../examples/login-page.html">
                                <i class="material-icons">fingerprint</i> Login Page
                            </a>
                        </li>
                        <li>
                            <a href="../examples/pricing.html">
                                <i class="material-icons">attach_money</i> Pricing Page
                            </a>
                        </li>
                        <li>
                            <a href="../examples/ecommerce.html">
                                <i class="material-icons">shop</i> Ecommerce Page
                            </a>
                        </li>
                        <li>
                            <a href="../examples/product-page.html">
                                <i class="material-icons">beach_access</i> Product Page
                            </a>
                        </li>
                        <li>
                            <a href="../examples/profile-page.html">
                                <i class="material-icons">account_circle</i> Profile Page
                            </a>
                        </li>
                        <li>
                            <a href="../examples/signup-page.html">
                                <i class="material-icons">person_add</i> Signup Page
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="button-container">
                    <a href="http://www.creative-tim.com/buy/material-kit-pro?ref=presentation" target="_blank"
                       class="btn btn-rose btn-round">
                        <i class="material-icons">shopping_cart</i> Buy Now
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
{{--<div class="page-header header-filter header-small" style="height:200px" data-parallax="true">--}}
{{--    <div class="container" >--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-8 col-md-offset-2">--}}
{{--                <div class="brand">--}}
{{--                    <h1 class="title">Ecommerce Page!</h1>--}}
{{--                    <h4>Free global delivery for all products. Use coupon <b>25summer</b> for an extra 25% Off</h4>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
