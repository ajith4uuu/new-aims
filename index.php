<?php
// Include header
include("includes/header.php");
?>

<div class="container">
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link active" href="#grafana-tab" id="grafana-link">Grafana Dashboards</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#jira-tab" id="jira-link">JIRA Board</a>
		</li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="grafana-tab"></div>
		<div class="tab-pane" id="jira-tab"></div>
	</div>
</div>

<?php
// Include footer
include("includes/footer.php");
?>
