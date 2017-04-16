$('#messages').height(window.innerHeight - ($('#thread_name').outerHeight(true) + $('#message-form').outerHeight(true) + 30));

function edit_message() {
  $('form').attr('action', '/board/edit_message.php');
}

function delete_message() {
  $('form').attr('action', '/board/delete_message.php');
}
