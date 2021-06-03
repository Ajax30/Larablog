require('./bootstrap');

(function() {
	//Delete Avatar
	$('#delete-avatar').on('click', function(evt) {
			evt.preventDefault();
			var $avatar = $('#avatar-container').find('img');
			var $topAvatar = $('#top_avatar');
			var $trashIcon = $(this);
			var defaultAvatar = APP_URL + '/images/avatars/default.png';

			//Get user's ID
			var id = $(this).data('uid');
			var fileName = $avatar.attr('src').split('/').reverse()[0];

			if (confirm('Delete the avatar?')) {
					var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
					$.ajax({
							url: APP_URL + `/dashboard/profile/deleteavatar/${id}/${fileName}`,
							method: 'POST',
							data: {
									id: id,
									fileName: fileName,
									_token: CSRF_TOKEN,
							},
							success: function() {
									$avatar.attr('src', defaultAvatar);
									$topAvatar.attr('src', defaultAvatar);
									$trashIcon.remove();
							}
					});
			}
	});
})();

