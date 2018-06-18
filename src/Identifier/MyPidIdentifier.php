<?php

namespace Symftony\Identifier;

class MyPidIdentifier extends AbstractIdentifier
{
    public function __construct()
    {
        $this->identifier = (string) getmypid();
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'my_pid';
    }
}
