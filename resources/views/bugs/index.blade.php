@extends('layouts.layout')

@section('title', 'Bugs')

@section('content')
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li {!! $filters['status'] ==  'opened' ? 'class="active"' : '' !!}>
            <a href="{{ url('/bugs') }}?status=opened">
                <span>Opened</span>
                <span class="label label-default">{{ $containers['opened'] }}</span>
            </a>
        </li>
        <li {!! $filters['status'] ==  'closed' ? 'class="active"' : '' !!}>
            <a href="{{ url('/bugs') }}?status=closed">
                <span>Closed</span>
                <span class="label label-default">{{ $containers['closed'] }}</span>
            </a>
        </li>
        <li {!! $filters['status'] ==  'all' ? 'class="active"' : '' !!}>
            <a href="{{ url('/bugs') }}?status=all">
                <span>All</span>
                <span class="label label-default">{{ $containers['all'] }}</span>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="active tab-pane">
            <ul class="list-group list-group-unbordered">
                @foreach ($bugs as $key => $bug)
                    <li class="list-group-item" {!! $key == 0 ? 'style="border-top: 0"' : '' !!}>
                        <div class="pull-right text-right">
                            <i class="fa fa-comments"></i> 0
                            <p>last updated at {{ $bug->updated_at }}</p>
                        </div>
                        <a href="{{ url('/bugs', [$bug->id]) }}" class="bold">{{ $bug->title }}</a>
                        <p>#{{ $bug->id }} opened in {{ $bug->created_at }} by {{ $bug->reporter->name }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
