<?php
namespace YourITHelp\Component\Membership\Administrator\View\Memberships;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;

class HtmlView extends BaseHtmlView
{
    protected $items;

    public function display($tpl = null): void
    {
        $this->items = $this->get('Items');
        $this->addToolbar();
        parent::display($tpl);
    }

    protected function addToolbar(): void
    {
        ToolbarHelper::title('Memberships', 'list');
        ToolbarHelper::addNew('membership.add');
    }
}