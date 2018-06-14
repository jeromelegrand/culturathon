<?php
/**
 * Created by PhpStorm.
 * User: wilder16
 * Date: 14/06/18
 * Time: 21:47
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Museum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MuseumFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $museum = new Museum();
        $museum->setName('Le Louvre');
        $museum->setCity('Paris');
        $manager->persist($museum);
        $this->addReference('museum-1', $museum);

        $museum = new Museum();
        $museum->setName('Les Beaux-Arts');
        $museum->setCity('Orléans');
        $manager->persist($museum);
        $this->addReference('museum-2', $museum);


        $museum = new Museum();
        $museum->setName('Le British Museum');
        $museum->setCity('Londres');
        $manager->persist($museum);
        $this->addReference('museum-3', $museum);


        $museum = new Museum();
        $museum->setName('Le Metropolitan');
        $museum->setCity('New-York');
        $manager->persist($museum);
        $this->addReference('museum-4', $museum);

        $manager->flush();
    }
}