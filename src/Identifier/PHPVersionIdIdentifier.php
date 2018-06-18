<?php

namespace Symftony\Identifier;

class PHPVersionIdIdentifier extends AbstractIdentifier
{
    public function __construct()
    {
        $this->identifier = (string) PHP_VERSION_ID;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'php_version_id';
    }
}
