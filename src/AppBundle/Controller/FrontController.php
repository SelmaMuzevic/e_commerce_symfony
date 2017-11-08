<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Category;
use AppBundle\Entity\Article;


class FrontController extends Controller
{
    /**
    * @Route("/categorie/{nameCategory}" , name ="article_by_category")
    */
    public function showArticleAction($nameCategory) {
        $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findOneByName($nameCategory);

        $articles = $category->getArticles();

        return $this->render('article/articleByCategory.html.twig', array(
            "articles" => $articles
        ));

     }

    /**
    * @Route("/", name="homepage")
    */
    public function indexAction(Request $request){
        // function findAll() qui recupere tout les données de category (articles)
        // et affiche
        $repository = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('AppBundle:Category');

        $categories = $repository->findAll();

        return $this->render('homepage/index.html.twig', array(
            "categories" => $categories
        ));
        
    }
    /**
     * @Route("/new-article", name="create-article")
     */
    public function createArticleAction(Request $request)
    {
        // ici je mettrai les routes pour aller chercher la liste des produits(categories)
        
        // $category = new Category();
        // $category->setName('Vetements');

        // $article = new Article();
        // $article->setNom('Pantalons');
        // $article->setPrix(19.99);
        // $article->setPhoto('kjnknj');
        // $article->setDescription('Ergonomic and stylish!');

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

}
