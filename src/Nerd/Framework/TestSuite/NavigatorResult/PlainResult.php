<?php

namespace Nerd\Framework\TestSuite\NavigatorResult;

class PlainResult extends BaseResult implements PlainResultContract
{
    /**
     * @param string $text
     * @return $this
     */
    public function contains($text)
    {
        $this->testCase->assertContains($text, $this->response->getContents());

        return $this;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function equalsTo($text)
    {
        $this->testCase->assertEquals($text, $this->response->getContents());

        return $this;
    }

    /**
     * @return $this
     */
    public function notEmpty()
    {
        $this->testCase->assertNotEmpty($this->response->getContents());

        return $this;
    }
}
