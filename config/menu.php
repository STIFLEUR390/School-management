<?php

return [
    "Dashboard" => [
        "role" => "user",
        "route" => "dashboard",
        "icon" => "fa fa-tachometer",
        "isHeader" => false,
    ],
    "Manage User" => [
        "role" => "user",
        "icon" => "icon-Layout-4-blocks",
        "isHeader" => false,
        "children" => [
            [
                "name" => "View User",
                "role" => "user",
                "route" => "user.view"
            ],
            [
                "name" => "Add User",
                "role" => "user",
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
        "icon" => "fa fa-cogs",
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
];
