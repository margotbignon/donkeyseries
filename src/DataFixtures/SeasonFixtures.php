<?php

namespace App\DataFixtures;


use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{


    public function load(ObjectManager $manager): void
    {

        $seasons = [
            0 => [
                    'number' => 1,
                    'year' => 2010,
                    'description' => 'Commencement de the Walking Dead',
                    'program' => 'PROGRAM_WALKING_DEAD'  
            ],
            1 => [
                    'number' => 2,
                    'year' => 2012,
                    'description' => 'Suite de the Walking Dead',
                    'program' => 'PROGRAM_WALKING_DEAD'  
            ],    
            3 => [
                    'number' => 3,
                    'year' => 2014,
                    'description' => 'Fin de the Walking Dead',
                    'program' => 'PROGRAM_WALKING_DEAD'  
            ],
            4 => [
                    'number' => 1,
                    'year' => 2018,
                    'description' => 'Les débuts de the Hauting House',
                    'program' => 'PROGRAM_THE_HAUNTING_HOUSE'  
            ],
            5 => [
                    'number' => 2,
                    'year' => 2020,
                    'description' => 'Suite de the Hauting House',
                    'program' => 'PROGRAM_THE_HAUNTING_HOUSE'  
            ],
            6 => [
                    'number' => 3,
                    'year' => 2022,
                    'description' => 'Fin de the Hauting House',
                    'program' => 'PROGRAM_THE_HAUNTING_HOUSE'  
            ],
            7 => [
                    'number' => 1,
                    'year' => 2011,
                    'description' => 'Début de the American Horror Story',
                    'program' => 'PROGRAM_AMERICAN_HORROR_STORY'  
            ],
            8 => [
                    'number' => 2,
                    'year' => 2013,
                    'description' => 'Suite de the American Horror Story',
                    'program' => 'PROGRAM_AMERICAN_HORROR_STORY'  
            ],
            9 => [
                    'number' => 3,
                    'year' => 2015,
                    'description' => 'Fin de the American Horror Story',
                    'program' => 'PROGRAM_AMERICAN_HORROR_STORY'  
            ],
            10 => [
                    'number' => 1,
                    'year' => 2019,
                    'description' => 'Début de Love Death and Robots',
                    'program' => 'PROGRAM_LOVE_DEATH_ROBOTS'  
            ],
            11 => [
                    'number' => 2,
                    'year' => 2021,
                    'description' => 'Suite de Love Death and Robots',
                    'program' => 'PROGRAM_LOVE_DEATH_ROBOTS'  
            ], 
            12 => [
                    'number' => 3,
                    'year' => 2023,
                    'description' => 'Fin de Love Death and Robots',
                    'program' => 'PROGRAM_LOVE_DEATH_ROBOTS'  
            ],
            13 => [
                    'number' => 1,
                    'year' => 2005,
                    'description' => 'Début de Penny DreadFul',
                    'program' => 'PROGRAM_PENNY_DREADFUL'  
            ],
            14 => [
                    'number' => 2,
                    'year' => 2007,
                    'description' => 'Suite de Penny DreadFul',
                    'program' => 'PROGRAM_PENNY_DREADFUL'  
            ], 
            15 => [
                    'number' => 3,
                    'year' => 2009,
                    'description' => 'Fin de Penny DreadFul',
                    'program' => 'PROGRAM_PENNY_DREADFUL'  
            ],
            16 => [
                    'number' => 1,
                    'year' => 2015,
                    'description' => 'Début de the Fear Walking Dead',
                    'program' => 'PROGRAM_FEAR_WALKING_DEAD'  
            ],
            17 => [
                    'number' => 2,
                    'year' => 2017,
                    'description' => 'Suite de the Fear Walking Dead',
                    'program' => 'PROGRAM_FEAR_WALKING_DEAD'  
            ],   
            18 => [
                    'number' => 3,
                    'year' => 2019,
                    'description' => 'Fin de the Fear Walking Dead',
                    'program' => 'PROGRAM_FEAR_WALKING_DEAD'  
            ],                                                                                  
        ];

        foreach ($seasons as $seasonInfo) {
            $season = new Season();
            $season->setNumber($seasonInfo['number']);
            $season->setYear($seasonInfo['year']);
            $season->setDescription($seasonInfo['description']);
            $season->setProgram($this->getReference($seasonInfo['program']));
            $manager->persist($season);
        }

        $manager->flush();
    }

    public function getDependencies() : array
    {
        return [
            ProgramFixtures::class,
        ];
    }
}
