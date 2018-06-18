<?php

namespace Symftony\Identifier;

class TimeIdentifier  extends AbstractIdentifier
{
    /**
     * @var null|string
     */
    private $suffix;

    /**
     * @param string|null $suffix
     */
    public function __construct($suffix = null)
    {
        if (null !== $suffix && !is_string($suffix)) {
            throw new \InvalidArgumentException(sprintf('Suffix must be string, "%s" given.', is_object($suffix) ? get_class($suffix) : gettype($suffix)));
        }

        $this->identifier = (string) time();
        $this->suffix = $suffix;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'time' . ($this->suffix ? '_' . $this->suffix : '');
    }
}
