<?php

namespace Symftony\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Symftony\Identifier\PHPVersionIdentifier;

class PHPVersionIdentifierTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param $extension
     * @param $expectedName
     * @param $expected
     */
    public function testSuccess($extension, $expectedName, $expected)
    {
        $PHPVersionIdentifier = new PHPVersionIdentifier($extension);
        $this->assertEquals($expected, $PHPVersionIdentifier->getIdentifier());
        $this->assertEquals($expected, (string)$PHPVersionIdentifier);
        $this->assertEquals($expectedName, $PHPVersionIdentifier->getName());
    }

    public function dataProvider()
    {
        $data = [
            [
                null,
                'php_version',
                phpversion(),
            ],
        ];

        $extensions = get_loaded_extensions();
        if (isset($extensions[0])) {
            $extensionName = $extensions[0];
            $data[] = [
                $extensionName,
                'php_version_' . $extensionName,
                phpversion($extensionName),
            ];
        }

        return $data;
    }
}
