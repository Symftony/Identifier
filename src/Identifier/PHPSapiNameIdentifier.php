<?php

namespace Symftony\Identifier;

class PHPSapiNameIdentifier extends AbstractIdentifier
{
    public function __construct()
    {
        $this->identifier = php_sapi_name();
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'php_sapi_name';
    }
}
