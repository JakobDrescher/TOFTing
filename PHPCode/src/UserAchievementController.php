<?php
declare(strict_types=1);

namespace Jdres\Tofting;

const BASE_PATH = __DIR__ . "/../";
require BASE_PATH . '/vendor/autoload.php';

use Jdres\Tofting\User;
use Jdres\Tofting\Department;
use Jdres\Tofting\Location;
use Jdres\Tofting\Achievement;

//localhost might need to be replaced with another hostname when running on the live server
const DB = new PDO('mysql:host=localhost;dbname=tofting', 'root');
DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

class UserAchievementController
{

}