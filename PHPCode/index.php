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

echo "\n\nTEST-USER";
echo json_encode($testUser);
echo "\n\nTEST-Achievement";
echo json_encode($testAchievement);
echo "\n\nTEST-GETUSERACHIEVEMENTS";
echo $controller->getUserAchievements('test1');
echo "\n\nTEST-GETALLACHIEVEMENTS";
echo $controller->getAllAchievements();
echo "\n\nTEST-GETACHIEVEMENT";
echo $controller->getAchievement(1);