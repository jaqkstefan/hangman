<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController
{
    /**
     * @Route(
     *     "/hello/{name}",
     *     name="app_hello_index",
     *     requirements={"name": "[a-zA-Z\-]+"},
     *     methods={"GET"}
     * )
     */
    public function index(string $name = 'world'): Response
    {
        return new Response(sprintf("Hello %s!", mb_convert_case($name, MB_CASE_TITLE)));
    }
}
