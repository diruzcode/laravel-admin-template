@if(Session::has('message'))

    <script typeof="text/javascript">
        $(document).ready(function() {
            var level = "{{ Session::get('level', 'info') }}";


            Swal.fire(
              '',
              '{{ Session::get("message") }}',
              ''+level+''
            );

        });
    </script>
@endif
