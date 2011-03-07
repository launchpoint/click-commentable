<?

require_access('admin');

$comment = Comment::find_by_id($params['id']);
$comment->killed_at = time();
$comment->save();

flash_next('Comment killed.');
redirect_to(abuse_review_url());