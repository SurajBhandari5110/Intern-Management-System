<div class="container my-5">
    <h1 class="text-center mb-4">Study Material: {{ $tableName }}</h1>

    @if ($data->isEmpty())
        <p class="text-center">No data found in this course.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    @foreach ($data->first() as $key => $value)
                        <th>{{ ucfirst($key) }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr>
                        @foreach ($row as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>


    <a href="{{ route('tl.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>

