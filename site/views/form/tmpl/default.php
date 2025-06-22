<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Language\Text;

HTMLHelper::_('behavior.formvalidator');
HTMLHelper::_('behavior.keepalive');

?>
<h1>APPLICATION FOR MEMBERSHIP</h1>

<form action="<?php echo Route::_('index.php?option=com_membership&task=form.submit'); ?>" method="post" id="membership-form" class="form-validate">
  <?php echo $this->form->renderFieldset('membership_details'); ?>
  <?php echo $this->form->renderFieldset('vehicle_details'); ?>

  <button type="submit" class="btn btn-primary"><?php echo Text::_('COM_MEMBERSHIP_SUBMIT'); ?></button>
  <?php echo HTMLHelper::_('form.token'); ?>
</form>

<div class="container my-5">
  <div class="card">
    <div class="card-header bg-primary text-white">
      <h5 class="mb-0">Payment & Contact Details</h5>
    </div>
    <div class="card-body">
      <p class="fw-bold">DIRECT DEPOSIT DETAILS | EFTPOS - Available at all Club Meetings & Events | Cash Accepted.</p>
      <div class="row mb-3">
        <div class="col-md-4"><strong>Bank:</strong></div>
        <div class="col-md-8">Westpac Banking Corporation</div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4"><strong>Account Name:</strong></div>
        <div class="col-md-8">American Muscle Car Club Australia</div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4"><strong>BSB:</strong></div>
        <div class="col-md-8">032 379</div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4"><strong>Account Number:</strong></div>
        <div class="col-md-8">257033</div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4"><strong>Postal Address:</strong></div>
        <div class="col-md-8">PO Box 280 Narellan NSW 2567</div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4"><strong>Email:</strong></div>
        <div class="col-md-8"><a href="mailto:amccacommittee@hotmail.com">amccacommittee@hotmail.com</a></div>
      </div>
      <div class="row">
        <div class="col-md-4"><strong>Phone:</strong></div>
        <div class="col-md-8">Peter 0429 444 299</div>
      </div>
    </div>
  </div>
</div>
