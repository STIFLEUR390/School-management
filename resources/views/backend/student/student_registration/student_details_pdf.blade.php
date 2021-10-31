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
                <?php $image_path = '/upload/easyschool.png'; ?>
                <img src="{{ public_path() . $image_path }}" width="200" height="100">

            </h2></td>
        <td><h2>Easy School ERP</h2>
            <p>School Address</p>
            <p>Phone : 343434343434</p>
            <p>Email : support@easylerningbd.com</p>

        </td>
    </tr>


</table>



<table id="customers">
    <tr>
        <th width="10%">Sl</th>
        <th width="45%">@lang('Student Details')</th>
        <th width="45%">@lang('Student Data')</th>
    </tr>
    <tr>
        <td>1</td>
        <td><b>@lang('Student Name')</b></td>
        <td>{{ $assignStudent->student->name }}</td>
    </tr>
    <tr>
        <td>2</td>
        <td><b>@lang('Student ID No')</b></td>
        <td>{{ $assignStudent->student->id_no }}</td>
    </tr>

    <tr>
        <td>3</td>
        <td><b>@lang('Student Role')</b></td>
        <td>{{ $assignStudent->roll }}</td>
    </tr>

    <tr>
        <td>4</td>
        <td><b>@lang("Father's Name")</b></td>
        <td>{{ $assignStudent->student->fname }}</td>
    </tr>
    <tr>
        <td>5</td>
        <td><b>@lang("Mother's Name")</b></td>
        <td>{{ $assignStudent->student->mname }}</td>
    </tr>
    <tr>
        <td>6</td>
        <td><b>@lang("Mobile Number") </b></td>
        <td>{{ $assignStudent->student->mobile }}</td>
    </tr>
    <tr>
        <td>7</td>
        <td><b>@lang('Address')</b></td>
        <td>{{ $assignStudent->student->address }}</td>
    </tr>
    <tr>
        <td>8</td>
        <td><b>@lang('Gender')</b></td>
        <td>@lang($assignStudent->student->gender)</td>
    </tr>

    <tr>
        <td>9</td>
        <td><b>@lang('Religion')</b></td>
        <td>@lang($assignStudent->student->religion)</td>
    </tr>


    <tr>
        <td>10</td>
        <td><b>@lang('Date of Birth')</b></td>
        <td>{{ $assignStudent->student->dob }}</td>
    </tr>
    <tr>
        <td>11</td>
        <td><b>@lang('Discount') </b></td>
        <td>{{ $assignStudent->discount->discount }} %</td>
    </tr>
    <tr>
        <td>12</td>
        <td><b>@lang('Year') </b></td>
        <td>{{ $assignStudent->student_year->name }}</td>
    </tr>
    <tr>
        <td>13</td>
        <td><b>@lang('Class')  </b></td>
        <td>{{ $assignStudent->student_class->name }}</td>
    </tr>
    <tr>
        <td>14</td>
        <td><b>@lang('Group') </b></td>
        <td>{{ $assignStudent->group->name }}</td>
    </tr>
    <tr>
        <td>15</td>
        <td><b>@lang('Shift') </b></td>
        <td>{{ $assignStudent->shift->name }}</td>
    </tr>

</table>
<br> <br>
<i style="font-size: 10px; float: right;">@lang('Print Data') : {{ date("d M Y") }}</i>

</body>
</html>
