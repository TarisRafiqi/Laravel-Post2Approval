<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }
    </style>
</head>

<body>

    <h3 style="text-align: center">Posts Queue List</h3>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Title</th>
                <th>Author</th>
                <th>Approver 1</th>
                <th>Approver 2</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->author }}</td>
                    <td>
                        {{ $post->approver1?->name ?? 'Waiting' }} <br>
                        {!! $post->status_1 !!}
                    </td>
                    <td>
                        {{ $post->approver2?->name ?? 'Waiting' }} <br>
                        {!! $post->status_2 !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
