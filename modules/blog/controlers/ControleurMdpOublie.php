<?php

final class ControleurMdpOublie
{
    public function actionParDefaut()
    {
        $O_mdpOublie = new MdpOublie;
        vue::montrer('/MotDePasseOublie', array('Test' => $O_mdpOublie->donneMessage()));
    }
}