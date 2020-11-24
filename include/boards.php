<div class="container-fluid col-12 col-md-9">

	<?php
		$boardQuery = "SELECT * FROM boards";
		$boardResult = $bdd->query($boardQuery);
		while ($boardRow = $boardResult->fetch()) {
	?>
		<h2><?= $boardRow["boardsName"]; ?></h2>
		<div class="row">
		<?php
			$forumQuery = "SELECT * FROM forums WHERE forumBoardId = ?";
			$forumResult = $bdd->prepare($forumQuery);
			$forumResult->execute(array($boardRow["boardsId"]));
			while ($forumRow = $forumResult->fetch()) {

				/* SELECTING LAST TOPIC OF THE FORUM */
				$lastTopicQuery = "SELECT topicCreationDate FROM topics WHERE topicForumId = ? ORDER BY topicId DESC LIMIT 1";
				$lastTopicResult = $bdd->prepare($lastTopicQuery);
				$lastTopicResult->execute(array($forumRow["forumId"]));
				$lastTopic = $lastTopicResult->fetch();

				/* SELECTING THE TOTAL OF POSTS OF THE FORUM */
				$totalTopicQuery = "SELECT COUNT(*) AS 'total' FROM topics WHERE topicForumId = ?";
				$totalTopicResult = $bdd->prepare($totalTopicQuery);
				$totalTopicResult->execute(array($forumRow["forumId"]));
				$totalTopic = $totalTopicResult->fetch();
		?>
		<section class="col-12 col-md-4" style="max-width: 540px;">
			<div class="card mb-3">
				<a href="forum.php?id=<?= $forumRow["forumId"]; ?>" class="card-body">
					<div class="row no-gutters">
						<div class="col-3">
							<img src="pictures/<?= $forumRow["forumPicSrc"]; ?>" class="card-img" alt="...">
						</div>
						<div class="col-9">
							<h5 class="card-title"><?= $forumRow["forumName"]; ?></h5>
							<p class="card-text"><?= $forumRow["forumDesc"]; ?></p>
						</div>
					</div>
					<div class="row">
						<div class="mr-2">
							<p><?= $totalTopic["total"]; ?></p>
							<p class="text-muted">Topics</p>
						</div>
						<div class="mr-2">
							<!-- TODO -->
							<p>908</p>
							<p class="text-muted">Posts</p>
						</div>
						<div class="mr-2">
							<p><?= $lastTopic["topicCreationDate"]; ?></p>
							<p class="text-muted">Last post</p>
						</div>
					</div>
				</a>
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
