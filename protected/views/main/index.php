<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>

<h1>Наши книги</h1>
<div class="row">
	<form class="form-horizontal row_g" id="searchForm" role="form" method="get">	
		<input type="hidden" name="order" id="order" value="id">
		<input type="hidden" name="sort"  id="sort"  value="asc">
		<div class="row">
			<div class="col-lg-3">
				<select name="t_q" class="form-control" >
					<option value="name" <?=(Yii::app()->request->getQuery('t_q') == 'name')? 'selected' : ''?>>Название</option>
					<option value="authors" <?=(Yii::app()->request->getQuery('t_q') == 'authors')? 'selected' : ''?>>Автор</option>
				</select>
			</div>
			<div class="col-lg-3">
				<input class="form-control" name="q" value="<?=Yii::app()->request->getQuery('q')?>" type="text">
			</div>
			<div class="col-lg-4"></div>
			<?php if(!empty(Yii::app()->request->getQuery('t_q'))): ?>
				<div class="col-lg-2 text-right">
					<a href="/" class="btn btn-danger form-control" type="submit" >Сбросит</a>
				</div>
			<?php endif; ?>
			
		</div>
		<div class="row">
			
			<div class="col-lg-3">
				<div class="input-group">	
					<span class="input-group-addon">Дата выхода книги :</span>	
					<input class="form-control date_pic" name="date_s" value="<?=Yii::app()->request->getQuery('date_s')?>" type="text">
				</div>
			</div>	
			<div class="col-lg-2 text-left">
				<div class="input-group">	
					<span class="input-group-addon">до:</span>	
					<input class="form-control date_pic" name="date_e" value="<?=Yii::app()->request->getQuery('date_e')?>" type="text">
				</div>
			</div>	
			<div class="col-lg-5">
			</div>
			<div class="col-lg-2 text-right">
				<button class="btn btn-default form-control" type="submit" >Искать</button>
			</div>
		</div>
		<?php if(!Yii::app()->user->isGuest):?>
			<div class="row text-right">
				<div class="col-lg-10"></div>
				<div class="col-lg-2">
					<a href="/book/add/" class="btn btn-success form-control" >Добавить книгу</a>
				</div>
			</div>
		<?php endif;?>
	</form>		
</div>
<div class="row">
    <br>
	<div class="table-responsive">
		<table class="table table-striped table_books">
			<thead>
                <tr>
					<th>
						<a href="#" class="a_sort" data-sort="<?=($order == 'id') ? ($sort == 'asc') ? 'desc' : 'asc' : 'asc'?>" data-order="id">ИД
							<?php if($order == 'id'): ?>
								<i class="fa <?=($sort == 'asc') ? 'fa-chevron-down' : 'fa-chevron-up'?>" aria-hidden="true"></i>
							<?php elseif (empty($order)):?>
								<i class="fa fa-chevron-down" aria-hidden="true"></i>
							<?php endif; ?>		
						</a>
					</th>
					<th>
						<a href="#" class="a_sort" data-sort="<?=($order == 'name') ? ($sort == 'asc') ? 'desc' : 'asc' : 'asc'?>" data-order="name">Названия
							<?php if($order == 'name'): ?>
								<i class="fa <?=($sort == 'asc') ? 'fa-chevron-down' : 'fa-chevron-up'?>" aria-hidden="true"></i>
							<?php endif; ?>		
						</a>
					</th>
					<th>Превью</th>
					<th><a href="#" class="a_sort" data-sort="<?=($order == 'author') ? ($sort == 'asc') ? 'desc' : 'asc' : 'asc'?>" data-order="author">Автор
						<?php if($order == 'author'): ?>
							<i class="fa <?=($sort == 'asc') ? 'fa-chevron-down' : 'fa-chevron-up'?>" aria-hidden="true"></i>
						<?php endif; ?>		
						
						</a>
					</th>
					<th><a href="#" class="a_sort" data-sort="<?=($order == 'date') ? ($sort == 'asc') ? 'desc' : 'asc' : 'asc'?>" data-order="date">Дата выхода книги
						<?php if($order == 'date'): ?>
							<i class="fa <?=($sort == 'asc') ? 'fa-chevron-down' : 'fa-chevron-up'?>" aria-hidden="true"></i>
						<?php endif; ?>	
						</a>
					</th>
					<th>Дата добавления</th>
					<th></th>
                </tr>
            </thead>
            <tbody>
				<?php if(!empty($arBooks)): ?>
					<?php foreach ($arBooks as $book):?>
						<tr class="tr_book" data-id_book="<?=$book['id']?>" style="<?=(!empty($book['preview'])) ?  'height:120px' : ''?>">
							<td><?=$book['id']?></td>
							<td><?=$book['name']?></td>
							<td class="td_img"><img class="img_l" src="<?=$book['preview']?>" style="height:100px"></td>
							<td><?=$book['authors']['firstname']?> <?=$book['authors']['lastname']?></td>
							<td><?=date('d.m.y',$book['date'])?></td>
							<td><?=date('d.m.y',$book['date_create'])?></td>
							<td>
								<div class="row activ_btn_books">
									<?php if(!Yii::app()->user->isGuest):?>
										<div class="col-lg-2">
											<a href="/book/edit/<?=$book['id']?>/" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
										</div>
									<?php endif;?>
									<div class="col-lg-2">
										<a href="#" class="info_book" ><i class="fa fa-eye" aria-hidden="true"></i></a>
									</div>
									<?php if(!Yii::app()->user->isGuest):?>
										<div class="col-lg-2">
											<a href="#" class="delete_book"><i class="fa fa-times text-danger" aria-hidden="true"></i></a>
										</div>
									<?php endif;?>
								</div>
							</td>
						</tr>
					<?php endforeach;?>
				<?php endif; ?>
                
			</tbody>
		</table>
	</div>	
</div>	

<div class="modal fade" id="infobook_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Информация о книге:</h4>
			</div>
			<div class="modal-body" id="body_info_book">				
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
			</div>
	    </div>
	  </div>
	</div>