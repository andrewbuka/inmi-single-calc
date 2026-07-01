<?php 
    add_action( 'wp_enqueue_scripts', function() {
        
        //  if( is_page( 96 )  || is_page( 152)){
        //     wp_enqueue_style( 'not-main', get_template_directory_uri() . '/assets/styles/not-main.css');
        // }

        
        // wp_enqueue_style( 'bootstrap', get_template_directory_uri() . 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css');
        // wp_enqueue_style( 'font-popins', get_template_directory_uri() . 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap');
        // wp_enqueue_style( 'font-awesome.min', get_template_directory_uri() . 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
       
        
       
        
        
        wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css');
        wp_enqueue_style( 'my-styles', get_template_directory_uri() . '/assets/css/my-styles.css');
        wp_enqueue_style( 'yur-styles', get_template_directory_uri() . '/assets/css/yur-styles.css');


        wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/assets/css/nice-select.css');

        wp_enqueue_style( 'font-awesome.min', get_template_directory_uri() . '/assets/css/font-awesome.min.css');

        wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/assets/css/bootstrap-grid.css');

        wp_enqueue_style( 'slick.min', get_template_directory_uri() . '/assets/css/slick.min.css');
        wp_enqueue_style( 'basket', get_template_directory_uri() . '/assets/css/basket.css');
       
        
        wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css');


 

       


        wp_deregister_script( 'jquery' );
	    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js');
	    wp_enqueue_script( 'jquery' );


        // wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.js', array('jquery'), 'null', true );
        wp_enqueue_script( 'jquery-2.2.4.min', get_template_directory_uri() . '/assets/js/jquery-2.2.4.min.js', array('jquery'), 'null', true );


        wp_enqueue_script( 'slick.min', get_template_directory_uri() . '/assets/js/slick.min.js', array(), 'null', true );

   

        wp_enqueue_script( 'jquery.fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.js', array('jquery'), 'null', true );

        wp_enqueue_script( 'jquery.nice-select', get_template_directory_uri() . '/assets/js/jquery.nice-select.js', array('jquery'), 'null', true );
        
        
        wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.js', array(), 'null', true );


        
        wp_enqueue_script( 'my-js', get_template_directory_uri() . '/assets/js/my-js.js', array(), 'null', true );

        wp_enqueue_script( 'lazyload.min', get_template_directory_uri() . '/assets/js/lazyload.min.js', array(), 'null', true );
    wp_enqueue_script( 'domHelper', get_template_directory_uri() . '/assets/js/helpers/domHelper.js', array(), 'null', true );

        wp_enqueue_script( 'fizProductData', get_template_directory_uri() . '/assets/js/data/fizProductData.js', array(), 'null', true );
         wp_enqueue_script( 'basket', get_template_directory_uri() . '/assets/js/basket.js', array(), 'null', true );
         wp_localize_script(
            'basket',
            'inmiBasketOrder',
            array(
                'ajaxUrl' => admin_url( 'admin-ajax.php' ),
                'nonce'   => wp_create_nonce( 'inmi_basket_order' ),
            )
        );


        wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), 'null', true );




        
        
       
        
       

        
        
        
        
        });

        
    

        


    add_theme_support( 'post-thumbnails');
    add_theme_support( 'custom-logo');
    add_theme_support( 'title-tag');





add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}



add_action( 'wp_ajax_inmi_send_basket_order', 'inmi_send_basket_order' );
add_action( 'wp_ajax_nopriv_inmi_send_basket_order', 'inmi_send_basket_order' );

