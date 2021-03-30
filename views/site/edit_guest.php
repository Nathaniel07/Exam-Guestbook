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
                   <?= $form->field($register, 'first_name')->label('First Name')->textInput(['class' => 'form-control', 'onkeypress' => 'return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)']); ?>
                                        
                </div>

                <div class="form-group">
                    <?= $form->field($register, 'last_name')->label('Last Name')->textInput(['class' => 'form-control', 'onkeypress' => 'return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)']); ?>
                </div>
          

                <div class="form-group">
                   <?= $form->field($register, 'email_address')->label('Email Address')->textInput(['class' => 'form-control','type' => 'email']); ?>

                </div>

                <div class="form-group">
                  <?= $form->field($register, 'phone_number')->label('Phone Number')->textInput(['class' => 'form-control','type' => 'number']); ?>

                </div>

                <div class="form-group">
                   <?php $items = ['M' => 'Male', 'F' => 'Female']; ?>
                    <?= $form->field($register, 'gender')->label('Gender')->dropDownList($items, ['class' => 'form-control']); ?>
                                        
                </div>

                <div class="form-group">
                    <?= $form->field($register, 'street')->label('Street')->textInput(['class' => 'form-control']); ?>
                                        
                </div>

                <div class="form-group">
                    <?= $form->field($register, 'city')->label('City')->textInput(['class' => 'form-control', 'onkeypress' => 'return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)']); ?>
                                        
                </div>

                <div class="form-group">
                    <?= $form->field($register, 'country')->label('Country')->textInput(['class' => 'form-control', 'onkeypress' => 'return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)']); ?>
                                        
                </div>

                <div class="form-group">
                    <?= $form->field($register, 'zip')->label('Zip')->textInput(['class' => 'form-control', 'type' => 'number']); ?>
                                        
                </div>
                
                <button type="submit" class="btn btn-success">Update</button>
               
          
                <?= Html::a('Back',['/site/guest_list'], ['class' => 'btn btn-default']); ?>



                <?php ActiveForm::end()?>


        </div> <!--end column-->



    </div> <!--end row-->


