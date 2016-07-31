<!DOCTYPE html>
<html>
<head>
	<title>Friends</title>
	<link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
	<div class="container">
		<div id="header"><a href="/logout/">Logout</a></div>
		<h1>Welcome, <?=$userInfo['alias']?>!</h1>
		<h3>Here is a list of your friends:</h3>
		<table>
			<thead>
				<th>Alias</th>
				<th>Action</th>
			</thead>
			<tbody>
<?php foreach($friends[0] as $friendsWith){?>
				<tr>
					<td><?=$friendsWith['alias']?></td>
					<td>
						<a href="/userprofile/<?=$friendsWith['friend_id']?>" class="friends">View Profile</a>
						<a href="/removefriend/<?=$friendsWith['friend_id']?>" class="friends">Remove as Friend</a>
					</td>
				</tr>
<?php }?>
<?php foreach($friends[1] as $friendsOf){?>
				<tr>
					<td><?=$friendsOf['alias']?></td>
					<td>
						<a href="/userprofile/<?=$friendsOf['friend_id']?>" class="friends">View Profile</a>
						<a href="/removefriend/<?=$friendsOf['friend_id']?>" class="friends">Remove as Friend</a>
					</td>
				</tr>
<?php }?>
			</tbody>
		</table>
		<h3>Other Users not on your Friends list:</h3>
		<table>
			<thead>
				<th>Alias</th>
				<th>Action</th>
			</thead>
			<tbody>
			<?php foreach($notFriends as $notFriend){?>
				<tr>
					<td><a href="/userprofile/<?=$notFriend['id']?>"><?=$notFriend['alias']?></a></td>
					<td><a href="/addfriend/<?=$notFriend['id']?>" class="button">Add as Friend</a></td>
<?php } ?>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>