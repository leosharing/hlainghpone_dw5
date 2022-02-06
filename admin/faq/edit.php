<?php
    require_once("../dbconfig.php");
	include('./header.php');

    $id = $_GET['id'];
	$sql = "SELECT faq.*, users.username 
	FROM  `faq` INNER JOIN users ON faq.user_id = users.id WHERE faq.id=".$id;

    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
	
?>

	<div class="container-fluid">
			<div class="row mb-5">
				<div class="col-md-12 text-center">
					<h1 class="fw-bolder">Edit FAQ</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 offset-md-2">
                    <form action="./update.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
                        <?php
                            $user_sql = "SELECT * FROM users";
                            $user_result = $connection->query($user_sql); 
                        ?>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="user_id" id="floatingSelect" aria-label="Floating label select example">
                            <?php
                                    while($user_row = mysqli_fetch_assoc($user_result)){
                                    ?>
                                <option value="<?php echo $user_row['id']; ?>" <?php echo ($user_row['id'] == $row['user_id'])?"selected":"" ?> >
                                <?php echo $user_row['username']; ?>
                                </option>
                                <?php
                                    }
                                ?>
                            </select>
                            <label for="floatingSelect">User Name</label>
                        </div>
                        <div class="form-floating mb-3 textaera">
                            <textarea name="question" class="form-control" placeholder="Leave a comment here" id="floatingTextarea">
                                <?php echo $row['question']; ?>
                            </textarea>
                            <label for="floatingTextarea">Question</label>
                        </div>
                        <div class="form-floating mb-3 textaera textaera1">
                            <textarea name="answer" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2">
                                <?php echo $row['answer']; ?>
                            </textarea>
                            <label for="floatingTextarea2">Answer</label>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </form>
                </div>
			</div>
	</div>

	<script src="../../js/jquery-3.6.0.min.js"></script>

	<script>
		$(document).ready( function () {
			$('#datatable').DataTable();
		} );
	</script>
<?php include_once('./footer.php'); ?>