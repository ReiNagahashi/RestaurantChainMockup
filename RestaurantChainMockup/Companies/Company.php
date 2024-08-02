<?php
namespace Companies;

use Interfaces\FileConvertible;

class Company implements FileConvertible{
    private string $name;
    private int $foundingYear;
    private string $description;
    private string $website;
    private string $phone;
    private string $industry;
    private string $ceo;
    private bool $isPubliclyTraded;
    private string $country;
    private string $founder;
    private int $totalEmployees;

    public function __construct
    (
        string $name, int $foundingYear,string $description,
        string $website, string $phone, string $industry,
        string $ceo, bool $isPubliclyTraded, string $country,
        string $founder, int $totalEmployees
        ) {
            $this->name = $name;
            $this->foundingYear = $foundingYear;
            $this->description = $description;
            $this->website = $website;
            $this->phone = $phone;
            $this->industry = $industry;
            $this->ceo = $ceo;
            $this->isPubliclyTraded = $isPubliclyTraded;
            $this->country = $country;
            $this->founder = $founder;
            $this->totalEmployees = $totalEmployees;
    }

    public function toString(): string {
        return sprintf(
            "Company: %s\nFounded: %d\nDescription: %s\nWebsite: %s\nPhone: %s\nIndustry: %s\nCEO: %s\nPublicly Traded: %s\nCountry: %s\nFounder: %s\nTotal Employees: %d\n",
            $this->name,
            $this->foundingYear,
            $this->description,
            $this->website,
            $this->phone,
            $this->industry,
            $this->ceo,
            $this->isPubliclyTraded ? 'Yes' : 'No',
            $this->country,
            $this->founder,
            $this->totalEmployees
        );
    }

    public function toHTML(): string {
        return sprintf("
            <div class='company-card'>
                <h2>%s</h2>
                <p>Founded: %d</p>
                <p>%s</p>
                <p><a href='%s'>%s</a></p>
                <p>Phone: %s</p>
                <p>Industry: %s</p>
                <p>CEO: %s</p>
                <p>Publicly Traded: %s</p>
                <p>Country: %s</p>
                <p>Founder: %s</p>
                <p>Total Employees: %d</p>
            </div>",
            $this->name,
            $this->foundingYear,
            $this->description,
            $this->website,
            $this->website,
            $this->phone,
            $this->industry,
            $this->ceo,
            $this->isPubliclyTraded ? 'Yes' : 'No',
            $this->country,
            $this->founder,
            $this->totalEmployees
        );
    }

    public function toMarkdown(): string {
        return "## Company: {$this->name}
                - Founded: {$this->foundingYear}
                - Description: {$this->description}
                - Website: [{$this->website}]({$this->website})
                - Phone: {$this->phone}
                - Industry: {$this->industry}
                - CEO: {$this->ceo}
                - Publicly Traded: " . ($this->isPubliclyTraded ? 'Yes' : 'No') . "
                - Country: {$this->country}
                - Founder: {$this->founder}
                - Total Employees: {$this->totalEmployees}";
    }

    public function toArray(): array {
        return [
            'name' => $this->name,
            'foundingYear' => $this->foundingYear,
            'description' => $this->description,
            'website' => $this->website,
            'phone' => $this->phone,
            'industry' => $this->industry,
            'ceo' => $this->ceo,
            'isPubliclyTraded' => $this->isPubliclyTraded,
            'country' => $this->country,
            'founder' => $this->founder,
            'totalEmployees' => $this->totalEmployees,
        ];
    }
}
