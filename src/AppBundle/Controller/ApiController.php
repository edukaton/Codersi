<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Review;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

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

        $url = $request->query->get('url');

        //$categories = $request->request->get('categories') ? $request->request->get('categories') : [];
        $review = new Review();
        $review->setCategory("news");
        $review->setContent("Zawartość strony");
        $review->setUrl($url);
        $questions = $em->getRepository('AppBundle:Question')->findAll();

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        $jsonquestions = $serializer->serialize($questions, 'json');

        $em->persist($review);
        $em->flush();

        return new JsonResponse([
            'uuid' => $review->getId(),
            'question' => $jsonquestions
            ]);
    }
}
