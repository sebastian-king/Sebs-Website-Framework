<!--===================================================-->
				<!--End page content-->


			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->


			
			<!--MAIN NAVIGATION-->
			<!--===================================================-->
			<nav id="mainnav-container">
				<div id="mainnav">

					<!--Menu-->
					<!--================================-->
					<div id="mainnav-menu-wrap">
						<div class="nano">
							<div class="nano-content">
								<ul id="mainnav-menu" class="list-group">
						
									<!--Category name-->
									<li class="list-header">Navigation</li>
						
									<!--Menu list item-->
									<li>
										<a href="/">
											<i class="fa fa-home"></i>
											<span class="menu-title">
												<strong>Home</strong>
											</span>
										</a>
									</li>
									<li>
										<a href="/statistics">
											<i class="fa fa-bar-chart"></i>
											<span class="menu-title">
												<strong>Statistics</strong>
											</span>
										</a>
								  </li>
						
									<li class="list-divider"></li>
						
									<!--Category name-->
									<li class="list-header">Movies</li>
									<li>
										<a href="/movie/browse">
											<i class="fa fa-film"></i>
											<span class="menu-title">Browse</span>
										</a>
									</li>
									<li>
										<a href="/movie/add">
											<i class="fa fa-plus"></i>
											<span class="menu-title">Add a movie</span>
										</a>
									</li>
									<li>
										<a href="/movie/random">
											<i class="fa fa-random"></i>
											<span class="menu-title">Random</span>
										</a>
									</li>
						
									<li class="list-divider"></li>
						
									<!--Category name-->
									<li class="list-header">Television</li>
									<li>
										<a href="/tv/browse">
											<i class="fa fa-television"></i>
											<span class="menu-title">Browse</span>
										</a>
									</li>
									<li>
										<a href="/tv/add">
											<i class="fa fa-plus"></i>
											<span class="menu-title">Add a TV show</span>
										</a>
									</li>
									<li>
										<a href="/tv/random">
											<i class="fa fa-random"></i>
											<span class="menu-title">Random</span>
									  </a>
								  </li>
								</ul>


								<!--Widget-->
								<!--================================-->
								<div class="mainnav-widget">

									<!-- Show the button on collapsed navigation -->
									<div class="show-small">
										<a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
											<i class="fa fa-desktop"></i>
										</a>
									</div>

									<!-- Hide the content on collapsed navigation -->
									<div id="demo-wg-server" class="hide-small mainnav-widget-content">
										<ul class="list-group">
											<li class="list-header pad-no pad-ver">Server Status</li>
											<li class="mar-btm">
												<span id="cpu_usage_val" class="label label-primary pull-right">0%</span>
												<p>CPU Usage</p>
												<div class="progress progress-sm">
													<div id="cpu_usage_bar" class="progress-bar progress-bar-primary" style="width: 0%;">
														<span class="sr-only">0%</span>
													</div>
												</div>
											</li>
											<li class="mar-btm">
												<span id="bandwidth_usage_val" class="label label-purple pull-right">0%</span>
												<p>Bandwidth</p>
												<div class="progress progress-sm">
													<div id="bandwidth_usage_bar" class="progress-bar progress-bar-purple" style="width: 0%;">
														<span class="sr-only">0%</span>
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<!--================================-->
								<!--End widget-->

							</div>						</div>
					</div>
					<!--================================-->
					<!--End menu-->

				</div>
			</nav>
			<!--===================================================-->
			<!--END MAIN NAVIGATION-->

		</div>

		

		<!-- FOOTER -->
		<!--===================================================-->
		<footer id="footer">



			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

			<p class="pad-lft">Movieventure 2014 - <?php echo date("Y"); ?></p>



		</footer>
		<!--===================================================-->
		<!-- END FOOTER -->


		<!-- SCROLL TOP BUTTON -->
		<!--===================================================-->
		<button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
		<!--===================================================-->



	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->

	
	<!--JAVASCRIPT-->
	<!--=================================================-->

	<!--jQuery [ REQUIRED ]-->
	<script src="/js/jquery-2.1.1.min.js"></script>


	<!--BootstrapJS [ RECOMMENDED ]-->
	<script src="/js/bootstrap.min.js"></script>


	<!--Fast Click [ OPTIONAL ]-->
	<script src="/assets/fast-click/fastclick.min.js"></script>

	
	<!--Nifty Admin [ RECOMMENDED ]-->
	<script src="/js/nifty.min.js"></script>


	<!--Switchery [ OPTIONAL ]-->
	<script src="/assets/switchery/switchery.min.js"></script>


	<!--Bootstrap Select [ OPTIONAL ]-->
	<script src="/assets/bootstrap-select/bootstrap-select.min.js"></script>

	
	<!-- websocket -->
    
    <script src="/js/ReconnectingWebsocket.js"></script>
	<script language="javascript" type="text/javascript">
    $(document).ready(function() {
	  
	  $(document).keypress(function(e) {
		if ((e.which == 102 || e.which == 70) && e.shiftKey && !$(":focus").is('[contenteditable="true"]') && !$(":focus").is("input[type!='radio'][type!='checkbox'][type!='date']:not(:disabled):not([readonly]), textarea:text:not(:disabled):not([readonly])")) {
			$("#search-box").focus();
			e.preventDefault();
		}
	  });
	  
      window.websocket = new ReconnectingWebSocket("wss://" + window.location.hostname + ":10888", "notifications");
      websocket.onopen = function(evt) {
      console.log("WebSocket: CONNECTED");
      };
      websocket.onclose = function(evt) {
      console.log("WebSocket: DISCONNECTED");
      };
      websocket.onmessage = function(evt) {
		if (JSON.parse(evt.data)) {
			var data = JSON.parse(evt.data);
			if (typeof(data.cpu_usage) == "number" && typeof(data.bandwidth_usage) == "number") {
				$("#cpu_usage_bar").css("width", Math.round(data.cpu_usage) + "%").children().text(Math.round(data.cpu_usage) + "%");
				$("#cpu_usage_val").text(Math.round(data.cpu_usage) + "%");
				$("#bandwidth_usage_bar").css("width", Math.round(data.bandwidth_usage) + "%").children().text(Math.round(data.bandwidth_usage) + "%");
				$("#bandwidth_usage_val").text(Math.round(data.bandwidth_usage) + "%");
			} else if (typeof(data.test_pushbullet) == "string") {
				if (data.test_pushbullet == "message sent") {
					$.niftyNoty({
						type: "success",
						container: 'page',
						html: "A test push notification has been sent to your selected devices.",
						timer: 5000
					})
				} else {
					$.niftyNoty({
						type: "danger",
						container: 'page',
						html: "An error occurred when attempting to send a notification to your selected devices.",
						timer: 5000
					})
				}
				$("#pushbullet-test").html("<i class='fa fa-cloud'></i>" + $("#pushbullet-test").text());
			}
			//console.log("WebSocket JSON message: ");
			//console.log(JSON.parse(evt.data));
		} else {
        	console.log("WebSocket message: " + evt.data);
		}
      };
      websocket.onerror = function(evt) {
      };
    });
    </script>

</body>
</html>
