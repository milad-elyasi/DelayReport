<?php

namespace Tests\Unit\Middlewares;

use App\Exceptions\Http\InvalidAcceptHeaderException;
use App\Http\Middleware\OnlyJsonResponseMiddleware;
use Tests\TestCase;
use Illuminate\Http\Request;

class OnlyJsonResponseMiddlewareTest extends TestCase
{
    /**
     * @dataProvider invalidAcceptHeaderDataProvider
     */
    public function testShouldThrowExceptionWhenRequestHeaderIsInvalid(string $acceptHeader): void
    {
        // arrange
        $sut = new OnlyJsonResponseMiddleware();
        $request = new Request();
        $request->headers->set('Accept', $acceptHeader);

        // expect
        $this->expectException(InvalidAcceptHeaderException::class);
        $this->expectExceptionMessage('This application only supports json responses.');

        // act
        $sut->handle($request, function () {
        });
    }

    public function invalidAcceptHeaderDataProvider(): array
    {
        return [
            'html' => [
                'text/html'
            ],
            'pdf' => [
                'application/pdf'
            ],
            'xml' => [
                'application/xml'
            ]
        ];
    }

    /**
     * @dataProvider  validAcceptHeaderDataProvider
     */
    public function testShouldCallNextFunction(?string $acceptHeader): void
    {
        // arrange
        $sut = new OnlyJsonResponseMiddleware();
        $request = new Request();
        $request->headers->set('Accept', $acceptHeader);

        // expect
        $closure = function (Request $request) {
            $this->assertTrue($request instanceof Request);
        };

        // act
        $sut->handle($request, $closure);
    }

    public function validAcceptHeaderDataProvider(): array
    {
        return [
            'everything' => [
                '*/*'
            ],
            'json' => [
                'application/json'
            ],
            'null' => [
                null
            ]
        ];
    }
}
