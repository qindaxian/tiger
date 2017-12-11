<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>

			<li class="active">直播后台控制台</li>
			<li class="active">分类管理</li>
			<li class="active">分类添加</li>
		</ul><!-- .breadcrumb -->
	</div>

	<div class="page-content">
			<div class="row">
					<div class="col-xs-12">

					<?=Html::beginForm(['cat/add'],'post', ['class' => 'form-horizontal']);?>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 分类名 </label>

						<div class="col-sm-9">
							<input type="text" id="form-field-1" placeholder="分类名" name="name" class="col-xs-10 col-sm-5" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 排序 </label>

						<div class="col-sm-9">
							<input type="number" id="form-field-1" name="sort" min="0" class="col-xs-10 col-sm-5" />
						</div>
					</div>

					<div class="space-4"></div>

					<div class="space-4"></div>

					<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 所属上级分类 </label>

										<div class="col-sm-9">
											<select name="parent_id">
												<!-- <option value="">&nbsp;</option> -->
												<?php if (empty($cateInfo)): ?>
													<!-- 如果表空则显示分类为全部 父级id默认为0 -->
														<option value="1">全部</option>
													<?php else: ?>
														<?php foreach ($cateInfo as $key => $value): ?>
															<option value="<?=$value['id'] ?>"><?=str_repeat('--/',$value['lev']-1).$value['name'] ?></option>
														<?php endforeach ?>
												<?php endif ?>
											</select>

									    </div>
					</div>

					<div class="hr hr-24"></div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-3 col-md-9">
							
							<?= Html::submitButton('添加分类', ['class' => 'btn btn-info']) ?>
							&nbsp; &nbsp; &nbsp;
							<button class="btn" type="reset">
								<i class="icon-undo bigger-110"></i>
								重置信息
							</button>
						</div>
					</div>


				<?=Html::endForm()?>
					</div><!-- /span -->
				</div><!-- /row -->

	</div><!-- /.page-content -->
</div><!-- /.main-content -->