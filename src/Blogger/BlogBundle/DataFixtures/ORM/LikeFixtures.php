<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LikeFixtures
 *
 * @author ganesh
 */
namespace Blogger\BlogBundle\DataFixtures\ORM;

use Blogger\BlogBundle\Entity\Likes;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blogger\BlogBundle\Entity\Comment;
use Blogger\BlogBundle\Entity\Blog;
use Blogger\UserBundle\Entity\User;

class LikeFixtures extends AbstractFixture implements OrderedFixtureInterface {
    public function getOrder() {
        return 3;
    }

    public function load(ObjectManager $manager) {
        
        $like1=new Likes();
        $like1->setCreated(new \DateTime());
        $like1->setUpdated($like1->getCreated());
        $like1->setBlog($manager->merge($this->getReference('blog-1')));
        $like1->setUser($manager->merge($this->getReference('user1')));
        $manager->persist($like1);
        
        $like2=new Likes();
        $like2->setCreated(new \DateTime());
        $like2->setUpdated($like2->getCreated());
        $like2->setBlog($manager->merge($this->getReference('blog-2')));
        $like2->setUser($manager->merge($this->getReference('user1')));
        $manager->persist($like2);
        
        $like3=new Likes();
        $like3->setCreated(new \DateTime());
        $like3->setUpdated($like3->getCreated());
        $like3->setBlog($manager->merge($this->getReference('blog-3')));
        $like3->setUser($manager->merge($this->getReference('user1')));
        $manager->persist($like3);
        
        $like4=new Likes();
        $like4->setCreated(new \DateTime());
        $like4->setUpdated($like4->getCreated());
        $like4->setBlog($manager->merge($this->getReference('blog-2')));
        $like4->setUser($manager->merge($this->getReference('user1')));
        $manager->persist($like4);
        
        
        $like5=new Likes();
        $like5->setCreated(new \DateTime());
        $like5->setUpdated($like5->getCreated());
        $like5->setBlog($manager->merge($this->getReference('blog-1')));
        $like5->setUser($manager->merge($this->getReference('user1')));
        $manager->persist($like5);
        
        $like6=new Likes();
        $like6->setCreated(new \DateTime());
        $like6->setUpdated($like6->getCreated());
        $like6->setBlog($manager->merge($this->getReference('blog-2')));
        $like6->setUser($manager->merge($this->getReference('user1')));
        $manager->persist($like6);
        
        
        $manager->flush();
    }

}
