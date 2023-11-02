// profil_controller.php

require_once 'path_to/profil_model.php';
require_once 'path_to/profil_view.php';

function displayProfile($userId) {
$user = getUserDetails($userId);
include 'profil_view.php';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bio'])) {
if (empty($user['bio'])) {
saveUserBiography($userId, $_POST['bio']);
} else {
updateUserBiography($userId, $_POST['bio']);
}
displayProfile($userId);
}
