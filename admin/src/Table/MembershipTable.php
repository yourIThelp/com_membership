<?php
namespace YourITHelp\Component\Membership\Administrator\Table;

use Joomla\CMS\Table\Table;
use Joomla\Database\DatabaseDriver;

defined('_JEXEC') or die;

class MembershipTable extends Table
{
    public function __construct(DatabaseDriver $db)
    {
        parent::__construct('#__membership_submissions', 'id', $db);
    }
}