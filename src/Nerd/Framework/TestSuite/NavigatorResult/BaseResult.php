<?php

namespace Nerd\Framework\TestSuite\NavigatorResult;

use Nerd\Framework\Http\Response\Response;

class BaseResult implements BaseResultContract
{
    /**
     * @var Response
     */
    protected $response;

    /**
     * @param $response
     */
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    /**
     * @param int $statusCode
     * @return $this
     */
    public function expectStatusCode($statusCode)
    {
        assert(
            $statusCode == $this->response->getStatusCode(),
            "Expected status code is $statusCode but actual is {$this->response->getStatusCode()}"
        );
    }

    /**
     * @param string $name
     * @return $this
     */
    public function expectSetHeader($name)
    {
        assert($this->response->hasHeader($name), "Header $name is not set");
    }

    /**
     * @param string $name
     * @return $this
     */
    public function expectSetCookie($name)
    {
        assert($this->response->hasCookie($name), "Cookie $name is not set");
    }

    /**
     * @param string $contentType
     * @return $this
     */
    public function expectContentType($contentType)
    {
        assert(
            $contentType == $this->response->getContentType(),
            "Expected content-type is $contentType but actual is {$this->response->getContentType()}"
        );
    }
}