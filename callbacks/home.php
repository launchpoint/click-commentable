<?

require_access('admin');

$comments = Comment::find_all( array(
  'joins'=>"join (
    SELECT
      C.*,
      SUM(R.value) AS abuse_report_count 
    FROM 
      (comments C 
        LEFT JOIN
      rating_threads RT ON (RT.object_type='Comment' AND RT.name='abuse' AND RT.object_id=C.id)) 
        LEFT JOIN
      ratings R ON R.rating_thread_id=RT.id 
    WHERE
      C.killed_at is null 
    GROUP BY
      C.id HAVING SUM(R.value) > 0
    ORDER BY
      abuse_report_count DESC, C.created_at desc
    ) d on d.id = comments.id"
));

