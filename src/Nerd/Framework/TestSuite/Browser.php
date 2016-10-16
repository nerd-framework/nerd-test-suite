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
use Nerd\Framework\TestSuite\Result\BaseResult;

class Browser implements CrudContract
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
        return new BaseResult($response);
    }

    public function get($path)
    {
        return $this->run($path, 'GET');
    }

    public function post($path, $data)
    {
        return $this->run($path, 'POST');
    }

    public function put($path, $data)
    {
        return $this->run($path, 'PUT');
    }

    public function delete($path)
    {
        return $this->run($path, 'DELETE');
    }
}
