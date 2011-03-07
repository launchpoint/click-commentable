<?

foreach($models as $model_klass)
{
  $t = singularize(tableize($model_klass));

  if ($t=='comment' || $t=='comment_thread') continue;
  $code = <<<PHP
function {$t}_recent_comments__d(\$o, \$name='default')
{
  \$ct = \$o->comment_threads(\$name);
  return \$ct->recent_comments;
}

function {$t}_comment_threads__d(\$o, \$name='default')
{
  return get_comment_thread(\$o, \$name, '$model_klass');
}

function {$t}_get_comment_thread__d(\$o)
{
  return \$o->comment_threads();
}

function {$t}_get_comments(\$o, \$name='default')
{
  \$ct = \$o->comment_threads(\$name);
  return \$ct->comments;
}

function {$t}_get_comment_count__d(\$o)
{
  return \$o->comment_thread->comment_count;
}


PHP;
  $codegen[] = $code;
}

