<?php
/**
 * Created by PhpStorm.
 * User: gilles
 * Date: 19/11/17
 * Time: 17:54
 */

namespace WCS\CoavBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use WCS\CoavBundle\Entity\Review;

/**
 * Class ReviewController
 * @Route("review")
 */
class ReviewController extends Controller
{
    /**
     *@Route("/", name="review_index")
     *@Method("GET")
     */

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reviews = $em->getRepository('WCSCoavBundle:Review')->findAll();

        return $this->render('review/index.html.twig', array(
            'reviews' => $reviews
        ));
    }

    /**
     * @Route("/new", name="review_new")
     * @Method({"GET", "POST"})
     */
    public function newAction()
    {
        return $this->render("review/new.html.twig");
    }

}