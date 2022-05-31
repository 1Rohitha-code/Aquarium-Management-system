@extends('admin.dashboard')


@section('admin.navbar')


@endsection

@section('content')

<div class="container-fluid p-0">

					<!-- <h1 class="h3 mb-3">Construction Process</h1> -->

					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<h3 class="h3 mb-3">Day to day Progress</h3>
									
								</div>
								<div class="card-body">
									<div class="chart">
										<canvas id="chartjs-line"></canvas>
									</div>
								</div>
							</div>
						</div>

						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
                                <h3 class="h3 mb-3">Construction process up to deadlines</h3>
								</div>
								<div class="card-body">
									<div class="chart">
										<canvas id="chartjs-bar"></canvas>
									</div>
								</div>
							</div>
						</div>

						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Doughnut Chart</h5>
									<h6 class="card-subtitle text-muted">Doughnut charts are excellent at showing the relational proportions between data.</h6>
								</div>
								<div class="card-body">
									<div class="chart chart-sm">
										<canvas id="chartjs-doughnut"></canvas>
									</div>
								</div>
							</div>
						</div>

						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Pie Chart</h5>
									<h6 class="card-subtitle text-muted">Pie charts are excellent at showing the relational proportions between data.</h6>
								</div>
								<div class="card-body">
									<div class="chart chart-sm">
										<canvas id="chartjs-pie"></canvas>
									</div>
								</div>
							</div>
						</div>

						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Radar Chart</h5>
									<h6 class="card-subtitle text-muted">A radar chart is a way of showing multiple data points and the variation between them.</h6>
								</div>
								<div class="card-body">
									<div class="chart">
										<canvas id="chartjs-radar"></canvas>
									</div>
								</div>
							</div>
						</div>

						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Polar Area Chart</h5>
									<h6 class="card-subtitle text-muted">Polar area charts are similar to pie charts, but each segment has the same angle.</h6>
								</div>
								<div class="card-body">
									<div class="chart">
										<canvas id="chartjs-polar-area"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

@endsection

