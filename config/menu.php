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
        "icon" => "fa fa-angle-right pull-right",
        "isHeader" => false,
        "children" => [
            [
                "name" => "Classe d'étudiant",
                "role" => "user",
                "route" => "profile.view"
            ],
            /*[
                "name" => "Change Password",
                "role" => "user",
                "route" => "password.view"
            ],*/
        ],
    ],
];
