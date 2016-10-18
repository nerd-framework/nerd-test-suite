<?php

namespace Nerd\Framework\TestSuite\NavigatorResult;

use Nerd\Framework\Http\Response\BaseResponseContract;
use Nerd\Framework\Http\Response\JsonResponse;

class BaseResult implements BaseResultContract
{
    /**
     * @var BaseResponseContract
     */
    protected $response;

    /**
     * @param $response
     */
    public function __construct(BaseResponseContract $response)
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

        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function expectSetHeader($name)
    {
        assert($this->response->hasHeader($name), "Header $name is not set");

        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function expectSetCookie($name)
    {
        assert($this->response->hasCookie($name), "Cookie $name is not set");

        return $this;
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

        return $this;
    }

    public function asJson()
    {
        assert($this->response instanceof JsonResponse);

        return new JsonResult($this->response);
    }
}
