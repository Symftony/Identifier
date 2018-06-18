<?php

namespace Symftony\Identifier;

class MyGidIdentifier extends AbstractIdentifier
{
    public function __construct()
    {
        $this->identifier = (string) getmygid();
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'my_gid';
    }
}
