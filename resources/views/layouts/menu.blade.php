
{{-- uSER mANAMENT --}}
@if(can('user_management'))
<li {!! (Request::is('users*') ? 'class="menu-dropdown mm-active active"': "class='menu-dropdown'" ) !!}>
    <a href="#"  class="barr2">
        <span class="mm-text ">Users Management</span>
        <span class="menu-icon "><i class="align-self-center fa-1x fas fa-diagnoses"></i></span>
        <span class="im im-icon-Arrow-Right imicon"></span>
    </a>
    <ul class="sub-menu list-unstyled barr3">
        @if(can('user'))
        <li class="barr4 {!! (Request::is('users*') ? 'active' : '' ) !!}">
            <a href="{{ route('users.index') }}">
                <span class="mm-text ">Users</span>
                <span class="menu-icon"><i class="im im-icon-User"></i></span>
            </a>
        </li>
        @endif
        @if(can('roll_and_permission'))
        <li class="barr4 {!! (Request::is('roleAndPermissions*') ? 'active' : '' ) !!}">
            <a href="{{ route('roleAndPermissions.index') }}">
                <span class="mm-text ">Role Management</span>
                <span class="menu-icon"><i class="im im-icon-Security-Settings"></i></span>
            </a>
        </li>
        @endif
    </ul>
</li>
@endif
{{-- Attendance mANAMENT --}}
@if(can('user_management'))
<li {!! (Request::is('payroll*') ? 'class="menu-dropdown mm-active active"': "class='menu-dropdown'" ) !!}>
    <a href="#"  class="barr2">
        <span class="mm-text ">Attendance Process</span>
        <span class="menu-icon "><i class="align-self-center fa-1x fas fa-diagnoses"></i></span>
        <span class="im im-icon-Arrow-Right imicon"></span>
    </a>
    <ul class="sub-menu list-unstyled barr3">
        @if(can('user'))
        <li class="barr4 {!! (Request::is('attendance*') ? 'active' : '' ) !!}">
            <a href="{{ route('attendance.index') }}">
                <span class="mm-text ">Attendance</span>
                <span class="menu-icon"><i class="im im-icon-Calendar"></i></span>
            </a>
        </li>
        @endif
        <li class="barr4 {!! (Request::is('leaves*') ? 'active' : '' ) !!}">
            <a href="{{ route('leaves.index') }}">
                <span class="mm-text ">Leaves</span>
                <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
            </a>
        </li>
        <li class="barr4 {!! (Request::is('attendance*') ? 'active' : '' ) !!}">
            <a href="#">
                <span class="mm-text ">My Attendance</span>
                <span class="menu-icon"><i class="im im-icon-Calendar-4"></i></span>
            </a>
        </li>
        <li class="barr4 {!! (Request::is('attendanceSettings*') ? 'active' : '' ) !!}">
            <a href="{{ route('attendanceSettings.index') }}">
                <span class="mm-text ">Attendance Settings</span>
                <span class="menu-icon"><i class="im im-icon-A-Z"></i></span>
            </a>
        </li>
        <li class="barr4 {!! (Request::is('weekends*') ? 'active' : '' ) !!}">
            <a href="{{ route('weekends.index') }}">
                <span class="mm-text ">Weekends</span>
                <span class="menu-icon"><i class="im im-icon-Calendar"></i></span>
            </a>
        </li>
        <li class="barr4 {!! (Request::is('holydays*') ? 'active' : '' ) !!}">
            <a href="{{ route('holydays.index') }}">
                <span class="mm-text ">Holydays</span>
                <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
            </a>
        </li>
    </ul>
</li>
@endif
{{-- Payroll mANAMENT --}}
@if(can('user_management'))
<li {!! (Request::is('payroll*') || Request::is('salary*') || Request::is('advanceSalaries*') ? 'class="menu-dropdown mm-active active"': "class='menu-dropdown'" ) !!}>
    <a href="#"  class="barr2">
        <span class="mm-text ">Payroll Management</span>
        <span class="menu-icon "><i class="align-self-center fa-1x fas fa-diagnoses"></i></span>
        <span class="im im-icon-Arrow-Right imicon"></span>
    </a>
    <ul class="sub-menu list-unstyled barr3">
        @if(can('user'))
        <li class="barr4 {!! (Request::is('salary*') ? 'active' : '' ) !!}">
            <a href="{{ route('salary.index') }}">
                <span class="mm-text ">Salary</span>
                <span class="menu-icon"><i class="im im-icon-User"></i></span>
            </a>
        </li>
        @endif
        @if(can('user'))
        <li class="barr4 {!! (Request::is('attendance*') ? 'active' : '' ) !!}">
            <a href="#">
                <span class="mm-text ">My Salary</span>
                <span class="menu-icon"><i class="im im-icon-User"></i></span>
            </a>
        </li>
        @endif
        <li class="barr4 {!! (Request::is('advanceSalaries*') ? 'active' : '' ) !!}">
            <a href="{{ route('advanceSalaries.index') }}">
                <span class="mm-text ">Advance Salaries</span>
                <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
            </a>
        </li>
    </ul>
</li>
@endif

@if(can('settings'))
<li {!! (Request::is('siteSettings*')|| Request::is('designations*') || Request::is('termAndConditions*') || Request::is('companies*') || Request::is('locations*') || Request::is('accountLedgers*') || Request::is('customers*') || Request::is('suppliers*') || Request::is('paymentMethods*')  ? 'class="menu-dropdown mm-active active"': "class='menu-dropdown'" ) !!}>
    <a href="#"  class="barr2">
        <span class="mm-text ">Settings</span>
        <span class="menu-icon "><i class="align-self-center fa-1x fas fa-diagnoses"></i></span>
        <span class="im im-icon-Arrow-Right imicon"></span>
    </a>
    <ul class="sub-menu list-unstyled barr3">
        @if(can('site_settings'))
        <li class="barr4 {!! (Request::is('siteSettings*') ? 'active li_active' : '' ) !!}">
            <a href="{{ route('siteSettings.index') }}">
                <span class="mm-text ">Site Settings</span>
                <span class="menu-icon"><i class="im im-icon-Settings-Window"></i></span>
            </a>
        </li>
        @endif
        @if(can('designations'))
        <li class="barr4 {!! (Request::is('designations*') ? 'active' : '' ) !!}">
            <a href="{{ route('designations.index') }}">
                <span class="mm-text ">Designations</span>
                <span class="menu-icon"><i class="im im-icon-Teacher"></i></span>
            </a>
        </li>
        @endif
        @if(can('designations'))
           
        <li class="barr4 {!! (Request::is('leaveTypes*') ? 'active' : '' ) !!}">
            <a href="{{ route('leaveTypes.index') }}">
                <span class="mm-text ">Leave Types</span>
                <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
            </a>
        </li>
        @endif

    </ul>
</li>
@endif





