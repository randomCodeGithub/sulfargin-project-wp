<?php if ( ! defined( 'ABSPATH' ) ) exit;

get_header(); ?>

<div class="container">
    <div class="site-content__outer">
        <div class="row">
            <div class="site-content__inner col-lg-8 offset-lg-2">

                <?php if ( isset( $_GET['result'] ) ): ?>
                    <?php if ( $score = pdgc_get_survey_score( get_the_ID(), $_GET['result'] ) ): ?>
                        <?php
                        $results = get_field( 'results' );
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

                                        <?php $share_url = get_permalink() . '?result=' . strip_tags( $_GET['result'] ); ?>

                                        <div class="survey-share flex align-items-center">
                                            <p class="survey-share__label h-c-primary semibold"><?php _e( 'Поделитесь тестом:', 'mildronat' ); ?></p>

                                            <a class="survey-share__item survey-share__item--facebook" href="<?php echo $share_url; ?>"></a>
                                            <a class="survey-share__item survey-share__item--vkontakte" href="#"></a>
                                            <a class="survey-share__item survey-share__item--whatsapp" href="https://api.whatsapp.com/send?text=<?php echo urlencode( $share_url ); ?>"></a>
                                            <a class="survey-share__item survey-share__item--url" href="mailto:?Body=<?php echo urlencode( $share_url ); ?>"></a>
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
                    <?php if ( $questions = get_field( 'questions' ) ): ?>
                        <div class="survey-main" data-survey="<?php the_ID(); ?>">
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
                    <?php endif; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>