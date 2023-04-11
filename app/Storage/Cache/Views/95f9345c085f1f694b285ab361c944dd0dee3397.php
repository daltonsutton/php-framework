<!doctype html>
<html lang="<?php echo e($language); ?>">
<head>
  <meta charset="<?php echo e($charset); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo e($title); ?></title>
  <?php echo styles($styles); ?>

</head>
<body class="flex flex-col h-screen w-full items-center justify-center bg-bunker-950">
  
  <span class="text-4xl md:text-7xl font-bold text-bunker-100"><?php echo e($title); ?></span>
  <span class="text-lg md:text-2xl text-bunker-200"><?php echo $content; ?></span>

  <?php echo scripts($scripts); ?>

</body>
</html><?php /**PATH /Users/daltonsutton/Projects/php-framework/app/views/error.blade.php ENDPATH**/ ?>