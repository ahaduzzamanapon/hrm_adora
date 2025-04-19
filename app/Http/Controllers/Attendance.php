<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PunchModel;
use App\Models\User;
use App\Models\AttendanceSetting;
use App\Models\AttendanceModel;
use App\Models\SiteSetting;
use App\Models\Leave;
use App\Models\Holyday;
use App\Models\Weekend;

class Attendance extends Controller
{
    public function index(){

        return view('attendences.index');
    }
    public function get_auto_attendance(Request $request){
        $input=$request->all();
        $punch_id=$input['member_id'];
        $timestamp = $input['timestamp'];
        $dateTime = date('Y-m-d H:i:s', strtotime($timestamp));
        $punch=PunchModel::where('punch_id', $punch_id)->where('time', $dateTime)->first();
        if(empty($punch)){
            $punch=new PunchModel();
            $punch->punch_id=$punch_id;
            $punch->time=$dateTime;
            $punch->date=date('Y-m-d', strtotime($timestamp));
            $punch->save();
        }
        $member_data=User::where('punch_id', $punch_id)->first();
        $this->process(date('Y-m-d', strtotime($timestamp)), $member_data->id);
        return response()->json(
            [
                'status' => 'success',
            ],
            200
        );
    }
    public function process_attendence(Request $request){
        $input=$request->all();
        $date=$input['date'];
        $memberIds=User::pluck('id')->implode(',');
        $this->process($date, $memberIds);
        return response()->json(
            [
                'status' => 'success',
            ],
            200
        );

    }
    public function process($date, $memberIds)
    {
        $date=date('Y-m-d', strtotime($date));
        $memberIdsArray = explode(',', $memberIds);
        foreach ($memberIdsArray as $memberId) {
            $user = User::where('id', $memberId)->first();
            $punchId = $user->punch_id;
            if (is_null($punchId)) {
                continue;
            }
            $firstPunch = PunchModel::where('punch_id', $punchId)
            ->where('date', $date)
            ->orderBy('id', 'asc')
            ->first();
            if (is_null($firstPunch)) {
                continue;
            }

            $firstp= $firstPunch->time;
            $lastPunch = PunchModel::where('punch_id', $punchId)
            ->where('date', $date)
            ->orderBy('id', 'desc')
            ->first();
            $lastp=$lastPunch->time;

            if ($firstp == $lastp) {
                $lastp=null;
            }
            if (!is_null($firstp)) {
                $status = 'Present';
            } else {
                $status = 'Absent';
            }

            $attendance_settings=AttendanceSetting::where('start_date', '<=', $date)->orderBy('start_date', 'asc')->first();
            $intime=date('Y-m-d H:i:s', strtotime($date . ' ' . $attendance_settings->in_time));

            $outtime=date('Y-m-d H:i:s', strtotime($date . ' ' . $attendance_settings->out_time));
            $late=0;
            $late = strtotime($firstp) > strtotime($intime)? 1 : 0;
            $early_out_status = strtotime($lastp) < strtotime($outtime)? 1 : 0;
            $leave=Leave::where('member_id', $memberId)->where('date', $date)->where('status', 'Approved')->first();
            if (!is_null($leave)) {
                $status = 'Leave';
                $late=0;
                $early_out_status = 0;
            }
            $holyday=Holyday::where('date', $date)->first();
            if (!is_null($holyday)) {
                $status = 'Holiday';
                $late=0;
                $early_out_status = 0;

            }
            $weekend = Weekend::where('day', date('l', strtotime($date)))->first();
            if (!is_null($weekend)) {
                $status = 'Weekend';
                $late=0;
                $early_out_status = 0;
            }

            $attendance=AttendanceModel::where('member_id', $memberId)->where('date', $date)->first();
            if (!is_null($attendance)) {
                $attendance->in_time=($firstp!=null)?date('H:i:s', strtotime($firstp)):"";
                $attendance->out_time=($lastp!=null)?date('H:i:s', strtotime($lastp)):"";
                $attendance->late_status=$late;
                $attendance->early_out_status=$early_out_status;
                $attendance->status=$status;
                $attendance->save();
            }else{
                $attendance=new AttendanceModel();
                $attendance->member_id=$memberId;
                $attendance->date=$date;
                $attendance->in_time=date('H:i:s', strtotime($firstp));
                $attendance->out_time=date('H:i:s', strtotime($lastp));
                $attendance->late_status=$late;
                $attendance->early_out_status=$early_out_status;
                $attendance->status=$status;
                $attendance->save();
            }
        }
    }
    public function get_member(){
        $user=User::all();
        return response()->json(
            [
                'status' => 'success',
                'data' => $user,
            ],
            200
        );
    }
    public function dailyAttendanceReport(Request $request)
    {
        $fromDate = date('Y-m-d', strtotime($request->from_date));
        $type = $request->type;
        $memberIds = explode(',', $request->member_id);
        $query = AttendanceModel::select('attendance_models.*', 'users.*');
         $query->join('users', 'attendance_models.member_id', '=', 'users.id');
        $query->where('attendance_models.date', $fromDate);
        $query->whereIn('attendance_models.member_id', $memberIds);
        if ($type !== 'All') {
            $query->where('attendance_models.status', $type);
        }
        $attendanceData = $query->get();
        $setting=SiteSetting::first();
        return view('attendences.daily_attendence_report', compact('attendanceData', 'fromDate', 'setting'));

    }
}
