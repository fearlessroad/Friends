<?php 
class User extends CI_Model{
	function add($data){
		$query = "INSERT INTO users (name, alias, email, DOB, created_at, updated_at, password) VALUES (?,?,?,?,NOW(), NOW(),?)";
		return $this->db->query($query, $data);
	}
	function login($data){
		$query = "SELECT * FROM users WHERE email = ? AND password = ?";
		return $this->db->query($query, $data)->row_array();
	}
	function getUserData($id){
		$query = "SELECT * FROM users WHERE id = ?";
		return $this->db->query($query, array($id))->row_array();
	}
	function friendsWithMe($id){
		$query = "SELECT friendships.friend_id, users.name, users.alias, users.email 
			FROM friendships 
			JOIN users 
			ON friendships.friend_id=users.id 
			WHERE friendships.user_id = ?";
		return $this->db->query($query, array($id))->result_array();
	}
	function friendsWithThem($id){
		$query = "SELECT friendships.user_id 
				as friend_id, users.name, users.alias, users.email
				from friendships 
				join users on friendships.friend_id=?
				where friendships.user_id = users.id";
		return $this->db->query($query, array($id))->result_array();
	}
	function removefriend($id, $friend_id){
		$query = "DELETE from friendships 
				WHERE (friendships.user_id = ? and friendships.friend_id = ?) 
				OR (friendships.friend_id = ? and friendships.user_id=?)";
		$this->db->query($query, array($id, $friend_id, $id, $friend_id));
	}
	function addFriend($id, $friend_id){
		$query ="INSERT into friendships (user_id, friend_id) values (?, ?)";
		$this->db->query($query,array($id, $friend_id));
	}
	function getAllFriends($id){
		$query = "SELECT * from users where id!=?";
		return $this->db->query($query, array($id))->result_array();
	}
	function seeIfFriendExists($name){
		$query = "SELECT users.alias, friendships.user_id
				 from friendships
				join users on friendships.user_id = users.id
				where users.alias = ?";
		return $this->db->query($query, array($name))->result_array();
	}
	function seeIfFriends($name){
		$query = "SELECT users.alias, friendships.user_id, friendships.friend_id 
		from friendships
		join users on friendships.friend_id = users.id
		where users.alias = ?";
		return $this->db->query($query, array($name))->result_array();
	}
}