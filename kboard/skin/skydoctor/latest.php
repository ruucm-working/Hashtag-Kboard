<div id="kboard-default-latest">
	<table class="cards-table">
	<!-- 	<thead>
			<tr>
				<th class="kboard-latest-title"><?php echo __('Title', 'kboard')?></th>
				<th class="kboard-latest-date"><?php echo __('Date', 'kboard')?></th>
			</tr>
		</thead> -->
		<tbody>
			<?php while($content = $list->hasNextNotice()):?>
			<tr class="kboard-list-notice<?php if($content->uid == kboard_uid()):?> kboard-list-selected<?php endif?>">
				<td class="kboard-list-uid"><div><?php echo __('Notice', 'kboard')?></div></td>
				<td class="kboard-list-title">
					<a href="<?php echo $url->set('uid', $content->uid)->set('mod', 'document')->toStringWithPath($board_url)?>">
						<div class="kboard-default-cut-strings">
							<?php if($content->isNew()):?><span class="kboard-default-new-notify">New</span><?php endif?>
							<?php if($content->secret):?><img src="<?php echo $skin_path?>/images/icon-lock.png" alt="<?php echo __('Secret', 'kboard')?>"><?php endif?>
							<?php echo $content->title?>
							<span class="kboard-comments-count"><?php echo $content->getCommentsCount()?></span>
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
				<td class="kboard-list-uid"><div><?php echo $list->index()?></div></td>
				<td class="kboard-latest-title">
				<div>
					<a href="<?php echo $url->set('uid', $content->uid)->set('mod', 'document')->toStringWithPath($board_url)?>">
						<div class="kboard-default-cut-strings">
							<?php if($content->isNew()):?><span class="kboard-default-new-notify">N</span><?php endif?>
							<?php if($content->secret):?><img src="<?php echo $skin_path?>/images/icon-lock.png" alt="<?php echo __('Secret', 'kboard')?>"><?php endif?>
							<?php echo $content->title?>
							<span class="kboard-comments-count"><?php echo $content->getCommentsCount()?></span>
						</div>
					</a>
				</div>
				</td>
				<!-- <td class="kboard-latest-date"><?php echo $content->getDate()?></td> -->
				<td class="skydoctor-list-details">
					<div><span><strong><?php echo $content->member_display?></strong></span> <span>/</span> <span><?php echo $content->getDate()?></span></div>
					<div><span>추천 : <?php echo $content->vote?></span> <span>/</span> <span>조회 : <?php echo $content->view?></span></div>
				</td>
			</tr>
			<?php endwhile?>
		</tbody>
	</table>
</div>