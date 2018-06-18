<?php

namespace Symftony\Identifier;

class SecureRandomStringIdentifier extends AbstractIdentifier
{
    /**
     * @var null|string
     */
    private $suffix;

    /**
     * @param int $length
     * @param string $keyspace
     * @param string|null $suffix
     */
    public function __construct($length = null, $keyspace = null, $suffix = null)
    {
        if (null !== $length && !is_int($length)) {
            throw new \InvalidArgumentException(sprintf('Length must be integer, "%s" given.', is_object($length) ? get_class($length) : gettype($length)));
        }
        if (null !== $keyspace && !is_string($keyspace)) {
            throw new \InvalidArgumentException(sprintf('Keyspace must be string, "%s" given.', is_object($keyspace) ? get_class($keyspace) : gettype($keyspace)));
        }
        if (null !== $suffix && !is_string($suffix)) {
            throw new \InvalidArgumentException(sprintf('Suffix must be string, "%s" given.', is_object($suffix) ? get_class($suffix) : gettype($suffix)));
        }

        $length = $length ?: 8;
        $keyspace = $keyspace ?: '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $max = mb_strlen($keyspace, '8bit') - 1;
        $this->identifier = '';
        for ($i = 0; $i < $length; ++$i) {
            $this->identifier .= $keyspace[random_int(0, $max)];
        }
        $this->suffix = $suffix;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'secure_random_string' . ($this->suffix ? '_' . $this->suffix : '');
    }
}
