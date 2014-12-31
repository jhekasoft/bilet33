<?php

namespace Bilet33\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    public function aboutAction()
    {
        return $this->render('Bilet33SiteBundle:Page:about.html.twig');
    }

    public function videoAction()
    {
        return $this->render('Bilet33SiteBundle:Page:video.html.twig');
    }
}
