# FyreResponse

**FyreResponse** is a free, open-source immutable HTTP response library for *PHP*.


## Table Of Contents
- [Installation](#installation)
- [Basic Usage](#basic-usage)
- [Methods](#methods)



## Installation

**Using Composer**

```
composer require fyre/response
```

In PHP:

```php
use Fyre\Http\Response;
```


## Basic Usage

- `$options` is an array containing the message options.
    - `body` is a string or *StreamInterface* representing the message body, and will default to "".
    - `headers` is an array containing headers to set, and will default to *[]*.
    - `protocolVersion` is a string representing the protocol version, and will default to "*1.1*".
    - `statusCode` is a number representing the status code, and will default to *200*.
    - `reasonPhrase` is a string representing the reason phrase, and will default to "".

```php
$response = new Response($options);
```

If a `reasonPhrase` is not provided, the default reason for the status code will be used instead.


## Methods

This class extends the [*Message*](https://github.com/elusivecodes/FyreMessage) class.

**Get Reason Phrase**

Get the response reason phrase.

```php
$reason = $response->getReasonPhrase();
```

**Get Status Code**

Get the status code.

```php
$code = $response->getStatusCode();
```

**With Status *

Set the status code.

- `$code` is a number representing the status code.
- `$reasonPhrase` is a string representing the reason phrase, and will default to "".

```php
$newResponse = $response->withStatus($code, $reasonPhrase);
```

If a `$reasonPhrase` is not provided, the default reason for the status code will be used instead.