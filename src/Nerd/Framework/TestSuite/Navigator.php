<?php

namespace Nerd\Framework\TestSuite;

use Nerd\Framework\ApplicationContract;
use Nerd\Framework\Http\Request\RequestContract;
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
     * @param string $path
     * @return NavigatorResult\BaseResultContract
     */
    public function get($path)
    {
        // TODO: Implement get() method.
    }

    /**
     * @param string $path
     * @param string $data
     * @return NavigatorResult\BaseResultContract
     */
    public function post($path, $data)
    {
        // TODO: Implement post() method.
    }

    /**
     * @param string $path
     * @param string $data
     * @return NavigatorResult\BaseResultContract
     */
    public function put($path, $data)
    {
        // TODO: Implement put() method.
    }

    /**
     * @param string $path
     * @return NavigatorResult\BaseResultContract
     */
    public function delete($path)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param RequestContract $request
     * @return NavigatorResult\BaseResultContract
     */
    public function handle(RequestContract $request)
    {
        $response = $this->application->handle($request);

        return new BaseResult($response);
    }
}
