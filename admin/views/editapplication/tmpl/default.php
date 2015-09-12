<?php 
/**
 *
 * @version $Id: default.php 2015-09-12  $
 * @author Simon Poghosyan
 * @package Joomla
 * @license GNU/GPL
 *
 *
 */

defined('_JEXEC') or die('Restricted access'); 
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

$row = $this->row;


?>

        <script type="text/javascript">

		function submitbutton(task) {

		Joomla.submitbutton = function(task) {

			var form = document.adminForm;
			if (task == 'cancel') {
				Joomla.submitform( task );
			} 
			else if (form.title.value == "") {
				form.title.style.border = "1px solid red";
				form.title.focus();
				 alert( "<?php echo JText::_('COM_JUMI_NEEDTITLE', true ); ?>" );
			} 
			else if(form.custom_script.value == "" && form.path.value == "") {
                alert( "<?php echo JText::_('COM_JUMI_NEEDSCRIPT', true ); ?>" );
			} 
			else {
				Joomla.submitform( task );
			}
		}
		}
		</script>

        <form action="index.php" method="post" name="adminForm" id="adminForm" class="form-validate" enctype="multipart/form-data">

        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_JUMI_DETAILS'); ?></legend>

            <table class="admintable">
            <tr>
                <td width="200" class="key">
                    <label for="title">
                        <?php echo JText::_( 'COM_JUMI_TITLE' ); ?>:
                    </label>
                </td>
                <td>
                    <input class="inputbox" type="text" name="title" id="title" size="60" value="<?php echo @$row->title; ?>" />
                </td>
            </tr>
            <tr>
                <td width="200" class="key">
                    <label for="alias">
                        <?php echo JText::_( 'Alias' ); ?>:
                    </label>
                </td>
                <td>
                    <input class="inputbox" type="text" name="alias" id="alias" size="60" value="<?php echo @$row->alias; ?>" />
                </td>
            </tr>
            <tr>
                <td class="key">
                    <label for="custom_script">
                        <?php echo JHTML::_('tooltip', JTEXT::_('COM_JUMI_CUSTOMSCRIPT')); ?> <?php echo JText::_( 'COM_JUMI_CUSTOM_SCRIPT' ); ?>:
                    </label>
                </td>
                <td>
                    <p><textarea name="custom_script" id="custom_script" cols="80" rows="10"><?php echo @$row->custom_script; ?></textarea></p>
                </td>
            </tr>
            <tr>
                <td class="key">

                    <label for="path">
                        <?php echo JHTML::_('tooltip', JTEXT::_('COM_JUMI_INCLFILE')); ?> <?php echo JText::_( 'COM_JUMI_PATHNAME' ); ?>:
                    </label>
                </td>
                <td>
                    <input class="inputbox" type="text" name="path" id="path" size="60" value="<?php echo @$row->path; ?>" />
                </td>
            </tr>
            </table>
        </fieldset>

        <div class="clr"></div>

       <input type="hidden" name="task" value="editapplication.edit" /> 
        <input type="hidden" name="option" value="com_jumi" />
        <input type="hidden" name="controller" value="application" />
        <input type="hidden" name="id" value="<?php echo $row->id; ?>" />
        <input type="hidden" name="cid[]" value="<?php echo $row->id; ?>" />
        <input type="hidden" name="textfieldcheck" value="<?php echo @$n; ?>" />
        </form>
<table class="adminlist" style="width: 100%;margin-top: 12px;"><tr>
<td align="center" valign="middle" id="jumi_td" style="">

</td>
</tr></table>
</form>
