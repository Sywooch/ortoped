 <?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\models\UploadFile;
use yii\helpers\ArrayHelper;
// use backend\models\Options;

/* @var $this yii\web\View */
/* @var $model backend\models\Orders */
/* @var $form yii\widgets\ActiveForm */

/* role
    0 - зубной техник
    1 - врач
    2 - мед. директор
    3 - бухгалтер
    4 - админ
 *
 *
 */
    $role = Yii::$app->user->identity->role;
    $user_id = Yii::$app->user->id;

    ?>

    <div class="orders-form">
        <?php $form = ActiveForm::begin();  ?>



        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home">Общие</a></li>
          <li><a data-toggle="tab" href="#menu1">Зубы</a></li>
      </ul><br>

      <div class="tab-content">
          <div id="home" class="tab-pane fade in active">

            <?php 
            echo $form->field($model, 'num')->textInput(['maxlength' => true]);
            ?>
            <label for="date">Дата заказа</label>
            <br>
            <input type="date" name="Orders[date]" value="<?= date('Y-m-d', (strtotime($model->date)>0) ? strtotime($model->date) : time() );?>" />
            <br><br>
            <?php
    // группа для связи заказов для расчета по всем заказам кол-во и сумм
    // для связи используется id модели  и num - номер заказа
            echo $form->field($model, 'group_id')->dropDownList(
                ArrayHelper::map( backend\models\Orders::find()->where(['id'=>$model->id])->all() , 'id','num'),
                $param = ['options' =>[ $model->group_id => ['Selected' => true]], 'prompt' => 'Без привязки',]
                );
                ?>
                <?= $form->field($model, 'doctor_id')->hiddenInput(['maxlength' => true, 'value'=> Yii::$app->user->id ])->label(false) ?>
                <?= $form->field($model, 'clinics_id')->hiddenInput(['maxlength' => true, 'value'=> backend\models\Doctors::findOne(Yii::$app->user->id)->clinic_id ])->label(false) ?>
                <?php
    // выбор пациента из списка
                echo $form->field($model, 'pacient_code')->dropDownList(
                    ArrayHelper::map( backend\models\Pacients::find()->where(['doctor_id'=>Yii::$app->user->id])->all() , 'code','firstname')
                    ,
                    $param = ['options' =>[ $model->pacient_code => ['Selected' => true]]]
                    ); ?>
                <?= $form->field($model, 'type_paid')
                ->dropDownList([
                    '0' => 'Без оплаты',
                    '1' => 'Оплата 2 частями',
                    '2' => 'Оплата 3 частями',
                    '3' => '100% предоплата',
                    ], $param = ['options' =>[ $model->type_paid => ['Selected' => true]]] );
                    ?>
    <?php  $form->field($model, 'status_object')->dropDownList([
        '0' => 'Бесплатно',
        '1' => 'Рассрочка',
        '2' => 'Полная оплата',
        ], $param = ['options' =>[ $model->status_object => ['Selected' => true]]] ); 

    // статус оплачено - устанавливается бухгалтером
        echo $form->field($model, 'status_paid')
        ->dropDownList([
            '0' => 'Не оплачено',
            '1' => 'Оплачено частично',
            '2' => 'Оплачено полностью',
            ], $param = ['options' =>[ $model->status_paid => ['Selected' => true]]] );

    // цену видят только админ, бухгалтер, врач (который заказал) и мед директор
            if($role!=0) {
        echo $form->field($model, 'price')->textInput(['readonly'=>true]) ; // цена
    }
    ?>
    <?= $form->field($model, 'discount')->textInput(['readonly'=>true]) ?>

      <?php if($role!=0){  // Суммы предоплаты видят Администратор, медицинский директор, бухгалтер и врач (N из N).?>
          <?= $form->field($model, 'sum_paid')->textInput() ?>
      <?}?>

    <label for="date_paid">Дата окончания оплаты</label>
    <br>
    <input type="date" name="date_paid" class="form-control" value="<?= date('Y-m-d',($model->date_paid>0)? $model->date_paid : time() );?>" />
    <br><br>
    <?= $form->field($model, 'status_agreement')->dropDownList([
        '0' => 'Не подписан',
        '1' => 'Подписан',
        ], $param = ['options' =>[ $model->status_agreement => ['Selected' => true]]] );
    // договор подписан или нет
        ?>
        <?php
    // подтверждение админа или директора
        if($role==4 || $role==3) {
            echo $form->field($model, 'admin_check')->textInput();
        }
        ?>
        <?php //  $form->field($model, 'order_status')->textInput() // отправлен заказ ?>
        <?php // $form->field($model, 'status')->textInput() // подтвержден договор ?>
        <?php // $form->field($model, 'type')->textInput() // тип заказа  ?>
        <hr>
        <?= $form->field($model, 'scull_type')->dropDownList([
            '0' => 'Верхняя челюсть',
            '1' => 'Нижняя челюсть',
            '2' => 'Верхняя и нижняя челюсти',
            ], $param = ['options' =>[ $model->scull_type => ['selected' => true]]] );

            ?>
            <table class="table">
                <tr><td><strong>Наименование</strong></td><td><strong>Планируемое кол-во ВП</strong></td><td><strong>Кол-во на изготовление</strong></td><td><strong>ВЧ</strong></td><td><strong>НЧ</strong></td><td><strong>Стоимость, сум.</strong></td></tr>

                <?= '<tr><td>Количество моделей</td><td>' .$form->field($model, 'count_models_vp')->textInput(['maxlength' => true])->label(false) . '</td>' ?>
                <?= '<td>' . $form->field($model, 'count_models')->textInput(['maxlength' => true])->label(false) . '</td><td>' . $form->field($model, 'count_models_vc')->textInput(['maxlength' => true])->label(false) . '</td><td>' . $form->field($model, 'count_models_nc')->textInput(['maxlength' => true])->label(false) . '</td><td>' . (isset($clinic) && is_object($clinic) ? $clinic->model_price : '') . '</td></tr>' ?>

                <?= '<tr><td>Количество элайнеров (кап)</td><td>' . $form->field($model, 'count_elayners_vp')->textInput(['maxlength' => true])->label(false) . '</td>' ?>
                <?= '<td>' . $form->field($model, 'count_elayners')->textInput(['maxlength' => true])->label(false) . '</td><td>' . $form->field($model, 'count_elayners_vc')->textInput(['maxlength' => true])->label(false) . '</td><td>' . $form->field($model, 'count_elayners_nc')->textInput(['maxlength' => true])->label(false) . '</td><td>' . (isset($clinic) && is_object($clinic) ? $clinic->elayner_price : '') . '</td></tr>'  ?>

                <?= '<tr><td>Количество аттачментов (кап)</td><td>' . $form->field($model, 'count_attachment_vp')->textInput(['maxlength' => true])->label(false) . '</td>' ?>
                <?= '<td>' . $form->field($model, 'count_attachment')->textInput(['maxlength' => true])->label(false) . '</td><td>' . $form->field($model, 'count_attachment_vc')->textInput(['maxlength' => true])->label(false) . '</td><td>' . $form->field($model, 'count_attachment_nc')->textInput(['maxlength' => true])->label(false) . '</td><td>' . (isset($clinic) && is_object($clinic) ? $clinic->attachment_price : '') . '</td></tr>'  ?>

                <?= '<tr><td>Количество Check-point (кап)</td><td>' . $form->field($model, 'count_checkpoint_vp')->textInput(['maxlength' => true])->label(false) . '</td>' ?>
                <?= '<td>' . $form->field($model, 'count_checkpoint')->textInput(['maxlength' => true])->label(false)  . '</td><td>' . $form->field($model, 'count_checkpoint_vc')->textInput(['maxlength' => true])->label(false)  . '</td><td>' . $form->field($model, 'count_checkpoint_nc')->textInput(['maxlength' => true])->label(false)  . '</td><td>' . (isset($clinic) && is_object($clinic) ? $clinic->checkpoint_price : ''). '</td></tr>' ?>

                <?= '<tr><td>Количество ретейнеров (кап)</td><td>' . $form->field($model, 'count_reteiners_vp')->textInput(['maxlength' => true])->label(false) . '</td>' ?>
                <?= '<td>' . $form->field($model, 'count_reteiners')->textInput(['maxlength' => true])->label(false)  . '</td><td>' . $form->field($model, 'count_reteiners_vc')->textInput(['maxlength' => true])->label(false)  . '</td><td>' . $form->field($model, 'count_reteiners_nc')->textInput(['maxlength' => true])->label(false)  . '</td><td>' . (isset($clinic) && is_object($clinic) ? $clinic->reteiner_price : '') . '</td></tr>' ?>

            </table>



            <?php if(true || $role==2 || $role == 4){  // назначение техников для уровней только мед директор и админ ?>

                <div class="form-group field-orders-level_1_doctor_id has-success">
                    <label class="control-label" for="orders-level_1_doctor_id">Техник / врач для уровня 1 (оценка качества и обработка)</label>
                    <select id="orders-level_1_doctor_id" class="form-control" name="Orders[level_1_doctor_id]">
                        <?php
                        $docs = '';
                        $doctors = backend\models\Doctors::find()->where(['status'=>1])
                        ->andWhere(['!=','type','3'])->all();
                        foreach($doctors as $doc){
                            $sel = ($doc->id==$model->level_1_doctor_id)?'selected':'';
                            $docs .= '<option value="'.$doc->id .'" '.$sel.'>'.$doc->firstname . ' '. $doc->lastname . ' ' . $doc->thirdname .'</option>';
                        }
                        echo $docs;

                        ?>
                    </select>
                    <div class="help-block"></div>
                </div>

                <div class="form-group field-orders-level_2_doctor_id has-success">
                    <label class="control-label" for="orders-level_2_doctor_id">Техник / врач для уровня 2 (сканирование модели)</label>
                    <select id="orders-level_2_doctor_id" class="form-control" name="Orders[level_2_doctor_id]">
                        <?php
                        $docs ='';
                        foreach($doctors as $doc){
                            $sel = ($doc->id==$model->level_2_doctor_id)?'selected':'';
                            $docs .= '<option value="'.$doc->id .'" '.$sel.'>'.$doc->firstname . ' '. $doc->lastname . ' ' . $doc->thirdname .'</option>';
                        }
                        echo $docs;

                        ?>
                    </select>
                    <div class="help-block"></div>
                </div>

                <div class="form-group field-orders-level_3_doctor_id has-success">
                    <label class="control-label" for="orders-level_3_doctor_id">Техник / врач для уровня 3 (моделирование и разработка виртуального плана)</label>
                    <select id="orders-level_3_doctor_id" class="form-control" name="Orders[level_3_doctor_id]">
                        <?php
                        $docs ='';
                        foreach($doctors as $doc){
                            $sel = ($doc->id==$model->level_3_doctor_id)?'selected':'';
                            $docs .= '<option value="'.$doc->id .'" '.$sel.'>'.$doc->firstname . ' '. $doc->lastname . ' ' . $doc->thirdname .'</option>';
                        }
                        echo $docs;
                        ?>
                    </select>
                    <div class="help-block"></div>
                </div>

                <div class="form-group field-orders-level4_doctor_id has-success">
                    <label class="control-label" for="orders-level_4_doctor_id">Техник / врач для уровня 4 (проверка и утверждение)</label>
                    <select id="orders-level_4_doctor_id" class="form-control" name="Orders[level_4_doctor_id]">
                        <?php
                        $docs ='';
                        foreach($doctors as $doc){
                            $sel = ($doc->id==$model->level_4_doctor_id)?'selected':'';
                            $docs .= '<option value="'.$doc->id .'" '.$sel.'>'.$doc->firstname . ' '. $doc->lastname . ' ' . $doc->thirdname .'</option>';
                        }
                        echo $docs;
                        ?>
                    </select>
                    <div class="help-block"></div>
                </div>

                <div class="form-group field-orders-level_5_doctor_id has-success">
                    <label class="control-label" for="orders-level_5_doctor_id">Техник / врач для уровня 5 (отправка)</label>
                    <select id="orders-level_5_doctor_id" class="form-control" name="Orders[level_5_doctor_id]">
                        <?php
                        $docs ='';
                        foreach($doctors as $doc){
                            $sel = ($doc->id==$model->level_5_doctor_id)?'selected':'';
                            $docs .= '<option value="'.$doc->id .'" '.$sel.'>'.$doc->firstname . ' '. $doc->lastname . ' ' . $doc->thirdname .'</option>';
                        }
                        echo $docs;
                        ?>
                    </select>
                    <div class="help-block"></div>
                </div>


                <?php } // назначение техников на уровни 1-5 ?>


                <?php
    // установка статуса и вывод сообщения о состоянии
    // установка статусов по уровням только для техников, мед. директора и админ

                if( $model->level_1_doctor_id == $user_id ) {
                    echo $form->field($model, 'level_1_status')->dropDownList([
                        '0' => 'Возврат',
                        '1' => 'Отправить',
                        ], $param = ['options' =>[ $model->level_1_status => ['selected' => true]]] );
                    echo $form->field($model, 'level_1_result')->textarea(['rows' => 5]);
                } ?>


                <?php  if( $model->level_2_doctor_id == $user_id ) {
                    echo $form->field($model, 'level_2_status')->dropDownList([
                        '0' => 'Возврат',
                        '1' => 'Отправить',
                        ], $param = ['options' =>[ $model->level_2_status => ['selected' => true]]] );
                    echo $form->field($model, 'level_2_result')->textarea(['rows' => 5]);
                } ?>

                <?php if( $model->level_3_doctor_id == $user_id ) {
                    echo $form->field($model, 'level_3_status')->dropDownList([
                        '0' => 'Возврат',
                        '1' => 'Отправить',
                        ], $param = ['options' =>[ $model->level_3_status => ['selected' => true]]] );
                    echo $form->field($model, 'level_3_result')->textarea(['rows' => 5]);
                } ?>

                <?php if( $model->level_4_doctor_id == $user_id ) {
                    echo $form->field($model, 'level_4_status')->dropDownList([
                        '0' => 'Возврат',
                        '1' => 'Отправить',
                        ], $param = ['options' =>[ $model->level_4_status => ['selected' => true]]] );
                    echo $form->field($model, 'level_4_result')->textarea(['rows' => 5]);
                } ?>

                <?php if( $model->level_5_doctor_id == $user_id ) {
                    echo $form->field($model, 'level_5_status')->dropDownList([
                        '0' => 'Возврат',
                        '1' => 'Отправить',
                        ], $param = ['options' =>[ $model->level_5_status => ['selected' => true]]] );
                    echo $form->field($model, 'level_5_result')->textarea(['rows' => 5]);
                } ?>



                <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <?php  echo $form->field($model, 'order_status')  // статус заказа 1-отпрвлен
    ->dropDownList([
        '0' => 'Не отправлен',
        '1' => 'Отправлен',
    ], $param = ['options' =>[ $model->order_status => ['selected' => true]]] );
 // загрузка файлов
    echo  $form->field($model, 'files[]')->fileInput(['multiple' => true]) ;

    print_r( $model->fileList );


    if( is_array($model->fileList) && count( $model->fileList ) ){

        $files = json_decode($model->files);
        echo '<table class="table"><tr><td><strong>Эскиз</strong></td><td><strong>Имя файла</strong></td><td><strong>Размер</strong></td><td><strong>Скачать</strong></td><td><strong>Удалить</strong></td></tr></tr>';
        $path = Yii::getAlias("@backend/web/uploads/orders/" . $model->id);
        foreach ($model->fileList as $k=>$f) {
            if( strpos($f,'.png')>0  || strpos($f,'.jpg')>0 || strpos($f,'.gif')>0 ){
                $img = '<img src="/uploads/orders/'. $model->id.'/'.$f .'" width="48" />';
            }else{
                $img = '<img src="/uploads/file.png" width="48" />';
            }
            echo '<tr><td>'.$img.'</td><td>' . $f . '</td><td>' . filesize( $path .'/' . $f ) . '</td><td><a target="_blank" href="/admin/orders/download?file=' . $f . '&id=' . $model->id . '"><span class="glyphicon glyphicon-save" id="' . $model->id . '" ></span></a></td><td><a target="_blank" href="/orders/delete?file=' . $f . '&id=' . $model->id . '"><span class="glyphicon glyphicon-trash" id="' . $model->id . '" ></span></a></td></tr>';
        }
        echo '</table';

    }
    ?>
