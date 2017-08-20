<?php
/* Smarty version 3.1.31, created on 2017-08-16 09:34:29
  from "C:\xampp\htdocs\vietnamopening\backend\views\image\_item.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5993f585dc3fc1_22777701',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69f50037c65f288fa66ef3684d703b77ebfc6087' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vietnamopening\\backend\\views\\image\\_item.tpl',
      1 => 1502868863,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5993f585dc3fc1_22777701 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-md-55 image-item" data-id="<?php echo $_smarty_tpl->tpl_vars['model']->value->getId();?>
">
  <div class="thumbnail">
    <div class="view view-first">
      <img style="width: 100%; display: block;" src="<?php echo $_smarty_tpl->tpl_vars['model']->value->getUrl('150x150');?>
" alt="image" />
      <div class="mask">
        <div class="tools tools-bottom">
          <a href="<?php echo $_smarty_tpl->tpl_vars['model']->value->getUrl('150x150');?>
" target="_blank" class="copy"><i class="fa fa-files-o"></i></a>
          <a href="<?php echo $_smarty_tpl->tpl_vars['model']->value->getUrl();?>
" target="_blank"><i class="fa fa-link"></i></a>
          <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->functionUrl(array('route'=>'image/ajax-delete','id'=>$_smarty_tpl->tpl_vars['model']->value->getId()),$_smarty_tpl);?>
" class="delete"><i class="fa fa-times"></i></a>
        </div>
      </div>
    </div>
  </div>
</div><?php }
}
