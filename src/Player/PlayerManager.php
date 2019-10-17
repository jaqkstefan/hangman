<?php

namespace App\Player;

use App\Entity\Player;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class PlayerManager
{
    private $manager;
    private $encoder;

    public function __construct(EntityManagerInterface $manager, EncoderFactoryInterface $encoderFactory)
    {
        $this->manager = $manager;
        $this->encoder = $encoderFactory->getEncoder(Player::class);
    }

    public function register(Registration $registration)
    {
        $player = new Player(
            $registration->username,
            $registration->email,
            $this->encoder->encodePassword($registration->password, '')
        );

        $this->manager->persist($player);
        $this->manager->flush();
    }
}
