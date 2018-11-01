<?php

namespace app\controllers;

use Yii;
use app\models\Curso;
use app\models\CursosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CursosController implements the CRUD actions for Curso model.
 */
class CursosController extends Controller
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
     * Lists all Curso models.
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

        $searchModel = new CursoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Curso model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
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
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Curso model.
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

        $model = new Curso();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_curso]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Curso model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
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

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_curso]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Curso model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
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

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Curso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Curso the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Curso::findOne($id)) !== null) {
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
