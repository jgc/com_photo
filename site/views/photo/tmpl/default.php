<?php
/**
 * @version     1.0.0
 * @package     com_photo
 * @copyright   Copyright (C) 2013 FalcoAccipiter. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      FalcoAccipiter <admin@falcoaccipiter.com> - http://www.falcoaccipiter.com
 */
// no direct access
defined('_JEXEC') or die;

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_photo', JPATH_ADMINISTRATOR);
$canEdit = JFactory::getUser()->authorise('core.edit', 'com_photo');
if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_photo')) {
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>
<?php if ($this->item) : ?>

    <div class="item_fields">

        <ul class="fields_list">

            			<li><?php echo JText::_('COM_PHOTO_FORM_LBL_PHOTO_ID'); ?>:
			<?php echo $this->item->id; ?></li>
			<li><?php echo JText::_('COM_PHOTO_FORM_LBL_PHOTO_PHOTO1'); ?>:

			<?php 
				$uploadPath = 'images' . DIRECTORY_SEPARATOR . 'diaryitems' . DIRECTORY_SEPARATOR . $this->item->photo1;
			?>
			<a href="<?php echo JRoute::_(JUri::base() . $uploadPath, false); ?>" target="_blank"><?php echo $this->item->photo1; ?></a></li>			<li><?php echo JText::_('COM_PHOTO_FORM_LBL_PHOTO_CREATED_BY'); ?>:
			<?php echo $this->item->created_by; ?></li>


        </ul>

    </div>
    <?php if($canEdit): ?>
		<a href="<?php echo JRoute::_('index.php?option=com_photo&task=photo.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_PHOTO_EDIT_ITEM"); ?></a>
	<?php endif; ?>
								<?php if(JFactory::getUser()->authorise('core.delete','com_photo')):
								?>
									<a href="javascript:document.getElementById('form-photo-delete-<?php echo $this->item->id ?>').submit()"><?php echo JText::_("COM_PHOTO_DELETE_ITEM"); ?></a>
									<form id="form-photo-delete-<?php echo $this->item->id; ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_photo&task=photo.remove'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
										<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
										<input type="hidden" name="jform[photo1]" value="<?php echo $this->item->photo1; ?>" />
										<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />
										<input type="hidden" name="option" value="com_photo" />
										<input type="hidden" name="task" value="photo.remove" />
										<?php echo JHtml::_('form.token'); ?>
									</form>
								<?php
								endif;
							?>
<?php
else:
    echo JText::_('COM_PHOTO_ITEM_NOT_LOADED');
endif;
?>
