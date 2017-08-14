<?php
/* Smarty version 3.1.31, created on 2017-08-14 08:27:53
  from "C:\xampp\htdocs\vietnamopening\backend\views\image\popup.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_599142e999ba90_98168238',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f01a153e9e23964690105038d35f93666044ab8e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vietnamopening\\backend\\views\\image\\popup.tpl',
      1 => 1502692071,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_599142e999ba90_98168238 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="image-popup-form">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Gallery</h4>
      </div>
      <div class="modal-body" style="height: 400px; overflow: scroll;">
        <div class="row" id="popup-items">
        </div>
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <button type="button" class="btn btn-default btn-block" id="load_more_popup">Load More</button>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">Size <span class="caret"></span></button>
          <ul role="size" class="dropdown-menu">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['app']->value->params['thumbnails'], 'thumbnail');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['thumbnail']->value) {
?>
            <li><a href="javascript:void(0)" <?php if ($_smarty_tpl->tpl_vars['default_thumbnail']->value == $_smarty_tpl->tpl_vars['thumbnail']->value) {?>class="selected"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value;?>
"><i class="fa fa-check "></i> <span class="search-option"><?php echo $_smarty_tpl->tpl_vars['thumbnail']->value;?>
</span></a></li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

          </ul>
        </div>
        <div class="btn-group">
          <button type="button" class="btn btn-default" function="upload">Upload</button>
          <input type="file" name="popup-upload-image[]" multiple="true" id="popup-upload-image" style="display: none">
        </div>
        <div class="btn-group">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <div class="btn-group">
          <button type="button" class="btn btn-primary" function="ok">Choose</button>
        </div>
      </div>

    </div>
  </div>
</div>

<?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['registerJs'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['registerJs'][0][0] : null;
if (!is_callable(array($_block_plugin1, 'blockJavaScript'))) {
throw new SmartyException('block tag \'registerJs\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('registerJs', array());
$_block_repeat=true;
echo $_block_plugin1->blockJavaScript(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();
?>




<?php $_block_repeat=false;
echo $_block_plugin1->blockJavaScript(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);
}
}
