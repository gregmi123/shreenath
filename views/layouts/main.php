<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\Alert;
use kartik\icons\Icon;

Icon::map($this);
AppAsset::register($this);
// Yii::$app->params['bsDependencyEnabled'] = false;
$bundle = yiister\gentelella\assets\Asset::register($this);
$user_id = Yii::$app->user->id;
$member = \app\models\Users::find()->Where(['id'=>$user_id])->one();
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvcIh8RuTGLDaYBpPc4nuuJU7BSVIZXcA"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="nav-<?= !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md' ?>" >
<?php $this->beginBody(); ?>
<style>
    #bibek:hover{
        background-color:gray;
    }
</style>
<?php if(!Yii::$app->user->isGuest){ ?>
<div class="container body">

    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.php?r=site/index" class="site_title"><i class="fa fa-motorcycle "></i> <span style="font-size:15px;">Shreenath Suppliers</span></a>
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <div class="profile">
                    <!-- <div class="profile_pic">
                        <img src="http://placehold.it/128x128" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>John Doe</h2>
                    </div> -->
                </div>
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <?php 
                if($member['type']==3){
                ?>
                    <div class="menu_section">
                        <h3>Dashboard</h3>
                        <?=
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => [
                                    ["label" => "Sales Form", "url" => ["saleform/index"], "icon" => "list-alt"],
                                    ["label" => "Follow Up", "url" => ["enquiry/follow"], "icon" => "bell"],
                                    ["label" => "Enquiry", "url" => ["enquiry/index"], "icon" => "list-alt"],
                                    ["label" => "IN/OUT", "url" => ["activity/index"], "icon" => "bullhorn"],
                                    ["label" => "Employee", "url" => ["emp-details/index"], "icon" => "users"],
                                    [
                                        "label" => "Settings",
                                        "icon" => "th",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => "Interest Rate", "url" => ["interest/index"]],
                                            ["label" => "Color", "url" => ["color/index"]],
                                            ["label" => "Models", "url" => ["vehicle-models/index"]],
                                            ["label" => "Brand", "url" => ["brand/index"]],
                                            ["label" => "Ward", "url" => ["ward/index"]],
                                        ],
                                    ],
                                    // [
                                    //     "label" => "Badges",
                                    //     "url" => "#",
                                    //     "icon" => "table",
                                    //     "items" => [
                                    //         [
                                    //             "label" => "Default",
                                    //             "url" => "#",
                                    //             "badge" => "123",
                                    //         ],
                                    //         [
                                    //             "label" => "Success",
                                    //             "url" => "#",
                                    //             "badge" => "new",
                                    //             "badgeOptions" => ["class" => "label-success"],
                                    //         ],
                                    //         [
                                    //             "label" => "Danger",
                                    //             "url" => "#",
                                    //             "badge" => "!",
                                    //             "badgeOptions" => ["class" => "label-danger"],
                                    //         ],
                                    //     ],
                                    // ],
                                    // [
                                    //     "label" => "Multilevel",
                                    //     "url" => "#",
                                    //     "icon" => "table",
                                    //     "items" => [
                                    //         [
                                    //             "label" => "Second level 1",
                                    //             "url" => "#",
                                    //         ],
                                    //         [
                                    //             "label" => "Second level 2",
                                    //             "url" => "#",
                                    //             "items" => [
                                    //                 [
                                    //                     "label" => "Third level 1",
                                    //                     "url" => "#",
                                    //                 ],
                                    //                 [
                                    //                     "label" => "Third level 2",
                                    //                     "url" => "#",
                                    //                 ],
                                    //             ],
                                    //         ],
                                    //     ],
                                    // ],
                                ],
                            ]
                        )
                        ?>
                    </div>
                    <?php } else if($member['type']==2){ ?>
                        <div class="menu_section">
                        <h3>Dashboard</h3>
                        <?=
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => [
                                    ["label" => "Sales Form", "url" => ["saleform/index"], "icon" => "list-alt"],
                                    ["label" => "Follow Up", "url" => ["enquiry/follow"], "icon" => "bell"],
                                    ["label" => "Enquiry", "url" => ["enquiry/index"], "icon" => "list-alt"],
                                    ["label" => "IN/OUT", "url" => ["activity/index"], "icon" => "bullhorn"],
                                    ["label" => "Employee", "url" => ["emp-details/index"], "icon" => "users"],
                                    [
                                        "label" => "Settings",
                                        "icon" => "th",
                                        "url" => "#",   
                                        "items" => [
                                            ["label" => "Color", "url" => ["color/index"]],
                                            ["label" => "Models", "url" => ["vehicle-models/index"]],
                                            ["label" => "Brand", "url" => ["brand/index"]],
                                            ["label" => "Ward", "url" => ["ward/index"]],
                                            ["label" => "Users", "url" => ["users/index"]],
                                            ["label" => "Branch", "url" => ["branch/index"]],
                                        ],
                                    ],
                                ],
                            ]
                        )
                        ?>
                    </div>
                    <?php } ?>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="" >
                            <!-- <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="http://placehold.it/128x128" alt="">John Doe
                                <span class=" fa fa-angle-down"></span>
                            </a> -->
                            <?php
                            echo Nav::widget([
                                'encodeLabels'=>false,
                                'options' => ['class' => 'navbar-nav','style'=>'flex-direction:row;'],
                                'items' => [
                                    ['label' => 'Home', 'url' => ['/site/index']],
                                    // ['label' => 'About', 'url' => ['/site/about']],
                                    ['label' =>Html::tag('span', '').Icon::show('fa fa-envelope').$member['username']],
                                    Yii::$app->user->isGuest ? (
                                            ['label' => 'Login', 'url' => ['/site/login']]
                                            ) : (
                                            '<li >'
                                            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                                            . Html::submitButton(
                                                Icon::show('fa fa-arrow-circle-right').'Logout',
                                                    ['class' => 'btn btn-link logout','style'=>'margin-top:.8em;',
                                                    'data'=>[
                                                        'confirm'=>'Are you sure want to logout?',
                                                        'method'=>'post',
                                                    ]]
                                            )
                                            . Html::endForm()
                                            . '</li>'
                                            )
                                ],
                            ]);
                            ?>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <!-- <li><a href="javascript:;">  Profile</a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">Help</a>
                                </li>
                                <li><a href="index.php?r=site/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </li> -->
                            </ul>
                        </li>

                        <!-- <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o" style="color:red;"></i>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu"> -->

                            <!-- <php 
                            
                            // $notice=\app\models\Notice::find()->where(['fk_organization'=>$member['fk_organization']])->andWhere(['status'=>1])->orderBy(['id'=>SORT_DESC])->all();
                            // foreach($notice as $text){
                            //     $admin=\app\models\Members::findone(['id'=>$text['fk_admin']]);
                            // ?>
                                <li style="background-color:gray">
                                    <a id="bibek">
                      <span class="image">
                                        <img src=<= $admin['image'] ?> alt="Profile Image" />
                                    </span>
                      <span>
                                        <span style="color:white;"><= $admin['name'] ?></span>
                      <span class="time" style="color:white;"><= $text['created_date'] ?></span>
                      </span>
                      <span class="message" style="color:white;">
                                        < $text['content'] ?>
                                    </span>
                                    </a>
                                </li>
                                <php } ?> -->
                                <!-- <li>
                                    <a>
                      <span class="image">
                                        <img src="http://placehold.it/128x128" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li> -->
                                <!-- <li>
                                    <a>
                      <span class="image">
                                        <img src="http://placehold.it/128x128" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li> -->
                                <!-- <li>
                                    <a>
                      <span class="image">
                                        <img src="http://placehold.it/128x128" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li> -->
                                <!-- <li>
                                    <div class="text-center">
                                        <a href="/">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li> -->
                            <!-- </ul>
                        </li> -->

                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])): ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>
            <div class="container" >
            <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
            </div>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
            <div class="pull-right">
                
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>

</div>
<?php } else if(Yii::$app->user->isGuest){?>
        <!-- top navigation -->
        
        <!-- /top navigation -->
        <div class="top_nav">

<div class="nav_menu">
    <nav class="" role="navigation">

        <ul class="nav navbar-nav navbar-right">
            <li class="">
                <!-- <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="http://placehold.it/128x128" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                </a> -->
                <?php echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    // 'options'=>['style'=>'margin-top:1em;'],
                    'items' => [
                        Yii::$app->user->isGuest ? (
                            ['label' => 'Login', 'url' => ['/site/login']]
                        ) : (
                            '<li>'
                            . Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->username . ')',
                                ['class' => 'btn btn-link logout','style'=>'margin-top:.4em;',
                                'data'=>[
                                    'confirm'=>'Are you sure?',
                                ]
                                ]
                            )
                            . Html::endForm()
                            . '</li>'
                        )
                    ],
                ]); ?>
            </li>

        </ul>
    </nav>
</div>

</div>
        <!-- page content -->
        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])): ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>

            <?= $content ?>
        </div>
        <!-- /page content -->
        <!-- footer content -->

        <!-- /footer content -->

    <?php } ?>
<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<!-- /footer content -->
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>