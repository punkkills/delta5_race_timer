<?php 
$conn = new mysqli('localhost', 'root', 'delta5fpv', 'vtx');
if ($conn->connect_error) {	die("Connection error: " . $conn->connect_error); }

$nodes = $conn->query("SELECT * FROM nodes WHERE 1");

while ($node = $nodes->fetch_assoc()) :
?>

<div class="mdl-cell mdl-cell--2-col">
<table class="delta5-table mdl-data-table mdl-js-data-table mdl-shadow--2dp">
<thead>
	<tr>
		<th>Node:</th>
		<th><?php echo $node['node']; ?></th>
	</tr>
</thead>
<tbody>
<tr>
	<td>i2c Addr:</td>
	<td><?php echo $node['i2cAddr']; ?></td>
</tr>
<tr>
	<td>VTX Freq:</td>
	<td><?php echo $node['vtxFreq']; ?></td>
</tr>
<tr>
	<td>VTX Chan:</td>
	<td><?php echo $node['vtxFreqChan']; ?></td>
</tr>
<tr>
	<td>RSSI:</td>
	<td><?php echo $node['rssi']; ?></td>
</tr>
<tr>
	<td>Trigger:</td>
	<td><?php echo $node['rssiTrigger']; ?></td>
</tr>
<tr>
	<td colspan="2">
	<form method="post">
	<button class="mdl-chip" <?php echo 'name="node'.$node['node'].'rssiTriggerDec"'; ?> ><span class="mdl-chip__text">-5</span></button>
	<button class="mdl-chip" <?php echo 'name="node'.$node['node'].'rssiTriggerSet"'; ?> ><span class="mdl-chip__text">Set</span></button>
	<button class="mdl-chip" <?php echo 'name="node'.$node['node'].'rssiTriggerInc"'; ?> ><span class="mdl-chip__text">+5</span></button>
	</form>
	</td>
</tr>
</tbody>
</table>
</div>

<?php endwhile ?>
