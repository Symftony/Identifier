<?php

namespace Symftony\Identifier;

class MyUidIdentifier extends AbstractIdentifier
{
    public function __construct()
    {
        $this->identifier = (string) getmyuid();
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'my_uid';
    }
}
