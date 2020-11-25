<div class="container-fluid col-12 col-md-9 p-5">
	<?php $forumId = $_GET["id"]; ?>

	<p>
		Forum Rules
	</p>
	<form class="row">
		<button>New topic</button>
		<input>
		<button>Loupe</button>
		<button>Engrenage</button>
	</form>
	<div class="rounded border container">
		<div class="row bg-success align-items-center">
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
			<p class="col-1 m-0"><?= $totalPosts["total"]; ?></p>
			<p class="col-1 m-0">OUI</p>
			<p class="col-2 m-0">Par <a href="profile.php?id=<?= $author["userId"]; ?>"><?= $author["username"]; ?></a><br><?= $topicRow["topicCreationDate"]; ?></p>
		</div>
        <?php
            }
        ?>

	</div>
	<form class="row">
		<button>New topic</button>
		<button>Tri</button>
	</form>

</div>