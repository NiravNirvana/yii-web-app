
<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">Dashboard</h3>
			<span class="kt-subheader__separator kt-subheader__separator--v"></span>
			
		</div>
		
	</div>
</div>
<!-- end:: Content Head -->

<div class="col-xl-12">

	<!--begin:: Widgets/Quick Stats-->
	<div class="row row-full-height">
		<div class="col-sm-12 col-md-12 col-lg-4">
			<div onclick="location.href='sv'" class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-brand">
				<div class="kt-portlet__body kt-portlet__body--fluid">
					<div class="kt-widget26">
						<div class="kt-widget26__content">
							<span class="kt-widget26__number"><?php if(isset($result[0]['n']))echo $result[0]['n']; else echo "0"; ?></span>
							<span class="kt-widget26__desc">Total 'o ' Users</span>
						</div>
						<div class="kt-widget26__chart" style="height:100px; width: 230px;">
							<canvas id="kt_chart_quick_stats_3"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="kt-space-20"></div>
		</div>
	
		
		<div class="col-sm-12 col-md-12 col-lg-4">
			<div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-brand">
				<div onclick="location.href='pssv'" class="kt-portlet__body kt-portlet__body--fluid">
					<div class="kt-widget26">
						<div class="kt-widget26__content">
							<span class="kt-widget26__number"><?php if(isset($result1[0]['n']))echo $result1[0]['n']; else echo "0"; ?></span>
							<span class="kt-widget26__desc">Total 'o Status' Users</span>
						</div>
						<div class="kt-widget26__chart" style="height:300px; width: 230px;">
							<canvas id="kt_chart_quick_stats_4"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="kt-space-20"></div>
		</div>
		
		
		<!--
		<div class="col-sm-12 col-md-12 col-lg-4">
			<div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-brand">
				<div class="kt-portlet__body kt-portlet__body--fluid">
					<div class="kt-widget26">
						<div class="kt-widget26__content">
							<span class="kt-widget26__number">570</span>
							<span class="kt-widget26__desc">Total Sales</span>
						</div>
						<div class="kt-widget26__chart" style="height:100px; width: 230px;">
							<canvas id="kt_chart_quick_stats_4"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="kt-space-20"></div>
		</div>
		-->
	
	</div>
	<!--end:: Widgets/Quick Stats-->
	
	
</div>