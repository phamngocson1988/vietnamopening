{use class='yii\widgets\LinkPager'}
{use class='yii\widgets\Pjax' type='block'}

<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Transactions</h2>
        <div class="clearfix"></div>
      </div>

      <div class="x_content">
        {Pjax}
        <div class="table-responsive">
          <table class="table table-striped jambo_table bulk_action">
            <thead>
              <tr class="headings">
                <th class="column-title">Date </th>
                <th class="column-title">Type </th>
                <th class="column-title">Amount </th>
                <th class="column-title">Description </th>
              </tr>
            </thead>

            <tbody>
              {foreach $models as $model}
              <tr class="even pointer">
                <td class=" ">{$model->getTransactionDate(true)}</td>
                <td class=" ">{$model->getTransactionType()}</td>
                <td class=" ">{$model->getAmount()}</td>
                <td class=" ">{$model->description}/td>
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