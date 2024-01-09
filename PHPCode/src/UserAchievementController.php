<?php
declare(strict_types=1);

namespace Jdres\Tofting;

require BASE_PATH.'/vendor/autoload.php';

use Jdres\Tofting\User;
use Jdres\Tofting\Department;
use Jdres\Tofting\Location;
use Jdres\Tofting\Achievement;
use PDO;

//localhost might need to be replaced with another hostname when running on the live server
const DB = new PDO('mysql:host=localhost;dbname=tofting', 'root');
DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

class UserAchievementController
{
    public function getUserAchievements(string $guid): string
    {
        $result = array();
        $sql = "SELECT a.pk_achievementID,a.name AS achievementName,d.pk_departmentID,d.name AS departmentName,a.description
                FROM user u 
                    JOIN userpossessesachievement up ON (u.pk_guID = up.pk_fk_guID) 
                    JOIN achievement a ON (up.pk_fk_achievementID = a.pk_achievementID) 
                    LEFT JOIN department d ON (d.pk_departmentID = a.fk_departmentID)  
                WHERE u.pk_guID= :guid;";
        $stmt = DB->prepare($sql);
        $stmt->bindValue(':guid', $guid);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $sql = "SELECT pk_locationID,roomNumber,name
                    FROM achievementatlocation 
                        JOIN location ON (pk_locationID=fk_locationID) 
                    WHERE fk_achievementID = :achievementID";
            $stmt2 = DB->prepare($sql);
            $stmt2->bindValue(':achievementID', $row['pk_achievementID']);
            $stmt2->execute();
            $locations = array();
            while ($row2 = $stmt2->fetch()) {
                $locations[] = new Location($row2['pk_locationID'], $row2['roomNumber'], $row2['name']);
            }
            $result[] = new Achievement($row['pk_achievementID'], $row['achievementName'], "test", new Department($row['pk_departmentID'], $row['departmentName']), $locations, $row['description']);
        }
        return json_encode($result);
    }

    public function getAllAchievements():string{
        $result = array();
        $sql = "SELECT a.pk_achievementID, a.name AS achievementName, d.pk_departmentID, d.name AS departmentName, a.description 
                FROM achievement a 
                    JOIN department d on d.pk_departmentID = a.fk_departmentID;";
        $stmt = DB->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $sql = "SELECT pk_locationID,roomNumber,name
                    FROM achievementatlocation 
                        JOIN location ON (pk_locationID=fk_locationID) 
                    WHERE fk_achievementID = :achievementID";
            $stmt2 = DB->prepare($sql);
            $stmt2->bindValue(':achievementID', $row['pk_achievementID']);
            $stmt2->execute();
            $locations = array();
            while ($row2 = $stmt2->fetch()) {
                $locations[] = new Location($row2['pk_locationID'], $row2['roomNumber'], $row2['name']);
            }
            $result[] = new Achievement($row['pk_achievementID'], $row['achievementName'], "test", new Department($row['pk_departmentID'], $row['departmentName']), $locations, $row['description']);
        }
        return json_encode($result);
    }
}