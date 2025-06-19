<?php
namespace YourITHelp\Component\Membership\Administrator\Controller;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\FormController;
use Joomla\CMS\Factory;

class MembershipController extends FormController
{
    protected $view_list = 'memberships';

    public function save($key = null, $urlVar = null)
    {
        parent::save($key, $urlVar);
        $this->sendEmail();
    }
    public function delete()
    {
        $input = Factory::getApplication()->getInput();
        $id = $input->getInt('id');

        if ($id) {
            $model = $this->getModel();
            $ids = [$id]; // precisa ser variável para passar por referência
            if ($model->delete($ids)) {
                $this->setRedirect('index.php?option=com_membership&view=memberships', 'Membership deleted successfully.');
                return true;
            }
        }

        $this->setRedirect('index.php?option=com_membership&view=memberships', 'Failed to delete membership.', 'error');
        return false;
    }

    protected function sendEmail()
    {
        // Lógica para enviar e-mail ao salvar
        echo 'enviar email';
    }
}