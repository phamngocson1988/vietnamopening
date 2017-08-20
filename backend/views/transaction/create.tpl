{use class='yii\widgets\ActiveForm' type='block'}

{if $app->session->hasFlash('error')}
<div class="alert alert-danger" role="alert">
  {$app->session->getFlash('error')}
</div>
{/if}


<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12">
    {ActiveForm assign='form' options=['class' => 'form-horizontal form-label-left'] id="create-transaction"}
    <div class="x_panel">
      <div class="x_title">
        <h2>User</h2>
        <div class="clearfix"></div>
      </div>
      <div class="form-horizontal form-label-left" id="search-user">
        <div class="x_content">
          <div class="form-group">
            {$form->field($model, 'email', [
              'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
              'inputOptions' => ['class' => 'form-control col-md-7 col-xs-12', 'id' => 'email'],
              'template' => '{label}<div class="col-md-6 col-sm-6 col-xs-12">{input}</div>{error}'
            ])->textInput()}
          </div>

          <div class="form-group">
            {$form->field($model, 'user_id', [
              'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
              'inputOptions' => ['class' => 'form-control col-md-7 col-xs-12', 'id' => 'id', 'readonly' => true],
              'template' => '{label}<div class="col-md-6 col-sm-6 col-xs-12">{input}</div>{error}'
            ])->textInput()}
          </div>

          <div class="form-group">
            {$form->field($model, 'username', [
              'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
              'inputOptions' => ['class' => 'form-control col-md-7 col-xs-12', 'id' => 'username', 'readonly' => true],
              'template' => '{label}<div class="col-md-6 col-sm-6 col-xs-12">{input}</div>{error}'
            ])->textInput()}
          </div>

          <div class="form-group">
            {$form->field($model, 'name', [
              'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
              'inputOptions' => ['class' => 'form-control col-md-7 col-xs-12', 'id' => 'name', 'readonly' => true],
              'template' => '{label}<div class="col-md-6 col-sm-6 col-xs-12">{input}</div>{error}'
            ])->textInput()}
          </div>

          <div class="form-group">
            {$form->field($model, 'phone', [
              'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
              'inputOptions' => ['class' => 'form-control col-md-7 col-xs-12', 'id' => 'phone', 'readonly' => true],
              'template' => '{label}<div class="col-md-6 col-sm-6 col-xs-12">{input}</div>{error}'
            ])->textInput()}
          </div>

          <div class="form-group">
            {$form->field($model, 'address', [
              'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
              'inputOptions' => ['class' => 'form-control col-md-7 col-xs-12', 'id' => 'address', 'readonly' => true],
              'template' => '{label}<div class="col-md-6 col-sm-6 col-xs-12">{input}</div>{error}'
            ])->textInput()}
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="button" id="confirm-user" class="btn btn-success">Confirm User</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="x_panel">
      <div class="x_title">
        <h2>Create</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="form-group">
          {$form->field($model, 'money', [
            'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
            'inputOptions' => ['class' => 'form-control col-md-7 col-xs-12'],
            'template' => '{label}<div class="col-md-6 col-sm-6 col-xs-12">{input}</div>{error}'
          ])->textInput()}
        </div>

        <div class="form-group">
          {$form->field($model, 'coin', [
            'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
            'inputOptions' => ['class' => 'form-control col-md-7 col-xs-12'],
            'template' => '{label}<div class="col-md-6 col-sm-6 col-xs-12">{input}</div>{error}'
          ])->textInput()}
        </div>

        <div class="form-group">
          {$form->field($model, 'promotion', [
            'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
            'inputOptions' => ['class' => 'form-control col-md-7 col-xs-12'],
            'template' => '{label}<div class="col-md-6 col-sm-6 col-xs-12">{input}</div>'
          ])->textInput()}
        </div>

        <div class="form-group">
          {$form->field($model, 'description', [
            'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
            'inputOptions' => ['class' => 'form-control col-md-7 col-xs-12'],
            'template' => '{label}<div class="col-md-6 col-sm-6 col-xs-12">{input}</div>{error}'
          ])->textarea()}
        </div>

        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-password">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">Input your password</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  {$form->field($model, 'password', [
                    'template' => '{input}'
                  ])->passwordInput()}
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">OK</button>
              </div>

            </div>
          </div>
        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-password">Submit</button>
          </div>
        </div>

      
      </div>
    </div>
    {/ActiveForm}
    
  </div>
</div>

{registerJs}
{literal}


$('#email').autocomplete({
  paramName: 'term',
  serviceUrl: '/user/suggestion?field=email',
  onSelect: function (suggestion) {
    $("#id").val(suggestion.id);
    $("#username").val(suggestion.username);
    $("#name").val(suggestion.name);
    $("#phone").val(suggestion.phone);
    $("#address").val(suggestion.address);
  }
});

// Close model
$('#modal-password').on('hide.bs.modal', function() {
    $(this).find('input').val('');
});
{/literal}
{/registerJs}