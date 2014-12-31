<?php

namespace Bilet33\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AlbumController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('Bilet33SiteBundle:Album');

        $albums = $repository->findBy([], ['weight' => 'DESC']);

        return $this->render('Bilet33SiteBundle:Album:index.html.twig', [
            'albums' => $albums,
        ]);
    }

    public function showAction($id, Request $request)
    {
        $repository = $this->getDoctrine()
            ->getRepository('Bilet33SiteBundle:Album');

        $album = $repository->find($id);

        # Redirect to the URL with slug
        $slug = $request->get('slug', null);
        if (!isset($slug) || $slug != $album->getSlug()) {
            return $this->redirect($this->generateUrl('bilet33_site_album', [
                'id' => $album->getId(),
                'slug' => $album->getSlug(),
            ]), 301);
        }

        return $this->render('Bilet33SiteBundle:Album:show.html.twig', [
            'album' => $album,
        ]);
    }
}
