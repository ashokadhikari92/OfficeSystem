@extends('layouts.master')

@section('content')
<div class="col-lg-9 main-chart">

                     <div class="row mt">
                      <!-- SERVER STATUS PANELS -->
                      	<div class="col-md-4 col-sm-4 mb">
                      		<div class="white-panel pn donut-chart">
                      			<div class="white-header"  style="background: #424A5D">
						  			<h5>AVAILABLE PROJECTS</h5>
                      			</div>
								<div class="row">
									<div class="col-sm-6 col-xs-6 goleft">
										<p><i class="fa fa-folder-open"></i>{{$project}}</p>
									</div>
	                      		</div>
	                      		<div class="centered">
                                    <a href="{{route('projects.index')}}"><img src="assets/img/dashboard-icons/projects-icon1.png" width="120"></a>
                                </div>
								<canvas id="serverstatus01" height="120" width="120"></canvas>
								<script>
									var doughnutData = [
											{
												value: 70,
												color:"#68dff0"
											},
											{
												value : 30,
												color : "#fdfdfd"
											}
										];
										var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
								</script>
	                      	</div><! --/grey-panel -->
                      	</div><!-- /col-md-4-->


                      	<div class="col-md-4 col-sm-4 mb">
                      		<div class="white-panel pn">
                      			<div class="white-header"  style="background: #424A5D">
						  			<h5>CURRENT USERS</h5>
                      			</div>
								<div class="row">
									<div class="col-sm-6 col-xs-6 goleft">
										<p><i class="fa fa-users"></i>{{$user}}</p>
									</div>
									<div class="col-sm-6 col-xs-6"></div>
	                      		</div>
	                      		<div class="centered">
										<a href="{{route('users.index')}}"><img src="assets/img/dashboard-icons/users_icon.png" width="120"></a>
	                      		</div>
                      		</div>
                      	</div><!-- /col-md-4 -->

						<div class="col-md-4 mb">
							<!-- WHITE PANEL - TOP USER -->
							<div class="white-panel pn">
								<div class="white-header"  style="background: #424A5D">
									<h5>OUR CLIENTS</h5>
								</div>
								<div class="row">
                                    <div class="col-sm-6 col-xs-6 goleft">
                                       <p><i class="fa fa-tasks"></i>{{$client}}</p>
                                    </div>
                                </div>
	                      		<div class="centered">
                                    <a href="{{route('clients.index')}}"><img src="assets/img/dashboard-icons/clients_icon.png" width="120"></a>
                                </div>

							</div>
						</div><!-- /col-md-4 -->


                    </div><!-- /row -->
                                         <div class="row mt">
                                          <!-- SERVER STATUS PANELS -->
                                          	<div class="col-md-4 col-sm-4 mb">
                                          		<div class="white-panel pn ">
                                          			<div class="white-header"  style="background: #424A5D">
                    						  			<h5>PROJECT TASKS</h5>
                                          			</div>
                    								<div class="row">
                    									<div class="col-sm-6 col-xs-6 goleft">
                    										<p><i class="fa fa-tasks"></i>{{$task}}</p>
                    									</div>
                    	                      		</div>
                                                    <div class="centered">
                                                        <a href="{{route('tasks.index')}}"><img src="assets/img/dashboard-icons/tasks_icon1.png" width="120"></a>
                                                    </div>

                    								<canvas id="serverstatus01" height="120" width="120"></canvas>
                    								<script>
                    									var doughnutData = [
                    											{
                    												value: 70,
                    												color:"#68dff0"
                    											},
                    											{
                    												value : 30,
                    												color : "#fdfdfd"
                    											}
                    										];
                    										var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
                    								</script>
                    	                      	</div><! --/grey-panel -->
                                          	</div><!-- /col-md-4-->


                                          	<div class="col-md-4 col-sm-4 mb">
                                          		<div class="white-panel pn">
                                          			<div class="white-header"  style="background: #424A5D">
                    						  			<h5>ISSUES / BUGS</h5>
                                          			</div>
                    								<div class="row">
                    									<div class="col-sm-6 col-xs-6 goleft">
                    										<p><i class="fa fa-bug"></i>{{$issue}}</p>
                    									</div>
                    									<div class="col-sm-6 col-xs-6"></div>
                    	                      		</div>
                                                    <div class="centered">
                                                        <a href="{{route('issues.index')}}"><img src="assets/img/dashboard-icons/bugs_icon.png" width="120"></a>
                                                    </div>

                    	                      		<div class="centered">
                    										{{--<img src="assets/img/product.png" width="120">--}}
                    	                      		</div>
                                          		</div>
                                          	</div><!-- /col-md-4 -->

                    						<div class="col-md-4 mb">
                    							<!-- WHITE PANEL - TOP USER -->
                    							<div class="white-panel pn">
                    								<div class="white-header" style="background: #424A5D">
                    									<h5>TIME SHEETS</h5>
                    								</div>
                    								<div class="row">
                                                       <div class="col-sm-6 col-xs-6 goleft">
                                                           <p><i class="fa fa-clock-o"></i></p>
                                                       </div>
                                                    <div class="col-sm-6 col-xs-6"></div>
                                                    </div>
                    								<p><img src="assets/img/dashboard-icons/timesheets_icon.png" class="img-circle" width="120"></p>
                    								<div class="row">
                    									<div class="col-md-6">
                    										{{--<p class="small mt">CLIENT SINCE</p>--}}

                    									</div>
                    									{{--<div class="col-md-6">
                    										<p class="small mt">TOTAL SPEND</p>
                    										<p>$ 47,60</p>
                    									</div>--}}
                    								</div>
                    							</div>
                    						</div><!-- /col-md-4 -->


                                        </div><!-- /row -->


					{{--<div class="row">
						<!-- TWITTER PANEL -->
						<div class="col-md-4 mb">
                      		<div class="darkblue-panel pn">
                      			<div class="darkblue-header">
						  			<h5>DROPBOX STATICS</h5>
                      			</div>
								<canvas id="serverstatus02" height="120" width="120"></canvas>
								<script>
									var doughnutData = [
											{
												value: 60,
												color:"#68dff0"
											},
											{
												value : 40,
												color : "#444c57"
											}
										];
										var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
								</script>
								<p>April 17, 2014</p>
								<footer>
									<div class="pull-left">
										<h5><i class="fa fa-hdd-o"></i> 17 GB</h5>
									</div>
									<div class="pull-right">
										<h5>60% Used</h5>
									</div>
								</footer>
                      		</div><! -- /darkblue panel -->
						</div><!-- /col-md-4 -->


						<div class="col-md-4 mb">
							<!-- INSTAGRAM PANEL -->
							<div class="instagram-panel pn">
								<i class="fa fa-instagram fa-4x"></i>
								<p>@THISISYOU<br/>
									5 min. ago
								</p>
								<p><i class="fa fa-comment"></i> 18 | <i class="fa fa-heart"></i> 49</p>
							</div>
						</div><!-- /col-md-4 -->

						<div class="col-md-4 col-sm-4 mb">
							<!-- REVENUE PANEL -->
							<div class="darkblue-panel pn">
								<div class="darkblue-header">
									<h5>REVENUE</h5>
								</div>
								<div class="chart mt">
									<div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,464,655]"></div>
								</div>
								<p class="mt"><b>$ 17,980</b><br/>Month Income</p>
							</div>
						</div><!-- /col-md-4 -->

					</div><!-- /row -->--}}

                  </div><!-- /col-lg-9 END SECTION MIDDLE -->

@stop

@section('right_side')

     <div class="col-lg-3 ds">
        <!--COMPLETED ACTIONS DONUTS CHART-->
         @include('...dashboard.notification')

         <!-- USERS ONLINE SECTION -->
         @include('...dashboard.teamMembers')

         <!-- CALENDAR-->
         @include('...dashboard.calender')

     </div><!-- /col-lg-3 -->
@stop