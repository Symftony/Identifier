<?php

namespace Symftony\Identifier\Formatter;

use Symftony\Identifier\IdentifierInterface;

class ImplodeFormatter implements FormatterInterface
{
    /**
     * @var string
     */
    private $defaultFormat;

    /**
     * @param string $defaultFormat
     */
    public function __construct($defaultFormat = null)
    {
        $this->defaultFormat = $defaultFormat;
    }

    /**
     * {@inheritdoc}
     */
    public function format($format, $identifiers)
    {
        $identifiersValues = array_map(function (IdentifierInterface $identifier) {
            return $identifier->getIdentifier();
        }, $identifiers);

        return implode($format ?: $this->defaultFormat, $identifiersValues);
    }
}
