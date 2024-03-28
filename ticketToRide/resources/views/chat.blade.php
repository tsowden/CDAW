@extends('layout')
@section('content')

<script defer src="{{ asset('js/script.js') }}"></script>


<body id="message_body">
    <div id="message-container"></div>
    <form id="send-container">
        <input type="text" id="message-input">
        <button type="submit" id="send-button"><i class="bi bi-arrow-up-circle-fill"></i></button>
    </form>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">




</body>

@endsection