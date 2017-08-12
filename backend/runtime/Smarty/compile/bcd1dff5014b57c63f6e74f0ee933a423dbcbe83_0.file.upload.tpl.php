<?php
/* Smarty version 3.1.31, created on 2017-08-10 12:18:13
  from "C:\xampp\htdocs\vietnamopening\backend\views\image\upload.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_598c32e59eb708_93670871',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bcd1dff5014b57c63f6e74f0ee933a423dbcbe83' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vietnamopening\\backend\\views\\image\\upload.tpl',
      1 => 1502360287,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598c32e59eb708_93670871 (Smarty_Internal_Template $_smarty_tpl) {
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
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Dropzone multiple file uploader</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <p>Drag multiple files to the box below for multi upload or click to select files. This is for demonstration purposes only, the files are not uploaded to any server.</p>

        <?php ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->functionUrl(array('route'=>"image/ajax-upload"),$_smarty_tpl);
$_prefixVariable1=ob_get_clean();
$_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['ActiveForm'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['ActiveForm'][0][0] : null;
if (!is_callable(array($_block_plugin1, '_widget_block__ActiveForm'))) {
throw new SmartyException('block tag \'ActiveForm\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('ActiveForm', array('assign'=>'form','action'=>$_prefixVariable1,'options'=>array('class'=>'form-horizontal dropzone')));
$_block_repeat=true;
echo $_block_plugin1->_widget_block__ActiveForm(array('assign'=>'form','action'=>$_prefixVariable1,'options'=>array('class'=>'form-horizontal dropzone')), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();
?>

        <input type="hidden" name="name" value="file"/>
        <?php $_block_repeat=false;
echo $_block_plugin1->_widget_block__ActiveForm(array('assign'=>'form','action'=>$_prefixVariable1,'options'=>array('class'=>'form-horizontal dropzone')), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

        <br />
        <br />
        <br />
        <br />
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



<?php $_block_repeat=false;
echo $_block_plugin2->blockJavaScript(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);
}
}
