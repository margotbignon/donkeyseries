<?php

namespace App\Twig\Components;

use App\Repository\ProgramRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class ProgramsSearch
{
    use DefaultActionTrait;

    #[LiveProp(writable:true)]
    public ?string $query = null;


    public function __construct(private ProgramRepository $programRepository)
    {
        
    }



    public function getPrograms()
    {
        
        return $this->programRepository->getListQueryBuilder($this->query)->getQuery()->getResult();

    }
}
