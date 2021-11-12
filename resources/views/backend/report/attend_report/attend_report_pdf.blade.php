<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>


<table id="customers">
    <tr>
        <td><h2>
                <img src="{{ public_path() . $school->logo }}" width="200" height="100">

            </h2></td>
        <td><h2>{{ $school->name }}</h2>
            <p>{{ $school->address }}</p>
            <p>@lang("Phone") : {{ $school->phone }}</p>
            <p>@lang('Email') : {{ $school->email }}</p>
            <p> <b>@lang("Employee Attendance Report") </b> </p>

        </td>
    </tr>


</table>
<br> <br>
<strong>@lang('Employee Name') : </strong> {{ $employee_attendances['0']->user->name }}, <strong> ID No : </strong>{{ $employee_attendances['0']->user->id_no }}, <strong> @lang('Month') : </strong> {{ $month }}
<br> <br>
<table id="customers">

    <tr>
        <td width="50%"> <h4>@lang('Date')</h4></td>
        <td width="50%"> <h4> @lang('Attend Status') </h4> </td>
    </tr>

    @foreach($employee_attendances as $employee)
        <tr>
            <td width="50%"> {{ date('d-m-Y', strtotime($employee->date )) }}  </td>
            <td width="50%"> {{ $employee->attend_status }} </td>
        </tr>
    @endforeach

    <tr>
        <td colspan="2">
            <strong>@lang("Total Absent") : </strong> {{ $absents }} , <strong> @lang("Total Leave") : </strong> {{ $leaves }}

        </td>
    </tr>

</table>
<br> <br>
<i style="font-size: 10px; float: right;">@lang('Print Data') : {{ date("d M Y") }}</i>

<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">




</body>
</html>
