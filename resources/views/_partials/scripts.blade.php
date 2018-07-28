<script src="/js/app.js"></script>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
{{-- <script src="https://unpkg.com/vue@2.5.16/dist/vue.js"></script> --}}
<script>
    feather.replace()
</script>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 4000);
</script>