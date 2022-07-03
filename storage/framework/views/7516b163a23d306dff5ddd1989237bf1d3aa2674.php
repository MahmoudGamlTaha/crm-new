<!DOCTYPE html>
<html  lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo e($company->short_name); ?></title>
		<link rel="icon" type="image/png" href="<?php echo e($company->small_light_logo_url); ?>">
		<meta name="msapplication-TileImage" href="<?php echo e($company->small_light_logo_url); ?>">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700&display=swap">

		<?php if($themeMode == 'dark'): ?>
		<link rel="stylesheet" href="<?php echo e(asset('css/antd.dark.css')); ?>">
		<?php else: ?>
		<link rel="stylesheet" href="<?php echo e(asset('css/antd.css')); ?>">
		<?php endif; ?>
		<link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('css/pos_invoice_css.css')); ?>">
    </head>
    <body class="<?php echo e($themeMode == 'dark' ? 'dark_theme' : 'light_theme'); ?>">
        <div id="app"></div>
        <script>
            window.config = {
                'path': '<?php echo e(url('/')); ?>',
                'invoice_url': "<?php echo e(route('api.extra.pdf.v1', '')); ?>",
                'pos_invoice_css': "<?php echo e(asset('css/pos_invoice_css.css')); ?>",
                'verify_purchase_background': "<?php echo e(asset('images/verify_purchase_background.svg')); ?>",
                'login_background': "<?php echo e(asset('images/login_background.svg')); ?>",
                'perPage': 10,
				'product_name': "<?php echo e($appName); ?>",
				'product_version': "<?php echo e($appVersion); ?>",
				'modules': <?php echo json_encode($enabledModules, 15, 512) ?>,
				'installed_modules': <?php echo json_encode($installedModules, 15, 512) ?>,
				'theme_mode': "<?php echo e($themeMode); ?>",
				'appChecking': true,
				'app_version': "<?php echo e($appVersion); ?>",
				'app_env': "<?php echo e($appEnv); ?>",
            };
        </script>
        <script src="<?php echo e(asset(mix('js/app.js'))); ?>"></script>
    </body>
</html><?php /**PATH E:\highcoder\crm\script\resources\views/welcome.blade.php ENDPATH**/ ?>