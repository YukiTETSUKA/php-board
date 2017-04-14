<?php /* スレッドでのやり取りを表示し，メッセージの投稿ができるページ */
require_once 'base_class.php';

class ThreadController extends BaseClass {
  private $messages = array();

  function __construct() {
    parent::__construct();

    $thread      = $this->obtain_thread();
    $this->title = $thread['name'];

    $this->messages = $this->obtain_messages();
  } /* end of __construct */

  function generate_html() {
    $this->body .= "<h1>{$this->title}</h1>";
    $this->body .= $this->generate_message_list();
    $this->body .= $this->generate_form();
  } /* end of generate_html */

  private function generate_message_list() {
    $retval = '';

    $retval .= '<div>';
    foreach ($this->messages as $message) {
      $retval .= '<p>';
      $retval .= "<span>{$message['name']} - {$message['created_at']}</span><br />";
      $retval .= htmlspecialchars($message['body']);
      $retval .= '</p>';
    }
    $retval .= '</div>';

    return $retval;
  } /* end of generate_message_list */

  private function generate_form() {
    $retval = '';

    $retval .= '<form action="/board/post_message.php" method="post" class="form-inline" id="message-form">';
    $retval .= '<input type="text" name="name" placeholder="ハンドルネームを入力" class="form-control col-md-2" />';
    $retval .= '<input type="text" name="body" placeholder="メッセージを入力" class="form-control col-md-8" required />';
    $retval .= '<input type="submit" value="メッセージを投稿" class="btn btn-primary btn-sm" />';
    $retval .= '</form>';

    return $retval;
  } /* end of generate_form */

  private function obtain_thread() {
    return $this->database->get('threads', '*', array('id' => intval($_GET['id'])));
  } /* end of obtain_thread */

  private function obtain_messages() {
    return $this->database->select('messages', '*', array(
      'thread_id' => intval($_GET['id']),
      'ORDER'     => array('id' => 'DESC')
    ));
  }
} /* end of ThreadController */

$controller = new ThreadController();
$controller->generate_html();

include 'layout.php';
