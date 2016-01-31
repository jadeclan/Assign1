
<!-- begin exception -->
<div class="panel panel-info">
	<div class="panel-heading">Exception</div>
	<div class="panel-body">
		<?php echo $e->getCode() . ': ' . $e->getMessage() ?>
		<br/><br/>
		Stack Trace:
		<pre><?php echo $e->getTraceAsString() ?></pre>
	</div>
</div>
<!-- end exception -->
