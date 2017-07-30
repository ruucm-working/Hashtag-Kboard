<div id="kboard-default-list">
	
	<!-- 게시판 정보 시작 -->
	<div class="kboard-list-header">
	<!-- 	<?php if(!$board->isPrivate()):?>
			<div class="kboard-total-count">
				<?php echo __('Total', 'kboard')?> <?php echo number_format($board->getListTotal())?>
			</div>
		<?php endif?> -->
		
		<div class="kboard-sort">
			<form id="kboard-sort-form-<?php echo $board->id?>" method="get" action="<?php echo $url->toString(); ?>">
				<?php echo $url->set('pageid', '1')->set('category1', '')->set('category2', '')->set('target', '')->set('keyword', '')->set('mod', 'list')->set('kboard_list_sort_remember', $board->id)->toInput()?>
				
				<select name="kboard_list_sort" onchange="jQuery('#kboard-sort-form-<?php echo $board->id?>').submit();">
					<option value="newest"<?php if($list->getSorting() == 'newest'):?> selected<?php endif?>><?php echo __('Newest', 'kboard')?></option>
					<option value="best"<?php if($list->getSorting() == 'best'):?> selected<?php endif?>><?php echo __('Best', 'kboard')?></option>
					<option value="viewed"<?php if($list->getSorting() == 'viewed'):?> selected<?php endif?>><?php echo __('Viewed', 'kboard')?></option>
					<option value="updated"<?php if($list->getSorting() == 'updated'):?> selected<?php endif?>><?php echo __('Updated', 'kboard')?></option>
				</select>
			</form>
		</div>
		<!-- 검색폼 시작 -->
		<div class="kboard-search">
			<form id="kboard-search-form-<?php echo $board->id?>" method="get" action="<?php echo $url->toString()?>" class="hide-submit">
				<?php echo $url->set('pageid', '1')->set('target', '')->set('keyword', '')->set('mod', 'list')->toInput()?>
				
				<select name="target">
					<option value=""><?php echo __('All', 'kboard')?></option>
					<option value="title"<?php if(kboard_target() == 'title'):?> selected="selected"<?php endif?>><?php echo __('Title', 'kboard')?></option>
					<option value="content"<?php if(kboard_target() == 'content'):?> selected="selected"<?php endif?>><?php echo __('Content', 'kboard')?></option>
					<option value="member_display"<?php if(kboard_target() == 'member_display'):?> selected="selected"<?php endif?>><?php echo __('Author', 'kboard')?></option>
				</select>
				<input type="text" name="keyword" value="<?php echo kboard_keyword()?>">
					<button type="submit" class="skydoctor-search kboard-default-button-small" />
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"width="55.7px" height="55.7px" viewBox="0 0 55.7 55.7" style="enable-background:new 0 0 55.7 55.7;" xml:space="preserve"><style type="text/css">.st0{fill:#5D5D5D;}</style><path class="st0" d="M54.8,50.6L44.6,40.4C48.1,35.9,50,30.5,50,25C50,11.2,38.8,0,25,0S0,11.2,0,25s11.2,25,25,25c5.6,0,11.1-1.9,15.4-5.4l10.2,10.2c0.6,0.6,1.3,0.9,2.1,0.9s1.5-0.3,2.1-0.9C56,53.6,56,51.8,54.8,50.6z M44,25.1c0,10.5-8.5,19-19,19s-19-8.5-19-19s8.5-19,19-19S44,14.6,44,25.1z"/></svg>
			</form>
		</div>
		<!-- 검색폼 끝 -->
	</div>
	<!-- 게시판 정보 끝 -->
	
	<?php if($board->use_category == 'yes'):?>
	<!-- 태그 시작 -->
	<div class="kboard-category category-pc">
		<?php if($board->initCategory1()):?>
			<ul class="kboard-category-list">
				<li<?php if(!kboard_category1()):?> class="kboard-category-selected"<?php endif?>><a href="<?php echo $url->set('category1', '')->set('pageid', '1')->set('target', '')->set('keyword', '')->set('mod', 'list')->tostring()?>"><?php echo __('All', 'kboard')?></a></li>
				<?php while($board->hasNextCategory()):?>
				<li<?php if(kboard_category1() == $board->currentCategory()):?> class="kboard-category-selected"<?php endif?>>
					<a href="<?php echo $url->set('category1', $board->currentCategory())->set('pageid', '1')->set('target', '')->set('keyword', '')->set('mod', 'list')->toString()?>"><?php echo $board->currentCategory()?></a>
				</li>
				<?php endwhile?>
			</ul>
		<?php endif?>
		
		<?php if($board->initCategory2()):?>
			<ul class="kboard-category-list">
				<li<?php if(!kboard_category2()):?> class="kboard-category-selected"<?php endif?>><a href="<?php echo $url->set('category2', '')->set('pageid', '1')->set('target', '')->set('keyword', '')->set('mod', 'list')->tostring()?>"><?php echo __('All', 'kboard')?></a></li>
				<?php while($board->hasNextCategory()):?>
				<li<?php if(kboard_category2() == $board->currentCategory()):?> class="kboard-category-selected"<?php endif?>>
					<a href="<?php echo $url->set('category2', $board->currentCategory())->set('pageid', '1')->set('target', '')->set('keyword', '')->set('mod', 'list')->toString()?>"><?php echo $board->currentCategory()?></a>
				</li>
				<?php endwhile?>
			</ul>
		<?php endif?>
	</div>
	<!-- 태그 끝 -->
	<?php endif?>
	
	<!-- 리스트 시작 -->
	<div class="kboard-list">
		<table class="cards-table">
		<!-- 	<thead>
				<tr>
					<td class="kboard-list-uid"><?php echo __('Number', 'kboard')?></td>
					<td class="kboard-list-title"><?php echo __('Title', 'kboard')?></td>
					<td class="kboard-list-user"><?php echo __('Author', 'kboard')?></td>
					<td class="kboard-list-date"><?php echo __('Date', 'kboard')?></td>
					<td class="kboard-list-vote"><?php echo __('Votes', 'kboard')?></td>
					<td class="kboard-list-view"><?php echo __('Views', 'kboard')?></td>
				</tr>
			</thead> -->
			<tbody>
				<?php while($content = $list->hasNextNotice()):?>
				<tr class="kboard-list-notice<?php if($content->uid == kboard_uid()):?> kboard-list-selected<?php endif?>">
					<td class="kboard-list-uid"><?php echo __('Notice', 'kboard')?></td>
					<td class="skydoctor-list-category">[공지사항]</td>
					<td class="kboard-list-title">
						<a href="<?php echo $url->set('uid', $content->uid)->set('mod', 'document')->toStringWithPath($board_url)?>">
							<div class="kboard-default-cut-strings">
								<?php if($content->isNew()):?><span class="kboard-default-new-notify">New</span><?php endif?>
								<?php if($content->secret):?><img src="<?php echo $skin_path?>/images/icon-lock.png" alt="<?php echo __('Secret', 'kboard')?>"><?php endif?>
								<?php echo $content->title?>
								<span class="kboard-comments-count"><?php echo $content->getCommentsCount()?></span>
							</div>
							<div class="kboard-mobile-contents">
								<span class="contents-item"><?php echo $content->member_display?></span>
								<span class="contents-separator">|</span>
								<span class="contents-item"><?php echo $content->getDate()?></span>
								<span class="contents-separator">|</span>
								<span class="contents-item"><?php echo __('Votes', 'kboard')?> <?php echo $content->vote?></span>
								<span class="contents-separator">|</span>
								<span class="contents-item"><?php echo __('Views', 'kboard')?> <?php echo $content->view?></span>
							</div>
						</a>
					</td>
					<td class="skydoctor-list-details">
						<div><span><strong><?php echo $content->member_display?></strong></span> <span>/</span> <span><?php echo $content->getDate()?></span></div>
						<div><span>추천 : <?php echo $content->vote?></span> <span>/</span> <span>조회 : <?php echo $content->view?></span></div>
					</td>
				</tr>
				<?php endwhile?>
				<?php while($content = $list->hasNext()):?>
				<tr class="<?php if($content->uid == kboard_uid()):?>kboard-list-selected<?php endif?>">
					<td class="kboard-list-uid"><?php echo $list->index()?></td>
					<td class="skydoctor-list-category"><a href="<?php echo $url->set('category1', $content->category1)->set('pageid', '1')->set('target', '')->set('keyword', '')->set('mod', 'list')->toString()?>"><?php $c1 = $content->category1; if($c1) { echo '[' . $c1 . ']'; } ?></a></td>
					<td class="kboard-list-title">
						<a href="<?php echo $url->set('uid', $content->uid)->set('mod', 'document')->toStringWithPath($board_url)?>">
							<div class="kboard-default-cut-strings">
								<?php if($content->isNew()):?><span class="kboard-default-new-notify">New</span><?php endif?>
								<?php if($content->secret):?><img src="<?php echo $skin_path?>/images/icon-lock.png" alt="<?php echo __('Secret', 'kboard')?>"><?php endif?>
								<?php echo $content->title?>
								<span class="kboard-comments-count"><?php echo $content->getCommentsCount()?></span>
							</div>
							<div class="kboard-mobile-contents">
								<span class="contents-item"><?php echo $content->member_display?></span>
								<span class="contents-separator">|</span>
								<span class="contents-item"><?php echo $content->getDate()?></span>
								<span class="contents-separator">|</span>
								<span class="contents-item"><?php echo __('Votes', 'kboard')?> <?php echo $content->vote?></span>
								<span class="contents-separator">|</span>
								<span class="contents-item"><?php echo __('Views', 'kboard')?> <?php echo $content->view?></span>
							</div>
						</a>
					</td>
					<td class="skydoctor-list-details">
						<div><span><strong><?php echo $content->member_display?></strong></span> <span>/</span> <span><?php echo $content->getDate()?></span></div>
						<div><span>추천 : <?php echo $content->vote?></span> <span>/</span> <span>조회 : <?php echo $content->view?></span></div>
					</td>
				</tr>
				<?php $boardBuilder->builderReply($content->uid)?>
				<?php endwhile?>
			</tbody>
		</table>
	</div>
	<!-- 리스트 끝 -->
	<div class="skydoctor-list-footer">
		<!-- 페이징 시작 -->
		<div class="kboard-pagination">
			<ul class="kboard-pagination-pages">
				<?php echo kboard_pagination($list->page, $list->total, $list->rpp); ?>
			</ul>
		</div>
		<!-- 페이징 끝 -->
		<?php $url->toString()?>
		<?php if($board->isWriter()): ?>
		<!-- 버튼 시작 -->
		<div class="kboard-control">
			<a href="<?php echo $url->set('mod', 'editor')->toString(); ?>" class="kboard-default-button-small"><?php echo __('New', 'kboard')?></a>
		</div>
		<!-- 버튼 끝 -->
		<?php endif?>
	</div>
</div>