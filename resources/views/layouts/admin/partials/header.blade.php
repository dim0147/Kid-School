<header>

    <div id="menu-container">
        <div class="container">

            @php
                function isActiveMenu($routes)
                {
                    $activeClassName = 'current_page_item';
                    // If is array list
                    if (is_array($routes)) {
                        // One of route is active route
                        foreach ($routes as $route) {
                            if (Route::is($route)) {
                                return $activeClassName;
                            }
                        }
                
                        // Not found
                        return '';
                    }
                
                    // Is single string
                    return Route::is($routes) ? $activeClassName : '';
                }
            @endphp

            <nav id="main-menu">
                <div class="dt-menu-toggle" id="dt-menu-toggle">Menu<span class="dt-menu-toggle-icon"></span>
                </div>
                <ul id="menu-main-menu" class="menu">

                    <li
                        class="menu-item-simple-parent menu-item-depth-0 red {{ isActiveMenu(['admin.roles.index', 'admin.roles.create']) }} ">
                        <a href="{{ route('admin.roles.index') }}">
                            Roles </a>
                        <ul class="sub-menu">
                            <li class="{{ isActiveMenu('admin.roles.create') }}"> <a
                                    href="{{ route('admin.roles.create') }}"><i class="fa fa-plus"></i> Create </a>
                            </li>
                        </ul>
                        <a class="dt-menu-expand">+</a>
                    </li>

                    <li
                        class="menu-item-simple-parent menu-item-depth-0 mustard {{ isActiveMenu(['admin.permissions.index', 'admin.permissions.create']) }}">
                        <a href="{{ route('admin.permissions.index') }}">
                            Permissions </a>
                        <ul class="sub-menu">
                            <li class="{{ isActiveMenu('admin.permissions.create') }}"> <a
                                    href="{{ route('admin.permissions.create') }}"><i class="fa fa-plus"></i>
                                    Create
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="green {{ isActiveMenu('admin.users.index') }} "> <a href="{{ route('admin.users.index') }}">
                            Users
                        </a> </li>


                    <li class="yellow"> <a href="services.html"> Class Room </a> </li>
                    {{-- <li class="menu-item-simple-parent menu-item-depth-0 blue"><a href="portfolio-four-column.html"
                            title="">Portfolio</a>
                        <ul class="sub-menu">
                            <li><a href="portfolio-four-column.html">Portfolio Four Column</a></li>
                            <li><a href="portfolio-three-column.html">Portfolio Three Column</a>
                                <ul class="sub-menu">
                                    <li><a href="portfolio-three-column-with-sidebar.html">With Sidebar</a></li>
                                </ul>
                                <a class="dt-menu-expand">+</a>
                            </li>
                        </ul>
                        <a class="dt-menu-expand">+</a>
                    </li>
                    <li class="menu-item-megamenu-parent megamenu-4-columns-group menu-item-depth-0 steelblue">
                        <a href="#" title=""> Pages </a>
                        <div class="megamenu-child-container">
                            <ul class="sub-menu">
                                <li> <a href="#">Useful Shortcodes</a>
                                    <ul class="sub-menu">
                                        <li> <a href="shortcodes.html">Typography </a> </li>
                                        <li><a href="buttons-lists.html" title="">Buttons &amp; Lists</a></li>
                                        <li><a href="columns.html" title="">Columns</a></li>
                                        <li><a href="fancy-boxes.html" title="">Fancy Boxes</a></li>
                                        <li><a href="icon-boxes.html" title="">Icon Boxes</a></li>
                                        <li><a href="pricing-tables.html" title="">Pricing Tables</a></li>
                                        <li><a href="progressbars.html" title="">Progress Bars</a></li>
                                        <li><a href="quotes.html" title="">Quotes</a></li>
                                        <li><a href="tabs-toggles.html" title="">Tabs &amp; Toggles</a></li>
                                    </ul>
                                    <a class="dt-menu-expand">+</a>
                                </li>
                                <li
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-depth-1 menu-item-with-widget-area">
                                    <a href="#">Popular Products</a>
                                    <div class="menu-item-widget-area-container">
                                        <ul>
                                            <li class="widget widget_popular_products">
                                                <ul class="product_list_widget">
                                                    <li>
                                                        <a href="#" title="">
                                                            <img src="storage/images/product_thumb1.jpg" alt="product">
                                                            Ellents Style Grade </a>
                                                        <span class="amount">$20.00</span>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">
                                                            <img src="storage/images/product_thumb2.jpg" alt="product">
                                                            Ellents Style Grade </a>
                                                        <span class="amount">$20.00</span>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">
                                                            <img src="storage/images/product_thumb3.jpg" alt="product">
                                                            Ellents Style Grade </a>
                                                        <span class="amount">$20.00</span>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-depth-1 menu-item-with-widget-area  fill-two-columns">
                                    <a href="#">Featured Blog</a>
                                    <div class="menu-item-widget-area-container">
                                        <ul>
                                            <li class="widget widget_recent_entries">
                                                <div class="entry-thumb">
                                                    <a href="blog-detail.html"><img
                                                            src="storage/images/mega_menu_blog_img1.jpg" alt=""
                                                            title=""></a>
                                                </div>
                                                <div class="entry-body">
                                                    <p>Ut enim ad minima veniam, quis nostrum exercitationem
                                                        ullam corporis suscipit.</p>
                                                </div>
                                                <div class="entry-details">
                                                    <div class="entry-title">
                                                        <h5><a href="blog-detail.html"> Create your Works </a>
                                                        </h5>
                                                    </div>
                                                    <div class="entry-metadata">
                                                        <p class="author"><a href="#"> By Admin </a></p>
                                                        <span class=""> | </span>
                                                        <p class="comments"><a href="#"><span
                                                                    class="fa fa-comment"></span></a></p>
                                                        <p class="date"> 10 Aug </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="widget widget_recent_entries">
                                                <div class="entry-thumb">
                                                    <a href="blog-detail.html"><img
                                                            src="storage/images/mega_menu_blog_img2.jpg" alt=""
                                                            title=""></a>
                                                </div>
                                                <div class="entry-body">
                                                    <p>Minima ve nostrum exercita tionem ullam corporis suscipit
                                                        laboriosam, nisi ut aliquid ex.</p>
                                                </div>
                                                <div class="entry-details">
                                                    <div class="entry-title">
                                                        <h5><a href="blog-detail.html"> Best of the Blogs </a>
                                                        </h5>
                                                    </div>
                                                    <div class="entry-metadata">
                                                        <p class="author"><a href="#"> By Admin </a></p>
                                                        <span class=""> | </span>
                                                        <p class="comments"><a href="#"><span
                                                                    class="fa fa-comment"></span></a></p>
                                                        <p class="date"> 10 Aug </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <a class="dt-menu-expand">+</a>
                    </li>
                    <li class="menu-item-simple-parent menu-item-depth-0 lavender"><a href="blog.html" title="">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="blog-two-column.html">Blog Two Column</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-two-column-with-sidebar.html">With Sidebar</a></li>
                                </ul>
                                <a class="dt-menu-expand">+</a>
                            </li>
                            <li><a href="blog.html">Blog One Column</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-with-sidebar.html">With Sidebar</a></li>
                                </ul>
                                <a class="dt-menu-expand">+</a>
                            </li>
                        </ul>
                        <a class="dt-menu-expand">+</a>
                    </li>
                    <li class="purple"><a href="shop.html" title="">Shop</a></li>
                    <li class="pink"><a href="contact.html" title="">Contact us</a></li> --}}
                </ul>
            </nav>

        
        </div>
    </div>

</header>
