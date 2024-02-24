<?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"lms");
    $query = "delete from categories where category_id = $_GET[cid]";
    $query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
    alert("Category Deleted!");
    window.location.href="manage_categories.php";
</script>