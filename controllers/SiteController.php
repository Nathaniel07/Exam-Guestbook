<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

use app\models\Event;
use app\models\Register;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
    
    Raw SQL
    
    $id = 101;

    $sql = 'SELECT * FROM ur_tbl t WHERE t.email_id = '. $id;
    $email = Yii::app()->db->createCommand($sql)->queryAll();

    var_dump($email);


     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $data['title'] = 'Guest Book';
        $data['events'] = Event::find()->where(['event_status' => 1])->all();


        $data['register'] = new Register();

        $formData = Yii::$app->request->post();
        if ($data['register']->load($formData)) {
            if ($data['register']->save()) {
                Yii::$app->getSession()->setFlash('message','You have successfully registered to an event.');
                Yii::$app->getSession()->setFlash('class','success');
                return $this->redirect(['index']);
            }

            else {
                Yii::$app->getSession()->setFlash('message','Failed to register.');
                Yii::$app->getSession()->setFlash('class','warning');

            }
        }

        return $this->render('home', $data);
    }

    public function actionCreate()
    {

        $data['title'] = 'Create Event';
        $data['event'] = new Event();

        //$data['datetoday'] = date("Y-m-d");


        $formData = Yii::$app->request->post();
        if ($data['event']->load($formData)) {
            if ($data['event']->save()) {
                Yii::$app->getSession()->setFlash('message','Event successfully saved.');
                Yii::$app->getSession()->setFlash('class','success');
                return $this->redirect(['create']);
            }

            else {
                Yii::$app->getSession()->setFlash('message','Failed to save.');
                Yii::$app->getSession()->setFlash('class','warning');

            }
        }

        return $this->render('create', $data);
    }


     public function actionEvent_list()
    {

        $data['title'] = 'Event List';
        $data['events'] = Event::find()->all();

        return $this->render('event_list', $data);
    }

    public function actionEdit_event($id)
    {

        $data['title'] = 'Edit a Event';
        $data['event'] = Event::findOne($id);


        if($data['event']->load(Yii::$app->request->post()) && $data['event']->save()){
            Yii::$app->getSession()->setFlash('message','Event successfully updated.');
            return $this->redirect(['edit_event', 'id' => $data['event']->event_id]); // or ['event_id']
        }
       

        return $this->render('edit_event', $data);
    }

    public function actionDelete_event($id)
    {

        $data['title'] = 'Delete a Event';
        $data['event'] = Event::findOne($id);


        if ($data['event']->load(Yii::$app->request->post())) {

            $delete = Event::findOne($id)->delete();

            if ($delete) {
                
                Yii::$app->getSession()->setFlash('message', 'Event successfully deleted.');

                return $this->redirect(['event_list']);
            }

          
        }
       

        return $this->render('delete_event', $data);
    }



     public function actionGuest_list()
    {

        $data['title'] = 'Guest List';
        $data['register'] = Register::find()->all(); //->innerjoinwith("event")->all()

        return $this->render('guest_list', $data);
    }


    public function actionEdit_guest($id)
    {

        $data['title'] = 'Edit Guest Information';
        $data['register'] = Register::findOne($id);


        if($data['register']->load(Yii::$app->request->post()) && $data['register']->save()){
            Yii::$app->getSession()->setFlash('message','Guest information successfully updated.');
            return $this->redirect(['edit_guest', 'id' => $data['register']->id]); 
        }
       

        return $this->render('edit_guest', $data);
    }


    public function actionDelete_guest($id)
    {

        $data['title'] = 'Delete a Guest';
        $data['register'] = Register::findOne($id);


        if ($data['register']->load(Yii::$app->request->post())) {

            $delete = Register::findOne($id)->delete();

            if ($delete) {
                
                Yii::$app->getSession()->setFlash('message', 'Guest successfully deleted.');

                return $this->redirect(['guest_list']);
            }

          
        }
       

        return $this->render('delete_guest', $data);
    }



     public function actionReport()
    {

        $data['title'] = 'Reports';
        $data['events'] = Event::find()->all();
        $data['register'] = Register::find()->all();


        return $this->render('report', $data);
    }




    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