</div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////- -->

<div id="menu1" class="tab-pane fade text-center">
    <h4 class="">ЗУБНАЯ ФОРМУЛА</h4>
    <?php 
    $type = ['С' => 'кариес',  'Р' => 'пульпит','Pt' => 'периодонтит',  'F' => 'резорцин-формалиновый зуб','П' => 'пломба',  'A1'  => 'пародонтит, пародонтоз (степень  подвижности - I)',  'A2'  => 'пародонтит, пародонтоз (степень  подвижности - II)',  'A3'  => 'пародонтит, пародонтоз (степень  подвижности - III)',  'A4'  => 'пародонтит, пародонтоз (степень  подвижности - IV)', 'К' => 'коронка', 'И' => 'искусственный зуб', 'О' => 'отсутствующий зуб', 'R' => 'корень', 'I' => 'имплантат']; 
    $tooths = [18, 17, 16, 15, 14, 13, 12, 11, 21, 22, 23, 24, 25, 26, 27, 28, 48, 47, 46, 45, 44, 43, 42, 41, 31, 33, 33, 34, 35, 36, 37, 38];
    ?>
    <?php foreach($tooths as $t) : ?>
        <?php if ($t == 48) {
          echo '<br><br>';
      } ?>

      <div class="dropdown" style="display:inline">
          <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"><?= $t ?><br><input type="text" class="t_input form-control" name="teeth1_<?= $t ?>"></button>
          <ul class="dropdown-menu">
              <?php foreach ($type as $key => $value): ?>
                <div class="checkbox unchecked" style="margin-left:10px" id='bla'>
                    <label><input type="checkbox"> <?=$key?></label>
                </div>
            <?php endforeach ?>
        </ul>
    </div>
