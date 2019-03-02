@extends('template')

@section('content')
    <div class="container">
        @if($status == 'OK')
        <div class="jumbotron">
            <h1>Word statistics. TOP-10 words:</h1>
            @foreach ($wordstat as $key=>$stat)
            <p>{{$key}} - {{$stat}}</p>
            @endforeach

        </div>

        <h2>Recent Posts:</h2>

        @foreach ($data as $post)
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4>{{ $post['title'] }}</h4>
                    <p>
                        {!! $post['summary'] !!}
                    </p>
                </div>
                <div class="panel-footer">
                    <a href="{{ $post['link']['@attributes']['href'] }}" class="btn btn-link">View Post</a>
                </div>
            </div>
        @endforeach
            @else
            <div class="jumbotron">
                <h1>There was an error in API Request</h1>

            </div>
        @endif

    </div>
@endsection
