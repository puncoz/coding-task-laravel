@include('layouts.partials.htmlhead')
<body>

    <!--[if lt IE 7]>
    <p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <noscript>
        <p class="alert alert-danger">JavaScript disabled or your browser doesn't support javascript. Please enable it or <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    </noscript>

    <!-- Navigation -->
    @include('layouts.partials.navigation')

    <!-- Main Wrapper -->
    <section id="content">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-body">
                    @yield('maincontent')
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    @include('layouts.partials.footer')

    <!--
    // SCRIPTS
    -->
    @include('layouts.partials.scripts')
    
</body>
</html>