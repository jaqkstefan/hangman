<?php

namespace App\Controller;

use App\Game\GameRunner;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(GameRunner $runner): Response
    {
        return $this->render('game/index.html.twig', [
            'game' => $runner->loadGame(),
        ]);
    }

    /**
     * @Route("/reset", name="app_game_reset", methods={"GET"})
     */
    public function reset(GameRunner $runner): RedirectResponse
    {
        $runner->resetGame();

        return $this->redirectToRoute('app_game_index');
    }

    /**
     * @Route(
     *     "/play-letter/{letter}",
     *     requirements={"letter": "[A-Z]"},
     *     name="app_game_play_letter",
     *     methods={"GET"}
     * )
     */
    public function playLetter(GameRunner $runner, string $letter): RedirectResponse
    {
        $game = $runner->playLetter($letter);

        if ($game->isWon()) {
            return $this->redirectToRoute('app_game_won');
        }
        if ($game->isHanged()) {
            return $this->redirectToRoute('app_game_failed');
        }

        return $this->redirectToRoute('app_game_index');
    }

    /**
     * @Route("/play-word", name="app_game_play_word", methods={"POST"})
     */
    public function playWord(Request $request, GameRunner $runner): RedirectResponse
    {
        $word = $request->request->getAlpha('word');
        $game = $runner->playWord($word);

        if ($game->isWon()) {
            return $this->redirectToRoute('app_game_won');
        }

        return $this->redirectToRoute('app_game_failed');
    }

    /**
     * @Route("/won", name="app_game_won", methods={"GET"})
     */
    public function won(GameRunner $runner): Response
    {
        return $this->render('game/won.html.twig', [
            'game' => $runner->resetGameOnSuccess(),
        ]);
    }

    /**
     * @Route("/failed", name="app_game_failed", methods={"GET"})
     */
    public function failed(GameRunner $runner): Response
    {
        return $this->render('game/failed.html.twig', [
            'game' => $runner->resetGameOnFailure(),
        ]);
    }
}
