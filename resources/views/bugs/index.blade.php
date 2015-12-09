@extends('layouts.layout')

@section('title', 'Bugs')

@section('styles')
    <link href="{{ url('/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css">

    @parent
@endsection

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
        <form type="get" action="{{ url('/bugs') }}" name="filters">
            <input type="hidden" name="status" value="{{ $filters['status'] }}" />
            <input type="hidden" name="reporter_id" value="{{ $filters['reporter_id'] }}" />
            <input type="hidden" name="engineer_id" value="{{ $filters['engineer_id'] }}" />
        </form>

        <div class="row">
            <div class="col-md-4">
                <select name="reporter" class="form-control">
                    <option></option>
                </select>
            </div>

            <div class="col-md-4">
                <select name="assignee" class="form-control">
                    <option></option>
                </select>
            </div>
        </div>

        <hr />

        <div class="active tab-pane">
            <ul class="list-group list-group-unbordered">
                @foreach ($bugs as $key => $bug)
                    <li class="list-group-item" {!! $key == 0 ? 'style="border-top: 0; padding-top: 0"' : '' !!}>
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

@section('scripts')
    @parent

    <script src="{{ url('/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ url('/js/bugs/main.js') }}"></script>
@endsection
