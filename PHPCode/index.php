<?php
require __DIR__ . '/vendor/autoload.php';

use Jdres\Tofting\User;
use Jdres\Tofting\Department;
use Jdres\Tofting\Location;
use Jdres\Tofting\Achievement;

$testUser = new User("testUser");
$testDepartment = new Department(1, "Informationstechnologie");
$testLocation = new Location("1", "PH (157)", "Physiksaal");
$testAchievement = new Achievement(1, "Wissenschaftler", "achievement_2_TOFTing_Dragan.png", $testDepartment, $testLocation, "Höchst wissenschaftliche Wörter");

echo json_encode($testUser);
echo "\n\n";
echo json_encode($testAchievement);