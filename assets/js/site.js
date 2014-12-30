$(function() {
	$('#upload_files').submit(function(e) {
		e.preventDefault();
		$.ajaxFileUpload({
			url 			:'../upload_img/', 
			secureuri		:false,
			fileElementId	:'userfile',
			dataType		: 'json',
			data			: {
				'title'				: $('#title').val(),
				'type'				: $('#type').val(),
				'id_type'			: $('#id_type').val(),
				'id_photographer'   : $('#id_photographer').val(),
				'main'				: $('#main').val()
			},
			success	: function (data, status)
			{
				if(data.status != 'error')
				{
					$('#files').html('<p>Reloading files...</p>');
					refresh_files();
					$('#title').val('');
				}
				alert(data.msg);
			}
		});
		return false;
	});
});
$(function() {
	$('#upload_files_other').submit(function(e) {
		e.preventDefault();
		$.ajaxFileUpload({
			url 			:'../upload_img_other/', 
			secureuri		:false,
			fileElementId	:'userfile',
			dataType		: 'json',
			data			: {
				'title'				: $('#title').val(),
				'type'				: $('#type').val(),
				'id_type'			: $('#id_type').val(),
				'id_photographer'   : $('#id_photographer').val(),
				'main'				: $('#main').val()
			},
			success	: function (data, status)
			{
				if(data.status != 'error')
				{
					$('#files').html('<p>Reloading files...</p>');
					refresh_files();
					$('#title').val('');
				}
				alert(data.msg);
			}
		});
		return false;
	});
});
$(function() {
	$('#upload_file').submit(function(e) {
		e.preventDefault();
		$.ajaxFileUpload({
			url 			:'./upload/upload_file/', 
			secureuri		:false,
			fileElementId	:'userfile',
			dataType		: 'json',
			data			: {
				'title'				: $('#title').val()
			},
			success	: function (data, status)
			{
				if(data.status != 'error')
				{
					$('#files').html('<p>Reloading files...</p>');
					refresh_files();
					$('#title').val('');
				}
				alert(data.msg);
			}
		});
		return false;
	});
});

function refresh_files()
{
	$.get('./upload/files/')
	.success(function (data){
		$('#files').html(data);
	});
}
