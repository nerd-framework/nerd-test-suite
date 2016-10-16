<?php

namespace Nerd\Framework\TestSuite\Result;

use Nerd\Framework\Http\Response\PlainResponse;
use Nerd\Framework\Http\Response\Response;

class Result
{
    /**
     * @var Response
     */
    protected $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    /**
     * @param $expectedCode
     * @return $this
     */
    public function expectStatusCode($expectedCode)
    {
        assert($expectedCode === $this->response->getStatusCode());

        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function expectHeader($name)
    {
        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function expectSetCookie($name)
    {
        return $this;
    }

    /**
     * @return PlainResult
     */
    public function asPlain()
    {
        assert($this->response instanceof PlainResponse);
        return new PlainResult($this->response);
    }
}
