<?php
/* Smarty version 3.1.31, created on 2017-08-10 17:24:46
  from "C:\xampp\htdocs\vietnamopening\backend\views\image\test.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_598c7abe9d40c1_47395581',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '64e169087b0346acfdf33e274dc4bf3c43ddc79a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vietnamopening\\backend\\views\\image\\test.tpl',
      1 => 1502363625,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598c7abe9d40c1_47395581 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <h4>Text in a modal</h4>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