function inmi_send_basket_order() {
    check_ajax_referer( 'inmi_basket_order', 'nonce' );

    $customer_name  = isset( $_POST['customer_name'] ) ? sanitize_text_field( wp_unslash( $_POST['customer_name'] ) ) : '';
    $customer_email = isset( $_POST['customer_email'] ) ? sanitize_email( wp_unslash( $_POST['customer_email'] ) ) : '';
    $customer_phone = isset( $_POST['customer_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['customer_phone'] ) ) : '';
    $shipping       = isset( $_POST['shipping'] ) ? sanitize_text_field( wp_unslash( $_POST['shipping'] ) ) : '';
    $address        = isset( $_POST['address'] ) ? sanitize_text_field( wp_unslash( $_POST['address'] ) ) : '';
    $payment        = isset( $_POST['payment'] ) ? sanitize_text_field( wp_unslash( $_POST['payment'] ) ) : '';
    $comment        = isset( $_POST['comment'] ) ? sanitize_textarea_field( wp_unslash( $_POST['comment'] ) ) : '';
    $total          = isset( $_POST['total'] ) ? sanitize_text_field( wp_unslash( $_POST['total'] ) ) : '';
    $products_json  = isset( $_POST['products'] ) ? wp_unslash( $_POST['products'] ) : '';
    $products       = json_decode( $products_json, true );

    if ( empty( $customer_name ) || empty( $customer_phone ) ) {
        wp_send_json_error( array( 'message' => 'Заполните ФИО и телефон.' ) );
    }

    if ( ! empty( $customer_email ) && ! is_email( $customer_email ) ) {
        wp_send_json_error( array( 'message' => 'Введите корректный email.' ) );
    }

    if ( empty( $products ) || ! is_array( $products ) ) {
        wp_send_json_error( array( 'message' => 'Корзина пуста.' ) );
    }

    $message_lines = array(
        'Новый заказ с сайта ' . wp_parse_url( home_url(), PHP_URL_HOST ),
        '',
        'Покупатель:',
        'ФИО: ' . $customer_name,
        'Email: ' . ( $customer_email ? $customer_email : 'не указан' ),
        'Телефон: ' . $customer_phone,
        '',
        'Доставка: ' . ( $shipping ? $shipping : 'не указана' ),
        'Адрес: ' . ( $address ? $address : 'не указан' ),
        'Оплата: ' . ( $payment ? $payment : 'не указана' ),
        'Комментарий: ' . ( $comment ? $comment : 'нет' ),
        '',
        'Состав заказа:',
    );

    $calculated_total = 0;

    foreach ( $products as $index => $product ) {
        if ( ! is_array( $product ) ) {
            continue;
        }

        $title = isset( $product['title'] ) ? sanitize_text_field( $product['title'] ) : 'Товар #' . ( $index + 1 );
        $count = isset( $product['count'] ) ? (int) $product['count'] : 0;
        $price = isset( $product['price'] ) ? (float) $product['price'] : 0;
        $row_total = $count * $price;
        $calculated_total += $row_total;

        $message_lines[] = sprintf(
            '%d. %s — %d шт. × %s руб. = %s руб.',
            $index + 1,
            $title,
            $count,
            number_format( $price, 2, '.', ' ' ),
            number_format( $row_total, 2, '.', ' ' )
        );
    }

    $message_lines[] = '';
    $message_lines[] = 'Итого на странице: ' . ( $total ? $total . ' руб.' : 'не указано' );
    $message_lines[] = 'Итого рассчитано: ' . number_format( $calculated_total, 2, '.', ' ' ) . ' руб.';

    $headers = array( 'Content-Type: text/plain; charset=UTF-8' );

    if ( $customer_email ) {
        $headers[] = 'Reply-To: ' . $customer_name . ' <' . $customer_email . '>';
    }

    $sent = wp_mail(
        'andrew.buka90@gmail.ru',
        'Новый заказ с сайта ' . wp_parse_url( home_url(), PHP_URL_HOST ),
        implode( PHP_EOL, $message_lines ),
        $headers
    );

    if ( ! $sent ) {
        wp_send_json_error( array( 'message' => 'Не удалось отправить письмо. Попробуйте позже.' ) );
    }

    wp_send_json_success( array( 'message' => 'ваш заказ сформирован и направлен менеджеру' ) );
}


?>
