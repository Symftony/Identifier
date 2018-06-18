<?php

namespace Symftony\Identifier;

class PHPVersionIdentifier extends AbstractIdentifier
{
    /**
     * @var null|string
     */
    private $extension;

    /**
     * @param string|null $extension
     */
    public function __construct($extension = null)
    {
        $this->extension = $extension;
        $this->identifier = (null === $extension) ? phpversion() : phpversion($extension);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'php_version' . ($this->extension ? '_' . $this->extension : '');
    }
}
