<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 16.10.16
 * Time: 12:12
 */

namespace Nerd\Framework\TestSuite;

use Nerd\Framework\ApplicationContract;
use Nerd\Framework\Http\Request\Request;
use Nerd\Framework\TestSuite\Result\Result;

class Runner
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

    public function run($path, $method = 'GET')
    {
        $request = Request::create($path, $method);
        $response = $this->application->handle($request);
        $response->prepare($request);
        return new Result($response);
    }

    public function get($path)
    {
        return $this->run($path, 'GET');
    }

    public function post($path)
    {
        return $this->run($path, 'POST');
    }
}