<?php endforeach ?>


<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////- -->
<hr><h3>ПЛАН ЛЕЧЕНИЯ</h3><h5><b>ИСПРАВЛЕНИЕ ЗУБНОЙ ДУГИ</b></h5>
<h5><b>Зубная дуга</b></h5>
<div class="row">
    <div class="col-md-6">
        <p><b>Верхняя челюсть</b></p>
        <label class="radio-inline"><input type="radio" name="opt_1">Оставить как есть</label>
        <label class="radio-inline"><input type="radio" name="opt_1">Расширить</label>
        <label class="radio-inline"><input type="radio" name="opt_1">Сузить</label>
    </div>
    <div class="col-md-6">
        <p><b>Нижняя челюсть</b></p>
        <label class="radio-inline"><input type="radio" name="opt_2">Оставить как есть</label>
        <label class="radio-inline"><input type="radio" name="opt_2">Расширить</label>
        <label class="radio-inline"><input type="radio" name="opt_2">Сузить</label>
    </div>
</div>
<hr>

<h5><b>Соотношение резцов</b></h5>
<div class="row">
    <div class="col-md-4">
        <p><b>Соотношение резцов по трансверзали <br>(средняя линия)</b></p>
        <label class="radio-inline"><input type="radio" name="opt_3">Не менять</label>
        <label class="radio-inline"><input type="radio" name="opt_3">Улучшить</label>
    </div>

    <div class="col-md-8">   
        <p><b>По Сагиттали</b></p>
        <div class="row" style="display:inline; text-align:left">
            <div class="col-md-4">
                <p><b>Верхние</b></p>
                <label class="radio-inline"><input type="radio" name="opt_4">Не менять</label>
                <label class="radio-inline"><input type="radio" name="opt_4">Устранить протрузию</label>
                <label class="radio-inline"><input type="radio" name="opt_4">Устранить ретрузию</label>
            </div>
            <div class="col-md-4">
                <p><b>Нижние</b></p>
                <label class="radio-inline"><input type="radio" name="opt_5">Не менять</label>
                <label class="radio-inline"><input type="radio" name="opt_5">Устранить протрузию</label>
                <label class="radio-inline"><input type="radio" name="opt_5">Устранить ретрузию</label>
            </div>
            <div class="col-md-4">
                <p><b>Сагиттальная щель</b></p>
                <label class="radio-inline"><input type="radio" name="opt_6">Не менять</label>
                <label class="radio-inline"><input type="radio" name="opt_6">Установить резцы в контакт</label>
                <label class="radio-inline"><input type="radio" name="opt_6">Сохранить, если необходимо для поддержания класса</label>
            </div>
        </div>
    </div>
    
