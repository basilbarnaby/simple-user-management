
<!doctype html>
<html lang="en">
    @include('_partials.head')
    <body>
        @include('_partials.top')
        <div class="container-fluid">
            <div class="row">
                @include('_partials.nav')
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                    @include('_partials.page-header')
                    @yield('content')
                </main>
            </div>
        </div>
        @include('_partials.scripts')
        @yield('vue')
    </body>
</html>
