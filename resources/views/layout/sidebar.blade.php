<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="assets/images/logo.png" alt="" height="16">
                    </span>
        <span class="logo-sm">
                        <img src="assets/images/logo_sm.png" alt="" height="16">
                    </span>
    </a>

    <!-- LOGO -->
{{--    <a href="index.html" class="logo text-center logo-dark">--}}
{{--                    <span class="logo-lg">--}}
{{--                        <img src="assets/images/logo-dark.png" alt="" height="16">--}}
{{--                    </span>--}}
{{--        <span class="logo-sm">--}}
{{--                        <img src="assets/images/logo_sm_dark.png" alt="" height="16">--}}
{{--                    </span>--}}
{{--    </a>--}}

    <div class="h-100" id="left-side-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="metismenu side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="uil-users-alt"></i>
                    <span> Manager </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{route('admin.users.index')}}">
                            User
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.posts.index')}}">
                            Posts
                        </a>
                    </li>
                    <li>
                        <a href="apps-ecommerce-orders-details.html">Order Details</a>
                    </li>
                    <li>
                        <a href="apps-ecommerce-customers.html">Customers</a>
                    </li>
                    <li>
                        <a href="apps-ecommerce-shopping-cart.html">Shopping Cart</a>
                    </li>
                    <li>
                        <a href="apps-ecommerce-checkout.html">Checkout</a>
                    </li>
                    <li>
                        <a href="apps-ecommerce-sellers.html">Sellers</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
