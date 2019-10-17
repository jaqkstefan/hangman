<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests\Controller;

use App\Controller\GameController;
use App\Game\Game;
use App\Game\GameContextInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GameControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $client->request(Request::METHOD_GET, '/');

        $this->assertResponseRedirects('http://localhost/en/');

        $client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public function testPlayLetterWithoutGame()
    {
        $client = static::createClient();

        $client->request(Request::METHOD_GET, '/en/game/play-letter/A');

        $this->assertResponseStatusCodeSame(Response::HTTP_NOT_FOUND);
    }

    public function testPlayLetter()
    {
        $client = static::createClient();

        // the list only contains "tototata"
        $client->request(Request::METHOD_GET, '/en/game');
        $client->request(Request::METHOD_GET, '/en/game/play-letter/A');

        $this->assertResponseRedirects('http://localhost/en/game');

        // todo asset "A" is found and remaining attempts is still 11
    }
}
