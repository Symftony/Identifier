<?php

namespace Symftony\Identifier;

class PHPOSIdentifier extends AbstractIdentifier
{
    public function __construct()
    {
        $this->identifier = PHP_OS;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'php_os';
    }
}
