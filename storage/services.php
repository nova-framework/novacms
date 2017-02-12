<?php

return array (
  'providers' => 
  array (
    0 => 'Nova\\Auth\\AuthServiceProvider',
    1 => 'Nova\\Cache\\CacheServiceProvider',
    2 => 'Nova\\Routing\\RoutingServiceProvider',
    3 => 'Nova\\Cookie\\CookieServiceProvider',
    4 => 'Nova\\Module\\ModuleServiceProvider',
    5 => 'Nova\\Database\\DatabaseServiceProvider',
    6 => 'Nova\\Encryption\\EncryptionServiceProvider',
    7 => 'Nova\\Filesystem\\FilesystemServiceProvider',
    8 => 'Nova\\Hashing\\HashServiceProvider',
    9 => 'Nova\\Log\\LogServiceProvider',
    10 => 'Nova\\Mail\\MailServiceProvider',
    11 => 'Nova\\Pagination\\PaginationServiceProvider',
    12 => 'Nova\\Redis\\RedisServiceProvider',
    13 => 'Nova\\Auth\\Reminders\\ReminderServiceProvider',
    14 => 'Nova\\Session\\SessionServiceProvider',
    15 => 'Nova\\Language\\LanguageServiceProvider',
    16 => 'Nova\\Validation\\ValidationServiceProvider',
    17 => 'Nova\\Html\\HtmlServiceProvider',
    18 => 'Nova\\View\\ViewServiceProvider',
    19 => 'Nova\\Layout\\LayoutServiceProvider',
    20 => 'Nova\\Cron\\CronServiceProvider',
    21 => 'App\\Providers\\AppServiceProvider',
    22 => 'App\\Providers\\EventServiceProvider',
    23 => 'App\\Providers\\RouteServiceProvider',
  ),
  'eager' => 
  array (
    0 => 'Nova\\Routing\\RoutingServiceProvider',
    1 => 'Nova\\Cookie\\CookieServiceProvider',
    2 => 'Nova\\Module\\ModuleServiceProvider',
    3 => 'Nova\\Database\\DatabaseServiceProvider',
    4 => 'Nova\\Encryption\\EncryptionServiceProvider',
    5 => 'Nova\\Filesystem\\FilesystemServiceProvider',
    6 => 'Nova\\Session\\SessionServiceProvider',
    7 => 'App\\Providers\\AppServiceProvider',
    8 => 'App\\Providers\\EventServiceProvider',
    9 => 'App\\Providers\\RouteServiceProvider',
  ),
  'deferred' => 
  array (
    'auth' => 'Nova\\Auth\\AuthServiceProvider',
    'cache' => 'Nova\\Cache\\CacheServiceProvider',
    'cache.store' => 'Nova\\Cache\\CacheServiceProvider',
    'memcached.connector' => 'Nova\\Cache\\CacheServiceProvider',
    'hash' => 'Nova\\Hashing\\HashServiceProvider',
    'log' => 'Nova\\Log\\LogServiceProvider',
    'Psr\\Log\\LoggerInterface' => 'Nova\\Log\\LogServiceProvider',
    'mailer' => 'Nova\\Mail\\MailServiceProvider',
    'swift.mailer' => 'Nova\\Mail\\MailServiceProvider',
    'swift.transport' => 'Nova\\Mail\\MailServiceProvider',
    'paginator' => 'Nova\\Pagination\\PaginationServiceProvider',
    'redis' => 'Nova\\Redis\\RedisServiceProvider',
    'auth.reminder' => 'Nova\\Auth\\Reminders\\ReminderServiceProvider',
    'auth.reminder.repository' => 'Nova\\Auth\\Reminders\\ReminderServiceProvider',
    'language' => 'Nova\\Language\\LanguageServiceProvider',
    'validator' => 'Nova\\Validation\\ValidationServiceProvider',
    'html' => 'Nova\\Html\\HtmlServiceProvider',
    'form' => 'Nova\\Html\\HtmlServiceProvider',
    'view' => 'Nova\\View\\ViewServiceProvider',
    'view.finder' => 'Nova\\View\\ViewServiceProvider',
    'view.engine.resolver' => 'Nova\\View\\ViewServiceProvider',
    'layout' => 'Nova\\Layout\\LayoutServiceProvider',
    'cron' => 'Nova\\Cron\\CronServiceProvider',
  ),
  'when' => 
  array (
    'Nova\\Auth\\AuthServiceProvider' => 
    array (
    ),
    'Nova\\Cache\\CacheServiceProvider' => 
    array (
    ),
    'Nova\\Hashing\\HashServiceProvider' => 
    array (
    ),
    'Nova\\Log\\LogServiceProvider' => 
    array (
    ),
    'Nova\\Mail\\MailServiceProvider' => 
    array (
    ),
    'Nova\\Pagination\\PaginationServiceProvider' => 
    array (
    ),
    'Nova\\Redis\\RedisServiceProvider' => 
    array (
    ),
    'Nova\\Auth\\Reminders\\ReminderServiceProvider' => 
    array (
    ),
    'Nova\\Language\\LanguageServiceProvider' => 
    array (
    ),
    'Nova\\Validation\\ValidationServiceProvider' => 
    array (
    ),
    'Nova\\Html\\HtmlServiceProvider' => 
    array (
    ),
    'Nova\\View\\ViewServiceProvider' => 
    array (
    ),
    'Nova\\Layout\\LayoutServiceProvider' => 
    array (
    ),
    'Nova\\Cron\\CronServiceProvider' => 
    array (
    ),
  ),
);
