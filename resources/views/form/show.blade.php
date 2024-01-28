<!-- resources/views/form/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Form Data</title>
</head>
<body>

    <h1>Form Data</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Form Content</th>
        </tr>
        @foreach($formDataList as $formData)
        <tr>
            <td>{{ $formData->id }}</td>
            <td>
                @php
                    $formContent = json_decode($formData->form, true);
                    echo $formContent["radio-group-1705626849268-0"];
                @endphp
            </td>
        </tr>
        @endforeach
    </table>

</body>
</html>
