<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Records</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>


</head>
<body>
<div class="container">

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('flash_message') }}
        </div>
    @endif

        <div class="row", style="padding: 20px">
            <a href="/records/create">
                <button class="btn btn-primary">
                    Add new record
                </button>
            </a>
        </div>

    @yield('content')

</div>


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.delete_record').on('click', function () {
        var record = $(this);
        var record_id = $(this).data('recordid');
        $.ajax({
            url:  '/records/delete',
            type: 'POST',
            data: {
                id: record_id,
                _token: "{{ csrf_token() }}",
            },
            success: function(response){
                if(response) {
                    record.parent().parent().parent().fadeOut(200).remove();
                }
            }
        })
    })
</script>
</body>

</html>