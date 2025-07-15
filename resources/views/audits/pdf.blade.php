<!DOCTYPE html>
<html>
<head>
    <title>Audit Logs PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 6px; border: 1px solid #ccc; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Audit Logs</h2>
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Event</th>
                <th>Model</th>
                <th>Model ID</th>
                <th>IP</th>
                <th>User Agent</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($audits as $audit)
            <tr>
                <td>{{ $audit->user->name ?? '-' }}</td>
                <td>{{ $audit->event }}</td>
                <td>{{ $audit->auditable_type }}</td>
                <td>{{ $audit->auditable_id }}</td>
                <td>{{ $audit->ip_address }}</td>
                <td>{{ $audit->user_agent }}</td>
                <td>{{ $audit->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
