<?

if (!isset($readonly)) $readonly=false;
if (!isset($ratable)) $ratable=false;
if (!isset($title)) $title='Most Useful Comments';
if (!isset($thread_name)) $thread_name = 'default';
if(!isset($limit)) $limit = 10;

$comments = $ct->comments;


usort($comments, 'comments_by_vote_count');
$recent_comments = array_slice($comments, 0, $limit);