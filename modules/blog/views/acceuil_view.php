<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil - Mon RÃ©seau Social</title>
    <link rel="stylesheet" type="text/css" href="../../../_assets/styles/acceuil.css">
    <link rel="icon" href="wapp_icon.png" type="image/png">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="navigation">
        <ul>
            <li class="list active">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="happy-sharp"></ion-icon>
                    </span>
                    <span class="text">Amis</span>
                </a>
            </li>
            <li class="list">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="text">Home</span>
                </a>
            </li>
            <li class="list">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="chatbubble-outline"></ion-icon>
                    </span>
                    <span class="text">Messages</span>
                </a>
            </li>
            <li class="list">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="globe-sharp"></ion-icon>
                    </span>
                    <span class="text">Photos</span>
                </a>
            </li>
            <li class="list">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="notifications-outline"></ion-icon>
                    </span>
                    <span class="text">Notifications</span>
                </a>
            </li>
        </ul>
        <div class="indicator"></div>
    </div>
</div>


<script>
    const list = document.querySelectorAll('.list');
    function activeLink() {
        list.forEach((item) => {
            item.classList.remove('active');
        });
        this.classList.add('active');
    }
    list.forEach((item) => {
        item.addEventListener('click', activeLink);
    });
</script>

</body>
</html>