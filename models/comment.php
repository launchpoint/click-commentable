<?

Comment::$eager_load[] = 'author';

function comment_get_commented__d($c)
{
  return $c->comment_thread->commented;
}

function comment_has_author__d($c, $u)
{
  if ($c->id == null || $u->id==null) return false;
  $klass = get_class($c->commented);
  $f = "{$klass}_has_author";
  if (!function_exists($f))
  {
    click_error("The comment module requires that $f() is defined.", $c);
  }
  return $c->commented->has_author($u);
}