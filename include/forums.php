<div class="forums container-fluid col-12 col-md-9 p-5">
	<?php $forumId = $_GET["id"]; ?>

	<div class="rules"> <p class="Text-Rules">Forum Rules </p></div> 
	<div class="buttons">
	<div class ="row p-2">
		<a href="newTopic.php?id=<?= $forumId; ?>" class="btn-success rounded-pill p-2 m-2 reply">
			New topic
		</a>
		<button class="setting"><i class="fas fa-wrench"></i> </button>
    <form>
        <div>
            
            <input type="text" id="search" name="search" value="Search this topic ..." class="search">
        </div>
    </form>
    <button class="setting"> <i class="fas fa-search"></i></button>
    <button class="setting"> <i class="fas fa-cog"></i></button>  
</div>  <!--END OF BUTTONS-->

	</div>
	<div class="rounded border container">
		<div class="forums__header row bg-success align-items-center">
			<p class="col-9 m-0">Topics</p>
			<img class="col-1 img-fluid m-0" src="pictures/icons/message-circle.svg" alt="msg">
			<img class="col-2 img-fluid m-0" src="pictures/icons/clock.svg" alt="last updated">
		</div>
        <?php
			$topicsQuery = "SELECT * FROM topics WHERE topicForumId = ?";
			$topicsResult = $bdd->prepare($topicsQuery);
			$topicsResult->execute(array($forumId));
            while ($topicRow = $topicsResult->fetch(PDO::FETCH_ASSOC)) {
				
				$totalPostsQuery = "SELECT COUNT(*) AS 'total' FROM posts WHERE postTopicId = ?";
				$totalPostsResult = $bdd->prepare($totalPostsQuery);
				$totalPostsResult->execute(array($topicRow["topicId"]));
				$totalPosts = $totalPostsResult->fetch(PDO::FETCH_ASSOC);

				$authorQuery = "SELECT username, userId FROM users WHERE userId = ?";
				$authorResult = $bdd->prepare($authorQuery);
				$authorResult->execute(array($topicRow["topicAuthorId"]));
				$author = $authorResult->fetch(PDO::FETCH_ASSOC);
				
				$lastPostQuery = "SELECT postDate,postUserId FROM posts WHERE postTopicId = ? ORDER BY postId DESC LIMIT 1";
				$lastPostResult = $bdd->prepare($lastPostQuery);
				$lastPostResult->execute(array($topicRow["topicId"]));
				$lastPost = $lastPostResult->fetch(PDO::FETCH_ASSOC);

				$postAuthorQuery = "SELECT username, userId FROM users WHERE userId = ?";
				$postAuthorResult = $bdd->prepare($postAuthorQuery);
				$postAuthorResult->execute([$lastPost["postUserId"]]);
				$postAuthor = $postAuthorResult->fetch(PDO::FETCH_ASSOC);

				$date = new DateTime($lastPost['postDate']);
        ?>
		<div class="row border-top align-items-center p-1">
			<div class="col-9 m-0">
				<a href="posts.php?id=<?= $topicRow["topicId"]; ?>">
					<?= $topicRow["topicTitle"]; ?>
				</a>
				<br>
				<span class="smaller">
					<span class="text-muted">By</span>
					<a href="profile.php?id=<?= $author["userId"]; ?>">
						<?= $author["username"]; ?>
					</a>
				</span>
			</div>
			<p class="col-1 m-0 text-center"><?= $totalPosts["total"]; ?></p>
			<!-- <p class="col-1 m-0 text-center">TO DO</p> -->
			<p class="col-2 m-0 text-center">
				<a href="profile.php?id=<?= $postAuthor["userId"]; ?>">
					<?= $postAuthor["username"]; ?>
				</a>
				<br>
				<span class="text-muted smaller"><?= $date->format('j M Y'); ?></span>
			</p>
		</div>
        <?php
            }
        ?>

	</div>
	<div class ="row p-2">
		<a href="newTopic.php?id=<?= $forumId; ?>" class="btn-success rounded-pill p-2 m-2 reply">
			New topic
		</a>
		<button class="m-2 setting">Tri</button>
	</div>

</div>
