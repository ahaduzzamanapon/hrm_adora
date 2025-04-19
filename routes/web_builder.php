<?php




Route::resource('siteSettings', 'SiteSettingController');
Route::resource('users', 'UserController');
Route::resource('permissions', 'PermissionController');
Route::resource('roleAndPermissions', 'RoleAndPermissionController');
Route::resource('designations', 'DesignationController');


Route::resource('attendanceSettings', 'AttendanceSettingController');

Route::resource('weekends', 'WeekendController');

Route::resource('holydays', 'HolydayController');

Route::resource('leaves', 'LeaveController');

Route::resource('leaveTypes', 'LeaveTypeController');