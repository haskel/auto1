<?php

namespace App\Tests;

class VacanciesDataProvider
{

    public static function getShorListItems(): array
    {
        return array(
            1 =>
                array(
                    'id'              => '1',
                    'job title'       => 'Senior PHP Developer',
                    'seniority level' => 'Senior',
                    'country'         => 'DE',
                    'city'            => 'Berlin',
                    'salary'          => '747500',
                    'currency'        => 'SVU',
                    'required skills' =>
                        array(
                            0 => 'PHP',
                            1 => 'Symfony',
                            2 => 'REST',
                            3 => 'Unit-testing',
                            4 => 'Behat',
                            5 => 'SOLID',
                            6 => 'Docker',
                            7 => 'AWS',
                        ),
                    'company size'    => '100-500',
                    'company domain'  => 'Automotive',
                ),
            2 =>
                array(
                    'id'              => '2',
                    'job title'       => 'Middle PHP Developer',
                    'seniority level' => 'Middle',
                    'country'         => 'DE',
                    'city'            => 'Berlin',
                    'salary'          => '632500',
                    'currency'        => 'SVU',
                    'required skills' =>
                        array(
                            0 => 'PHP',
                            1 => 'Symfony',
                            2 => 'Unit-testing',
                            3 => 'SOLID',
                        ),
                    'company size'    => '100-500',
                    'company domain'  => 'Automotive',
                ),
            3 =>
                array(
                    'id'              => '3',
                    'job title'       => 'Junior PHP Developer',
                    'seniority level' => 'Junior',
                    'country'         => 'DE',
                    'city'            => 'Berlin',
                    'salary'          => '517500',
                    'currency'        => 'SVU',
                    'required skills' =>
                        array(
                            0 => 'PHP',
                            1 => 'LAMP',
                            2 => 'HTML',
                            3 => 'CSS',
                            4 => 'SQL',
                        ),
                    'company size'    => '100-500',
                    'company domain'  => 'Automotive',
                ),
            4 =>
                array(
                    'id'              => '4',
                    'job title'       => 'Senior Java Developer',
                    'seniority level' => 'Senior',
                    'country'         => 'DE',
                    'city'            => 'Hamburg',
                    'salary'          => '897000',
                    'currency'        => 'SVU',
                    'required skills' =>
                        array(
                            0 => 'Java',
                            1 => 'Spring',
                            2 => 'REST',
                            3 => 'Microservices',
                            4 => 'Kafka',
                            5 => 'Hibernate',
                        ),
                    'company size'    => '50-100',
                    'company domain'  => 'Real Estate',
                ),
            5 =>
                array(
                    'id'              => '5',
                    'job title'       => 'Senior Fullstack Developer',
                    'seniority level' => 'Senior',
                    'country'         => 'DE',
                    'city'            => 'Berlin',
                    'salary'          => '839500',
                    'currency'        => 'SVU',
                    'required skills' =>
                        array(
                            0 => 'PHP',
                            1 => 'JavaScript',
                            2 => 'CSS/SASS',
                            3 => 'PHPUnit',
                            4 => 'Karma',
                            5 => 'Jenkins',
                        ),
                    'company size'    => '50-100',
                    'company domain'  => 'FinTech',
                )
        );
    }

