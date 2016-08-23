<?php

namespace backend\controllers;

use Yii;
use backend\models\Options;
use backend\models\Clinics;
use backend\models\Orders;
use backend\models\User;
use backend\models\OrdersSearch;
use backend\models\OrdersQuery;
use yii\console\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

use backend\models\UploadFile;
use yii\helpers\BaseFileHelper;
use yii\web\UploadedFile;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
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
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrdersSearch();

        if(Yii::$app->user->identity->role == 4 ) {
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        }else{
            $user_id = Yii::$app->user->id; // показать только свои заказы

            $dataProvider = new ActiveDataProvider([
                'query' => Orders::find()->
                where(['doctor_id'=>$user_id])->
                orderBy('date DESC'),
                /*'pagination' => [
                    'pageSize' => 20,
                    ],*/
                    ]);

            // get posts in the current page
            // $models = $DataProvider->getModels();
            $searchModel = $dataProvider->getModels();

        }
        // get the posts in the current page
        // $posts = $provider->getModels();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }

    /**
     * Displays a single Orders model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            ]);
    }

    /**
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //$model = $this->orderCreate();
        $model = new Orders();

        if (Yii::$app->request->isPost) {
            $model_files = $model->files;
            $model->load(Yii::$app->request->post());
            $files = Yii::$app->request->post('files');
            if( is_null($files) ) $model->files = $model_files;
            if ( $model->save() ){
                $files = new UploadFile();
                if ($files->imageFiles = UploadedFile::getInstances($model, 'files')) {
                    $path = Yii::getAlias("@backend/web/uploads/orders/" . $model->id);
                    if ($files->upload($path)) {
                        $f = [];
                        $i = 0;
                        foreach ($files->imageFiles as $file) {
                            $f[$i]['name'] = $file->name;
                            $f[$i]['size'] = $file->size;
                            $f[$i]['type'] = $file->type;
                            $i++;
                        }
                    }
                }
                return $this->redirect(['update', 'id' => $model->id]);
            }else{
                vd($model->errors);
                echo '<div class="form-group"><a class="btn btn-success" href="/admin">Назад</a></div>';
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->orderCreate($id);

        $cid = $model->clinics_id;
        $clinic = Clinics::find()->where(['id'=>$cid])->all(); // общие опции задаются админом
        if (Yii::$app->request->isPost) {
            return $this->redirect(['update', 'id' => $model->id, 'clinic' => $clinic ]);
        }
        else {
            return $this->render('update', [
                'model' => $model,
                'clinic' => $clinic,
                ]);
        }
    }

    public function orderCreate($id=false)
    {
        if($id) {
            $model = $this->findModel($id);
            // $old_files = ($model->files != '') ? $model->files : ''; // не сохр. из-за пустого массива

            $model->fileList = $this->getFileList($model->id);

        }else{
            $model = new Orders();
            $old_files = '';
        }

        $model_files = $model->files;

        $model->load(Yii::$app->request->post());

        $files = Yii::$app->request->post('files');

       /* print_r($files);
        echo count($files);
         echo  ' ';
        //echo (int) is_null($model->files);
        //echo (int) empty($model->files);
       // echo (int) isset($model->files);

        echo (int) is_null($files);
        echo (int) empty($files);
        echo (int) isset($files);

*/
        if( is_null($files) ) $model->files = $model_files;
        //echo (int)is_null($files);

        //print_r(Yii::$app->request->post('files'));
        /*if(isset()){
            echo '11';
        }else{
            echo 'ddd';
        }*/





        if ( $model->save() ){

            $files = new UploadFile();

            //$model->files = $old_files;

            if ($files->imageFiles = UploadedFile::getInstances($model, 'files')) {

                //echo 'ok';
               // print_r($model);



                $path = Yii::getAlias("@backend/web/uploads/orders/" . $model->id);

                if ($files->upload($path)) {
                    $f = [];
                    $i = 0;
                    foreach ($files->imageFiles as $file) {
                        $f[$i]['name'] = $file->name;
                        $f[$i]['size'] = $file->size;
                        $f[$i]['type'] = $file->type;
                        $i++;
                    }
                    // $model->files = '';// json_encode($f);
                }

            }
            //$model->save();
        }else{
            echo 'err save';

        }



        return $model;

    }

    public function actionApply($id)
    {

        $model = $this->findModel($id);
        $model->order_status = 1; // заказ отправлен админу
        $model->save();

        $alert = new Alerts();
        $alert->text = 'Отправлен заказ';
        $alert->date= time();
        $alert->doctor_id_from = $model->doctor_id;
        $alert->save();

        return $this->redirect(['update','id'=>$id, 'model'=>$model ]);
    }


    public function getFileList($id){

        $path = Yii::getAlias("@backend/web/uploads/orders/" . $id);
        if(is_dir($path)) {
            $dh = opendir($path);
            while (false !== ($filename = readdir($dh))) {
                if ($filename != '.' && $filename != '..') $files[] = $filename;
            }
            return $files;
        }
        return '';

    }


    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionDownload($file) {
        $mimetype='application/octet-stream';
        $id = Yii::$app->request->get('id');
        $filename = Yii::getAlias("@frontend/web/uploads/orders/".$id) . '/' . $file;
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

    public function actionPrint($id) {

        // $user = User::findModel()->where(['id' => 13]);
        $model = $this->findModel($id);

        $this->layout = 'print';
        $this->view->title = Yii::t('app', 'Print order {0}', $model->num);

        return $this->render('print', [
            'model' => $model,
            // 'user'  => $user
            ]);
    }
}
