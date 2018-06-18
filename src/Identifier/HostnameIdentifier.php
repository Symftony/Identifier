<?php

namespace Symftony\Identifier;

class HostnameIdentifier extends AbstractIdentifier
{
    public function __construct()
    {
        $this->identifier = gethostname();
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'hostname';
    }
}
