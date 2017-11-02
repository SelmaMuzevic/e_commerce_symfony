<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Category;
use AppBundle\Entity\Article;

use Symfony\Component\HttpFoundation\Response;


class FrontController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function createArticleAction(Request $request)
    {
        // ici je mettrai les routes pour aller chercher la liste des produits(categories)
        
        $category = new Category();
        $category->setName('Vetements');

        $article = new Article();
        $article->setNom('Pantalons');
        $article->setPrix(19.99);
        $article->setPhoto();
        $article->setDescription('Ergonomic and stylish!');

        // relate this product to the category
        $article->setCategory($category);

        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->persist($article);
        $em->flush();

        return new Response(
            'Saved new article with id: '.$article->getId()
            .'and new category with id: '.$category->getId()
        );
    }

    public function showAction($productId)
{
        $article = $this->getDoctrine()
        ->getRepository(Article::class)
        ->findOneByIdJoinedToCategory($articleId);

        $category = $article->getCategory();

}

public function showArticleAction($categoryId)
{
     $category = $this->getDoctrine()
        ->getRepository(Category::class)
        ->find($categoryId);

    $articles = $category->getArticles();

     }
}
