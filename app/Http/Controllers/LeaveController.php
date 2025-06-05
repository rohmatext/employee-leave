<?php

namespace App\Http\Controllers;

use App\Http\Requests\Leave\StoreLeaveRequest;
use App\Http\Requests\Leave\UpdateLeaveRequest;
use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('leave.index', [
            'leaves' => Leave::with('employee')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();

        return view('leave.create', [
            'employees' => $employees
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeaveRequest $request)
    {
        Leave::create([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
            'employee_id' => $request->employee_id,
        ]);

        return to_route('leaves.index')
            ->withMessage('Leave created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leave $leave)
    {
        if (Gate::denies('update', $leave)) {
            return to_route('leaves.index')->withErrors([
                'message' => 'Past leave cannot be updated.'
            ]);
        }

        return view('leave.edit', [
            'leave' => $leave,
            'employees' => Employee::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeaveRequest $request, Leave $leave)
    {
        $leave->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
            'employee_id' => $request->employee_id,
        ]);

        return to_route('leaves.index')
            ->withMessage('Leave updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        if (Gate::denies('delete', $leave)) {
            return to_route('leaves.index')->withErrors([
                'message' => 'Past leave cannot be deleted.'
            ]);
        }

        $leave->delete();

        return to_route('leaves.index')
            ->withMessage('Leave deleted successfully');
    }
}
