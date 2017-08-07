{use class='yii\helpers\Html'}
{use class='yii\widgets\ActiveForm' type='block'}
<div class="site-signup">
  <h1>Create</h1>

  <p>Please fill out the following fields to signup:</p>

  <div class="row">
    <div class="col-lg-5">
      {ActiveForm assign='form' id='login-form'}
        {$form->field($model, 'username')->textInput(['autofocus' => true])}
        {$form->field($model, 'email')}
        {$form->field($model, 'password')->passwordInput()}

        <div class="form-group">
        {Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'signup-button'])}
        </div>

      {/ActiveForm}
    </div>
  </div>
</div>
