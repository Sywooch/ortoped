<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

use backend\models\Doctors;
use backend\models\Clinics;

/**
 * Site controller
 */
class SiteController extends Controller
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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(isset($_GET['id_clinic'])){
            $id = $_GET['id_clinic'];
            Yii::$app->session['id_clinic'] = $id;

        }
        //vd(Yii::$app->session['id_clinic']);
        //vd($session->get('id_clinic'));
        $model = new Doctors();
        $clinicsObj = $model->getClinics(false);
        $clinicArr = [];
        foreach($clinicsObj as $clinic){
            $clinicArr[] = $clinic['click_id'];
        }
        $clinics = Clinics::find()->select(['id','title'])->where(['in', 'id',  $clinicArr])->all();
        return $this->render('index', [
            'clinics' => $clinics,
            'clinicArr' => $clinicArr,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        $session = Yii::$app->session;
        $session->remove('id_clinic');
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
