<?
$parent_comment_id = (array_key_exists('parent_comment_id', $params)) ? ((int)$params['parent_comment_id']) : (0);
$p = array(
  'attributes'=>array(
    'comment_thread_id'=>$params['id'],
    'parent_comment_id'=>$parent_comment_id,
    'author_id'=> (logged_in()) ? $current_user->id : null,
    'body'=>$params['comment']['body'],
    'screen_name'=>(logged_in()) ? null : (array_key_exists('screen_name', $params['comment']) ? $params['comment']['screen_name'] : null)
  )
);


$comment = Comment::create($p);

event('comment', array('comment'=>$comment));