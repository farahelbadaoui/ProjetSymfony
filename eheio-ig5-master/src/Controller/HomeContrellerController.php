<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeContrellerController extends AbstractController
{
    #[Route('/home/controller', name: 'app_home_contreller')]
    public function index(): Response
    {
       return new Response(content:"Hello World !");
    }
    #[Route(path:"/home/about", name:"app_about")]
    public function about():Response
    {
        return new Response( content:"hello World 2!");
    }
    #[Route("/home/contact",name:"app_home_contact")]
    public function contact():Response
    {
        return new Response(content:"WeLcome to contact");
    }

    #[Route(path:'/home', name: 'app_home')]
    public function home(): Response
    {
        $text = "Hello this is home !";
        $tabYear = [2020,2021,2022,2023];
        return $this->render('dummy/home.html.twig',  [
            "text" => $text,
            "years"=>$tabYear
        ]);
    }

    #[Route( '/add_book', name: 'app_book_add' )]  
    public function addBook(): Response
    {
        $book = new Book();
        $bookForm = $this->createForm( BookType::class, $book);
        return $this->render('dummy/book.html.twig',["bookForm" => $bookForm]);
    }
}