<?php 
use yii\helpers\html;
use yii\widgets\ActiveForm;


$this->title = 'Technical Exam - Kumu';

?>


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
                    <?= $form->field($event, 'event_name')->textInput(['class' => 'form-control', 'disabled' => 'true']);?>
                                        
                </div>

                <div class="form-group">
                    <?= $form->field($event, 'event_location')->textInput(['class' => 'form-control', 'disabled' => 'true'])->label('Location'); ?>
                </div>

                <div class="form-group">
                    <?php // $form->field($event, 'event_date')->textInput(['class' => 'form-control', 'disabled' => 'true'])->label('Date'); ?>

                    <?= $form->field($event, 'event_date')->label('Date')->textInput(['class' => 'form-control','type' => 'date', 'disabled' => 'true']); ?>
                </div>

                <div class="form-group">
                    <?php // $form->field($event, 'event_time')->textInput(['class' => 'form-control', 'disabled' => 'true'])->label('Time'); ?>


                     <?= $form->field($event, 'event_time')->label('Time')->textInput(['class' => 'form-control','type' => 'time', 'disabled' => 'true']); ?>

                </div>

                <div class="form-group">
                    <?= $form->field($event, 'event_id')->hiddenInput([])->label(false);?>


                </div>

                
                <button type="submit" class="btn btn-danger">Delete</button>
               
          
                <?= Html::a('Back',['/site/event_list'], ['class' => 'btn btn-default']); ?>



                <?php ActiveForm::end()?>


        </div> <!--end column-->



    </div> <!--end row-->


