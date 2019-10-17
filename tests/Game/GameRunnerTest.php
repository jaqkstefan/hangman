<?php

namespace App\Tests\Game;

use App\Game\Game;
use App\Game\GameContextInterface;
use App\Game\GameRunner;
use PHPUnit\Framework\TestCase;

class GameRunnerTest extends TestCase
{
    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function testPlayLetterThrowsWhenNoGameIsLoaded()
    {
        $context = $this->createMock(GameContextInterface::class);

        $runner = new GameRunner($context);

        $runner->playLetter('a');
    }

    public function testPlayLetter()
    {
        $context = $this->createMock(GameContextInterface::class);
        $context->method('loadGame')
            ->willReturn(new Game('test'))
        ;

        $expectedGame = new Game('test', 1, ['a']);

        $runner = new GameRunner($context);

        $this->assertEquals($expectedGame, $runner->playLetter('a'));
    }
}
