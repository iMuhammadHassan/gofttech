@extends('layout.client')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="page-title">
                    <h4>Chat with Admin</h4>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="chat-box" style="max-height: 400px; overflow-y: auto;">
                        @foreach ($messages as $message)
                            <div class="{{ $message->from_role == 'client' ? 'sent' : 'received' }} mb-2">
                                <strong>{{ $message->from_role == 'client' ? 'You' : 'Admin' }}:</strong>
                                <p>{{ $message->message }}</p>
                                <small>{{ $message->created_at->format('Y-m-d H:i') }}</small>
                            </div>
                        @endforeach
                    </div>

                    <form action="{{ route('client-dash.message.message.store') }}" method="POST">
                        @csrf
                        <textarea name="message" class="form-control" placeholder="Type your message" rows="3" required></textarea>
                        <button type="submit" class="btn btn-primary mt-2">Send</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <style>
        .sent {
            text-align: right;
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 15px;
            margin-left: auto;
        }

        .received {
            text-align: left;
            background-color: #d9edf7;
            padding: 10px;
            border-radius: 15px;
            margin-right: auto;
        }
    </style>
@endsection
