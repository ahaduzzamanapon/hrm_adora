@extends('layouts.default')

{{-- Page title --}}
@section('title')
Salary @parent
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    {{--<div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>Salary</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>--}}
</section>

<!-- Main content -->
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="card" width="88vw;">
        <section class="card-header">
            <h5 class="card-title d-inline">Salary</h5>

        </section>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="">Month</label>
                            <input type="date" name="from_date" id="from_date" class="form-control">
                        </div>
                      
                        <div class="form-group col-md-2">
                            <label for="">.</label>
                            <a href="#" onclick="process_salary()" class="btn btn-primary">Process</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container mt-5">
                            <!-- Tab navigation -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Daily</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Continue</button>
                                </li>
                            </ul>
                            <!-- Tab content -->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row p-2" style="display: flex;flex-wrap: wrap;gap: 8px;">
                                        <a href="#" onclick="getDaily_salary('All')" class="btn btn-primary">Monthly Salary</a>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="box_m">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th width="7%" style="white-space: nowrap"><input type="checkbox" name="" id="select_all">Select</th>

                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2">Please Select Member Type</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script>
    function get_checked_member_id() {
        var member_id = [];
        $('.member_id_c').each(function() {
            if ($(this).is(':checked')) {
                member_id.push($(this).val());
            }
        });
        return member_id;
    }
</script>
<script>
    $(document).ready(function() {
        get_member()
        $('#select_all').on('change', function() {
            if ($(this).is(':checked')) {
                $('.member_id_c').prop('checked', true);
            } else {
                $('.member_id_c').prop('checked', false);
            }
        });
    });
</script>
<script>
      function get_member() {
        $.ajax({
            url: "{{ route('attendences.get_member') }}",
            type: "GET",
            data: {
                '_token': "{{ csrf_token() }}",
            },
            dataType: 'json',
            success: function(response) {
               var member = response.data;
               var html = '';
               if(member.length == 0) {
                   html+= '<tr><td colspan="2">No Member Found</td></tr>';
               }
               for (var i = 0; i < member.length; i++) {
                   html += '<tr><td><input type="checkbox" class="member_id_c" value="'+member[i].id+'"></td><td>'+member[i].name+'</td></tr>';
               }
               $('.table tbody').html(html);

            },
            error: function() {
                $('#loader').html('<div class="alert alert-danger">Something went wrong. Please try again.</div>');
            }
        });
    }
</script>

@endsection
@endsection
