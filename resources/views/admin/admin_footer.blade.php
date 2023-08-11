   <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="#" target="_blank">Ecommerce Dashboard</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->

  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('js/ruang-admin.min.js')}}"></script>
  <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>  
  <script src="{{asset('js/timepicker/mdtimepicker.min.js')}}"></script>
    <!-- datatable fucking links -->
  

    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/datatables/cdn.datatables.net/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/datatables/cdn.datatables.net/buttons.flash.min.js')}}"></script>
    <script src="{{asset('js/datatables/cdnjs.cloudflare.com/jszip.min.js')}}"></script>
    <script src="{{asset('js/datatables/cdn.rawgit.com/vfs_fonts.js')}}"></script>
    <script src="{{asset('js/datatables/cdn.datatables.net/buttons.html5.min.js')}}"></script>
    <script src="{{asset('js/datatables/cdn.datatables.net/buttons.print.min.js')}}"></script>
    <script src="{{asset('js/datatables/datatables-init.js')}}"></script>
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
    @notifyJs
    <script src="{{asset('js/functions.js')}}"></script>
    

<script type="text/javascript">
$(document).ready(function(){
  
     $('#data_table').DataTable({
        dom: 'Blrftip',
        buttons: [
            'copy','excel','print'
        ]

  });
  
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  $('.timepicker').mdtimepicker();
  //Initializes the time picker


});


</script>

  <script type="text/javascript">
       @if(session('err'))
          swal('{{session("err")}}','','error');
       @endif
       @if(session('succ'))
          swal('{{session("succ")}}','','success');
       @endif
  </script>
    <!-- End fucking links -->
</body>

</html>