<?php
/* Smarty version 3.1.31, created on 2017-08-10 09:53:44
  from "C:\xampp\htdocs\vietnamopening\backend\views\category\edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_598c11084fa5f0_79520508',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34b08dd2b3bd7ed2705bb986c664e949a12b8d13' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vietnamopening\\backend\\views\\category\\edit.tpl',
      1 => 1502351487,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598c11084fa5f0_79520508 (Smarty_Internal_Template $_smarty_tpl) {
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
        <h2>Edit Category</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      <?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['ActiveForm'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['ActiveForm'][0][0] : null;
if (!is_callable(array($_block_plugin1, '_widget_block__ActiveForm'))) {
throw new SmartyException('block tag \'ActiveForm\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('ActiveForm', array('assign'=>'form','options'=>array('class'=>'form-horizontal form-label-left')));
$_block_repeat=true;
echo $_block_plugin1->_widget_block__ActiveForm(array('assign'=>'form','options'=>array('class'=>'form-horizontal form-label-left')), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();
?>

        <?php echo $_smarty_tpl->tpl_vars['form']->value->field($_smarty_tpl->tpl_vars['model']->value,'id')->hiddenInput()->label(false);?>

        <div class="form-group">
          <?php echo $_smarty_tpl->tpl_vars['form']->value->field($_smarty_tpl->tpl_vars['model']->value,'name',array('labelOptions'=>array('class'=>'control-label col-md-3 col-sm-3 col-xs-12'),'inputOptions'=>array('class'=>'form-control col-md-7 col-xs-12'),'template'=>'{label}<div class="col-md-6 col-sm-6 col-xs-12">{input}</div>{error}'))->textInput();?>

        </div>

        <div class="form-group">
          <?php echo $_smarty_tpl->tpl_vars['form']->value->field($_smarty_tpl->tpl_vars['model']->value,'slug',array('labelOptions'=>array('class'=>'control-label col-md-3 col-sm-3 col-xs-12'),'inputOptions'=>array('class'=>'form-control col-md-7 col-xs-12'),'template'=>'{label}<div class="col-md-6 col-sm-6 col-xs-12">{input}</div>{error}'))->textInput();?>

        </div>

        <div class="form-group">
          <?php echo $_smarty_tpl->tpl_vars['form']->value->field($_smarty_tpl->tpl_vars['model']->value,'parent_id',array('labelOptions'=>array('class'=>'control-label col-md-3 col-sm-3 col-xs-12'),'inputOptions'=>array('class'=>'form-control col-md-7 col-xs-12'),'template'=>'{label}<div class="col-md-6 col-sm-6 col-xs-12">{input}</div>'))->dropDownList($_smarty_tpl->tpl_vars['model']->value->getAvailableParent(),array('prompt'=>'Choose parent'));?>

        </div>

        <div class="form-group">
          <?php echo $_smarty_tpl->tpl_vars['form']->value->field($_smarty_tpl->tpl_vars['model']->value,'visible',array('template'=>'<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">{input}</div>'))->checkbox(array('class'=>'flat'));?>

        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>

      <?php $_block_repeat=false;
echo $_block_plugin1->_widget_block__ActiveForm(array('assign'=>'form','options'=>array('class'=>'form-horizontal form-label-left')), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

      </div>
    </div>
  </div>
</div>

<?php $_block_plugin2 = isset($_smarty_tpl->smarty->registered_plugins['block']['registerJs'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['registerJs'][0][0] : null;
if (!is_callable(array($_block_plugin2, 'blockJavaScript'))) {
throw new SmartyException('block tag \'registerJs\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('registerJs', array());
$_block_repeat=true;
echo $_block_plugin2->blockJavaScript(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();
?>


$("#createcategoryform-name").on('blur', function() {
  $("#createcategoryform-slug").val(create_slug($(this).val()));
});

<?php $_block_repeat=false;
echo $_block_plugin2->blockJavaScript(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);
}
}
