@extends('layouts.app')

@section('content')

<div id="app">
        <div class="chat-box bg-white py-3">
            <ul id="messages" class="message-list">
                @foreach ($messages as $message)
                    <li><strong>{{ $message?->user?->name }}:</strong> {{ $message?->message }}</li>
                @endforeach
            </ul>
        </div>

        @auth
        <form action="{{ route('chat.send') }}" method="POST" class="d-flex">
            @csrf
            <input type="text" name="message" class="form-control" placeholder="Type your message here..." required>
            <button type="submit" class="btn btn-success">Send</button>
        </form>
        @else
        <p>Please <a href="{{ route('login') }}">login</a> to join the chat.</p>
        @endauth
    </div>

@endsection
    