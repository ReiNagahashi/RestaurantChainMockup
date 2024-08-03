<?php

namespace Helpers;

use Companies\Company;
use Companies\RestaurantChain;
use Companies\RestaurantLocation;
use Faker\Factory;
use Models\Employee;
use Models\User;

class RandomGenerator {

    public static function user(): User {
        $faker = Factory::create();

        return new User(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElement(['admin', 'user', 'editor'])
        );
    }


    public static function users(): array {
        $faker = Factory::create();
        $users = [];
        $numOfUsers = $faker->randomDigit();

        for ($i = 0; $i < $numOfUsers; $i++) {
            $users[] = self::user();
        }

        return $users;
    }

    // Company
    public static function company(): Company {
        $faker = Factory::create();

        return new Company(
            $faker->company,
            $faker->year,
            $faker->catchPhrase,
            $faker->url,
            $faker->phoneNumber,
            $faker->word,
            $faker->name,
            $faker->boolean,
            $faker->country,
            $faker->name,
            $faker->randomNumber()
        );
    }

    public static function companies(): array {
        $faker = Factory::create();
        $companies = [];
        $numOfCompanies = $faker->randomDigit();

        for ($i = 0; $i < $numOfCompanies; $i++) {
            $companies[] = self::company();
        }

        return $companies;
    }

    // Employee

    public static function employee(): Employee {
        $faker = Factory::create();

        return new Employee(
            $faker->jobTitle,
            $faker->randomFloat(2, 30000, 100000),
            $faker->dateTimeThisDecade,
            $faker->words(3)
        );
    }

    public static function employees(): array {
        $faker = Factory::create();
        $employees = [];
        $numOfEmployees = $faker->randomDigit();

        for ($i = 0; $i < $numOfEmployees; $i++) {
            $employees[] = self::employee();
        }

        return $employees;
    }

    // Restaurant Chain
    public static function restaurantChain(): RestaurantChain {
        $faker = Factory::create();

        return new RestaurantChain(
            $faker->randomNumber(),
            $faker->words(5),
            $faker->word,
            $faker->randomDigitNotNull,
            $faker->company
        );
    }

    public static function restaurantChains(): array {
        $faker = Factory::create();
        $restaurantChains = [];
        $numOfChains = $faker->randomDigit();

        for ($i = 0; $i < $numOfChains; $i++) {
            $restaurantChains[] = self::restaurantChain();
        }

        return $restaurantChains;
    }

    // Restaurant Location
    public static function restaurantLocation(): RestaurantLocation {
        $faker = Factory::create();

        return new RestaurantLocation(
            $faker->company,
            $faker->address,
            $faker->city,
            $faker->state,
            $faker->postcode,
            $faker->words(3),
            $faker->boolean,
            $faker->boolean
        );
    }

    public static function restaurantLocations(): array {
        $faker = Factory::create();
        $locations = [];
        $numOfLocations = $faker->randomDigit();

        for ($i = 0; $i < $numOfLocations; $i++) {
            $locations[] = self::restaurantLocation();
        }

        return $locations;
    }

}
?>