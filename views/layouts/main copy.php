<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use kartik\icons\Icon;

Icon::map($this);

$user_id=Yii::$app->user->id;
$user_details=\app\models\Users::findone(['id'=>$user_id]);

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title>SHREENATH SUPPLIERS</title>
        <?php $this->head() ?>
    </head>
    <body class="d-flex flex-column h-100">
        <?php $this->beginBody() ?>

        <header>
            <?php
            NavBar::begin([
                'brandLabel' => 'SHREENATH SUPPLIERS',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
                ],
            ]);
            echo Nav::widget([
                'encodeLabels'=>false,
                'options' => ['class' => 'navbar-nav'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    // ['label' => 'About', 'url' => ['/site/about']],
                    ['label' =>Html::tag('span', '').Icon::show('fa fa-envelope').$user_details['username']],
                    Yii::$app->user->isGuest ? (
                            ['label' => 'Login', 'url' => ['/site/login']]
                            ) : (
                            '<li>'
                            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                            . Html::submitButton(
                                Icon::show('fa fa-arrow-circle-right').'Logout',
                                    ['class' => 'btn btn-link logout']
                            )
                            . Html::endForm()
                            . '</li>'
                            )
                ],
            ]);
            NavBar::end();
            ?>
        </header>

        <main role="main" class="flex-shrink-0">
            <div style="margin-top: 60px;">
                <div class="row">
                    <?php if (Yii::$app->user->id) { ?>
                        <div class="col-md-2 col-sm-2">
                            <div class="list-group">
                            <a class="list-group-item d-flex justify-content-between align-items-center" href="index.php?r=saleform/index"><span>Sales Form</span><span class="icon"></span></a>
                            <a class="list-group-item d-flex justify-content-between align-items-center" href="index.php?r=enquiry/follow"><span>Follow Up</span><span class="icon"></span></a>
                                <a class="list-group-item d-flex justify-content-between align-items-center" href="index.php?r=enquiry/index"><span>Enquiry</span><span class="icon"></span></a>
                                <a class="list-group-item d-flex justify-content-between align-items-center" href="index.php?r=emp-details/index"><span>Employee</span><span class="icon"></span></a>
                                <a class="list-group-item d-flex justify-content-between align-items-center" href="index.php?r=brand/index"><span>Brand</span><span class="icon"></span></a>
                                <a class="list-group-item d-flex justify-content-between align-items-center" href="index.php?r=vehicle-models/index"><span>Models</span><span class="icon"></span></a>
                                <a class="list-group-item d-flex justify-content-between align-items-center" href="index.php?r=branch/index"><span>Branch</span><span class="icon"></span></a>
                                <a class="list-group-item d-flex justify-content-between align-items-center" href="index.php?r=color/index"><span>Color</span><span class="icon"></span></a>
                                <a class="list-group-item d-flex justify-content-between align-items-center" href="index.php?r=emp-post"><span>Post</span><span class="icon"></span></a>
                                <a class="list-group-item d-flex justify-content-between align-items-center" href="index.php?r=users"><span>Users</span><span class="icon"></span></a>
                                <a class="list-group-item d-flex justify-content-between align-items-center" href="index.php?r=ward"><span>Ward</span><span class="icon"></span></a>
                            </div>
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="default-view" style="padding-left: 0px;">
                                <?=
                                Breadcrumbs::widget([
                                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                ])
                                ?>
                                <?= Alert::widget() ?>
                                <?= $content ?>
                            </div>
                        </div>
                    <?php } else {
                        ?>
                    <div class="container">
                        <?= Alert::widget() ?>
                        <?= $content ?>
                    </div>
                    <?php }
                    ?>
                </div>
            </div>
        </main>

        <footer class="footer mt-auto py-3 text-muted">
            <div class="container">

                <p class="float-left">&copy; Shreenath Suppliers <?= date('Y') ?></p>
               <!-- <p class="float-right"><?= Yii::powered('Data') ?></p> -->
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
