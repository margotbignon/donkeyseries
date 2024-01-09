<?php

namespace App\EventSubscriber;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

#[AsEntityListener(Events::prePersist, method:'prePersist', entity: Category::class)]
class CategorySubscriber
{
    public function __construct(
        #[Autowire('/tmp/toto.log')]
        private string $filePath
        )
    {
    }

    public function prePersist(Category $category): void
    {
        $fp = fopen($this->filePath, 'w');
        fputs($fp, "Create category {$category->getName()}/n");
        fclose($fp);
    }

}
