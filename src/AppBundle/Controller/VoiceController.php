<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class VoiceController extends Controller
{
    /**
     * @Route("/generate", name="generate")
     */
    public function generateAction()
    {
        return $this->render('voice/generate.html.twig', []);
    }

    /**
     * @Route("/play", name="play")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function playAction(Request $request)
    {
        return $this->render('voice/play.html.twig', [
            'text' => $request->request->get('text'),
        ]);
    }
}
