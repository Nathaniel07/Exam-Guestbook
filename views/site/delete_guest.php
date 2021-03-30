<?php 
use yii\helpers\html;
use yii\widgets\ActiveForm;


$this->title = 'Technical Exam - Kumu';

?>


    <div class="row">

        <div class="col-md-12">
    	<h2><strong><?= $title ?></strong></h2>
    	<br>
        </div>

        
	</div>



    <div class="row" >
        <div class="col-md-6">

                <?php $form = ActiveForm::begin()?>

                  <div class="form-group">
                    <?= $form->field($register, 'event')->label('Event')->textInput(['class' => 'form-control', 'disabled' => 'true']); ?>
                                        
                </div>

                   <div class="form-group">
                   <?= $form->field($register, 'first_name')->label('First Name')->textInput(['class' => 'form-control', 'disabled' => 'true']); ?>
                                        
                </div>

                <div class="form-group">
                    <?= $form->field($register, 'last_name')->label('Last Name')->textInput(['class' => 'form-control', 'disabled' => 'true']); ?>
                </div>
          

                <div class="form-group">
                   <?= $form->field($register, 'email_address')->label('Email Address')->textInput(['class' => 'form-control', 'disabled' => 'true']); ?>

                </div>

                 <div class="form-group">
                    <?= $form->field($register, 'created_at')->label('Registred Date')->textInput(['class' => 'form-control', 'type' => 'datetime' ,'disabled' => 'true']); ?>
                                        
                </div>

                <div class="form-group">
                    <?= $form->field($register, 'id')->hiddenInput([])->label(false);?>


                </div>

                
                <button type="submit" class="btn btn-danger">Delete</button>
               
          
                <?= Html::a('Back',['/site/guest_list'], ['class' => 'btn btn-default']); ?>



                <?php ActiveForm::end()?>


        </div> <!--end column-->



    </div> <!--end row-->


