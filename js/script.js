(function ($){
	$(function (){
		$('.btn-file').each(function (){
			var self = this;
			$('input[type=file]', this).change(function (){
				// remove existing file info
				$(self).next().remove();
				// get value
				var value = $(this).val();
				// get file name
				var fileName = value.substring(value.lastIndexOf('/')+1);
				// get file extension
				var fileExt = fileName.split('.').pop().toLowerCase();
				// append file info
				$('<span><i class="icon-file icon-' + fileExt + '"></i><br /> ' + value + '</span>').insertAfter(self);
			});
		});			
		
		$('.status .close').click(function(){
			$(this).parent().hide();
		});
	});
})(jQuery);