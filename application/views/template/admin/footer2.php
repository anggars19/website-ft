              </div><! --/row -->
          </section>
      </section>
	  <!--footer start-->
     <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/assets/js/gritter-conf.js"></script>

      <!--footer end-->
  </section>


	  
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.js"></script>
    <!-- <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery-1.8.3.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url() ?>assets/admin/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.sparkline.js"></script>
  
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <!--common script for all pages-->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/assets/js/gritter/js/jquery.gritter.js"></script>
        
		<script type="text/javascript" src="<?php echo base_url() ?>assets/admin/assets/date/bootstrap-datetimepicker.js" charset="UTF-8"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/admin/assets/date/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
        <script>
            let table = new DataTable('#myTable');
        </script>


		<script type="text/javascript">
		 $('.form_date').datetimepicker({
				language:  'id',
				weekStart: 1,
				todayBtn:  1,
		  autoclose: 1,
		  todayHighlight: 1,
		  startView: 2,
		  minView: 2,
		  forceParse: 0
			});
		</script>
        

		<script type="text/javascript">
		 $('.form_date2').datetimepicker({
				language:  'id',
				weekStart: 1,
				todayBtn:  1,
		  autoclose: 1,
		  todayHighlight: 1,
		  startView: 2,
		  minView: 2,
		  forceParse: 0
			});
		</script>
        <script>
    document.getElementById('menuSelect').addEventListener('change', function () {
        var menuSelect = document.getElementById('menuSelect');
        var submenuSelect = document.getElementById('submenuSelect');

        if (menuSelect.value !== '') {
            submenuSelect.disabled = true;
        } else {
            submenuSelect.disabled = false;
        }
    });

    document.getElementById('submenuSelect').addEventListener('change', function () {
        var menuSelect = document.getElementById('menuSelect');
        var submenuSelect = document.getElementById('submenuSelect');

        if (submenuSelect.value !== '') {
            menuSelect.disabled = true;
        } else {
            menuSelect.disabled = false;
        }
    });
</script>


   <!--script for this page-->
	<script src="<?php echo base_url() ?>assets/admin/assets/js/zabuto_calendar.js"></script>	
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                }
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>


	  
  </body>
</html>
