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
?>
<script type="text/javascript">
    function deleteItem(item_id){
        if(confirm("<?php echo JText::_('COM_PHOTO_DELETE_MESSAGE'); ?>")){
            document.getElementById('form-photo-delete-' + item_id).submit();
        }
    }
</script>

<div class="items">
    <ul class="items_list">
<?php $show = false; ?>
        <?php foreach ($this->items as $item) : ?>

            
				<?php
						$show = true;
						?>
							<li>
								<a href="<?php echo JRoute::_('index.php?option=com_photo&view=photo&id=' . (int)$item->id); ?>"><?php echo $item->id; ?></a>
								<?php
									if(JFactory::getUser()->authorise('core.delete','com_photo')):
									?>
										<a href="javascript:deleteItem(<?php echo $item->id; ?>);"><?php echo JText::_("COM_PHOTO_DELETE_ITEM"); ?></a>
										<form id="form-photo-delete-<?php echo $item->id; ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_photo&task=photo.remove'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
											<input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>" />
											<input type="hidden" name="jform[photo1]" value="<?php echo $item->photo1; ?>" />
											<input type="hidden" name="jform[created_by]" value="<?php echo $item->created_by; ?>" />
											<input type="hidden" name="option" value="com_photo" />
											<input type="hidden" name="task" value="photo.remove" />
											<?php echo JHtml::_('form.token'); ?>
										</form>
									<?php
									endif;
								?>
							</li>

<?php endforeach; ?>
        <?php
        if (!$show):
            echo JText::_('COM_PHOTO_NO_ITEMS');
        endif;
        ?>
    </ul>
</div>
<?php if ($show): ?>
    <div class="pagination">
        <p class="counter">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </p>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
<?php endif; ?>


									<?php if(JFactory::getUser()->authorise('core.create','com_photo')): ?><a href="<?php echo JRoute::_('index.php?option=com_photo&task=photo.edit&id=0'); ?>"><?php echo JText::_("COM_PHOTO_ADD_ITEM"); ?></a>
	<?php endif; ?>