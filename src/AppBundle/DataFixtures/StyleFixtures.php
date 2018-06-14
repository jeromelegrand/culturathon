<?php
/**
 * Created by PhpStorm.
 * User: wilder16
 * Date: 14/06/18
 * Time: 21:47
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\ArtStyle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StyleFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $style = new ArtStyle();
        $style->setName('Abstrait');
        $manager->persist($style);
        $this->setReference('style-1', $style);

        $style = new ArtStyle();
        $style->setName('Contemporain');
        $manager->persist($style);
        $this->setReference('style-2', $style);


        $style = new ArtStyle();
        $style->setName('Cubisme');
        $manager->persist($style);
        $this->setReference('style-3', $style);

        $style = new ArtStyle();
        $style->setName('Imprésionnisme');
        $manager->persist($style);
        $this->setReference('style-4', $style);


        $style = new ArtStyle();
        $style->setName('Réalisme');
        $manager->persist($style);
        $this->setReference('style-5', $style);


        $style = new ArtStyle();
        $style->setName('Renaissance');
        $manager->persist($style);
        $this->setReference('style-6', $style);


        $style = new ArtStyle();
        $style->setName('Surréalisme');
        $manager->persist($style);
        $this->setReference('style-7', $style);

        $manager->flush();
    }
}
