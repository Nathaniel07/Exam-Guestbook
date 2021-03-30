<?php 
use yii\helpers\html;
use yii\widgets\ActiveForm;

//use yii\widgets\DatePicker;


$this->title = 'Technical Exam - Kumu';

?>




<?php if (yii::$app->session->hasFlash('message')) : ?> 

	<?php echo '<p class="alert alert-'.yii::$app->session->getFlash('class').' alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.yii::$app->session->getFlash('message').'</p>'; ?>

<?php endif; ?>


	<div class="row">
		<div class="col-md-12">

			<h2><strong><?= $title ?></strong></h2>
			<br>
		</div> <!--end column-->
	</div> <!--end row-->


		

	<div class="row" >
		<div class="col-md-6">

				<?php $form = ActiveForm::begin()?>


				<div class="form-group">
					<?= $form->field($event, 'event_name')->textInput(['class' => 'form-control']); // 'autofocus' => true?>
										
				</div>

				<div class="form-group">
					<?= $form->field($event, 'event_location')->label('Location')->textInput(['class' => 'form-control']); ?>
				</div>

				<?php $datetoday = date("Y-m-d") ?>

				<div class="form-group">
					<?= $form->field($event, 'event_date')->label('Date')->textInput(['class' => 'form-control','type' => 'date', 'min' => $datetoday]); ?>


					<?php // $form->field($event, 'event_date')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '9999/99/99',])->label('Date');?>

					<?php // $this->widget("zii.widgets.jui.CJuiDatePicker", array("attribute" => "event_date", "model" => $event, "language" => "es", "options" => array("dateFormat" => "yy-mm-dd"))); ?>
				</div>

				<div class="form-group">
					<?= $form->field($event, 'event_time')->label('Time')->textInput(['class' => 'form-control','type' => 'time']); ?>


					<?php // $form->field($event, 'event_time')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '99:99',])->label('Time');?>
				</div>

				 <div class="form-group">
                    <?= $form->field($event, 'event_status')->hiddenInput(['value' => 1])->label(false);?>


                </div>

				<button type="submit" class="btn btn-primary">Save event</button>
				<?= Html::a('Go back',['/site/event_list'], ['class' => 'btn btn-default']); ?>

				<?php ActiveForm::end()?>


		</div> <!--end column-->



	</div> <!--end row-->

