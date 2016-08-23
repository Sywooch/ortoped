<?php

namespace backend\controllers;

use backend\models\UploadFile;
use Yii;
use backend\models\Plans;
use backend\models\PlansSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PlansController implements the CRUD actions for Plans model.
 */
class PlansController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Plans models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PlansSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Plans model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Plans model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Plans();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $files = new UploadFile();
            $files->imageFiles = UploadedFile::getInstances($model, 'files');
            if ($files->imageFiles) {
                $files->upload(Yii::getAlias("@backend/web/uploads/plans/" . $model->id));
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Plans model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->fileList = $this->getFileList($model->id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $files = new UploadFile();
            $files->imageFiles = UploadedFile::getInstances($model, 'files');
            if ($files->imageFiles) {
                $files->upload(Yii::getAlias("@backend/web/uploads/plans/" . $model->id));
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Plans model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Plans model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Plans the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Plans::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function getFileList($id){
        $files = [];
        $path = Yii::getAlias("@backend/web/uploads/plans/" . $id);
        if(is_dir($path)) {
            $dh = opendir($path);
            while (false !== ($filename = readdir($dh))) {
                if ($filename != '.' && $filename != '..') $files[] = $filename;
            }
            return $files;
        }
        return '';

    }

    public function actionDownload($file) {
        $mimetype='application/octet-stream';
        $id = Yii::$app->request->get('id');
        $filename = Yii::getAlias("@backend/web/uploads/plans/".$id) . '/' . $file;
        if (!file_exists($filename)) return 'Файл не найден';


        header('HTTP/1.1 200 Ok');

        $etag=md5($filename);
        $etag=substr($etag, 0, 8) . '-' . substr($etag, 8, 7) . '-' . substr($etag, 15, 8);
        header('ETag: "' . $etag . '"');

        header('Accept-Ranges: bytes');
        header('Content-Length: ' . (filesize($filename)));

        header('Connection: close');
        header('Content-Type: ' . $mimetype);
        header('Last-Modified: ' . gmdate('r', filemtime($filename)));
        header('Content-Disposition: attachment; filename="' . basename($filename) . '";');
        echo file_get_contents($filename);
        return 0;
    }
}
