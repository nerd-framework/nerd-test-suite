<?php

namespace Nerd\Framework\TestSuite;

use Nerd\Framework\ApplicationContract;
use Nerd\Framework\Http\Request\Request;
use Nerd\Framework\Http\Request\RequestContract;
use Nerd\Framework\Http\Response\JsonResponse;
use Nerd\Framework\Http\Response\PlainResponse;
use Nerd\Framework\TestSuite\NavigatorResult\BaseResult;

class Navigator implements NavigatorContract
{
    /**
     * @var ApplicationContract
     */
    private $application;

    /**
     * @param ApplicationContract $application
     */
    public function __construct(ApplicationContract $application)
    {
        $this->application = $application;
    }

    /**
     * @param $path
     * @param string $method
     * @param array $data
     * @return NavigatorResult\PlainResultContract
     */
    public function go($path, $method = 'GET', array $data = [])
    {
        $request = Request::create($path, $method, $data);
        $response = $this->application->handle($request);

        return new NavigatorResult\PlainResult($response);
    }

    /**
     * @param $path
     * @param string $method
     * @param array $data
     * @return NavigatorResult\JsonResultContract
     */
    public function goJson($path, $method = 'GET', array $data = [])
    {
        $request = Request::create($path, $method, $data);
        $response = $this->application->handle($request);

        assert($response instanceOf JsonResponse);

        return new NavigatorResult\JsonResult($response);
    }
}
