<div class="container-fluid col-12 col-md-9 p-5">

	<p>
		Forum Rules
	</p>

	<?php 
		$forumId = $_GET["id"];
		$errorMessage="oui";

		if(isset($_POST["topicCreation"])){

			$title = htmlspecialchars($_POST['title']);
			$message = htmlspecialchars($_POST['message']);
			?><script>
				document.getElementById("topicTitle").style.borderColor = document.getElementById("topicTitle").value ? silver : red;
				document.getElementById("topicMessage").style.borderColor = document.getElementById("topicMessage").value ? silver : red;
			</script><?php

			if(empty($title)) {
				$errorMessage = "Le titre doit être rempli !";
				echo $errorMessage;
			} elseif(empty($message)) {
				$errorMessage = "Le message doit être rempli !";
				echo $errorMessage;
			} else {
				$newTopicQuery = "INSERT INTO topics (topicTitle, topicForumId, topicAuthorId) VALUES (?, ?, ?)";
				$newTopicResult = $bdd->prepare($newTopicQuery);
				$newTopicResult->execute([$title, $forumId, $_SESSION["userId"]]);

				$getNewTopicQuery = "SELECT topicId FROM topics WHERE topicTitle = ?";
				$getNewTopicResult = $bdd->prepare($getNewTopicQuery);
				$getNewTopicResult->execute([$title]);
				$newTopic = $getNewTopicResult->fetch(PDO::FETCH_ASSOC);

				$newTopicQuery = "INSERT INTO posts (postUserId, postTopicId, postContent) VALUES (?, ?, ?)";
				$newTopicResult = $bdd->prepare($newTopicQuery);
				$newTopicResult->execute([$_SESSION["userId"], $newTopic["topicId"], $message]);

				unset($title, $message);
				header("Location: forum.php?id=$forumId");
			}

		}
	?>

	<form method="post" class="d-flex flex-column p-3">
		<label for="title" class="p-2 mt-4">Nom du topic <span class="text-muted">(max. 255 caractères)</span></label>
		<input type="text" id="topicTitle" name="title">

		<label for="message" class="p-2 mt-4">Message</label>
		<textarea maxlength="2000" id="topicMessage" name="message"></textarea>
	
		<button type="submit" name="topicCreation" id="topicCreation" class="btn-success rounded-pill w-25 m-3 mt-4 align-self-center">Créer</button>
	</form>

</div>