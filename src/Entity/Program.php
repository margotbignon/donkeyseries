<?php

namespace App\Entity;

use App\Repository\ProgramRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\Timestampable;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Metadata as Api;
use Symfony\Component\Serializer\Attribute\Groups as AttributeGroups;

#[ORM\Entity(repositoryClass: ProgramRepository::class)]
#[UniqueEntity('title', message: 'Cette série existe déjà.', errorPath:'title')]
#[Api\ApiResource(
    normalizationContext: [ 'groups' => 'read:programs'],
    operations: [
        new Api\Get(normalizationContext: [ 'groups' => 'read:programs_details'])
    ]
)]
class Program
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('read:programs', 'read:programs_details')]
    private ?int $id = null;

    #[ORM\Column(name: 'title', length: 255, unique: true)]
    #[Assert\NotBlank(message : 'Ce champ ne doit pas être vide')]
    #[Assert\Length(max:"255", maxMessage: "Le champ saisi ne doit pas dépasser 255 caractères.")]
    #[Groups(['read:programs, read:programs_details, read:category_details'])]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message : 'Ce champ ne doit pas être vide')]
    #[Groups('read:programs_details')]
    private ?string $summary = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups('read:programs_details')]
    private ?string $poster = null;

    #[ORM\ManyToOne(inversedBy: 'programs')]
    #[ORM\JoinColumn(nullable: false, onDelete:'CASCADE')]
    #[Groups('read:programs_details')]
    private ?Category $category = null;

    #[ORM\Column]
    #[Groups('read:programs_details')]
    private ?int $year = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\OneToMany(mappedBy: 'program', targetEntity: Season::class, orphanRemoval: true)]
    #[Groups('read:programs_details')]
    private Collection $seasons;

    public function __construct()
    {
        $this->seasons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): static
    {
        $this->summary = $summary;

        return $this;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(?string $poster): static
    {
        $this->poster = $poster;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection<int, Season>
     */
    public function getSeasons(): Collection
    {
        return $this->seasons;
    }

    public function addSeason(Season $season): static
    {
        if (!$this->seasons->contains($season)) {
            $this->seasons->add($season);
            $season->setProgram($this);
        }

        return $this;
    }

    public function removeSeason(Season $season): static
    {
        if ($this->seasons->removeElement($season)) {
            // set the owning side to null (unless already changed)
            if ($season->getProgram() === $this) {
                $season->setProgram(null);
            }
        }

        return $this;
    }
}
