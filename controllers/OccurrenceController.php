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

        //$searchModel->protocol = '0';

        return $this->render('search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }   

    // public function actionSearch()
    // {
    //     $searchModel = new OccurrenceSearch();
    //     $dataProvider = $searchModel->searchprotocol(Yii::$app->request->queryParams);
    //     $model = $dataProvider->query->one();

    //     return $this->render('search', [
    //         'searchModel' => $searchModel,
    //         //'dataProvider' => $dataProvider,
    //         'model' => $model,
    //     ]);
    // }        

    // public function actionIndex()
    // {
    //     $searchModel = new OccurrenceSearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //     return $this->render('search', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }   

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionProtocol($id)
    {
        return $this->render('protocol', [
            'model' => $this->findModel($id),
        ]);
    }    

    public function actionCreate()
    {
        $model = new Occurrence();

        $model->status = 0;
        $model->created = date('Y-m-d');
        $model->protocol = date('Y').mt_rand(1500, 8500);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('protocol-success', 'Mensagem gravada com sucesso!</br>Anote o numero do protocolo para consultar o andamento da ocorrencia: <strong>'.$model->protocol.'</strong>');

            // Yii::$app->mailer->compose()
            //     ->setFrom('gugoan@hotmail.com')
            //     ->setTo('gugoan@uol.com.br')
            //     ->setSubject('Message subject')
            //     ->setTextBody('Plain text content')
            //     ->setHtmlBody('<b>HTML content</b>')
            //     ->send();            
            //--
            \Yii::$app->mailer->compose('@app/mail/new')
            ->setFrom('gugoan@uol.com.br')
            ->setTo('gugoan@uol.com.br')
            ->setSubject(Yii::$app->params['appName'].' - Nova Ocorrencia : #'. $model->protocol)
                // ->setTextBody('Nova Ocorrencia registrada')
                // ->setHtmlBody('<b>Nova Ocorrencia registrada</b>')
            ->send();

            return $this->redirect(['protocol', 'id' => $model->id]);

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