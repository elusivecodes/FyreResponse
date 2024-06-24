<?php
declare(strict_types=1);

namespace Tests;

use Fyre\Http\Message;
use Fyre\Http\Response;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class ResponseTest extends TestCase
{
    protected Response $response;

    public function testConstructor(): void
    {
        $response = new Response([
            'body' => 'test',
            'headers' => [
                'test' => 'value'
            ],
            'protocolVersion' => '2.0',
            'statusCode' => 400
        ]);

        $this->assertSame(
            'test',
            $response->getBody()
        );

        $this->assertSame(
            [
                'value'
            ],
            $response->getHeader('test')->getValue()
        );

        $this->assertSame(
            '2.0',
            $response->getProtocolVersion()
        );

        $this->assertSame(
            400,
            $response->getStatusCode()
        );
    }

    public function testGetReason(): void
    {
        $response1 = new Response();
        $response2 = $response1->setStatusCode(400);

        $this->assertSame(
            'Bad Request',
            $response2->getReason()
        );
    }

    public function testGetStatusCode(): void
    {
        $response = new Response();

        $this->assertSame(
            200,
            $response->getStatusCode()
        );
    }

    public function testMessage(): void
    {
        $response = new Response();

        $this->assertInstanceOf(
            Message::class,
            $response
        );
    }

    public function testSetStatusCode(): void
    {
        $response1 = new Response();
        $response2 = $response1->setStatusCode(400);

        $this->assertSame(
            200,
            $response1->getStatusCode()
        );

        $this->assertSame(
            400,
            $response2->getStatusCode()
        );
    }

    public function testSetStatusCodeInvalid(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $response = new Response();
        $response->setStatusCode(600);
    }
}
