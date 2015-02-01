<?
function add_post($userid,$body){
	$sql = "insert into login_posts (user_id, body, stamp) 
			values ($userid, '". mysql_real_escape_string($body). "',now())";

	$result = mysql_query($sql);
}

function show_posts($userid){
	$posts = array();

	$sql = "select body, stamp from login_posts
	 where user_id = '$userid' order by stamp desc";
	$result = mysql_query($sql);

	while($data = mysql_fetch_object($result)){
		$posts[] = array( 	'stamp' => $data->stamp, 
							'userid' => $userid, 
							'body' => $data->body
					);
	}
	return $posts;

}
function show_posts1(){
	$posts = array();

	$sql = "select body, stamp from login_posts
	  order by stamp desc";
	$result = mysql_query($sql);

	while($data = mysql_fetch_object($result)){
		$posts[] = array( 	'stamp' => $data->stamp, 
							'userid' => $userid, 
							'body' => $data->body
					);
	}
	return $posts;

}
function show_users(){
	$users = array();
	$sql = "select user_id, username from login_users where status='active' order by username";
	$result = mysql_query($sql);

	while ($data = mysql_fetch_object($result)){
		$users[$data->id] = $data->username;
	}
	return $users;
}
function following($userid){
	$users = array();

	$sql = "select distinct user_id from login_following
			where follower_id = '$userid'";
	$result = mysql_query($sql);

	while($data = mysql_fetch_object($result)){
		array_push($users, $data->user_id);

	}

	return $users;

}

function check_count($first, $second){
	$sql = "select count(*) from login_following 
			where user_id='$second' and follower_id='$first'";
	$result = mysql_query($sql);

	$row = mysql_fetch_row($result);
	return $row[0];

}

function follow_user($me,$them){
	$count = check_count($me,$them);

	if ($count == 0){
		$sql = "insert into login_following (user_id, follower_id) 
				values ($them,$me)";

		$result = mysql_query($sql);
	}
}


function unfollow_user($me,$them){
	$count = check_count($me,$them);

	if ($count != 0){
		$sql = "delete from login_following 
				where user_id='$them' and follower_id='$me'
				limit 1";

		$result = mysql_query($sql);
	}
}


?>