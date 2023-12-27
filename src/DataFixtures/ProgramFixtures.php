<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    const TITLE = [
        'Walking Dead',
        'The Haunting Of Hill House',
        'American Horror Story',
        'Love Death And Robots',
        'Penny Dreadful',
        'Fear The Walking Dead',
    ];


    public function load(ObjectManager $manager): void
    {
        
        $program = new Program();
        $program->setTitle('Walking Dead');
        $program->setSummary('Le policier Rick Grimes se réveille après un long coma. Il découvre avec effarement que le monde, ravagé par une épidémie, est envahi par les morts-vivants.');
        $program->setPoster('https://m.media-amazon.com/images/M/MV5BZmFlMTA0MmUtNWVmOC00ZmE1LWFmMDYtZTJhYjJhNGVjYTU5XkEyXkFqcGdeQXVyMTAzMDM4MjM0._V1_.jpg');
        $program->setCategory($this->getReference('CATEGORY_AVENTURE'));
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('The Haunting Of Hill House');
        $program->setSummary('Plusieurs frères et sœurs qui, enfants, ont grandi dans la demeure qui allait devenir la maison hantée la plus célèbre des États-Unis.');
        $program->setPoster('https://m.media-amazon.com/images/M/MV5BMTU4NzA4MDEwNF5BMl5BanBnXkFtZTgwMTQxODYzNjM@._V1_SY1000_CR0,0,674,1000_AL_.jpg');
        $program->setCategory($this->getReference('CATEGORY_HORREUR'));
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('American Horror Story');
        $program->setSummary('A chaque saison, son histoire. American Horror Story nous embarque dans des récits à la fois poignants et cauchemardesques, mêlant la peur, le gore et le politiquement correct.');
        $program->setPoster('https://m.media-amazon.com/images/M/MV5BODZlYzc2ODYtYmQyZS00ZTM4LTk4ZDQtMTMyZDdhMDgzZTU0XkEyXkFqcGdeQXVyMzQ2MDI5NjU@._V1_SY1000_CR0,0,666,1000_AL_.jpg');
        $program->setCategory($this->getReference('CATEGORY_HORREUR'));
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('Love Death And Robots');
        $program->setSummary('Un yaourt susceptible, des soldats lycanthropes, des robots déchaînés, des monstres-poubelles, des chasseurs de primes cyborgs.');
        $program->setPoster('https://m.media-amazon.com/images/M/MV5BMTc1MjIyNDI3Nl5BMl5BanBnXkFtZTgwMjQ1OTI0NzM@._V1_SY1000_CR0,0,674,1000_AL_.jpg');
        $program->setCategory($this->getReference('CATEGORY_ACTION'));
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('Penny Dreadful');
        $program->setSummary('Dans le Londres ancien, Vanessa Ives, une jeune femme puissante aux pouvoirs hypnotiques, allie ses forces à celles d Ethan, un garçon rebelle et violent aux allures de cowboy.');
        $program->setPoster('https://m.media-amazon.com/images/M/MV5BNmE5MDE0ZmMtY2I5Mi00Y2RjLWJlYjMtODkxODQ5OWY1ODdkXkEyXkFqcGdeQXVyNjU2NjA5NjM@._V1_SY1000_CR0,0,695,1000_AL_.jpg');
        $program->setCategory($this->getReference('CATEGORY_FANTASTIQUE'));
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('Fear The Walking Dead');
        $program->setSummary('La série se déroule au tout début de l épidémie relatée dans la série-mère The Walking Dead et se passe dans la ville de Los Angeles, et non à Atlanta. Madison est conseillère dans un lycée de Los Angeles.');
        $program->setPoster('https://m.media-amazon.com/images/M/MV5BYWNmY2Y1NTgtYTExMS00NGUxLWIxYWQtMjU4MjNkZjZlZjQ3XkEyXkFqcGdeQXVyMzQ2MDI5NjU@._V1_SY1000_CR0,0,666,1000_AL_.jpg');
        $program->setCategory($this->getReference('CATEGORY_HORREUR'));
        $manager->persist($program);

        $manager->flush();
    } 

    public function getDependencies() : array
    {
        return [
            CategoryFixtures::class,
        ];
    }
}

