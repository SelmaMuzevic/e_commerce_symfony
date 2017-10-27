<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FrontController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // ici je mettrai les routes pour aller chercher la liste des produits(categories)

        // replace this example code with whatever you need
        return $this->render('homepage/index.html.twig', [
            
        ]);
    }

    
}
