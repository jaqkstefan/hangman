<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class SecurityController
{
    /**
     * @Route("/login/check", name="app_security_login_check", methods={"POST"})
     */
    public function loginCheck()
    {
        throw new \LogicException('There is something wrong in "security.yaml".');
    }

    /**
     * @Route("/logout", name="app_security_logout", methods={"GET"})
     */
    public function logout()
    {
        throw new \LogicException('There is something wrong in "security.yaml".');
    }
}
