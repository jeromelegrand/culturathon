<?php

namespace AppBundle\Controller;

use AppBundle\Services\TextToSpeech;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class VoiceController extends Controller
{
    /**
     * @Route("/text-speech", name="textToSpeech")
     * @param Request $request
     * @param TextToSpeech $textToSpeech
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \ErrorException
     */
    public function generateAction(Request $request, TextToSpeech $textToSpeech)
    {
        if ($request->query->get('text') !== "" && $request->query->get('file') !== "") {
            $textToSpeech->generateAudioFile($request->query->get('text'), $request->query->get('file'));
        }
        return $this->render('voice/textToSpeech.twig', []);
    }
}