</div>
<hr>
<h5><b>ВЕРТИКАЛЬНОЕ ПЕРЕКРЫТИЕ</b></h5>
<div class="row">
    <div class="col-md-6">
        <p><b>Верхние</b></p>
        <label class="radio-inline"><input type="radio" name="opt_7">Не менять</label>
        <label class="radio-inline"><input type="radio" name="opt_7">Интрузия</label>
        <label class="radio-inline"><input type="radio" name="opt_7">Экструзия</label>
    </div>
    <div class="col-md-6">
        <p><b>Нижние</b></p>
        <label class="radio-inline"><input type="radio" name="opt_8">Не менять</label>
        <label class="radio-inline"><input type="radio" name="opt_8">Интрузия</label>
        <label class="radio-inline"><input type="radio" name="opt_8">Экструзия</label>
    </div>
</div>
<hr>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////- -->
<h3>СООТНОШЕНИЕ ЗУБОВ ПОСЛЕ ЛЕЧЕНИЯ (отметить)</h3>


<table class="table table-bordered text-center">
    <thead>
        <tr style="text-align:center">
            <th>СООТНОШЕНИЕ ЗУБОВ</th>
            <th colspan="3">R</th>
            <th colspan="3">L</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>ПЕРВЫХ МОЛЯРОВ</td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
        </tr>
        <tr>
            <td>ЗА СЧЕТ ЧЕГО? (способ)</td>
            <td colspan="2">
               Дистализация:
               <select name="" class="form-control small_select" id="">
                <option value=""></option>
                <option value="">1</option>
                <option value="">2</option>
            </select>

        </td>
        <td colspan="2">
           Мезиализация
           <select name="" class="form-control small_select" id="">
            <option value=""></option>
            <option value="">1</option>
            <option value="">2</option>
        </select>
    </td>
    <td colspan="2">
        Сепарация
        <select name="" class="form-control small_select" id="">
            <option value=""></option>
            <option value="">1</option>
            <option value="">2</option>
        </select>
    </td>
