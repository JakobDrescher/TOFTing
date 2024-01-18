<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Cache-Control');
header('Content-Type: text/json');
require_once __DIR__ . '/vendor/autoload.php';

use Jdres\Tofting\UserAchievementController;

$postData = json_decode(file_get_contents('php://input'), true);

if (isset($_GET['guid'])) {
    echo UserAchievementController::getUserAchievements($_GET['guid']);
} elseif (isset($_GET['achievementID'])) {
    echo UserAchievementController::getAchievement($_GET['achievementID']);
} elseif (isset($postData['guid'])) {
    if (isset($postData['achievementID'])) {
        UserAchievementController::giveUserAchievement($postData['guid'], $postData['achievementID']);
    } else {
        UserAchievementController::createUser($postData['guid']);
    }
} else {
    echo UserAchievementController::getAllAchievements();
}
