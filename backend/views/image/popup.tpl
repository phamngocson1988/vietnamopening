<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="image-popup-form">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Gallery</h4>
      </div>
      <div class="modal-body" style="height: 400px; overflow: scroll;">
        {foreach $list as $model}
        <div class="col-md-2 image-item" data-id="{$model->getId()}">
          <div class="thumbnail" style="width: 100%; height: 100%">
            <div class="view view-first">
              <img style="width: 100%; display: block;" src="{$model->getUrl($default_thumbnail)}" alt="image" />
              {foreach $app->params['thumbnails'] as $thumbnail}
              <input type="hidden" name="{$thumbnail}" value="{$model->getUrl($thumbnail)}">
              {/foreach}
            </div>
          </div>
        </div>
        {/foreach}
      </div>
      <div class="modal-footer">
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">Size <span class="caret"></span></button>
          <ul role="menu" class="dropdown-menu">
            {foreach $app->params['thumbnails'] as $thumbnail}
            <li><a href="javascript:void(0)" {if $default_thumbnail eq $thumbnail}class="selected"{/if} value="{$thumbnail}"><i class="fa fa-check "></i> <span class="search-option">{$thumbnail}</span></a></li>
            {/foreach}
          </ul>
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

{registerJs}
{literal}

{/literal}
{/registerJs}