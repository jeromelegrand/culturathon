<?php
/**
 * Created by PhpStorm.
 * User: wilder16
 * Date: 14/06/18
 * Time: 21:47
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArtistFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $artist = new Artist();
        $artist->setLastname('Picasso');
        $artist->setFirstname('Pablo');
        $artist->setDateOfBirth(new \DateTime('1881-10-25'));
        $artist->setDateOfDeath(new \DateTime('1973-08-04'));
        $artist->setDescription('Artiste utilisant tous les supports pour son travail, il est considéré comme le fondateur du cubisme avec Georges Braque et un compagnon d\'art du surréalisme. Il est l\'un des plus importants artistes du XXe siècle, tant par ses apports techniques et formels que par ses prises de positions politiques. Il a produit près de 50 000 œuvres dont 1 885 tableaux, 1 228 sculptures, 2 880 céramiques, 7 089 dessins, 342 tapisseries, 150 carnets de croquis et 30 000 estampes (gravures, lithographies, etc.)');
        $manager->persist($artist);
        $this->addReference('artist-1', $artist);

        $artist = new Artist();
        $artist->setLastname('Van Gogh');
        $artist->setFirstname('Vincent');
        $artist->setDateOfBirth(new \DateTime('1853-03-30'));
        $artist->setDateOfDeath(new \DateTime('1890-07-29'));
        $artist->setDescription('Van Gogh grandit au sein d\'une famille de l\'ancienne bourgeoisie. Il tente d\'abord de faire carrière comme marchand d\'art chez Goupil & Cie. Cependant, refusant de voir l\'art comme une marchandise, il est licencié. Il aspire alors à devenir pasteur, mais il échoue aux examens de théologie. À l\'approche de 1880, il se tourne vers la peinture. Pendant ces années, il quitte les Pays-Bas pour la Belgique, puis s\'établit en France. Autodidacte, Van Gogh prend néanmoins des cours de peinture[Quoi ?]. Passionné, il ne cesse d\'enrichir sa culture picturale : il analyse le travail des peintres de l\'époque, il visite les musées et les galeries d\'art, il échange des idées avec ses amis peintres, il étudie les estampes japonaises, les gravures anglaises, etc. Sa peinture reflète ses recherches et l\'étendue de ses connaissances artistiques. Toutefois, sa vie est parsemée de crises qui révèlent son instabilité mentale. L\'une d\'elles provoque son suicide, à l\'âge de 37 ans.');
        $manager->persist($artist);
        $this->addReference('artist-2', $artist);


        $artist = new Artist();
        $artist->setLastname('Monet');
        $artist->setFirstname('Claude');
        $artist->setDateOfBirth(new \DateTime('1840-11-14'));
        $artist->setDateOfDeath(new \DateTime('1926-12-05'));
        $artist->setDescription('Né sous le nom d\'Oscar-Claude Monet, au no 45 rue Laffitte à Paris, il grandit au Havre et est particulièrement assidu au dessin. Il commence sa carrière d\'artiste en réalisant des portraits à charge des notables de la ville. En 1859, il part à Paris tenter sa chance sur le conseil d\'Eugène Boudin et grâce à l\'aide de sa tante. Après des cours à l\'académie Suisse puis chez Charles Gleyre et après sa rencontre avec Johan Barthold Jongkind, le tout entrecoupé par le service militaire en Algérie, Monet se fait remarquer pour ses peintures de la baie d\'Honfleur. En 1866, il connait le succès au Salon de peinture et de sculpture grâce à La Femme en robe verte représentant Camille Doncieux qu\'il épouse en 1870. Toute cette période est cependant marquée par une grande précarité. Ensuite, il fuit la guerre de 1870 à Londres puis aux Pays-Bas. Dans la capitale anglaise, il fait la rencontre du marchand d\'art Paul Durand-Ruel qui sera sa principale source de revenu pendant le reste de sa carrière. Revenu en France en 1871, il participe à la première exposition des futurs impressionnistes en 1874.');
        $manager->persist($artist);
        $this->addReference('artist-3', $artist);


        $artist = new Artist();
        $artist->setLastname('Chrétien');
        $artist->setFirstname('Manolo');
        $artist->setDescription('Manolo Chrétien est un photographe plasticien. Fils de pilote ayant grandi près de la base aérienne à Orange, il se fascine très jeune, pour l\'aéronautique, et ces fantastiques machines crées pour accélérer le temps. Avions, voitures et fusées sont les symboles d\'un monde en mouvement qui repousse toutes les frontières. Manolo Chrétien en capture la beauté magique pour l’imprimer sur aluminium. Ses ‘alluminations’ sont le miroir de l\'ambition humaine. 
L’artiste a prolongé sa recherche photographique sur la fluidité et les reflets en investiguant la dynamique des vagues et des flux aquatiques. Au travers son regard, l’océan devient une onde métallique, une mécanique naturelle. Manolo Chrétien vit et travaille en France.
');
        $manager->persist($artist);
        $this->addReference('artist-4', $artist);


        $artist = new Artist();
        $artist->setLastname('Loro');
        $artist->setFirstname('Pia');
        $manager->persist($artist);
        $this->addReference('artist-5', $artist);


        $artist = new Artist();
        $artist->setLastname('Man&Pia');
        $artist->setDescription('Man&Pia est un duo d\'artistes formé par Manolo Chétien et Pia Loro, qui se sont rencontrés en 1987 aux Arts appliqués Olivier de Serres à Paris. Lui est créateur graphique et photographe, elle, architecte d\'intérieur et plasticienne. Ensemble, ils fondent un studio de design graphique en 1996 et développent un procédé de photographie plastique novateur qui leur permet de faire de nombreuses expositions en France et à l\'étranger. 

En parallèle de leur activité de design, Manolo et Pia ont également un atelier dans lequel ils peignent à quatre mains. Ils réalisent des oeuvres à l\'acrylique sur toile représentant principalement des paysages aux tons chauds et automnaux dans un style figuratif et stylisé.
');
        $manager->persist($artist);
        $this->addReference('artist-6', $artist);

        $manager->flush();
    }
}