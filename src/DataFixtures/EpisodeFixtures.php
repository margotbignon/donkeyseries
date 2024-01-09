<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $episodes = [
            0 => [
                'title' => 'Passé décomposé',
                'number' => 1,
                'synopsis' => 'Après être sorti du coma, Rick se met à la recherche de sa famille; il réalise rapidement que le monde a été dévasté par les morts-vivants.',
                'season' => 'SEASON_1_PROGRAM_WALKING_DEAD'
            ],
            1 => [
                'title' => 'Tripes',
                'number' => 2,
                'synopsis' => 'Rick parvient à s\'échapper du tank grâce à l\'aide de Glenn, dont il avait entendu la voix à la radio. Rick et Glenn se réunissent avec les compagnons de Glenn',
                'season' => 'SEASON_1_PROGRAM_WALKING_DEAD'
            ],
            2 => [
                'title' => 'Tant qu\'à discuter aves les grenouilles',
                'number' => 3,
                'synopsis' => 'Rick décide de retourner à Atlanta; il doit y récupérer un sac rempli d\'armes à feu et y sauver la vie d\'un homme',
                'season' => 'SEASON_1_PROGRAM_WALKING_DEAD'
            ],
            3 => [
                'title' => 'Ce qui nous attend',
                'number' => 1,
                'synopsis' => 'Les survivants se retrouvent bloqués sur une route envahie par des carcasses de voitures. Ils décident d\'en profiter pour siphonner les réservoirs.',
                'season' => 'SEASON_2_PROGRAM_WALKING_DEAD'
            ],
            4 => [
                'title' => 'Saignée',
                'number' => 2,
                'synopsis' => 'Otis, le chasseur, a indiqué à Rick que les habitants de la ferme pourraient sauver Carl, blessé par balles.',
                'season' => 'SEASON_2_PROGRAM_WALKING_DEAD'
            ],
            5 => [
                'title' => 'Graines',
                'number' => 1,
                'synopsis' => 'Après l\'abandon forcé de la ferme d\'Hershel et l\'accouchement imminent de Lori, Rick et les autres survivants cherchent un nouvel abri.',
                'season' => 'SEASON_3_PROGRAM_WALKING_DEAD'
            ],
            6 => [
                'title' => 'Le fantôme',
                'number' => 1,
                'synopsis' => 'En enquêtant sur une histoire de fantômes pour son prochain roman, Steven, sceptique, reçoit un appel de sa soeur déclenchant une série d\'événements fatidiques.',
                'season' => 'SEASON_1_PROGRAM_THE_HAUNTING_HOUSE'
            ],
            7 => [
                'title' => 'Le cercueil ouvert',
                'number' => 2,
                'synopsis' => 'Une tragédie familiale ravive des souvenirs traumatisants et rappelle à Shirley sa première confrontation avec la mort, réveillant alors de vieilles angoisses qui étaient pourtant enfouies.',
                'season' => 'SEASON_1_PROGRAM_THE_HAUNTING_HOUSE'
            ],
            8 => [
                'title' => 'Un lieu de rêve',
                'number' => 1,
                'synopsis' => 'Une jeune gouvernante américaine arrive dans un vaste manoir anglais pour s\'occuper de deux orphelins. Malgré son enthousiasme, elle ne peut ignorer le malaise ambiant.',
                'season' => 'SEASON_2_PROGRAM_THE_HAUNTING_HOUSE'
            ],
            9 => [
                'title' => 'L\'élève',
                'number' => 2,
                'synopsis' => 'Après une terrible frayeur, Dani essaie de donner une leçon aux enfants. Mais leur attitude déconcertante lui met les nerfs à vif.',
                'season' => 'SEASON_2_PROGRAM_THE_HAUNTING_HOUSE'
            ],
            10 => [
                'title' => 'Comment tout arriva',
                'number' => 1,
                'synopsis' => 'Dani et Miles entrevoient le passé d\'une drôle de façon. L\'histoire tourmentée de Peter Quint et Rebecca Jessel plane toujours sur le manoir.',
                'season' => 'SEASON_3_PROGRAM_THE_HAUNTING_HOUSE'
            ],
            11 => [
                'title' => 'La maison',
                'number' => 1,
                'synopsis' => 'En 1978, les jumeaux Bryan et Troy arrivent et entrent dans un vieux manoir, malgré une jeune Adélaïde les avertissant qu\'ils mourraient. Les garçons la menacent et entrent quand même dans la maison.',
                'season' => 'SEASON_1_PROGRAM_AMERICAN_HORROR_STORY'
            ],
            12 => [
                'title' => 'Bienvenue à Briarcliff',
                'number' => 1,
                'synopsis' => 'En 2012, Teresa et Leo, un couple en lune de miel, explorent le manoir de Briarcliff, un asile psychiatrique abandonné dans le Massachusetts rural. En 1964, Kit Walker s\'y voit interné, accusé d\'être le tueur en série.',
                'season' => 'SEASON_2_PROGRAM_AMERICAN_HORROR_STORY'
            ],
            13 => [
                'title' => 'Les Sorcières de la Nouvelle-Orléans',
                'number' => 1,
                'synopsis' => 'Zoe est bouleversée lorsqu\'elle découvre qu’elle est victime d\'une étrange malédiction génétique qui remonte aux jours les plus sombres de Salem. ',
                'season' => 'SEASON_3_PROGRAM_AMERICAN_HORROR_STORY'
            ],
            14 => [
                'title' => 'L\'avantage de Sonnie',
                'number' => 1,
                'synopsis' => 'Dans l\'univers des combats de bêtes, Sonnie reste imbattable tant qu\'elle garde son mordant. Elle doit cependant participer à un match truqué par de la corruption.',
                'season' => 'SEASON_1_PROGRAM_LOVE_DEATH_ROBOTS'
            ],
            15 => [
                'title' => 'Les Sorcières de la Nouvelle-Orléans',
                'number' => 1,
                'synopsis' => 'Zoe est bouleversée lorsqu\'elle découvre qu’elle est victime d\'une étrange malédiction génétique qui remonte aux jours les plus sombres de Salem. ',
                'season' => 'SEASON_2_PROGRAM_LOVE_DEATH_ROBOTS'
            ],
            16 => [
                'title' => 'Les trois robots',
                'number' => 1,
                'synopsis' => 'Bien après la disparition de l\'espèce humaine, trois robots visitent les vestiges d\'une ville anéantie. Ils discutent du mode de vie de l\'humanité, et rencontrent un chat, qui semble impliqué dans l\'anéantissement de l\'espèce humaine. ',
                'season' => 'SEASON_3_PROGRAM_AMERICAN_HORROR_STORY'
            ],

            
        ];

        foreach ($episodes as $episodeInfos) {

        $episode = new Episode();
        $episode->setTitle($episodeInfos['title']);
        $episode->setNumber($episodeInfos['number']);
        $episode->setSynopsis($episodeInfos['synopsis']);
        $episode->setSeason($this->getReference($episodeInfos['season']));
        $manager->persist($episode);
    }

        $manager->flush();
    }

    public function getDependencies() : array
    {
        return [
            SeasonFixtures::class,
        ];
    }
}
