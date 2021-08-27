@if(session()->has('success'))
<script>
  		toastr.success("{{session()->get('success')}}");
</script>
@elseif(session()->has('info'))
<script>
  		toastr.info("{{session()->get('info')}}");
</script>
@elseif((session()->has('warning')))
<script>
  		toastr.warning("{{session()->get('warning')}}");
</script>
@elseif((session()->has('error')))
<script>
  		toastr.error("{{session()->get('error')}}");
</script>

@endif