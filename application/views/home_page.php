<main>
    <section class="service">
        <h1><?= $this->lang->line('slogan_big'); ?></h1>
        <p><?= $this->lang->line('slogan_small'); ?></p>
        <a href="" class="button wow bounceIn"><?= $this->lang->line('slogan_button'); ?></a>
        <div class="promotion">
            <div class="promotion-1">
                <a href=""><?= $this->lang->line('slogan_button_1'); ?></a>
            </div>
            <div class="promotion-2">
                <a href="#how_it_works"><?= $this->lang->line('slogan_button_2'); ?></a>
            </div>
        </div>
    </section>
    <section class="divisions">
        <?php
        foreach ($first_cat as $cat) {

            ?>
            <div class="divisions-icon wow fadeIn" data-wow-duration="2s">
                <a href="category/<?= $cat->cat_name; ?>">
                    <?= $cat->cat_img; ?>
                    <?php
                    if ($lang == 'ru'):
                        ?>
                        <p><?= $cat->cat_name; ?></p>
                        <?php
                    else:
                        echo "<p>$cat->cat_name_en</p>";
                    endif;
                    ?>
                </a>
            </div>
        <?php } ?>
        <div class="divisions-icon wow fadeIn" data-wow-duration="2s">
            <a href="category/all">
                <i class="fa fa-th-large" aria-hidden="true"></i>

                          <p><?= $this->lang->line('all_cat'); ?></p>

            </a>
        </div>
    </section>
    <section class="all-categories">
        <?php
        foreach ($sub_cat_parent as $parents) {
            ?>
            <div class="categories1">
                <div class="categories-img">
                    <img src="images/categories/categories1.png">
                </div>
                <ul>
                    <li><a href="">
            <?php
            if ($lang == 'ru'):
                ?>
                            <?= $parents->sub_cat_name; ?></a></li>
                    <?php
                    else:
                        echo $parents->sub_cat_name_en."</a></li>";
                    endif;
                    ?>
                    <?php
                    $this->db->where('parents', $parents->sub_cat_id);
                    $this->db->limit(5);
                    $query = $this->db->get("sub_category");

                    foreach ($query->result() as $childs) { ?>
                        <?php
                        if ($lang == 'ru'):
                            ?>
                        <li><a href=""><?= $childs->sub_cat_name; ?></a></li>
                            <?php
                        else:
                            echo "<li><a href=''>".$childs->sub_cat_name_en."</a></li>";
                        endif;
                        ?>
                    <?php } ?>

                    <li>

                <a href=""><?= $this->lang->line('all_sub'); ?><i class="fa fa-angle-right" aria-hidden="true"></i></a>

                    </li>
                </ul>
            </div>

        <?php } ?>

    </section>
    <section class="categories-search">
        <p><?= $this->lang->line('search_slogan'); ?></p>
        <form>
            <input type="text" name="search" class="categories-input-search"
                   placeholder="<?= $this->lang->line('search_placeholder'); ?>">
            <button class="categories-button-search">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>
        <!--        <div class="categories-specialist">-->
        <!--            <div class="categories-specialist-in wow fadeIn">-->
        <!--                <span>Помочь с выбором подходящего специалиста?</span>-->
        <!--                <p>Разместите заявку и в течение 10 минут мы найдем несколько компетентных специалистов для вашей-->
        <!--                    задачи.</p>-->
        <!--                <a href="">Оформить заявку</a>-->
        <!--            </div>-->
        <!--        </div>-->
    </section>
    <section class="how-service" id="how_it_works">
        <h2><?= $this->lang->line('order_serv'); ?></h2>
        <div class="how-service1 wow fadeInLeft">
            <div class="how-service-work">
                <span>1.</span>
                <p><?= $this->lang->line('city_vid_work'); ?></p>
                <p><?= $this->lang->line('desc_work'); ?></p>
            </div>
            <div class="how-service-work2">
                <img src="/images/service/work-specificity.png">
            </div>
        </div>
        <div class="how-service1 wow fadeInRight">
            <div class="how-service-work2">
                <img src="/images/service/work-specificity.png">
            </div>
            <div class="how-service-work">
                <span>2.</span>
                <p><?= $this->lang->line('spec_work'); ?></p>
                <p><?= $this->lang->line('desc_spec'); ?></p>
            </div>
        </div>
        <div class="how-service1 wow fadeInLeft">
            <div class="how-service-work">
                <span>3.</span>
                <p>Укажите вид работ и город</p>
                <p>Своими словами опишите, какую работу и когда нужно выполнить</p>
            </div>
            <div class="how-service-work2">
                <img src="/images/service/work-specificity.png">
            </div>
        </div>
    </section>
    <section class="slider">
        <div class="owl-carousel">
            <div class="item">
                <div class="slide1">
                    <div class="slide-text">
                        <div class="slider-avatar">
                            <img src="/images/service/reviewer.jpg">
                        </div>
                        <div class="review-slider">
                            <span>Анжелика</span>
                            <p>Кабанчик - просто сервис-находка! В условиях большого города, беготни и вечного
                                балансирования "сколько стоит моё время" для меня Кабанчик - палочка-выручалочка. 3
                                минуты на создание задания, 1 телефонный звонок с исполнителем, около часа его
                                работы и все счастливы! Кабанчик - просто сервис-находка! В условиях большого
                                города, беготни и вечного балансирования "сколько стоит моё время" для меня Кабанчик
                                - палочка-выручалочка. 3 минуты на создание задания, 1 телефонный звонок с
                                исполнителем, около часа его работы и все счастливы!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="slide2">
                    <div class="slide-text">
                        <div class="slider-avatar">
                            <img src="/images/service/reviewer.jpg">
                        </div>
                        <div class="review-slider">
                            <span>Анжелика</span>
                            <p>Кабанчик - просто сервис-находка! В условиях большого города, беготни и вечного
                                балансирования "сколько стоит моё время" для меня Кабанчик - палочка-выручалочка. 3
                                минуты на создание задания, 1 телефонный звонок с исполнителем, около часа его
                                работы и все счастливы!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="geo-city">
        <h2>География Хрюканчика</h2>
        <ul>
            <?php
            foreach ($geo as $city) {
                echo "<li><a href=''>" . $city->name_en . "</a></li>";
            }
            ?>
        </ul>
    </section>
    <section class="performer">
        <h2>Ищите проверенных исполнителей или выгодные заказы с помощью сервиса Kabanchik.ua</h2>
        <div class="buttons">
            <a href="" class="button-performer-1 wow fadeInLeft">Найти исполнителя</a>
            <a href="registration" class="button-performer-2 wow fadeInRight">Стать исполнителем</a>
        </div>
    </section>
</main>