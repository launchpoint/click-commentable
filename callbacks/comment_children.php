<?
$comments = Comment::find_all(
  array(
    'conditions' => array("parent_comment_id = ?", $params['id']),
    'order' => "id ASC"
  )
);