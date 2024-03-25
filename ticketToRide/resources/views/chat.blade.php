@extends('layout')
@section('content')

<body id="message_body">
    <div style="padding-top: 120px; padding-bottom: 120px" id="message-container"></div>
    <form id="send-container">
        <input type="text" id="message-input">
        <button type="submit" id="send-button"><i class="bi bi-arrow-up-circle-fill"></i></button>
    </form>
</body>

@endsection