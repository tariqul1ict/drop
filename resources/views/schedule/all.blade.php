@extends('layouts.app')

@section('template_title')
    Schedule
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Schedule') }}
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 g-4">
                            @php
                                $all = [];
                                $i = 0;
                            @endphp           
                            @foreach ($schedules as $schedule)
                                        <div class="d-none">
                                           <div class="bg-dark text-light py-2 px-3 lead border " style="font-weight: bold;">
                                            {{ $schedule->medicine->name }}
                                           </div>
                                           @php
                                                $start = strtotime($schedule->start);
                                                $end = strtotime($schedule->end);
                                                $differ = ($end - $start) / ($schedule->count - 1);
                                                $times = [];
                                                $tmp = $start;
                                                for ($i = 0; $i < $schedule->count; $i++) {
                                                    $times[$i] = $tmp;
                                                    $tmp += $differ;
                                                }

                                           @endphp
                                            <table class="table  table-sm bg-light table-bordered">
                                                <tr class="">
                                                    <th>SL</th>
                                                    <th>Time</th>
                                                </tr>
                                                @foreach($times as $time)
                                                <tr class="">
                                                    <th>{{$loop->iteration}}</th>
                                                    <th>{{date('h:i:s A', $time)}}</th>
                                                </tr>
                                                @php
                                                    $tmp2 = [
                                                'sl'=>$i++,
                                                'time'=>$time,
                                                'medicine'=>$schedule->medicine->name,

                                            ];
                                                    array_push($all, $tmp2);

                                                @endphp
                                                @endforeach
                                            </table>
                                        </div>
                                       @endforeach
                                    @php
                                        // // $all = collect($all);
                                        // $all =json_encode($all);
                                        $all = collect($all);
                                        $all  = $all->sortBy('time');
                                    @endphp  
                        </div>

                        <h3 class="mt-4 mb-2">Drop Schedule</h3>
                        <table class="table table-bordered" style="max-width: 500px;">
                            <tr class="bg-dark text-light">
                                <th>SL</th>
                                <th>Time</th>
                                <th>Medicine</th>
                            </tr>
                            @foreach ($all as $data)
                            <tr  class="@if(strtotime('now') > @$data['time']) bg-warning @endif">
                                <th>{{$loop->iteration}}</th>
                                    <th>{{date('h:i:s A', @$data['time'])}}</th>
                                    <th>{{@$data['medicine']}}</th>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                {!! $schedules->links() !!}
            </div>
        </div>
    </div>
@endsection
