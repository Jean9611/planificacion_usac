<?php

namespace app\controllers;

use Yii;
use app\models\Asignacion2;
use app\models\Asignacion2Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Usuario;

/**
 * Asignacion2Controller implements the CRUD actions for Asignacion2 model.
 */
class Asignacion2Controller extends Controller
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
     * Lists all Asignacion2 models.
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
            }else if($model->tipo_usuario == 3){
                //tutor
                return $this->render('../site/not-allow');
            }else{
                return $this->render('../site/not-allow');
            }
        }else{
            return $this->render('../site/not-allow');
        }

        $searchModel = new Asignacion2Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Asignacion2 model.
     * @param string $username
     * @param integer $id_instancia
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($username, $id_instancia)
    {
        $usuario = Yii::$app->user->id;
        $model = new Usuario();
        $model = $this->findUser($usuario);
        if($model != null){
            if($model->tipo_usuario == 1){
                //admin
            }else if($model->tipo_usuario == 2){
                //catedrático
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
            'model' => $this->findModel($username, $id_instancia),
        ]);
    }

    /**
     * Creates a new Asignacion2 model.
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
            }else if($model->tipo_usuario == 3){
                //tutor
                return $this->render('../site/not-allow');
            }else{
                return $this->render('../site/not-allow');
            }
        }else{
            return $this->render('../site/not-allow');
        }

        $model = new Asignacion2();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'username' => $model->username, 'id_instancia' => $model->id_instancia]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Asignacion2 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $username
     * @param integer $id_instancia
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($username, $id_instancia)
    {
        $usuario = Yii::$app->user->id;
        $model = new Usuario();
        $model = $this->findUser($usuario);
        if($model != null){
            if($model->tipo_usuario == 1){
                //admin
            }else if($model->tipo_usuario == 2){
                //catedrático
            }else if($model->tipo_usuario == 3){
                //tutor
                return $this->render('../site/not-allow');
            }else{
                return $this->render('../site/not-allow');
            }
        }else{
            return $this->render('../site/not-allow');
        }

        $model = $this->findModel($username, $id_instancia);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'username' => $model->username, 'id_instancia' => $model->id_instancia]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Asignacion2 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $username
     * @param integer $id_instancia
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($username, $id_instancia)
    {
        $usuario = Yii::$app->user->id;
        $model = new Usuario();
        $model = $this->findUser($usuario);
        if($model != null){
            if($model->tipo_usuario == 1){
                //admin
            }else if($model->tipo_usuario == 2){
                //catedrático
            }else if($model->tipo_usuario == 3){
                //tutor
                return $this->render('../site/not-allow');
            }else{
                return $this->render('../site/not-allow');
            }
        }else{
            return $this->render('../site/not-allow');
        }

        $this->findModel($username, $id_instancia)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Asignacion2 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $username
     * @param integer $id_instancia
     * @return Asignacion2 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($username, $id_instancia)
    {
        if (($model = Asignacion2::findOne(['username' => $username, 'id_instancia' => $id_instancia])) !== null) {
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
