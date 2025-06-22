<?php
defined('_JEXEC') or die;

namespace YourITHelp\Component\Membership\Site\View\Form;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;

class HtmlView extends BaseHtmlView
{
    protected $form;

    public function display($tpl = null)
    {
        $this->form = $this->get('Form');
        parent::display($tpl);
    }
}