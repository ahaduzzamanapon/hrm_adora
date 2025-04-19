<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAttendanceSettingRequest;
use App\Http\Requests\UpdateAttendanceSettingRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\AttendanceSetting;
use Illuminate\Http\Request;
use Flash;
use Response;

class AttendanceSettingController extends AppBaseController
{
    /**
     * Display a listing of the AttendanceSetting.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var AttendanceSetting $attendanceSettings */
        $attendanceSettings = AttendanceSetting::paginate(10);

        return view('attendance_settings.index')
            ->with('attendanceSettings', $attendanceSettings);
    }

    /**
     * Show the form for creating a new AttendanceSetting.
     *
     * @return Response
     */
    public function create()
    {
        return view('attendance_settings.create');
    }

    /**
     * Store a newly created AttendanceSetting in storage.
     *
     * @param CreateAttendanceSettingRequest $request
     *
     * @return Response
     */
    public function store(CreateAttendanceSettingRequest $request)
    {
        $input = $request->all();

        /** @var AttendanceSetting $attendanceSetting */
        $attendanceSetting = AttendanceSetting::create($input);

        Flash::success('Attendance Setting saved successfully.');

        return redirect(route('attendanceSettings.index'));
    }

    /**
     * Display the specified AttendanceSetting.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AttendanceSetting $attendanceSetting */
        $attendanceSetting = AttendanceSetting::find($id);

        if (empty($attendanceSetting)) {
            Flash::error('Attendance Setting not found');

            return redirect(route('attendanceSettings.index'));
        }

        return view('attendance_settings.show')->with('attendanceSetting', $attendanceSetting);
    }

    /**
     * Show the form for editing the specified AttendanceSetting.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var AttendanceSetting $attendanceSetting */
        $attendanceSetting = AttendanceSetting::find($id);

        if (empty($attendanceSetting)) {
            Flash::error('Attendance Setting not found');

            return redirect(route('attendanceSettings.index'));
        }

        return view('attendance_settings.edit')->with('attendanceSetting', $attendanceSetting);
    }

    /**
     * Update the specified AttendanceSetting in storage.
     *
     * @param int $id
     * @param UpdateAttendanceSettingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAttendanceSettingRequest $request)
    {
        /** @var AttendanceSetting $attendanceSetting */
        $attendanceSetting = AttendanceSetting::find($id);

        if (empty($attendanceSetting)) {
            Flash::error('Attendance Setting not found');

            return redirect(route('attendanceSettings.index'));
        }

        $attendanceSetting->fill($request->all());
        $attendanceSetting->save();

        Flash::success('Attendance Setting updated successfully.');

        return redirect(route('attendanceSettings.index'));
    }

    /**
     * Remove the specified AttendanceSetting from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AttendanceSetting $attendanceSetting */
        $attendanceSetting = AttendanceSetting::find($id);

        if (empty($attendanceSetting)) {
            Flash::error('Attendance Setting not found');

            return redirect(route('attendanceSettings.index'));
        }

        $attendanceSetting->delete();

        Flash::success('Attendance Setting deleted successfully.');

        return redirect(route('attendanceSettings.index'));
    }
}
