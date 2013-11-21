<?php

namespace Acme\FilmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function filmsListAction($name)
    {
        return $this->render('AcmeFilmsBundle:Default:filmsList.html.twig', array('films' =>$this->getDoctrine()->getRepository('AcmeFilmsBundle:Film')->findAll()));
    }
    public function filmViewAction($name)
    {
     $repository=$this->getDoctrine()->getRepository("AcmeFilmBundle:Film");
     $film=$repository->find($name);
     if(!$film){
         throw $this->createNotFoundException('The film with this id not found');
     }
        return $this->render('AcmeFilmsBundle:Default:film.html.twig',array('film'=>$film));
    }
}
