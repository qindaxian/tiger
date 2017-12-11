<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

			<li class="active">直播后台控制台</li>
			<li class="active">角色管理</li>
			<li class="active">角色添加</li>
		</ul><!-- .breadcrumb -->
	</div>

	<div class="page-content">
			<div class="row">
					<div class="col-xs-12">

					<?= Html::beginForm(['rbac/role_add'],'post',['class'=>'form-horizontal'])?>
					<br>
					<br>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 角色添加 </label>

						<div class="col-sm-9">
							<input type="text" name="role_name" id="form-field-1" placeholder="请输入角色名" class="col-xs-10 col-sm-5" />
						</div>
					</div>

					<div class="space-4"></div>


					<div class="hr hr-24"></div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-3 col-md-9">
							<?= Html::submitButton('添加角色',['class' => 'btn btn-info'])?>

							&nbsp; &nbsp; &nbsp;
							<button class="btn" type="reset">
								<i class="icon-undo bigger-110"></i>
								重置信息
							</button>
						</div>
					</div>


				<?= Html::endForm();?>
					</div><!-- /span -->
				</div><!-- /row -->

	</div><!-- /.page-content -->
</div><!-- /.main-content -->