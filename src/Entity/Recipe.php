<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecipeRepository::class)
 */
class Recipe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $listIngredients;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPeople;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tips;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $principalIngredient;

    /**
     * @ORM\ManyToOne(targetEntity=CookingTime::class, inversedBy="recipes")
     */
    private $cookingTime;

    /**
     * @ORM\ManyToOne(targetEntity=Difficulty::class, inversedBy="recipes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $difficulty;

    /**
     * @ORM\ManyToOne(targetEntity=Cost::class, inversedBy="recipes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cost;

    /**
     * @ORM\ManyToOne(targetEntity=TypeRecipe::class, inversedBy="recipes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeRecipe;

    /**
     * @ORM\ManyToMany(targetEntity=Particularity::class, inversedBy="recipes")
     */
    private $particularity;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="recipes")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="recipe")
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity=RecipeLike::class, mappedBy="recipe")
     */
    private $recipeLikes;

    public function __construct()
    {
        $this->particularity = new ArrayCollection();
        $this->category = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->recipeLikes = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getListIngredients(): ?string
    {
        return $this->listIngredients;
    }

    public function setListIngredients(string $listIngredients): self
    {
        $this->listIngredients = $listIngredients;

        return $this;
    }

    public function getNbPeople(): ?int
    {
        return $this->nbPeople;
    }

    public function setNbPeople(int $nbPeople): self
    {
        $this->nbPeople = $nbPeople;

        return $this;
    }

    public function getTips(): ?string
    {
        return $this->tips;
    }

    public function setTips(?string $tips): self
    {
        $this->tips = $tips;

        return $this;
    }

    public function getPrincipalIngredient(): ?string
    {
        return $this->principalIngredient;
    }

    public function setPrincipalIngredient(string $principalIngredient): self
    {
        $this->principalIngredient = $principalIngredient;

        return $this;
    }

    public function getCookingTime(): ?CookingTime
    {
        return $this->cookingTime;
    }

    public function setCookingTime(?CookingTime $cookingTime): self
    {
        $this->cookingTime = $cookingTime;

        return $this;
    }

    public function getDifficulty(): ?Difficulty
    {
        return $this->difficulty;
    }

    public function setDifficulty(?Difficulty $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getCost(): ?Cost
    {
        return $this->cost;
    }

    public function setCost(?Cost $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getTypeRecipe(): ?TypeRecipe
    {
        return $this->typeRecipe;
    }

    public function setTypeRecipe(?TypeRecipe $typeRecipe): self
    {
        $this->typeRecipe = $typeRecipe;

        return $this;
    }

    /**
     * @return Collection|Particularity[]
     */
    public function getParticularity(): Collection
    {
        return $this->particularity;
    }

    public function addParticularity(Particularity $particularity): self
    {
        if (!$this->particularity->contains($particularity)) {
            $this->particularity[] = $particularity;
        }

        return $this;
    }

    public function removeParticularity(Particularity $particularity): self
    {
        $this->particularity->removeElement($particularity);

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->category->removeElement($category);

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setRecipe($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getRecipe() === $this) {
                $image->setRecipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RecipeLike[]
     */
    public function getRecipeLikes(): Collection
    {
        return $this->recipeLikes;
    }

    public function addRecipeLike(RecipeLike $recipeLike): self
    {
        if (!$this->recipeLikes->contains($recipeLike)) {
            $this->recipeLikes[] = $recipeLike;
            $recipeLike->setRecipe($this);
        }

        return $this;
    }

    public function removeRecipeLike(RecipeLike $recipeLike): self
    {
        if ($this->recipeLikes->removeElement($recipeLike)) {
            // set the owning side to null (unless already changed)
            if ($recipeLike->getRecipe() === $this) {
                $recipeLike->setRecipe(null);
            }
        }

        return $this;
    }
}
