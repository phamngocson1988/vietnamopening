<?php
namespace backend\controllers;

use Yii;
use common\components\override\Controller;
use yii\filters\AccessControl;
use backend\forms\FetchTransactionForm;
use backend\forms\CreateTransactionForm;
use yii\data\Pagination;

/**
 * TransactionController
 */
class TransactionController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Show the list of posts
     */
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $form = new FetchTransactionForm();
        $models = $form->fetch();
        $total = $form->count();
        $pages = new Pagination(['totalCount' => $total]);
        $offset = $pages->getOffset();
        return $this->render('index.tpl', [
            'models' => $models,
            'pages' => $pages,
            'offset' => $offset
        ]);
    }

    public function actionCreate()
    {
        $model = new CreateTransactionForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $this->redirect(['transaction/index']);
            } else {
                if ($model->hasErrors('password')) {
                    $error = $model->getFirstError('password');
                    Yii::$app->session->setFlash('error', $error);
                    $model->clearErrors('password');
                }
            }
        }

        $this->view->registerJsFile('@web/vendors/devbridge-autocomplete/src/jquery.autocomplete.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

        return $this->render('create.tpl', [
            'model' => $model,
        ]);
    }
}
