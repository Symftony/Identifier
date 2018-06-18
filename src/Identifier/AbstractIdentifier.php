<?php

namespace Symftony\Identifier;

use Symftony\Identifier\Formatter\FormatterInterface;

abstract class AbstractIdentifier implements IdentifierInterface
{
    /**
     * @var string
     */
    protected $identifier;

    /**
     * {@inheritdoc}
     */
    public function getIdentifier(FormatterInterface $formatter = null, $format = null)
    {
        return $formatter ? $formatter->format($format, $this) : $this->identifier;
    }

    public function __toString()
    {
        return $this->getIdentifier();
    }
}
