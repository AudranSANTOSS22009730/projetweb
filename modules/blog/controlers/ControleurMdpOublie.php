<?php
include('modules/blog/models/MdpOublie.php');
final class ControleurMdpOublie
{

    public function actionParDefaut()
    {
        $O_mdpOublie = new MdpOublie;
        vue::montrer('/MotDePasseOublie', array('Test' => $O_mdpOublie->donneMessage()));
    }

    public function VerificationMailValide()
    {
        if (!empty($_POST["email_oublie"])) {
            $user_data = new UserModel($_POST["email_oublie"]);
            var_dump($user_data);
            if (!$user_data) {
                $msg = "Utilisateur non existant";
                $response = [
                    "value" => false,
                    "msg" => $msg
                ];
            }
        }

    }
}