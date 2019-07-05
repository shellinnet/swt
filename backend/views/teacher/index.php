<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TeacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

$name="SELECT keid,kname FROM kecheng group by keid;";
$kechengname=mysqli_query($conn,$name);


$submit=isset($_POST["submit"])?$_POST["submit"]:'';
$tname=isset($_POST["tname"])?$_POST["tname"]:'';
$password=isset($_POST["password"])?$_POST["password"]:'';
$teacherid=isset($_POST["teacherid"])?$_POST["teacherid"]:'';
$keid=isset($_POST["kname"])?$_POST["kname"]:'';

$kk="select kname from kecheng where keid='".$keid."'";
$kkok=mysqli_query($conn,$kk);
while($kecheng = mysqli_fetch_array($kkok)) {
    $kkname = $kecheng[0];
    $kecheng="insert into kecheng(teacherid,keid,kname) values(".$teacherid.",'".$keid."','".$kkname."'); ";
$kechengok=mysqli_query($conn,$kecheng);

 }


$teacher="insert into teacher(teacherid,tname,password) values(".$teacherid.",'".$tname."','".$password."'); ";
$teacherok=mysqli_query($conn,$teacher);

$this->title = '老师管理';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="teacher-model-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建老师信息', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           

            //'tid',
            'teacherid',
            //'t_weixin',
            //'teacherlei',
            'tname',
            // 't_sex',
            // 't_rzdate',
             't_telephone',
            // 't_cydate',
            // 'kcid',
            // 'zks',
            // 'ysks',
            // 'skrq',
            // 'sdid',
            // 'xyid',
             'kecheng.kname',
             't_beizhu',
            // 'password',
            // 'password_hash',
            // 'created_at',
            // 'update_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
