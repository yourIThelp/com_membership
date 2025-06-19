<?php
namespace YourITHelp\Component\Membership\Administrator\Controller;

use Joomla\CMS\MVC\Controller\FormController;
use Joomla\CMS\Factory;
use Joomla\CMS\Mail\MailHelper;
use Joomla\CMS\Language\Text;

class MembershipController extends FormController
{
    public function add()
    {
        $this->setRedirect('index.php?option=com_membership&view=membership&layout=edit');
    }

    private function sendMail(array $to, string $subject, string $body, array $cc = [])
    {
        $mailer = Factory::getMailer();
        $mailer->addRecipient($to);
        if (!empty($cc)) {
            $mailer->addCc($cc);
        }
        $mailer->setSubject($subject);
        $mailer->setBody($body);
        $mailer->Send();
    }

    public function delete()
    {
        $input = Factory::getApplication()->getInput();
        $id = $input->getInt('id');

        if ($id) {
            $model = $this->getModel();
            $record = $model->getItem($id);
            $email = $record->email ?? '';

            $ids = [$id];
            if ($model->delete($ids)) {
                if (MailHelper::isEmailAddress($email)) {
                    $subject = 'Membership Deletion Notice';
                    $body = "Hello,\n\nYour membership record has been removed from our system.\n\nIf you believe this was an error, please contact us.";
                    $this->sendMail([$email], $subject, $body);
                }

                $this->setRedirect('index.php?option=com_membership&view=memberships', 'Membership deleted successfully.');
                return true;
            }
        }

        $this->setRedirect('index.php?option=com_membership&view=memberships', 'Failed to delete membership.', 'error');
        return false;
    }

    public function save($key = null, $urlVar = null)
    {
        $result = parent::save($key, $urlVar);

        $data = $this->input->post->get('jform', [], 'array');
        $email = $data['email'] ?? '';

        if (!empty($data) && MailHelper::isEmailAddress($email)) {
            $body = "New Membership Submitted:\n";
            foreach ($data as $k => $v) {
                $body .= ucfirst($k) . ': ' . $v . "\n";
            }

            $to = ['halison@halison.net', 'peter@yourithelp.com.au'];
            $cc = [$email];
            $subject = 'New Membership Submission';

            $this->sendMail($to, $subject, $body, $cc);
        }

        return $result;
    }
}