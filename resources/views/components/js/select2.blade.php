<!-- Select2 -->
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    })
</script>