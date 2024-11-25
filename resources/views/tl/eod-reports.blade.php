@if($eodReports->isEmpty())
    <div class="alert alert-warning mt-4" role="alert">
        <h5>No EOD reports found for this intern.</h5>
    </div>
@else
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">EOD Reports for Suraj</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Today's Work</th>
                            <th>Plan for Tomorrow</th>
                            <th>Issues Faced</th>
                            <th>Submitted On</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($eodReports as $report)
                            <tr>
                                <td>
                                    <ul>
                                        @foreach(explode("\n", $report->today) as $work)
                                            <li>{{ $work }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        @foreach(explode("\n", $report->tomorrow) as $work)
                                            <li>{{ $work }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ $report->issue }}</td>
                                <td>{{ \Carbon\Carbon::parse($report->created_at)->format('d M Y, h:i A') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif

<!-- Inline CSS for Table and Layout -->
<style>
    .container {
        max-width: 100%;
        
    }

    .card {
       
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: green;
        color: white;
        text-align: center;
        font-size: 18px;
        padding: 15px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table th, .table td {
        padding: 12px;
        text-align: left;
        font-size: 14px;
    }

    .table th {
        background-color: #f8f9fa;
        color: #495057;
    }

    .table td {
        background-color: #fff;
    }

    .thead-dark th {
        background-color: #343a40;
        color: white;
    }

    ul {
        list-style-type: disc;
        padding-left: 20px;
    }

    ul li {
        font-size: 14px;
    }

    .alert-warning {
        text-align: center;
        font-size: 16px;
        padding: 10px;
        background-color: #ffeeba;
        color: #856404;
    }

    /* Optional: Add hover effect for rows */
    .table tbody tr:hover {
        background-color: #f1f1f1;
    }

    /* Optional: Add spacing between table rows */
    .table tbody tr {
        border-bottom: 1px solid #ddd;
    }
</style>
