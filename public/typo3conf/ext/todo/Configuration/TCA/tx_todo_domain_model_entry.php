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
                'eval' => 'trim'
            ],
        ],
        'solved' => [
            'exclude' => 1,
            'label' => 'Solved',
            'config' => [
                'type' => 'check',
                'default' => 0
            ]
        ],
        'deleted' => [
            'exclude' => 1,
            'label' => 'Deleted',
            'config' => [
                'type' => 'check',
                'default' => 0
            ]
        ],
    ],
    'types' => [
        '0' => ['showitem' => 'title,solved,deleted']
    ]
];
