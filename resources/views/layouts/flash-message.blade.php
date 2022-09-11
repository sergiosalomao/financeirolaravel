
    <style>
        .alert {
            top: 15px;
            width: 95%;
            margin: auto;
        }
    </style>

<script>
    $(document).ready(function() {
        // show the alert
        setTimeout(function() {
            $(".alert").alert('close');
        }, 3000);
    });
</script>


@if (!empty($successMsg))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <div>
            <strong>{{ $successMsg }}</strong>
        </div>
    </div>
@endif



