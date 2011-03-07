<?

map('content', 'comments/:id', 'view', 'view_comments');
map('api', 'api/comments/:id/post', 'post', 'post_comment');
map('api', 'api/comments/:id/post_reply/:parent_comment_id', 'post');
map('api', 'api/comments/:id/reply_form/:parent_comment_id', 'comment_reply_tool');
map('api', 'api/comments/:id/children', 'comment_children');
map('content', 'admin/comments/review', 'home', 'abuse_review');
map('content', 'admin/comments/review/:id/kill', 'comment_kill', 'comment_kill');
