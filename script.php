<?php
\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Installer\InstallerScript;
use Joomla\CMS\Application\ApplicationHelper;

class com_membershipInstallerScript
{
    public function install($parent)
    {
        $this->createMembershipTable();
        Factory::getApplication()->enqueueMessage('Membership component installed sucesssful.', 'message');
    }

    public function update($parent)
    {
        $this->createMembershipTable();
        Factory::getApplication()->enqueueMessage('Membership component updated sucesssful.', 'message');
    }

    protected function createMembershipTable()
    {
        $db = Factory::getDbo();
        $query = "
            CREATE TABLE IF NOT EXISTS `#__membership_submissions` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `membership_type` VARCHAR(20),
                `your_name` VARCHAR(255),
                `partner_name` VARCHAR(255),
                `address` TEXT,
                `postcode` VARCHAR(20),
                `birth_month` VARCHAR(50),
                `partner_birth_month` VARCHAR(50),
                `mobile` VARCHAR(50),
                `phone` VARCHAR(50),
                `email` VARCHAR(255),
                `primary_year` VARCHAR(10),
                `primary_make` VARCHAR(100),
                `primary_model` VARCHAR(100),
                `primary_style` VARCHAR(100),
                `primary_colour` VARCHAR(100),
                `primary_rego` VARCHAR(100),
                `primary_modifications` TEXT,
                `vehicle_1` TEXT,
                `vehicle_2` TEXT,
                `vehicle_3` TEXT,
                `membership_start` DATE,
                `membership_end` DATE,
                `receipt_number` VARCHAR(100),
                `agree_rules` TINYINT(1),
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
        $db->setQuery($query)->execute();
    }
}