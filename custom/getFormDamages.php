<?php
	require('../func/config.php');
      $MethodId = $_GET['AssetState'];

  		if($MethodId=="Poor"){
				echo '<div class="form-group">
					<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="DescriptionBox">Description of damages:</label>

					<div class="col-xs-12 col-sm-9">
						<textarea id="DescriptionBox" class="autosize-transition form-control" name="DescriptionBox"></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="CostOfDamages">Cost of Damages:</label>

					<div class="col-xs-12 col-sm-9">
						<input type="text" id="CostOfDamages" name="CostOfDamages" class="col-xs-12 col-sm-8"  value=""/>
					</div>
				</div>


				';
			}
 // Connection Closed
?>
