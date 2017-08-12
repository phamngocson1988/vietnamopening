<?php
/* Smarty version 3.1.31, created on 2017-08-10 06:42:15
  from "C:\xampp\htdocs\vietnamopening\backend\views\user\create.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_598be4276f9997_88463664',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7b5bcbe967565d3e86a3f8dce629cf9b44f05a33' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vietnamopening\\backend\\views\\user\\create.tpl',
      1 => 1502211552,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598be4276f9997_88463664 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
    $viewRenderer=$_smarty_tpl->default_template_handler_func[0];
    $viewRenderer->widgets['blocks']['ActiveForm'] = 'yii\widgets\ActiveForm';
    try {
        $_smarty_tpl->registerPlugin('block', 'ActiveForm', [$viewRenderer, '_widget_block__ActiveForm']);
    }
    catch (SmartyException $e) {
        /* Ignore already registered exception during first execution after compilation */
    }
?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Create User</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['ActiveForm'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['ActiveForm'][0][0] : null;
if (!is_callable(array($_block_plugin1, '_widget_block__ActiveForm'))) {
throw new SmartyException('block tag \'ActiveForm\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('ActiveForm', array('assign'=>'form','options'=>array('class'=>'form-horizontal form-label-left'),'id'=>'login-form'));
$_block_repeat=true;
echo $_block_plugin1->_widget_block__ActiveForm(array('assign'=>'form','options'=>array('class'=>'form-horizontal form-label-left'),'id'=>'login-form'), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();
?>

          <div class="form-group">
            <?php echo $_smarty_tpl->tpl_vars['form']->value->field($_smarty_tpl->tpl_vars['model']->value,'username',array('labelOptions'=>array('class'=>'control-label col-md-3 col-sm-3 col-xs-12'),'inputOptions'=>array('class'=>'form-control col-md-7 col-xs-12'),'template'=>'{label}<div class="col-md-6 col-sm-6 col-xs-12">{input}</div>'))->textInput();?>

          </div>

          <div class="form-group">
            <?php echo $_smarty_tpl->tpl_vars['form']->value->field($_smarty_tpl->tpl_vars['model']->value,'email',array('labelOptions'=>array('class'=>'control-label col-md-3 col-sm-3 col-xs-12'),'inputOptions'=>array('class'=>'form-control col-md-7 col-xs-12'),'template'=>'{label}<div class="col-md-6 col-sm-6 col-xs-12">{input}</div>'))->textInput();?>

          </div>

          <div class="form-group">
            <?php echo $_smarty_tpl->tpl_vars['form']->value->field($_smarty_tpl->tpl_vars['model']->value,'password',array('labelOptions'=>array('class'=>'control-label col-md-3 col-sm-3 col-xs-12'),'inputOptions'=>array('class'=>'form-control col-md-7 col-xs-12'),'template'=>'{label}<div class="col-md-6 col-sm-6 col-xs-12">{input}</div>'))->passwordInput();?>

          </div>

          <div class="form-group">
            <?php echo $_smarty_tpl->tpl_vars['form']->value->field($_smarty_tpl->tpl_vars['model']->value,'role',array('labelOptions'=>array('class'=>'control-label col-md-3 col-sm-3 col-xs-12'),'inputOptions'=>array('class'=>'form-control col-md-7 col-xs-12'),'template'=>'{label}<div class="col-md-6 col-sm-6 col-xs-12">{input}</div>'))->dropDownList($_smarty_tpl->tpl_vars['model']->value->getAvailableRoles());?>

          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        <?php $_block_repeat=false;
echo $_block_plugin1->_widget_block__ActiveForm(array('assign'=>'form','options'=>array('class'=>'form-horizontal form-label-left'),'id'=>'login-form'), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

      </div>
    </div>
  </div>
</div><?php }
}
