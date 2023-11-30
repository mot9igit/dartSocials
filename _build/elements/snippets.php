<?php

return [
    'dartSocials' => [
        'file' => 'dartsocials',
        'description' => 'dartSocials snippet to list socials',
        'properties' => [
            'tpl' => [
                'type' => 'textfield',
                'value' => 'tpl.dartSocials',
            ],
            'sortby' => [
                'type' => 'textfield',
                'value' => 'name',
            ],
            'sortdir' => [
                'type' => 'list',
                'options' => [
                    ['text' => 'ASC', 'value' => 'ASC'],
                    ['text' => 'DESC', 'value' => 'DESC'],
                ],
                'value' => 'ASC',
            ],
            'limit' => [
                'type' => 'numberfield',
                'value' => 5,
            ],
            'toPlaceholder' => [
                'type' => 'combo-boolean',
                'value' => false,
            ],
        ],
    ],
];