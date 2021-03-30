<?php 
use yii\helpers\html;
use yii\widgets\ActiveForm;


$this->title = 'Technical Exam - Kumu';

?>


<?php if (yii::$app->session->hasFlash('message')) : ?> 

    <?php echo '<p class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.yii::$app->session->getFlash('message').'</p>'; ?>

<?php endif; ?>

    <div class="row">

        <div class="col-md-12">
    	<h2><strong><?php echo $event->event_name; ?></strong></h2>
    	<br>
        </div>

        
	</div>




    <div class="row" >
        <div class="col-md-6">

                <?php $form = ActiveForm::begin()?>

                <div class="form-group">
                    <?= $form->field($event, 'event_name')->textInput(['class' => 'form-control']);?>
                    <?php // , ['template' => '{input}{error}{hint}'] ?>
                                        
                </div>

                <div class="form-group">
                    <?= $form->field($event, 'event_location')->textInput(['class' => 'form-control'])->label('Location'); ?>
                </div>

                <?php $datetoday = date("Y-m-d") ?>

                <div class="form-group">
                   <?= $form->field($event, 'event_date')->label('Date')->textInput(['class' => 'form-control','type' => 'date', 'min' => $datetoday]); ?>


                    <?php //$form->field($event, 'event_date')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '9999/99/99',])->label('Date')->input(['class' => 'form-control']);?>
                </div>

                <div class="form-group">
                  <?= $form->field($event, 'event_time')->label('Time')->textInput(['class' => 'form-control','type' => 'time']); ?>

                    <?php // $form->field($event, 'event_time')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '99:99',])->label('Time');?>
                </div>

                <div class="form-group">
                    <?php $items = ['1' => 'Active', '0' => 'Inactive']; ?>
                    <?= $form->field($event, 'event_status')->label('Status')->dropDownList($items, ['class' => 'form-control']); ?>
                                        
                </div>

                
                <button type="submit" class="btn btn-success">Update</button>
               
          
                <?= Html::a('Back',['/site/event_list'], ['class' => 'btn btn-default']); ?>



                <?php ActiveForm::end()?>


        </div> <!--end column-->



    </div> <!--end row-->


