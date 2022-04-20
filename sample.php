<?php
include('includes/header.php');
include('includes/navbar.php');?>
	<!-- FAB button - bottom right on large screens -->
	<button id="info-toggler" type="button" class="btn btn-primary btn-fab btn-fixed-br d-none d-lg-inline-block">
		<svg class="icon-sprite">
			<use xlink:href="assets/images/icons-sprite.svg#info" />
		</svg>
	</button>

	<!-- SVG assets - not visible -->
	<svg id="svg-tool" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
		<defs>
			<style type="text/css">
				.glow circle {
					fill: url(index.php)
				}
			</style>
			<filter id="blur" x="-25%" y="-25%" width="150%" height="150%">
				<feGaussianBlur in="SourceGraphic" stdDeviation="3" />
			</filter>
			<radialGradient id="radial-glow" fx="50%" fy="50%" r="50%">
				<stop offset="0" stop-color="#0F9CE6" stop-opacity="1" />
				<stop offset="1" stop-color="#0F9CE6" stop-opacity="0" />
			</radialGradient>
		</defs>
	</svg>
<?php
include('include/script.php');
include('includes/footer.php');
?>