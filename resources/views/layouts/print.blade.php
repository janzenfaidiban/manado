<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $pageTitle ? $pageTitle : "Cetak Data" }}</title>
    <style>
        body {
            font-family: "Arial", sans-serif;
            font-size: 12px;
            color: #000;
            background: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px 10px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        /* Media print style */
        @media print {
            .no-print, nav, .btn, footer {
                display: none !important;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            thead {
                display: table-header-group;
            }

            tbody {
                display: table-row-group;
            }

            @page {
                size: A4;
                margin: 20mm;
            }
        }
    </style>
</head>
<body onload="window.print()">

    @yield('print_content')

</body>
</html>
