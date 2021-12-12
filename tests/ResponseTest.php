<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\Http\Message,
    Fyre\Http\Response,
    InvalidArgumentException,
    PHPUnit\Framework\TestCase;

final class ResponseTest extends TestCase
{

    protected Response $response;

    public function testMessage(): void
    {
        $this->assertInstanceOf(
            Message::class,
            $this->response
        );
    }

    public function testGetReason(): void
    {
        $this->response->setStatusCode(400);

        $this->assertEquals(
            'Bad Request',
            $this->response->getReason()
        );
    }

    public function testGetStatusCode(): void
    {
        $this->assertEquals(
            200,
            $this->response->getStatusCode()
        );
    }

    public function testSetStatusCode(): void
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

    public function testSetStatusCodeInvalid(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->response->setStatusCode(600);
    }

    public function setUp(): void
    {
        $this->response = new Response();
    }

}
