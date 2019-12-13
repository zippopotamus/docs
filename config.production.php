<?php

return [
    'baseUrl' => 'https://docs.zippopotam.us',
    'production' => true,
    'collections' => [
        'docs' => [
            'extends' => '_layouts/documentation',
            'items' => function() {

                $generator = app(\App\Data\GenerateApiDocs::class);
                $docs = require("api_docs.php");

                return collect($docs['versions'])->map(function($v) use ($generator) {
                    return [
                        'title' => $v['title'],
                        'filename' => $v['path'],
                        'content' => $generator->generate($v),
                    ];
                });
            },
        ]
    ],
];
