<?php

return [
    "Dashboard" => [
        "role" => "user",
        "route" => "dashboard",
        "icon" => "fa fa-tachometer",
        "isHeader" => false,
    ],
    "Manage User" => [
        "role" => "admin",
        "icon" => "icon-Layout-4-blocks",
        "isHeader" => false,
        "children" => [
            [
                "name" => "View User",
                "role" => "admin",
                "route" => "user.view"
            ],
            [
                "name" => "Add User",
                "role" => "admin",
                "route" => "user.add"
            ],
        ],
    ],
    "Manage Profile" => [
        "role" => "user",
        "icon" => "icon-Layout-grid",
        "isHeader" => false,
        "children" => [
            [
                "name" => "Your Profile",
                "role" => "user",
                "route" => "profile.view"
            ],
            [
                "name" => "Change Password",
                "role" => "user",
                "route" => "password.view"
            ],
        ],
    ],
    "Setup Management" => [
        "role" => "user",
        "icon" => "icon-Write",
        "isHeader" => false,
        "children" => [
            [
                "name" => "Student Class",
                "role" => "user",
                "route" => "student.class.view",
            ],
            [
                "name" => "Student Year",
                "role" => "user",
                "route" => "student.year.index"
            ],
            [
                "name" => "Student Group",
                "role" => "user",
                "route" => "student.group.index"
            ],
            [
                "name" => "Student Shift",
                "role" => "user",
                "route" => "student.shift.index"
            ],
            [
                "name" => "Fee Category",
                "role" => "user",
                "route" => "fee.category.index"
            ],
            [
                "name" => "Fee Category Amount",
                "role" => "user",
                "route" => "fee.amount.index"
            ],
            [
                "name" => "Exam Type",
                "role" => "user",
                "route" => "exam.type.index"
            ],
            [
                "name" => "School Subject",
                "role" => "user",
                "route" => "school.subject.index"
            ],
            [
                "name" => "Assign Subject",
                "role" => "user",
                "route" => "assign.subject.index"
            ],
            [
                "name" => "Designation",
                "role" => "user",
                "route" => "designation.designation.index"
            ],
        ],
    ],
    "Student Management" => [
        "role" => "user",
        "icon" => "icon-File",
        "isHeader" => false,
        "children" => [
            [
                "name" => "Student Registration",
                "role" => "user",
                "route" => "students.registration.index"
            ],
            [
                "name" => "Roll Generates",
                "role" => "user",
                "route" => "roll.generate.index"
            ],
            [
                "name" => "Registration Fee",
                "role" => "user",
                "route" => "registration.fee.view"
            ],
            [
                "name" => "Monthly Fee",
                "role" => "user",
                "route" => "monthly.fee.view"
            ],
            [
                "name" => "Exam Fee",
                "Role" => "user",
                "route" => "exam.fee.view"
            ],

        ],
    ],
    "Employee Management" => [
        "role" => "user",
        "icon" => "icon-Chart-pie",
        "isHeader" => false,
        "children" => [
            [
                "name" => "Employee Registration",
                "role" => "user",
                "route" => "employee.registration.index"
            ],
            [
                "name" => "Employee Salary",
                "role" => "user",
                "route" => "employee.salary.index"
            ],
            [
                "name" => "Employee Leave",
                "role" => "user",
                "route" => "employee.leave.index"
            ],
            [
                "name" => "Employee Attendance",
                "role" => "user",
                "route" => "employee.attendance.index"
            ],
            [
                "name" => "Employee Monthly Salary",
                "role" => "user",
                "route" => "employee.monthly.salary"
            ],
        ]
    ],
    "Marks Management" => [
        "role" => "user",
        "icon" => "icon-Chart-pie",
        "isHeader" => false,
        "children" => [
            [
                "name" => "Marks Entry",
                "role" => "user",
                "route" => "marks.entry.create",
            ],
            [
                "name" => "Marks Edit",
                "role" => "user",
                "route" => "marks.entry.index",
            ],
            [
                "name" => "Marks Grade",
                "role" => "user",
                "route" => "marks.grade.index",
            ],
        ],
    ],
    "Accounts Management" => [
        "role" => "user",
        "icon" => "icon-Library",
        "isHeader" => false,
        "children" => [
            [
                "name" => "Student Fee",
                "role" => "user",
                "route" => "student.fee",
            ],
            [
                "name" => "Employee Salary",
                "role" => "user",
                "route" => "account.salary",
            ],
            /*[
                "name" => "Marks Grade",
                "role" => "user",
                "route" => "marks.grade.index",
            ],*/
        ],
    ],
];
