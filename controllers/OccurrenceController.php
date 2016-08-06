<?php

namespace app\controllers;

use Yii;
use app\models\Occurrence;
use app\models\OccurrenceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\base\Security;

class OccurrenceController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::classname(),
                'only'  => ['index','update'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionSearch()
    {
        $searchModel = new OccurrenceSearch();
        $dataProvider = $searchModel->searchprotocol(Yii::$app->request->queryParams);

        return $this->render('search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }       

    public function actionIndex()
    {
        $searchModel = new OccurrenceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }   

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionProtocol($protocol)
    {
        return $this->render('protocol');
    }    

    public function actionCreate()
    {
        $model = new Occurrence();

        $model->status = 0;
        $model->created = date('Y-m-d');
        $model->protocol = date('Y').mt_rand(1500, 8500);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('protocol-success', 'Mensagem gravada com sucesso!</br>Anote o numero do protocolo para consultar o andamento da ocorrencia: #'.$model->protocol);
            return $this->redirect(['protocol', 'protocol' => $model->protocol]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->updated = date('Y-m-d');
        $model->updated_by = Yii::$app->user->id; 

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Occurrence::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}