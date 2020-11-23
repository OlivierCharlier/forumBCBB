<div class="container-fluid col-12 col-md-9">

	<?php
		$boardQuery = "SELECT * FROM boards";
		$boardResult = mysqli_query($bdd, $boardQuery);
		while ($boardRow = mysqli_fetch_assoc($boardResult)) {
	?>
		<h2><?= $boardRow["boardsName"]; ?></h2>
		<div class="row">
		<?php
			$forumQuery = "SELECT * FROM forums WHERE forumBoardId = " . $boardRow["boardsId"];
			$forumResult = mysqli_query($bdd, $forumQuery);
			while ($forumRow = mysqli_fetch_assoc($forumResult)) {
				/* SELECTING LAST TOPIC OF THE FORUM */
				$lastTopicQuery = "SELECT topicCreationDate FROM topics WHERE topicForumId = " . $forumRow["forumId"] . " ORDER BY topicId DESC LIMIT 1";
				$lastTopicResult = mysqli_query($bdd, $lastTopicQuery);
				$lastTopic = mysqli_fetch_assoc($lastTopicResult);
				/* SELECTING THE TOTAL OF POSTS OF THE FORUM */
				$totalTopicQuery = "SELECT COUNT(*) AS 'total' FROM topics WHERE topicForumId = " . $forumRow["forumId"];
				$totalTopicResult = mysqli_query($bdd, $totalTopicQuery);
				$totalTopicRow = mysqli_fetch_assoc($totalTopicResult);
		?>
		<section class="col-12 col-md-4" style="max-width: 540px;">
			<div class="card mb-3">
				<div class="card-body">
					<div class="row no-gutters">
						<div class="col-3">
							<img src="..." class="card-img" alt="...">
						</div>
						<div class="col-9">
							<h5 class="card-title"><?= $forumRow["forumName"]; ?></h5>
							<p class="card-text"><?= $forumRow["forumDesc"]; ?></p>
						</div>
					</div>
					<div class="row">
						<div class="mr-2">
							<!-- TODO -->
							<p><?= $totalTopicRow["total"]; ?></p>
							<p class="text-muted">Topics</p>
						</div>
						<div class="mr-2">
							<!-- TODO -->
							<p>908</p>
							<p class="text-muted">Posts</p>
						</div>
						<div class="mr-2">
							<!-- TODO -->
							<p><?= $lastTopic["topicCreationDate"]; ?></p>
							<p class="text-muted">Last post</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php        
			}
		?>
		</div>
	<?php        
		}
	?>

</div>

