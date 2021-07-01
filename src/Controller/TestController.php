<?php

use Faker\Guesser\Name;
use PhpParser\Builder\Namespace_;

namespace App\Controller;

use App\Service\RandomPassword;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class TestController extends AbstractController
{
    /**
     * @Route("/test/password", name="test")
     */
    public function index(RandomPassword $randomPassword): Response
    {
        dd($randomPassword->randomPassword(30));
    }
}