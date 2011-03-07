<?

function get_comment_thread($o, $name, $model_klass)
{
  $ct = CommentThread::find_or_create_by( array (
    'conditions'=>array("object_type = ? and object_id = ? and name = ?", $model_klass, $o->id, $name),
    'attributes'=>array(
      'object_type'=>$model_klass,
      'object_id'=>$o->id,
      'name'=>$name
    )
  ));
  return $ct;
}

function sort_by_score($a, $b)
{
  $a = $a->rating_thread->score;
  $b = $b->rating_thread->score;
   if ($a == $b) {
       return 0;
   }
   return ($a > $b) ? -1 : 1;
} 

function comments_by_vote_count($a,$b)
{
  if($a->rating_threads('default')->vote_count < $b->rating_threads('default')->vote_count) return 1;
  if($a->rating_threads('default')->vote_count > $b->rating_threads('default')->vote_count) return -1;
  if($a->rating_threads('default')->updated_at < $b->rating_threads('default')->updated_at) return 1;
  if($a->rating_threads('default')->updated_at > $b->rating_threads('default')->updated_at) return -1;
  return 0;
}
