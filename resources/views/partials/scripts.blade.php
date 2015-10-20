<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/plugins/pjax/jquery.pjax.js') }}" type="text/javascript"></script>
<!-- nprogress -->
<script src="{{ asset('/js/nprogress.js') }}" type="text/javascript"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script type="text/javascript">
$(document).ready(function(){

    // does current browser support PJAX
    if ($.support.pjax) {
        $.pjax.defaults.timeout = 1000; // time in milliseconds
    }

});
//link menu only refresh notif and important html
$(document).pjax("a.menu", '.content-wrapper');
$(document).pjax(".pagination li a", '.box-body');
//
function searchMenu(){
	var form = $('.sidebar-form');

    $.pjax({
        container: "ul.sidebar-menu", 
	    timeout: 1000,
	    url: '/home',
	    data: form.serialize()
	});

	$('ul.sidebar-menu').on('pjax:success', function(event, data, status, xhr, options) {
		console.log(xhr,options);
 	    $.AdminLTE.tree('.sidebar');
 	});
};

$(document).on('pjax:start', function() { NProgress.start(); });
$(document).on('pjax:end',   function() { 
	NProgress.done();
});
</script>