<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\Http\Message,
    Fyre\Http\Exceptions\ResponseException,
    Fyre\Http\Response,
    PHPUnit\Framework\TestCase;

final class ResponseTest extends TestCase
{

    protected Response $response;

    public function testResponseMessage(): void
    {
        $this->assertInstanceOf(
            Message::class,
            $this->response
        );
    }

    public function testResponseGetReason(): void
    {
        $this->response->setStatusCode(400);

        $this->assertEquals(
            'Bad Request',
            $this->response->getReason()
        );
    }

    public function testResponseGetStatusCode(): void
    {
        $this->assertEquals(
            200,
            $this->response->getStatusCode()
        );
    }

    public function testResponseSetStatusCode(): void
    {
        $this->assertEquals(
            $this->response,
            $this->response->setStatusCode(400)
        );

        $this->assertEquals(
            400,
            $this->response->getStatusCode()
        );
    }

    public function testResponseSetStatusCodeInvalid(): void
    {
        $this->expectException(ResponseException::class);

        $this->response->setStatusCode(600);
    }

    public function setUp(): void
    {
        $this->response = new Response();
    }

}
