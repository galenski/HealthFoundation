<?php

include_once __DIR__ . '/../../vendor/autoload.php';

$foundation = new \Leankoala\HealthFoundation\HealthFoundation();

$numberOfLinesCheck = new \Leankoala\HealthFoundation\Check\Files\Content\NumberOfLinesCheck();
$numberOfLinesCheck->init('composer.lock', 15, \Leankoala\HealthFoundation\Check\Files\Content\NumberOfLinesCheck::RELATION_MIN, ['test', '234']);

$foundation->registerCheck($numberOfLinesCheck, 'test', 'I am the description.');

$runResult = $foundation->runHealthCheck();

$formatter = new \Leankoala\HealthFoundation\Result\Format\Ietf\IetfFormat(
    'Backup file was created successfully.',
    'Seems like the backup script does not create new archives.'
);

$formatter->handle($runResult);