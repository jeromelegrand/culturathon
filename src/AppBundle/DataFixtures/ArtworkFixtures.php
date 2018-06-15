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


        //1ère oeuvre
        $artwork = new Artwork();
        $artwork->setName('New York City Vertighorizon');
        $artwork->setCharacteristics('160x106cm Photographie sur aluminium');
        $artwork->setArtist($this->getReference('artist-4'));

        $artwork->setMuseum($this->getReference('museum-1'));
        $artwork->setArtStyle($this->getReference('style-2'));
        $artwork->setType('Photographie');
        $artwork->setPicture('/images/manolo.jpg');

        $artwork->setJuniorDescription('La photographie représente la ville de New York aux Etats Unis avec des effets verticaux et horizontaux.');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getJuniorDescription(), $voiceId);
        $artwork->setJuniorAudio($voiceId . '.mp3');

        $artwork->setStandardDescription('La photographie représente beauté de la ville de New York et ses différentes couleurs par des effets verticaux et horizontaux. La photographie est présentée sur aluminium afin de garder le coté métallique de la ville.');
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

        //2ème oeuvre
        $artwork = new Artwork();
        $artwork->setName('Lueur de Loire');
        $artwork->setCharacteristics('80x80cm, Techniques mixtes, Peinture sur toile');
        $artwork->setArtist($this->getReference('artist-6'));

        $artwork->setMuseum($this->getReference('museum-1'));
        $artwork->setArtStyle($this->getReference('style-2'));
        $artwork->setType('Peinture');
        $artwork->setPicture('/images/lueur-de-loire.jpeg');

        $artwork->setJuniorDescription('Cette peinture représente des arbres dans les tons ocres et bleus.');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getJuniorDescription(), $voiceId);
        $artwork->setJuniorAudio($voiceId . '.mp3');

        $artwork->setStandardDescription('Le tableau représente un paysage naturel avec deux arbres et un lac dans les tons ocre et bleus. Le style anguleux apporte une atmosphère pesante sur le ressenti du spectateur.');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getStandardDescription(), $voiceId);
        $artwork->setStandardAudio($voiceId . '.mp3');

        $artwork->setAdvancedDescription('Man&Pia est un duo d\'artistes formé par Manolo Chétien et Pia Loro, qui se sont rencontrés en 1987 aux Arts appliqués Olivier de Serres à Paris. Lui est créateur graphique et photographe, elle, architecte d\'intérieur et plasticienne. Ensemble, ils fondent un studio de design graphique en 1996 et développent un procédé de photographie plastique novateur qui leur permet de faire de nombreuses expositions en France et à l\'étranger. 

En parallèle de leur activité de design, Manolo et Pia ont également un atelier dans lequel ils peignent à quatre mains. Ils réalisent des oeuvres à l\'acrylique sur toile représentant principalement des paysages aux tons chauds et automnaux dans un style figuratif et stylisé.
');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getAdvancedDescription(), $voiceId);
        $artwork->setAdvancedAudio($voiceId . '.mp3');

        $manager->persist($artwork);

        //3ème oeuvre
        $artwork = new Artwork();
        $artwork->setName('Cable Car');
        $artwork->setCharacteristics('130.97 cm,
French Art Studio – Londre en Angleterre.
');
        $artwork->setArtist($this->getReference('artist-6'));

        $artwork->setMuseum($this->getReference('museum-2'));
        $artwork->setArtStyle($this->getReference('style-2'));
        $artwork->setType('Peinture');
        $artwork->setPicture('/images/cable-car.jpeg');

        $artwork->setJuniorDescription('Cette peinture représente des voitures dans une ville.');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getJuniorDescription(), $voiceId);
        $artwork->setJuniorAudio($voiceId . '.mp3');

        $artwork->setStandardDescription('Le tableau représente un paysage urbain dans les tons ocre et bleus. Le style anguleux apporte une atmosphère pesante sur le ressenti du spectateur.');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getStandardDescription(), $voiceId);
        $artwork->setStandardAudio($voiceId . '.mp3');

        $artwork->setAdvancedDescription('Man&Pia est un duo d\'artistes formé par Manolo Chétien et Pia Loro, qui se sont rencontrés en 1987 aux Arts appliqués Olivier de Serres à Paris. Lui est créateur graphique et photographe, elle, architecte d\'intérieur et plasticienne. Ensemble, ils fondent un studio de design graphique en 1996 et développent un procédé de photographie plastique novateur qui leur permet de faire de nombreuses expositions en France et à l\'étranger. 

En parallèle de leur activité de design, Manolo et Pia ont également un atelier dans lequel ils peignent à quatre mains. Ils réalisent des oeuvres à l\'acrylique sur toile représentant principalement des paysages aux tons chauds et automnaux dans un style figuratif et stylisé.
');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getAdvancedDescription(), $voiceId);
        $artwork->setAdvancedAudio($voiceId . '.mp3');

        $manager->persist($artwork);


        //4ème oeuvre
        $artwork = new Artwork();
        $artwork->setName('Le Corrège');
        $artwork->setArtist($this->getReference('artist-6'));

        $artwork->setMuseum($this->getReference('museum-2'));
        $artwork->setArtStyle($this->getReference('style-2'));
        $artwork->setType('Peinture');
        $artwork->setPicture('/images/image1.jpg');

        $artwork->setJuniorDescription('description junior');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getJuniorDescription(), $voiceId);
        $artwork->setJuniorAudio($voiceId . '.mp3');

        $artwork->setStandardDescription('description standard');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getStandardDescription(), $voiceId);
        $artwork->setStandardAudio($voiceId . '.mp3');

        $artwork->setAdvancedDescription('description avancée');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getAdvancedDescription(), $voiceId);
        $artwork->setAdvancedAudio($voiceId . '.mp3');

        $manager->persist($artwork);

        //5ème oeuvre
        $artwork = new Artwork();
        $artwork->setName('Campagne d\'Egypte');
        $artwork->setArtist($this->getReference('artist-6'));

        $artwork->setMuseum($this->getReference('museum-2'));
        $artwork->setArtStyle($this->getReference('style-2'));
        $artwork->setType('Peinture');
        $artwork->setPicture('/images/image2.jpg');

        $artwork->setJuniorDescription('description junior');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getJuniorDescription(), $voiceId);
        $artwork->setJuniorAudio($voiceId . '.mp3');

        $artwork->setStandardDescription('description standard');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getStandardDescription(), $voiceId);
        $artwork->setStandardAudio($voiceId . '.mp3');

        $artwork->setAdvancedDescription('description avancée');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getAdvancedDescription(), $voiceId);
        $artwork->setAdvancedAudio($voiceId . '.mp3');

        $manager->persist($artwork);

        //6ème oeuvre
        $artwork = new Artwork();
        $artwork->setName('Brueghel');
        $artwork->setArtist($this->getReference('artist-6'));

        $artwork->setMuseum($this->getReference('museum-2'));
        $artwork->setArtStyle($this->getReference('style-2'));
        $artwork->setType('Peinture');
        $artwork->setPicture('/images/image3.jpg');

        $artwork->setJuniorDescription('description junior');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getJuniorDescription(), $voiceId);
        $artwork->setJuniorAudio($voiceId . '.mp3');

        $artwork->setStandardDescription('description standard');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getStandardDescription(), $voiceId);
        $artwork->setStandardAudio($voiceId . '.mp3');

        $artwork->setAdvancedDescription('description avancée');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getAdvancedDescription(), $voiceId);
        $artwork->setAdvancedAudio($voiceId . '.mp3');

        $manager->persist($artwork);

        //7ème oeuvre
        $artwork = new Artwork();
        $artwork->setName('Le Penseur');
        $artwork->setArtist($this->getReference('artist-6'));

        $artwork->setMuseum($this->getReference('museum-2'));
        $artwork->setArtStyle($this->getReference('style-2'));
        $artwork->setType('Peinture');
        $artwork->setPicture('/images/image4.jpg');

        $artwork->setJuniorDescription('description junior');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getJuniorDescription(), $voiceId);
        $artwork->setJuniorAudio($voiceId . '.mp3');

        $artwork->setStandardDescription('description standard');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getStandardDescription(), $voiceId);
        $artwork->setStandardAudio($voiceId . '.mp3');

        $artwork->setAdvancedDescription('description avancée');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getAdvancedDescription(), $voiceId);
        $artwork->setAdvancedAudio($voiceId . '.mp3');

        $manager->persist($artwork);

        //8ème oeuvre
        $artwork = new Artwork();
        $artwork->setName('La Joconde');
        $artwork->setArtist($this->getReference('artist-6'));

        $artwork->setMuseum($this->getReference('museum-2'));
        $artwork->setArtStyle($this->getReference('style-2'));
        $artwork->setType('Peinture');
        $artwork->setPicture('/images/image5.jpg');

        $artwork->setJuniorDescription('description junior');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getJuniorDescription(), $voiceId);
        $artwork->setJuniorAudio($voiceId . '.mp3');

        $artwork->setStandardDescription('description standard');
        $voiceId = uniqid();
        $this->textToSpeech->generateAudioFile($artwork->getStandardDescription(), $voiceId);
        $artwork->setStandardAudio($voiceId . '.mp3');

        $artwork->setAdvancedDescription('description avancée');
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