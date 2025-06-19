<?php
namespace YourITHelp\Component\Membership\Administrator\View\Membership;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Factory;
use Joomla\CMS\Toolbar\ToolbarHelper;

class HtmlView extends BaseHtmlView
{
    protected $form;
    protected $item;

    public function display($tpl = null): void
    {
        $this->form = $this->get('Form');
        $this->item = $this->get('Item');

        $this->addToolbar();
        parent::display($tpl);
    }

    protected function prepareDocument(): void
    {
        $this->document->setTitle('Edit Membership');
    }

    protected function addToolbar(): void
    {
        $isNew = ($this->item->id ?? 0) == 0;

        ToolbarHelper::title(
            $isNew ? 'New Membership' : 'Edit Membership',
            'user'
        );

        ToolbarHelper::apply('membership.apply');
        ToolbarHelper::save('membership.save');
        ToolbarHelper::save2new('membership.save2new');
        ToolbarHelper::cancel('membership.cancel', 'JTOOLBAR_CLOSE');
    }
}
