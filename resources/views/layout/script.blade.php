
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
        toastr.options = { "closeButton" : true, "progressBar" : true }
    toastr.success("{{ session('message') }}");
    @endif
        @if(Session::has('success'))
        toastr.options = { "closeButton" : true, "progressBar" : true }
    toastr.success("{{ session('success') }}");
    @endif
        @if(Session::has('error'))
        toastr.options = { "closeButton" : true, "progressBar" : true }
    toastr.error("{{ session('error') }}");
    @endif
        @if(Session::has('info'))
        toastr.options = { "closeButton" : true, "progressBar" : true }
    toastr.info("{{ session('info') }}");
    @endif
        @if(Session::has('warning'))
        toastr.options = { "closeButton" : true, "progressBar" : true }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
<script src="{{ asset('js/index.js') }}"></script>
