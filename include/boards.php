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
				$lastTopicQuery = "SELECT topicCreationDate FROM topics WHERE topicForumId = ? ORDER BY topicId DESC LIMIT 1";
				$lastTopicResult = mysqli_prepare($bdd, $lastTopicQuery);
				mysqli_stmt_bind_param($lastTopicResult, "s", $forumRow["forumId"]);
				mysqli_stmt_execute($lastTopicResult);
				mysqli_stmt_bind_result($lastTopicResult, $lastTopic);
				mysqli_stmt_fetch($lastTopicResult);
				mysqli_stmt_close($lastTopicResult);
				/*$lastTopicResult = mysqli_query($bdd, $lastTopicQuery);*/
				/* $lastTopic = mysqli_fetch_assoc($lastTopicResult); */

				/* SELECTING THE TOTAL OF POSTS OF THE FORUM */
				$totalTopicQuery = "SELECT COUNT(*) AS 'total' FROM topics WHERE topicForumId = ?";
				$totalTopicResult = mysqli_prepare($bdd, $totalTopicQuery);
				mysqli_stmt_bind_param($totalTopicResult, "s", $forumRow["forumId"]);
				mysqli_stmt_execute($totalTopicResult);
				mysqli_stmt_bind_result($totalTopicResult, $totalTopic);
				mysqli_stmt_fetch($totalTopicResult);
				mysqli_stmt_close($totalTopicResult);
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
							<!-- TODO -->
							<p><?= $totalTopic; ?></p>
							<p class="text-muted">Topics</p>
						</div>
						<div class="mr-2">
							<!-- TODO -->
							<p>908</p>
							<p class="text-muted">Posts</p>
						</div>
						<div class="mr-2">
							<!-- TODO -->
							<p><?= $lastTopic; ?></p>
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


