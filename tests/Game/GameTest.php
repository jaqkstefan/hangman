<?php
namespace App\Tests\Game;

use App\Game\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    /**
     * @dataProvider provideLetters
     */
    public function testIsLetterFoundReturnsFalseByDefault(string $letter)
    {
        $game = new Game('test');

        $this->assertFalse($game->isLetterFound($letter));
    }

    public function provideLetters(): iterable
    {
        foreach (range('A', 'Z') as $letter) {
            yield [$letter];
        }
    }

    public function testIsLetterFound()
    {
        $game = new Game('test', 0, [], ['t']);

        $this->assertTrue($game->isLetterFound('t'), 'The letter "t" should be found.');
    }
}
