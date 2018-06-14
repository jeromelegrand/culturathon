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
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ArtworkFixtures extends Fixture  implements DependentFixtureInterface
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
     * @throws \ErrorException
     */
    public function load(ObjectManager $manager)
    {
        $artwork = new Artwork();
        $artwork->setName('Une oeuvre');
        $artwork->setCharacteristics('Des caractéristiques');
        $artwork->setArtist($this->getReference('artist-1'));

        $artwork->setMuseum($this->getReference('museum-2'));
        $artwork->setArtStyle($this->getReference('style-1'));
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

        $artwork->setAdvancedDescription('Manolo Chrétien est un photographe plasticien. Fils de pilote ayant grandi près de la base aérienne à Orange, il se fascine très jeune, pour l\'aéronautique, et ces fantastiques machines crées pour accélérer le temps. Avions, voitures et fusées sont les symboles d\'un monde en mouvement qui repousse toutes les frontières. Manolo Chrétien en capture la beauté magique pour l’imprimer sur aluminium. Ses ‘alluminations’ sont le miroir de l\'ambition humaine. 
L’artiste a prolongé sa recherche photographique sur la fluidité et les reflets en investiguant la dynamique des vagues et des flux aquatiques. Au travers son regard, l’océan devient une onde métallique, une mécanique naturelle. Manolo Chrétien vit et travaille en France.
');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getAdvancedDescription(), $voiceId);
        $artwork->setAdvancedAudio($voiceId . '.mp3');

        $manager->persist($artwork);

        $manager->flush();

    }

    public function getDependencies()
    {
        return [
            MuseumFixtures::class,
            ArtistFixtures::class,
            StyleFixtures::class,
        ];
    }

}