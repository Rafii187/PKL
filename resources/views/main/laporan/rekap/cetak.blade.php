<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan {{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 20px;
        }

        .card {
            border: none;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #f4f6f9;
            padding: 10px;
            border-bottom: 1px solid #dcdcdc;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        h3 {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <center>
                    <h3>
                        {{ $title }}
                    </h3>
                </center>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Guru Mapel</th>
                        <th>Mapel</th>
                        <th>Sekolah</th>
                        <th>Kekurangan</th>
                        <th>Kelebihan</th>
                        <th>Status</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $urutan = 1;
                    @endphp
                    @foreach ($penilaian as $index => $item)
                        <tr>
                            <td>{{ $urutan++ }}</td>
                            <td>{{ $item->guru->nama }}</td>
                            <td>{{ $item->guru->mapel->nama_mapel }}</td>
                            <td>{{ $item->guru->sekolah->nama_sekolah }}</td>
                            <td>{{ $item->kekurangan }}</td>
                            <td>{{ $item->kelebihan }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
<script>
    window.onload = function() {
        window.print();
    }
</script>

</html>
