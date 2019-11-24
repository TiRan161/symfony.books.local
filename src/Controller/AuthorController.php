<?php


namespace App\Controller;


use App\Entity\Author;
use App\Entity\Book;
use App\Form\AuthorFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AuthorController extends AbstractController
{
    public function __construct()
    {
    }

    public function getAuthors()
    {
        $authorsRepo = $this->getDoctrine()->getRepository(Author::class);
        $authors = $authorsRepo->findAll();
        return $this->render('index/authorsPage.html.twig', [
           'authors' => $authors,
        ]);
    }

    public function updateAuthor (Author $author, Request $request)
    {
        $authorForm = $this->createForm(AuthorFormType::class, $author);
        $authorForm->handleRequest($request);
        if ($authorForm->isSubmitted() && $authorForm->isValid()) {
//            $author = $authorForm->getData();
            $em = $this->getDoctrine()->getManager();
//            $em->persist($author);
            $em->flush();
            return $this->redirectToRoute('Authors');
        }
        return $this->render('index/authorChangePage.html.twig', ['author' => $authorForm->createView()]);
    }

    public function insertAuthor (Request $request)
    {
        $author = new Author();
        $authorForm = $this->createForm(AuthorFormType::class, $author);
        $authorForm->handleRequest($request);
        if ($authorForm->isSubmitted() && $authorForm->isValid()) {
            $author = $authorForm->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($author);
            $em->flush();
            return $this->redirectToRoute('Authors');
        }
        return $this->render('index/authorChangePage.html.twig', ['author' => $authorForm->createView()]);

    }
}