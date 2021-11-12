<!doctype html>
<html>
<head>
    <style>
        .customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .customers tr:nth-child(even){background-color: #f2f2f2;}

        .customers tr:hover {background-color: #ddd;}

        .customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

    <table class="customers">
        <tr>
            <td><h2><img src="{{ public_path() . $school->logo }}" width="200" height="200"  alt="{{ $school->name }}"/></h2></td>
            <td>
                <h2>{{ $school->name }}</h2>
                <p>{{ $school->address }}</p>
                <p>@lang('Phone') : {{ $school->phone }}</p>
                <p>@lang('Email') : {{ $school->email }}</p>
                <p> <b>@lang("Student ID Card") </b> </p>
            </td>
        </tr>
    </table>

    @foreach($assign_students as $assign)
        <table class="customers">
            <tr>
                <td>@lang("IMAGE")</td>
                <td>@lang("Easy School")</td>
                <td>@lang("Student ID Card")</td>
            </tr>

            <tr>
                <td>@lang('Name') : {{ $assign->student->name }}</td>
                <td>@lang('Session') : {{ $assign->student_year->name }}</td>
                <td>@lang('Class') : {{ $assign->student_class->name }}</td>
            </tr>

            <tr>
                <td>@lang("Roll") : {{ $assign->roll }}</td>
                <td>@lang('ID No') : {{ $assign->student->id_no }}</td>
                <td>@lang('Mobile') : {{ $assign->student->mobile }}</td>
            </tr>
        </table>
    @endforeach

    <br><br>
    <i style="font-size: 10px; float: right;">@lang("Print Data") : {{ date("d M Y") }}</i>
    <hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">

</body>
</html>
