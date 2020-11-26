<div class="forums container-fluid col-12 col-md-9 p-5">
	<?php $forumId = $_GET["id"]; ?>

	<p>
		Forum Rules
	</p>
	<div class ="row p-2">
		<a href="newTopic.php?id=<?= $forumId; ?>" class="btn-success rounded-pill p-2 m-2">
			New topic
		</a>
		<button class="m-2">Tri</button>
		<form class="row">
			<input>
			<button>Loupe</button>
		</form>
		<button>Engrenage</button>
	</div>
	<div class="rounded border container">
		<div class="forums__header row bg-success align-items-center">
			<p class="col-8 m-0">Topics</p>
			<img class="col-1 img-fluid m-0" src="pictures/icons/message-circle.svg" alt="bulle">
			<img class="col-1 img-fluid m-0" src="pictures/icons/eye.svg" alt="œil">
			<img class="col-2 img-fluid m-0" src="pictures/icons/clock.svg" alt="horloge">
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
        ?>
		<div class="row border-top align-items-center p-1">
			<a class="col-8 m-0" href="content-post.php?id=<?= $topicRow["topicId"]; ?>"><?= $topicRow["topicTitle"]; ?></a>
			<p class="col-1 m-0 text-center"><?= $totalPosts["total"]; ?></p>
			<p class="col-1 m-0 text-center">OUI</p>
			<p class="col-2 m-0 text-center">
				Par <a href="profile.php?id=<?= $author["userId"]; ?>">
					<?= $author["username"]; ?>
				</a>
				<br>
				<span class="text-muted"><?= $topicRow["topicCreationDate"]; ?></span>
			</p>
		</div>
        <?php
            }
        ?>

	</div>
	<div class ="row p-2">
		<a href="newTopic.php?id=<?= $forumId; ?>" class="btn-success rounded-pill p-2 m-2">
			New topic
		</a>
		<button class="m-2">Tri</button>
	</div>

</div>
