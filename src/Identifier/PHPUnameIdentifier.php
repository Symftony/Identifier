<?php

namespace Symftony\Identifier;

class PHPUnameIdentifier extends AbstractIdentifier
{
    /**
     * @var string
     */
    private $mode;

    /**
     * @link http://php.net/manual/en/function.php-uname.php
     * @param string $mode [optional] <p>
     * mode is a single character that defines what
     * information is returned:
     * 'a': This is the default. Contains all modes in
     * the sequence "s n r v m".
     */
    public function __construct($mode)
    {
        $this->mode = $mode ? $mode : 'a';
        $this->identifier = php_uname($this->mode);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'php_uname' . ($this->mode ? '_' . $this->mode : '');
    }
}
