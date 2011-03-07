<?

function comment_thread_get_recent_comments__d($ct)
{
  $comments = Comment::find_all(array(
    'conditions'=>array('comment_thread_id = ? AND killed_at IS NULL AND parent_comment_id is null', $ct->id),
    'order'=>'created_at desc',
    'limit'=>20
  ));
  return $comments;
}

function comment_thread_get_useful_comments__d($ct)
{
  $sorted_comments = $ct->comments;
  
  usort($sorted_comments, 'sort_by_score');

  return $sorted_comments;
}

function comment_thread_add_comment($ct, $user, $params)
{
  $comment = Comment::create( array(
    'attributes'=>array(
      'comment_thread_id'=>$ct->id,
      'author_id'=> ($user && $user->id!=null) ? $user->id : null,
      'body'=>$params['body'],
      'parent_comment_id'=> (array_key_exists('parent_comment_id', $params)) ? ((int)$params['parent_comment_id']) : null,
      'screen_name'=> ( array_key_exists('name', $params) ? $params['name'] : null )
    )
  ));
  return $comment;
}

function comment_thread_get_commented__d($ct)
{
  $klass = strtolower($ct->object_type);
  $id = $ct->object_id;
  if ( !function_exists("{$klass}_has_author") && !function_exists("{$klass}_has_author__d") )
  {
    click_error("{$klass}_has_author(\$user) must be implemented for comments to work.", $ct);
  }
  $o = eval("return $klass::find_by_id(\$id);");
  return $o;
}

function comment_thread_most_useful_comments($ct, $limit=10)
{
  event('most_useful_comments', array('ct'=>$ct, 'limit'=>$limit));

}