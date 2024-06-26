@include('backend.layouts.includes.navbar')


<div class="container-fluid">
    <div class="row">
        @include('backend.layouts.includes.sidebar')


        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('main_content')
        </main>
    </div>
</div>


<script src="{{ asset('ui/backend') }}/assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
    integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
</script>
<script src="{{ asset('ui/backend') }}/dashboard/dashboard.js"></script>
</body>

</html>
