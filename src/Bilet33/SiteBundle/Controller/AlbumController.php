<?php

namespace Bilet33\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AlbumController extends Controller
{
    public function indexAction()
    {
        $albums = $this->getAlbumRepository()->findBy([], ['weight' => 'DESC']);
        $albums[] = $this->getAlbumRepository()->getOtherAlbum();

        return $this->render('Bilet33SiteBundle:Album:index.html.twig', [
            'albums' => $albums,
        ]);
    }

    public function showAction($id, Request $request)
    {
        $album = $this->getAlbumRepository()->find($id);

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

    public function otherAction()
    {
        $album = $this->getAlbumRepository()->getOtherAlbum();

        return $this->render('Bilet33SiteBundle:Album:other.html.twig', [
            'album' => $album,
        ]);
    }

    protected function getAlbumRepository()
    {
        return $this->getDoctrine()->getRepository('Bilet33SiteBundle:Album');
    }
}
