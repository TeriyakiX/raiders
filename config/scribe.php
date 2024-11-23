<?php

use Knuckles\Scribe\Extracting\Strategies;

return [
    // The HTML <title> for the generated documentation.
    'title' => 'Raiders',

    // A short description of your API.
    'description' => 'Документация для Raiders',

    // The base URL displayed in the docs.
    'base_url' => env('APP_URL', 'http://127.0.0.1:8000/'),

    'routes' => [
        [
            'match' => [
                'prefixes' => ['api/*'],
                'domains' => ['*'],
                'versions' => ['v1'],
            ],
            'include' => [],
            'exclude' => [],
        ],
    ],

    // Static documentation settings
    'type' => 'static',
    'static' => [
        'output_path' => 'public/docs', // Make sure this path exists
    ],

    // Postman collection generation
    'postman' => [
        'enabled' => true,
        'overrides' => [],
    ],

    // OpenAPI spec generation
    'openapi' => [
        'enabled' => true,
        'overrides' => [],
    ],

    // Authentication settings
    'auth' => [
        'enabled' => true,
        'default' => false,
        'in' => 'bearer',
        'name' => 'key',
        'use_value' => env('SCRIBE_AUTH_KEY'),
        'placeholder' => '{YOUR_AUTH_KEY}',
        'extra_info' => 'You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.',
    ],

    'intro_text' => <<<INTRO
This documentation aims to provide all the information you need to work with our API.

<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
INTRO
    ,

    'example_languages' => [
        'bash',
        'javascript',
    ],

    'groups' => [
        'default' => 'Endpoints',
        'admin' => 'Admin Operations',
        'battle' => 'Battle Operations',
        'cards' => 'Card Management',
        'user' => 'User Operations',
        'auth' => 'Authentication',
    ],

    // Custom logo path (optional)
    'logo' => false,

    // Last updated timestamp format
    'last_updated' => 'Last updated: {date:F j, Y}',

    'examples' => [
        'faker_seed' => null,
        'models_source' => ['factoryCreate', 'factoryMake', 'databaseFirst'],
    ],

    // Strategies for extracting information about your routes
    'strategies' => [
        'metadata' => [
            Strategies\Metadata\GetFromDocBlocks::class,
            Strategies\Metadata\GetFromMetadataAttributes::class,
        ],
        'urlParameters' => [
            Strategies\UrlParameters\GetFromLaravelAPI::class,
            Strategies\UrlParameters\GetFromUrlParamAttribute::class,
            Strategies\UrlParameters\GetFromUrlParamTag::class,
        ],
        'queryParameters' => [
            Strategies\QueryParameters\GetFromFormRequest::class,
            Strategies\QueryParameters\GetFromInlineValidator::class,
            Strategies\QueryParameters\GetFromQueryParamAttribute::class,
            Strategies\QueryParameters\GetFromQueryParamTag::class,
        ],
        'headers' => [
            Strategies\Headers\GetFromHeaderAttribute::class,
            Strategies\Headers\GetFromHeaderTag::class,
            [
                'override',
                [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]
            ]
        ],
        'bodyParameters' => [
            Strategies\BodyParameters\GetFromFormRequest::class,
            Strategies\BodyParameters\GetFromInlineValidator::class,
            Strategies\BodyParameters\GetFromBodyParamAttribute::class,
            Strategies\BodyParameters\GetFromBodyParamTag::class,
        ],
        'responses' => [
            Strategies\Responses\UseResponseAttributes::class,
            Strategies\Responses\UseTransformerTags::class,
            Strategies\Responses\UseApiResourceTags::class,
            Strategies\Responses\UseResponseTag::class,
            Strategies\Responses\UseResponseFileTag::class,
            [
                Strategies\Responses\ResponseCalls::class,
                [
                    'only' => ['GET *'],
                    'config' => [
                        'app.debug' => false,
                    ],
                ]
            ]
        ],
        'responseFields' => [
            Strategies\ResponseFields\GetFromResponseFieldAttribute::class,
            Strategies\ResponseFields\GetFromResponseFieldTag::class,
        ],
    ],

    'database_connections_to_transact' => [config('database.default')],

    'fractal' => [
        'serializer' => null,
    ],

    'routeMatcher' => \Knuckles\Scribe\Matching\RouteMatcher::class,
    // See https://scribe.knuckles.wtf/laravel/reference/config#theme for supported options
    'theme' => 'default',
    'laravel' => [
        // Whether to automatically create a docs endpoint for you to view your generated docs.
        // If this is false, you can still set up routing manually.
        'add_routes' => true,
        // URL path to use for the docs endpoint (if `add_routes` is true).
        // By default, `/docs` opens the HTML page, `/docs.postman` opens the Postman collection, and `/docs.openapi` the OpenAPI spec.
        'docs_url' => '/docs',
        // Directory within `public` in which to store CSS and JS assets.
        // By default, assets are stored in `public/vendor/scribe`.
        // If set, assets will be stored in `public/{{assets_directory}}`
        'assets_directory' => null,
        // Middleware to attach to the docs endpoint (if `add_routes` is true).
        'middleware' => [],
    ],
    'external' => ['html_attributes' => []],
    'try_it_out' => [
        // Add a Try It Out button to your endpoints so consumers can test endpoints right from their browser.
        // Don't forget to enable CORS headers for your endpoints.
        'enabled' => true,
        // The base URL for the API tester to use (for example, you can set this to your staging URL).
        // Leave as null to use the current app URL when generating (config("app.url")).
        'base_url' => null,
        // [Laravel Sanctum] Fetch a CSRF token before each request, and add it as an X-XSRF-TOKEN header.
        'use_csrf' => false,
        // The URL to fetch the CSRF token from (if `use_csrf` is true).
        'csrf_url' => '/sanctum/csrf-cookie',
    ],
];
