<?php
require __DIR__ . '/vendor/autoload.php';

use Jdres\Tofting\User;
use Jdres\Tofting\Department;
use Jdres\Tofting\Location;
use Jdres\Tofting\Achievement;
use Jdres\Tofting\UserAchievementController;

$testUser = new User("testUser");
$testDepartment = new Department(1, "Informationstechnologie");
$testLocations[] = new Location("1", "PH (157)", "Physiksaal");
$testAchievement = new Achievement(1, "Wissenschaftler", "achievement_2_TOFTing_Dragan.png", $testDepartment, $testLocations, "Höchst wissenschaftliche Wörter");
$controller=new UserAchievementController();

echo json_encode($testUser);
echo "\n\n";
echo json_encode($testAchievement);
echo "\n\n";
echo $controller->getUserAchievements('test5');