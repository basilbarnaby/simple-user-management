
<!doctype html>
<html lang="en">
    @include('_partials.head')
    <body>
        <div class="container-fluid">
            <div class="row">
                <main role="main" class="col-md-12 col-lg-12 pt-5 px-4">
                    @include('_partials.page-header-auth')
                    @yield('content')
                </main>
            </div>
        </div>
        @include('_partials.scripts')
    </body>
</html>
