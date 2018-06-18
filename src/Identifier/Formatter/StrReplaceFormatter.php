<?php

namespace Symftony\Identifier\Formatter;

class StrReplaceFormatter implements FormatterInterface
{
    /**
     * @var string
     */
    private $defaultFormat;

    /**
     * @param string $defaultFormat
     */
    public function __construct($defaultFormat)
    {
        $this->defaultFormat = $defaultFormat;
    }

    /**
     * {@inheritdoc}
     */
    public function format($format, $identifiers)
    {
        $identifiersValues = [];

        foreach ($identifiers as $identifier) {
            $identifiersValues['{'.$identifier->getName().'}'] = $identifier->getIdentifier();
        }

        return str_replace(array_keys($identifiersValues), $identifiersValues, $format ?: $this->defaultFormat);
    }
}

