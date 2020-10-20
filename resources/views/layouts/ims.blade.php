<!DOCTYPE html>
<html>

<head>
    <!-- Meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Chrome, Firefox OS and Opera mobile address bar theming -->
    <meta name="theme-color" content="#000000">
    <!-- Windows Phone mobile address bar theming -->
    <meta name="msapplication-navbutton-color" content="#000000">
    <!-- iOS Safari mobile address bar theming -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#000000">

    <!-- Fav and Title -->
    <link rel="icon" href="/static/halfmoon/img/halfmoon-icon.png">
    <title>Inventory Management System - UOA</title>


    <!-- Halfmoon CSS -->
    <link href="{{asset('/css/halfmoon.min.css')}}" rel="stylesheet" />
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <!-- Roboto font (Used when Apple system fonts are not available) -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Highlight js theme -->
    <link href="/static/site/css/halfmoon-highlight-js-theme.css" rel="stylesheet">
    <!-- Documentation styles -->
    <link href="/static/site/css/documentation-styles-2.css" rel="stylesheet">



</head>


<body class="with-custom-webkit-scrollbars with-custom-css-scrollbars" data-dm-shortcut-enabled="true" data-sidebar-shortcut-enabled="true" data-set-preferred-theme-onload="true" onload="toastAlert()">

    <!-- Documentation section id (hidden) -->
    <input type="hidden" name="docs-section-id" id="docs-section-id" value="introduction">



    <!-- Page wrapper start -->
    <div id="page-wrapper" class="page-wrapper with-navbar with-sidebar" data-sidebar-type="overlayed-sm-and-down">
        @foreach (['danger', 'warning', 'success', 'info', 'primary'] as $msg)
        @if(Session::has('alert-' . $msg))
        <script>
            function toastAlert() {
                var alertContent = "{{ Session::get('alert-' . $msg) }}";
                // Built-in function
                halfmoon.initStickyAlert({
                    content: alertContent, // Required, main content of the alert, type: string (can contain HTML)
                    title: " Notification",
                    alertType: "alert-{{$msg}}", // Optional, title of the alert, default: "", type: string
                })
            }
        </script>
        @endif
        @endforeach

        <div class="sticky-alerts"></div>



        <!-- Navbar start -->
        <nav class="navbar">
            <div class="navbar-content">
                <button id="toggle-sidebar-btn" class="btn btn-action" type="button" onclick="halfmoon.toggleSidebar()">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
            </div>
            <a href="{{url('/home')}}" class="navbar-brand ml-10 ml-sm-15">IMS
                <span class="badge font-size-12 text-monospace px-5 px-sm-10 ml-10">
                    V 1.0.0
                </span>
            </a>
            <ul class="navbar-nav hidden-sm-and-down">
                <li class="nav-item">
                    <a href="/" class="nav-link">Home</a>
                </li>

            </ul>
            <div class="navbar-content ml-auto">


                <button class="btn btn-action mr-5" type="button" onclick="halfmoon.toggleDarkMode()" aria-label="Toggle dark mode">
                    <i class="fa fa-moon-o" aria-hidden="true"></i>
                </button>
               
                <a class="btn btn-primary hidden-sm-and-down    " id="sidebar-content-and-cards" data-active-scroll-disabled="disabled" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <div class="dropdown with-arrow hidden-md-and-up">
                    <button class="btn navbar-menu-btn" data-toggle="dropdown" type="button" id="navbar-dropdown-toggle-btn" aria-haspopup="true" aria-expanded="false">
                        <span class="text">Menu</span>
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-dropdown-toggle-btn">
                        <a href="/" class="dropdown-item">Home</a>
                        <a href="/docs/introduction/" class="dropdown-item">Documentation</a>
                        <a href="/license/" class="dropdown-item">License <span class="text-monospace font-size-12">(MIT)</span></a>
                        <div class="dropdown-divider"></div>

                        <div class="dropdown-content">
                            <a href="/docs/download/" class="btn btn-primary btn-download-sm" role="button">
                                <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                <span class="ml-5">Download</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar end -->

        <!-- Sidebar overlay -->
        <div class="sidebar-overlay" onclick="halfmoon.toggleSidebar()"></div>

        <!-- Sidebar start -->
        <div class="sidebar" id="sidebar">
            <!-- Filter docs section start -->
            <div class="sidebar-menu">
                <div class="sidebar-content">
                    <input class="form-control search" type="text" placeholder="Filter docs" id="filter-docs">
                    <div class="mt-10 font-size-12 hidden-sm-and-down">
                        Press <kbd>shift</kbd> + <kbd>F</kbd> to focus
                    </div>
                </div>
            </div>
            <!-- Filter docs section end -->

            <!-- Filterable list start -->
            <div class="sidebar-menu list">
                <!-- Getting started section start -->
                <h5 class="sidebar-title">
                    Inventory Summary
                    <span class="hidden-search-terms name">Introduction | Download | Page building | Starter template generator</span>
                </h5>
                <div class="sidebar-divider">
                    <span class="hidden-search-terms name">Introduction | Download | Page building | Starter template generator</span>
                </div>
                <a href="{{url('/home')}}" class="sidebar-link" id="sidebar-introduction" data-active-scroll-disabled="disabled">
                    <span class="name">Dashboard</span>
                </a>
                @if(Auth::user()->role == 2)
                <a href="{{url('/product')}}" class="sidebar-link" id="sidebar-introduction" data-active-scroll-disabled="disabled">
                    <span class="name">Products</span>
                </a>
                <a href="{{url('/purchase')}}" class="sidebar-link" id="sidebar-download" data-active-scroll-disabled="disabled">
                    <span class="name">Purchase Details</span>
                </a>
                <a href="{{url('/distribution')}}" class="sidebar-link" id="sidebar-page-building" data-active-scroll-disabled="disabled">
                    <span class="name">Distribution Details</span>
                    <br />
                    
                </a>
                <br />
                <!-- Getting started section end -->
                <h5 class="sidebar-title">
                    Products
                    <span class="hidden-search-terms name">Containers | Content and cards | Grid system | Navbar | Sidebar</span>
                </h5>
                <div class="sidebar-divider">
                    <span class="hidden-search-terms name">Containers | Content and cards | Grid system | Navbar | Sidebar</span>
                </div>
                <a href="{{url('/product')}}" class="sidebar-link" id="sidebar-containers" data-active-scroll-disabled="disabled">
                    <span class="name">Product Details</span>
                </a>
                <a href="{{url('/product/create/')}}" class="sidebar-link" id="sidebar-content-and-cards" data-active-scroll-disabled="disabled">
                    <span class="name">Add New Product</span>
                </a>
                <a href="{{url('/products/archive/')}}" class="sidebar-link" id="sidebar-content-and-cards" data-active-scroll-disabled="disabled">
                    <span class="name">Archived Product</span>
                </a>

                <br />
                <!-- Building blocks section start -->
                <h5 class="sidebar-title">
                    Purchase
                    <span class="hidden-search-terms name">Containers | Content and cards | Grid system | Navbar | Sidebar</span>
                </h5>
                <div class="sidebar-divider">
                    <span class="hidden-search-terms name">Containers | Content and cards | Grid system | Navbar | Sidebar</span>
                </div>
                <a href="{{url('/purchase')}}" class="sidebar-link" id="sidebar-containers" data-active-scroll-disabled="disabled">
                    <span class="name">Purchase Details</span>
                </a>
                <a href="{{url('/purchase/create/')}}" class="sidebar-link" id="sidebar-content-and-cards" data-active-scroll-disabled="disabled">
                    <span class="name">Add New Purchase Details</span>
                </a>

                <br />

                <h5 class="sidebar-title">
                    Distribution
                    <span class="hidden-search-terms name">Containers | Content and cards | Grid system | Navbar | Sidebar</span>
                </h5>
                <div class="sidebar-divider">
                    <span class="hidden-search-terms name">Containers | Content and cards | Grid system | Navbar | Sidebar</span>
                </div>
                <a href="{{url('/distribution')}}" class="sidebar-link" id="sidebar-containers" data-active-scroll-disabled="disabled">
                    <span class="name">Distribution Details</span>
                </a>
                <a href="{{url('/distribution/create/')}}" class="sidebar-link" id="sidebar-content-and-cards" data-active-scroll-disabled="disabled">
                    <span class="name">Add Distribution Details</span>
                </a>

                <br />
                <!-- Building blocks section end -->
                <h5 class="sidebar-title">
                    Department details
                    <span class="hidden-search-terms name">Containers | Content and cards | Grid system | Navbar | Sidebar</span>
                </h5>
                <div class="sidebar-divider">
                    <span class="hidden-search-terms name">Containers | Content and cards | Grid system | Navbar | Sidebar</span>
                </div>
                <a href="{{url('/department')}}" class="sidebar-link" id="sidebar-containers" data-active-scroll-disabled="disabled">
                    <span class="name">Department Details</span>
                </a>
                <a href="{{url('/department/create/')}}" class="sidebar-link" id="sidebar-content-and-cards" data-active-scroll-disabled="disabled">
                    <span class="name">Add Department Details</span>
                </a>

                <br />

                <h5 class="sidebar-title">
                    Supplier details
                    <span class="hidden-search-terms name">Containers | Content and cards | Grid system | Navbar | Sidebar</span>
                </h5>
                <div class="sidebar-divider">
                    <span class="hidden-search-terms name">Containers | Content and cards | Grid system | Navbar | Sidebar</span>
                </div>
                <a href="{{url('/supplier')}}" class="sidebar-link" id="sidebar-containers" data-active-scroll-disabled="disabled">
                    <span class="name">Supplier Details</span>
                </a>
                <a href="{{url('/supplier/create/')}}" class="sidebar-link" id="sidebar-content-and-cards" data-active-scroll-disabled="disabled">
                    <span class="name">Add Supplier Details</span>
                </a>

                <br />

                <h5 class="sidebar-title">
                    Users details
                    <span class="hidden-search-terms name">Containers | Content and cards | Grid system | Navbar | Sidebar</span>
                </h5>
                <div class="sidebar-divider">
                    <span class="hidden-search-terms name">Containers | Content and cards | Grid system | Navbar | Sidebar</span>
                </div>
                <a href="{{url('/user')}}" class="sidebar-link" id="sidebar-containers" data-active-scroll-disabled="disabled">
                    <span class="name">User Details</span>
                </a>
                <a href="{{url('/user/create/')}}" class="sidebar-link" id="sidebar-content-and-cards" data-active-scroll-disabled="disabled">
                    <span class="name">Add User Details</span>
                </a>

                <br />
                @endif
                <h5 class="sidebar-title">
                    My Account
                    <span class="hidden-search-terms name">Containers | Content and cards | Grid system | Navbar | Sidebar</span>
                </h5>
                <div class="sidebar-divider">
                    <span class="hidden-search-terms name">Containers | Content and cards | Grid system | Navbar | Sidebar</span>
                </div>
                <a href="{{url('/cp')}}" class="sidebar-link" id="sidebar-containers" data-active-scroll-disabled="disabled">
                    <span class="name">Change Password</span>
                </a>

                <a class="sidebar-link" id="sidebar-content-and-cards" data-active-scroll-disabled="disabled" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <br />


            </div>
            <!-- Filterable list end -->
        </div>
        <!-- Sidebar end -->

        <!-- Content wrapper start -->
        <div class="content-wrapper">
            <div class="content">

            </div>

            @yield('content')




            <!-- Custom footer start -->
            <!-- <div class="custom-footer">
                <div class="container-fluid">
                    <div class="row row-eq-spacing-lg">
                        <div class="col-lg-3">
                            <div class="content">
                                <div class="mb-10">
                                    <img src="/static/halfmoon/img/hm-logo.svg" class="img-fluid hidden-dm halfmoon-logo-img" alt="halfmoon-logo">
                                    <img src="/static/halfmoon/img/hm-logo-white.svg" class="img-fluid hidden-lm halfmoon-logo-img" alt="halfmoon-logo-white">
                                </div>
                                <div>
                                    <a href="/" class="custom-footer-link">Home</a>
                                </div>
                                <div>
                                    <a href="/docs/introduction/" class="custom-footer-link">Documentation</a>
                                </div>
                                <div>
                                    <a href="/license/" class="custom-footer-link">License <span class="text-monospace font-size-12">(MIT)</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="content">
                                <h4 class="content-title font-size-16 mb-10">Get in touch</h4>
                                <div>
                                    <a href="https://github.com/halfmoonui/halfmoon/issues" target="_blank" rel="noopener" class="custom-footer-link">Report an issue</a>
                                </div>
                                <div>
                                    <a href="mailto:hey.halfmoon@gmail.com" target="_blank" rel="noopener" class="custom-footer-link">Contact us</a>
                                </div>
                                <div>
                                    <a href="mailto:hey.halfmoon@gmail.com?Subject=Sponsor" target="_blank" rel="noopener" class="custom-footer-link">Sponsor</a>
                                </div>
                                <div>
                                    <a href="https://twitter.com/HalfmoonUi" target="_blank" rel="noopener" class="custom-footer-link">
                                        Follow us on <i class="fa fa-twitter" aria-hidden="true"></i> Twitter
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="content">
                                <h4 class="content-title font-size-16 mb-10">Legal</h4>
                                <div>
                                    <a href="/privacy-policy/" class="custom-footer-link">Privacy policy</a>
                                </div>
                                <div>
                                    <a href="/cookies/" class="custom-footer-link">Cookies</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="content">
                                <h4 class="content-title font-size-16 mb-10">Made with <i class="fa fa-heart text-danger ml-5 mr-5" aria-hidden="true"></i> for developers</h4>
                                <div class="mb-10">
                                    <a href="#top" class="btn btn-primary btn-scroll-to-top" role="button">Scroll to top</a>
                                </div>
                                <div class="text-muted">
                                    &copy; Copyright 2020, Halfmoon UI
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Custom footer end -->
        </div>
        <!-- Content wrapper end -->

    </div>
    <!-- Page wrapper end -->


    <!-- List JS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
    <!-- Highlight JS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.1/highlight.min.js"></script>
    <!-- Halfmoon JS -->
    <script src="{{asset('/js/halfmoon.min.js')}}"></script>
    <!-- Script -->
    <script type="text/javascript">
        // Function for scrolling to an element, and placing it in the middle of the view
        // By default, the container parameter is set to the browser window
        function scrollIntoViewMiddle(element, container) {
            if (container === undefined) {
                container = window;
            }
            var elementRect = element.getBoundingClientRect();
            var absoluteElementTop = elementRect.top;
            var middleDiff = (elementRect.height / 2);
            var scrollTopOfElement = absoluteElementTop + middleDiff;
            var scrollY = (scrollTopOfElement - (container.getBoundingClientRect().height / 2));
            container.scrollLeft = 0;
            container.scrollTop = scrollY;
        }

        // Copies code to the clipboard
        function copyCode(elem, containerId) {
            // Copy code to clipboard
            var range = document.createRange();
            range.selectNode(document.getElementById(containerId));
            window.getSelection().removeAllRanges(); // clear current selection
            window.getSelection().addRange(range); // to select text
            document.execCommand("copy");
            window.getSelection().removeAllRanges(); // to deselect

            // Show confirmation
            elem.innerHTML = "<i class='fa fa-check-circle' aria-hidden='true'></i> Copied!";

            // Hide confirmation
            setTimeout(function() {
                elem.innerHTML = "<i class='fa fa-clipboard' aria-hidden='true'></i> Copy";
            }, 2000);
        }

        /* Things to do once the DOM is loaded */
        document.addEventListener("DOMContentLoaded", function() {
            // Getting the required elements
            var pageWrapper = document.getElementById("page-wrapper");
            var docsSectionId = document.getElementById("docs-section-id").value;
            var filterDocsElem = document.getElementById("filter-docs");
            var activeDocsSectionSidebarMenuItem = document.getElementById("sidebar-" + docsSectionId);

            // Adding the active class to the sidebar menu item
            activeDocsSectionSidebarMenuItem.classList.add("active");

            // Adding filtering to the docs section ids in the sidebar
            var docsSectionIDsList = new List("sidebar", {
                valueNames: ["name", "alt-name"]
            });

            // Overridden method to also toggle the dark mode in the iFrames

            // Handle keydown events (overridden)
            halfmoon.keydownHandler = function(event) {
                // Shortcuts are triggered only if no input, textarea, or select has focus,
                // And if the control key or command key is not pressed down
                if (!(document.querySelector("input:focus") || document.querySelector("textarea:focus") || document.querySelector("select:focus"))) {
                    event = event || window.event;
                    if (!(event.ctrlKey || event.metaKey)) {
                        // Focus on the filter docs element when [shift] + [F] keys are  pressed, but only if sidebar is not hidden (since the filter box is in the sidebar)
                        if (event.shiftKey && event.which == 70) {
                            if (!(pageWrapper.getAttribute("data-sidebar-hidden"))) {
                                filterDocsElem.focus();
                                event.preventDefault();
                            }
                        }
                    }
                }
            }

            // Init highlight Js and format HTML code
            hljs.initHighlightingOnLoad();
            var codeBlocks = document.querySelectorAll("code.hljs");
            for (var i = 0; i < codeBlocks.length; i++) {
                codeBlocks[i].innerHTML = codeBlocks[i].innerHTML.replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
            }

            // Scroll to the active sidebar menu item
            // Only if the sidebar menu item does not have the disabling attribute
            if (activeDocsSectionSidebarMenuItem) {
                if (!activeDocsSectionSidebarMenuItem.getAttribute("data-active-scroll-disabled")) {
                    scrollIntoViewMiddle(activeDocsSectionSidebarMenuItem, document.getElementsByClassName("sidebar")[0]);
                }
            }

            // Scroll to hash if it exists
            if (window.location.hash) {
                var targetElem = document.getElementById(window.location.hash.substring(1));
                if (targetElem) {
                    targetElem.scrollIntoView(true);
                }
            }

            // Display the Github star button containers after 2 seconds
            // This is usually enough to load the script
            setTimeout(function() {
                document.getElementById("gh-star-btn-container-1").classList.add("d-lg-inline-block");
                document.getElementById("gh-star-btn-container-2").classList.remove("d-none");
            }, 2000);
        });
    </script>


</body>

</html>