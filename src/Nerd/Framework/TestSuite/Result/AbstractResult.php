<?php

namespace Nerd\Framework\TestSuite\Result;

use Nerd\Framework\Http\Response\ResponseContract;

abstract class AbstractResult
{
    /**
     * @var ResponseContract
     */
    protected $response;

    /**
     * @param ResponseContract $response
     */
    public function __construct(ResponseContract $response)
    {
        $this->response = $response;
    }
}
