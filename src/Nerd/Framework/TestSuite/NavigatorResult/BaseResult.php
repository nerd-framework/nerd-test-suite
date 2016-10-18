<?php

namespace Nerd\Framework\TestSuite\NavigatorResult;

use Nerd\Framework\Http\Response\BaseResponseContract;
use Nerd\Framework\Http\Response\JsonResponse;
use PHPUnit\Framework\TestCase;

class BaseResult implements BaseResultContract
{
    /**
     * @var BaseResponseContract
     */
    protected $response;

    /**
     * @var TestCase
     */
    protected $testCase;

    /**
     * @param BaseResponseContract $response
     * @param TestCase $testCase
     */
    public function __construct(BaseResponseContract $response, TestCase $testCase)
    {
        $this->response = $response;
    }

    /**
     * @param int $statusCode
     * @return $this
     */
    public function expectStatusCode($statusCode)
    {
        $this->testCase->assertEquals($statusCode, $this->response->getStatusCode());

        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function expectSetHeader($name)
    {
        $this->testCase->assertTrue($this->response->hasHeader($name));

        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function expectSetCookie($name)
    {
        $this->testCase->assertTrue($this->response->hasCookie($name));

        return $this;
    }

    /**
     * @param string $contentType
     * @return $this
     */
    public function expectContentType($contentType)
    {
        $this->testCase->assertEquals($contentType, $this->response->getContentType());

        return $this;
    }
}
