<?php

namespace app\controllers;

use Yii;
use app\models\Asignacion1;
use app\models\Asignacion1Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Usuario;

/**
 * Asignacion1Controller implements the CRUD actions for Asignacion1 model.
 */
class Asignacion1Controller extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Asignacion1 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $usuario = Yii::$app->user->id;
        $model = new Usuario();
        $model = $this->findUser($usuario);
        if($model != null){
            if($model->tipo_usuario == 1){
                //admin
            }else if($model->tipo_usuario == 2){
                //catedrático
                return $this->render('../site/not-allow');
            }else if($model->tipo_usuario == 3){
                //tutor
                return $this->render('../site/not-allow');
            }else{
                return $this->render('../site/not-allow');
            }
        }else{
            return $this->render('../site/not-allow');
        }

        $searchModel = new Asignacion1Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Asignacion1 model.
     * @param string $username
     * @param integer $id_curso
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($username, $id_curso)
    {
        $usuario = Yii::$app->user->id;
        $model = new Usuario();
        $model = $this->findUser($usuario);
        if($model != null){
            if($model->tipo_usuario == 1){
                //admin
            }else if($model->tipo_usuario == 2){
                //catedrático
                return $this->render('../site/not-allow');
            }else if($model->tipo_usuario == 3){
                //tutor
                return $this->render('../site/not-allow');
            }else{
                return $this->render('../site/not-allow');
            }
        }else{
            return $this->render('../site/not-allow');
        }

        return $this->render('view', [
            'model' => $this->findModel($username, $id_curso),
        ]);
    }

    /**
     * Creates a new Asignacion1 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $usuario = Yii::$app->user->id;
        $model = new Usuario();
        $model = $this->findUser($usuario);
        if($model != null){
            if($model->tipo_usuario == 1){
                //admin
            }else if($model->tipo_usuario == 2){
                //catedrático
                return $this->render('../site/not-allow');
            }else if($model->tipo_usuario == 3){
                //tutor
                return $this->render('../site/not-allow');
            }else{
                return $this->render('../site/not-allow');
            }
        }else{
            return $this->render('../site/not-allow');
        }

        $model = new Asignacion1();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'username' => $model->username, 'id_curso' => $model->id_curso]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Asignacion1 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $username
     * @param integer $id_curso
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($username, $id_curso)
    {
        $usuario = Yii::$app->user->id;
        $model = new Usuario();
        $model = $this->findUser($usuario);
        if($model != null){
            if($model->tipo_usuario == 1){
                //admin
            }else if($model->tipo_usuario == 2){
                //catedrático
                return $this->render('../site/not-allow');
            }else if($model->tipo_usuario == 3){
                //tutor
                return $this->render('../site/not-allow');
            }else{
                return $this->render('../site/not-allow');
            }
        }else{
            return $this->render('../site/not-allow');
        }

        $model = $this->findModel($username, $id_curso);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'username' => $model->username, 'id_curso' => $model->id_curso]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Asignacion1 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $username
     * @param integer $id_curso
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($username, $id_curso)
    {
        $usuario = Yii::$app->user->id;
        $model = new Usuario();
        $model = $this->findUser($usuario);
        if($model != null){
            if($model->tipo_usuario == 1){
                //admin
            }else if($model->tipo_usuario == 2){
                //catedrático
                return $this->render('../site/not-allow');
            }else if($model->tipo_usuario == 3){
                //tutor
                return $this->render('../site/not-allow');
            }else{
                return $this->render('../site/not-allow');
            }
        }else{
            return $this->render('../site/not-allow');
        }
        
        $this->findModel($username, $id_curso)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Asignacion1 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $username
     * @param integer $id_curso
     * @return Asignacion1 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($username, $id_curso)
    {
        if (($model = Asignacion1::findOne(['username' => $username, 'id_curso' => $id_curso])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findUser($id)
    {

        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        }

        return null;
    }
}
