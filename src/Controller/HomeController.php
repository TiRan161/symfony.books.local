<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
//    /**
//     * @Route("/home", name="home")
//     */
    public function index()
    {
        $words = ['sky', 'cloud', 'wood', 'rock', 'forest',
            'mountain', 'breeze'];
        $testArr = [
            0 => ['id' => '1',
            'name' => 'Petr'],
            1 => ['id' => '2',
                'name' => 'Oleg']
        ];

        return $this->render('home/index.html.twig', [
            'words' => $words,
            'users' => $testArr
        ]);
    }
}