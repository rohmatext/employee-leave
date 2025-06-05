<?php

namespace App\Http\Requests\Leave;

use App\Models\Leave;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreLeaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'start_date' => ['required', 'date', 'after:today'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'reason' => ['required', 'string', 'max:255'],
            'employee_id' => ['required', 'exists:employees,id'],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function ($validator) {
            $employeeId = $this->input('employee_id');
            $startDate = Carbon::parse($this->input('start_date'));
            $endDate = Carbon::parse($this->input('end_date'));
            $leaveDays = $startDate->diffInDays($endDate) + 1;

            $year = $startDate->year;

            $usedLeaveDaysThisYear = Leave::where('employee_id', $employeeId)
                ->whereYear('start_date', $year)
                ->get()
                ->reduce(function ($carry, $leave) {
                    $start = Carbon::parse($leave->start_date);
                    $end = Carbon::parse($leave->end_date);
                    return $carry + $start->diffInDays($end) + 1;
                }, 0);

            if (($usedLeaveDaysThisYear + $leaveDays) > 12) {
                $validator->errors()->add('start_date', 'The employee has already used more than 12 leave days this year.');
            }

            if ($leaveDays > 1 || $startDate->month !== $endDate->month) {
                $validator->errors()->add('start_date', 'Only 1 day of leave is allowed per month.');
            }

            $existingLeaveInSameMonth = Leave::where('employee_id', $employeeId)
                ->whereYear('start_date', $startDate->year)
                ->whereMonth('start_date', $startDate->month)
                ->exists();

            if ($existingLeaveInSameMonth) {
                $validator->errors()->add('start_date', 'The employee has already taken leave in this month.');
            }
        });
    }
}
