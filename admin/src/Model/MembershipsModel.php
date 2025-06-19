<?php
namespace YourITHelp\Component\Membership\Administrator\Model;

use Joomla\CMS\MVC\Model\ListModel;
use Joomla\Database\DatabaseDriver;

class MembershipsModel extends ListModel
{
    protected function getListQuery()
    {
        $db = $this->getDatabase();
        $query = $db->getQuery(true);

        $query
            ->select('*')
            ->from($db->quoteName('#__membership_submissions'));

        return $query;
    }
}