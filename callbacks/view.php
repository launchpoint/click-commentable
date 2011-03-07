<?

$ct = CommentThread::find_by_id($params['id']);

$pages =0;
$page=p('page',1);

$comments = Comment::find_all( array(
  'conditions'=>array('comment_thread_id = ? AND killed_at is null and parent_comment_id is null', $ct->id),
  'order'=>'created_at desc',
  'current_page'=>$page,
  'page_size'=>20
));

