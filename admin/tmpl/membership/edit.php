<?php
\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

HTMLHelper::_('formbehavior.chosen', 'select');
HTMLHelper::_('behavior.formvalidator');
HTMLHelper::_('behavior.keepalive');

?>
<form action="<?php echo Route::_('index.php?option=com_membership&layout=edit&id=' . (int) $this->item->id); ?>"
      method="post" name="adminForm" id="adminForm" class="form-validate">

  <div class="row">
    <div class="col-md-9">
      <h3><?php echo Text::_('Membership Details'); ?></h3>
      <?php echo $this->form->renderFieldset('membership_details'); ?>

      <h3 class="mt-4"><?php echo Text::_('Vehicle Details'); ?></h3>
      <?php echo $this->form->renderFieldset('vehicle_details'); ?>

      <h3 class="mt-4"><?php echo Text::_('Admin Use Only'); ?></h3>
      <?php echo $this->form->renderFieldset('admin'); ?>
    </div>
  </div>

  <input type="hidden" name="jform[id]" value="<?php echo (int) $this->item->id; ?>">
  <input type="hidden" name="task" value="membership.save">
  <?php echo HTMLHelper::_('form.token'); ?>
</form>


<?php
/*  alternativa para ler todos
foreach ($this->form->getFieldsets() as $fieldset) {
    echo '<h3>' . JText::_($fieldset->label) . '</h3>';
    echo $this->form->renderFieldset($fieldset->name);
}
*/
?>