<?php

namespace Symftony\Identifier;

use Ramsey\Uuid\Uuid;

class Uuid4Identifier extends AbstractIdentifier
{
    public function __construct()
    {
        $this->identifier = Uuid::uuid4()->toString();
    }

    public function getName()
    {
        return 'uuid_4';
    }
}
