@if($progress->isEmpty())
    <p class="text-muted">No study progress available for this intern.</p>
@else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Material</th>
                <th>Status</th>
                <th>Comment</th>
                <th>Last Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($progress as $record)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $record->material_table }}</td>
                    <td>{{ ucfirst($record->status) }}</td>
                    <td>{{ $record->comment ?? 'No comments' }}</td>
                    <td>{{ $record->updated_at->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
