<?php 
namespace Andrew\Turazas;
use PHPUnit\Framework\TestCase;

final class BelepesTest extends TestCase
{
    public function testLogin(): void
    {
        $belepes = new Belepes("mysql:host=localhost;dbname=turazas", "admin", "admin");
        $ertek = $belepes->Login("admin", "admin");
        $this->assertSame(true, $ertek);
    }
}