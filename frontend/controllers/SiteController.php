<?php
namespace frontend\controllers;

use common\models\Categories;
use common\models\Products;
use Yii;
use yii\base\InvalidParamException;
use yii\data\Pagination;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
      $categories = Categories::find()->all();
      $category_id = Yii::$app->request->get('cat');
      if (!isset($category_id)) {
        $category_id = 1;
      }
      $products = Products::find()->where(['category_id'=>$category_id])->orderBy('id');

      $countQuery = clone $products;

      // paginations - 10 items per page
      $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);

      $pages->pageSizeParam = false;

      $products = $products->offset($pages->offset)
        ->limit($pages->limit)
        ->all();

        return $this->render('index', ['products'=>$products, 'categories'=>$categories, 'pages'=>$pages]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
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
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }




  public function actionRmfromcart() {
    $product_id = Yii::$app->request->get('product_id');
    $product = Products::findOne($product_id);
    if (empty($product)) {
      return false;
    }

    $session = Yii::$app->session;
    $session->open();


    if (count($_SESSION['cart'])==0) {
     // unset($_SESSION['cart']['items']);
      var_dump('111');
      unset($_SESSION['cart']);
    }else {
      if (isset($_SESSION['cart'][$product_id])) {

        unset($_SESSION['cart'][$product_id]);
        $_SESSION['cart_items'] = $_SESSION['cart_items'] - 1;
      }

    }

  }



   public function actionAddtocart() {

     $product_id = Yii::$app->request->get('product_id');
     $product = Products::findOne($product_id);
     if (empty($product)) {
       return false;
     }

     $session = Yii::$app->session;
     $session->open();

    $quantity = 1;
    if (isset($_SESSION['cart'][$product_id])) {
      $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    } else {
      $_SESSION['cart'][$product_id] = [
        'quantity' => $quantity,
        'title' => $product->title,
        'price' => $product->price,
        'image' => $product->image,
      ];
      $items = count($_SESSION['cart']);
      $_SESSION['cart_items'] = $items;

    }
  }


/*    public function actionCatajax() {
      if (Yii::$app->request->isAjax) {
        $data = Yii::$app->request->post('category_id');

        }
        $html = '';
        $products = Products::find()->where(['category_id' => $data])->orderBy('id')->all();
        foreach ($products as $product) {
        if(isset($product->image)) {
          $img_url = 'frontend/web/uploads/'.$product->image;
        } else {
          $img_url = '';
        }


          $html .= ' <div class="col-sm-6 col-md-4">';
          $html .= '<div class="products">';
          $html .= ' <div class="product">';
          $html .= '        <div class="product-image">';
          $html .= '<div class="image">';
          $html .= '                   <a href="detail.html">';
          $html .= '<img src="'.$img_url.'" data-echo="'. $img_url.'" alt=""></a>';
          $html .= '</div>';
          $html .= '<div class="tag new"><span>new</span></div>';
          $html .= '</div>';
          $html .= '<div class="product-info text-left">';
          $html .= ' <h3 class="name"><a href="detail.html">'.$product->title.'</a>';
          $html .= ' </h3>';
          $html .= ' <div class="rating rateit-small"></div>';
          $html .= ' <div class="description">';
          $html .= $product->description;
          $html .= ' </div>';

          $html .= '<div class="product-price">';
          $html .= '<span class="price">'.$product->price .' " грн"</span>';

          $html .= '</div>';

          $html .= '</div>';
          $html .= '<div class="cart clearfix animate-effect">';
          $html .= '<div class="action">';

          $html .= '<button class="btn btn-primary" type="button">Купити';
          $html .= '</button>';

          $html .= '</div>';
          $html .= '</div>';
          $html .= '</div>';

          $html .= '</div>';
          $html .= '</div>';
        }
//   var_dump($data);
        return json_encode($html);
      }*/

}
