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

    public function mainMenuAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('Bilet33SiteBundle:Album');

        $albums = $repository->findBy([], ['weight' => 'DESC'], 10);

        return $this->render('Bilet33SiteBundle:Default:mainMenu.html.twig', [
            'albums' => $albums,
        ]);
    }

    public function footerAction()
    {
        $nowDatetime = new \DateTime('NOW');

        $startYear = '2013';
        $endYear = $nowDatetime->format('Y');
        return $this->render('Bilet33SiteBundle:Default:footer.html.twig', [
            'startYear' => $startYear,
            'endYear' => $endYear,
        ]);
    }
}
