<?php
/**
 * Created by PhpStorm.
 * User: wilder16
 * Date: 14/06/18
 * Time: 22:55
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\ArtStyle;
use AppBundle\Entity\Artwork;
use AppBundle\Services\TextToSpeech;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArtworkFixtures extends Fixture
{

    private $textToSpeech;

    public function __construct(TextToSpeech $textToSpeech)
    {
        $this->textToSpeech = $textToSpeech;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $artwork = new Artwork();
        $artwork->setName('Une oeuvre');
        $artwork->setCharacteristics('Des caractéristiques');
        $artwork->setArtist($this->getReference('artist-1'));
        $artwork->setMuseum($this->getReference('museum-1'));
//        $artwork->setArtStyle($this->getReference('style-1'));
        $artwork->setType('Peinture');
        $artwork->setPicture('/images/manolo.jpg');

        $artwork->setJuniorDescription('une description junior');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getJuniorDescription(), $voiceId);
        $artwork->setJuniorAudio($voiceId . '.mp3');

        $artwork->setStandardDescription('une description standard');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getStandardDescription(), $voiceId);
        $artwork->setStandardAudio($voiceId . '.mp3');

        $artwork->setAdvancedDescription('une description avancée');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getAdvancedDescription(), $voiceId);
        $artwork->setAdvancedAudio($voiceId . '.mp3');

        $manager->persist($artwork);

        $manager->flush();

    }

    public function getDependencies()
    {
        return[
            ArtistFixtures::class,
            StyleFixtures::class,
            MuseumFixtures::class,
        ];
    }

}