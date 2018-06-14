<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Artwork;
use AppBundle\Services\TextToSpeech;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Artwork controller.
 *
 * @Route("artwork")
 */
class ArtworkController extends Controller
{
    /**
     * Lists all artwork entities.
     *
     * @Route("/", name="artwork_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $artworks = $em->getRepository('AppBundle:Artwork')->findAll();

        return $this->render('artwork/index.html.twig', array(
            'artworks' => $artworks,
        ));
    }

    /**
     * Creates a new artwork entity.
     *
     * @Route("/new", name="artwork_new")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @param TextToSpeech $textToSpeech
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \ErrorException
     */
    public function newAction(Request $request, TextToSpeech $textToSpeech)
    {
        $artwork = new Artwork();
        $form = $this->createForm('AppBundle\Form\ArtworkType', $artwork);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($artwork);

            //génération des fichiers audio
            if (!in_array($artwork->getJuniorDescription(), ['', null])) {
                if (!in_array($artwork->getJuniorAudio(), ['', null])) {
                    unlink('web/audio/files' . $artwork->getJuniorAudio());
                }
                $voiceId = uniqid();
                $textToSpeech->generateAudioFile($artwork->getJuniorDescription(), $voiceId);
                $artwork->setJuniorAudio($voiceId . '.mp3');
            }
            if (!in_array($artwork->getStandardDescription(), ['', null])) {
                if (!in_array($artwork->getStandardAudio(), ['', null])) {
                    unlink('web/audio/files' . $artwork->getStandardAudio());
                }
                $voiceId = uniqid();
                $textToSpeech->generateAudioFile($artwork->getStandardDescription(), $voiceId);
                $artwork->setStandardAudio($voiceId . '.mp3');

            }
            if (!in_array($artwork->getAdvancedDescription(), ['', null])) {
                if (!in_array($artwork->getAdvancedAudio(), ['', null])) {
                    unlink('web/audio/files' . $artwork->getAdvancedAudio());
                }
                $voiceId = uniqid();
                $textToSpeech->generateAudioFile($artwork->getAdvancedDescription(), $voiceId);
                $artwork->setAdvancedAudio($voiceId . '.mp3');
            }

            $em->flush();

            return $this->redirectToRoute('artwork_show', array('id' => $artwork->getId()));
        }

        return $this->render('artwork/new.html.twig', array(
            'artwork' => $artwork,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a artwork entity.
     *
     * @Route("/{id}", name="artwork_show")
     * @Method("GET")
     * @param Artwork $artwork
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Artwork $artwork)
    {
        $deleteForm = $this->createDeleteForm($artwork);

        return $this->render('artwork/show.html.twig', array(
            'artwork' => $artwork,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing artwork entity.
     *
     * @Route("/{id}/edit", name="artwork_edit")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @param Artwork $artwork
     * @param TextToSpeech $textToSpeech
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \ErrorException
     */
    public function editAction(Request $request, Artwork $artwork, TextToSpeech $textToSpeech)
    {
        $deleteForm = $this->createDeleteForm($artwork);
        $editForm = $this->createForm('AppBundle\Form\ArtworkType', $artwork);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            //génération des fichiers audio
            if (!in_array($artwork->getJuniorDescription(), ['', null])) {
                if (!in_array($artwork->getJuniorAudio(), ['', null])) {
                    dump(__DIR__ .'/../../../web/audio/files' . $artwork->getJuniorAudio());
                    unlink(__DIR__ .'/../../../web/audio/files/' . $artwork->getJuniorAudio());
                }
                $voiceId = uniqid();
                $textToSpeech->generateAudioFile($artwork->getJuniorDescription(), $voiceId);
                $artwork->setJuniorAudio($voiceId . '.mp3');
            }
            if (!in_array($artwork->getStandardDescription(), ['', null])) {
                if (!in_array($artwork->getStandardAudio(), ['', null])) {
                    unlink(__DIR__ .'/../../../web/audio/files/' . $artwork->getStandardAudio());
                }
                $voiceId = uniqid();
                $textToSpeech->generateAudioFile($artwork->getStandardDescription(), $voiceId);
                $artwork->setStandardAudio($voiceId . '.mp3');

            }
            if (!in_array($artwork->getAdvancedDescription(), ['', null])) {
                if (!in_array($artwork->getAdvancedAudio(), ['', null])) {
                    unlink(__DIR__ .'/../../../web/audio/files/' . $artwork->getAdvancedAudio());
                }
                $voiceId = uniqid();
                $textToSpeech->generateAudioFile($artwork->getAdvancedDescription(), $voiceId);
                $artwork->setAdvancedAudio($voiceId . '.mp3');
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('artwork_edit', array('id' => $artwork->getId()));
        }

        return $this->render('artwork/edit.html.twig', array(
            'artwork' => $artwork,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a artwork entity.
     *
     * @Route("/{id}", name="artwork_delete")
     * @Method("DELETE")
     * @param Request $request
     * @param Artwork $artwork
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, Artwork $artwork)
    {
        $form = $this->createDeleteForm($artwork);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $files = [];
            $files[] = $artwork->getJuniorAudio();
            $files[] = $artwork->getStandardAudio();
            $files[] = $artwork->getAdvancedAudio();

            foreach ($files as $file) {
                unlink(__DIR__ .'/../../../web/audio/files/' . $file);
            }

            $em->remove($artwork);
            $em->flush();
        }

        return $this->redirectToRoute('artwork_index');
    }

    /**
     * Creates a form to delete a artwork entity.
     *
     * @param Artwork $artwork The artwork entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Artwork $artwork)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('artwork_delete', array('id' => $artwork->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * @Route("/favorite/{id}", name="artwork_favorite")
     * @param Artwork $artwork
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function markAsFavorite(Artwork $artwork)
    {
        $em = $this->getDoctrine()->getManager();

        if ($artwork->getFavorite() === true) {
            $artwork->setFavorite(false);
        } elseif ($artwork->getFavorite() === false) {
            $artwork->setFavorite(true);
        }

        $em->persist($artwork);
        $em->flush();

        return $this->redirectToRoute('artwork_show', ['id' => $artwork->getId()]);
    }
}
