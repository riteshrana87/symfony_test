<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Groups(['product:list', 'product:detail'])]
    private string $title;

    #[ORM\Column(type: 'text')]
    #[Groups(['product:detail'])]
    private string $shortDescription;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    #[Groups(['product:list', 'product:detail'])]
    private float $priceExclVat;

    #[ORM\Column(length: 50)]
    #[Groups(['product:list', 'product:detail'])]
    private ?string $category = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['product:detail'])]
    private ?string $image = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(?string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }

    public function getPriceExclVat(): ?float
    {
        return $this->priceExclVat;
    }

    public function setPriceExclVat(float $priceExclVat): self
    {
        $this->priceExclVat = $priceExclVat;
        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }
}
