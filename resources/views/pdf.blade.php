<!DOCTYPE html>
<html lang="th" dir="ltr">

<head>
    <title>PDF</title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        body {
            font-family: "THSarabunNew";
        }

        font-size: 16px;
        }

        @page {
            size: A4;
            padding: 15px;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
                /*font-size : 16px;*/
            }
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
        }

    </style>

</head>
<body>
<h2>รายการลางาน</h2>
    <table>
        <thead>
            <tr>

                <th>NO</th>
                    <th>รหัสมาชิก</th>
                    <th>ชื่อสมาชิก</th>
                    <th>ตำแหน่ง</th>
                    <th>ฝ่าย/แผนก</th>
                    <th>ลาป่วย</th>
                    <th>ลากิจ</th>
                    <th>อื่นๆ</th>
                    <th>รวม</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customer_data as $customer)
            <tr>
                <th>{{$loop->iteration }}</th>
                    <td>{{ $customer->userid }}</td>
                    <td>{{ $customer->prefix }} {{ $customer->username }} {{ $customer->lastname }}</td>
                    <td>{{ $customer->position }}</td>
                    <td>{{ $customer->department }}</td>
                    <td>{{ $customer->vacation1 }}</td>
                    <td>{{ $customer->vacation2}}</td>
                    <td>{{ $customer->vacation3}}</td>
                    <td>{{ $customer->alltimes}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
