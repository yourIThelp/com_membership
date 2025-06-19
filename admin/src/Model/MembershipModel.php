<?php
namespace YourITHelp\Component\Membership\Administrator\Model;

use Joomla\CMS\MVC\Model\AdminModel;
//extends FormModel não tem crud é para mais simples
class MembershipModel extends AdminModel
{
    public function getForm($data = [], $loadData = true)
    {
        return $this->loadForm(
            'com_membership.membership',
            'membership',
            ['control' => 'jform', 'load_data' => $loadData]
        );
    }

    protected function loadFormData()
    {
        return $this->getItem();
    }
}