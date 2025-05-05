<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('plugin/css/bootstrap.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.3.1/dist/css/coreui.min.css" rel="stylesheet"
    integrity="sha384-PDUiPu3vDllMfrUHnurV430Qg8chPZTNhY8RUpq89lq22R3PzypXQifBpcpE1eoB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.3.1/dist/js/coreui.bundle.min.js"
    integrity="sha384-8QmUFX1sl4cMveCP2+H1tyZlShMi1LeZCJJxTZeXDxOwQexlDdRLQ3O9L78gwBbe" crossorigin="anonymous">
    </script>

</head>
@yield('body')

<script type="text/javascript" src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/js/bootstrap.bundle.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/cryptojs-aes.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/cryptojs-aes-format.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/login.js') }}"></script>

<script type="text/javascript" src="{{ asset('plugin/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/js/plugins/tables/datatables/extensions/buttons.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('plugin/js/pages/datatables_basic.js') }}"></script>
@yield('script')

</html>
