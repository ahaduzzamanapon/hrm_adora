<!doctype html>
<html lang="en">
  <head>
    <title>Daily Attendence Report</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .report-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .report-title {
            font-size: 24px;
        }
        .report-sub-title {
            font-size: 16px;
        }
        .report-date {
            font-size: 14px;
        }
        .report-table {
            /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
            margin-top: 20px;
        }
        .report-table th, .report-table td {
            padding: 10px;
        }
    </style>
  </head>
  <body>
        <div class="container">
            <div class="report-header">
                <h1 class="report-title">{{ $setting->name }}</h1>
                <h4 class="report-sub-title">{{ $setting->slogan }}</h4>
                <p class="report-date">Report date:{{ $fromDate }}</p>
            </div>
            <table class="table report-table table-bordered">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Member Name</th>
                        <th>Date</th>
                        <th>In Time</th>
                        <th>Out Time</th>
                        <th>Late status</th>
                        <th>Early out status</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendanceData as $key => $attendence)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $attendence->name }} {{ $attendence->last_name }}</td>
                        <td>{{ $attendence->date }}</td>
                        <td>{{ $attendence->in_time }}</td>
                        <td>{{ $attendence->out_time }}</td>
                        <td>{{ $attendence->late_status==1 ? 'Yes' : 'No' }}</td>
                        <td>{{ $attendence->early_out_status==1 ? 'Yes' : 'No' }}</td>
                        <td>{{ $attendence->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

