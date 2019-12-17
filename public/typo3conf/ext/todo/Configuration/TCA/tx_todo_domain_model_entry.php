<?php

return [
    'ctrl' => [
        'title' => 'Entry',
        'label' => 'title',
        'iconfile' => 'EXT:todo/ext_icon.svg',
    ],
    'columns' => [
        'title' => [
            'exclude' => 1,
            'label' => 'Title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'description' => [
            'exclude' => 1,
            'label' => 'Description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
        ],
        'done' => [
            'exclude' => 1,
            'label' => 'Done',
            'config' => [
                'type' => 'check',
                'default' => 0,
            ],
        ],
    ],
    'types' => [
        '0' => ['showitem' => 'title,done'],
    ],
];
