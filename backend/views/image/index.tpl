
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
        	</div>
        </div>
      </div>
    </div>
  </div>
</div>

{registerJs}
<!-- inline scripts related to this page -->
{literal}
	var paging = new AjaxPaging({
		auto_first_load: true,
    request_url: '{/literal}{$links.ajax_load}{literal}',
	});
	$('#load_more').on('click', function(){
		paging.load();
	});

  // delete
  new AjaxDeleteAction({control: '.delete', container: '#items', item: '.image-item'});

  // Copy
  $("#items").on('click', 'a.copy', function(e){
    e.preventDefault();
    var _url = $(this).attr('href');
    copyToClipboard(_url);
  });

{/literal}
{/registerJs}