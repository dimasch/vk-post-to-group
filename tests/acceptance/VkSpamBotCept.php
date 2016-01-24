<?php
$I = new VkSpamBot($scenario);
$I->wantTo('see VK group in title ');
$I->amOnPage('/groupname');
$I->seeInTitle('Group Name');
$I->wait(2);
$I->fillField('email', 'my-email');
$I->fillField('pass', 'my-password');
$I->click('#quick_login_button');
$I->wait(3);

$posts = $I->executeJS('var posts = document.querySelectorAll(".wall_posts .post"); var out=[]; for (var i=0; i<posts.length; i++) { out.push(posts[i].id); } return out;');

$image = 'https://pp.vk.me/c629504/v629504213/12535/dd7yWvIBrag.jpg'; 

foreach ($posts as $key => $post) {
	//codecept_debug($post);		
	try {		
		$I->click('#' . $post . ' .reply_fakebox');	 		 		
		$I->wait(2);
		$I->fillField('#' . $post . ' .reply_field', $image . ' Auto generated comment.');
		$I->wait(2);
		$I->click('#' . $post . ' .reply_button_wrap');
		$I->wait(2);
	} catch (Exception $e) {}
}


?>
