<?php 
namespace Models;

use DateTime;
use Interfaces\FileConvertible;

class Employee extends User implements FileConvertible{
    private string $jobTitle;
    private float $salary;
    private DateTime $startDate;
    private array $awards;
    
    public function __construct(
        string $jobTitle, float $salary,
        DateTime $startDate, array $awards
        ) {
        $this->jobTitle = $jobTitle;
        $this->salary = $salary;
        $this->startDate = $startDate;
        $this->awards = $awards;
    }

    public function toString(): string {
        return sprintf(
            "Job Title: %s\nSalary: %.2f\nStart Date: %s\nAwards: %s\n",
            $this->jobTitle,
            $this->salary,
            $this->startDate->format('Y-m-d'),
            implode(', ', $this->awards)
        );
    }

    public function toHTML(): string {
        return sprintf("
            <div class='employee-card'>
                <h2>%s</h2>
                <p>Salary: %.2f</p>
                <p>Start Date: %s</p>
                <p>Awards: %s</p>
            </div>",
            $this->jobTitle,
            $this->salary,
            $this->startDate->format('Y-m-d'),
            implode(', ', $this->awards)
        );
    }

    public function toMarkdown(): string {
        return "## Employee: {$this->jobTitle}
                - Salary: {$this->salary}
                - Start Date: {$this->startDate->format('Y-m-d')}
                - Awards: " . implode(', ', $this->awards);
    }

    public function toArray(): array {
        return [
            'jobTitle' => $this->jobTitle,
            'salary' => $this->salary,
            'startDate' => $this->startDate,
            'awards' => $this->awards,
        ];
    }
}