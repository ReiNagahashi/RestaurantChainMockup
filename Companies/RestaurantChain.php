<?php
namespace Companies;

use Companies\Company;
use Interfaces\FileConvertible;

class RestaurantChain extends Company implements FileConvertible{
    private int $chainId;
    private array $restaurantLocations;
    private string $cuisineType;
    private int $numberOfLocations;
    private string $parentCompany;

    public function __construct(
        int $chainId, array $restaurantLocations,
        string $cuisineType, int $numberOfLocations,
        string $parentCompany
        ) {
        $this-> chainId = $chainId;
        $this-> restaurantLocations = $restaurantLocations ;
        $this-> cuisineType= $cuisineType ;
        $this-> numberOfLocations = $numberOfLocations ;
        $this-> parentCompany = $parentCompany ;
    }


    public function toString(): string {
        return sprintf(
            "Chain ID: %d\nCuisine Type: %s\nNumber of Locations: %d\nParent Company: %s\nLocations: %s\n",
            $this->chainId,
            $this->cuisineType,
            $this->numberOfLocations,
            $this->parentCompany,
            implode(', ', $this->restaurantLocations)
        );
    }

    public function toHTML(): string {
        return sprintf("
            <div class='restaurant-chain-card'>
                <h2>%s</h2>
                <p>Chain ID: %d</p>
                <p>Cuisine Type: %s</p>
                <p>Number of Locations: %d</p>
                <p>Parent Company: %s</p>
                <p>Locations: %s</p>
            </div>",
            $this->parentCompany,
            $this->chainId,
            $this->cuisineType,
            $this->numberOfLocations,
            $this->parentCompany,
            implode(', ', $this->restaurantLocations)
        );
    }

    public function toMarkdown(): string {
        return "## Restaurant Chain: {$this->parentCompany}
                - Chain ID: {$this->chainId}
                - Cuisine Type: {$this->cuisineType}
                - Number of Locations: {$this->numberOfLocations}
                - Parent Company: {$this->parentCompany}
                - Locations: " . implode(', ', $this->restaurantLocations);
    }

    public function toArray(): array {
        return [
            'chainId' => $this->chainId,
            'restaurantLocations' => $this->restaurantLocations,
            'cuisineType' => $this->cuisineType,
            'numberOfLocations' => $this->numberOfLocations,
            'parentCompany' => $this->parentCompany,
        ];
    }

}
