<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Truncater;

class TruncaterTest extends TestCase
{
    public function testTruncate(): void
    {
        $title = 'Черноморский Михаил Михайлович';

        $truncater1 = new Truncater();

        $this->assertSame($title, $truncater1->truncate($title));

        $expected = "Черноморский Михаил...";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => 19]));

        $this->assertSame($title, $truncater1->truncate($title));

        $expected = "Черноморский Михаил***";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => 19, 'separator' => '***']));

        $expected = "Черноморский Михаил...";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => -11]));

        $truncater2 = new Truncater(['length' => 19, 'separator' => '!!!']);

        $expected = "Черноморский Михаил!!!";
        $this->assertSame($expected, $truncater2->truncate($title));
    }
}
