<?php

namespace Symftony\Identifier\Formatter;

use Symftony\Identifier\IdentifierInterface;

interface FormatterInterface
{
    /**
     * @param $format
     * @param IdentifierInterface[] $identifiers
     *
     * @return string
     */
    public function format($format, $identifiers);
}
