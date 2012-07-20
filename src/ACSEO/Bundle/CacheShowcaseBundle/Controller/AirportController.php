<?php

namespace ACSEO\Bundle\CacheShowcaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use ACSEO\Bundle\CacheShowcaseBundle\Entity\Plane;


class AirportController extends Controller
{
    /**
     * @Route("/airport")
     * @Template()
     */
    public function airportAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('ACSEOCacheShowcaseBundle:Plane')->findAll();

        return array(
            'planes' => $entities,
        );
    }


    /**
     * @Route("/plane/{id}", name="plane_show")
     * @Template("ACSEOCacheShowcaseBundle:Airport:plane.html.twig")
     */
    public function showPlaneAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $plane = $em->getRepository('ACSEOCacheShowcaseBundle:Plane')->find($id);

        return array(
            'plane' => $plane,
        );
    }

    /**
     * @Route("/plane_cache/{id}", name="plane_show_cache")
     * @Template("ACSEOCacheShowcaseBundle:Airport:plane.html.twig")
     */
    public function showPlaneCacheAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $plane = $em->getRepository('ACSEOCacheShowcaseBundle:Plane')->find($id);

        return array(
            'plane' => $plane,
        );
    }
}
