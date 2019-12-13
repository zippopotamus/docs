<?php

return [
    'baseUrl' => '',
    'production' => false,
    'siteName' => 'Zippopotam.us',
    'siteDescription' => 'Free, easy to use postal code lookup service',

    // Algolia DocSearch credentials
    'docsearchApiKey' => '',
    'docsearchIndexName' => '',

    'features' => [
        [
            'icon' => file_get_contents("./source/_svg/zap.svg"),
            'title' => 'Lightning Fast',
            'description' => 'Quickly execute postal code lookups, city to postal code lookups, and more.'
        ],
        [
            'icon' => file_get_contents("./source/_svg/globe.svg"),
            'title' => 'International Coverage',
            'description' => 'Coverage in countries such as United States, Canada, United Kingdom, and more!'
        ],
        [
            'icon' => file_get_contents("./source/_svg/slash.svg"),
            'title' => 'Unrestricted',
            'description' => 'No hard limits or restrictions of any kind. All at no cost.'
        ]
    ],


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

    // navigation menu
    'navigation' => require_once('navigation.php'),

    // helpers
    'isActive' => function ($page, $path) {
        return ends_with(trimPath($page->getPath()), trimPath($path));
    },
    'isActiveParent' => function ($page, $menuItem) {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(function ($child) use ($page) {
                return trimPath($page->getPath()) == trimPath($child);
            });
        }
    },
    'url' => function ($page, $path) {
        return starts_with($path, 'http') ? $path : '/' . trimPath($path);
    },
];
