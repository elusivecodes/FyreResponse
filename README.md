# FyreResponse

**FyreResponse** is a free, open-source immutable HTTP response library for *PHP*.


## Table Of Contents
- [Installation](#installation)
- [Response Creation](#response-creation)
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


## Response Creation

```php
$response = new Response();
```


## Methods

This class extends the [*Message*](https://github.com/elusivecodes/FyreMessage) class.

**Get Reason**

Get the response reason phrase.

```php
$reason = $response->getReason();
```

**Get Status Code**

Get the status code.

```php
$code = $response->getStatusCode();
```

**Set Status Code**

Set the status code.

- `$code` is a number representing the status code.

```php
$newResponse = $response->setStatusCode($code);
```