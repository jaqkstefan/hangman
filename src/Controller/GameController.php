<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/game")
 */
class GameController extends AbstractController
{
    /**
     * @Route(name="app_game_index", methods={"GET"})
     */
    public function index()
    {
        return $this->render('game/index.html.twig');
    }

    /**
     * @Route("/won", name="app_game_won", methods={"GET"})
     */
    public function won()
    {
        return $this->render('game/won.html.twig');
    }

    /**
     * @Route("/failed", name="app_game_failed", methods={"GET"})
     */
    public function failed()
    {
        return $this->render('game/failed.html.twig');
    }
}
