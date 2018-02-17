<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Review;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/api")
 */
class ApiController extends Controller
{
    /**
     * @Route("/review", name="api_review")
     * @Method("POST")
     */
    public function reviewAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $url = $request->request->get('URL');
        //$categories = $request->request->get('categories') ? $request->request->get('categories') : [];
        $review = new Review();
        $review->setUrl($url);
        $questions = $em->getRepository('AppBundle:DictType')->findAll();


        $em->persist($review);
        $em->flush();

        return new JsonResponse(['uuid' => $review->getId()]);
    }
}
