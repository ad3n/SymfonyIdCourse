<?php

namespace UniqueUsername;

use Symfony\Component\VarDumper\VarDumper;
use UniqueUsername\Generator\BalineseUsernameGenerator;
use UniqueUsername\Generator\GenericUsernameGenerator;
use UniqueUsername\Generator\IslamicUsernameGenerator;
use UniqueUsername\Generator\ShortFullNameGenerator;
use UniqueUsername\Generator\UsernameGeneratorInterface;
use UniqueUsername\Generator\WesternUsernameGenerator;

/**
 * @author Muhammad Surya Ihsanuddin <surya.kejawen@gmail.com>
 */
class UsernameGeneratorFactory
{
    /**
     * @var array
     */
    private $generators;

    public function __construct(UsernameRepositoryInterface $usernameRepository)
    {
        $this->buildGenerator($usernameRepository);
    }

    private function buildGenerator(UsernameRepositoryInterface $usernameRepository)
    {
        $balineseGenerrator = new BalineseUsernameGenerator();
        $balineseGenerrator->setUsernameRepository($usernameRepository);

        $this->generators[get_class($balineseGenerrator)] = $balineseGenerrator;

        $islamicGenerrator = new IslamicUsernameGenerator();
        $islamicGenerrator->setUsernameRepository($usernameRepository);

        $this->generators[get_class($islamicGenerrator)] = $islamicGenerrator;

        $shortGenerrator = new ShortFullNameGenerator();
        $shortGenerrator->setUsernameRepository($usernameRepository);

        $this->generators[get_class($shortGenerrator)] = $shortGenerrator;

        $westernGenerrator = new WesternUsernameGenerator();
        $westernGenerrator->setUsernameRepository($usernameRepository);

        $this->generators[get_class($westernGenerrator)] = $westernGenerrator;

        $genericGenerrator = new GenericUsernameGenerator();
        $genericGenerrator->setUsernameRepository($usernameRepository);

        $this->generators[get_class($genericGenerrator)] = $genericGenerrator;
    }

    public function generate($fullName, \DateTime $dateTime)
    {
        if (8 > strlen($fullName)) {
            /** @var ShortFullNameGenerator $generator */
            $generator = $this->generators[ShortFullNameGenerator::class];

            VarDumper::dump('Short');

            return $generator->generate($fullName, $dateTime);
        }

        /** @var BalineseUsernameGenerator $generator */
        $generator = $this->generators[BalineseUsernameGenerator::class];
        if (0 <= $generator->isReservedName($fullName)) {

            VarDumper::dump('Bali');

            return $generator->generate($fullName, $dateTime);
        }

        /** @var IslamicUsernameGenerator $generator */
        $generator = $this->generators[IslamicUsernameGenerator::class];
        if ($generator->isReservedName($fullName)) {

            VarDumper::dump('Islam');

            return $this->makeSure($generator->generate($fullName, $dateTime), $dateTime);
        }

        /** @var WesternUsernameGenerator $generator */
        $generator = $this->generators[WesternUsernameGenerator::class];
        if ($generator->isReservedName($fullName)) {

            VarDumper::dump('Western');

            return $generator->generate($fullName, $dateTime);
        }

        VarDumper::dump('Generic');

        $generator = $this->generators[GenericUsernameGenerator::class];

        return $generator->generate($fullName, $dateTime);
    }

    private function makeSure($username, \DateTime $dateTime)
    {
        /** @var ShortFullNameGenerator $generator */
        $generator = $this->generators[ShortFullNameGenerator::class];

        VarDumper::dump('Short');

        return $generator->generate($username, $dateTime);
    }
}
