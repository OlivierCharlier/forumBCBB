
 
<div class="background">
<?php $topicId = $_GET["id"]; ?>
 <!-- NAV BAR  -->
 <?php include("include/breadcrumb.php"); ?>

<div class="Topic-title"> <p>Topic Read (Hot)</p></div>

<div class="rules"> <p class="Text-Rules">Forum Rules </p></div> 

<div class="buttons">

    <button type="button" class="btn btn-primary reply"><i class="fas fa-reply"></i> Post Reply </button>
    <button class="setting"><i class="fas fa-wrench"></i> </button>
    <form>
        <div>
            
            <input type="text" id="search" name="search" value="Search this topic ..." class="search">
        </div>
    </form>
    <button class="setting"> <i class="fas fa-search"></i></button>
    <button class="setting"> <i class="fas fa-cog"></i></button>  
</div>



        
<?php
			$postQuery = "SELECT * FROM posts WHERE postTopicId = ?";
			$postResult = $bdd->prepare($postQuery);
			$postResult->execute(array($topicId));
            while ($postRow = $postResult->fetch(PDO::FETCH_ASSOC)) {
				
			

				$authorQuery = "SELECT * FROM users WHERE userId = ?";
				$authorResult = $bdd->prepare($authorQuery);
				$authorResult->execute(array($postRow["postUserId"]));
				$author = $authorResult->fetch(PDO::FETCH_ASSOC);
?>

    <div class="rounded border container comments">
		<div class="row bg-success align-items-center">
			<p class="col-8 m-0"> <?= $postRow["postDate"]; ?></p>
        </div>
		<div class="row border-top align-items-center p-1">
        <div class="avatar-border">
            <img src="pictures/avatar.png">
            <p class="col-2 m-0"> 
            <a href="profile.php?id=<?= $author["userId"]; ?>"><?= $author["username"]; ?></a><br></p>

        </div>
            <p class="col-8 m-0" <?= $postRow["postId"]; ?>><?= $postRow["postContent"]; ?></p>
        
        <div class="signa">	
            <p class="signature" <?= $author["userSignature"]; ?>> </p>
        </div>
        </div>
		</div>
        <?php        
            }
        ?>
        </div>
        </div>
    </div>
</div>