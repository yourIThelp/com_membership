<?php
defined('_JEXEC') or die;

namespace YourITHelp\Component\Membership\Site\Model;

use Joomla\CMS\MVC\Model\FormModel;
use Joomla\CMS\Factory;

class FormModel extends FormModel
{
    public function getForm($data = [], $loadData = true)
    {
        return $this->loadForm(
            'com_membership.form',
            'membership',
            ['control' => 'jform', 'load_data' => $loadData]
        );
    }

    protected function loadFormData()
    {
        return Factory::getApplication()->getUserState(
            'com_membership.form.data',
            []
        );
    }

    public function save($data)
    {
        $table = $this->getTable();
        $table->bind($data);
        $table->check();
        $table->store();

        // Send confirmation emails...
        // Reuse sendMail() from administrator or duplicate logic here

        return true;
    }
}