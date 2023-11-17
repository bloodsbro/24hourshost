<?php echo $admheader ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div class="d-flex flex-column-fluid">
		<div class="container">
			<div class="card card-custom">
				<div class="card-header">
					<div class="card-title">
						<h3 class="card-label">Список статей форума
						</h3>
					</div>
					<div class="card-toolbar">
						<a href="/admin/forum/create" class="btn btn-sm btn-icon btn-light-primary" data-toggle="tooltip" data-placement="right" title="" data-original-title="Добавить статью">
						<i class="flaticon2-add-square"></i>
						</a>
					</div>
				</div>
				<div class="card-body" style="padding: 0rem 1rem;">
					<div class="table-responsive">
						<table class="table table-head-custom table-vertical-center">
							<thead>
								<tr>
									<th><i class="fa fa-list-ol"></i></th>
									<th>Название</th>
									<th>Добавил</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($forum as $item): ?>
								<tr onClick="redirect('/admin/forum/edit/index/<?php echo $item['forum_id'] ?>')">
									<th><?php echo $item['forum_id'] ?></th>
									<td><?php echo $item['forum_title'] ?></td>
									<td><?php echo $item['user_lastname'] ?> <?php echo $item['user_firstname'] ?></td>
								</tr>
								<?php endforeach; ?>
								<?php if(empty($forum)): ?> 
								<tr>
									<td colspan="3" class="text-center">На данный момент нет статей.</td>
								</tr>
								<?php endif; ?> 
							</tbody>
						</table>
						<?php echo $pagination ?> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo $footer ?>