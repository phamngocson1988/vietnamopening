<?php
/* Smarty version 3.1.31, created on 2017-08-11 05:52:04
  from "C:\xampp\htdocs\vietnamopening\backend\views\image\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_598d29e4b7e0c7_25077547',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b7839f911ad2719f36e3b284d3d308ad3dcd4734' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vietnamopening\\backend\\views\\image\\index.tpl',
      1 => 1502423521,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598d29e4b7e0c7_25077547 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Media Gallery</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row" id="items">

        </div>

        <div class="row">
        	<div class="col-md-4 col-md-offset-4">
        		<button type="button" class="btn btn-default btn-block" id="load_more">Load More</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>
            <button type="button" class="btn btn-primary" id="manual">Manual</button>
        	</div>
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

<!-- inline scripts related to this page -->

	var paging = new AjaxPaging({
		auto_first_load: true,
    request_url: '<?php echo $_smarty_tpl->tpl_vars['links']->value['ajax_load'];?>
',
	});
	$('#load_more').on('click', function(){
		paging.load();
	});

  // delete
  $('#items').on("click", '.delete', function(event) { 
    event.preventDefault()
    var _i = $(this).closest('.image-item').data('id');
    var _href = $(this).attr('href');
    that = this;
    $.ajax({
      url: _href,
      type: "GET",
      dataType: 'json',
      success: function (result, textStatus, jqXHR) {
          if (result.status == false) {
            alert(result.error);
          } else {
            $(that).closest('.image-item').detach();
          }
          
      },
    });
  });


  // Copy
  $("#items").on('click', 'a.copy', function(e){
    e.preventDefault();
    var _url = $(this).attr('href');
    copyToClipboard(_url);
  });

  








  var model = new ImageManager({
    request_url: '<?php echo $_smarty_tpl->tpl_vars['links']->value['image_popup'];?>
',
  });
  model.load_popup();

  $("#manual").selectImage(model, {});

<?php $_block_repeat=false;
echo $_block_plugin1->blockJavaScript(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);
}
}
