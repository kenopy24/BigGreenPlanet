<?php
    include("conn.php");
    session_start();
    

    if (isset($_POST['email_check'])) {
        $email = $_POST['email'];
        $sql = "SELECT * FROM users WHERE email='$email'";
        $results = mysqli_query($db, $sql);
        if (mysqli_num_rows($results) > 0) {
            echo "not_available";
        }else{
            echo "available";
        }
        exit();
    }

    if (isset($_POST['save'])) {
        $stmt = $db -> prepare("INSERT INTO users(username, email, password, usertype) VALUES (?,?,?,?) ");
        $stmt->bind_param("ssss",$username, $email, $password, $type);

        //set parameters
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $type = "Member";

        //execute sql & close connection
        $stmt->execute();
        $stmt->close();
        mysqli_close($db);

        //return success message to AJAX call
        echo "Registered Successfully!";
        exit();
    }

    //if there is a file selected via file uploader, then execute the below code
    if (isset($_FILES["pI"]["name"])) {
        
        $imagelocation= "images/".basename($_FILES['pI']['name']); //photo will be uploaded into a folder named images
        $extension = pathinfo($imagelocation,PATHINFO_EXTENSION); //obtain file type

        if($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg')
        {
            echo"Unrecognized file format. Files with jpg, png and jpeg extension are allowed.";
        }
        else
        {
            if(move_uploaded_file($_FILES['pI']['tmp_name'],$imagelocation)) //upload image into folder images
            {
                $stmt = $db -> prepare("INSERT INTO posts (postTitle, postAuthor, postBody, postPhoto) VALUES (?,?,?,?) ");
                $stmt -> bind_param("ssss",$pTitle, $pAuthor, $pBody, $imagelocation);

                $pTitle = $_POST['pT']; 
                $pAuthor = $_POST['pA'];
                $pBody = $_POST['pB'];

                //execute sql & close connection
                $stmt->execute();
                $stmt->close();
                mysqli_close($db);

                echo "Registered Successfully!";
            }
            else
            {
                echo"Unable to register.";
            }
            
        }

    
    }

    //search Post Title
    if (isset($_POST['search_post'])) {
        $title = $_POST['searchTitle'];
        $query = "select * from posts where postTitle like'%$title%'";
        $execQuery = mysqli_query($db, $query);
        while($result = mysqli_fetch_array ($execQuery))
        {
            ?>
            <a onclick = 'insert("<?php echo $result ['postTitle']; ?>")'>
            <?php echo $result['postTitle']; ?><br />
            </a>
            <?php

        }
    }
    //display post
    if (isset($_POST['display_post'])) {
        $title = $_POST['searchTitle'];
        $query = "select * from posts where postTitle= '$title'";
        $execQuery = mysqli_query($db, $query);
        while ($result = mysqli_fetch_array($execQuery))
        {
            ?>
            <table class="table table-hover">
            <tr scope="col">
                <th>Title</th>
                <th>Author</th>
                <th>Body</th>
                <th>Photo</th>
            </tr>
            <tr>
                <td><?php echo $result['postTitle']; ?></td>
                <td><?php echo $result['postAuthor']; ?></td>
                <td><?php echo $result['postBody']; ?></td>
                <td><img src="<?php echo $result['postPhoto']; ?>" height="200" width="200"> </td>
            </tr>
            </table>
            <?php
        }
        exit();
    }

    if (isset($_POST['login'])){
        $stmt = $db -> prepare("select usertype from users where username =? and password =?");
        $stmt->bind_param("ss",$uname,$pword);

        $uname = $_POST['uName'];
        $pword = md5($_POST['pWord']);

        $stmt->execute();
        $stmt->bind_result($usertype);
        $stmt->store_result();
        if($stmt->fetch()) //fetching the contents of the row
        {
            $_SESSION['name']=$uname;
            $_SESSION['role']=$usertype;
            echo $_SESSION['role'];
        }
        else
        {
            echo "Incorrect username/password";
        }
        $stmt->close();
        mysqli_close($db);
        exit();
    }

    if (isset($_POST['edit_Title'])) {
        $title = $_POST['searchTitle'];
        $query = "select * from posts where postTitle= '$title'";
        $execQuery = mysqli_query($db, $query);
        while ($result = mysqli_fetch_array($execQuery))
        {
            ?>
            <table class="table table-hover">
            <tr scope="col">
                <th>Title</th>
                <th>Author</th>
                <th>Body</th>
            </tr>
            <tr>
            <td ><?php echo $result['postTitle']; ?> </td>
            <td><input type= "text" id="newAuthor" value ="<?php echo $result['postAuthor']; ?>"></td>
            <td><textarea rows="3" columns="20" id="newBody"> <?php echo $result ['postBody']; ?></textarea></td>
            </tr>
            </table>
            <?php
        }
        exit();
    }

    if (isset($_POST['save_edit'])) {
        $stmt = $db -> prepare("update posts set postAuthor=?, postBody=? where postTitle=?");
        $stmt->bind_param("sss",$newAuthor, $newBody, $title);
        $newAuthor=$_POST['nA'];
        $newBody = $_POST['nB'];
        $title=$_POST['searchTitle'];
        $stmt->execute();
        $stmt->close();
        mysqli_close($db);
        echo "Updated Successfully";
        exit();
    }

    if(isset($_POST['del'])) {
        $stmt=$db->prepare("delete from posts where postTitle =?");
        $stmt->bind_param("s",$title);
        $title=$_POST['pT'];
        $stmt->execute();
        $stmt->close();
        mysqli_close($db);
        echo "Delete Successfully";
        exit();
    }

    

?>