</tr>
</tbody>
</table>

<table class="table table-bordered text-center">
    <thead>
        <tr style="text-align:center">
            <th rowspan="2">Клыков</th>
            <th colspan="3">R</th>
            <th colspan="3">L</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
        </tr>
        <tr>
            <td>ЗА СЧЕТ ЧЕГО? (способ)</td>
            <td colspan="2">
              Дистализация:
               <select name="" class="form-control small_select" id="">
                <option value=""></option>
                <option value="">1</option>
                <option value="">2</option>
            </select>

        </td>
        <td colspan="2">
           Мезиализация:
           <select name="" class="form-control small_select" id="">
            <option value=""></option>
            <option value="">1</option>
            <option value="">2</option>
        </select>
    </td>
    <td colspan="2">
        Сепарация:
        <select name="" class="form-control small_select" id="">
            <option value=""></option>
            <option value="">1</option>
            <option value="">2</option>
        </select>
    </td>
</tr>
</tbody>
</table>

<h4>УДАЛЕНИЕ (отметить планируемые к удалению зубы)</h4>
<?php 
$tooths = [18, 17, 16, 15, 14, 13, 12, 11, 21, 22, 23, 24, 25, 26, 27, 28, 48, 47, 46, 45, 44, 43, 42, 41, 31, 33, 33, 34, 35, 36, 37, 38];
?>
<div class="checkbox">
    <?php foreach($tooths as $t) : ?>
        <?php if ($t == 48) {
          echo '<br><br>';
      } ?>
      <label><input type="checkbox" name="teeth2_<?=$t?>"><?=$t?></label>
  <?php endforeach ?>
