<?php
namespace YourITHelp\Component\Membership\Administrator\Controller;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\FormController;

class MembershipController extends FormController
{
    protected $view_list = 'memberships';

    public function save($key = null, $urlVar = null)
    {
        parent::save($key, $urlVar);
        $this->sendEmail();
    }

    protected function sendEmail()
    {
        // Lógica para enviar e-mail ao salvar
        echo 'enviar email';
    }
}