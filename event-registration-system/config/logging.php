<?php

<<<<<<< HEAD
use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;
use Monolog\Processor\PsrLogMessageProcessor;

=======
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
    | This option defines the default log channel that is utilized to write
    | messages to your logs. The value provided here should match one of
    | the channels present in the list of "channels" configured below.
=======
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the channels defined in the "channels" configuration array.
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Deprecations Log Channel
    |--------------------------------------------------------------------------
    |
    | This option controls the log channel that should be used to log warnings
    | regarding deprecated PHP and library features. This allows you to get
    | your application ready for upcoming major versions of dependencies.
    |
    */

    'deprecations' => [
        'channel' => env('LOG_DEPRECATIONS_CHANNEL', 'null'),
<<<<<<< HEAD
        'trace' => env('LOG_DEPRECATIONS_TRACE', false),
=======
        'trace' => false,
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    ],

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
    | Here you may configure the log channels for your application. Laravel
    | utilizes the Monolog PHP logging library, which includes a variety
    | of powerful log handlers and formatters that you're free to use.
    |
    | Available drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog", "custom", "stack"
=======
    | Here you may configure the log channels for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog",
    |                    "custom", "stack"
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    |
    */

    'channels' => [
<<<<<<< HEAD

        'stack' => [
            'driver' => 'stack',
            'channels' => explode(',', (string) env('LOG_STACK', 'single')),
=======
        'stack' => [
            'driver' => 'stack',
            'channels' => ['single'],
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
            'ignore_exceptions' => false,
        ],

        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
<<<<<<< HEAD
            'replace_placeholders' => true,
=======
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
        ],

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
<<<<<<< HEAD
            'days' => env('LOG_DAILY_DAYS', 14),
            'replace_placeholders' => true,
=======
            'days' => 14,
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
        ],

        'slack' => [
            'driver' => 'slack',
            'url' => env('LOG_SLACK_WEBHOOK_URL'),
<<<<<<< HEAD
            'username' => env('LOG_SLACK_USERNAME', 'Laravel Log'),
            'emoji' => env('LOG_SLACK_EMOJI', ':boom:'),
            'level' => env('LOG_LEVEL', 'critical'),
            'replace_placeholders' => true,
=======
            'username' => 'Laravel Log',
            'emoji' => ':boom:',
            'level' => env('LOG_LEVEL', 'critical'),
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
        ],

        'papertrail' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
<<<<<<< HEAD
            'handler' => env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class),
=======
            'handler' => env('LOG_PAPERTRAIL_HANDLER', \Monolog\Handler\SyslogUdpHandler::class),
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
            'handler_with' => [
                'host' => env('PAPERTRAIL_URL'),
                'port' => env('PAPERTRAIL_PORT'),
                'connectionString' => 'tls://'.env('PAPERTRAIL_URL').':'.env('PAPERTRAIL_PORT'),
            ],
<<<<<<< HEAD
            'processors' => [PsrLogMessageProcessor::class],
=======
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
        ],

        'stderr' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
<<<<<<< HEAD
            'handler' => StreamHandler::class,
            'handler_with' => [
                'stream' => 'php://stderr',
            ],
            'formatter' => env('LOG_STDERR_FORMATTER'),
            'processors' => [PsrLogMessageProcessor::class],
=======
            'handler' => \Monolog\Handler\StreamHandler::class,
            'formatter' => env('LOG_STDERR_FORMATTER'),
            'with' => [
                'stream' => 'php://stderr',
            ],
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
        ],

        'syslog' => [
            'driver' => 'syslog',
            'level' => env('LOG_LEVEL', 'debug'),
<<<<<<< HEAD
            'facility' => env('LOG_SYSLOG_FACILITY', LOG_USER),
            'replace_placeholders' => true,
=======
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
        ],

        'errorlog' => [
            'driver' => 'errorlog',
            'level' => env('LOG_LEVEL', 'debug'),
<<<<<<< HEAD
            'replace_placeholders' => true,
=======
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
        ],

        'null' => [
            'driver' => 'monolog',
<<<<<<< HEAD
            'handler' => NullHandler::class,
=======
            'handler' => \Monolog\Handler\NullHandler::class,
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
        ],

        'emergency' => [
            'path' => storage_path('logs/laravel.log'),
        ],
<<<<<<< HEAD

=======
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    ],

];
