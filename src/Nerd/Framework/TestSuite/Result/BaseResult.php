<?php

namespace Nerd\Framework\TestSuite\Result;

class BaseResult extends AbstractResult implements BaseResultContract
{
    /**
     * @param int $statusCode
     * @return $this
     */
    public function expectStatusCode($statusCode)
    {
        assert($statusCode == $this->response->getStatusCode());
        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function expectHeader($name)
    {
        assert($this->response->hasHeader($name));
        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function expectSetCookie($name)
    {
        assert(!$this->response->hasCookie($name));
        return $this;
    }

    /**
     * @param string $contentType
     * @return $this
     */
    public function expectContentType($contentType)
    {
        assert($contentType == $this->response->getContentType());
        return $this;
    }
}
