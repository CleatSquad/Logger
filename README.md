# Custom Logger

This package allows you to send logs to files. based on [monolog/monolog](https://github.com/Seldaek/monolog).
You can use it during your development to make debugging easier.
The file are in the var / log folder.
This package is recommended for magento 2. 

## Badges

[![Latest Stable Version](http://poser.pugx.org/cleatsquad/logger/v)](https://packagist.org/packages/cleatsquad/logger) 
[![Total Downloads](http://poser.pugx.org/cleatsquad/logger/downloads)](https://packagist.org/packages/cleatsquad/logger) 
[![Latest Unstable Version](http://poser.pugx.org/cleatsquad/logger/v/unstable)](https://packagist.org/packages/cleatsquad/logger) 
[![License](http://poser.pugx.org/cleatsquad/logger/license)](https://packagist.org/packages/cleatsquad/logger) 

## Getting Started

### Installing

Add dependency
```
composer require cleatsquad/logger
```

## Using

You can use it in your php class like this 

```php
\CleatSquad\Logger::log('test', 'test.log');
\CleatSquad\Logger::log('test', 'test.log', \Monolog\Logger::WARNING);
\CleatSquad\Logger::log(['test' => 'is an array'], 'test.log');
```


## Log Levels

Monolog supports the logging levels described by [RFC 5424](http://tools.ietf.org/html/rfc5424).

- **DEBUG** (100): Detailed debug information.

- **INFO** (200): Interesting events. Examples: User logs in, SQL logs.

- **NOTICE** (250): Normal but significant events.

- **WARNING** (300): Exceptional occurrences that are not errors. Examples:
  Use of deprecated APIs, poor use of an API, undesirable things that are not
  necessarily wrong.

- **ERROR** (400): Runtime errors that do not require immediate action but
  should typically be logged and monitored.

- **CRITICAL** (500): Critical conditions. Example: Application component
  unavailable, unexpected exception.

- **ALERT** (550): Action must be taken immediately. Example: Entire website
  down, database unavailable, etc. This should trigger the SMS alerts and wake
  you up.

- **EMERGENCY** (600): Emergency: system is unusable.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/cleatsquad/logger/tags). 

## Authors

* **Mohamed El Mrabet** - *Initial work* - [mimou78](https://github.com/mimou78)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
