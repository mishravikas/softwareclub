
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69
70
71
72
73
74
75
76
77
78
79
80
81
82
include('../init.php');
 
## Server's date and time. Converting it as per local time.
$date = date('Y-m-d H:i:s');
$con_date = date('c', strtotime($date));
 
if($sesslife == true) {
    if(isset($_GET['r'])) {
        ## Execute functions as per the request
        $r = clean_input($_GET['r']);
            ## For deleting photo from the database and removing thumbnails from the server
            if($r == 'post_comment') {
                if(isset($_GET['token']) && isset($_GET['msg'])) {
                    $token = clean_input($_GET['token']);
                    $msg = clean_input($_GET['msg']);
                        if(!empty($token) && !empty($msg)) {
                            if(isset($_SESSION['token']) && $token == $_SESSION['token']) {
                                /*
                                    @@ We have done the CSRF validation and will now store the comments in the database and send the
                                    result back to the index.php page.
                                */
                                try {
                                    $insert_comment = 'INSERT INTO `comments`(`comment`, `m_id`, `datetime`) VALUE(:comment, :userid, :datetime)';
                                    $insert_comment_do = $db->prepare($insert_comment);
                                    $insert_comment_do->bindParam(':comment', $msg, PDO::PARAM_STR);
                                    $insert_comment_do->bindParam(':userid', $userid, PDO::PARAM_INT);
                                    $insert_comment_do->bindParam(':datetime', $date, PDO::PARAM_STR);
                                    $insert_comment_do->execute();
                                    $comment_id = $db->lastInsertId();
 
                                    ## Fetching the gravatar photo
                                    $gravatar = get_gravatar($username);
 
            ?>
                                    <div class="comments clearfix" id="comment-<?php echo $comment_id; ?>">
                                        <div class="pull-left lh-fix">
                                            <img src="<?php echo $gravatar; ?>">
                                        </div>
 
                                        <div class="comment-text pull-left">
                                            <span class="color strong"><a href="http://www.facebook.com/profile.php?id=<?php echo $facebook_id; ?>" target="_blank"><?php echo $first_name.' '.$last_name; ?></a></span> &nbsp;<?php echo $msg; ?>
                                            <span class="info"><abbr class="time" title="<?php echo $con_date; ?>"></abbr>
                                                &middot; <a href="javascript:;" id="delete-<?php echo $comment_id; ?>" class="delete color">Delete</a>
                                            </span>
                                        </div>
                                    </div>
            <?php
 
                                } catch(PDOException $e) {
                                    ## Sending the error back to the page to show sensible message to the user
                                    echo 'failed';
                                }
                            }
                        }
                }
            }
 
            if($r == 'delete_comment') {
                if(isset($_GET['token']) && isset($_GET['c_id'])) {
                    $token = clean_input($_GET['token']);
                    $comment_id = intval($_GET['c_id']);
                        if(!empty($token) && !empty($comment_id)) {
                            if(isset($_SESSION['token']) && $token == $_SESSION['token']) {
                                try {
                                    $del_comment = 'DELETE FROM `comments` WHERE `id` = :comment_id AND `m_id` = :userid';
                                    $del_comment_do = $db->prepare($del_comment);
                                    $del_comment_do->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
                                    $del_comment_do->bindParam(':userid', $userid, PDO::PARAM_INT);
                                    $del_comment_do->execute();
 
                                    ## Sending the response back to the page
                                    echo 'success';
                                } catch(PDOException $e) {
                                    ## Place to catch and log errors.
                                    echo 'failed';
                                }
                            }
                        }
                }
            }
    }
}