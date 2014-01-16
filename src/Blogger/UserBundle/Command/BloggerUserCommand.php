<?php

namespace Blogger\UserBundle\Command;

use Blogger\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BloggerUserCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
                ->setName('blogger:user:user')
                ->setDescription('Add Blog user')
                ->addArgument('username', InputArgument::REQUIRED, 'The username')
                ->addArgument('password', InputArgument::REQUIRED, 'The password')
                ->addArgument('email',  InputArgument::REQUIRED,'Email Address')
                ->addArgument('firstname',  InputArgument::REQUIRED,'First Name')
                ->addArgument('middlename',  InputArgument::REQUIRED,'Middle Name')
                ->addArgument('lastname',  InputArgument::REQUIRED,'Last Name')
                ->addArgument('sex',  InputArgument::REQUIRED,'Sex')
                ->addArgument('birthdate',  InputArgument::REQUIRED,'Birthdate')
                
                
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $username = $input->getArgument('username');
        $password = $input->getArgument('password');

        $em = $this->getContainer()->get('doctrine')->getManager();

        $user = new User();
        $user->setUsername($username);
        $user->setEmail($input->getArgument('email'));
        $user->setFirstname($input->getArgument('firstname'));
        $user->setMiddlename($input->getArgument('middlename'));
        $user->setLastname($input->getArgument('lastname'));
        $user->setSex($input->getArgument('sex'));
        $user->setBirthdate(new \DateTime($input->getArgument('birthdate')));
        
        // encode the password
        $factory = $this->getContainer()->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);
        $encodedPassword = $encoder->encodePassword($password, $user->getSalt());
        $user->setPassword($encodedPassword);
        $em->persist($user);
        $em->flush();

        $output->writeln(sprintf('Added %s user with password %s', $username, $password));
    }

}

?>