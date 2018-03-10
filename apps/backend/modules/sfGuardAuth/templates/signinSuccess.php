<?php decorate_with(dirname(__FILE__).'/loginLayout.php') ?>

	<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">

		<h3 class="form-title">Войти</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Введите Ваш логин и пароль. </span>
		</div>
		<div class="form-group">
            <?php echo $form['username']->renderLabel(null,array('class'=>'control-label visible-ie8 visible-ie9')) ?>
            <?php echo $form['username']->render(array(
                "class"=>"form-control form-control-solid placeholder-no-fix",
                "autocomplete"=>"off",
                "placeholder"=>$form['username']->renderLabelName()
            )); ?>
            
		</div>
		<div class="form-group">
        	<?php echo $form['password']->renderLabel(null,array('class'=>'control-label visible-ie8 visible-ie9')) ?>
            <?php echo $form['password']->render(array(
                "class"=>"form-control form-control-solid placeholder-no-fix",
                "autocomplete"=>"off",
                "placeholder"=>$form['password']->renderLabelName()
            )); ?>

		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase">Войти</button>
			<label class="rememberme check">
			<input type="checkbox" name="remember" value="1"/>Запомнить </label>
			<a href="javascript:;" id="forget-password" class="forget-password">Напомнить пароль</a>
		</div>
		<div class="login-options">
			<h4>Or login with</h4>
			<ul class="social-icons">
				<li>
					<a class="social-icon-color facebook" data-original-title="facebook" href="javascript:;"></a>
				</li>
				<li>
					<a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;"></a>
				</li>
				<li>
					<a class="social-icon-color googleplus" data-original-title="Goole Plus" href="javascript:;"></a>
				</li>
				<li>
					<a class="social-icon-color linkedin" data-original-title="Linkedin" href="javascript:;"></a>
				</li>
			</ul>
		</div>
		<div class="create-account">
			<p>
				<a href="javascript:;" id="register-btn" class="uppercase">Создать аккаунт</a>
			</p>
		</div>
	</form>
