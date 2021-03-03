<?php
// include database connection file
require_once'dbconfig.php';
if(isset($_REQUEST['del']))
{
    $uid=intval($_GET['del']);
    $sql = "delete from quick_response WHERE  id=:id";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':id',$uid, PDO::PARAM_STR);

    $query -> execute();
    echo "<script>alert('Record Updated successfully');</script>";
    echo "<script>window.location.href='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP CRUD Operations using PDO Extension </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">

    </style>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Response List</h3> <hr />
            <a href="insert.php"><button class="btn btn-primary"> Insert Record</button></a>
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                    <th>#</th>
                    <th>Year</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Mileage</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "SELECT * from quick_response";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                        foreach($results as $result)
                        {
                            ?>
                            <tr>
                                <td><?php echo htmlentities($cnt);?></td>
                                <td><?php echo htmlentities($result->year_c);?></td>
                                <td><?php echo htmlentities($result->make);?></td>
                                <td><?php echo htmlentities($result->model);?></td>
                                <td><?php echo   ($result->mileage)?htmlentities($result->mileage):'-';?></td>
                                <td><?php echo htmlentities($result->fname);?></td>
                                <td><?php echo htmlentities($result->lname);?></td>
                                <td><?php echo htmlentities($result->email);?></td>
                                <td><?php echo htmlentities($result->phone);?></td>
                                <td>
                                    <a href="index.php?del=<?php echo htmlentities($result->id);?>">
                                        <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');">
                                            <span class="glyphicon glyphicon-trash"></span></button></a>
                                </td>
                            </tr>
                            <?php
                            $cnt++;
                        }} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>