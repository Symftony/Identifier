<?php

namespace Symftony\Identifier;

use Symftony\Identifier\Formatter\FormatterInterface;
use Symftony\Identifier\Formatter\ImplodeFormatter;

class CompositeIdentifier implements IdentifierInterface, \IteratorAggregate
{
    /**
     * @param FormatterInterface $defaultFormatter
     */
    private $defaultFormatter;

    /**
     * @var array|IdentifierInterface[]
     */
    private $identifiers;

    /**
     * @param IdentifierInterface[] $identifiers
     */
    public function __construct($identifiers)
    {
        $this->identifiers = [];
        foreach ($identifiers as $identifier) {
            if (!$identifier instanceof IdentifierInterface) {
                throw new \InvalidArgumentException(sprintf('Identifiers must be an array of IdentifierInterface, "%s" given.', is_object($identifiers) ? get_class($identifiers) : gettype($identifiers)));
            }
            $this->identifiers[$identifier->getName()] = $identifier;
        }
    }

    /**
     * @param FormatterInterface $defaultFormatter
     */
    public function setDefaultFormatter(FormatterInterface $defaultFormatter)
    {
        $this->defaultFormatter = $defaultFormatter;
    }

    /**
     * @param IdentifierInterface $identifier
     */
    public function add(IdentifierInterface $identifier)
    {
        $this->identifiers[] = $identifier;
    }

    /**
     * @return array|IdentifierInterface[]
     */
    public function getIdentifiers()
    {
        return $this->identifiers;
    }

    /**
     * {@inheritdoc}
     */
    public function getIdentifier(FormatterInterface $formatter = null, $format = null)
    {
        if (null !== $formatter) {
            return $formatter->format($format, $this->identifiers);
        }

        if (null === $this->defaultFormatter) {
            $this->defaultFormatter = new ImplodeFormatter();
        }

        return $this->defaultFormatter->format($format, $this->identifiers);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'composite';
    }

    public function __toString()
    {
        return $this->getIdentifier();
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->identifiers);
    }
}
