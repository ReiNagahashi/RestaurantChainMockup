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


    public static function users(int $number): array {
        $users = [];

        for ($i = 0; $i < $number; $i++) {
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

    public static function companies(int $number): array {
        $companies = [];

        for ($i = 0; $i < $number; $i++) {
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

    public static function employees(int $number): array {
        $employees = [];

        for ($i = 0; $i < $number; $i++) {
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

    public static function restaurantChains(int $number): array {
        $restaurantChains = [];

        for ($i = 0; $i < $number; $i++) {
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

    public static function restaurantLocations(int $number): array {
        $locations = [];

        for ($i = 0; $i < $number; $i++) {
            $locations[] = self::restaurantLocation();
        }

        return $locations;
    }

}
?>