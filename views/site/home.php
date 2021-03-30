<?php 
use yii\helpers\html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\models\Event;


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

				<label>Registration</label>

				<div class="form-group">
					<?= $form->field($register, 'first_name')->label(false)->textInput(['class' => 'form-control', 'type' => 'text', 'placeholder' => 'First Name', 'onkeypress' => 'return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)']); ?>
										
				</div>

				<div class="form-group">
					<?= $form->field($register, 'last_name')->label(false)->textInput(['class' => 'form-control', 'placeholder' => 'Last Name', 'onkeypress' => 'return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)']); ?>
										
				</div>

				<div class="form-group">
					<?= $form->field($register, 'email_address')->label(false)->textInput(['class' => 'form-control', 'placeholder' => 'Email', 'type' => 'email']); ?>
										
				</div>

				<div class="form-group">
					<?= $form->field($register, 'phone_number')->label(false)->textInput(['class' => 'form-control', 'placeholder' => 'Phone Number', 'type' => 'number']); ?>
										
				</div>

				<div class="form-group">
					<?php $items = ['M' => 'Male', 'F' => 'Female']; ?>
					<?= $form->field($register, 'gender')->label(false)->dropDownList($items, ['class' => 'form-control', 'prompt' => 'Select Gender']); ?>
										
				</div>

				<div class="form-group">
					<?= $form->field($register, 'street')->label(false)->textInput(['class' => 'form-control', 'placeholder' => 'Street']); ?>
										
				</div>

				<div class="form-group">
					<?= $form->field($register, 'city')->label(false)->textInput(['class' => 'form-control', 'placeholder' => 'City', 'onkeypress' => 'return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)']); ?>
										
				</div>

				
				<div class="form-group">
					<?= $form->field($register, 'country')->label(false)->textInput(['class' => 'form-control', 'placeholder' => 'Country', 'onkeypress' => 'return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)']); ?>
										
				</div>


				<div class="form-group">
					<?= $form->field($register, 'zip')->label(false)->textInput(['class' => 'form-control', 'placeholder' => 'Zip', 'type' => 'number']); ?>
										
				</div>




			<!--
				<div class="form-group">
					<input type="text" class="form-control" name="first-name" placeholder="First Name" autocomplete="off" value="">
										
				</div>

				<div class="form-group">
					<input type="text" class="form-control" name="last-name" placeholder="Last Name" autocomplete="off" value="">

				</div>

				<div class="form-group">
					<input type="email" class="form-control" name="" placeholder="Email Address" autocomplete="off" value="">
										
				</div>

				<div class="form-group">
					<input type="number" class="form-control" name="" placeholder="Phone Number" autocomplete="off" value="">
										
				</div>

				<div class="form-group">
					
					<select class="form-control" name="">
                        <option value selected disabled>Gender</option>                                        
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>	

				</div>

				<div class="form-group">
					<input type="text" class="form-control" name="" placeholder="Street" autocomplete="off" value="">
										
				</div>

				<div class="form-group">
					<input type="text" class="form-control" name="" placeholder="City" autocomplete="off" value="">
										
				</div>

				<div class="form-group">
					<input type="text" class="form-control" name="" placeholder="Country" autocomplete="off" value="">
										
				</div>

				<div class="form-group">
					<input type="number" class="form-control" name="" placeholder="Zip" autocomplete="off" value="">
										
				</div>

				-->




		</div> <!--end column-->



		<div class="col-md-6">

			<label>Events</label>

					<?= $form->field($register, 'event')->label(false)->dropDownList(ArrayHelper::map(Event::find()->all(), 'event_name', 'event_name')) ?>
	

			

			<?php if($events) :?>

				<?php foreach($events as $key => $event) :?> <!--  key+1 -->
				
				<div class="list-group">
				  <div class="list-group-item" style="padding-bottom: 0px">
				    <h4 class="list-group-item-heading">

				    	<?php // $form->field($register, 'event')->dropDownList(ArrayHelper::map(Event::find()->all(), 'event_id', 'event_name')) ?>
	
						<?php //$form->field($register, 'event')->checkbox(['selected' => $event->event_id])?>

						
						<?php // $form->field($register, 'event')->checkboxList($event->event_id, $event->event_name)?>


<?php //$form->field($register, 'event')->label($event['event_name'])->textInput(['class' => 'form-control', 'type' => 'checkbox', 'value' => $event['event_id']]); ?>

				    	<input type="checkbox" value="<?php echo $event['event_id']; ?>">&nbsp;<?php echo $event['event_name']; ?></h4>
						<ul class="list-group small">
							<li class="list-group-item" style="border: 0 none; padding: 2px 18px;"><?php echo $event['event_location']; ?></li>
							<li class="list-group-item" style="border: 0 none; padding: 2px 18px;">
								<?php echo date('F j, Y l', strtotime ($event['event_date'])); ?></li>

							<li class="list-group-item" style="border: 0 none; padding: 2px 18px;">
								<?php echo date('H:i A', strtotime ($event['event_time'])); ?></li>

						</ul>

				  </div>
				</div>

				<?php endforeach; ?>

			<?php else :?>

				<div class="list-group">
				  	<div class="list-group-item ">
				    
					<p><span class="help-block">No events yet.</span></p>

				 	</div>
				</div>
				
			<?php endif; ?>

			


		<!-- 

			<div class="row">
			  <div class="col-sm-6 col-md-12"> offset-1
			    <div class="thumbnail">
			  		<h4><input type="checkbox" value="">&nbsp;Event Name</h4>
			        <ul class="list-group">
					 <li class="list-group-item borderless bg-transparent">Location</li>
					 <li class="list-group-item">Date</li>
					 <li class="list-group-item">Time</li>
					</ul>

			    </div>
			  </div>
			</div>

		-->

		</div> <!--end column-->

	</div> <!--end row-->

	<div class="row">
		<div class="col-md-12">

			<button type="submit" class="btn btn-primary btn-block">Register</button>

		</div> <!--end column-->
	</div> <!--end row-->


			<?php ActiveForm::end()?>

					

