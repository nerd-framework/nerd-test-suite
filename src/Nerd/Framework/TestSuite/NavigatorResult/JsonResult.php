<?php

namespace Nerd\Framework\TestSuite\NavigatorResult;

class JsonResult extends BaseResult implements JsonResultContract
{
    /**
     * @param string $path
     * @return $this
     */
    public function containsNode($path)
    {
        $accessor = $this->makeValueAccessor($path);
        assert(!is_null($accessor($this->response->getData())));
        return $this;
    }

    /**
     * @param mixed $expected
     * @param string $path
     * @return $this
     */
    public function nodeEqualsTo($expected, $path)
    {
        $accessor = $this->makeValueAccessor($path);
        $actual = $accessor($this->response->getData());
        assert($expected === $actual);

        return $this;
    }

    private function makeValueAccessor($path)
    {
        $parts = explode('.', $path);

        return function ($data) use ($parts) {
            return array_reduce($parts, function ($acc, $part) {
                return is_array($acc) && array_key_exists($part, $acc) ? $acc[$part] : null;
            }, $data);
        };
    }
}
