<?php echo $admheader ?>
<?php
   $mysqlExists = function_exists("mysqli_connect");   
   $ssh2Exists = function_exists("ssh2_connect");
   $gdExists = function_exists("gd_info");
?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div class="d-flex flex-column-fluid">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="card card-custom mb-3">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-head-custom table-vertical-center">
									<thead>
										<tr class="text-left">
											<th>Функция</th>
											<th>Статус</th>
											<th>Установка</th>
											<th>Информация</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Система</td>
											<td><?php echo php_uname('s') ?></td>
											<td><i class="fa fa-check-circle"></i></td>
											<td><?php echo php_uname() ?></td>
										</tr>
										<tr>
											<td>php_mysql</td>
											<td><?php if($mysqlExists): ?>Установлен<?php else: ?>Не установлен<?php endif; ?></td>
											<td><?php if($mysqlExists): ?><i class="fa fa-check-circle"></i><?php else: ?><code>apt-get install php-mysql</code><?php endif; ?></td>
											<td>Работоспособность бд для сервера.</td>
										</tr>
										<tr>
											<td>php_ssh2</td>
											<td><?php if($ssh2Exists): ?>Установлен<?php else: ?>Не установлен<?php endif; ?></td>
											<td><?php if($ssh2Exists): ?><i class="fa fa-check-circle"></i><?php else: ?><code>apt-get install php-ssh2</code><?php endif; ?></td>
											<td>Подключение по ssh.</td>
										</tr>
										<tr>
											<td>php_gd</td>
											<td><?php if($gdExists): ?>Установлен<?php else: ?>Не установлен<?php endif; ?></td>
											<td><?php if($gdExists): ?><i class="fa fa-check-circle"></i><?php else: ?><code>apt-get install php-gd</code><?php endif; ?></td>
											<td>Графики.</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<?php if($user_access_level >= 3):?>
				<div class="col-xl-12">
					<div class="card card-custom mb-3">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-head-custom table-vertical-center">
									<thead>
										<tr>
											<th>Время</th>
											<th>Ссылка для браузера</th>
											<th>Crontab</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1 раз в 00:00</td>
											<td><?php echo $url ?>main/cron/index?token=<?php echo $token ?></td>
											<td><code>0 0 * * * curl <?php echo $url ?>main/cron/index?token=<?php echo $token ?></code></td>
										</tr>
										<tr>
											<td>1 раз в минуту</td>
											<td><?php echo $url ?>main/cron/gameServers?token=<?php echo $token ?></td>
											<td><code>*/1 * * * * curl <?php echo $url ?>main/cron/gameServers?token=<?php echo $token ?></code></td>
										</tr>
										<tr>
											<td>1 раз в минуту</td>
											<td><?php echo $url ?>main/cron/tasks?token=<?php echo $token ?></td>
											<td><code>*/1 * * * * curl <?php echo $url ?>main/cron/tasks?token=<?php echo $token ?></code></td>
										</tr>
										<tr>
											<td>1 раз в 10 минут</td>
											<td><?php echo $url ?>main/cron/serverReloader?token=<?php echo $token ?></td>
											<td><code>0 */10 * * * curl <?php echo $url ?>main/cron/serverReloader?token=<?php echo $token ?></code></td>
										</tr>
										<tr>
											<td>1 раз в 30 минут</td>
											<td><?php echo $url ?>main/cron/stopServers?token=<?php echo $token ?></td>
											<td><code>*/30 * * * * curl <?php echo $url ?>main/cron/stopServers?token=<?php echo $token ?></code></td>
										</tr>
										<tr>
											<td>1 раз в 30 минут</td>
											<td><?php echo $url ?>main/cron/stopServersQuery?token=<?php echo $token ?></td>
											<td><code>*/30 * * * * curl <?php echo $url ?>main/cron/stopServersQuery?token=<?php echo $token ?></code></td>
										</tr>
										<tr>
											<td>1 раз в час</td>
											<td><?php echo $url ?>main/cron/updateStats?token=<?php echo $token ?></td>
											<td><code>* */1 * * * curl <?php echo $url ?>main/cron/updateStats?token=<?php echo $token ?></code></td>
										</tr>
										<tr>
											<td>1 раз в час</td>
											<td><?php echo $url ?>main/cron/updateStatsLocations?token=<?php echo $token ?></td>
											<td><code>* */1 * * * curl <?php echo $url ?>main/cron/updateStatsLocations?token=<?php echo $token ?></code></td>
										</tr>
										<tr>
											<td>1 раз в неделю</td>
											<td><?php echo $url ?>main/cron/clearLogs?token=<?php echo $token ?></td>
											<td><code>0 * */7 * * curl <?php echo $url ?>main/cron/clearLogs?token=<?php echo $token ?></code></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>