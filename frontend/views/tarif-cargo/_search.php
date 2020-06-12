<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\TarifCargo;


/* @var $this yii\web\View */
/* @var $model frontend\models\TarifCargoSearch */
/* @var $form yii\widgets\ActiveForm */

?>
<!-- <script>
function sum() {
      var txtFirstNumberValue = document.getElementById('panjang').value;
      var txtSecondNumberValue = document.getElementById('lebar').value;
      var txtThirdNumberValue = document.getElementById('tinggi').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue) * parseInt(txtThirdNumberValue) / 6000;
      var hasil = Math.ceil(result);
      if (!isNaN(hasil)) {
         document.getElementById('massa').value = hasil;
      }
}
</script> -->


<div class="tarif-cargo-search">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>
                <center><b><?= $this->title ?></b></center>
            </h3>
        </div>
        <br>




    <?php $form = ActiveForm::begin([
        'action' => ['lihat'],
        'method' => 'get',
    ]); ?>

<div class="col-md-6"  style="margin-bottom: 8px;">
   <?= $form->field($model, 'origin_name')->label('Origin *')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(TarifCargo::find()->all(),'origin_name','origin_name'),
        'theme' => Select2::THEME_BOOTSTRAP,
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih Kota Asal','required' => true,'style'=>'width:500px','maxlength' => true],
        'pluginOptions' => [
        'allowClear' => true
        ],
        ]);
    ?>
<!--       <?= $form->field($model, 'massa')->textInput(['id'=>'massa','onkeyup'=>'sum();','type' => 'number', 'min' => 0,'placeholder' => "Masukan Berat (Kg)",'required' => true,'style'=>'width:300px','maxlength' => true])->label('Massa')?> -->
<?= $form->field($model, 'massa')->textInput(['type' => 'number', 'min' => 0, 'step' => 'any', 'placeholder' => "Masukan Berat (Kg)",'required' => true,'style'=>'width:300px','maxlength' => true, 'autocomplete' => 'off'])->label('Massa *')?>
<br>
<h6>Note :</h6>
<h6><font color = "red">Tanda [<font color = "black">*</font>] = Wajib di isi</font></h6>

</div>
  

<div class="col-md-6"  style="margin-bottom: 8px;">
    <?= $form->field($model, 'destination_name')->label('Tujuan *')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(TarifCargo::find()->all(),'destination_name','destination_name'),
        'theme' => Select2::THEME_BOOTSTRAP,
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih Kota Tujuan','required' => true,'style'=>'width:500px','maxlength' => true],
        'pluginOptions' => [
        'allowClear' => true
        ],
        ]);
    ?>
 <p><b>Barang bervolume tinggi ? *</b></p>
<!--     <?php echo $form->field($model, 'panjang')->textInput(['id'=>'panjang','onkeyup'=>'sum();','type' => 'number', 'min' => 0,'placeholder' => "P (cm)",'style'=>'width:300px','maxlength' => true])->label(false) ?>
    <?php echo $form->field($model, 'lebar')->textInput(['id'=>'lebar','onkeyup'=>'sum();','type' => 'number', 'min' => 0,'placeholder' => "L (cm)",'style'=>'width:300px','maxlength' => true])->label(false) ?> 
    <?php echo $form->field($model, 'tinggi')->textInput(['id'=>'tinggi','onkeyup'=>'sum();','type' => 'number', 'min' => 0,'placeholder' => "T (cm)",'style'=>'width:300px','maxlength' => true])->label(false) ?> -->

    <?php echo $form->field($model, 'panjang')->textInput([ 'type' => 'number','required' => true, 'min' => 0,'placeholder' => "P (cm)",'style'=>'width:300px','maxlength' => true, 'autocomplete' => 'off'])->label(false) ?>
    <?php echo $form->field($model, 'lebar')->textInput([ 'type' => 'number','required' => true, 'min' => 0,'placeholder' => "L (cm)",'style'=>'width:300px','maxlength' => true, 'autocomplete' => 'off'])->label(false) ?> 
    <?php echo $form->field($model, 'tinggi')->textInput([ 'type' => 'number','required' => true, 'min' => 0,'placeholder' => "T (cm)",'style'=>'width:300px','maxlength' => true, 'autocomplete' => 'off'])->label(false) ?>


</div>
 


<div class="form-group" align="center">
        <?= Html::submitButton('Search', ['class' => 'btn btn-danger']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
</div>
<br>
    <?php ActiveForm::end(); ?>

</div>
<hr>
</div>