</div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////- -->
<hr>
<h4>ЗУБЫ НЕТРЕБУЮЩИЕ ПЕРЕМЕЩЕНИЯ (отметить)</h4>
<?php 
$tooths = [18, 17, 16, 15, 14, 13, 12, 11, 21, 22, 23, 24, 25, 26, 27, 28, 48, 47, 46, 45, 44, 43, 42, 41, 31, 33, 33, 34, 35, 36, 37, 38];
?>
<div class="checkbox">
    <?php foreach($tooths as $t) : ?>
        <?php if ($t == 48) {
          echo '<br><br>';
      } ?>
      <label><input type="checkbox" name="teeth2_<?=$t?>"><?=$t?></label>
  <?php endforeach ?>
</div>


<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////- --><hr>
<h4>НЕВОЗМОЖНО УСТАНОВИТЬ АТТАЧМЕНТЫ (отметить)</h4>
<?php 
$tooths = [18, 17, 16, 15, 14, 13, 12, 11, 21, 22, 23, 24, 25, 26, 27, 28, 48, 47, 46, 45, 44, 43, 42, 41, 31, 33, 33, 34, 35, 36, 37, 38];
?>
<div class="checkbox">
    <?php foreach($tooths as $t) : ?>
        <?php if ($t == 48) {
          echo '<br><br>';
      } ?>
      <label><input type="checkbox" name="teeth2_<?=$t?>"><?=$t?></label>
  <?php endforeach ?>
