<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

			<li class="active">直播后台控制台</li>
			<li class="active">分类管理</li>
			<li class="active">分类添加</li>
		</ul><!-- .breadcrumb -->
	</div>

	<div class="page-content">
			<div class="row">
					<div class="col-xs-12">

					<?= Html::beginForm(['rbac/add'],'post',['class'=>'form-horizontal'])?>

					<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 用户 </label>

							<div class="col-sm-9">
								<select name="admin_id">
									<option value="">请选择</option>
									<?php if (!empty($admin)): ?>
										<?php foreach ($admin as $k => $v): ?>
											<option value="<?=$v['id']?>"><?= $v['username']?></option>
										<?php endforeach ?>
									<?php else: ?>
										<option value="">请先注册</option>
									<?php endif ?>
								</select>

						    </div>
					</div>
					<div class="space-4"></div>

					<div class="space-4"></div>

					<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 角色 </label>

							<div class="col-sm-9">
								<select name="role_id">
									<option value="">请选择</option>
									<?php if (!empty($role)): ?>
										<?php foreach ($role as $k => $v): ?>
											<option value="<?=$v['id']?>"><?= $v['role_name']?></option>
										<?php endforeach ?>
									<?php else: ?>
										<option value="">请先添加角色</option>
									<?php endif ?>
								</select>

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