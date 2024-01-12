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

/*
echo "\n\nTEST-USER";
echo json_encode($testUser);
echo "\n\nTEST-Achievement";
echo json_encode($testAchievement);
echo "\n\nTEST-GETUSERACHIEVEMENTS";
echo UserAchievementController::getUserAchievements('test1');
echo "\n\nTEST-GETALLACHIEVEMENTS";
echo UserAchievementController::getAllAchievements();
echo "\n\nTEST-GETACHIEVEMENT";
echo UserAchievementController::getAchievement(1);
echo "\n\nTEST-CREATEUSER";
UserAchievementController::createUser("PHP-TestUser2");
*/
