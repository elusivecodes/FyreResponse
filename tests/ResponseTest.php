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

        $this->assertSame(
            'Bad Request',
            $this->response->getReason()
        );
    }

    public function testGetStatusCode(): void
    {
        $this->assertSame(
            200,
            $this->response->getStatusCode()
        );
    }

    public function testSetStatusCode(): void
    {
        $this->assertSame(
            $this->response,
            $this->response->setStatusCode(400)
        );

        $this->assertSame(
            400,
            $this->response->getStatusCode()
        );
    }

    public function testSetStatusCodeInvalid(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->response->setStatusCode(600);
    }

    protected function setUp(): void
    {
        $this->response = new Response();
    }

}
