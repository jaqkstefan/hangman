<?php

namespace App\Player;

use Symfony\Component\Validator\Constraints as Assert;

class Registration
{
    /**
     * @var string|null
     *
     * @Assert\NotBlank
     * @Assert\Length(min=2, max=255)
     */
    public $username;

    /**
     * @var string|null
     *
     * @Assert\NotBlank
     * @Assert\Email
     */
    public $email;

    /**
     * @var string|null
     *
     * @Assert\NotBlank
     * @Assert\Length(min=8, max=150)
     */
    public $password;
}
