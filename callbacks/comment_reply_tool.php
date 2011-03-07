<?
if (isset($params)) {
  if (array_key_exists('id', $params)) {
    $ct = CommentThread::find_by_id($params['id']);
  }
  if (array_key_exists('parent_comment_id', $params)) {
    $parent_comment_id = $params['parent_comment_id'];
  }
}