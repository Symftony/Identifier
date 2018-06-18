<?php

namespace Symftony\Identifier;

class StringIdentifier extends AbstractIdentifier
{
    /**
     * @var null|string
     */
    private $suffix;

    /**
     * @param string $string
     * @param string|null $suffix
     */
    public function __construct($string, $suffix = null)
    {
        if (null !== $string && !is_string($string)) {
            throw new \InvalidArgumentException(sprintf('String must be string, "%s" given.', is_object($string) ? get_class($string) : gettype($string)));
        }
        if (null !== $suffix && !is_string($suffix)) {
            throw new \InvalidArgumentException(sprintf('Suffix must be string, "%s" given.', is_object($suffix) ? get_class($suffix) : gettype($suffix)));
        }

        $this->identifier = $string;
        $this->suffix = $suffix;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'string' . ($this->suffix ? '_' . $this->suffix : '');
    }
}
