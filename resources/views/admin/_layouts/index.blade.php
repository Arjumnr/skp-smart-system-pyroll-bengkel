<!DOCTYPE html>
<html lang="en">

@include('admin._layouts.header')

<body>

    
    @include('admin._layouts.navbar')

    @include('admin._layouts.sidebar')

    <main id="main" class="main">

        @yield('content')

    </main>

    @include('admin._layouts.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('admin._layouts.js')
    @yield('js')
       
</body>

</html>
