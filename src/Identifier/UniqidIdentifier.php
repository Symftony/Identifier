<?php

namespace Symftony\Identifier;

class UniqidIdentifier extends AbstractIdentifier
{
    /**
     * @var null|string
     */
    private $suffix;

    /**
     * @param string $prefix
     * @param bool $more_entropy
     * @param string|null $suffix
     */
    public function __construct($prefix = '', $more_entropy = false, $suffix = null)
    {
        if (null !== $prefix && !is_string($prefix)) {
            throw new \InvalidArgumentException(sprintf('Prefix must be string, "%s" given.', is_object($prefix) ? get_class($prefix) : gettype($prefix)));
        }
        if (null !== $more_entropy && !is_bool($more_entropy)) {
            throw new \InvalidArgumentException(sprintf('More entropy must be boolean, "%s" given.', is_object($more_entropy) ? get_class($more_entropy) : gettype($more_entropy)));
        }
        if (null !== $suffix && !is_string($suffix)) {
            throw new \InvalidArgumentException(sprintf('Suffix must be string, "%s" given.', is_object($suffix) ? get_class($suffix) : gettype($suffix)));
        }

        $this->identifier = uniqid($prefix, $more_entropy);
        $this->suffix = $suffix;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'uniqid' . ($this->suffix ? '_' . $this->suffix : '');
    }
}
