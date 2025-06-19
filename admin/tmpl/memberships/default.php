<?php
\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

?>

<h1>Memberships</h1>
<?php if (!empty($this->items)) : ?>
  <table class="table table-striped">
    <thead>
      <tr>
        <th><?php echo Text::_('Member Name'); ?></th>
        <th><?php echo Text::_('Primary Model'); ?></th>
        <th><?php echo Text::_('Membership Start'); ?></th>
        <th><?php echo Text::_('Actions'); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($this->items as $item) : ?>
        <tr>
          <td><?php echo htmlspecialchars($item->your_name ?? '-'); ?></td>
          <td><?php echo htmlspecialchars($item->primary_model ?? '-'); ?></td>
          <td><?php echo htmlspecialchars($item->membership_start ?? '-'); ?></td>
          <td>
            <a class="btn btn-sm btn-primary" href="<?php echo Route::_('index.php?option=com_membership&task=membership.edit&id=' . (int) $item->id); ?>">
              <?php echo Text::_('EDIT'); ?>
            </a>
            <a class="btn btn-sm btn-danger" href="<?php echo Route::_('index.php?option=com_membership&task=membership.delete&id=' . (int) $item->id . '&' . HTMLHelper::_('form.token')); ?>"
               onclick="return confirm('Are you sure you want to delete this membership?');">
              <?php echo Text::_('DELETE'); ?>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else : ?>
  <p>No memberships found.</p>
<?php endif; ?>