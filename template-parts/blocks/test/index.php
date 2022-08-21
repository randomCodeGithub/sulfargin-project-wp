<?php if ( ! defined( 'ABSPATH' ) ) exit; if ( is_admin() ) return; ?>

<?php $id = get_field( 'test' ); ?>

<?php if ( isset( $_GET['result'] ) ): ?>
    <?php $share_enable = get_field( 'share_enable', $id ); ?>

    <?php if ( $score = intval( strip_tags( $_GET['result'] ) ) ): ?>
        <?php if ( in_array( 'facebook', $share_enable ) ): ?>
            <!-- Facebook -->
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            <!-- / Facebook -->
        <?php endif; ?>

        <?php if ( in_array( 'vkontakte', $share_enable ) ): ?>
            <!-- VKontakte -->
            <script type="text/javascript" src="https://vk.com/js/api/share.js?95" charset="windows-1251"></script>
            <!-- / VKontakte -->
        <?php endif; ?>

        <?php
        $results = get_field( 'results', $id );
        $result = false;

        foreach ( $results as $arr ) {
            $parts = explode( '-', $arr['point_range'] );
            $min = (int) $parts[0];
            $max = (int) $parts[1];

            if ( $score >= $min && $score <= $max ) {
                $result = $arr;
                break;
            }
        }
        if ( $result ): ?>
            <div class="survey-result">
                <div class="survey-result__main flex">
                    <div class="survey-result__img">
                        <div class="survey-battery survey-battery--<?php echo $result['battery']; ?>"></div>
                    </div>
                    <div class="survey-result__info">
                        <h2 class="survey-result__title h3"><?php echo $result['title']; ?></h2>

                        <?php if ( isset( $result['text'] ) && $result['text'] ): ?>
                            <div class="survey-result__text">
                                <?php echo $result['text']; ?>
                            </div>
                        <?php endif; ?>

                        <?php
                        $permalink = get_permalink();
                        $share_url = [
                            'base' => $permalink,
                            'fb' => $permalink,
                            'vk' => $permalink,
                            'wpp' => $permalink,
                            'link' => $permalink
                        ];
                        $share_text = '';

                        if ( get_field( 'share_text', $id ) ) {
                            $share_text = get_field( 'share_text', $id ) . ' ';
                        }

                        if ( get_field( 'utm_facebook', $id ) ) {
                            $share_url['fb'] .= get_field( 'utm_facebook', $id );
                        }

                        if ( get_field( 'utm_vkontakte', $id ) ) {
                            $share_url['vk'] .= get_field( 'utm_vkontakte', $id );
                        }

                        if ( get_field( 'utm_whatsapp', $id ) ) {
                            $share_url['wpp'] .= get_field( 'utm_whatsapp', $id );
                        }

                        if ( get_field( 'utm_link', $id ) ) {
                            $share_url['link'] .= get_field( 'utm_link', $id );
                        }
                        ?>

                        <div class="survey-share flex align-items-center">
                            <p class="survey-share__label h-c-primary semibold"><?php _e( 'Поделитесь тестом:', 'mildronat' ); ?></p>

                            <?php if ( in_array( 'facebook', $share_enable ) ): ?>
                                <a class="survey-share__item survey-share__item--facebook js-survey-share js-share-nw" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( $share_url['fb'] ); ?> ?>">
                                </a>
                            <?php endif; ?>

                            <?php if ( in_array( 'vkontakte', $share_enable ) ): ?>
                                <button class="survey-share__item survey-share__item--vkontakte js-survey-share">
                                    <script type="text/javascript">
                                    <!-- document.write(VK.Share.button( {
                                        url: "<?php echo $share_url['vk']; ?>",
                                        title: "<?php wp_title(); ?>"
                                    },{
                                        type: "link_noicon",
                                        text: "Share"
                                    })); -->
                                    </script>
                                </button>
                            <?php endif; ?>

                            <?php if ( in_array( 'whatsapp', $share_enable ) ): ?>
                                <div class="survey-share__item survey-share__item--whatsapp js-survey-share">
                                    <a class="wpp-share d-none d-lg-block js-share-nw" href="https://api.whatsapp.com/send?text=<?php echo urlencode( $share_text . $share_url['wpp'] ); ?>"></a>
                                    <a class="wpp-share d-lg-none" href="whatsapp://send?text=<?php echo urlencode( $share_text . $share_url['wpp'] ); ?>"></a>
                                </div>
                            <?php endif; ?>

                            <?php if ( in_array( 'link', $share_enable ) ): ?>
                                <a class="survey-share__item survey-share__item--url js-survey-share" href="mailto:?Body=<?php echo urlencode( $share_text . $share_url['link'] ); ?>"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php if ( isset( $result['bottom_text'] ) && $result['bottom_text'] ): ?>
                    <div class="survey-result__bot-text text-center">
                        <?php echo $result['bottom_text']; ?>
                    </div>

                    <?php if ( get_field( 'page_for_buy', 'option' ) ): ?>
                        <div class="text-center">
                            <a class="btn btn-primary s-174" href="<?php echo get_permalink( get_field( 'page_for_buy', 'option' ) ); ?>"><?php _e( 'Купить', 'mildronat' ); ?></a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php else: ?>
    <?php if ( $questions = get_field( 'questions', $id ) ): ?>
        <!-- Intro -->
        <div class="survey-intro" data-stretch>
            <div class="row">

                <!-- Image -->
                <?php if ( $image = get_field( 'intro_image', $id ) ): ?>
                    <div class="col-lg-6 offset-lg-1 order-lg-2">
                        <div class="c-cta-slider__slider-wrap h-relative">
                            <figure class="c-cta-slider__decor h-bg-cover"></figure>

                            <div class="c-cta-slider__slider-view-wrap">
                                <div class="c-cta-slider__slider-view h-relative h-ar h-ar--1">
                                    <div class="c-cta-slider__slider">
                                        <div class="c-cta-slider__slide h-bg-cover" style="background-image: url( <?php echo pdg_get_image_src( $image, [516, 516] ); ?> );"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- / Image -->

                <!-- Text -->
                <div class="col-lg-5 order-lg-1">
                    <?php if ( get_field( 'intro_title', $id ) ): ?>
                        <h1 class="c-cta-slider__title h1"><?php the_field( 'intro_title', $id ); ?></h1>
                    <?php endif; ?>

                    <?php if ( get_field( 'intro_text', $id ) ): ?>
                        <div class="editor h-mgb-l">
                            <?php the_field( 'intro_text', $id ); ?>
                        </div>
                    <?php endif; ?>

                    <button class="c-cta-slider__button btn btn-primary s-174 js-survey-start"><?php _e( 'Начать тест', 'mildronat' ); ?></button>
                </div>
                <!-- / Text -->

            </div>
        </div>
        <!-- / Intro -->

        <!-- Survey -->
        <div class="survey-main d-none" data-survey="<?php echo $id; ?>">
            <div class="survey-area"></div>

            <div class="flex align-items-center">
                <div class="survey-progress flex" data-current="1" data-max="<?php echo count( $questions ); ?>">
                    <div class="survey-progress__nums h3"></div>
                    <div class="survey-progress__bar">
                        <div class="survey-progress__line"></div>
                    </div>
                </div>

                <div class="survey-buttons">
                    <button class="btn btn-primary js-survey-next"><?php _e( 'Следующий вопрос', 'mildronat' ); ?></button>
                    <button class="btn btn-primary js-survey-complete d-none"><?php _e( 'Результаты', 'mildronat' ); ?></button>
                </div>
            </div>
        </div>
        <!-- / Survey -->
    <?php endif; ?>
<?php endif; ?>