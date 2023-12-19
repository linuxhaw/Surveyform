<style>
    table {
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid;
        padding: 0.5rem;
    }
</style>

<div><a href="{{ route('surveys.create') }}">Create</a></div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Total Response</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($surveys as $survey)
            <tr>
                <td>{{ $survey->id }}</td>
                <td>{{ $survey->name }}</td>
                <td>{{ $survey->start_date->format('Y-m-d') }}</td>
                <td>{{ $survey->end_date->format('Y-m-d') }}</td>
                <td>{{ $survey->response_count }}</td>
                <td><a href="{{ route('surveys.show', $survey->uuid) }}" target="_blank">Get Link</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
