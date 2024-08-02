<?php
namespace Companies;
use Interfaces\FileConvertible;

class RestaurantLocation implements FileConvertible{
    private string $name;
    private string $address;
    private string $city;
    private string $state;
    private string $zipCode;
    private array $employees;
    private bool $isOpen;
    private bool $hasDriveThru;

    public function __construct(
        string $name, string $address, string $city,
        string $state, string $zipCode, array $employees,
        bool $isOpen, bool $hasDriveThru) {
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
        $this->employees = $employees;
        $this->isOpen = $isOpen;
        $this->hasDriveThru = $hasDriveThru;
    }

    public function toString(): string {
        return sprintf(
            "Name: %s\nAddress: %s\nCity: %s\nState: %s\nZIP Code: %s\nEmployees: %s\nOpen: %s\nDrive-Thru: %s\n",
            $this->name,
            $this->address,
            $this->city,
            $this->state,
            $this->zipCode,
            implode(', ', $this->employees),
            $this->isOpen ? 'Yes' : 'No',
            $this->hasDriveThru ? 'Yes' : 'No'
        );
    }

    public function toHTML(): string {
        return sprintf("
            <div class='restaurant-location-card'>
                <h2>%s</h2>
                <p>Address: %s</p>
                <p>City: %s</p>
                <p>State: %s</p>
                <p>ZIP Code: %s</p>
                <p>Employees: %s</p>
                <p>Open: %s</p>
                <p>Drive-Thru: %s</p>
            </div>",
            $this->name,
            $this->address,
            $this->city,
            $this->state,
            $this->zipCode,
            implode(', ', $this->employees),
            $this->isOpen ? 'Yes' : 'No',
            $this->hasDriveThru ? 'Yes' : 'No'
        );
    }

    public function toMarkdown(): string {
        return "## Restaurant Location: {$this->name}
                - Address: {$this->address}
                - City: {$this->city}
                - State: {$this->state}
                - ZIP Code: {$this->zipCode}
                - Employees: " . implode(', ', $this->employees) . "
                - Open: " . ($this->isOpen ? 'Yes' : 'No') . "
                - Drive-Thru: " . ($this->hasDriveThru ? 'Yes' : 'No');
    }

    public function toArray(): array {
        return [
            'name' => $this->name,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zipCode' => $this->zipCode,
            'employees' => $this->employees,
            'isOpen' => $this->isOpen,
            'hasDriveThru' => $this->hasDriveThru,
        ];
    }
}
