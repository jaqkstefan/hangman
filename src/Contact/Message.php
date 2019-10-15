<?php

namespace App\Contact;

use Symfony\Component\Validator\Constraints as Assert;

class Message
{
    /**
     * @var string|null
     *
     * @Assert\Type("string")
     * @Assert\NotBlank
     * @Assert\Length(min=2, max=255)
     */
    public $name;

    /**
     * @var string|null
     *
     * @Assert\Type("string")
     * @Assert\NotBlank
     * @Assert\Email
     */
    public $email;

    /**
     * @var string|null
     *
     * @Assert\Type("string")
     * @Assert\Length(min=2, max=255)
     */
    public $subject;

    /**
     * @var string|null
     *
     * @Assert\Type("string")
     * @Assert\NotBlank
     * @Assert\Length(min=12, max=1500)
     */
    public $content;
}
