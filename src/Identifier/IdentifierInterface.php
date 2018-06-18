<?php

namespace Symftony\Identifier;

use Symftony\Identifier\Formatter\FormatterInterface;

interface IdentifierInterface
{
    /**
     * @param FormatterInterface|null $formatter
     * @param mixed|null $format
     *
     * @return string
     */
    public function getIdentifier(FormatterInterface $formatter = null, $format = null);

    /**
     * @return string
     */
    public function getName();
}
