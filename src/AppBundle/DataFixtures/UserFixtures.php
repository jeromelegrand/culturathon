<?php
/**
 * Created by PhpStorm.
 * User: wilder16
 * Date: 15/06/18
 * Time: 00:24
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('admin@admin.fr');
        $user->setUsername('admin');
        $user->setPlainPassword('admin');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setEnabled(true);
        $user->setLevel('advanced');
        $manager->persist($user);

        $user = new User();
        $user->setEmail('user@user.fr');
        $user->setUsername('user');
        $user->setPlainPassword('user');
        $user->setRoles(['ROLE_USER']);
        $user->setLevel('junior');
        $user->setEnabled(true);
        $manager->persist($user);

        $manager->flush();
    }
}