<div class="card card-custom mb-3">
   <nav class="nav nav-tabs">
			<a href="/serversp/control/index/<?php echo $server['server_id'] ?>" class="nav-link <?php if($activesection == "serversp" && $activeitem == "control"): ?>active<?php endif; ?>">
               <span class="nav-icon">
               <i class="fa fa-chalkboard-teacher"></i>
               </span>
               <span class="nav-text"><?php echo $server['location_ip'] ?>:<?php echo $server['server_port'] ?></span>
               </a>
			<li class="nav-item">
               <a href="/serversp/ftp/index/<?php echo $server['server_id'] ?>" class="nav-link <?php if($activesection == "serversp" && $activeitem == "ftp"): ?>active<?php endif; ?>">
               <span class="nav-icon">
               <i class="fa fa-server"></i>
               </span>
               <span class="nav-text">FTP</span>
               </a>
            </li>
            <li class="nav-item">
               <a href="/serversp/mysql/index/<?php echo $server['server_id'] ?>" class="nav-link <?php if($activesection == "serversp" && $activeitem == "mysql"): ?>active<?php endif; ?>">
               <span class="nav-icon">
               <i class="fa fa-database"></i>
               </span>
               <span class="nav-text">MySQL</span>
               </a>
            </li>
			<div class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Далее</a>
				<div class="dropdown-menu">
						<?php if($server['game_code'] == "mtasa" || $server['game_code'] == "samp" || $server['game_code'] == "crmp" || $server['game_code'] == "crmp037" || $server['game_code'] == "unit"): ?>
						<li class="nav-item">
						   <a href="/serversp/autoinstall/index/<?php echo $server['server_id'] ?>" class="nav-link <?php if($activesection == "serversp" && $activeitem == "autoinstall"): ?>active<?php endif; ?>">
						   <span class="nav-icon">
						   <i class="fa fa-fast-forward"></i>
						   </span>
						   <span class="nav-text">Автоустановка</span>
						   </a>
						</li>
						<?php endif; ?>
						<?if($server['server_status'] == 1 or $server['server_status'] == 2 or $server['server_status'] == 7):?>
						<li class="nav-item">
						   <a href="/serversp/console/index/<?php echo $server['server_id'] ?><?php if($server['game_query'] == "samp"): ?>?open=samp_1<?php endif; ?><?php if($server['game_query'] == "mtasa"): ?>?open=mtasa_1<?php endif; ?>" class="nav-link <?php if($activesection == "serversp" && $activeitem == "console"): ?>active<?php endif; ?>">
						   <span class="nav-icon">
						   <i class="fa fa-terminal"></i>
						   </span>
						   <span class="nav-text">Console</span>
						   </a>
						</li>
						<li class="nav-item">
						   <a href="/serversp/config/index/<?php echo $server['server_id'] ?>" class="nav-link <?php if($activesection == "serversp" && $activeitem == "config"): ?>active<?php endif; ?>">
						   <span class="nav-icon">
						   <i class="fa fa-edit"></i>
						   </span>
						   <span class="nav-text">Config</span>
						   </a>
						</li>
						<li class="nav-item">
						   <a href="/serversp/firewall/index/<?php echo $server['server_id'] ?>" class="nav-link <?php if($activesection == "serversp" && $activeitem == "firewall"): ?>active<?php endif; ?>">
						   <span class="nav-icon">
						   <i class="fa fa-user-shield"></i>
						   </span>
						   <span class="nav-text">Firewall</span>
						   </a>
						</li>
						<li class="nav-item">
						   <a href="/serversp/owner/index/<?php echo $server['server_id'] ?>" class="nav-link <?php if($activesection == "serversp" && $activeitem == "owner"): ?>active<?php endif; ?>">
						   <span class="nav-icon">
						   <i class="fa fa-user-friends"></i>
						   </span>
						   <span class="nav-text">Друзья</span>
						   </a>
						</li>
						<li class="nav-item">
						   <a href="/serversp/tasks/index/<?php echo $server['server_id'] ?>" class="nav-link <?php if($activesection == "serversp" && $activeitem == "tasks"): ?>active<?php endif; ?>">
						   <span class="nav-icon">
						   <i class="fas fa-clock"></i>
						   </span>
						   <span class="nav-text">Задачи</span>
						   </a>
						</li>
						<li class="nav-item">
						   <a href="/serversp/repo/index/<?php echo $server['server_id'] ?>" class="nav-link <?php if($activesection == "serversp" && $activeitem == "repo"): ?>active<?php endif; ?>">
						   <span class="nav-icon">
						   <i class="fas fa-folder"></i>
						   </span>
						   <span class="nav-text">Для сервера</span>
						   </a>
						</li>
						<?endif;?>
				</div>
			</div>
		</nav>
</div>