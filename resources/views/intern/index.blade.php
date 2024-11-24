<table border="1" style="width: 100%; border-collapse: collapse;">
    <thead style="background-color: #f2f2f2; text-align: left;">
        <tr>
            <th style="padding: 8px;">ID</th>
            <th style="padding: 8px;">Name</th>
            <th style="padding: 8px;">Task Status</th>
            <th style="padding: 8px;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($interns as $intern)
        <tr style="text-align: left;">
            <td style="padding: 8px;">{{ $intern->id }}</td>
            <td style="padding: 8px;">{{ $intern->user->name }}</td>
            <td style="padding: 8px; text-align: center;">
                @if ($intern->task_status === 'completed')
                    <form action="{{ route('interns.updateStatus', $intern->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" style="background-color: green; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer;">
                            Task Completed
                        </button>
                    </form>
                @else
                    <form action="{{ route('interns.updateStatus', $intern->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" style="background-color: orange; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer;">
                            Raise a Doubt
                        </button>
                    </form>
                @endif
            </td>
            <td style="padding: 8px;">
                <form action="{{ route('interns.destroy', $intern->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background-color: red; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer;">
                        Delete
                    </button>
                </form>
                <a href="{{ route('interns.edit', $intern->id) }}" style="background-color: blue; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; margin-left: 8px;">
                    Edit
                </a>
                <a href="{{ route('interns.show', $intern->id) }}" style="background-color: green; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; margin-left: 8px;">
                    View
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
