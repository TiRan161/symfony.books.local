<?php


namespace App\Controller;


use App\Entity\Author;
use App\Entity\Book;
use App\Form\BookFormType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Tests\B;

class BookController extends AbstractController
{

    public function getBookByAuthor(Author $author)
    {
        /** @var EntityRepository $booksRepo */
        $booksRepo = $this->getDoctrine()->getRepository(Book::class);
//        $booksRepos = $this->getDoctrine()->getRepository(Book::class)->findBy(['author' => $author]);

        $booksByAuthor = $booksRepo->matching(new Criteria(Criteria::expr()->eq('author', $author)));
        return $this->render('index/authorPersonal.html.twig', ['books' => $booksByAuthor,
            'author' => $author]);

    }

    private function serviceGetBookByAuthor(Author $author)
    {
        /** @var EntityRepository $booksRepo */
        $booksRepo = $this->getDoctrine()->getRepository(Book::class);
        $booksByAuthor = $booksRepo->matching(new Criteria(Criteria::expr()->eq('author', $author)));
        return $booksByAuthor;
    }

    public function removeBook (Book $book)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($book);
        $em->flush();
        return $this->redirectToRoute('personal_author', ['id' => $book->getAuthor()->getId()]);
    }

    public function updateBook (Request $request, Book $book)
    {
        $bookForm = $this->createForm(BookFormType::class, $book);
        $bookForm->handleRequest($request);
        if ($bookForm->isSubmitted() && $bookForm->isValid()) {
//            $bookData = $bookForm->getData();
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('personal_author', ['id' => $book->getAuthor()->getId()]);
        }
        return $this->render('index/bookEditor.html.twig', ['book' => $bookForm->createView()]);


    }

    public function insertBook (Author $author, Request $request)
    {
        $book = new Book();
        $bookForm = $this->createForm(BookFormType::class, $book);
        $bookForm->handleRequest($request);
        if ($bookForm->isSubmitted() && $bookForm->isValid()) {
            $book->setAuthor($author);
            $book = $bookForm->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();
            return $this->redirectToRoute('personal_author', ['id' => $author->getId()]);
        }
        return $this->render('index/bookEditor.html.twig', ['book' => $bookForm->createView()]);


    }




}