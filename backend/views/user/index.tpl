{use class='yii\widgets\LinkPager'}
{use class='yii\widgets\Pjax' type='block'}

<div class="page-title">
  <div class="title_left">
    <h3>Post Controller <small> Index Action </small></h3>
  </div>
</div>

<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	  <div class="x_panel">
	    <div class="x_title">
	      <h2>Table design <small>Custom design</small></h2>
	      <div class="clearfix"></div>
	    </div>

	    <div class="x_content">

	      <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>
	      {Pjax}
	      <div class="table-responsive">
	        <table class="table table-striped jambo_table bulk_action">
	          <thead>
	            <tr class="headings">
	              <th class="column-title">Username </th>
	              <th class="column-title">Name </th>
	              <th class="column-title">Email </th>
	              <th class="column-title no-link last"><span class="nobr">Action</span></th>
	            </tr>
	          </thead>

	          <tbody>
	          	{foreach $models as $model}
	            <tr class="even pointer">
	              <td class=" ">{$model->getUserName()}</td>
	              <td class=" ">{$model->getName()}</td>
	              <td class=" ">{$model->getEmail()}</td>
	              <td class=" last"><a href='{url route="user/view" id=$model->getId()}' class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a></td>
	            </tr>
	          	{/foreach}
	          </tbody>
	        </table>
	      </div>
	      <nav aria-label="Page navigation" class="pull-right">
		  		{LinkPager::widget(['pagination' => $pages])}
				</nav>
				{/Pjax}
	    </div>
	  </div>
	</div>
</div>