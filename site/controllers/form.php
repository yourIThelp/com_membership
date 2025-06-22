<?php
defined('_JEXEC') or die;

namespace YourITHelp\Component\Membership\Site\Controller;

use Joomla\CMS\MVC\Controller\FormController;
use Joomla\CMS\Factory;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Mail\MailHelper;
use YourITHelp\Component\Membership\Administrator\Controller\MembershipController as AdminController;

class FormController extends FormController
{
    protected $view_list = 'form';

    public function submit()
    {
        $app   = Factory::getApplication();
        $data  = $app->input->post->get('jform', [], 'array');
        $model = $this->getModel('Form');

        // Save record
        if ($model->save($data)) {
            // Prepare email
            $subject = Text::_('COM_MEMBERSHIP_SUBMIT_SUCCESS_SUBJECT');
            $body    = Text::_('COM_MEMBERSHIP_SUBMIT_SUCCESS_BODY') . "\n\n";
            foreach ($data as $k => $v) {
                $body .= ucfirst($k) . ': ' . $v . "\n";
            }

            // To admins and CC to user
            $to = ['halison@halison.net', 'peter@yourithelp.com.au'];
            $cc = [];
            if (!empty($data['email']) && MailHelper::isEmailAddress($data['email'])) {
                $cc[] = $data['email'];
            }

            // Reuse admin controller sendMail()
            AdminController::sendMail($to, $subject, $body, $cc);

            // Success message and redirect
            $app->enqueueMessage(Text::_('COM_MEMBERSHIP_SUBMIT_SUCCESS'), 'message');
            $this->setRedirect(Route::_('index.php?option=com_membership&view=form'));
        } else {
            $app->enqueueMessage(Text::_('COM_MEMBERSHIP_SUBMIT_FAIL'), 'error');
            $this->setRedirect(Route::_('index.php?option=com_membership&view=form'));
        }
    }
}