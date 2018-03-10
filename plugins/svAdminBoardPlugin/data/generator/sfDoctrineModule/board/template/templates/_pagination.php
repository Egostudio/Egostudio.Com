<div class="sf_admin_pagination">
									<ul class="pagination">
										<li>
                                            <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=1">                                       
											<i class="fa fa-angle-left"></i>
											</a>
										</li>
										<li>
                                           <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getPreviousPage() ?]">                                       
											<i class="fa fa-angle-left"></i>
											</a>
										</li>  
  [?php foreach ($pager->getLinks() as $page): ?]
    [?php if ($page == $pager->getPage()): ?]
										<li>
											<a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $page ?]">[?php echo $page ?]</a>
										</li>
    [?php else: ?]
										<li>
											<a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $page ?]">[?php echo $page ?]</a>
										</li>
    [?php endif; ?]
  [?php endforeach; ?]

										<li>
											<a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getNextPage() ?]">
											<i class="fa fa-angle-right"></i>
											</a>
										</li>                                        
										<li>
											<a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getLastPage() ?]">
											<i class="fa fa-angle-right"></i>
											</a>
										</li>
									</ul>
</div>
