<div class="box feed-item">
    <div class="box-body">
        <div class="feed-item-head row mt-20 m-width-20">
            <div class="feed-item-head-photo">
                <a href=""><img src="<?=$base?>/media/avatars/<?=feeds->user->toArray()["avatar"]?>"/></a>
            </div>
            <div class="feed-item-head-info">
                <a href=""><span class="fidi-name"><?=feeds->getUser()->name?></span></a>
                <span class="fidi-action">fez um post</span>
                <br/>
                <span class="fidi-date">07/03/2020</span>
            </div>
            <div class="feed-item-head-btn">
                <img src="<?=$base?>/assets/images/more.png"/>
            </div>
        </div>
        <div class="feed-item-body mt-10 m-width-20">
            Pessoal, tudo bem! Busco parceiros para empreender comigo em meu software.<br/><br/>
            Acabei de aprová-lo na Appstore. É um sistema de atendimento via WhatsApp multi-atendentes para auxiliar
            empresas.<br/><br/>
            Este sistema permite que vários funcionários/colaboradores da empresa atendam um mesmo número de WhatsApp,
            mesmo que estejam trabalhando remotamente, sendo que cada um acessa com um login e senha particular....
        </div>
        <div class="feed-item-buttons row mt-20 m-width-20">
            <div class="like-btn on">56</div>
            <div class="msg-btn">3</div>
        </div>
        <div class="feed-item-comments">

            <div class="fic-item row m-height-10 m-width-20">
                <div class="fic-item-photo">
                    <a href=""><img src="<?= $base ?>/media/avatars/<?=$loggedUser->toArray()["avatar"]?>"/></a>
                </div>
                <div class="fic-item-info">
                    <a href=""><?=$loggedUser->toArray()["name"]?></a>
                    Comentando no meu próprio post
                </div>
            </div>

            <div class="fic-item row m-height-10 m-width-20">
                <div class="fic-item-photo">
                    <a href=""><img src="<?= $base ?>/media/avatars/<?=$loggedUser->toArray()["avatar"]?>"/></a>
                </div>
                <div class="fic-item-info">
                    <a href=""><?=$loggedUser->toArray()["name"]?></a>
                    Muito legal, parabéns!
                </div>
            </div>

            <div class="fic-answer row m-height-10 m-width-20">
                <div class="fic-item-photo">
                    <a href=""><img src="<?= $base ?>/media/avatars/<?=$loggedUser->toArray()["avatar"]?>"/></a>
                </div>
                <input type="text" class="fic-item-field" placeholder="Escreva um comentário"/>
            </div>

        </div>
    </div>
</div>

