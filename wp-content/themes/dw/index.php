<?php get_header(); ?>

    <main class="layout">
        <section class="layout__intro">
            <h2 class="layout__title">Introduction</h2>
            <p class="layout__txt">Bienvenue sur mon super site.</p>
        </section>

        <section class="layout__latest latest">
            <h2 class="latest__title">Nos dernières nouvelles</h2>
            <div class="latest__container">
                <?php if(have_posts()): while(have_posts()): the_post(); ?>
                    <article class="post">
                        <a href="<?= get_the_permalink(); ?>" class="post__link">Lire l'article "<?= get_the_title(); ?>"</a>
                        <div class="post__card">
                            <header class="post__head">
                                <h3 class="post__title"><?= get_the_title(); ?></h3>
                                <p class="post__meta">Publié par <?= get_the_author(); ?> le <time class="post__date" datetime="<?= get_the_date('c'); ?>"><?= get_the_date(); ?></time></p>
                            </header>
                            <figure class="post__fig">
                                <?= get_the_post_thumbnail(null, 'medium_large', ['class' => 'post__thumb', 'id' => 'test']); ?>
                            </figure>
                            <div class="post__excerpt">
                                <p><?= get_the_excerpt(); ?></p>
                            </div>
                        </div>
                    </article>
                <?php endwhile; else: ?>
                    <!-- Un message qui signale qu'il n'y a pas d'articles -->
                <?php endif; ?>
            </div>
        </section>
        <section>
            <section class="layout__trips trips">
                <h2 class="trips__title"></h2>
                <div class="trips__container"></div>
                <?php $trips = new WP_Query([
                        //arguments
                    'post_type' => 'trip',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'post_per_page' => '3',
                ]); ?>
                <!-- debut boucle -->
                <?php if($trips->have_posts()): while($trips-> have_posts()): $trips->the_post();?>
                <article class="trip">
                    <a href="#" class="trip__link">Lire le recit de voyage "titre" <?= get_the_title ?></a>
                    <div class="trip__card">
                        <header class="trip__head">
                            <h3 class="trip__title"></h3>
                            <p class="trip__date"> le <datetime class="post__date">

                                </datetime></p>
                            <figure class="trip__fig">
                                <?= get_the_post_thumbnail(null, 'medium_large', ['class' => 'post__thumb', 'id' => 'test']); ?>
                            </figure>
                        </header>
                    </div>
                </article>
                <?php endwhile ?>
                <p class="trips__empty">pas de voyage</p>
                <!-- article c'est une carte qui represente une ressource pour -->
                <!-- fin de boucle-->
            </section>

        </section>
    </main>

<?php get_footer(); ?>
