<?php

namespace Symftony\Identifier;

class HostByNameIdentifier extends HostnameIdentifier
{
    public function __construct()
    {
        parent::__construct();

        $this->identifier = gethostbyname($this->identifier);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'host_by_name';
    }
}
