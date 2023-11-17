<div class="card card-custom mb-3">
   <nav class="nav nav-tabs">
			<a href="/servers/control/index/<?php echo $server['server_id'] ?>" class="nav-link <?php if($activesection == "servers" && $activeitem == "control"): ?>active<?php endif; ?>">
               <span class="nav-icon">
               <i class="fa fa-chalkboard-teacher"></i>
               </span>
               <span class="nav-text"><?php echo $server['location_ip'] ?>:<?php echo $server['server_port'] ?></span>
               </a>
			<li class="nav-item">
               <a href="/servers/ftp/index/<?php echo $server['server_id'] ?>" class="nav-link <?php if($activesection == "servers" && $activeitem == "ftp"): ?>active<?php endif; ?>">
               <span class="nav-icon">
               <i class="fa fa-server"></i>
               </span>
               <span class="nav-text">FTP</span>
               </a>
            </li>
            <li class="nav-item">
               <a href="/servers/mysql/index/<?php echo $server['server_id'] ?>" class="nav-link <?php if($activesection == "servers" && $activeitem == "mysql"): ?>active<?php endif; ?>">
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
						   <a href="/servers/autoinstall/index/<?php echo $server['server_id'] ?>" class="nav-link <?php if($activesection == "servers" && $activeitem == "autoinstall"): ?>active<?php endif; ?>">
						   <span class="nav-icon">
						   <i class="fa fa-fast-forward"></i>
						   </span>
						   <span class="nav-text">Автоустановка</span>
						   </a>
						</li>
						<?php endif; ?>
						<?if($server['server_status'] == 1 or $server['server_status'] == 2 or $server['server_status'] == 7):?>
						<li class="nav-item">
						   <a href="/servers/console/index/<?php echo $server['server_id'] ?><?php if($server['game_query'] == "samp"): ?>?open=samp_1<?php endif; ?><?php if($server['game_query'] == "mtasa"): ?>?open=mtasa_1<?php endif; ?>" class="nav-link <?php if($activesection == "servers" && $activeitem == "console"): ?>active<?php endif; ?>">
						   <span class="nav-icon">
						   <i class="fa fa-terminal"></i>
						   </span>
						   <span class="nav-text">Console</span>
						   </a>
						</li>
						<li class="nav-item">
						   <a href="/servers/config/index/<?php echo $server['server_id'] ?>" class="nav-link <?php if($activesection == "servers" && $activeitem == "config"): ?>active<?php endif; ?>">
						   <span class="nav-icon">
						   <i class="fa fa-edit"></i>
						   </span>
						   <span class="nav-text">Config</span>
						   </a>
						</li>
						<li class="nav-item">
						   <a href="/servers/firewall/index/<?php echo $server['server_id'] ?>" class="nav-link <?php if($activesection == "servers" && $activeitem == "firewall"): ?>active<?php endif; ?>">
						   <span class="nav-icon">
						   <i class="fa fa-user-shield"></i>
						   </span>
						   <span class="nav-text">Firewall</span>
						   </a>
						</li>
						<li class="nav-item">
						   <a href="/servers/owner/index/<?php echo $server['server_id'] ?>" class="nav-link <?php if($activesection == "servers" && $activeitem == "owner"): ?>active<?php endif; ?>">
						   <span class="nav-icon">
						   <i class="fa fa-user-friends"></i>
						   </span>
						   <span class="nav-text">Друзья</span>
						   </a>
						</li>
						<li class="nav-item">
						   <a href="/servers/tasks/index/<?php echo $server['server_id'] ?>" class="nav-link <?php if($activesection == "servers" && $activeitem == "tasks"): ?>active<?php endif; ?>">
						   <span class="nav-icon">
						   <i class="fas fa-clock"></i>
						   </span>
						   <span class="nav-text">Задачи</span>
						   </a>
						</li>
						<li class="nav-item">
						   <a href="/servers/repo/index/<?php echo $server['server_id'] ?>" class="nav-link <?php if($activesection == "servers" && $activeitem == "repo"): ?>active<?php endif; ?>">
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