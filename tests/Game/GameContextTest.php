<?php

namespace App\Tests\Game;

use App\Game\Game;
use App\Game\GameContext;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class GameContextTest extends TestCase
{
    public function testLoadGameReturnsFalse()
    {
        $context = new GameContext($this->createMock(SessionInterface::class));

        $this->assertFalse($context->loadGame());
    }

    public function testLoadGame()
    {
        $loadedGame = new Game('test');
        $session = $this->createMock(SessionInterface::class);
        $session->method('get')
            ->willReturn($loadedGame->getContext())
        ;

        $context = new GameContext($session);

        $this->assertEquals($loadedGame, $context->loadGame());
    }
}
