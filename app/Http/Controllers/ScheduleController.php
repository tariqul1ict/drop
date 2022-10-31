<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Schedule;
use Illuminate\Http\Request;
use \Carbon\Carbon;

/**
 * Class ScheduleController
 * @package App\Http\Controllers
 */
class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function all()
    {
        $schedules = Schedule::paginate();

        return view('schedule.all', compact('schedules'))
            ->with('i', (request()->input('page', 1) - 1) * $schedules->perPage());
    }
    public function index()
    {
        $schedules = Schedule::paginate();

        return view('schedule.index', compact('schedules'))
            ->with('i', (request()->input('page', 1) - 1) * $schedules->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schedule = new Schedule();
        $medicines = Medicine::pluck('name', 'id')->toArray();
        return view('schedule.create', compact('schedule', 'medicines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Schedule::$rules);

        $schedule = Schedule::create($request->all());

        return redirect()->route('schedule.index')
            ->with('success', 'Schedule created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = Schedule::find($id);

        $start = strtotime($schedule->start);
        $end = strtotime($schedule->end);


        $differ = ($end - $start) / ($schedule->count - 1);
        $times = [];
        $tmp = $start;
        for ($i = 0; $i < $schedule->count; $i++) {
            $times[$i] = date('h:i:s A', $tmp);
            $tmp += $differ;
        }

        return view('schedule.show', compact('schedule', 'times'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::find($id);
        $medicines = Medicine::pluck('name', 'id')->toArray();

        return view('schedule.edit', compact('schedule', 'medicines'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        request()->validate(Schedule::$rules);

        $schedule->update($request->all());

        return redirect()->route('schedule.index')
            ->with('success', 'Schedule updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $schedule = Schedule::find($id)->delete();

        return redirect()->route('schedule.index')
            ->with('success', 'Schedule deleted successfully');
    }
}