    public static function getItems()
    {
        return array (
            1 =>
                array (
                    'id' => '1',
                    'job title' => 'Senior PHP Developer',
                    'seniority level' => 'Senior',
                    'country' => 'DE',
                    'city' => 'Berlin',
                    'salary' => '747500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'Symfony',
                            2 => 'REST',
                            3 => 'Unit-testing',
                            4 => 'Behat',
                            5 => 'SOLID',
                            6 => 'Docker',
                            7 => 'AWS',
                        ),
                    'company size' => '100-500',
                    'company domain' => 'Automotive',
                ),
            2 =>
                array (
                    'id' => '2',
                    'job title' => 'Middle PHP Developer',
                    'seniority level' => 'Middle',
                    'country' => 'DE',
                    'city' => 'Berlin',
                    'salary' => '632500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'Symfony',
                            2 => 'Unit-testing',
                            3 => 'SOLID',
                        ),
                    'company size' => '100-500',
                    'company domain' => 'Automotive',
                ),
            3 =>
                array (
                    'id' => '3',
                    'job title' => 'Junior PHP Developer',
                    'seniority level' => 'Junior',
                    'country' => 'DE',
                    'city' => 'Berlin',
                    'salary' => '517500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'LAMP',
                            2 => 'HTML',
                            3 => 'CSS',
                            4 => 'SQL',
                        ),
                    'company size' => '100-500',
                    'company domain' => 'Automotive',
                ),
            4 =>
                array (
                    'id' => '4',
                    'job title' => 'Senior Java Developer',
                    'seniority level' => 'Senior',
                    'country' => 'DE',
                    'city' => 'Hamburg',
                    'salary' => '897000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'Java',
                            1 => 'Spring',
                            2 => 'REST',
                            3 => 'Microservices',
                            4 => 'Kafka',
                            5 => 'Hibernate',
                        ),
                    'company size' => '50-100',
                    'company domain' => 'Real Estate',
                ),
            5 =>
                array (
                    'id' => '5',
                    'job title' => 'Senior Fullstack Developer',
                    'seniority level' => 'Senior',
                    'country' => 'DE',
                    'city' => 'Berlin',
                    'salary' => '839500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'JavaScript',
                            2 => 'CSS/SASS',
                            3 => 'PHPUnit',
                            4 => 'Karma',
                            5 => 'Jenkins',
                        ),
                    'company size' => '50-100',
                    'company domain' => 'FinTech',
                ),
            6 =>
                array (
                    'id' => '6',
                    'job title' => 'Senior Golang Developer',
                    'seniority level' => 'Senior',
                    'country' => 'DE',
                    'city' => 'Hamburg',
                    'salary' => '931500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'GoLang',
                            1 => 'Microservices',
                            2 => 'GoRPC',
                            3 => 'Kafka',
                            4 => 'Jenkins',
                            5 => 'Docker',
                        ),
                    'company size' => '50-100',
                    'company domain' => 'Real Estate',
                ),
            7 =>
                array (
                    'id' => '7',
                    'job title' => 'Middle Fullstack Developer',
                    'seniority level' => 'Middle',
                    'country' => 'DE',
                    'city' => 'Berlin',
                    'salary' => '724500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'JavaScript',
                            2 => 'CSS/SASS',
                            3 => 'Angular',
                        ),
                    'company size' => '50-100',
                    'company domain' => 'FinTech',
                ),
            8 =>
                array (
                    'id' => '8',
                    'job title' => 'Fullstack TeamLead',
                    'seniority level' => 'Tech management',
                    'country' => 'DE',
                    'city' => 'Berlin',
                    'salary' => '920000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'JavaScript',
                            2 => 'SASS/LESS',
                            3 => 'SCRUM',
                            4 => 'ReactJS',
                            5 => 'Redux',
                            6 => 'NPM',
                            7 => 'Yarn',
                        ),
                    'company size' => '50-100',
                    'company domain' => 'FinTech',
                ),
            9 =>
                array (
                    'id' => '9',
                    'job title' => 'Middle JavaScript developer',
                    'seniority level' => 'Middle',
                    'country' => 'DE',
                    'city' => 'Berlin',
                    'salary' => '621000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'JavaScript',
                            1 => 'TypeScript',
                            2 => 'SASS',
                            3 => 'React',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Logistics',
                ),
            10 =>
                array (
                    'id' => '10',
                    'job title' => 'Senior Fullstack Developer',
                    'seniority level' => 'Senior',
                    'country' => 'ES',
                    'city' => 'Barcelona',
                    'salary' => '506000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'Node.js',
                            1 => 'JavaScript',
                            2 => 'CSS/SASS',
                            3 => 'PHPUnit',
                            4 => 'Karma',
                            5 => 'Jenkins',
                        ),
                    'company size' => '1000-5000',
                    'company domain' => 'Mining',
                ),
            11 =>
                array (
                    'id' => '11',
                    'job title' => 'Middle Fullstack Developer',
                    'seniority level' => 'Middle',
                    'country' => 'ES',
                    'city' => 'Barcelona',
                    'salary' => '598000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'Node.js',
                            1 => 'JavaScript',
                            2 => 'CSS/SASS',
                            3 => 'Angular',
                        ),
                    'company size' => '1000-5000',
                    'company domain' => 'Mining',
                ),
            12 =>
                array (
                    'id' => '12',
                    'job title' => 'Senior Java Developer',
                    'seniority level' => 'Senior',
                    'country' => 'ES',
                    'city' => 'Barcelona',
                    'salary' => '644000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'Java',
                            1 => 'JavaEE',
                            2 => 'jBoss',
                            3 => 'REST',
                            4 => 'Microservices',
                            5 => 'RabbitMQ',
                            6 => 'PostgresQL',
                        ),
                    'company size' => '1000-5000',
                    'company domain' => 'Mining',
                ),
            13 =>
                array (
                    'id' => '13',
                    'job title' => 'Middle PHP Developer',
                    'seniority level' => 'Middle',
                    'country' => 'PT',
                    'city' => 'Lisbon',
                    'salary' => '425500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'Falcon',
                            2 => 'Unit-testing',
                            3 => 'SOLID',
                            4 => 'SQL',
                            5 => 'MongoDB',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Communication',
                ),
            14 =>
                array (
                    'id' => '14',
                    'job title' => 'Junior PHP Developer',
                    'seniority level' => 'Junior',
                    'country' => 'PT',
                    'city' => 'Lisbon',
                    'salary' => '322000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'LAMP',
                            2 => 'SQL',
                            3 => 'bash',
                            4 => 'OOP',
                            5 => 'HTML',
                            6 => 'CSS',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Communication',
                ),
            15 =>
                array (
                    'id' => '15',
                    'job title' => 'Senior PHP Developer',
                    'seniority level' => 'Senior',
                    'country' => 'PT',
                    'city' => 'Lisbon',
                    'salary' => '494500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'Falcon',
                            2 => 'REST',
                            3 => 'SQL',
                            4 => 'MongoDB',
                            5 => 'Unit-testing',
                            6 => 'Behat',
                            7 => 'SOLID',
                            8 => 'Docker',
                            9 => 'AWS',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Communication',
                ),
            16 =>
                array (
                    'id' => '16',
                    'job title' => 'PHP Developer',
                    'seniority level' => 'Middle',
                    'country' => 'NL',
                    'city' => 'Amsterdam',
                    'salary' => '782000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'LAMP',
                            2 => 'MySQL',
                            3 => 'PHPUnit',
                            4 => 'OOP',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Automotive',
                ),
            17 =>
                array (
                    'id' => '17',
                    'job title' => 'Frontend Developer',
                    'seniority level' => 'Middle',
                    'country' => 'NL',
                    'city' => 'Amsterdam',
                    'salary' => '747500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'TypeScript',
                            1 => 'JavaScript',
                            2 => 'SASS',
                            3 => 'LESS',
                            4 => 'Karma',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Health',
                ),
            18 =>
                array (
                    'id' => '18',
                    'job title' => 'Node.js Developer',
                    'seniority level' => 'Middle',
                    'country' => 'NL',
                    'city' => 'Amsterdam',
                    'salary' => '690000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'Node.js',
                            1 => 'JavaScript',
                            2 => 'Git',
                            3 => 'Mongo',
                            4 => 'noSQL',
                            5 => 'NPM',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Health',
                ),
            19 =>
                array (
                    'id' => '19',
                    'job title' => 'PHP TeamLead',
                    'seniority level' => 'Tech management',
                    'country' => 'NL',
                    'city' => 'Amsterdam',
                    'salary' => '920000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'LAML',
                            2 => 'SCRUM',
                            3 => 'JIRA',
                            4 => 'Bamboo',
                            5 => 'MVC',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Health',
                ),
            20 =>
                array (
                    'id' => '20',
                    'job title' => 'Frontend TeamLead',
                    'seniority level' => 'Tech management',
                    'country' => 'NL',
                    'city' => 'Rotterdam',
                    'salary' => '977500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'TypeScript',
                            1 => 'JavaScript',
                            2 => 'SASS',
                            3 => 'JIRA',
                            4 => 'Bamboo',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Real Estate',
                ),
            21 =>
                array (
                    'id' => '21',
                    'job title' => 'Node.js TeamLead',
                    'seniority level' => 'Tech management',
                    'country' => 'NL',
                    'city' => 'Rotterdam',
                    'salary' => '897000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'Node.js',
                            1 => 'JavaScript',
                            2 => 'JIRA',
                            3 => 'Bamboo',
                            4 => 'webpack',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Real Estate',
                ),
            22 =>
                array (
                    'id' => '22',
                    'job title' => 'Middle Golang Developer',
                    'seniority level' => 'Middle',
                    'country' => 'BE',
                    'city' => 'Antwerp',
                    'salary' => '770500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'GoLang',
                            1 => 'Microservices',
                            2 => 'GoRPC',
                        ),
                    'company size' => '50-100',
                    'company domain' => 'Automotive',
                ),
            23 =>
                array (
                    'id' => '23',
                    'job title' => 'Senior Golang Developer',
                    'seniority level' => 'Senior',
                    'country' => 'BE',
                    'city' => 'Bruges',
                    'salary' => '1035000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'GoLang',
                            1 => 'Microservices',
                            2 => 'GoRPC',
                            3 => 'Bamboo',
                            4 => 'Docker',
                        ),
                    'company size' => '50-100',
                    'company domain' => 'FinTech',
                ),
            24 =>
                array (
                    'id' => '24',
                    'job title' => 'Middle Java Developer',
                    'seniority level' => 'Middle',
                    'country' => 'BE',
                    'city' => 'Antwerp',
                    'salary' => '920000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'Java',
                            1 => 'Spring',
                            2 => 'Microservices',
                            3 => 'Kinesis',
                            4 => 'Junit',
                            5 => 'SOAP/RPC',
                            6 => 'Hibernate',
                        ),
                    'company size' => '50-100',
                    'company domain' => 'Automotive',
                ),
            25 =>
                array (
                    'id' => '25',
                    'job title' => 'Senior Java Developer',
                    'seniority level' => 'Senior',
                    'country' => 'BE',
                    'city' => 'Bruges',
                    'salary' => '977500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'Java',
                            1 => 'J2SE',
                            2 => 'Spring',
                            3 => 'Microservices',
                            4 => 'Bamboo',
                            5 => 'Docker',
                        ),
                    'company size' => '50-100',
                    'company domain' => 'FinTech',
                ),
            26 =>
                array (
                    'id' => '26',
                    'job title' => 'Middle Fullstack Developer',
                    'seniority level' => 'Middle',
                    'country' => 'IE',
                    'city' => 'Dublin',
                    'salary' => '862500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'JavaScript',
                            2 => 'CSS/SASS',
                            3 => 'SQL',
                            4 => 'AWS',
                            5 => 'Docker',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Logistics',
                ),
            27 =>
                array (
                    'id' => '27',
                    'job title' => 'Fullstack TeamLead',
                    'seniority level' => 'Tech management',
                    'country' => 'IE',
                    'city' => 'Dublin',
                    'salary' => '897000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'JavaScript',
                            2 => 'CSS/SASS',
                            3 => 'JIRA',
                            4 => 'SCRUM',
                            5 => 'AWS',
                            6 => 'SNS/SQS',
                            7 => 'Kinesis',
                            8 => 'NPM',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Logistics',
                ),
        );
    }

    public static function getDifferentSalariesItems(): array
    {
        return array (
            1 =>
                array (
                    'id' => '1',
                    'job title' => 'Senior PHP Developer',
                    'seniority level' => 'Senior',
                    'country' => 'DE',
                    'city' => 'Berlin',
                    'salary' => '747500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'Symfony',
                            2 => 'REST',
                            3 => 'Unit-testing',
                            4 => 'Behat',
                            5 => 'SOLID',
                            6 => 'Docker',
                            7 => 'AWS',
                        ),
                    'company size' => '100-500',
                    'company domain' => 'Automotive',
                ),
            2 =>
                array (
                    'id' => '2',
                    'job title' => 'Middle PHP Developer',
                    'seniority level' => 'Middle',
                    'country' => 'DE',
                    'city' => 'Berlin',
                    'salary' => '632500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'Symfony',
                            2 => 'Unit-testing',
                            3 => 'SOLID',
                        ),
                    'company size' => '100-500',
                    'company domain' => 'Automotive',
                ),
            3 =>
                array (
                    'id' => '3',
                    'job title' => 'Junior PHP Developer',
                    'seniority level' => 'Junior',
                    'country' => 'DE',
                    'city' => 'Berlin',
                    'salary' => '517500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'LAMP',
                            2 => 'HTML',
                            3 => 'CSS',
                            4 => 'SQL',
                        ),
                    'company size' => '100-500',
                    'company domain' => 'Automotive',
                ),
            5 =>
                array (
                    'id' => '5',
                    'job title' => 'Senior Fullstack Developer',
                    'seniority level' => 'Senior',
                    'country' => 'DE',
                    'city' => 'Berlin',
                    'salary' => '839500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'JavaScript',
                            2 => 'CSS/SASS',
                            3 => 'PHPUnit',
                            4 => 'Karma',
                            5 => 'Jenkins',
                        ),
                    'company size' => '50-100',
                    'company domain' => 'FinTech',
                ),
            6 =>
                array (
                    'id' => '6',
                    'job title' => 'Senior Golang Developer',
                    'seniority level' => 'Senior',
                    'country' => 'DE',
                    'city' => 'Hamburg',
                    'salary' => '931500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'GoLang',
                            1 => 'Microservices',
                            2 => 'GoRPC',
                            3 => 'Kafka',
                            4 => 'Jenkins',
                            5 => 'Docker',
                        ),
                    'company size' => '50-100',
                    'company domain' => 'Real Estate',
                ),
            7 =>
                array (
                    'id' => '7',
                    'job title' => 'Middle Fullstack Developer',
                    'seniority level' => 'Middle',
                    'country' => 'DE',
                    'city' => 'Berlin',
                    'salary' => '724500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'JavaScript',
                            2 => 'CSS/SASS',
                            3 => 'Angular',
                        ),
                    'company size' => '50-100',
                    'company domain' => 'FinTech',
                ),
            9 =>
                array (
                    'id' => '9',
                    'job title' => 'Middle JavaScript developer',
                    'seniority level' => 'Middle',
                    'country' => 'DE',
                    'city' => 'Berlin',
                    'salary' => '621000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'JavaScript',
                            1 => 'TypeScript',
                            2 => 'SASS',
                            3 => 'React',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Logistics',
                ),
            10 =>
                array (
                    'id' => '10',
                    'job title' => 'Senior Fullstack Developer',
                    'seniority level' => 'Senior',
                    'country' => 'ES',
                    'city' => 'Barcelona',
                    'salary' => '506000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'Node.js',
                            1 => 'JavaScript',
                            2 => 'CSS/SASS',
                            3 => 'PHPUnit',
                            4 => 'Karma',
                            5 => 'Jenkins',
                        ),
                    'company size' => '1000-5000',
                    'company domain' => 'Mining',
                ),
            11 =>
                array (
                    'id' => '11',
                    'job title' => 'Middle Fullstack Developer',
                    'seniority level' => 'Middle',
                    'country' => 'ES',
                    'city' => 'Barcelona',
                    'salary' => '598000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'Node.js',
                            1 => 'JavaScript',
                            2 => 'CSS/SASS',
                            3 => 'Angular',
                        ),
                    'company size' => '1000-5000',
                    'company domain' => 'Mining',
                ),
            12 =>
                array (
                    'id' => '12',
                    'job title' => 'Senior Java Developer',
                    'seniority level' => 'Senior',
                    'country' => 'ES',
                    'city' => 'Barcelona',
                    'salary' => '644000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'Java',
                            1 => 'JavaEE',
                            2 => 'jBoss',
                            3 => 'REST',
                            4 => 'Microservices',
                            5 => 'RabbitMQ',
                            6 => 'PostgresQL',
                        ),
                    'company size' => '1000-5000',
                    'company domain' => 'Mining',
                ),
            13 =>
                array (
                    'id' => '13',
                    'job title' => 'Middle PHP Developer',
                    'seniority level' => 'Middle',
                    'country' => 'PT',
                    'city' => 'Lisbon',
                    'salary' => '425500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'Falcon',
                            2 => 'Unit-testing',
                            3 => 'SOLID',
                            4 => 'SQL',
                            5 => 'MongoDB',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Communication',
                ),
            14 =>
                array (
                    'id' => '14',
                    'job title' => 'Junior PHP Developer',
                    'seniority level' => 'Junior',
                    'country' => 'PT',
                    'city' => 'Lisbon',
                    'salary' => '322000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'LAMP',
                            2 => 'SQL',
                            3 => 'bash',
                            4 => 'OOP',
                            5 => 'HTML',
                            6 => 'CSS',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Communication',
                ),
            15 =>
                array (
                    'id' => '15',
                    'job title' => 'Senior PHP Developer',
                    'seniority level' => 'Senior',
                    'country' => 'PT',
                    'city' => 'Lisbon',
                    'salary' => '494500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'Falcon',
                            2 => 'REST',
                            3 => 'SQL',
                            4 => 'MongoDB',
                            5 => 'Unit-testing',
                            6 => 'Behat',
                            7 => 'SOLID',
                            8 => 'Docker',
                            9 => 'AWS',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Communication',
                ),
            16 =>
                array (
                    'id' => '16',
                    'job title' => 'PHP Developer',
                    'seniority level' => 'Middle',
                    'country' => 'NL',
                    'city' => 'Amsterdam',
                    'salary' => '782000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'LAMP',
                            2 => 'MySQL',
                            3 => 'PHPUnit',
                            4 => 'OOP',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Automotive',
                ),
            18 =>
                array (
                    'id' => '18',
                    'job title' => 'Node.js Developer',
                    'seniority level' => 'Middle',
                    'country' => 'NL',
                    'city' => 'Amsterdam',
                    'salary' => '690000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'Node.js',
                            1 => 'JavaScript',
                            2 => 'Git',
                            3 => 'Mongo',
                            4 => 'noSQL',
                            5 => 'NPM',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Health',
                ),
            19 =>
                array (
                    'id' => '19',
                    'job title' => 'PHP TeamLead',
                    'seniority level' => 'Tech management',
                    'country' => 'NL',
                    'city' => 'Amsterdam',
                    'salary' => '920000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'LAML',
                            2 => 'SCRUM',
                            3 => 'JIRA',
                            4 => 'Bamboo',
                            5 => 'MVC',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Health',
                ),
            22 =>
                array (
                    'id' => '22',
                    'job title' => 'Middle Golang Developer',
                    'seniority level' => 'Middle',
                    'country' => 'BE',
                    'city' => 'Antwerp',
                    'salary' => '770500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'GoLang',
                            1 => 'Microservices',
                            2 => 'GoRPC',
                        ),
                    'company size' => '50-100',
                    'company domain' => 'Automotive',
                ),
            23 =>
                array (
                    'id' => '23',
                    'job title' => 'Senior Golang Developer',
                    'seniority level' => 'Senior',
                    'country' => 'BE',
                    'city' => 'Bruges',
                    'salary' => '1035000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'GoLang',
                            1 => 'Microservices',
                            2 => 'GoRPC',
                            3 => 'Bamboo',
                            4 => 'Docker',
                        ),
                    'company size' => '50-100',
                    'company domain' => 'FinTech',
                ),
            25 =>
                array (
                    'id' => '25',
                    'job title' => 'Senior Java Developer',
                    'seniority level' => 'Senior',
                    'country' => 'BE',
                    'city' => 'Bruges',
                    'salary' => '977500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'Java',
                            1 => 'J2SE',
                            2 => 'Spring',
                            3 => 'Microservices',
                            4 => 'Bamboo',
                            5 => 'Docker',
                        ),
                    'company size' => '50-100',
                    'company domain' => 'FinTech',
                ),
            26 =>
                array (
                    'id' => '26',
                    'job title' => 'Middle Fullstack Developer',
                    'seniority level' => 'Middle',
                    'country' => 'IE',
                    'city' => 'Dublin',
                    'salary' => '862500',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'JavaScript',
                            2 => 'CSS/SASS',
                            3 => 'SQL',
                            4 => 'AWS',
                            5 => 'Docker',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Logistics',
                ),
            27 =>
                array (
                    'id' => '27',
                    'job title' => 'Fullstack TeamLead',
                    'seniority level' => 'Tech management',
                    'country' => 'IE',
                    'city' => 'Dublin',
                    'salary' => '897000',
                    'currency' => 'SVU',
                    'required skills' =>
                        array (
                            0 => 'PHP',
                            1 => 'JavaScript',
                            2 => 'CSS/SASS',
                            3 => 'JIRA',
                            4 => 'SCRUM',
                            5 => 'AWS',
                            6 => 'SNS/SQS',
                            7 => 'Kinesis',
                            8 => 'NPM',
                        ),
                    'company size' => '10-50',
                    'company domain' => 'Logistics',
                ),
        );
    }
}
