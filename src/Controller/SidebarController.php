<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SidebarController extends AbstractController
{
    /**
     * @Route("/sidebar/last-games", name="app_sidebar_last_games", methods={"GET"})
     * @Cache(public=true, smaxage=20)
     */
    public function lastGames()
    {
        return $this->render('sidebar/last_games.html.twig', [
            //'last_games' => $gameRepository->getLastGames(),
            'last_games' => [
                ['date' => 'Oct 17', 'href' => '#', 'text' => 'Lorem Ipsum Toto!'],
                ['date' => 'Oct 14', 'href' => '#', 'text' => 'Titi Ipsum tata'],
            ]
        ]);
    }
}