</div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////- -->

<hr>
<h4>ИЗМЕНИТЬ ПОЛОЖЕНИЕ ЗУБОВ</h4>
<?php 
$type = ['A' => 'TIP ( ангуляция)',  'R' => 'ROTATION','T' => 'TORGUE',  'B/L' => 'BUCCAL-LINGUAL','E' => 'EXTRUSION',  'I'  => 'INTRUSION',  'M/D'  => 'MESIAL-DISTAL']; 
$tooths = [18, 17, 16, 15, 14, 13, 12, 11, 21, 22, 23, 24, 25, 26, 27, 28, 48, 47, 46, 45, 44, 43, 42, 41, 31, 33, 33, 34, 35, 36, 37, 38];
?>
<?php foreach($tooths as $t) : ?>
    <?php if ($t == 48) {
      echo '<br><br>';
  } ?>

  <div class="dropdown" style="display:inline">
      <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"><?= $t ?><br><input type="text" class="t_input form-control"></button>
      <ul class="dropdown-menu">
          <?php foreach ($type as $key => $value): ?>
            <div class="checkbox" style="margin-left:10px" id="bla">
                <label><input type="checkbox"  name="teeth2_<?=$t?>"> <?=$key?></label>
            </div>
        <?php endforeach ?>
    </ul>
</div>
<?php endforeach ?>


<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////- -->
<hr>
<h4>  ПЛАНИРУЕМЫЕ ПРОТЕЗЫ / ИМПЛАНТЫ (отметить место и размеры в мм.)</h4>
<?php 
$tooths = [18, 17, 16, 15, 14, 13, 12, 11, 21, 22, 23, 24, 25, 26, 27, 28, 48, 47, 46, 45, 44, 43, 42, 41, 31, 33, 33, 34, 35, 36, 37, 38];
?>
<?php foreach($tooths as $t) : ?>
    <?php if ($t == 48) {
      echo '<br><br>';
  } ?>

  <button class="btn t_btn" type="button"><label><?= $t ?><br><input type="text" class="form-control t_input"></label></button>
<?php endforeach ?>


<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////- -->
<hr>
<div class="form-group">
  <label for="comment">КОММЕНТАРИИ:</label>
  <textarea class="form-control" rows="5" id="comment"></textarea>
</div>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////- -->
</div><br>
<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    <?php if (!$model->isNewRecord): ?>
        <?= Html::Button(Yii::t('app', 'Print'), ['class' => 'btn btn-default print-btn', 'data-url'=>Url::to(['orders/print', 'id' => $model->id])]) ?>
    <?php endif; ?>
</div>

<?php ActiveForm::end(); ?>

</div>



