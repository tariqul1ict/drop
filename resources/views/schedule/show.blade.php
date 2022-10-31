@extends('layouts.app')

@section('template_title')
    {{ $schedule->name ?? 'Show Schedule' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Schedule</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('schedule.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Medicine Id:</strong>
                            {{ $schedule->medicine->name }}
                        </div>
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $schedule->date }}
                        </div>
                        <div class="form-group">
                            <strong>Start:</strong>
                            {{ $schedule->start }}
                        </div>
                        <div class="form-group">
                            <strong>End:</strong>
                            {{ $schedule->end }}
                        </div>
                        <div style="max-width: 400px;">
                            <table class="table table-sm bg-light table-bordered">
                                <tr class="">
                                    <th>SL</th>
                                    <th>Time</th>
                                </tr>
                                @foreach ($times as $time)
                                <tr class="">
                                    <th>{{$loop->iteration}}</th>
                                    <th>{{$time}}</th>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
