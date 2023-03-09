<div class="container ta-context user-tabs gray-border mt-2 my-lg-5">

    <div class="user-block-container">
        <div class="user-tabs">
            <ul class="nav nav-tabs justify-content-between justify-content-md-start" id="tab">
                <li class="nav-item position-relative">
                    <a class="nav-link d-flex flex-row-reverse active" id="profile-tab" data-toggle="tab"
                        href="#profile">
                        <div></div>
                        <p>Perfil</p>
                    </a>
                </li>
                <li class="nav-item position-relative ">
                    <a class="nav-link d-flex flex-row-reverse" id="account-tab" data-toggle="tab" href="#account">
                        <div></div>
                        <p>Cuenta</p>
                    </a>
                </li>
                <li class="nav-item position-relative ">
                    <a class="nav-link d-flex flex-row-reverse" id="subscriptions-tab" data-toggle="tab"
                        href="#subscriptions">
                        <div></div>
                        <p>Subscripciones</p>

                    </a>
                </li>
                <li class="nav-item position-relative last-nav-item">
                    <a class="nav-link d-flex flex-row-reverse" id="news-tab" data-toggle="tab" href="#news">
                        <p>News</p>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="profile">
                    <?php include_once('../../partes/perfil/user-profile.php');  ?>
                    <?php include_once('../../partes/perfil/user-notif.php');  ?>
                    <?php include_once('../../partes/perfil/user-comments.php');  ?>
                    <?php include_once('../../partes/perfil/user-saved.php');  ?>
                </div>
                <div class="tab-pane" id="account">
                    <?php include_once('../../partes/perfil/account-info.php');  ?>
                </div>
                <div class="tab-pane" id="subscriptions">
                    <?php include_once('../../partes/perfil/subs-subscription.php');  ?>
                    <?php include_once('../../partes/perfil/subs-nosub.php');  ?>
                    <?php include_once('../../partes/perfil/subs-historial.php');  ?>
                    <?php include_once('../../partes/perfil/subs-nosub-donacion1.php');  ?>
                    <?php include_once('../../partes/perfil/subs-nosub-donacion2.php');  ?>
                </div>
                <div class="tab-pane" id="news">
                    <?php include_once('../../partes/perfil/news-list.php');  ?>
                    <?php include_once('../../partes/perfil/news-nolist.php');  ?>
                </div>
            </div>
        </div>
    </div>
</div>