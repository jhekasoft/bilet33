<?php

namespace Bilet33\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('Bilet33SiteBundle:Album');

        $mainAlbum = $repository->findOneBy([], ['weight' => 'DESC']);

        return $this->render('Bilet33SiteBundle:Default:index.html.twig', [
            'mainAlbum' => $mainAlbum,
        ]);
    }

    public function mainMenuAction(Request $request)
    {
        $repository = $this->getDoctrine()
            ->getRepository('Bilet33SiteBundle:Album');

        $albums = $repository->findBy([], ['weight' => 'DESC'], 10);

        return $this->render('Bilet33SiteBundle:Default:mainMenu.html.twig', [
            'albums' => $albums,
        ]);
    }
}
