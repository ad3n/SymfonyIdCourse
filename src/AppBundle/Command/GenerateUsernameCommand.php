<?php

namespace AppBundle\Command;


use AppBundle\Entity\Username;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateUsernameCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('username:generate')
            ->setDescription('Username generator')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $generator = $this->getContainer()->get('unique_username_generator');

        $fullName = 'Jon Taslim';
        $birthday = new \DateTime();
        for ($i = 0; $i <= 9; $i++) {
            $username = $generator->generate($fullName, $birthday);

            $user = new Username();
            $user->setFullName($fullName);
            $user->setBirthDay($birthday);
            $user->setUsername($username);

            $entityManager->persist($user);
            $entityManager->flush();
        }
    }

}