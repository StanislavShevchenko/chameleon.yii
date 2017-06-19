<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>
<?php if(!empty($book)):?>
	<h1>Редактирование книги "<i><?=$book['name']?></i>"</h1>
<?php else:?>
	<h1>Новая книга</h1>
<?php endif;?>
<hr>
	<div class="row">
		<div class="col-lg-12">
			<form class="form-horizontal row_b" role="form" method="post" enctype='multipart/form-data'>	
				<div class="row">
					<div class="col-lg-6">
						<div class="input-group">	
							<span class="input-group-addon">Название книги:</span>	
							<input class="form-control" name="BOOK[name]" value="<?=$book['name']?>" type="text">
						</div>
					</div>
					<div class="col-lg-6 error" style="<?=(!empty($errors['name']))? '	display: block':''?>">
						<?=$errors['name']['0'] ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="input-group">	
							<span class="input-group-addon">Автор книги:</span>	
							<select name="BOOK[author_id]" class="form-control">
								<option></option>
								<?php foreach ($arAuthors as $key => $author):?>
									<option value="<?=$author['id']?>" <?=($author['id'] == $book['author_id']) ? 'selected' : ''?> ><?=$author['firstname']?> <?=$author['lastname']?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					<div class="col-lg-6 error" style="<?=(!empty($errors['author_id']))? '	display: block':''?>">
						<?=$errors['author_id']['0'] ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="input-group">	
							<span class="input-group-addon">Дата выхода:</span>	
							<input class="form-control date_pic" name="BOOK[date]" value="<?=($book['date'] > 0) ? date('d.m.Y', $book['date']):''?>" type="text">
						</div>
					</div>
				</div>
				<?php if(!empty($book['preview'])):?>
					<div class="row">
						<div class="col-lg-12">
							<img src="/<?=$book['preview']?>" class="preview_img_book">
						</div>
					</div>
				<?php endif;?>
				<div class="row">
					<div class="col-lg-6">
						<div class="input-group">	
							<span class="input-group-addon">Превью книги:</span>	
							<input  name="preview" value="" type="file">
						</div>
					</div>
					<div class="col-lg-6 error" style="<?=(!empty($errors['preview']))? '	display: block':''?>">
						<?=$errors['preview']['0'] ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 text-right">
						<?php if(!empty($book)):?>
							<button class="btn btn-primary" type="submit">Сохранить</button>
						<?php else:?>
							<button class="btn btn-primary" type="submit">Добавить</button>
						<?php endif;?>						
					</div>
				</div>
			</form>
		</div>
	</div>
<br>
