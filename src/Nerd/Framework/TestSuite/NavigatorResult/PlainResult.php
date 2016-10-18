<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 10/18/16
 * Time: 4:07 PM
 */

namespace Nerd\Framework\TestSuite\NavigatorResult;


class PlainResult extends BaseResult implements PlainResultContract
{
    /**
     * @param string $text
     * @return $this
     */
    public function contains($text)
    {
        assert(false !== strpos($this->response->getContents(), $text));
        return $this;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function equalsTo($text)
    {
        assert($text === $this->response->getContents());
        return $this;
    }

    /**
     * @return $this
     */
    public function notEmpty()
    {
        assert(!empty($this->response->getContents()));
        return $this;
    }
}